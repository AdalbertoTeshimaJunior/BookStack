<?php
    if(isset($_COOKIE['carrinho'])){
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
                <div id="botoes-menu">
                    <li id="Carrinho">
                        
                    </li>
                </div>
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
    
                <div class="item" id="item-0">
                    <div id="livro">
                        <img id= "item-imagem">
                        <div id="info-livro">
                            <p id="titulo" style="font-weight:900;"></p>
                            <p id="autor"></p>
                        </div>    
                    </div>
    
                    <div id="quantidade-unitario-book">
                        <img id= "quantidade-menos" src="imagens/menos.svg" alt="">
                        <input id="quantidade" type="number" min="1">
                        <img id= "quantidade-mais" src="imagens/mais.svg" alt="">
                    </div>
    
                    <p id="unidade"></p>
    
                    <p id="total"></p>
    
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
                    Valor do Pedido:
                    <p id="valor-sem-desconto">R$ 812,23</p>
                </label>

                <label id="desconto-box">
                    Desconto aplicado:
                    <input id="desconto"type="number" min="0">
                </label>

                <label id="total-pedido">
                    Total à ser pago:
                    <p id="valor-total">R$ 75,23</p>
                </label>
                
            </article>
            
        </section>

        <section id="formulario-area">

            <article id="titulo-formulario">
                <h1>FORMULÁRIO</h1>
            </article>

            <form action="" method="post" id="form_dados" name="dados">
                <article id="dados_pessoais">
                    <h3> Dados Pessoais</h3>

                    <label>Nome Completo: </label><br>
                    <input type="text" name="nome" id="nome_input" class = "input-area" onchange="validacaoReset(this);">
                    <br>
                    <label>E-mail: </label><br>
                    <input type="text" name="email" id="email_input"  class = "input-area" onchange="validacaoReset(this);">
                    <br>
                    <label>CPF: </label><br>
                    <input type="number" name="cpf" id="cpf_input"  class = "input-area" onchange="validacaoReset(this);">
                    <br>
                    
                    <div id="radio_container">
                        <label>Quer receber e-mails sobre promoções personalizadas? </label><br>
                        <input type="radio" name="ad" id="sim_ad_input" checked> Sim
                        <input type="radio" name="ad" id="nao_ad_input"> Não
                    </div>
                    
                </article>

                <article id="endereco_pessoal">
                    <h3> Endereço</h3>

                    <label>Rua: </label><br>
                    <input type="text" name="rua" id="rua_input" class = "input-area" onchange="validacaoReset(this);">
                    <br>
                    
                    <div id="bairro-estado-container">
                        <div>
                            <label>Bairro: </label> <br>
                            <input type="text" name="bairro" id="bairro_input"
                            class = "input-area"
                            size="90%" onchange="validacaoReset(this);">
                        </div>
                        
                        <div id="estado-conteiner">
                            <label>Estado: </label><br>
                            <input type="text" name="estado" id="estado_input"
                            size="10%" onchange="validacaoReset(this);">
                        </div>
                    
                    </div>
                    
                    <div id="cep-numero-container">
                        <div id="cep-container">
                            <label>CEP: </label> <br>
                            <input type="number" name="cep" id="cep_input"
                            class = "input-area" onchange="validacaoReset(this);">
                        </div>
                        
                        <div id="numero-container">
                            <label>Número: </label><br>
                            <input type="number" name="numero" id="numero_input"
                            class = "input-area" onchange="validacaoReset(this);">
                        </div>
                    </div>
                    
                    <label>
                        <input type="checkbox" name="termos" id="termos_check">Aceito os termos da política de compra do site
                    </label>
                    

                    <div id="botoes-container">
                        <input type="reset" id="botao-reset" name="reset" value="APAGAR"> 
                        <input id="botao-submit" name="submit" value="FINALIZAR" onclick="validacao();">
                    </div>
                </article>
            </form>


        </section>      
        <script src="scripts/pagamento.js" type="text/javascript"></script>
        <script src="scripts/verificar.js" type="text/javascript"></script>
    </body>
</html>

