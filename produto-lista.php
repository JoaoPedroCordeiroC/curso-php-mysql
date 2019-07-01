<?php require_once("cabecalho.php");
 require_once("banco-produto.php"); 
 
 ?>

<table class="table table-striped table-bordered">

    <?php
        $produtos = listaProdutos($conexao);
        foreach($produtos as $produto) :
    ?>
    <tr>
        <td><?= $produto->getNome() ?></td>
        <td><?= $produto->getPreco() ?></td>
        <td><?= $produto->precoComDesconto(0.1) ?></td>
        <td><?= substr($produto->getDescricao(), 0, 30) ?></td>
        <td><?= $produto->getCategoria()->getNome() ?></td>
        <td>
            <a class="btn btn-primary" 
            href="produto-altera-formulario.php?id=<?=$produto->getId()?>">alterar
        </td>
        <td> 
            <form action="remove-produto.php?" method="post">
                <input type="hidden" name="id" value="<?=$produto->getId()?>">
                <button class="btn btn-danger">remover</a></button>
            </form>
        </td>
    </tr>
    <?php
        endforeach
    ?>
</table>

<?php include("rodape.php");?>