fetch('carrinho.json')
    .then(res=>res.json())
    .then(res=>
        {
            var ultimaChave = Object.keys(res).sort().reverse()[0];
            verificarLocalStorage(ultimaChave);
        })

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
            preencheInformacoes(livros[i], modelo, i);
        }
    }
}

function preencheInformacoes(livro, elemento, posicao) {
    var imagem = elemento.children[0].children[0];
    var titulo = elemento.children[1];
    var preco = elemento.children[2];

    imagem.src = livro.foto;
    titulo.textContent = livro.titulo;
    preco.textContent = "R$ " + livro.preco;
}

function verificarLocalStorage(ultimaChave){
    var idUsuario = localStorage.getItem("idUsuario");
    if(idUsuario == null){
        var chaveInt = parseInt(ultimaChave) + 1;
        localStorage.setItem("idUsuario", chaveInt);
    }
}