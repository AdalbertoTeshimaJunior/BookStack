//Adiciona a classe "mostrar" ao css para tornar o campo de alteração de senha visivel
function iniciaModal(modalID) {
    const modal = document.getElementById(modalID);
    modal.classList.add('mostrar');
    modal.addEventListener('click', (e) => {
        if (e.target.getElementById == 'cancelCPW') {
            modal.classList.remove('mostrar');
        }
    });
}

//chama função de verificação e mudança
function changePWValidation() {
    if (document.getElementById("old-pw").value == ""
        || document.getElementById("new-pw").value == ""
        || document.getElementById("new-pw-confirm").value == "") {
        alert("Preencha todos os campos corretamente");
        return false;
    }

    else if (document.getElementById("new-pw").value != document.getElementById("new-pw-confirm").value) {
        alert("Preencha todos os campos corretamente");
        return false;
    }

    else if (document.getElementById("old-pw").value != document.getElementById("senha_valor").textContent) {
        alert("Preencha todos os campos corretamente");
        return false;
    }
    else {
        window.location.href = "profile.php?np=" + document.getElementById("new-pw").value;
    }
}

//Chama função para tornar visível o modal
const button = document.getElementById('btCPW');
button.addEventListener('click', () => {
    iniciaModal('modal-changepw');
});

//Confirmar a mudança
document.getElementById("confirm-cpw").addEventListener('click', () => {
    changePWValidation();
});