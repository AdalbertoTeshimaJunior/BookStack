<?php
function urlPerfil()
{
    if (verificarUsuarioLogado()) {
        return "profile.php";
    }
    return "signin.php";
}
function urlEstanteDoSonho()
{
    if (verificarUsuarioLogado()) {
        return "bookshelf.php";
    }
    return "signin.php";
}
function urlCarrinho()
{
    if (verificarUsuarioLogado()) {
        return "carrinho.php";
    }
    return "signin.php";
}
function verificarUsuarioLogado()
{
    if (session_id() == '') {
        session_start();
    }

    if (isset($_SESSION['id'])) {
        return true;
    }
    return false;
}
function obterIdDoUsuario()
{
    session_start();
    return $_SESSION['id'];
}
