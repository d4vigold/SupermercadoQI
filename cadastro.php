<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário - QI Supermercado</title>
    <link rel="stylesheet" href="css/lucas.css">
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
                    <li><a href="#" class="linkini">Contato</a></li>
                    <li><a href="login.php" class="linkini">Login</a></li>
                    <li><a href="cadastro.php" class="linkini">Cadastro</a></li>
                </ul>
                <div class="hamburger" onclick="toggleMenu()">&#9776;</div>
            </nav>
        </header>

<div class="centralizar">
    <div class="container">
    <img src="assets/fundo.png" alt="QI Supermercado" class="logo">

    <h2>Cadastro de Usuário</h2>

    <form method="post">
        <label for="nome">Nome completo:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" required>

        <label for="data_nascimento">Data de nascimento:</label>
        <input type="date" id="data_nascimento" name="data_nascimento" required>

        <label for="login">Login:</label>
        <input type="text" id="login" name="login" required>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>

        <input type="submit" value="Cadastrar">
    </form>

    
    </div>
</div>

</body>
</html>