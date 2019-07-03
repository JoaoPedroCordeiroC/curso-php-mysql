<?php 

class Produto {

    private $id;
    private $nome;
    private $preco;
    private $descricao;
    private $categoria;  //categoria é outro objeto
    private $usado;

    function __construct($nome, $preco, $descricao, Categoria $categoria, $usado) {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->descricao = $descricao;
        $this->categoria = $categoria;
        $this->usado = $usado;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function getUsado() {
        return $this->usado;
    }

    public function setUsado($usado) {
        $this->usado = $usado;
    }
    
    public function precoComDesconto($valor) {
        if ($valor > 0 && $valor <= 0.5) {
            $this->preco -= $this->preco * $valor;
        } 
        return $this->preco;
    }

    public function temIsbn() {
        return $this instanceof Livro; //Se for uma instancia de livro
    }                                  //vai retornar true

    public function temTaxaImpressao() {
        return $this instanceof LivroFisico;
    }

    public function temWaterMark() {
        return $this instanceof Ebook;
    }

    public function atualizaBaseadoEm($params) {
        if ($this->temIsbn()) {
            $this->setIsbn($params['isbn']);
        }
        if ($this->temTaxaImpressao()) {
            $this->setTaxaImpressao($params['taxaImpressao']);
        }
        if ($this->temWaterMark()) {
            $this->setWaterMark($params['waterMark']);
        }
    }

    public function calculaImposto() {
            return $this->preco * 0.195;
    }

    function __toString() {
        return $this->nome.": R$ ".$this->preco;
    }

}

?>