
var cookieArray = document.cookie.split(";");
var carrinhoIndex = obterIndex("carrinho=");
if (cookieArray[carrinhoIndex] != null) {
    var cookieDecoded = decodeURIComponent(cookieArray[carrinhoIndex].replace("carrinho=", ""));
    var carrinhoJSON = JSON.parse(cookieDecoded);
}

//Multiplica a estrutura do HTML para receber as informações do arquivo JSON//
console.log(document.cookie);
function exibirProdutos(livros) {

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
//Preenche a estrutura do HTML com os atributos do JSON//
function preencheInformacoes(livro, elemento) {
    var container = elemento.children[0];
    var imagem = elemento.children[0].children[0];
    var titulo = elemento.children[1];
    var preco = elemento.children[2];
    var botao = elemento.children[3].children[0];

    container.setAttribute('class', livro.codigo);
    imagem.src = livro.imagem;
    titulo.textContent = livro.titulo;
    preco.textContent = ("R$ " + livro.preco).replace('.', ',');
    botao.setAttribute('id', livro.codigo);
    var verificar = alreadyAdded(livro.codigo);
    if (verificar > 0) {
        alreadyAddedOnChange(botao);
    }
}

function enviarId(elemento) {
    var codigo = elemento.className;
    window.location.href = 'bookScreen.php' + '?codigo=' + codigo;
}

function obterIndex(chave) {
    for (i = 0; i < cookieArray.length; i++) {
        if (cookieArray[i].includes(chave)) {
            return i;
        }
    }
}

function alreadyAdded(id) {
    if (carrinhoJSON != undefined) {
        var livrosAdicionados = carrinhoJSON.filter(livro => livro.codigo == id);
        console.log(livrosAdicionados.length);
        return livrosAdicionados.length;
    } else {
        return 0;
    }
}

function alreadyAddedOnChange(element) {
    element.style.cssText = "background-color: #009a80;";
    element.textContent = 'Livro Adicionado';
}