<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <!-- Page Info -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cadastro de Administrador</title>

  <!-- Icons -->
  <link rel="stylesheet" href="assets/fonts/style.css" />

  <!-- Styles -->
  <link rel="stylesheet" href="../style/stylecad.css" />

  <!-- FONTS -->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link
    href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Poppins:wght@400;500;700&display=swap"
    rel="stylesheet" />
</head>

<body>
  <!-- Header -->
  <header id="header">
    <nav class="container">
      <a class="logo" href="../home/home_administrador.php">mecânica<span>baiano</span>.</a>

      <!-- MENU -->
      <div class="menu">
        <ul class="grid">
          <li>
            <a class="title" href="../home/index.php">Início</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <main>
    <fieldset class="field">
      <form method="POST" action="../cadastrar/salvarCadastro.php">
        <div>
          
          <h1>Cadastro de Administrador</h1>

          <label for="matricula" class="label-text"><strong>Matrícula</strong></label>
          <input class="label" type="text" name="matricula" 
          <?php
							if(!empty($_SESSION['value_matricula'])){
								echo "value='".$_SESSION['value_matricula']."'";
								unset($_SESSION['value_matricula']);
							}
						 ?>	
          required />

          <?php
							if(!empty($_SESSION['matricula_uso'])){
                echo "<p style='color: #f00; text-align: center '>".$_SESSION['matricula_uso']."</p>";
								unset($_SESSION['matricula_uso']);
							}
					 ?>

          <label for="nome" class="label-text"><strong>Nome</strong></label>
          <input class="label" type="text" name="nome"
          <?php
							if(!empty($_SESSION['value_nome'])){
								echo "value='".$_SESSION['value_nome']."'";
								unset($_SESSION['value_nome']);
							}
						 ?>	
          required />
          

          <?php
							if(!empty($_SESSION['nome_uso'])){
								echo "<p style='color: #f00; text-align: center '>".$_SESSION['nome_uso']."</p>";
								unset($_SESSION['nome_uso']);
							}
					 ?>

          <label for="endereco" class="label-text"><strong>Endereço</strong></label>
          <input class="label" type="text" name="endereco" 
          <?php
							if(!empty($_SESSION['value_endereco'])){
								echo "value='".$_SESSION['value_endereco']."'";
								unset($_SESSION['value_endereco']);
							}
						 ?>	
          required />

          <label for="email" class="label-text"><strong>E-mail</strong></label>
          <input class="label" type="text" name="email" 
          
          <?php
							if(!empty($_SESSION['value_email'])){
								echo "value='".$_SESSION['value_email']."'";
								unset($_SESSION['value_email']);
							}
						 ?>	
          required />

          <?php
							if(!empty($_SESSION['email_uso'])){
                echo "<p style='color: #f00; text-align: center '>".$_SESSION['email_uso']."</p>";
								unset($_SESSION['email_uso']);
							}
					 ?>

          <label for="telefone" class="label-text"><strong>Telefone</strong></label>
          <input class="label" type="text" name="telefone" 
          <?php
							if(!empty($_SESSION['value_telefone'])){
								echo "value='".$_SESSION['value_telefone']."'";
								unset($_SESSION['value_telefone']);
							}
						 ?>	
          required minlength="11" maxlength="11"/>

          <?php
							if(!empty($_SESSION['telefone_uso'])){
                echo "<p style='color: #f00; text-align: center '>".$_SESSION['telefone_uso']."</p>";
								unset($_SESSION['telefone_uso']);
							}
					 ?>

          

          <label for="senha" class="label-text"><strong>Senha</strong></label>
          <input class="label" type="password" name="senha" required />

          <input class="button" type="submit" name = "cadastrar_administrador"value="Cadastrar" />
        </div>
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
        <a href="https://www.instagram.com/viinivinicin/" target="_blank">
          <i class="icon-instagram"></i>
        </a>
        <a href="https://www.youtube.com/watch?v=0XIqH9DfpIc" target="_blank"><i class="icon-youtube"></i></a>
      </div>
    </div>
  </footer>
</body>

<!-- main.js -->
<script src="main.js"></script>

</html>