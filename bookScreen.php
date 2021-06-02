<?php
include("dbmanager.php");
include("sessionManager.php");
include("managecookies.php");

if (isset($_GET['codigo'])) {
    $idDoLivro = $_GET['codigo'];
}

$linha = getBook($idDoLivro);

if (isset($_GET['adicionar'])) {
    if (!verificarUsuarioLogado()) {
        header("location: signin.php");
    }
    if ($_GET['adicionar'] == 'estante') {
        if (isset($_COOKIE['last_fav'])) {
            if ($_COOKIE['last_fav'] != $idDoLivro) {
                addShelfButton($idDoLivro, $linha['imagem']);
            }
        } else {
            addShelfButton($idDoLivro, $linha['imagem']);
        }
    } else if ($_GET['adicionar'] == 'carrinho') {
        if (isset($_COOKIE['last_cart'])) {
            if ($_COOKIE['last_cart'] != $idDoLivro) {
                $allBookInfo = getBook($idDoLivro);
                addCartButton($idDoLivro, $allBookInfo);
            }
        } else {
            $allBookInfo = getBook($idDoLivro);
            addCartButton($idDoLivro, $allBookInfo);
        }
    } else {
        echo "erro na leitura da URL";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Adalberto Teshima, Davi Henrique, Lucas Nakahara e Yngredh Cruz">
    <link rel="stylesheet" href="css/top-bar.css">
    <link rel="stylesheet" href="css/bookScreen.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap" rel="stylesheet">
    <script src="scripts/search.js" type="text/javascript"></script>
    <script src="scripts/addButtons.js" type="text/javascript"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                        <p>Olá, <?php echo getProfileName(); ?></p>
                    </div>
                    <div id="pesquisa-carrinho">
                        <input type="text" placeholder="Pesquisar" name="pesquisar" id="barra-pesquisa" onkeypress="iniciarBusca(event)">
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

    <section class="book_main">

        <nav class="image_book">
            <img src="<?php echo $linha['imagem']; ?>" id="livro_imagem">
        </nav>

        <article class="dados">
            <div class="titulo">
                <h3 id="book_title"><?php echo $linha['titulo']; ?></h3>
                <p id="autor"><?php echo $linha['autor']; ?></p>
            </div>

            <div class="preco">
                <h4 id="preco">R$ <?php echo number_format($linha['preco'], 2, ",", "."); ?></h4>
                <p id="parcela">até
                    <?php
                    if ($linha['preco'] > 79) {
                        echo 4;
                    } else if ($linha['preco'] > 44) {
                        echo 3;
                    } else if ($linha['preco'] > 19) {
                        echo 2;
                    } else echo 1;
                    ?>
                    x no cartão de crédito</p>
                <br>
                <a id="mais_informacoes" href=<?php echo "bookScreen.php?codigo=$idDoLivro#descricao"  ?>>mais informações</a>
            </div>

            <div class="adicionar">
                <div id="button_container">
                    <a class="<?php echo $idDoLivro ?>" onclick="addButton(this,'estante');" id="button">ADICIONAR À ESTANTE DOS SONHOS</a>
                </div>

                <div id="button_container">
                    <a id="button" class="<?php echo $idDoLivro ?>" onclick="addButton(this,'carrinho');">ADICIONAR AO CARRINHO</a>
                </div>
            </div>
        </article>
    </section>

    <section class="descricao">
        <article class="descricao_descricao">
            <h3 id="descricao">Descrição</h3>
            <p id="descricao_descricao"><?php echo $linha['descricao']; ?></p>
        </article>

        <article class="outras_descricoes">
            <div id="outras_descricoes">
                <p id="titulo_descricao">Número de páginas:</p>
                <p id="informacao_descricao"><?php echo $linha['paginas']; ?></p>
            </div>

            <hr>

            <div id="outras_descricoes">
                <p id="titulo_descricao">Dimensões:</p>
                <p id="informacao_descricao"><?php echo $linha['dimensoes']; ?></p>
            </div>

            <hr>

            <div id="outras_descricoes">
                <p id="titulo_descricao">Idioma:</p>
                <p id="informacao_descricao"><?php echo $linha['idioma']; ?></p>
            </div>

            <hr>

            <div id="outras_descricoes">
                <p id="titulo_descricao">Editora:</p>
                <p id="informacao_descricao"><?php echo $linha['editora']; ?></p>
            </div>

            <hr>

            <div id="outras_descricoes">
                <p id="titulo_descricao">Data de Publicação:</p>
                <p id="informacao_descricao"><?php echo $linha['publicacao']; ?></p>
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