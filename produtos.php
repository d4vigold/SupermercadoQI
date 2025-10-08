<?php
// Inclui a classe DAO
require_once 'src/ProdutoDAO.php';

// Cria uma instância do DAO e busca os produtos
$produtoDAO = new ProdutoDAO();
$listaDeProdutos = $produtoDAO->listarTodosProdutos();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Supermercado QI</title>
    <link rel="stylesheet" href="css/produtos.css">
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

    <h1 class="titulo-principal">Confira Nossos Produtos</h1>

    <main class="container-produtos">
        
        <?php foreach ($listaDeProdutos as $produto): ?>
            <div class="card-produto">
                <div class="card-conteudo">
                    <h3 class="card-titulo"><?= htmlspecialchars($produto['nome']) ?></h3>
                    <p class="card-categoria"><?= htmlspecialchars($produto['categoria']) ?></p>
                    <p class="card-descricao"><?= htmlspecialchars($produto['descricao']) ?></p>
                    <div class="card-footer">
                        <span class="card-preco">
                            R$ <?= number_format($produto['preco'], 2, ',', '.') ?>
                        </span>
                        <a class="btn-comprar">Comprar</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <?php if (empty($listaDeProdutos)): ?>
            <p>Nenhum produto encontrado no momento.</p>
        <?php endif; ?>

    </main>

</body>
</html>