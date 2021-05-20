/**
 * Função que cria clones da estrutura HTML da página bookshelf para cada livro da
 * tabela 'favoritos' do banco de dados.
 * @param {*json preenchido com os livros da tabela favoritos do banco de dados} favbooks 
 */
 function bookShelfClones(favbooks) {
    var holdClone = document.getElementsByClassName("grid-shelf")[0];
    var product = document.getElementsByClassName("book");

    for(i = 0; i < favbooks.length; i++){
        if(i == 0){
            var template = document.getElementById("book-title");
            template.setAttribute("id", "book-" + favbooks[i].title);
            fillBookShelf(favbooks[i], template);
        } else {
            var clone = product[0].cloneNode(true);
            clone.setAttribute("id", "book-" + favbooks[i].title);
            holdClone.appendChild(clone);
            var template = document.getElementById("book-" + favbooks[i].title);
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
    var favBookdiv = template.children[0];
    var favBookImage = template.children[0].children[0];
    var favBookBuyButton = template.children[1].children[1];
    var favBookRemoveButton = template.children[1].children[1];

    favBookdiv.setAttribute('class', favbooks.id);
    favBookImage.src = favbooks.image;
    favBookBuyButton.setAttribute('id', favbooks.id);
    favBookRemoveButton.setAttribute('id', favbooks.id);
}