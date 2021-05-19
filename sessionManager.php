<?php
function obterUsuario()
{
    session_start();
    if (isset($_SESSION['id'])) {
        return "profile.php";
    }
    return "signin.php";
}
