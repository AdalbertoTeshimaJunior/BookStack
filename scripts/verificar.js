// Verifica se o carrinho está vazio, não paro de comentar seu codigo XD

if(cookieArray[carrinhoIndex] != null){
    var cookieDecoded = decodeURIComponent(cookieArray[carrinhoIndex].replace("carrinho=", ""));
    if(cookieDecoded.length != 0){
        var carrinhoJSON = JSON.parse(cookieDecoded);
        mudarDisplayCarrinhoVazio(false);;
    }else{
        mudarDisplayCarrinhoVazio(true);
    }
}else{
    mudarDisplayCarrinhoVazio(true);
}

function mudarDisplayCarrinhoVazio(vazio){
    if(vazio){
        itemPadrao.style.display = 'none';
        box.style.overflowY = "hidden";
        carrinhoVazio.style.display = "flex";
        document.getElementById("valor-sem-desconto").textContent = "R$ 0.0";
        document.getElementById("valor-total").textContent = "R$ 0.0";
    }else{
        verificaCarrinho();
    }
}

function verificaCarrinho(){

    if(carrinhoJSON.length == 0){
       mudarDisplayCarrinhoVazio(true)
    }
    if(carrinhoJSON.length > 3){
        box.style.overflowY = "scroll";
        percorrerCarrinho();
    }else{
        box.style.overflowY = "hidden";
        percorrerCarrinho();
    }
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

    var botaoSubmit = document.getElementById('botao-submit');
    botaoSubmit.type = "submit"
    botaoSubmit.click();
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
