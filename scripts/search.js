function iniciarBusca(evento) {
    if (evento.which == 13 || evento.keyCode == 13) {
        searchText = document.getElementById("barra-pesquisa").value;
        window.location.href = 'store.php' + '?pesquisa=' + searchText;
    }
}
function definirFiltro(elemento) {
    filtro = elemento.children[0].textContent.trim().toLowerCase();
    filterType = "";
    if (filtro == "a - z") {
        filterType = "titulo";
    } else if (filtro == "menor preço" || filtro == "maior preço") {
        filterType = "preco";
    } else {
        filterType = "genero";
    }
    filtroMaisculo = filtro.charAt(0).toUpperCase() + filtro.slice(1);
    window.location.href = 'store.php' + '?filterType=' + filterType + '&filter=' + filtroMaisculo;
}