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

    <section class="book_main">

        <nav class="image_book">
            <img src="imagens/as_vantagens_de_ser_invisivel.jpg" id="livro_imagem">
        </nav>

        <article class="dados">
            <div class="titulo">
                <h3 id="book_title">As Vantagens de Ser InvisívelAs Vantagens de Ser Invisível</h3>
                <p id="autor">Stephen Chbosky</p>
            </div>

            <div class="preco">
                <h4 id="preco">R$ 41,79</h4>
                <p id="parcela">até 2x no cartão de créditos</p>
                <br>
                <a id="mais_informacoes" href="index.php">Mais informações</a>
            </div>

            <div class="adicionar">
                <div id="button_container">
                    <a id="button">ADICIONAR Á LISTA DE DESEJOS</a>
                </div>

                <div id="button_container">
                    <a id="button">ADICIONAR AO CARRINHO</a>
                </div>
            </div>
        </article>
    </section>

    <section class="descricao">
        <article class="descricao_descricao">
            <h3 id="descricao">Descrição</h3>
            <p id="descricao_descricao">"O LIVRO QUE INSPIROU O FILMENOVA EDIÇÃO COM TRECHO INÉDITO Manter-se à margem oferece uma única e passiva perspectiva. Mas, de uma hora para outra, sempre chega o momento de encarar a vida do centro dos holofotes. Mais íntimas do que um diário, as cartas de Charlie são estranhas e únicas, hilárias e devastadoras. Não se sabe onde ele mora. Não se sabe para quem ele escreve. Tudo o que se conhece é o mundo que ele compartilha com o leitor. Estar encurralado entre o desejo de viver sua vida e fugir dela o coloca num novo caminho através de um território inexplorado. Um mundo de primeiros encontros amorosos, dramas familiares e novos amigos. Um mundo de sexo, drogas e rock’n’roll, quando o que todo mundo quer é aquela música certa que provoca o impulso perfeito para se sentir infinito. A luta entre apatia e entusiasmo marca o fim da adolescência de Charlie nesta história divertida e ao mesmo tempo instigante."</p>
        </article>

        <article class="outras_descricoes">
            <div id="outras_descricoes">
                <p id="titulo_descricao">Número de páginas:</p>
                <p id="informacao_descricao">288</p>
            </div>

            <hr>

            <div id="outras_descricoes">
                <p id="titulo_descricao">Dimensões:</p>
                <p id="informacao_descricao">21.08 x 13.97 x 2.03 cm</p>
            </div>

            <hr>

            <div id="outras_descricoes">
                <p id="titulo_descricao">Idioma:</p>
                <p id="informacao_descricao">Português</p>
            </div>

            <hr>

            <div id="outras_descricoes">
                <p id="titulo_descricao">Editora:</p>
                <p id="informacao_descricao">Rocco Jovens Leitores</p>
            </div>

            <hr>

            <div id="outras_descricoes">
                <p id="titulo_descricao">Data de Publicação:</p>
                <p id="informacao_descricao">15 agosto 2020</p>
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
                    <p><a href="http://www.github.com/AdalbertoTeshimaJunior" target="_BLANK">github.com/AdalbertoTeshimaJunior</a></p>
                </div>
            </div>
            <div id="contact-info">
                <h2>Contact Us</h2>
                <div>
                    <p><a href="http://www.linkedin.com/in/yngredh-cruz" target="_BLANK">linkedin.com/in/yngredh-cruz</a></p>
                    <p><a href="http://www.linkedin.com/in/davi-hg-silva" target="_BLANK">linkedin.com/in/davi-hg-silva</a></p>
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