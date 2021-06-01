<?php
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
    if (session_id() == '') {
        session_start();
    }
    return $_SESSION['id'];
}
