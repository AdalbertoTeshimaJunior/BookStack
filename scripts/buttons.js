function getBookCode(elemento, destino) {  
    var codigo = elemento.className;
    window.location.href = 'bookScreen.php' + '?codigo=' + codigo + '&adicionar=' + destino;  
}