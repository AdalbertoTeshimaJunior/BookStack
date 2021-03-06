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
function getUserAccount($user_id)
{
    $link = mysqli_connect("localhost", "root", "", "bookstack");

    $getUser = "SELECT * FROM usuario 
        WHERE codigo = " . intval($user_id) . ";";
    $answer = mysqli_query($link, $getUser);

    if (mysqli_num_rows($answer) > 0) {
        $data = mysqli_fetch_array($answer);

        return $data;
    }
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
function getProfileEmail()
{
    $link = mysqli_connect("localhost", "root", "", "bookstack");

    if (session_id() == '') {
        session_start();
    }

    if (isset($_SESSION['id'])) {

        $getEmail = "SELECT email FROM usuario 
        WHERE codigo = " . intval($_SESSION['id']) . ";";
        $answer = mysqli_query($link, $getEmail);

        if (mysqli_num_rows($answer) > 0) {
            $data = mysqli_fetch_array($answer);

            return $data['email'];
        } else {
            return "Visitante";
        }
    } else {
        return "Visitante";
    }
}
function getPassword()
{
    $link = mysqli_connect("localhost", "root", "", "bookstack");

    if (session_id() == '') {
        session_start();
    }

    if (isset($_SESSION['id'])) {

        $getPassword = "SELECT senha FROM usuario 
        WHERE codigo = " . intval($_SESSION['id']) . ";";
        $answer = mysqli_query($link, $getPassword);

        $data = mysqli_fetch_array($answer);
        return $data['senha'];
    }
}
function getImg()
{
    $link = mysqli_connect("localhost", "root", "", "bookstack");

    if (session_id() == '') {
        session_start();
    }

    if (isset($_SESSION['id'])) {

        $getPassword = "SELECT foto FROM usuario 
        WHERE codigo = " . intval($_SESSION['id']) . ";";
        $answer = mysqli_query($link, $getPassword);

        $data = mysqli_fetch_array($answer);
        $path = "./imagens/ayaya.svg";
        if ($data['foto'] != null) {
            $path = $data['foto'];
        }
        return $path;
    }
}
function changePassword($new_password)
{
    $link = mysqli_connect("localhost", "root", "", "bookstack");

    if (session_id() == '') {
        session_start();
    }

    if (isset($_SESSION['id'])) {

        $changePassword = "UPDATE usuario
        SET senha='" . $new_password . "' 
        WHERE codigo = " . intval($_SESSION['id']) . ";";

        $answer = mysqli_query($link, $changePassword);
        return $answer;
    }
}
function changeImg($path)
{
    $link = mysqli_connect("localhost", "root", "", "bookstack");

    if (session_id() == '') {
        session_start();
    }

    if (isset($_SESSION['id'])) {

        $changePassword = "UPDATE usuario
        SET foto='" . $path . "' 
        WHERE codigo = " . intval($_SESSION['id']) . ";";

        $answer = mysqli_query($link, $changePassword);
        return $answer;
    }
}
function getUserCart($usuario_id)
{
    $conexao = mysqli_connect("localhost", "root", "", "bookstack");
    $sql = "SELECT *
            FROM carrinho
            WHERE codigo_usuario = $usuario_id AND status_compra = 0";
    $tabela = mysqli_query($conexao, $sql);
    $livros = array();
    $aux = 0;
    if (mysqli_num_rows($tabela) > 0) {
        while ($linha = mysqli_fetch_array($tabela)) {
            $sqlLivros = "SELECT *
                        FROM livro
                        WHERE codigo = " . $linha['codigo_livro'];
            $table = mysqli_query($conexao, $sqlLivros);
            while ($line = mysqli_fetch_array($table)) {
                $codigo = $line['codigo'];
                $titulo = $line['titulo'];
                $autor = $line['autor'];
                $preco = $line['preco'];
                $imagem = $line['imagem'];
                $quantidade = $linha['quantidade'];

                $livro = array('codigo' => $codigo, 'titulo' => $titulo, 'autor' => $autor, 'preco' => $preco, 'imagem' => $imagem, 'quantidade' => $quantidade);

                $livros[$aux] = $livro;
                $aux++;
            }
        }
    }
    return $livros;
}
// Atualiza o Banco de Dados com o carrinho do Cookie
function updateBooksInCart($usuario_id, $livrosCarrinho)
{
    $conexao = mysqli_connect("localhost", "root", "", "bookstack");

    deleteBooksInCart($usuario_id);
    $date = new DateTime("now", new DateTimeZone('America/Sao_Paulo'));
    $date = $date->format('Y-m-d H:i:s');
    foreach ($livrosCarrinho as $livro) {
        $valorTotal = $livro['preco'] * $livro['quantidade'];
        $insert = "INSERT INTO carrinho
    (valor_total, codigo_usuario, codigo_livro, quantidade, data_adicao)
    VALUES
    ($valorTotal, $usuario_id, " . $livro['codigo'] . ", " . $livro['quantidade'] . ", '" . $date . "');";
        mysqli_query($conexao, $insert);
    }
}
function setBoughtItensCart($usuario_id, $nf_numero)
{
    $conexao = mysqli_connect("localhost", "root", "", "bookstack");
    $update = "UPDATE carrinho SET
    status_compra = 1, nf_itens = '$nf_numero'
    WHERE codigo_usuario = $usuario_id AND
    status_compra = 0";
    $executar = mysqli_query($conexao, $update);
}
// Deleta o carrinho do Banco de Dados
function deleteBooksInCart($usuario_id)
{
    $conexao = mysqli_connect("localhost", "root", "", "bookstack");

    $delete = "DELETE FROM carrinho
        WHERE codigo_usuario = $usuario_id AND
        status_compra = 0";
    mysqli_query($conexao, $delete);
}
function getDiscount($cupom)
{
    $conexao = mysqli_connect("localhost", "root", "", "bookstack");

    $getCupom = "SELECT valor FROM desconto
        WHERE cupom ='" . $cupom . "' AND valido = true";

    $value = mysqli_query($conexao, $getCupom);

    if ($value != false) {
        while ($response = mysqli_fetch_array($value)) {
            return $response["valor"];
        }
    } else {
        return false;
    }
}
function createInvoice($usuario_id, $codigo_desconto)
{
    include("managecookies.php");
    $conexao = mysqli_connect("localhost", "root", "", "bookstack");
    $id = uniqid();
    $preco_total = calcularTotal();
    if ($codigo_desconto != null) {
        $preco_final = calcularDesconto($preco_total);
    } else {
        $preco_final = $preco_total;
    }
    $insert = "INSERT INTO nota_fiscal (preco,codigo_usuario, nf_numero,codigo_desconto, preco_final)
    VALUES
    ($preco_total, $usuario_id, '$id', '$codigo_desconto', $preco_final) ";
    $executar =  mysqli_query($conexao, $insert);

    setBoughtItensCart($usuario_id, $id);
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
function getFavoriteBooks($userID)
{
    $link = mysqli_connect("localhost", "root", "", "bookstack");
    $sql = "SELECT * from favoritos where codigo_usuario = " . $userID . ";";
    $queryAnswer = mysqli_query($link, $sql);
    $favbooks = array();
    $i = 0;
    if (mysqli_num_rows($queryAnswer) > 0) {
        while ($data = mysqli_fetch_array($queryAnswer)) {

            $bookID = $data['codigo_livro'];

            $connect = mysqli_connect("localhost", "root", "", "bookstack");
            $getAllBooks = "SELECT * from livro where codigo = " . $bookID . ";";
            $queryOfBooks = mysqli_query($connect, $getAllBooks);
            if (mysqli_num_rows($queryOfBooks) > 0) {
                while ($books = mysqli_fetch_array($queryOfBooks)) {

                    $bookImages = $books['imagem'];
                }
            }
            $favbooksArray = array('codigo_livro' => $bookID, 'imagem' => $bookImages);
            $favbooks[$i] = $favbooksArray;
            $i++;
        }

        return $favbooks;
    }
}
// Atualiza o Banco de Dados com a Estante do Cookie
function updateBooksInShelf($usuario_id, $livrosEstante)
{
    $conexao = mysqli_connect("localhost", "root", "", "bookstack");

    deleteBooksInShelf($usuario_id);

    if ($livrosEstante != null) {
        foreach ($livrosEstante as $livro) {
            $insert = "INSERT INTO favoritos
        (codigo_livro, codigo_usuario, data_adicao)
        VALUES
        (" . $livro['codigo_livro'] . ", $usuario_id, " . date("d/m/Y") . ")";
            mysqli_query($conexao, $insert);
        }
    }
}
// Deleta a estante do Banco de Dados
function deleteBooksInShelf($usuario_id)
{
    $conexao = mysqli_connect("localhost", "root", "", "bookstack");

    $delete = "DELETE FROM favoritos
        WHERE codigo_usuario = $usuario_id";
    mysqli_query($conexao, $delete);
}
