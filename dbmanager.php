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
        session_start();
        $_SESSION['id'] = $code['codigo'];
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
        session_start();
        $_SESSION['id'] = $code['codigo'];
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

function getProfileName()
{
    $link = mysqli_connect("localhost", "root", "", "bookstack");

    if (session_id() == '') {
        session_start();
    }

    if (isset($_SESSION['id'])) {

        $getName = "SELECT nome FROM usuario 
        WHERE codigo = " . intval($_SESSION['id']) . ";";
        $answer = mysqli_query($link, $getName);

        if (mysqli_num_rows($answer) > 0) {
            $data = mysqli_fetch_array($answer);

            return $data['nome'];
        } else {
            return "Visitante";
        }
    } else {
        return "Visitante";
    }
}
function searchBooks($tittle)
{
    $link = mysqli_connect("localhost", "root", "", "bookstack");
    $sql = "SELECT * FROM livro WHERE titulo LIKE '%" . $tittle . "%'";
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
function filterBooks($filterType, $filter)
{
    if ($filterType != "genero") {
        $order = "ASC";
        if ($filter == "Maior preço") {
            $order = "DESC";
        }

        $link = mysqli_connect("localhost", "root", "", "bookstack");
        $sql = "SELECT * FROM livro ORDER BY " . $filterType . " " . $order;
        $answer = mysqli_query($link, $sql);
        $livros = array();
        $aux = 0;

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
    } else {
        $link = mysqli_connect("localhost", "root", "", "bookstack");
        $sql = "SELECT * FROM livro WHERE genero = '" . $filter . "'";
        $answer = mysqli_query($link, $sql);
        $livros = array();
        $aux = 0;

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
/**
 * Função que contrói um array que contém todos os livro da tabela 'favoritos' do banco de dados
 * @return array que possui os atributos dos livros da tabela 'favoritos'
 */
function getFavoriteBooks()
{
    $userID = getUserID();
    $link = mysqli_connect("localhost", "root", "", "bookstack");
    $sql = "SELECT * from favoritos where codigo_usuario = " . $userID . ";";
    $queryAnswer = mysqli_query($link, $sql);
    $favbooks = array();
    $i = 0;
    if (mysqli_num_rows($queryAnswer) > 0) {
        while ($data = mysqli_fetch_array($queryAnswer)) {
            
            $bookID = $data['codigo_livro'];
            
            $connect = mysqli_connect("localhost", "root", "", "bookstack");
            $getAllBooks = "SELECT * from livro where codigo = ".$bookID.";";
            $queryOfBooks = mysqli_query($connect, $getAllBooks);
            if(mysqli_num_rows($queryOfBooks) > 0){
                while($books = mysqli_fetch_array($queryOfBooks)){
                    
                    $bookImages = $books['imagem'];

                }
            }
            $favbooksArray = array('codigo_livro' => $bookID, 'imagem' => $bookImages);
            $favbooks[$i] = $favbooksArray;
            $i++;
        }
        
        return $favbooks;
    } // Usuário ainda não possui nenhum livro nos favoritos?
}

function getUserID()
{
    session_start();
    return $_SESSION['id'];
}
