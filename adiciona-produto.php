<?php 
require_once("cabecalho.php");       //require_onde substitui o include e garante que  
require_once("banco-produto.php");   //se esse arquivo já foi incluso não irá incluir 
require_once("logica-usuario.php");  //novamente
require_once("class/Produto.php");
require_once("class/Categoria.php");
verificaUsuario();

$categoria = new Categoria();
$categoria->setId($_POST["categoria_id"]);

$produto = new Produto();
$produto->setNome($_POST["nome"]); //$_GET pega o valor do parâmetro
$produto->setPreco($_POST["preco"]);
$produto->setDescricao($_POST["descricao"]);
$produto->setCategoria($categoria);

if(array_key_exists('usado', $_POST)) {
        $produto->setUsado("true");
} else {
	$produto->setUsado("false");
}

//Executa a query passando em qual conexão e qual query
if(insereProduto($conexao, $produto)) { ?>
        <p class="text-success">O produto <?= $produto->getNome(); ?>, 
        <?= $produto->setPreco(); ?> foi adicionado com sucesso!</p>
<?php } else { 
                $msg = mysqli_error($conexao);
?>
        <p class="text-danger">O produto <?= $produto->getNome(); ?>
         não foi adicionado: <?= $msg?></p>
<?php
    
}
?>

<?php include("rodape.php");?>