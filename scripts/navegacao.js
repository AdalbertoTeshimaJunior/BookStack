const botaoDireito = document.getElementById('botao-direito');
const botaoEsquerdo = document.getElementById('botao-esquerdo');

botaoDireito.onclick = function () {
    document.getElementById('livros-container').scrollLeft += 380;
};
botaoEsquerdo.onclick = function () {
    document.getElementById('livros-container').scrollLeft -= 380;
};