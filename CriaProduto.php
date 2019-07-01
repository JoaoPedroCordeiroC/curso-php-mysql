<?php
    //Importando o que é externo para podermos utilizar.
    require_once("class/Produto.php"); 

    //Instanciando a classe para criar utilizar o objeto.
    $livro = new Produto();

    //Usa -> para acessar o atributo de um objeto.
    $livro->nome = "Livro de PHP e OO";

    var_dump($livro);
?>