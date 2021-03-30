    var armazemClone = document.getElementsByClassName("carrinho")[0];
    var itemPadrao = document.getElementById("item-0");
    console.log(itemPadrao);
    var carrinho = "carrinho=";
    var cookieArray = document.cookie.split(";");
    var carrinhoJSON = null;

    if(cookieArray.length > 0){
        var cookieDecoded = decodeURIComponent(cookieArray[0].replace(carrinho, ""));
        carrinhoJSON = JSON.parse(cookieDecoded);
    }

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
    total.textContent = (item.preco*item.quantidade);
    elemento.setAttribute('id', "item-" + posicao);
    remover.setAttribute('id', posicao);
}