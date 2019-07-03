<?php

class ProdutoFactory {

    private $classes = array("Produto", "LivroFisico", "Ebook");

    public function criaPor($tipoProduto, $params) {

        $nome = $params['nome'];
        $preco = $params['preco'];
        $descricao = $params['descricao'];
        $categoria = new Categoria();
        $usado = $params['usado'];

        //Saber se o meu tipo de produto está dentro do array $classes
        if(in_array($tipoProduto, $this->classes)) {
            return new $tipoProduto($nome, $preco, $descricao, $categoria, $usado);
        }

        return new Produto($nome, $preco, $descricao, $categoria, $usado);
    }
}

?>