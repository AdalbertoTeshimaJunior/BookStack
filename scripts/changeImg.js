document.getElementById("change_img").addEventListener('click', () => {
    const modal = document.getElementById("modal-photo");
    modal.classList.add('mostrar');

    modal.addEventListener('click', (e) => {
        if (e.target.getElementById == 'cancelCImg') {
            modal.classList.remove('mostrar');
        }
    });
});


document.getElementById("upload-bt").addEventListener('click', () => {
    if (document.getElementById("arq").value == "") {
        alert("Selecione um arquivo");
    }
    else {
        var submit = document.getElementById("upload-bt");
        submit.setAttribute("type", "submit");
        submit.click();
    }
});