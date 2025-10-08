<?php

class Produto {
    private $nome;
    private $categoria;
    private $preco;
    private $quantidade;
    private $descricao;

    public function __construct(
        $nome = "Produto",
        $categoria = "",
        $preco = "",
        $quantidade = "",
        $descricao = ""
    ) {
        $this->nome = $nome;
        $this->categoria = $categoria;
        $this->preco = $preco;
        $this->quantidade = $quantidade;
        $this->descricao = $descricao;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function setPreco($preco) {
        $this->preco = $preco;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function __toString() {
        return "<hr>
                <ul>
                    <li>NOME: {$this->nome}</li>
                    <li>CATEGORIA: {$this->categoria}</li>
                    <li>PREÇO: {$this->preco}</li>
                    <li>QUANTIDADE: {$this->quantidade}</li>
                    <li>DESCRIÇÃO: {$this->descricao}</li>
                </ul>";
    }
}
