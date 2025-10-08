<?php

if( $_SERVER["REQUEST_METHOD"] == "POST" ) {
  $user = $_POST["user"];
  $pass = $_POST["pass"];

  require_once "src/UsuarioDAO.php";

  $bd = new UsuarioDAO();

  //Testando se o nome de usuário é igual ao guardado no banco de dados
  if( $bd->listarAdmin()[0][6] == $user ) {
    if( $bd->listarAdmin()[0][5] == md5($pass) ) {
        $_SESSION["admin"] = $bd->listarAdmin();

        header("location: paineladmin.php");
    } else {
      echo "<script>
            alert('Acesso negado!')
          </script>";  
    }
  } else {
    echo "<script>
            alert('Acesso negado!')
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
    <form method="post" action="#">
      <img src ="assets/2qi_imagem.jpg" alt="imagem do supermercado" style="position: middle; width: 200px; height: 200px;"/>
      
      <h1> Login administrativo </h1>
      
      <input type="text" name="user" placeholder="Usuário" required><br>
      <input type="password" name="pass" placeholder="Senha" required><br>
      <button type="submit">Entrar</button>
    </form>
  </div> 
</div>

</body>
</html>