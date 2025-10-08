<?php
//Importando arquivos
require_once "src/UsuarioDAO.php";
require_once "src/Usuario.php";

//Criando objeto da classe UsuarioDAO
$bd = new UsuarioDAO();

//Inicializando sessão
session_start();

//Verifica se já existe uma sessão
if( !isset( $_SESSION["usuario"] ) ) {
    $_SESSION["usuario"] = null;
}

if( $_SERVER["REQUEST_METHOD"] == "POST" ) {
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $data_nascimento = $_POST["data_nascimento"];
    $login = $_POST["login"];
    $senha = $_POST["senha"];

    $usuario = new Usuario(
        nome: $nome,
        cpf: $cpf,
        data_nascimento: $data_nascimento,
        login: $login,
        senha: $senha
    );

    try {
        if (!empty($_POST["id"])) {
            $id = intval($_POST["id"]);
            $bd->editar($id, $usuario);
            $_SESSION["usuario"] = "Usuário editado com sucesso!";
        } else {
            $bd->salvar($usuario);
            $_SESSION["usuario"] = "Usuário cadastrado com sucesso!";
        }

    } catch(Exception $erro) {
        $_SESSION["usuario"] = "Ocorreu um erro ao salvar o usuário.";
    }

    echo "<script>
        alert('{$_SESSION["usuario"]}');
        window.location.replace('paineladmin.php');
    </script>";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Admin de Usuário - QI Supermercado</title>
    <style>
        header {
    background-color: #c40000;
    color: white;
    padding: 15px;
    margin-bottom: 40px;
    width: 100%;
}
        body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #f9f9f9 0%, #e3e3e3 100%);
    margin: 0;
    padding: 0;
    min-height: 100vh;
    overflow-x: hidden;
    
    /* MODIFICAÇÕES AQUI */
    display: flex;
    flex-direction: column; /* Organiza os itens em uma coluna (um embaixo do outro) */
    align-items: center;    /* Centraliza todos os itens na horizontal */
    }

        .container {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 480px;
            box-sizing: border-box;
        }

        .logo {
            width: 140px;
            margin-bottom: 25px;
        }

        h2, #titulo {
            color: #d90000;
            text-align: center;
            margin-bottom: 30px;
            font-weight: 700;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: 600;
            color: #333;
            text-align: left;
        }

        input[type="text"],
        input[type="date"],
        input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            margin-top: 6px;
            border-radius: 8px;
            border: 1.5px solid #ccc;
            font-size: 16px;
            transition: border-color 0.3s ease;
            box-sizing: border-box;
        }

        input[type="text"]:focus,
        input[type="date"]:focus,
        input[type="password"]:focus {
            border-color: #d90000;
            outline: none;
            box-shadow: 0 0 5px rgba(217, 0, 0, 0.5);
        }

        input[type="submit"] {
            margin-top: 25px;
            width: 100%;
            padding: 14px 0;
            background-color: #d90000;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 700;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #b30000;
        }

        #btn-cancelar {
            margin-top: 15px;
            width: 100%;
            padding: 12px 0;
            background-color: #777;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #btn-cancelar:hover {
            background-color: #555;
        }

        hr {
            margin: 40px 0;
            border: none;
            border-top: 1px solid #ccc;
        }

        #lista h3 {
            margin-bottom: 20px;
            color: #d90000;
            font-weight: 700;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        thead th {
            background-color: #d90000;
            color: #fff;
            padding: 12px 8px;
            text-align: left;
        }

        tbody td {
            border-bottom: 1px solid #ddd;
            padding: 10px 8px;
            vertical-align: middle;
        }

        tbody tr:hover {
            background-color: #f9f0f0;
        }

        button {
            background-color: #d90000;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #b30000;
        }

        @media (max-width: 600px) {
            .container {
                width: 90%;
                padding: 20px;
            }

            table, thead, tbody, th, td, tr {
                display: block;
            }

            thead tr {
                display: none;
            }

            tbody tr {
                margin-bottom: 20px;
                border: 1px solid #ddd;
                border-radius: 8px;
                padding: 15px;
                background: white;
            }

            tbody td {
                padding: 10px 10px;
                text-align: right;
                position: relative;
                padding-left: 50%;
            }

            tbody td::before {
                content: attr(data-label);
                position: absolute;
                left: 15px;
                width: 45%;
                padding-left: 15px;
                font-weight: 700;
                text-align: left;
                color: #d90000;
            }

            button {
                width: 48%;
                margin-top: 10px;
            }
        }
    </style>
    <link rel="stylesheet" href="css/nav.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <p>Supermercado <span>QI</span></p>
            </div>
            <ul class="nav-links">
                <li><a href="index.php" class="linkini">Início</a></li>
                <li><a href="produtos.php" class="linkini">Produtos</a></li>
                <li><a href="login.php" class="linkini">Login</a></li>
                <li><a href="cadastro.php" class="linkini">Cadastro</a></li>
            </ul>
            <div class="hamburger" onclick="toggleMenu()">&#9776;</div>
        </nav>
    </header>

    <div class="container">
        <h1 id="titulo">Admin de Usuário</h1>

        <form action="#" method="post">
            <input type="hidden" name="id" id="id">

            <input type="text" name="nome" id="nome" placeholder="Nome completo" required>
            <br><br>

            <input type="text" name="cpf" id="cpf" placeholder="CPF" required>
            <br><br>

            <label for="data_nascimento">Data de nascimento:</label>
            <input type="date" name="data_nascimento" id="data_nascimento" required>
            <br><br>

            <input type="text" name="login" id="login" placeholder="Login" required>
            <br><br>

            <input type="password" name="senha" id="senha" placeholder="Senha" required>
            <br><br>

            <input type="submit" value="Cadastrar Novo Usuário" id="btn-submit">
            <button id="btn-cancelar" type="button" onclick="window.location.reload()">Cancelar edição</button>     
        </form> 
        <a href="registroProdutos.php"><button id="btn-cancelar">Gerenciar Produtos</button></a>      
    </div>

