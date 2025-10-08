<?php

require_once "Conexao.php";

class UsuarioDAO {
    private $con;
    private $table = "usuarios";
    private $id = "id_usuario";

    private function getCon()
    {
        $bd = new Conexao();
        $this->con = $bd->getMysqli();
        return $this->con;
    }

    public function salvar(Usuario $usuario)
    {
        $sql = "INSERT INTO {$this->table}
                (nome, cpf, data_nascimento, login, senha) 
                VALUES (
                    '{$usuario->getNome()}',
                    '{$usuario->getCpf()}',
                    '{$usuario->getDataNascimento()}',
                    '{$usuario->getLogin()}',
                    '{$usuario->getSenha()}'
                )";

        $status = $this->getCon()->query($sql);
        $this->getCon()->close();
        return $status;
    }

    public function buscarPorUsuario($nomeUsuario){
        $sql = "SELECT id_usuario, login, senha FROM {$this->table} WHERE login = ?";

        $stmt = $this->getCon()->prepare($sql);
        if ($stmt === false) {
            return null; 
        }

        $stmt->bind_param("s", $nomeUsuario);

        $stmt->execute();

        $resultado = $stmt->get_result();
        $usuario = $resultado->fetch_assoc();

        $stmt->close();
        $this->getCon()->close();

        return $usuario;
    }

    public function listarTodos()
    {
        $sql = "SELECT * FROM {$this->table}";
        $lista = $this->getCon()->query($sql)->fetch_all();
        $this->getCon()->close();
        return $lista;
    }

    public function listarAdmin()
    {
        $sql = "SELECT * FROM {$this->table} WHERE perfil = 'admin'";
        $admin = $this->getCon()->query($sql)->fetch_all();
        $this->getCon()->close();
        return $admin;
    }

    public function apagar($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE {$this->id} = $id";
        $status = $this->getCon()->query($sql);
        $this->getCon()->close();
        return $status;
    }

    public function editar(int $id, Usuario $usuario)
    {
        $sql = "UPDATE {$this->table} SET
                    nome = '{$usuario->getNome()}',
                    cpf = '{$usuario->getCpf()}',
                    data_nascimento = '{$usuario->getDataNascimento()}',
                    login = '{$usuario->getLogin()}',
                    senha = '{$usuario->getSenha()}'
                WHERE {$this->id} = $id";

        $status = $this->getCon()->query($sql);
        $this->getCon()->close();
        return $status;
    }
}
