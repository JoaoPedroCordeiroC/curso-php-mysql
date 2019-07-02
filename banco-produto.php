<?php
require_once("conecta.php");

function listaProdutos($conexao) {
    $produtos = array();
    $resultado = mysqli_query($conexao, "select p.*, c.nome as categoria_nome 
    from produtos as p join categoria as c on c.id=p.categorias_id");

    // Pega o produto associado a este resultado
    while($produto_array = mysqli_fetch_assoc($resultado)) {

        
        $categoria = new Categoria();
        $categoria->setNome($produto_array['categoria_nome']);
        
        $nome = $produto_array['nome'];
        $preco = $produto_array['preco'];
        $descricao = $produto_array['descricao'];
        $usado = $produto_array['usado'];

        $produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
        $produto->setId($produto_array['id']);

        array_push($produtos, $produto);
    }
    
    return $produtos;
}

function insereProduto($conexao, Produto $produto) {

    $query = "insert into produtos (nome, preco, descricao, categorias_id, usado) 
        values ('{$produto->getNome()}', {$produto->getPreco()}, 
        '{$produto->getDescricao()}', {$produto->getCategoria()->getId()}, 
        {$produto->getUsado()})";

    return mysqli_query($conexao, $query);
}
function alteraProduto($conexao, Produto $produto) {

    $query = "update produtos set nome = '{$produto->getNome()}', 
        preco = {$produto->getPreco()}, descricao = '{$produto->getDescricao()}',  
        categorias_id = {$produto->getCategoria()->getId()}, 
        usado = {$produto->getUsado()} where id = '{$produto->getId()}'";

    return mysqli_query($conexao, $query);
}

function buscaProduto($conexao, $id) {

    $query = "select * from produtos where id = {$id}";
    $resultado = mysqli_query($conexao, $query);
    $produto_buscado = mysqli_fetch_assoc($resultado);

    $categoria = new Categoria();
    $categoria->setId($produto_buscado['categorias_id']);

    $nome = $produto_buscado['nome'];
    $preco = $produto_buscado['preco'];
    $descricao = $produto_buscado['descricao'];
	$usado = $produto_buscado['usado'];

    $produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
    $produto->setId($produto_buscado['id']);

    return $produto;
}

function removeProduto($conexao, $id) {
    $query = "delete from produtos where id = {$id}";
    return mysqli_query($conexao, $query);
}