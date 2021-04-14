<?php

    function pegarLivrosJson(){
        $arquivo= file_get_contents('livros.json');
        $json = json_decode($arquivo);
        return $json;
    }
?>