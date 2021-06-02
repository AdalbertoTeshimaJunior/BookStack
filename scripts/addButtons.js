if (performance.navigation.type == 2) {
    window.location.href = "store.php";
}
/**
 * Função que muda a url da página para que o PHP possa acessar o código do livro
 * que será adicionado em um dos destinos.
 * @param {*Recebe as informações do elemento do botao no html} elemento
 * @param {*Recebe o destino do livro} destino
 */
function addButton(elemento, destino) {
    var codigo = elemento.className;
    window.location.href = 'bookScreen.php' + '?codigo=' + codigo + '&adicionar=' + destino;
}

/**
 * Função que muda a url da página para que o PHP
 * adicione ou remova um livro da estante
 * @param {*Recebe as informações do elemento do botao no html} elemento
 * @param {*Recebe o destino do livro} destino
 */
function sendButtonsAction(elemento, action) {
    // id = "codigoLivro-indexdoLivro" => codigo[0] codigo do livro no BD / codigo[1] index do livro no JSON //
    var codigo = elemento.id.split("-");

    if (action == 'comprar') {
        window.location.href = 'bookshelf.php' + '?codigo=' + codigo[0] + '&index=' + codigo[1] + '&action=' + action;
    } else if (action == 'remover') {
        window.location.href = 'bookshelf.php' + '?codigo=' + codigo[0] + '&index=' + codigo[1] + '&action=' + action;
    }
}