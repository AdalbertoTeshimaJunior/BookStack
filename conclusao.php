<?php
include("gerarcomprovante.php");
escreverInformacoes();
//--Pega os dados--
//! Sem Telefone !
$cpf = $_POST['cpf'];
$endereco_Rua = $_POST['rua'];
$endereco_Bairro = $_POST['bairro'];
$endereco_Estado = $_POST['estado'];
$endereco_CEP = $_POST['cep'];
$endereco_Cidade = $_POST['cidade'];
$endereco_Numero = $_POST['numero'];
$pagamento_NomeTitular = $_POST['titular'];
$pagamento_NumeroCartao = $_POST['cartao'];
$pagamento_CPFTitular = $_POST['cpftitular'];
$pagamento_CVV = $_POST['cvv'];

//--Atualiza o carrinho do usuário no Banco de Dados--
session_start();
$usuario_id = $_SESSION['id'];
$dados = html_entity_decode($_COOKIE['carrinho']);
$livrosCarrinho = json_decode($dados, true);
updateBooksInCart($usuario_id, $livrosCarrinho);

//--Atualiza os dados do usuário no Banco de Dados--
$conexao = mysqli_connect("localhost", "root", "", "bookstack");
$update = "UPDATE usuario SET
cpf = $cpf,
endereco_CEP = '$endereco_CEP',
endereco_Estado = '$endereco_Estado',
endereco_Cidade = '$endereco_Cidade',
endereco_Bairro = '$endereco_Bairro',
endereco_Rua = '$endereco_Rua',
endereco_Numero = $endereco_Numero,
pagamento_NomeTitular = '$pagamento_NomeTitular',
pagamento_CPFTitular = $pagamento_CPFTitular,
pagamento_CVV = $pagamento_CVV,
pagamento_NumeroCartao = $pagamento_NumeroCartao
WHERE  codigo = $usuario_id";
mysqli_query($conexao, $update);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Adalberto Teshima, Davi Henrique e Yngredh Cruz">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/top-bar.css">
    <link rel="stylesheet" href="css/conclusao.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="icon" type="image/x-icon" href="imagens/booklogo.png">
    <title>Book Stack</title>
</head>

<body>
    <!-- BARRA SUPERIOR -->
    <header>
        <ul>
            <li id="logo-box">
                <a id="link-menu-logo" href="index.php"><img id="logo" src="imagens/Logo.png" alt=""></a>
            </li>
            <div id="saudacao-icones">
                <div id="menu-superior">
                    <div id="saudacao">
                        <p>Olá, Davi</p>
                    </div>
                    <div id="pesquisa-carrinho">
                        <input type="text" placeholder="Pesquisar" name="pesquisar" id="barra-pesquisa">
                        <div id="botoes-menu">
                            <li id="Carrinho">
                                <a id="link-menu" href="carrinho.php"><img id="img-carrinho" src="imagens/carinho.png" alt="Carrinho"></a>
                            </li>
                        </div>
                    </div>
                </div>
            </div>
            <li id="barra-navegacao">
                <div id="links">
                    <a href="index.php">
                        INÍCIO
                    </a>

                    <a href="store.php">
                        LOJA
                    </a>

                    <a href="profile.php">
                        PERFIL
                    </a>

                    <a href="bookshelf.php">
                        ESTANTE<br>DOS SONHOS
                    </a>
                </div>
            </li>
        </ul>
    </header>
    <!-- BARRA SUPERIOR -->

    <section>
        <div>
            <h2>Obrigado por comprar conosco!</h2>
            <p>Nós da BookStack estamos imensamente felizes com seu pedido, abaixo você pode fazer o download do comprovente e nos movimentaremos para realizar a entrega o mais rápido possível.</p>
        </div>
    </section>
    <div id="download-button">
        <a href="download.php" _blank>
            Baixar comprovante de compra
        </a>
    </div>
</body>

</html>