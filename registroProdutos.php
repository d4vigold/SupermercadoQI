<?php
//Importando arquivos
require_once "src/ProdutoDAO.php";
require_once "src/Produto.php";

//Criando objeto da classe ProdutoDAO
$bd = new ProdutoDAO();

//Inicializando sessão
session_start();

//Verifica se já existe uma sessão
if( !isset( $_SESSION["produto"] ) ) {
    $_SESSION["produto"] = null;
}

if( $_SERVER["REQUEST_METHOD"] == "POST" ) {
    $nome = $_POST["nome"];
    $categoria = $_POST["categoria"];
    $preco = $_POST["preco"];
    $quantidade = $_POST["quantidade"];
    $descricao = $_POST["descricao"];

    $produto = new Produto(
        nome: $nome,
        categoria: $categoria,
        preco: $preco,
        quantidade: $quantidade,
        descricao: $descricao
    );

    try {
        if (!empty($_POST["id"])) {
            $id = intval($_POST["id"]);
            $bd->editar($id, $produto);
            $_SESSION["produto"] = "Produto editado com sucesso!";
        } else {
            $bd->salvar($produto);
            $_SESSION["produto"] = "Produto cadastrado com sucesso!";
        }

    } catch(Exception $erro) {
        $_SESSION["produto"] = "Ocorreu um erro ao salvar o Produto.";
    }

    echo "<script>
        alert('{$_SESSION["produto"]}');
        window.location.replace('registroProdutos.php');
    </script>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de Produtos - Mercado</title>
  <link rel="stylesheet" href="css/alexandre.css">
  <link rel="stylesheet" href="css/nav.css">
  <style>
    header {
    background-color: #c40000;
    color: white;
    padding: 15px;
    margin-bottom: 40px;
    width: 100%;
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
  
<div class="parent">
<div class="div1">
  <div class="container">
    <h2 id="titulo">Cadastro de Produto</h2>
    <form method="POST">
      <input type="hidden" name="id" id="id">
      <div class="form-group">
        <label for="nome">Nome do Produto:</label>
        <input type="text" id="nome" name="nome" placeholder="Ex: Arroz 5kg" required>
      </div>

      <div class="form-group">
        <label for="categoria">Categoria:</label>
        <select name="categoria" id="categoria" required>
          <option value="">Selecione</option>
          <option value="alimentos">Alimentos</option>
          <option value="bebidas">Bebidas</option>
          <option value="higiene">Higiene</option>
          <option value="limpeza">Limpeza</option>
          <option value="outros">Outros</option>
        </select>
      </div>

      <div class="form-group">
        <label for="preco">Preço (R$):</label>
        <input type="number" id="preco" name="preco" placeholder="Ex: 19.90" step="0.01" required>
      </div>

      <div class="form-group">
        <label for="quantidade">Quantidade em Estoque:</label>
        <input type="number" id="quantidade" name="quantidade" placeholder="Ex: 50" required>
      </div>

      <div class="form-group">
        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao" rows="3" placeholder="Informações adicionais..."></textarea>
      </div>

      <button type="submit" id="btn-submit" class="btn">Salvar Produto</button>
      <button id="btn-cancelar" type="button" onclick="window.location.reload()">Cancelar edição</button>
    </form>
    <br>
    <a href="paineladmin.php"><button class="btn">Gerenciar Usuários</button></a>
  </div>
</div>

    <div class="div2">
        <section id="lista">
            <h3>Lista de produtos:</h3>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>CATEGORIA</th>
                        <th>PREÇO</th>
                        <th>QUANTIDADE</th>
                        <th>DESCRIÇÃO</th>                      
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach( $bd->listarTodos() as $u ) : ?>
                        <tr>
                            <td data-label="ID"> <?= $u[0] ?> </td>
                            <td data-label="NOME"> <?= $u[1] ?> </td>
                            <td data-label="CATEGORIA"> <?= $u[2] ?> </td>
                            <td data-label="PREÇO"> <?= $u[3] ?> </td>    
                            <td data-label="QUANTIDADE"> <?= $u[4] ?> </td>  
                            <td data-label="DESCRIÇÃO"> <?= $u[5] ?> </td>                    
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
    </div>
</div>

    <script>
        // Mapeando componentes HTML
        const titulo = document.getElementById("titulo");
        const campoId = document.getElementById("id");
        const campoNome = document.getElementById("nome");
        const campoCategoria = document.getElementById("categoria");
        const campoPreco = document.getElementById("preco");
        const campoQuantidade = document.getElementById("quantidade");
        const campoDescricao = document.getElementById("descricao");
        const btnSubmit = document.getElementById("btn-submit");
        const btnCancelar = document.getElementById("btn-cancelar");
        const lista = document.getElementById("lista");

        // Ocultando o botão de cancelar edição por padrão
        btnCancelar.style.display = "none";

        function editar(id, nome, categoria, preco, quantidade, descricao) {
            btnCancelar.style.display = "inline";
            btnSubmit.value = "Atualizar";
            lista.style.display = "none";
            titulo.innerHTML = "Editar produto";

            campoId.value = id;
            campoNome.value = nome;
            campoCategoria.value = categoria;
            campoPreco.value = preco;
            campoQuantidade.value = quantidade;
            campoDescricao.value = descricao;
        }

        function excluir(id, nome) {
            if (confirm("Excluir o produto " + nome + "?")) {
                window.location.replace("excluir_produto.php?id=" + id);
            }
        }
    </script>
</body>
</html>