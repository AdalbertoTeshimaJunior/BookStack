<?php
    
    function verificaItensRepetidos($id) {
        if (isset($_COOKIE['carrinho'])) {
            $carrinhoCookie = $_COOKIE['carrinho'];
            $carrinhoCookie = json_decode($carrinhoCookie);
            foreach($carrinhoCookie as $item) {
                if ($id == $item -> id) {
                    return true;
                }
            }
            return false;
        }
    }

    function atribuirAoCarrinho($titulo,$autor,$preco, $id, $foto){
        
        if(isset($_COOKIE['carrinho'])){
            $dados = html_entity_decode($_COOKIE['carrinho']);
            $json = json_decode($dados, true);

            $json[] = [ "id" => $id, 'titulo' => $titulo, "autor" => $autor, "preco" => $preco, "quantidade" => 1, "foto" => $foto ];

            setcookie('carrinho', json_encode($json));
        }else{
            $json = '[
                {
                    "id": "'.$id.'",
                    "titulo": "'.$titulo.'",
                    "autor":"'.$autor.'",
                    "preco":'.$preco.',
                    "quantidade": 1,
                    "foto":"'.$foto.'"
                }
            ]';
            setcookie('carrinho', $json);
        }
    }
?>