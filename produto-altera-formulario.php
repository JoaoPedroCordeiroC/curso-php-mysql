<?php include("cabecalho.php");
include("conecta.php");
include("banco-categoria.php");
include("banco-produto.php");

$id = $_GET['id'];
$produto = buscaProduto($conexao, $id);
$categorias = listaCategorias($conexao);
$usado = $produto['usado'] ? "checked='checked'" : "";
?>
    <h1>Alterando produto</h1>
<form action="altera-produto.php" method="post">
    <table>
        <tr>
            <td>Nome:</td> 
            <td><input class="form-control" type="text" name="nome" 
            value="<?=$produto['nome']?>" ><br></td>
        </tr>
        <tr>
            <td>Preco:</td>
            <td><input class="form-control" type="number" name="preco"
            value="<?=$produto['preco']?>"><br></td>
        </tr>
        <tr>
            <td>Descrição:</td>
            <td><textarea class="form-control" 
            name="descricao"><?=$produto['descricao']?></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="checkbox" name="usado" <?=$usado?> value="true"> Usado
        </tr>
        <tr>
            <td>Categoria:</td>
            <td>
                <select name="categoria_id" class="form-control">
                <?php foreach($categorias as $categoria) : 
                    $essaEhACategoria = $produto['categorias_id'] == $categoria['id'];
                    $essaEhACategoria ? "selected='selected'" : "";
                    ?>
                    <option value="<?=$categoria['id']?>">
                        <?=$categoria['nome']?>
                    </option>
                <?php endforeach?>
                </select>
                
            </td>
        </tr>
        <tr>
            <td>
                <button class="btn btn-primary" type="submit">Alterar</button>
            </td>
        </tr>
        
    </table>
    
</form>
<?php include("rodape.php");?>