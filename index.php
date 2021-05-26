<?php
include("dbmanager.php");
include("sessionManager.php");
$urlPerfil = urlPerfil();
$urlEstante = urlEstanteDoSonho();
$urlCarrinho = urlCarrinho();

$conexao = mysqli_connect("localhost", "root", "", "bookstack");
if (!$conexao) {
  include("createdatabase.php");
  create();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="author" content="Adalberto Teshima, Davi Henrique, Lucas Nakahara e Yngredh Cruz">
  <link rel="stylesheet" href="css/top-bar.css">
  <link rel="stylesheet" href="css/footer.css">
  <link rel="stylesheet" href="css/index.css">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap" rel="stylesheet">
  <script src="scripts/search.js" type="text/javascript"></script>
  <script src="scripts/store.js" type="text/javascript"></script>
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
  <section class="banner-container">
    <img class="banner" src="imagens/header1.png">
  </section>

  <section class="lancamentos-container">
    <div id="botao-esquerdo">
      <img src="imagens/icone-esquerdo.png" alt="">
    </div>

    <div id="livros-container">
      <?php
      $sql = "SELECT * 
			FROM livro 
			ORDER BY codigo DESC";
      $tabela = mysqli_query($conexao, $sql);
      $contagem = 10;
      while ($linha = mysqli_fetch_array($tabela)) {
      ?>
        <div id="livro">
          <div id="imagem-container">
            <img src="<?php echo $linha['imagem']; ?>" class="<?php echo $linha['codigo'] ?>" onclick="enviarId(this);" id="livro-imagem">
          </div>
          <p id="titulo"><?php echo $linha['titulo']; ?></p>
          <p id="preco">R$ <?php echo $linha['preco']; ?></p>
          <div id="button-container">
            <a id="button" onclick="enviarId(this);" class="<?php echo $linha['codigo'] ?>">Ver mais</a>
          </div>
        </div>
      <?php
        $contagem--;
        if ($contagem == 0) {
          break;
        }
      }
      ?>
    </div>

    <div id="botao-direito">
      <img src="imagens/icone-direito.png" alt="">
    </div>
  </section>

  <section class="ad-container">
    <img src="imagens/AD01.png" class="ad" id="ad-2" onclick="window.location.href = 'bookScreen.php?codigo=1'">
    <img src="imagens/AD04.png" class="ad" id="ad-1">
    <img src="imagens/AD03.png" class="ad" id="ad-3" onclick="window.location.href = 'bookScreen.php?codigo=13'">
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
  <script src="scripts/navegacao.js" type="text/javascript"></script>
</body>

</html>
<?php
mysqli_close($conexao);
?>