<tr>
    <td>Nome:</td> 
    <td>
        <input class="form-control" type="text" name="nome" 
        value="<?=$produto->getNome()?>" ><br>
    </td>
    </tr>
    <tr>
        <td>Preco:</td>
        <td><input class="form-control" type="number" name="preco"
        value="<?=$produto->getPreco()?>"><br></td>
    </tr>
<tr>
    <td>Descrição:</td>
    <td>
        <textarea class="form-control" 
        name="descricao"><?=$produto->getDescricao()?></textarea>
    </td>
</tr>

<?php
    $usado = $produto->getUsado() ? "checked='checked'" : "";
?>
        
<tr>
    <td></td>
    <td><input type="checkbox" name="usado" <?=$produto->getUsado()?> value="true"> Usado
</tr>
<tr>
    <td>Categoria:</td>
    <td>
        <select name="categoria_id" class="form-control">
        <?php foreach($categorias as $categoria) : 
            $essaEhACategoria = $produto->getCategoria()->getId() == $categoria->getId();
            $selecao = $essaEhACategoria ? "selected='selected'" : "";
        ?>
        <option 
        value="<?=$categoria->getId()?>" <?=$selecao?>><?=$categoria->getNome()?>
        </option>
        <?php endforeach ?>
        </select>
    </td>
</tr>
<tr>
    <td>Tipo do Produto</td>
    <td>
        <select name="tipoProduto" class="form-control">
        <?php 
        $tipos = array("Produto", "Livro");
        foreach($tipos as $tipo) : 
            $essaEhOTipo = get_class($produto) == $tipo;
            $selecao = $essaEhOTipo ? "selected='selected'" : "";
        ?>
        <option 
            value="<?=$tipo?>" <?=$selecao?>><?=$tipo?>
        </option>
        <?php endforeach ?>
        </select>
    </td>
</tr>
<tr>
    <td>ISBN (caso seja um livro)</td>
    <td>
        <input type="text" name="isbn" class="form-control" 
        value="<?php if ($produto->temIsbn()) { echo $produto->getIsbn(); } ?>">
    </td>
</tr>