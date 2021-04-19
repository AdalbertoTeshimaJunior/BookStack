<?php
if (isset($_COOKIE['carrinho'])) {
    $carrinhoCookie = $_COOKIE['carrinho'];
    $carrinhoCookie = json_decode($carrinhoCookie);

    if (isset($_GET['remover'])) {
        $idDoLivro = $_GET['remover'];

        unset($carrinhoCookie[$idDoLivro]);
        $json_arr = array_values($carrinhoCookie);
        setcookie('carrinho', json_encode($json_arr));
    }
}
?>

<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/carrinho.css">
    <link rel="stylesheet" href="css/formulario.css">
    <link rel="stylesheet" href="css/top-bar.css">
    <link rel="icon" type="image/x-icon" href="imagens/carinho.png">
    <title>Carrinho</title>
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

    <section id="carrinho-area">

        <div id="titulo-livros">
            <p>LIVROS</p>
        </div>

        <div id="titulo-quantidade">
            <p>QUANTIDADE</p>
        </div>

        <div id="titulo-unitario">
            <p>PREÇO UNIT.(R$)</p>
        </div>

        <div id="titulo-total">
            <p>PREÇO TOTAL(R$)</p>
        </div>

        <article class="carrinho" id="carrinho">
            <div id="carrinho-vazio">
                <img id="sadpepe" src="imagens/sadPepe.png">
            </div>
            <div class="item" id="item-0">
                <div id="livro">
                    <img id="item-imagem">
                    <div id="info-livro">
                        <p id="titulo" style="font-weight:900;"></p>
                        <p id="autor"></p>
                    </div>
                </div>

                <div id="quantidade-unitario-book">
                    <img id="quantidade-menos" onclick="diminuirQuantidade(this);" src="imagens/menos.svg" alt="">
                    <input id="quantidade" type="number" min="1" onchange="calcularUnidadeInput(this);">
                    <img id="quantidade-mais" onclick="acrescentarQuantidade(this);" src="imagens/mais.svg" alt="">
                </div>

                <p id="unidade"></p>

                <p id="total" class="total"></p>

                <div id="botao_item">
                    <a href="carrinho.php" onclick="location.href = this.href+'?remover='+ this.id;return false;">
                        <img id="remover_botao" src="imagens/remover.svg" alt=""></img>
                    </a>
                </div>
            </div>

        </article>
    </section>

    <section id="preco-area">
        <article id="info-preco">
            <label id="valor-pedido">
                <p>Valor do Pedido:</p>
                <p id="valor-sem-desconto"></p>
            </label>

            <label id="desconto-box">
                Desconto:
                <input id="desconto" type="number" min="0" onchange="calculoTotal();">
            </label>

            <label id="total-pedido">
                TOTAL À SER PAGO:
                <p id="valor-total"></p>
            </label>

            <div id="next-button">
                <a href="form.php">
                    <p>PROSSEGUIR</p>
                    <img src="imagens/outline_arrow_forward_white_24dp.png">
                </a>
            </div>
        </article>
    </section>

    <script src="scripts/pagamento.js" type="text/javascript"></script>
    <script src="scripts/verificar.js" type="text/javascript"></script>
</body>

</html>