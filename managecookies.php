<?php

/**
 * Organiza os dados do livro requeridos no cookie do carrinho em variávies
 * @param {*recebe o ID do livro} $idDoLivro
 */
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
/**
 * Verifica se o item já está armazenado em um dos cookies do site
 * @param {*codigo do produto} $codigo
 * @param {*nome do cookie} $destino
 * @return true caso o item já esteja nos cookies or
 * @return false caso o item não esteja nos cookies
 */
function verificaItensRepetidos($codigo, $destino)
{
    if (isset($_COOKIE[$destino])) {
        $carrinhoCookie = $_COOKIE[$destino];
        $carrinhoCookie = json_decode($carrinhoCookie);

        if (!$carrinhoCookie == null) {
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
        } else {
            return false;
        }
    }
}
/**
 * Atribui o livro no cookie do carrinho
 * @param {*recebe os dados do livro} 
 */
function atribuirAoCarrinho($titulo, $autor, $preco, $codigo, $imagem)
{
    $dados = html_entity_decode($_COOKIE['carrinho']);
    $json = json_decode($dados, true);

    $json[] = ["codigo" => $codigo, 'titulo' => $titulo, "autor" => $autor, "preco" => $preco, "quantidade" => 1, "imagem" => $imagem];

    setcookie('carrinho', json_encode($json));
}
/**
 * Adiciona um item no cookie de favoritos
 * @param {*recebe o ID do livro e a imagem do livro} $idDoLivro, $imagem
 */
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
function removerItem($index)
{
    $favCookie = $_COOKIE['favoritos'];
    $favCookie = json_decode($favCookie);

    unset($favCookie[$index]);
    $newFavCookie = array_values($favCookie);
    setcookie('favoritos', json_encode($newFavCookie));
}
function calcularTotal()
{
    $carrinhoCookie = $_COOKIE['carrinho'];
    $carrinhoCookie = json_decode($carrinhoCookie);
    $total = 0;
    foreach ($carrinhoCookie as $item) {
        $quantidade = $item->quantidade;
        $preco = $item->preco;
        $total += $preco * $quantidade;
    }
    return $total;
}
function calcularDesconto($total)
{
    if (isset($_COOKIE['desconto'])) {
        $cupom = $_COOKIE['desconto'];
        $desconto = getDiscount($cupom);
        $totalComDesconto = $total - ($total * ($desconto / 100));
        return $totalComDesconto;
    } else {
        return $total;
    }
}

function addShelfButton($idDoLivro, $imagem)
{
    if (isset($_COOKIE['favoritos'])) {

        if (!verificaItensRepetidos($idDoLivro, 'favoritos')) {
            atribuirAEstante($idDoLivro, $imagem);
            setcookie("last_fav", $idDoLivro);
        } else {
            echo "<script src='scripts/addButtons.js'></script>";
            echo "<script> listenBackButton() </script>";
        }
    } else {
        setcookie('favoritos', json_encode(getFavoriteBooks(obterIdDoUsuario())));
    }
}
function addCartButton($idDoLivro, $allBookInfo)
{
    if (isset($_COOKIE['carrinho'])) {

        if (!verificaItensRepetidos($idDoLivro, 'carrinho')) {
            atribuirAoCarrinho($allBookInfo['titulo'], $allBookInfo['autor'], $allBookInfo['preco'], $idDoLivro, $allBookInfo['imagem']);
            setcookie("last_cart", $idDoLivro);
        } else {
            echo "<script src='scripts/addButtons.js'></script>";
            echo "<script> listenBackButton() </script>";
        }
    } else {
        setcookie('carrinho', json_encode(getFavoriteBooks(obterIdDoUsuario())));
    }
}
