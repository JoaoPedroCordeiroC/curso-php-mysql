<?php include("cabecalho.php");?>

<?php
    $nome = $_GET["nome"]; //$_GET pega o valor do parâmetro
    $preco = $_GET["preco"];

    //Conecta no mysql passando o ip, usuário, senha e nome do banco
    // e nos devolve a conexão com o banco de dados. (ABRE A CONEXÃO)
    $conexao = mysqli_connect('localhost', 'root', '', 'loja'); 
    $query = "insert into produtos (nome, preco) values ('{$nome}', {$preco})";

    //Executa a query passando em qual conexão e qual query
    mysqli_query($conexao, $query);

    //Depois de executar fecha a conexão
    mysqli_close($conexao);
?>

<p class="alert-sucess">Produto <?= $nome; ?>, <?= $preco; ?> adicionado com sucesso!</p>
<?php include("rodape.php");?>