<?php
include("gerenciarcarrinho.php");
include("json.php");

if (!isset($_COOKIE['desconto'])) {
    setcookie('desconto', 0);
}

$json = pegarLivrosJson();
$livros = $json->livros;

if (isset($_GET['adicionar'])) {

    $idDoLivro = $_GET['adicionar'];

    if (!verificaItensRepetidos($idDoLivro)) {
        foreach ($livros as $livro) {

            if ($livro->id == $idDoLivro) {
                $titulo = $livro->titulo;
                $autor = $livro->autor;
                $preco = $livro->preco;
                $foto = $livro->foto;
                $id = $livro->id;

                atribuirAoCarrinho($titulo, $autor, $preco, $id, $foto);
                break;
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Adalberto Teshima, Davi Henrique e Yngredh Cruz">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/storepage.css">
    <link rel="stylesheet" href="css/top-bar.css">
    <script src="scripts/lojinha.js" type="text/javascript"></script>
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
                    <a href="store.php" onclick="location.href = this.href+'?adicionar='+ this.id;return false;">Adicionar ao Carrinho</a>
                </div>
            </div>
        </article>
    </section>
</body>

</html>

<?php
echo "<script>
    exibirProdutos(" . json_encode($livros) . ");
    </script>";
?>