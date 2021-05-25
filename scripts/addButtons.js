/**
 * Função que muda a url da página para que o PHP possa acessar o código do livro
 * que será adicionado ao destino.
 * @param {*Recebe o código do livro que está na classe do elemento} elemento
 * @param {*Recebe o destino do livro} destino
 */
function addButton(elemento, destino) {  
    var codigo = elemento.className;
    window.location.href = 'bookScreen.php' + '?codigo=' + codigo + '&adicionar=' + destino;
}