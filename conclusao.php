<?php
include("gerarcomprovante.php");

escreverInformacoes();
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