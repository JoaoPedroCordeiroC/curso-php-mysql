<html>
<?php
    $nome = $_GET["nome"]; //$_GET pega o valor do parâmetro
    $preco = $_GET["preco"];
?>

Produto <?= $nome; ?>, <?= $preco; ?> adicionado com sucesso!
</html>