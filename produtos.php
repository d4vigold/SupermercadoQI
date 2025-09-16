<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Produtos - Mercado</title>
  <link rel="stylesheet" href="css/davi.css">
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

        <section class="linha">
			<div class="coluna">
                <h1 class="textbalao">Produto</h1>
                <p class="subtextos">R$ Preço</p>
                <p class="subtextos">Descrição</p>
                <p class="subtextos">Categoria</p>
                <p class="subtextos">Estoque</p>
                <a href="" style="color: black;"><button class="bbonito" id="bronze">Comprar</button></a>
            </div>
            <div class="coluna">
                <h1 class="textbalao">Produto</h1>
                <p class="subtextos">R$ Preço</p>
                <p class="subtextos">Descrição</p>
                <p class="subtextos">Categoria</p>
                <p class="subtextos">Estoque</p>
                <a href="" style="color: black;"><button class="bbonito" id="prata">Comprar</button></a>
            </div>
            <div class="coluna">
                <h1 class="textbalao">Produto</h1>
                <p class="subtextos">R$ Preço</p>
                <p class="subtextos">Descrição</p>
                <p class="subtextos">Categoria</p>
                <p class="subtextos">Estoque</p>
                <a href="" style="color: black;"><button class="bbonito" id="ouro">Comprar</button></a>
            </div>
        </section>
    <a href="registroProdutos.php"><button class="btnregistroprod">Adicionar Produtos</button></a>
</body>
</html>