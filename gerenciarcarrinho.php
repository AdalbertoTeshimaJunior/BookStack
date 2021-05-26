<?php

function executarAdicaoCarrinhoUrl($idDoLivro)
{
    if (!verificaItensRepetidos($idDoLivro, 'carrinho')) {

        $livro = getBook($idDoLivro);

        $codigo = $livro['codigo'];
        $titulo = $livro['titulo'];
        $autor = $livro['autor'];
        $preco = $livro['preco'];
        $imagem = $livro['imagem'];

        atribuirAoCarrinho($titulo, $autor, $preco, $codigo, $imagem);
    }
}

function verificaItensRepetidos($codigo, $destino)
{
    if (isset($_COOKIE[$destino])) {
        $carrinhoCookie = $_COOKIE[$destino];
        $carrinhoCookie = json_decode($carrinhoCookie);
        if ($destino == 'favoritos') {
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
    $dados = html_entity_decode($_COOKIE['carrinho']);
    $json = json_decode($dados, true);

    $json[] = ["codigo" => $codigo, 'titulo' => $titulo, "autor" => $autor, "preco" => $preco, "quantidade" => 1, "imagem" => $imagem];

    setcookie('carrinho', json_encode($json));
}

function atribuirAEstante($idDoLivro, $imagem)
{
    $dados = html_entity_decode($_COOKIE['favoritos']);
    $json = json_decode($dados, true);

    $json[] = ["codigo_livro" => $idDoLivro, "imagem" => $imagem];

    setcookie('favoritos', json_encode($json));
}
/**
 * Remove um item (objeto) dos cookies
 * @param {*json preenchido com os livros da tabela favoritos do banco de dados} favbooks 
 */
function removerItem($index){
    $favCookie = $_COOKIE['favoritos'];
    $favCookie = json_decode($favCookie);

    unset($favCookie[$index]);
    $newFavCookie = array_values($favCookie);
    setcookie('favoritos', json_encode($newFavCookie));
}