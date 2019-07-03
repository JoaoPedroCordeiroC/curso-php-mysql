<?php

abstract class Livro extends Produto {

    private $isbn;

    public function getIsbn() {
        return $this->isbn;
    }

    public function setIsbn($isbn) {
        $this->isbn = $isbn;
    }

    public function calculaImposto() {
        return $this->getPreco()  * 0.065;  
        //Foi usado o getPreco pois mesmo extendendo a classe Produto, o atributo 
        //preço é private e só é acessado por ela mesma, se fosse protected poderia
        //ser acessada por suas classes filhas. 
    }                                     
}

?>