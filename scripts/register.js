/* SCRIPT DE VALIDAÇÃO E VERIFICAÇÃO DAS PÁGINAS DE LOGIN E SIGN IN */

// Função de validação de preenchimento dos campos de Log in
function loginValidation(){
    var formInput = document.getElementById("loginForm");
    if(formInput.userEmail.value.match(/@/) == null){
        alert("Preencha todos os campos para fazer login");
        return false;
    }
    if(formInput.userPassword.value == ""){
        alert("Preencha todos os campos para fazer login");
        return false;
    }
    var submit = document.getElementById("login-button");
    submit.setAttribute("type", "submit");
    submit.click();
}
// Função de validação de preenchimento dos campos de Sign In
function signinValidation(){
    var formInput = document.getElementById("signinForm");
    if(formInput.userEmail.value == "" || formInput.userEmail.value.match(/@/) == null){
        alert("Preencha todos os campos para criar uma conta");
        return false;
    }
    if(formInput.userPassword.value == ""){
        alert("Preencha todos os campos para se cadastrar");
        return false;
    }
    if(formInput.userName.value == ""){
        alert("Preencha todos os campos para se cadastrar");
        return false;
    }
    var submit = document.getElementById("signin-button");
    submit.setAttribute("type", "submit");
    submit.click();
}
function loginErrorResponse(){
    //Muda atributos da interface da página login caso haja um erro
    console.log("Login invalido")
    document.getElementById('user-Email').style.cssText = "border-color: #C52121;";
    document.getElementById('user-Password').style.cssText = "border-color: #C52121;";
    document.getElementById('errorMessage').style.cssText = "visibility: visible;";
}
function signinErrorResponse(){
    //Muda atributos da interface da página sign in caso haja um erro
    console.log("Erro de Registro") 
    document.getElementById('user-Name').style.cssText = "border-color: #C52121;";
    document.getElementById('user-Email').style.cssText = "border-color: #C52121;";
    document.getElementById('user-Password').style.cssText = "border-color: #C52121;";
    document.getElementById('errorMessage').style.cssText = "visibility: visible;";

}