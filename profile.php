<?php
include("dbmanager.php");
include("sessionManager.php");

if (!verificarUsuarioLogado()) {
    header("location: signin.php");
}

if (isset($_POST['submit'])) {
    $fileName = $_FILES['imageInput']['name'];
    $variavelQqr = explode(".", $fileName);
    $extension = end($variavelQqr);
    $fileTmpName = $_FILES['imageInput']['tmp_name'];

    $path = "imagens/usuario/" . obterIdDoUsuario() . "." . $extension;
    $path_arm = "./" . $path;

    changeImg($path_arm);
    move_uploaded_file($fileTmpName, $path);
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/top-bar.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/profile.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap" rel="stylesheet">
    <script src="scripts/search.js" type="text/javascript"></script>
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

    <!-- CONTEÚDO -->
    <section>

        <h3 id="profile_title">Meu Perfil</h3>


        <article class="profile_block">

            <div id="logout">
                <a href="login.php" id="logout_button">
                    <img src="./imagens/Vector.svg">
                </a>
            </div>


            <div id="profile_content">

                <div class="content_img">
                    <div class="frame">
                        <img src="<?php
                                    $file = getImg();
                                    if (file_exists($file)) {
                                        echo $file;
                                    } else {
                                        echo './imagens/usuario/ayaya.svg';
                                    } ?>" id="profile_photo">

                        <div class="img_overlay" id="change_img">
                            <img src="./imagens/camera.png" id="camera_icon">
                            <p>Mudar Imagem de Perfil</p>
                        </div>
                    </div>
                </div>

                <div class="content_info">
                    <h4><?php echo getProfileName(); ?></h4>
                    <br>
                    <section class="pcontent_info">
                        <div>
                            <p>E-MAIL:</p>
                        </div>
                        <div>
                            <p><?php echo getProfileEmail(); ?></p>
                        </div>
                    </section>

                    <section class="pcontent_info">
                        <div>
                            <p>SENHA:</p>
                        </div>
                        <div>
                            <button class="change_password" id="btCPW">Alterar Senha</button>

                        </div>
                    </section>
                </div>

            </div>
        </article>

        <div id="modal-changepw" class="modal-changepw">
            <div class="modal">
                <form>
                    <p>Insira sua senha atual:</p>
                    <input class="input-pw" type="password" id="old-pw">
                    <p>Insira sua nova senha:</p>
                    <input class="input-pw" type="password" id="new-pw">
                    <p>Confirme sua nova senha:</p>
                    <input class="input-pw" type="password" id="new-pw-confirm"><br><br>
                    <div class="button-box">
                        <button id="cancelCPW" class="cpw-bts">Cancelar</button>
                        <input id="confirm-cpw" class="cpw-bts" type="button" value="Confirmar">
                    </div>

                </form>
            </div>
        </div>

        <div id="modal-photo" class="modal-changeImg">
            <div class="modal-img">
                <form action="profile.php" method="POST" enctype="multipart/form-data">
                    <div id="upload-box">
                        <input type='file' name="imageInput" accept="image/*" id="arq" />
                    </div>
                    <br>
                    <div class="button-box">
                        <button id="cancelCImg" class="cpw-bts">Cancelar</button>
                        <input type="button" value="Upload File" name="submit" id="upload-bt" class="cpw-bts" />
                    </div>
                </form>
            </div>
        </div>

    </section>
    <!-- CONTEÚDO -->

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

<script src="scripts/changePassword.js" type="text/javascript"></script>
<script src="scripts/changeImg.js" type="text/javascript"></script>
<p id="senha_valor" style="display: none;"><?php echo getPassword(); ?></p>

</html>

<?php
if (isset($_GET['np'])) {
    $newP = $_GET['np'];
    changePassword($newP);
    echo "<script> alert('Senha alterada com sucesso!'); </script>";
    echo "<script>  window.location.href = 'profile.php'; </script>";
}
?>