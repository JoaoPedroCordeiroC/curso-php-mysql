<?php include("cabecalho.php");?>
<?php include("conecta.php");?>
<?php include("banco-produto.php");



$produtos = listaProdutos($conexao);

foreach($produtos as $produto) {
    echo $produto['nome'] . "<br/>";
}

?>

<?php include("rodape.php");?>