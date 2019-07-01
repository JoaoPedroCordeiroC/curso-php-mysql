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