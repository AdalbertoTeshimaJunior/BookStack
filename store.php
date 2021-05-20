<?php
include("gerenciarcarrinho.php");
include("dbmanager.php");
include("sessionManager.php");
$urlPerfil = urlPerfil();
$urlEstante = urlEstanteDoSonho();
$urlCarrinho = urlCarrinho();

if (isset($_GET['pesquisa'])) {
    $livros = searchBooks($_GET['pesquisa']);
} else {
    $livros = getAllBooks();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/storepage.css">
    <link rel="stylesheet" href="css/top-bar.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="icon" type="image/x-icon" href="imagens/booklogo.png">
    <script src="scripts/store.js" type="text/javascript"></script>
    <script src="scripts/profile.js" type="text/javascript"></script>
    <script src="scripts/search.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
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
                        <p>Olá, <?php echo getProfileName() ?></p>
                    </div>
                    <div id="pesquisa-carrinho">
                        <input type="text" placeholder="Pesquisar" name="pesquisar" id="barra-pesquisa" onkeypress="iniciarBusca(event)" />
                        <div id="botoes-menu">
                            <li id="Carrinho">
                                <a id="link-menu" href="<?php echo $urlCarrinho ?>"><img id="img-carrinho" src="imagens/carinho.png" alt="Carrinho"></a>
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

                    <a href="<?php echo $urlPerfil ?>">
                        PERFIL
                    </a>

                    <a href="<?php echo $urlEstante ?>">
                        ESTANTE<br>DOS SONHOS
                    </a>
                </div>
            </li>
        </ul>
    </header>
    <!-- BARRA SUPERIOR -->

    <section>
        <!-- FILTROS -->
        <aside>
            <div class="filter">
                <div>
                    <div class="filter-title">
                        <p>FILTRAR LIVROS</p>
                    </div>

                    <div class="filter-button">
                        <a href="">
                            <p>TODOS</p>
                        </a>
                    </div>
                    <div class="filter-button">
                        <a href="">
                            <p>A - Z</p>
                        </a>
                    </div>
                    <div class="filter-button">
                        <a href="">
                            <p>MENOR PREÇO</p>
                        </a>
                    </div>
                    <div class="filter-button">
                        <a href="">
                            <p>MAIOR PREÇO</p>
                        </a>
                    </div>
                    <div class="filter-button">
                        <a href="">
                            <p>MAIS VENDIDO</p>
                        </a>
                    </div>
                </div>
                <div>
                    <div class="filter-title">
                        <p>PUBLICAÇÃO</p>
                    </div>

                    <div class="filter-button">
                        <a href="">
                            <p>AUTOR</p>
                        </a>
                    </div>
                    <div class="filter-button">
                        <a href="">
                            <p>EDITORA</p>
                        </a>
                    </div>
                    <div class="filter-button">
                        <a href="">
                            <p>IDIOMA</p>
                        </a>
                    </div>
                </div>
                <div>
                    <div class="filter-title">
                        <p>GÊNEROS</p>
                    </div>

                    <div class="filter-button">
                        <a href="">
                            <p>FICÇÃO</p>
                        </a>
                    </div>
                    <div class="filter-button">
                        <a href="">
                            <p>CIÊNCIA</p>
                        </a>
                    </div>
                    <div class="filter-button">
                        <a href="">
                            <p>LITERATURA</p>
                        </a>
                    </div>
                    <div class="filter-button">
                        <a href="">
                            <p>SUSPENSE</p>
                        </a>
                    </div>
                </div>
                <img src="imagens/ad_banner2.png" alt="as vantagens de ser invisível - nova edição">
                <img src="imagens/ad_banner.png" alt="fahrenheit 451 - em promoção">
            </div>
        </aside>
        <!-- FILTROS -->

        <article class="grid-products">
            <div class="product" id="livro-titulo">
                <div id="book-container" onclick="enviarId(this);">
                    <img id="book-image" alt="">
                </div>
                <p id="titulo"></p>
                <p id="book-price"></p>
                <div id="button-container">
                    <a href="store.php" onclick="location.href = this.href+'?adicionar='+ this.id;return false;">Adicionar ao Carrinho</a>
                </div>
            </div>
        </article>
    </section>

    <!-- FOOTER -->
    <footer>
        <div class="top-footer">
            <div id="mobile-info">
                <h2>Mobile app</h2>
                <div>
                    <p><a href="">Baixar agora para Android</a></p>
                    <p><a href="">Baixar agora para IOS</a></p>
                </div>
            </div>
            <div id="about-info">
                <h2>About Us</h2>
                <div>
                    <p><a href="http://www.github.com/Yngredh" target="_BLANK">github.com/Yngredh</a></p>
                    <p><a href="http://www.github.com/davihenrique05" target="_BLANK">github.com/davihenrique05</a></p>
                    <p><a href="http://github.com/LucasNakahara" target="_BLANK">github.com/LucasNakahara</a></p>
                    <p><a href="http://www.github.com/AdalbertoTeshimaJunior" target="_BLANK">github.com/AdalbertoTeshimaJunior</a></p>
                </div>
            </div>
            <div id="contact-info">
                <h2>Contact Us</h2>
                <div>
                    <p><a href="http://www.linkedin.com/in/yngredh-cruz" target="_BLANK">linkedin.com/in/yngredh-cruz</a></p>
                    <p><a href="http://www.linkedin.com/in/davi-hg-silva" target="_BLANK">linkedin.com/in/davi-hg-silva</a></p>
                    <p><a href="http://www.linkedin.com/in/lucas-nakahara-79587b1ba/" target="_BLANK">linkedin.com/in/lucas-nakahara</a></p>
                    <p><a href="http://www.linkedin.com/in/adalberto-teshima-júnior" target="_BLANK">linkedin.com/in/adalberto-teshima-júnior</a></p>
                </div>
            </div>
        </div>
        <hr>
        <div class="bottom-footer">
            <p id="assinatura">© BookStack, Inc. 2021. We love books!</p>
            <div id="social-media">
                <p>Follow us: </p>
                <img src="imagens/instagram-icone.png">
                <img src="imagens/twitter-icone.png">
                <img src="imagens/facebook-icone.png">
            </div>
        </div>
    </footer>
    <!-- FOOTER -->
</body>

</html>

<?php
echo "<script>
    exibirProdutos(" . json_encode($livros) . ");
    </script>";
?>