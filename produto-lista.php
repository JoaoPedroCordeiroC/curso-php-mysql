<?php require_once("cabecalho.php");
 require_once("banco-produto.php"); 
 
 ?>

<table class="table table-striped table-bordered">

    <?php
        $produtos = listaProdutos($conexao);
        foreach($produtos as $produto) :
    ?>
    <tr>
        <td><?= $produto['nome'] ?></td>
        <td><?= $produto['preco'] ?></td>
        <td><?= substr($produto['descricao'], 0, 30) ?></td>
        <td><?= $produto['categoria_nome'] ?></td>
        <td><a class="btn btn-primary" 
        href="produto-altera-formulario.php?id=<?=$produto['id']?>">alterar</td>
        <td> 
            <form action="remove-produto.php?" method="post">
                <input type="hidden" name="id" value="<?=$produto['id']?>">
                <button class="btn btn-danger">remover</a></button>
            </form>
        </td>
    </tr>
    <?php
        endforeach
    ?>
</table>

<?php include("rodape.php");?>