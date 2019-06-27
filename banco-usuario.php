<?php 
function buscaUsuario($conexao, $email, $senha) {
    $senhaMd5 = md5($senha); //PHP converte (criptografa) em md5
    $query = "select * from usuarios where email='{$email}' and senha='{$senhaMd5}'";
    $resultado = mysqli_query($conexao, $query); //Executa a query nesta conexão
    $usuario = mysqli_fetch_assoc($resultado); //Pega somente o primeiro dos resultados
    return $usuario;
}

?>