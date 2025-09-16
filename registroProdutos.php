<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de Produtos - Mercado</title>
  <link rel="stylesheet" href="css/alexandre.css">
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
    <h2>Cadastro de Produto</h2>
    <form>
      <div class="form-group">
        <label for="nome">Nome do Produto:</label>
        <input type="text" id="nome" placeholder="Ex: Arroz 5kg" required>
      </div>

      <div class="form-group">
        <label for="categoria">Categoria:</label>
        <select id="categoria" required>
          <option value="">Selecione</option>
          <option>Alimentos</option>
          <option>Bebidas</option>
          <option>Higiene</option>
          <option>Limpeza</option>
          <option>Outros</option>
        </select>
      </div>

      <div class="form-group">
        <label for="preco">Preço (R$):</label>
        <input type="number" id="preco" placeholder="Ex: 19.90" step="0.01" required>
      </div>

      <div class="form-group">
        <label for="quantidade">Quantidade em Estoque:</label>
        <input type="number" id="quantidade" placeholder="Ex: 50" required>
      </div>

      <div class="form-group">
        <label for="descricao">Descrição:</label>
        <textarea id="descricao" rows="3" placeholder="Informações adicionais..."></textarea>
      </div>

      <button type="submit" class="btn">Salvar Produto</button>
    </form>
  </div>

</div>
</body>
</html>