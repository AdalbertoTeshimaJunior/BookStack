var armazemClone = document.getElementsByClassName("carrinho")[0];
var itemPadrao = document.getElementById("item-0");

var cookieArray = document.cookie.split(";");
var carrinhoIndex = obterIndex("carrinho=");
var descontoIndex = obterIndex("desconto=");
var cookieDecoded = decodeURIComponent(cookieArray[carrinhoIndex].replace("carrinho=", ""));
var descontoCookie = cookieArray[descontoIndex].replace("desconto=", "");

document.getElementById("desconto").value = parseFloat(descontoCookie);

if(cookieDecoded != ""){
    var carrinhoJSON = JSON.parse(cookieDecoded);;
    percorrerCarrinho();
}

function obterIndex(chave){
    for(i= 0; i< cookieArray.length; i++){
        if(cookieArray[i].includes(chave)){
            return i;
        }
    }
}

function percorrerCarrinho(){
    for (i = 0; i < carrinhoJSON.length; i++) {
        if (i == 0) {
            itemPadrao.setAttribute("id", "item-" + i);
            preencheInformacoes(carrinhoJSON[i], itemPadrao, i);
            i=0;
        } else {
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
    
    carrinhoJSON[index].quantidade = parseInt(quantidade);
    document.cookie = "carrinho="+ JSON.stringify(carrinhoJSON);
    calcularUnidade(preco, quantidade, total);
}

function calcularUnidade(preco, quantidade, elementoTotal) {
    elementoTotal.textContent = (preco * quantidade).toFixed(2);
    calcularPedido();
}

function calcularUnidadeInput(elemento) {
    var item = elemento.parentElement.parentElement;
    var preco = item.children[2].textContent;
    var total = item.children[3];
    var index = parseInt(item.id.split("-")[1]);
    var quantidadeValue = parseInt(elemento.value);

    if(quantidadeValue > 0){
        total.textContent = parseFloat(preco * quantidadeValue).toFixed(2);
        carrinhoJSON[index].quantidade = quantidadeValue;
        document.cookie = "carrinho="+ JSON.stringify(carrinhoJSON);
        calcularPedido();
    }else{
        alert("Insira uma quantidade válida!");
        elemento.value = 1;
    }
    
}

function calcularPedido() {
    var totais = document.getElementsByClassName("total");
    var total = 0;

    for (j = 0; j < totais.length; j++) {
        var item = totais[j];
        total += parseFloat(item.textContent);
    }
    
    var valorCru = document.getElementById("valor-sem-desconto");
    valorCru.textContent = "R$ " + total.toFixed(2);
    calculoTotal();
}

function calculoTotal(){
    var descontoInserido = document.getElementById("desconto").value;
    descontoInserido = parseFloat(descontoInserido)
    var total = document.getElementById("valor-sem-desconto").textContent.split(" ")[1];
    total = parseFloat(total);

    if(descontoInserido < 0 || descontoInserido > 100){
        document.getElementById("desconto").value = 0;
        alert("Insira um valor de desconto válido!");
    }else{
        total -= total * (parseFloat(descontoInserido)/100);
        document.cookie = "desconto="+ parseFloat(descontoInserido);
        document.getElementById("valor-total").textContent = "R$" + total.toFixed(2);
    }

}