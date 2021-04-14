<?php

    function escreverInformacoes(){
        $info = "\t\t\t>>> COMPROVANTE DE COMPRA BOOKSTACK <<<\n
    ".obterData()."
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

        $info = escreverProdutosETotal($info);
        
        // Criação do arquivo comprovante.txt
        $comprovante = fopen('comprovanteBS.txt','w');
        fwrite($comprovante, $info);
        fclose($comprovante);
    }

    function escreverProdutosETotal($info){
        $carrinhoCookie = $_COOKIE['carrinho'];
        $carrinhoCookie = json_decode($carrinhoCookie);
        $totalSemDesconto = 0;
        foreach($carrinhoCookie as $item) {
            $quantidade = $item -> quantidade;
            $titulo = $item -> titulo;
            $preco = $item -> preco;
            $totalSemDesconto += $preco * $quantidade;
            $linha = "    (".$quantidade.") ".$titulo." R$".number_format($preco, 2, "," , ".")."\n";
            $info = $info.$linha;
        }

        $desconto = $_COOKIE['desconto'];
        $total = $totalSemDesconto - ($totalSemDesconto * ($desconto/100));
        $totalPedido = "    > TOTAL DO PEDIDO \n    Total: R$".number_format($totalSemDesconto, 2, "," , ".")."\n    Desconto: ".$desconto."%\n    Total à ser pago: R$".number_format($total, 2, "," , ".");
        $info = $info.$totalPedido;
        return $info;
    }
    
    function obterData(){
        date_default_timezone_set('America/Sao_Paulo');
        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        return "Jundiaí," .strftime('%d de %B de %Y', strtotime('today'))."\n";
    }
    
?>