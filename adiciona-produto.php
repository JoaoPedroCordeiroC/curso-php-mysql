<?php 
require_once("cabecalho.php");       //require_onde substitui o include e garante que  
require_once("banco-produto.php");   //se esse arquivo já foi incluso não irá incluir 
require_once("logica-usuario.php");  //novamente
require_once("class/Produto.php");
verificaUsuario();

$produto = new Produto();

$produto->nome = $_POST["nome"]; //$_GET pega o valor do parâmetro
$produto->preco = $_POST["preco"];
$produto->descricao = $_POST["descricao"];
$produto->categoria_id = $_POST["categoria_id"];

if(array_key_exists('usado', $_POST)) {
        $produto->usado = "true";
} else {
        $produto->usado = "false";
}

//Executa a query passando em qual conexão e qual query
if(insereProduto($conexao, $produto)) { ?>
        <p class="text-success">O produto <?= $produto->nome; ?>, 
        <?= $produto->preco; ?> foi adicionado com sucesso!</p>
<?php } else { 
                $msg = mysqli_error($conexao);
?>
        <p class="text-danger">O produto <?= $produto->nome; ?> não foi adicionado: <?= $msg?></p>
<?php
    
}
?>

<?php include("rodape.php");?>