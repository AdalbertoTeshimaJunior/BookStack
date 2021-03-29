var itemPadrao = document.getElementById("item-0");
var carrinho = "carrinho=";
var cookieArray = document.cookie.split(";");
var cookieDecoded = decodeURIComponent(cookieArray[0].replace(carrinho, ""));
var carrinhoJSON = JSON.parse(cookieDecoded);

console.log(carrinhoJSON.length)
if(carrinhoJSON.length == 0){
    itemPadrao.style.display = 'none';
}

if(carrinhoJSON.length < 4){
    var box = document.getElementById("carrinho");
    box.style.overflowY = "hidden";
}else{
    box.style.overflowY = "scroll";
}