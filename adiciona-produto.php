<?php include("cabecalho.php");?>

<?php
    function insereProduto($conexao, $nome, $preco) {
        $query = "insert into produtos (nome, preco) values ('{$nome}', {$preco})";
        return mysqli_query($conexao, $query);
    }

    $nome = $_GET["nome"]; //$_GET pega o valor do parâmetro
    $preco = $_GET["preco"];

    //Conecta no mysql passando o ip, usuário, senha e nome do banco
    // e nos devolve a conexão com o banco de dados. (ABRE A CONEXÃO)
    $conexao = mysqli_connect('localhost', 'root', '', 'loja'); 
    
    
    //Executa a query passando em qual conexão e qual query
    if(insereProduto($conexao, $nome, $preco)) { ?>
        <p class="text-sucess">O produto <?= $nome; ?>, <?= $preco; ?> foi adicionado com sucesso!</p>
<?php   } else { 
        $msg = mysqli_error($conexao);
?>
        <p class="text-danger">O produto <?= $nome; ?> não foi adicionado: <?= $msg?></p>
<?php
    
}
?>


<?php include("rodape.php");?>