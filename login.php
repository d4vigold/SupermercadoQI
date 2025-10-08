<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["user"];
    $pass = $_POST["pass"];

    require_once "src/UsuarioDAO.php";
    $usuarioDAO = new UsuarioDAO();

    $usuarioEncontrado = $usuarioDAO->buscarPorUsuario($user);

    if ($usuarioEncontrado && $usuarioEncontrado['senha'] == $pass) {
        
        $_SESSION["user_id"] = $usuarioEncontrado['id_usuario'];

        echo "<script>
                alert('Usuário logado com sucesso!');
                window.location.href = 'index.php';
              </script>";
        exit();

    } else {
        echo "<script>
                alert('Usuário ou Senha Incorretos!');
                window.location.href = 'login.php';
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Supermercado QI</title>
  <link rel="stylesheet" href="css/murilo.css">
  <link rel="stylesheet" href="css/nav.css">
</head>
<body>

        <header>
            <nav class="navbar">
                <div class="logo">
                    <p>Supermercado <span>QI</span></p></div>
                <ul class="nav-links">
                    <li><a href="index.php" class="linkini">Início</a></li>
                    <li><a href="produtos.php" class="linkini">Produtos</a></li>
                    <li><a href="login.php" class="linkini">Login</a></li>
                    <li><a href="cadastro.php" class="linkini">Cadastro</a></li>
                </ul>
                <div class="hamburger" onclick="toggleMenu()">&#9776;</div>
            </nav>
        </header>

<div class="centralizar">
  <div class="login-container">
    <h1>Supermercado QI</h1>
    <form method="POST">
      <img src ="assets/2qi_imagem.jpg" alt="imagem do supermercado" style="position: middle; width: 200px; height: 200px;"/>
      <input type="text" name="user" id="user" placeholder="Usuário" required><br>
      <input type="password" name="pass" id="pass" placeholder="Senha" required><br>
      <button type="submit">Entrar</button>
    </form>
    <a href="login_admin.php" class="admin-link">Login Administrativo</a>
  </div>
</div>
  
</body>
</html>
