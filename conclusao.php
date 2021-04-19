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
                    <a>
                        INÍCIO
                    </a>

                    <a>
                        CATEGORIAS
                    </a>

                    <a>
                        PERFIL
                    </a>

                    <a>
                        LISTA DE DESEJOS
                    </a>
                </div>
            </li>
        </ul>
    </header>

    <article>
        <div class="option-button">
            <a href="download.php" _blank>
                Baixar comprovante de compra
            </a>
        </div>
        <div class="option-button">
            <a href="index.php">Continue comprando</a>
        </div>
        <div class="option-button">
            <a href="index.php">Voltar ao início</a>
        </div>
    </article>
</body>

</html>