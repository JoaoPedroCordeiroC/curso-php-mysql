<?php include("cabecalho.php");?>
<?php include("conecta.php");

$resultado = mysqli_query($conexao, "select * from produtos");

    // Pega o produto associado a este resultado
while($produto = mysqli_fetch_assoc($resultado)) {
    echo $produto['nome'] . "<br/>";
}


?>

<?php include("rodape.php");?>