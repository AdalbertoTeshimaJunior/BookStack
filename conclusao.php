<?php 
   date_default_timezone_set('America/Sao_Paulo');
   setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
   $info = "\t\t\t>>> COMPROVANTE DE COMPRA BOOKSTACK <<<\n
    Jundiaí, ".strftime('%d de %B de %Y', strtotime('today'))."\n
> INFORMAÇÕES DO CLIENTE
    Cliente: ".$_POST['nome']."
    CNPJ/CPF: ".$_POST['cpf']."
    Email: ".$_POST['email']."
> ENDEREÇO
    Rua: ".$_POST['rua']."
    Numero: ".$_POST['numero']."
    Bairro: ".$_POST['bairro']."
    CEP: ".$_POST['cep']."
    Estado: ".$_POST['estado']."
> PEDIDO\n";
    echo "<h1>".$_COOKIE['carrinho']."</h1>";    
    $carrinhoCookie = $_COOKIE['carrinho'];
    $carrinhoCookie = json_decode($carrinhoCookie);
    $totalSemDesconto = 0;
    foreach($carrinhoCookie as $item) {
        $quantidade = $item -> quantidade;
        $titulo = $item -> titulo;
        $preco = $item -> preco;

        $totalSemDesconto += $preco * $quantidade;
        $linha = "    (".$quantidade.") ".$titulo." R$".$preco."\n";
        $info = $info.$linha;
    }

    $desconto = $_COOKIE['desconto'];
    $total = $totalSemDesconto - ($totalSemDesconto * ($desconto/100));
    $totalPedido = "> TOTAL DO PEDIDO
    Total: R$".$totalSemDesconto."
    Desconto: ".$desconto."%
    Total à ser pago: R$".$total;
    $info = $info.$totalPedido;
    // Criação do arquivo comprovante.txt
    $comprovante = fopen('comprovanteBS.txt','w');
    fwrite($comprovante, $info);
    fclose($comprovante);

?>
<!DOCTYPE html>
<html lang="pt-br">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Adalberto Teshima, Davi Henrique e Yngredh Cruz">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/top-bar.css">
        <link rel="stylesheet" href="css/conclusao.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <link rel="icon" type="image/x-icon" href="imagens/booklogo.png">
        <title>Book Stack</title>

    </head>

    <body>
        <header>
            <ul>
                <li id="logo-box">
                    <a id="link-menu-logo"  href="index.php"><img id="logo" src="imagens/Logo.png" alt=""></a>
                </li>
                <div id="botoes-menu">
                </div>
            </ul>
        </header>

        <article>
            <div class="option-button">
                <a href="">Baixar comprovante de compra</a>
            </div>
            <div class="option-button">
                <a href="index.php">Continue comprando</a>
            </div>
            <div class="option-button">
                <a href="index.php">Voltar ao início</a>
            </div>
        </article>
    </body>
</html>
