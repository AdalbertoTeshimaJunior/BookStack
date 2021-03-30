// Verifica se o carrinho está vazio, não paro de comentar seu codigo XD
var itemPadrao = document.getElementById("item-0");
var carrinho = "carrinho=";
var cookieArray = document.cookie.split(";");
var carrinhoJSON = null;

itemPadrao.style.display = 'none';
if(cookieArray.length > 0){
    itemPadrao.style.display = 'grid';
    var cookieDecoded = decodeURIComponent(cookieArray[0].replace(carrinho, ""));
    carrinhoJSON = JSON.parse(cookieDecoded);
}

if(carrinhoJSON.length > 4 && carrinhoJSON != null){
    box.style.overflowY = "scroll";
}else{
    var box = document.getElementById("carrinho");
    box.style.overflowY = "hidden";
}

// Validação do Formulário //
function validacao(){
    var formulario = document.getElementById("form_dados");
    if (formulario.nome.value == ""){
        alert("Insira um nome no campo designado.");
        return false;
    }
    if (formulario.email.value == ""){
        alert("Insira um E-mail válido.");
        return false;
    }
    if (formulario.email.value.match(/@/) == null){
        alert("Insira um Email válido.");
        return false;
    }
    if (formulario.cpf.value == "" || formulario.cpf.value.toString().length != 11 || formulario.cpf.value < 0){
        alert("Insira um CPF válido.");
        return false;
    }

    if (formulario.rua.value == ""){
        alert("Insira uma rua válida.");
        return false;
    }
    if (formulario.bairro.value == ""){
        alert("Insira seu Bairro no campo designado.");
        return false;
    }
    if (formulario.estado.value == ""){
        alert("Insira um estado válido.");
        return false;
    }
    if (formulario.cep.value == ""){
        alert("Insira seu CEP no campo designado.");
        return false;
    }
    if (formulario.numero.value == "" || formulario.numero.value < 0 ){
        alert("Insira um número válido.");
        return false;
    }
    if (!document.getElementById("termos_check").checked){
        alert("Aceite os termos da política de compra do site.");
        return false;
    }
    return true;
}
function validacaoReset(elemento){
    
    if(elemento.value!= ""){
        var reset = document.getElementById("botao-reset");
        reset.disabled = false;
        reset.style.background = "#004D40";
    } else {
        reset.disabled = true;
        reset.style.background = "#57958A";
    }
}