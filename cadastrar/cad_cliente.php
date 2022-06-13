<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt_BR">

<head>
  <!-- Page Info -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cadastro de Clientes</title>

  <!-- Icones -->
  <link rel="stylesheet" href="assets/fonts/style.css" />

  <!-- Styles -->
  <link rel="stylesheet" href="../style/stylecad.css" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link
    href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Poppins:wght@400;500;700&display=swap"
    rel="stylesheet" />
</head>

<body>
  <header id="header">
    <nav class="container">
      <a class="logo" href="../home/home_administrador.php">mecânica<span>baiano</span>.</a>

      <!-- Menu -->
      <div class="dd-menu">
        <ul>
          <li><a href="../home/index.php">Início</a></li>
        </ul>
      </div>
    </nav>
  </header>

  <main>
    <!-- Form -->
    <div class="form container">
      <form class="form" method="POST" action="../cadastrar/salvarCadastro.php">
        <fieldset class="field">
          <h1 class="title-form">Cadastro de Clientes</h1>

          <label for="nome" class="label-text"><strong>Nome do Cliente</strong><br /></label>
          <input class="label" type="text" name="nome"
          <?php
							if(!empty($_SESSION['value_nomeC'])){
								echo "value='".$_SESSION['value_nomeC']."'";
								unset($_SESSION['value_nomeC']);
							}
						 ?>	 required />

          <?php
							if(!empty($_SESSION['nomeC_uso'])){
                echo "<p style='color: #f00; text-align: center'>".$_SESSION['nomeC_uso']."</p>";
								unset($_SESSION['nomeC_uso']);
							}
					 ?>

          <label for="email" class="label-text"><strong>Email<br /></strong></label>
          <input class="label" type="email" name="email" 
          <?php
							if(!empty($_SESSION['value_emailC'])){
								echo "value='".$_SESSION['value_emailC']."'";
								unset($_SESSION['value_emailC']);
							}
						 ?> required />

          <?php 
							if(!empty($_SESSION['emailC_uso'])){
                echo "<p style='color: #f00; text-align: center '>".$_SESSION['emailC_uso']."</p>";
								unset($_SESSION['emailC_uso']);
							}
					 ?>

          <label for="CPF" class="label-text"><strong>CPF<br /></strong></label>
          <input class="label" type="text" name="cpf"
          <?php
							if(!empty($_SESSION['value_cpf'])){
								echo "value='".$_SESSION['value_cpf']."'";
								unset($_SESSION['value_cpf']);
							}
						 ?> required minlength="11" maxlength="11" />

          <?php 
							if(!empty($_SESSION['cpf_uso'])){
                echo "<p style='color: #f00; text-align: center '>".$_SESSION['cpf_uso']."</p>";
								unset($_SESSION['cpf_uso']);
							}
					 ?>

          <label for="Endereco" class="label-text"><strong>Endereço<br /></strong></label>
          <input class="label" type="text" name="endereco"  
          <?php
							if(!empty($_SESSION['value_enderecoC'])){
								echo "value='".$_SESSION['value_enderecoC']."'";
								unset($_SESSION['value_enderecoC']);
							}
						 ?>	required />

          <label for="Telefone" class="label-text"><strong>Telefone<br /></strong></label>
          <input class="label" type="text" name="telefone"   
          <?php
							if(!empty($_SESSION['value_telefoneC'])){
								echo "value='".$_SESSION['value_telefoneC']."'";
								unset($_SESSION['value_telefoneC']);
							}
						 ?> required minlength="11" maxlength="11" />

          <?php
							if(!empty($_SESSION['telefoneC_uso'])){
                echo "<p style='color: #f00; text-align: center '>".$_SESSION['telefoneC_uso']."</p>";
								unset($_SESSION['telefoneC_uso']);
							}
					 ?>

          <input class="button" type="submit" name="cadastrar_cliente" value="Cadastrar" />
        </fieldset>
      </form>
    </div>
  </main>

  <footer class="section">
    <div class="container grid">
      <div class="brand">
        <a class="logo logo-alt" href="#home">mecânica<span>baiano</span>.</a>
        <p>©2022 mecânicaeverton.</p>
        <p>Todos os direitos reservados.</p>
      </div>

      <div class="social grid">
        <a href="https://api.whatsapp.com/send?phone=+5561993398630&text=Oi! Gostaria de agendar um horário"
          target="_blank"><i class="icon-whatsapp"></i></a>
      </div>
    </div>
  </footer>

  <!-- main.js -->
  <script src="main.js"></script>
</body>

</html>