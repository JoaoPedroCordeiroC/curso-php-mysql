<?php
function listaProdutos($conexao) {
    $produtos = array();
    $resultado = mysqli_query($conexao, "select p.*, c.nome as categoria_nome 
    from produtos as p join categoria as c on c.id=p.categorias_id");

    // Pega o produto associado a este resultado
    while($produto = mysqli_fetch_assoc($resultado)) {
        array_push($produtos, $produto);

    }
    return $produtos;
}

function insereProduto($conexao, $nome, $preco, $descricao, $categorias_id) {
        $query = "insert into produtos (nome, preco, descricao, categorias_id) 
        values ('{$nome}', {$preco}, '{$descricao}', {$categorias_id})";
        return mysqli_query($conexao, $query);
}
    
function removeProduto($conexao, $id) {
    $query = "delete from produtos where id = {$id}";
    return mysqli_query($conexao, $query);
}