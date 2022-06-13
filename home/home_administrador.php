<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt_BR">
  <head>
    <!-- Page Info -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>

    <!-- Icons -->
    <link rel="stylesheet" href="assets/fonts/style.css" />

    <!-- STYLES -->
    <link rel="stylesheet" href="../style/stylelogin.css" />

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Poppins:wght@400;500;700&display=swap"
      rel="stylesheet"
    />
  </head>

  <body>

    <!-- Header -->
    <header id="header">
      <nav class="container">
        <a class="logo" href="../home/home_administrador.html"
          >mecânica<span>baiano</span>.</a
        >

        <!-- MENU -->
        <div class="dd-menu">
          <ul>
            <li><a href="../home/login.html">Início</a></li>
            <li><a href="../cadastrar/cad_administrador.php">Cadastrar</a>
            
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <main>
      <fieldset class="field">
        <form action="../home/login.php" method="POST">
          <h1>Acesso ao Sistema</h1>

          <label class="label-text" for="email"><strong>Email</strong></label>
          <input class="label" type="email" name="email" required />

          <label class="label-text" for="senha"><strong>Senha</strong></label>
          <input class="label" type="password" name="senha" required />

          <?php
							if(!empty($_SESSION['erro'])){
                echo "<p style='color: #f00;text-align: center '>".$_SESSION['erro']."</p>";
								unset($_SESSION['erro']);
							}
					 ?>

          <input class="button" type="submit" name="acao" value="Entrar" />
        </form>
      </fieldset>
    </main>

    <footer class="section">
      <div class="container grid">
        <div class="brand">
          <a class="logo logo-alt" href="#home">mecânica<span>baiano</span>.</a>
          <p>©2022 mecânicaeverton.</p>
          <p>Todos os direitos reservados.</p>
        </div>

        <div class="social grid">
          <a
            href="https://api.whatsapp.com/send?phone=+5561993398630&text=Oi! Gostaria de agendar um horário"
            target="_blank"
            ><i class="icon-whatsapp"></i
          ></a>
        </div>
      </div>
    </footer>
  </body>

  <!-- main.js -->
  <script src="main.js"></script>
</html>
