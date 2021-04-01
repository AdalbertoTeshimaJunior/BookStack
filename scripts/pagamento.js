var armazemClone = document.getElementsByClassName("carrinho")[0];
var itemPadrao = document.getElementById("item-0");
var carrinho = "carrinho=";
var cookieArray = document.cookie.split(";");
var cookieDecoded = decodeURIComponent(cookieArray[0].replace(carrinho, ""));
var valorTotal = 0;

if(cookieDecoded != ""){
    var carrinhoJSON = JSON.parse(cookieDecoded);;
    percorrerCarrinho();
}

function percorrerCarrinho(){
    for (i = 0; i < carrinhoJSON.length; i++) {
        if (i == 0) {
            itemPadrao.setAttribute("id", "item-" + i);
            preencheInformacoes(carrinhoJSON[i], itemPadrao, i);
        }  else {
            var clone = itemPadrao.cloneNode(true);
            clone.setAttribute("id", "item-" + i);
            armazemClone.appendChild(clone);
            var modelo = document.getElementById("item-" + i);
            preencheInformacoes(carrinhoJSON[i], modelo, i);
        }
    }
}

function preencheInformacoes(item, elemento, posicao) {
    var imagem = elemento.children[0].children[0];
    var titulo = elemento.children[0].children[1].children[0];
    var autor = elemento.children[0].children[1].children[1];
    var unitario = elemento.children[2];
    var total = elemento.children[3];
    var quantidade = elemento.children[1].children[1];
    var remover = elemento.children[4].children[0];

    imagem.src = item.foto;
    titulo.textContent = item.titulo;
    autor.textContent = item.autor;
    unitario.textContent = item.preco;
    quantidade.value = item.quantidade;
    calcularUnidade(item.preco, item.quantidade, total);
    elemento.setAttribute('id', "item-" + posicao);
    remover.setAttribute('id', posicao);
}

function acrescentarQuantidade(elemento) {
    var pai = elemento.parentElement;
    var input = pai.children[1];

    input.value = parseInt(input.value) + 1;
    armazenarQuantidade(input.value, pai)
}

function diminuirQuantidade(elemento) {
    var pai = elemento.parentElement;
    var input = pai.children[1];

    if (input.value > 1) {
        input.value = parseInt(input.value) - 1;
        armazenarQuantidade(input.value, pai)
    }
}

function armazenarQuantidade(quantidade, elementoPai) {
    var avo = elementoPai.parentElement;
    var preco = avo.children[2].textContent;
    var total = avo.children[3];
    var index = parseInt(avo.id.split("-")[1]);
    
    carrinhoJSON[index].quantidade = quantidade;
    document.cookie = "carrinho=" + JSON.stringify(carrinhoJSON);

    calcularUnidade(preco, quantidade, total);
}

function calcularUnidade(preco, quantidade, elementoTotal) {
    elementoTotal.textContent = (preco * quantidade).toFixed(2);
    calcularPedido();
}

function calcularPedido() {
    var totais = document.getElementsByClassName("total");
    var total = 0;

    for (i = 0; i < totais.length; i++) {
        var item = totais[i];
        total += parseFloat(item.textContent);
    }
    
    var valorCru = document.getElementById("valor-sem-desconto");
    valorCru.textContent = "R$ " + total;
}