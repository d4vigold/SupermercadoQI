<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Supermercado QI - Início</title>
  <link rel="stylesheet" href="css/vitoria.css" />
  <link rel="stylesheet" href="css/nav.css" />
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

  <section class="banner">
    <h1>Bem-vindo ao Supermercado QI!</h1>
    <p>Ofertas especiais, qualidade garantida.</p>
  </section>

  <section class="produtos">
    <h2>Produtos em Destaque</h2>
    <a href="produtos.php"><div class="produto">
      <h3>Leite 1L</h3>
      <p><strong>R$ 4,99</strong></p>
    </div>
    <div class="produto">
      <h3>Café 500g</h3>
      <p><strong>R$ 9,49</strong></p>
    </div>
    <div class="produto">
      <h3>Açúcar 1kg</h3>
      <p><strong>R$ 3,89</strong></p>
    </div></a>
  </section>
  <footer>
    <p>Contato: contato@supermercadoqi.com.br</p>
    <p>Siga-nos:
      <a href="#">Facebook</a> |
      <a href="#">Instagram</a>
    </p>
  </footer>
</body>
</html>

