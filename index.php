<!DOCTYPE html>
<html lang="pt-br">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Adalberto Teshima, Davi Henrique e Yngredh Cruz">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/storepage.css">
        <link rel="stylesheet" href="css/top-bar.css">
        <script src="scripts/lojinha.js" type="text/javascript"></script>
        <link rel="icon" type="image/x-icon" href="imagens/booklogo.png">
        <title>Book Stack</title>
    </head>

    <body>
        <header>
            <ul>
                <li id="logo-box">
                    <a id="link-menu-logo"  href="index.html"><img id="logo" src="imagens/Logo.png" alt=""></a>
                </li>
                <div id="botoes-menu">
                    <li id="Carrinho">
                        <a id="link-menu" href="carrinho.html"><img id="img-carrinho" src="imagens/carinho.png" alt="Carrinho"></a>
                    </li>
                </div>
            </ul>
        </header>

        <section>
            <aside>
                <div class="filter">
                    <img src="imagens/ad_banner2.png" alt="as vantagens de ser invisível - nova edição">
                    <img src="imagens/ad_banner.png" alt="fahrenheit 451 - em promoção">
                </div>
            </aside>

            <article class="grid-products">
                <div class="product" id="livro-titulo">
                    <div id="book-container">
                        <img id="book-image" alt="">
                    </div>
                    <p id="titulo"></p>
                    <p id="book-price"></p>
                    <div id="button-container">
                        <button>COMPRAR</button>
                    </div>
                </div>
            </article>
        </section>
    </body>
</html>

<?php
    $arquivo= file_get_contents('livros.json');
    $json = json_decode($arquivo);
    $livros = $json->livros;
    
    echo "<script>
    exibirProdutos(".json_encode($livros).");
    </script>";
?>