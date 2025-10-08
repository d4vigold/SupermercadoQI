<?php

class Usuario {
    private $nome;
    private $cpf;
    private $data_nascimento;
    private $login;
    private $senha;

    public function __construct(
        $nome = "Usuário",
        $cpf = "",
        $data_nascimento = "",
        $login = "",
        $senha = ""
    ) {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->data_nascimento = $data_nascimento;
        $this->login = $login;
        $this->senha = $senha;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function getDataNascimento() {
        return $this->data_nascimento;
    }

    public function setDataNascimento($data_nascimento) {
        $this->data_nascimento = $data_nascimento;
    }

    public function getLogin() {
        return $this->login;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function autenticar() {
        // Lógica de autenticação aqui
    }

    public function __toString() {
        return "<hr>
                <ul>
                    <li>NOME: {$this->nome}</li>
                    <li>CPF: {$this->cpf}</li>
                    <li>DATA DE NASCIMENTO: {$this->data_nascimento}</li>
                    <li>LOGIN: {$this->login}</li>
                    <li>SENHA: {$this->senha}</li>
                </ul>";
    }
}
