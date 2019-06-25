<?php include("cabecalho.php");?>
            <h1>Bem Vindo!</h1>
<?php include("rodape.php");?>
<?php 

    $numeros = array(1,2,3,4,5,6);

    calcularArray($numeros);

    function calcularArray($numeros) {

        $soma = 0;
        for ($i = 0; $i < sizeof($numeros); $i++) {
            $soma = $soma + $numeros[$i];
        }

        return $soma;

    }

    $soma = calcularArray($numeros);
    echo $soma;
?>