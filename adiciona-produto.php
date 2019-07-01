<?php 
require_once("cabecalho.php");       //require_onde substitui o include e garante que  
require_once("banco-produto.php");   //se esse arquivo já foi incluso não irá incluir 
require_once("logica-usuario.php");  //novamente
require_once("class/Produto.php");
require_once("class/Categoria.php");

verificaUsuario();

$nome = $_POST["nome"]; //$_GET pega o valor do parâmetro
$preco = $_POST["preco"];
$descricao = $_POST["descricao"];
$categoria = new Categoria();
$categoria->setId($_POST["categoria_id"]);

if(array_key_exists('usado', $_POST)) {
        $usado = "true";
} else {
	$usado = "false";
}

$produto = new Produto($nome, $preco, $descricao, $categoria, $usado);

//Executa a query passando em qual conexão e qual query
if(insereProduto($conexao, $produto)) { ?>
        <p class="text-success">O produto <?= $produto->getNome(); ?>, 
        <?= $produto->getPreco(); ?> foi adicionado com sucesso!</p>
<?php } else { 
                $msg = mysqli_error($conexao);
?>
        <p class="text-danger">O produto <?= $produto->getNome(); ?>
         não foi adicionado: <?= $msg?></p>
<?php
    
}
?>

<?php include("rodape.php");?>