<?php

function verificaItensRepetidos($codigo, $destino)
{
    if (isset($_COOKIE[$destino])) {
        $carrinhoCookie = $_COOKIE[$destino];
        $carrinhoCookie = json_decode($carrinhoCookie);
        if($destino == 'favoritos'){
            foreach ($carrinhoCookie as $item) {
                if ($codigo == $item->codigo_livro) {
                    return true;
                }
            }
        } else {
            foreach ($carrinhoCookie as $item) {
                if ($codigo == $item->codigo) {
                    return true;
                }
            }
        }
        return false;
    }
}

function atribuirAoCarrinho($titulo, $autor, $preco, $codigo, $imagem)
{

    if (isset($_COOKIE['carrinho'])) {
        $dados = html_entity_decode($_COOKIE['carrinho']);
        $json = json_decode($dados, true);

        $json[] = ["codigo" => $codigo, 'titulo' => $titulo, "autor" => $autor, "preco" => $preco, "quantidade" => 1, "imagem" => $imagem];

        setcookie('carrinho', json_encode($json));
    } else {
        $json = '[
                {
                    "codigo": "' . $codigo . '",
                    "titulo": "' . $titulo . '",
                    "autor":"' . $autor . '",
                    "preco":' . $preco . ',
                    "quantidade": 1,
                    "imagem":"' . $imagem . '"
                }
            ]';
        setcookie('carrinho', $json);
    }
}