<section id="lista">
            <h3>Lista de usuários:</h3>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>CPF</th>
                        <th>DATA DE NASCIMENTO</th>
                        <th>LOGIN</th>
                        <th>SENHA</th>
                        <th>PERFIL</th>                       
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach( $bd->listarTodos() as $u ) : ?>
                        <tr>
                            <td data-label="ID"> <?= $u[0] ?> </td>
                            <td data-label="NOME"> <?= $u[1] ?> </td>
                            <td data-label="CPF"> <?= $u[2] ?> </td>
                            <td data-label="DATA DE NASCIMENTO"> <?= $u[3] ?> </td>    
                            <td data-label="LOGIN"> <?= $u[4] ?> </td>  
                            <td data-label="SENHA"> <?= $u[5] ?> </td>    
                            <td data-label="PERFIL"> <?= $u[6] ?> </td>                 
                            <td>
                                <button onclick="editar(
                                    <?= $u[0] ?>,
                                    '<?= $u[1] ?>',
                                    '<?= $u[2] ?>',
                                    '<?= $u[3] ?>',
                                    '<?= $u[4] ?>',
                                    '<?= $u[5] ?>'
                                )">Alterar</button>
                            </td>
                            <td>
                                <button onclick="excluir(<?= $u[0] ?>, '<?= $u[1] ?>')">Excluir</button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </section>

    <script>
        // Mapeando componentes HTML
        const titulo = document.getElementById("titulo");
        const campoId = document.getElementById("id");
        const campoNome = document.getElementById("nome");
        const campoCpf = document.getElementById("cpf");
        const campoDataNascimento = document.getElementById("data_nascimento");
        const campoLogin = document.getElementById("login");
        const campoSenha = document.getElementById("senha");
        const btnSubmit = document.getElementById("btn-submit");
        const btnCancelar = document.getElementById("btn-cancelar");
        const lista = document.getElementById("lista");

        // Ocultando o botão de cancelar edição por padrão
        btnCancelar.style.display = "none";

        function editar(id, nome, cpf, dataNascimento, login, senha) {
            btnCancelar.style.display = "inline";
            btnSubmit.value = "Atualizar";
            lista.style.display = "none";
            titulo.innerHTML = "Editar usuário";

            campoId.value = id;
            campoNome.value = nome;
            campoCpf.value = cpf;
            campoDataNascimento.value = dataNascimento;
            campoLogin.value = login;
            campoSenha.value = senha;
        }

        function excluir(id, nome) {
            if (confirm("Excluir o usuário " + nome + "?")) {
                window.location.replace("exclui_usuario.php?id=" + id);
            }
        }
    </script>

</body>
</html>
