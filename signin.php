<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/top-bar.css">
    <link rel="stylesheet" href="css/register.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
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
                                <a id="link-menu" href="carrinho.php"><img id="img-carrinho" src="imagens/carinho.png"
                                        alt="Carrinho"></a>
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
    <!-- BARRA SUPERIOR -->

    <section>
        <div class="field" id="divulgation">
            <h1>Onde você encontra tudo que falta na sua estante</h1>
            <p>Promoções todo mês</p>
            <p>Encontre seus livros favoritos</p>
            <p>Crie e compartilhe sua estante dos sonhos</p>
        </div>
        <div class="field" id="signin-form">
            <h4 id="signinH4">Crie sua conta</h4>
            <form action="profile.php" id="signinForm">
                <input type="text" placeholder="Nome" name="userName" id="user-Name">
                <input type="text" placeholder="Email address" name="userEmail" id="user-Email">
                <input type="password" placeholder="Password" name="userPassword" id="user-Password">
                <div id="button-link">
                    <input id="signin-button" name="signin" value="REGISTRAR"
                        onclick="signinValidation();">
                    <p id="p-link">Já possui uma conta? <a href="login.php"><i>clique aqui</i></a></p>
                </div>
            </form>
        </div>
    </section>
    <script src="scripts/register.js" type="text/javascript"></script>
</body>

</html>