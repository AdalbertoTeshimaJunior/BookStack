// Validação do Formulário //
function validacao() {
    var formulario = document.getElementById("form_dados");

    //Verificação dos DADOS PESSOAIS
    if (formulario.nome.value == "") {
        alert("Insira um nome no campo designado.");
        return false;
    }
    if (formulario.email.value == "") {
        alert("Insira um E-mail válido.");
        return false;
    }
    if (formulario.email.value.match(/@/) == null) {
        alert("Insira um Email válido.");
        return false;
    }
    if (formulario.cpf.value == "" || formulario.cpf.value.toString().length != 11 || formulario.cpf.value < 0) {
        alert("Insira um CPF válido.");
        return false;
    }

    // Verificação do ENDEREÇO
    if (formulario.rua.value == "") {
        alert("Insira uma rua válida.");
        return false;
    }
    if (formulario.bairro.value == "") {
        alert("Insira seu Bairro no campo designado.");
        return false;
    }
    if (formulario.estado.value == "") {
        alert("Insira um estado válido.");
        return false;
    }
    if (formulario.cidade.value == "") {
        alert("Insira uma cidade válida.");
        return false;
    }
    if (formulario.cep.value == "") {
        alert("Insira seu CEP no campo designado.");
        return false;
    }
    if (formulario.numero.value == "" || formulario.numero.value < 0) {
        alert("Insira um número válido.");
        return false;
    }

    //Verificação dos DADOS DE PAGAMENTO
    if (formulario.titular.value == "") {
        alert("Insira o nome do titular do cartão no campo designado.");
        return false;
    }
    if (formulario.cartao.value == "") {
        alert("Insira o número do cartão no campo designado.");
        return false;
    }
    if (formulario.cpftitular.value == "" || formulario.cpftitular.value.toString().length != 11 || formulario.cpftitular.value < 0) {
        alert("Insira um CPF do titular válido.");
        return false;
    }
    if (formulario.cvv.value == "") {
        alert("Insira o código de segurança do cartão no campo designado.");
        return false;
    }
    if (!document.getElementById("termos_check").checked) {
        alert("Aceite os termos da política de compra do site.");
        return false;
    }
}

//Valida se há algum campo preechido para alterar o estilo do botão RESET
function validacaoReset(elemento) {
    if (elemento.value != "") {
        var reset = document.getElementById("botao-reset");
        reset.disabled = false;
        reset.style.background = "#004D40";
    } else {
        reset.disabled = true;
        reset.style.background = "#57958A";
    }
}
