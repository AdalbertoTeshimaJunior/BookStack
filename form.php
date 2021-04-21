<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/formulario.css">
    <link rel="stylesheet" href="css/top-bar.css">
    <link rel="icon" type="image/x-icon" href="imagens/carinho.png">
    <title>Formulário</title>
</head>
<!-- BARRA SUPERIOR -->

<!-- FORMULÁRIO -->

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
    <article id="titulo-formulario">
        <h1>Preencha os dados abaixo</h1>
    </article>

    <section id="formulario-area">

        <form action="conclusao.php" method="post" id="form_dados" name="dados">
            <article id="dados_pessoais">
                <h3> Dados Pessoais</h3>

                <label>Nome Completo: </label><br>
                <input type="text" name="nome" id="nome_input" class="input-area" onchange="validacaoReset(this);">
                <br>
                <label>E-mail: </label><br>
                <input type="text" name="email" id="email_input" class="input-area" onchange="validacaoReset(this);">
                <br>
                <label>CPF: </label><br>
                <input type="number" name="cpf" id="cpf_input" class="input-area" onchange="validacaoReset(this);">
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
                <input type="text" name="rua" id="rua_input" class="input-area" onchange="validacaoReset(this);">
                <br>

                <div id="bairro-estado-container">
                    <div>
                        <label>Bairro: </label> <br>
                        <input type="text" name="bairro" id="bairro_input" class="input-area" size="90%" onchange="validacaoReset(this);">
                    </div>

                    <div id="estado-conteiner">
                        <label>Estado: </label><br>
                        <input type="text" name="estado" id="estado_input" size="10%" onchange="validacaoReset(this);">
                    </div>

                </div>

                <div id="cep-numero-container">
                    <div id="cep-container">
                        <label>CEP: </label> <br>
                        <input type="number" name="cep" id="cep_input" class="input-area" onchange="validacaoReset(this);">
                    </div>

                    <div id="numero-container">
                        <label>Número: </label><br>
                        <input type="number" name="numero" id="numero_input" class="input-area" onchange="validacaoReset(this);">
                    </div>
                </div>

                <label>
                    <input type="checkbox" name="termos" id="termos_check">Aceito os termos da política de compra do site
                </label>

                <div id="botoes-container">
                    <input type="reset" id="botao-reset" name="reset" value="APAGAR">
                    <input id="botao-submit" type="submit" name="submit" value="FINALIZAR" onclick="validacao();">
                </div>
            </article>
        </form>
    </section>

    <script src="scripts/verificarForm.js" type="text/javascript"></script>
</body>

</html>