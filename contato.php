<?php require_once("cabecalho.php"); ?>
<form action="envia-contato.php" method="post">
    <table class="table">
        <tr>
            <td>Nome</td>
            <td><input type="text" name="nome" class="form-control"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" class="form-control"></td>
        </tr>
        <tr>
            <td>Mensagem</td>
            <td><textarea type="text" class="form-control" name="mensagem"></textarea></td>
        </tr>
        <tr>
            <td><button class="btn btn-primary">Enviar</button></td>
        </tr>
    </table>
</form>
<?php require_once("rodape.php"); ?>