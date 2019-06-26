<?php include("cabecalho.php");
include("conecta.php");
include("banco-produto.php");
    

        $nome = $_POST["nome"]; //$_GET pega o valor do parâmetro
        $preco = $_POST["preco"];
        $descricao = $_POST["descricao"];

        //Executa a query passando em qual conexão e qual query
        if(insereProduto($conexao, $nome, $preco, $descricao)) { ?>
                <p class="text-success">O produto <?= $nome; ?>, <?= $preco; ?> foi adicionado com sucesso!</p>
<?php   } else { 
                $msg = mysqli_error($conexao);
?>
        <p class="text-danger">O produto <?= $nome; ?> não foi adicionado: <?= $msg?></p>
<?php
    
}
?>


<?php include("rodape.php");?>