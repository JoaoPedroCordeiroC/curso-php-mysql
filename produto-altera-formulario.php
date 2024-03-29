<?php require_once("cabecalho.php");
require_once("banco-categoria.php");

$id = $_GET['id'];
$produtoDao = new ProdutoDao($conexao);
$produto = $produtoDao->buscaProduto($id);

$categoriaDao = new CategoriaDao($conexao);
$categorias = $categoriaDao->listaCategorias();

$selecao_usado = $produto->getUsado() ? "checked='checked'" : "";
$produto->setUsado($selecao_usado);
?>

<h1>Alterando produto</h1>
<form action="altera-produto.php" method="post">
    <input type="hidden" name="id" value="<?=$produto->getId()?>">
    <table class="table">
        <?php include("produto-formulario-base.php"); ?>
        <tr>
            <td>
                <button class="btn btn-primary" type="submit">Alterar</button>
            </td>
        </tr>
        
    </table>
    
</form>
<?php include("rodape.php");?>