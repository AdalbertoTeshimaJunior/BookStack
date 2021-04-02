console.log(document.cookie);
function exibirProdutos(livros){
    
    var armazemClone = document.getElementsByClassName("grid-products")[0];
    var produtoPadrao = document.getElementsByClassName("product");
    
    for (i = 0; i < livros.length; i++) {
        if (i == 0) {
            var modelo = document.getElementById("livro-titulo");
            modelo.setAttribute("id", "livro-" + livros[i].titulo);
            preencheInformacoes(livros[i], modelo, i);
        } else {
            var clone = produtoPadrao[0].cloneNode(true);
            clone.setAttribute("id", "livro-" + livros[i].titulo);
            armazemClone.appendChild(clone);
            var modelo = document.getElementById("livro-" + livros[i].titulo);
            preencheInformacoes(livros[i], modelo);
        }
    }
}

function preencheInformacoes(livro, elemento) {
    var imagem = elemento.children[0].children[0];
    var titulo = elemento.children[1];
    var preco = elemento.children[2];
    var botao = elemento.children[3].children[0];

    imagem.src = livro.foto;
    titulo.textContent = livro.titulo;
    preco.textContent = ("R$ " + livro.preco).replace('.',',');
    botao.setAttribute('id', livro.id);
}