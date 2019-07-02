<?php

class ProdutoDao {

    private $conexao;

    function __construct($conexao) { //Passa a conexão para o ProdutoDao
        $this->conexao = $conexao;
    }

    function listaProdutos() {
        $produtos = array();
        $resultado = mysqli_query($this->conexao, "select p.*, c.nome as categoria_nome 
        from produtos as p join categoria as c on c.id=p.categorias_id");
    
        // Pega o produto associado a este resultado
        while($produto_array = mysqli_fetch_assoc($resultado)) {
    
            
            $categoria = new Categoria();
            $categoria->setNome($produto_array['categoria_nome']);
            
            $produto_id = $produto_array['id'];
            $nome = $produto_array['nome'];
            $preco = $produto_array['preco'];
            $descricao = $produto_array['descricao'];
            $usado = $produto_array['usado'];
            $isbn = $produto_array['isbn'];
            $tipoProduto = $produto_array['tipoProduto'];

            if ($tipoProduto == "Livro") {
                $produto = new Livro($nome, $preco, $descricao, $categoria, $usado);
                $produto->setIsbn($isbn);        
            } else {
                $produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
            }

            $produto->setId($produto_id);

            array_push($produtos, $produto);
        }
        
        return $produtos;
    }
    
    function insereProduto(Produto $produto) {
    
        $isbn = "";
        if ($produto->temIsbn())  {
            $isbn = $produto->getIsbn();
        }

        $tipoProduto = get_class($produto);
        
        $query = "insert into produtos (nome, preco, descricao, categorias_id, 
            usado, isbn, tipoProduto) values ('{$produto->getNome()}', 
            {$produto->getPreco()}, '{$produto->getDescricao()}', 
            {$produto->getCategoria()->getId()}, {$produto->getUsado()}, 
            '{$isbn}', '{$tipoProduto}')";
    
        return mysqli_query($this->conexao, $query);
    }

    function alteraProduto(Produto $produto) {
    
        $isbn = "";
        if ($produto->temIsbn())  {
            $isbn = $produto->getIsbn();
        }

        $tipoProduto = get_class($produto);

        $query = "update produtos set nome = '{$produto->getNome()}', 
            preco = {$produto->getPreco()}, descricao = '{$produto->getDescricao()}',  
            categorias_id = {$produto->getCategoria()->getId()}, 
            usado = {$produto->getUsado()}, isbn = '{$isbn}',
            tipoProduto = '{$tipoProduto}' where id = '{$produto->getId()}'";
    
        return mysqli_query($this->conexao, $query);
    }
    
    function buscaProduto($id) {
    
        $query = "select * from produtos where id = {$id}";
        $resultado = mysqli_query($this->conexao, $query);
        $produto_buscado = mysqli_fetch_assoc($resultado);
    
        $categoria = new Categoria();
        $categoria->setId($produto_buscado['categorias_id']);
    
        $nome = $produto_buscado['nome'];
        $preco = $produto_buscado['preco'];
        $descricao = $produto_buscado['descricao'];
        $usado = $produto_buscado['usado'];
        $isbn = $produto_buscado['isbn'];
        $tipoProduto = $produto_buscado['tipoProduto'];
        
        if ($tipoProduto == "Livro") {
            $produto = new Livro($nome, $preco, $descricao, $categoria, $usado);
            $produto->setIsbn($isbn);        
        } else { 
            $produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
        }

        $produto->setId($produto_buscado['id']);
    
        return $produto;
    }
    
    function removeProduto($id) {
        $query = "delete from produtos where id = {$id}";
        return mysqli_query($this->conexao, $query);
    }

}
?>