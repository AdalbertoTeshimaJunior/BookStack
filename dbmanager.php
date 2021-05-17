<?php

function createAccount($userName, $userEmail, $userPassword)
{
    // Open connection
    $link = mysqli_connect("localhost", "root", "", "bookstack");

    // Verificar se o registro já existe na tabela usuario
    $verifyEmail = "SELECT * from usuario where email = '" . $userEmail . "';";
    $result = mysqli_query($link, $verifyEmail);

    if (mysqli_num_rows($result) > 0) {
        // Retornar resposta de erro visual
        mysqli_free_result($result);
        return false;
    } else {
        // Criar uma conta com os valores obtidos do formulario
        $createNewRegister = "INSERT INTO usuario (nome, email, senha) values ('" . $userName . "','" . $userEmail . "','" . $userPassword . "');";
        mysqli_query($link, $createNewRegister);
        // Armazena o código na SESSION
        $userCode = "SELECT * from usuario where email = '" . $userEmail . "';";
        $sessionCode = mysqli_query($link, $userCode);
        $code = mysqli_fetch_array($sessionCode);
        $code["codigo"];
        $_SESSION["id"] = $code;
        header("location: profile.php");
        return true;
    }

    // Close connection
    mysqli_close($link);
}

function enterAccount($userEmail, $userPassword)
{
    // Open connection
    $link = mysqli_connect("localhost", "root", "", "bookstack");

    // Verificar se o login existe na tabela usuario
    $verifyLogin = "SELECT codigo FROM usuario 
                WHERE email = '" . $userEmail . "' 
                AND senha = '" . $userPassword . "';";
    $answer = mysqli_query($link, $verifyLogin);

    if (mysqli_num_rows($answer) > 0) {
        // Armazenar o código do usuario na SESSION
        $code = mysqli_fetch_array($answer);
        $_SESSION["id"] = $code;
        header("location: profile.php");
        return true;
    } else {
        // Retornar resposta de erro visual
        return false;
    }

    // Close connection
    mysqli_close($link);
}

function getAllBooks()
{
    $link = mysqli_connect("localhost", "root", "", "bookstack");
    $sql = "SELECT * FROM livro";
    $answer = mysqli_query($link, $sql);
    $livros = array();
    $aux = 0;
    if (mysqli_num_rows($answer) > 0) {
        while ($data = mysqli_fetch_array($answer)) {
            $codigo = $data['codigo'];
            $preco = $data['preco'];
            $titulo = $data['titulo'];
            $imagem = $data['imagem'];

            $livro = array('codigo' => $codigo, 'preco' => $preco, 'titulo' => $titulo, 'imagem' => $imagem);

            $livros[$aux] = $livro;
            $aux++;
        }
        return $livros;
    }
}

function getBook($id)
{
    $conexao = mysqli_connect("localhost", "root", "", "bookstack") or die("Erro de conexão com localhost");

    $sql = "SELECT * 
                FROM livro 
                WHERE codigo = '$id'";
    $tabela = mysqli_query($conexao, $sql);
    return mysqli_fetch_array($tabela);
}
