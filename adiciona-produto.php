<?php include("cabecalho.php");?>

<?php
    $nome = $_GET["nome"]; //$_GET pega o valor do parâmetro
    $preco = $_GET["preco"];
?>

<p class="alert-sucess">Produto <?= $nome; ?>, <?= $preco; ?> adicionado com sucesso!</p>
<?php include("rodape.php");?>