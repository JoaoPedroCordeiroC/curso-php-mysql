<?php 
require_once("cabecalho.php");       //require_once substitui o include e garante que  
require_once("logica-usuario.php");  //se esse arquivo já foi incluso não irá 
                                        //incluir novamente
verificaUsuario();

$categoria = new Categoria();
$categoria->setId($_POST["categoria_id"]);

$nome = $_POST["nome"]; //$_GET/POST pega o valor do parâmetro
$preco = $_POST["preco"];
$descricao = $_POST["descricao"];
$isbn = $_POST['isbn'];
$tipoProduto = $_POST['tipoProduto'];

if(array_key_exists('usado', $_POST)) {
        $usado = "true";
} else {
	$usado = "false";
}

if ($tipoProduto == "Livro") {
        $produto = new Livro($nome, $preco, $descricao, $categoria, $usado);
        $produto->setIsbn($isbn);        
} else {
        $produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
}

$produtoDao = new ProdutoDao($conexao);

//Executa a query passando em qual conexão e qual query
if($produtoDao->insereProduto($produto)) { ?>
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