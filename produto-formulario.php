<?php include("cabecalho.php");?>
    <h1>Formulario de produto</h1>
<form action="adiciona-produto.php">
    <table>
        <tr>
            <td>Nome:</td> 
            <td><input class="form-control" type="text" name="nome"><br></td>
        </tr>
        <tr>
            <td>Preco:</td>
            <td><input class="form-control" type="text" name="preco"><br></td>
        </tr>
        <tr>
            <td>
                <button class="btn btn-primary" type="submit">Cadastrar</button>
            </td>
        </tr>
        
    </table>
    
</form>
<?php include("rodape.php");?>