function iniciarBusca(evento) {
    if (evento.which == 13 || evento.keyCode == 13) {
        searchText = document.getElementById("barra-pesquisa").value;
        window.location.href = 'store.php' + '?pesquisa=' + searchText;
    }
}