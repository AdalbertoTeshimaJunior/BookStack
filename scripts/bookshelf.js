var cookieArray = document.cookie.split(";");
var favoritosIndex = obterIndex("favoritos=");

function obterIndex(chave) {
    for (i = 0; i < cookieArray.length; i++) {
        if (cookieArray[i].includes(chave)) {
            return i;
        }
    }
}

if (cookieArray[favoritosIndex] != null) {
    var cookieDecoded = decodeURIComponent(cookieArray[favoritosIndex].replace("favoritos=", ""));
    if (cookieDecoded.length != 0) {
        var favoritosJSON = JSON.parse(cookieDecoded);
        bookShelfClones(favoritosJSON);
    }
}

/**
 * Função que cria clones da estrutura HTML da página bookshelf para cada livro da
 * tabela 'favoritos' do banco de dados.
 * @param {*json preenchido com os livros da tabela favoritos do banco de dados} favbooks 
 */
 function bookShelfClones(favbooks) {
    var holdClone = document.getElementsByClassName("grid-shelf")[0];
    var product = document.getElementsByClassName("book");

    if(favbooks.length == 0){
        document.getElementById('book-title').style.display = "none";
    }

    for(i = 0; i < favbooks.length; i++){
        if(i == 0){
            var template = document.getElementById("book-title");
            fillBookShelf(favbooks[i], template, i);
        } else {
            var clone = product[0].cloneNode(true);
            holdClone.appendChild(clone);
            fillBookShelf(favbooks[i], clone, i);
        }
    }
}

/**
 * Função que preenche a estrutura do clone com os atributos do JSON.
 * @param {* JSON preenchido com os livros da tabela favoritos do banco de dados} favbooks
 * @param {* Estrutura HTML da página bookshelf} template
 */
function fillBookShelf(favbooks, template, i){
    var favBookImage = template.children[0].children[0];
    var favBookBuyButton = template.children[1].children[0].children[0];
    var favBookRemoveButton = template.children[1].children[1].children[0];

    favBookImage.src = favbooks.imagem;
    favBookBuyButton.setAttribute('id', favbooks.codigo_livro + "-" + i);
    favBookRemoveButton.setAttribute('id', favbooks.codigo_livro + "-" + i);
}