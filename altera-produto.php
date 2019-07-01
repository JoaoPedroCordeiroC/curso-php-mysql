<?php require_once("cabecalho.php");
require_once("banco-produto.php");
require_once("class/Produto.php");
require_once("class/Categoria.php");
    
$categoria = new Categoria();
$categoria->setId($_POST['categoria_id']);

$produto = new Produto();
$produto->setId($_POST["id"]);     //Lê o valor dos campos
$produto->setNome($_POST["nome"]); //$_GET pega o valor do parâmetro
$produto->setPreco($_POST["preco"]);
$produto->setDescricao($_POST["descricao"]);

if(array_key_exists('usado', $_POST)) {
        $produto->setUsado("true");
} else {
        $produto->setUsado("false");
}

$produto->setCategoria($categoria);

//Executa a query passando em qual conexão e qual query
if(alteraProduto($conexao, $produto)) { ?>
        <p class="text-success">O produto <?= $produto->getNome(); ?>, 
        <?= $produto->getPreco(); ?> foi alterado com sucesso!</p>
<?php } else { 
        $msg = mysqli_error($conexao);
?>
        <p class="text-danger">O produto <?= $produto->getNome(); ?> 
        não foi alterado: <?= $msg?></p>
<?php
    
}
?>


<?php include("rodape.php");?>