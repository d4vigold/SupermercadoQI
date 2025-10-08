<?php

require_once "Conexao.php";

class ProdutoDAO {
    private $con;
    private $table = "produtos";
    private $id = "id";

    private function getCon()
    {
        $bd = new Conexao();
        $this->con = $bd->getMysqli();
        return $this->con;
    }

    public function listarTodosProdutos() {
        $sql = "SELECT nome, categoria, preco, quantidade, descricao FROM {$this->table}";

        $resultado = $this->getCon()->query($sql);

        $lista = $resultado->fetch_all(MYSQLI_ASSOC);

        $this->getCon()->close();

        return $lista;
    }

    public function salvar(Produto $produto)
    {
        $sql = "INSERT INTO {$this->table}
                (nome, categoria, preco, quantidade, descricao) 
                VALUES (
                    '{$produto->getNome()}',
                    '{$produto->getCategoria()}',
                    '{$produto->getPreco()}',
                    '{$produto->getQuantidade()}',
                    '{$produto->getDescricao()}'
                )";

        $status = $this->getCon()->query($sql);
        $this->getCon()->close();
        return $status;
    }

    public function listarTodos()
    {
        $sql = "SELECT * FROM {$this->table}";
        $lista = $this->getCon()->query($sql)->fetch_all();
        $this->getCon()->close();
        return $lista;
    }

    public function apagar($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE {$this->id} = $id";
        $status = $this->getCon()->query($sql);
        $this->getCon()->close();
        return $status;
    }

    public function editar(int $id, Produto $produto)
    {
        $sql = "UPDATE {$this->table} SET
                    nome = '{$produto->getNome()}',
                    categoria = '{$produto->getCategoria()}',
                    preco = '{$produto->getPreco()}',
                    quantidade = '{$produto->getQuantidade()}',
                    descricao = '{$produto->getDescricao()}'
                WHERE {$this->id} = $id";

        $status = $this->getCon()->query($sql);
        $this->getCon()->close();
        return $status;
    }
}