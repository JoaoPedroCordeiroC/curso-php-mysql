<?php include("cabecalho.php");
include("conecta.php");
include("banco-produto.php");
    

$nome = $_POST["nome"]; //$_GET pega o valor do parâmetro
$preco = $_POST["preco"];
$descricao = $_POST["descricao"];
$categoria_id = $_POST["categoria_id"];
if(array_key_exists('usado', $_POST)) {
        $usado = "true";
} else {
        $usado = "false";
}

//Executa a query passando em qual conexão e qual query
if(insereProduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado)) { ?>
        <p class="text-success">O produto <?= $nome; ?>, <?= $preco; ?> 
        foi adicionado com sucesso!</p>
<?php } else { 
                $msg = mysqli_error($conexao);
?>
        <p class="text-danger">O produto <?= $nome; ?> não foi adicionado: <?= $msg?></p>
<?php
    
}
?>


<?php include("rodape.php");?>