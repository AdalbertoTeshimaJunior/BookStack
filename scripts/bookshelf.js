/**
 * Função que cria clones da estrutura HTML da página bookshelf para cada livro da
 * tabela 'favoritos' do banco de dados.
 * @param {*json preenchido com os livros da tabela favoritos do banco de dados} favbooks 
 */
 function bookShelfClones(favbooks) {
    var holdClone = document.getElementsByClassName("grid-shelf")[0];
    var product = document.getElementsByClassName("book");
    console.log("Entrou na função bookShelfClones");

    for(i = 0; i < favbooks.length; i++){
        console.log("Início do for loop");
        if(i == 0){
            var template = document.getElementById("book-title");
            template.setAttribute("id", "book-" + favbooks[i].codigo_livro);
            fillBookShelf(favbooks[i], template);
        } else {
            var clone = product[0].cloneNode(true);
            clone.setAttribute("id", "book-" + favbooks[i].codigo_livro);
            holdClone.appendChild(clone);
            var template = document.getElementById("book-" + favbooks[i].codigo_livro);
            fillBookShelf(favbooks[i], template);
        }
    }
}

/**
 * Função que preenche a estrutura do clone com os atributos do JSON.
 * @param {* JSON preenchido com os livros da tabela favoritos do banco de dados} favbooks
 * @param {* Estrutura HTML da página bookshelf} template
 */
function fillBookShelf(favbooks, template){
    console.log("entrou na função fill bookShelf");
    var favBookdiv = template.children[0];
    var favBookImage = template.children[0].children[0];
    var favBookBuyButton = template.children[1].children[0];
    var favBookRemoveButton = template.children[1].children[1];

    favBookImage.src = favbooks.imagem;
    favBookBuyButton.setAttribute('id', favbooks.codigo_livro);
    favBookRemoveButton.setAttribute('id', favbooks.codigo_livro);
}