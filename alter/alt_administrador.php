<?php

      // Verificando se temos o id
      if (!empty($_GET['id']))
      {

        include "../validation/conn.php";
        require "../validation/verifica.php";

        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM usuario WHERE id = '$id'";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
          while($user_data = mysqli_fetch_assoc($result))
           {
            
            $matricula    = $user_data['matricula'];
            $nome         = $user_data['nome'];
            $endereco     = $user_data['endereco'];
            $email        = $user_data['email'];
            $telefone     = $user_data['telefone'];
            $senha        = $user_data['senha'];
           } 
           
        }
        else 
        {
          header('Location: ../listar/listar_admin.php');
              
        }
    } 
    else
     {
      header('Location: ../listar/listar_admin.php');
    }
  

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
        <div class="menu">
          <ul class="grid">
            <li>
              <a class="title" href="../home/home_administrador.html">Início</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <main>
      <fieldset class="field">
        <form method="POST" action="../alter/salvarEdicao.php">
          <div>
            <h1>Editar  Administrador</h1>

            <label for="matricula" class="label-text"><strong>Matrícula</strong></label>
            <input class="label" type="text" name="matricula" value =" <?php echo  $matricula ?>" required />

            <label for="nome" class="label-text"><strong>Nome</strong></label>
            <input class="label" type="text" name="nome" value =" <?php echo  $nome ?>" required />

            <label for="endereco" class="label-text" ><strong>Endereço</strong></label >
            <input class="label" type="text" name="endereco" value =" <?php echo  $endereco?>" required />

            <label for="email" class="label-text"><strong>E-mail</strong></label>
            <input class="label" type="text" name="email" value =" <?php echo  $email ?>" required />

            <label for="telefone" class="label-text"><strong>Telefone</strong></label>
            <input class="label" type="text" name="telefone" value =" <?php echo  $telefone ?>" required minlength="11" maxlength="11" />

            <label for="senha" class="label-text"><strong>Senha</strong></label>
            <input class="label" type="text" name="senha" value =" <?php echo  $senha ?>" required />

            <input class="label" type="hidden" name="id" value =" <?php echo  $id ?>" required />

            <input class="button" type="submit" value="Atualizar" name ="atualizar_admin" />
          </div>
        </form>
      </fieldset>
    </main>

    <!--<footer class="section">
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
          <a href="https://www.youtube.com/watch?v=0XIqH9DfpIc" target="_blank"
            ><i class="icon-youtube"></i
          ></a>
        </div>
      </div>
    </footer>-->
  </body>

  <!-- main.js -->
  <script src="main.js"></script>
</html>


