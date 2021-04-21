// Verifica se o carrinho está vazio
if (cookieArray[carrinhoIndex] != null) {
    var cookieDecoded = decodeURIComponent(cookieArray[carrinhoIndex].replace("carrinho=", ""));
    if (cookieDecoded.length != 0) {
        var carrinhoJSON = JSON.parse(cookieDecoded);
        mudarDisplayCarrinhoVazio(false);;
    } else {
        mudarDisplayCarrinhoVazio(true);
    }
} else {
    mudarDisplayCarrinhoVazio(true);
}

function mudarDisplayCarrinhoVazio(vazio) {
    if (vazio) {
        itemPadrao.style.display = 'none';
        box.style.overflowY = "hidden";
        carrinhoVazio.style.display = "flex";
        document.getElementById("valor-sem-desconto").textContent = "R$ 0,0";
        document.getElementById("valor-total").textContent = "R$ 0,0";
    } else {
        verificaCarrinho();
    }
}

function verificaCarrinho() {

    if (carrinhoJSON.length == 0) {
        mudarDisplayCarrinhoVazio(true)
    }
    if (carrinhoJSON.length > 3) {
        box.style.overflowY = "scroll";
        percorrerCarrinho();
    } else {
        box.style.overflowY = "hidden";
        percorrerCarrinho();
    }
}
