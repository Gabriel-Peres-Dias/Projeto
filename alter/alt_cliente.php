<?php

      // Verificando se temos o id
      if (!empty($_GET['id']))
      {

        include "../validation/conn.php";
        require "../validation/verifica.php";

        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM cliente WHERE id = '$id'";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
          while($user_data = mysqli_fetch_assoc($result))
           {
            
            $cpf         = $user_data['cpf'];
            $nome        = $user_data['nomeC'];
            $email       = $user_data['emailC'];
            $endereco    = $user_data['enderecoC'];
            $telefone    = $user_data['telefoneC'];
        
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
      rel="stylesheet"
    />
  </head>

  <body>
    <header id="header">
      <nav class="container">
        <a class="logo" href="../home/home_administrador.html"
          >mecânica<span>baiano</span>.</a
        >

        <!-- Menu -->
        <div class="dd-menu">
          <ul>
            <li><a href="../home/home_administrador.php">Início</a></li>
          </ul>
        </div>
      </nav>
    </header>

    <main>
      <!-- Form -->
      <div class="form container">
        <form class="form" method="POST" action="../alter/salvarEdicao.php">
          <fieldset class="field">
            <h1 class="title-form">Editar Cliente</h1>

            <label for="nome" class="label-text" ><strong>Nome do Cliente</strong><br/></label>
            <input class="label" type="text" name="nome" value =" <?php echo  $nome ?>" required/>

            <label for="email" class="label-text"><strong>Email<br/></strong></label>
            <input class="label" type="email" name="email" value =" <?php echo  $email ?>" required/>

            <label for="CPF" class="label-text"><strong>CPF<br /></strong></label>
            <input class="label" type="text" name="cpf"  value =" <?php echo  $cpf ?>"/>

            <label for="Endereco" class="label-text"><strong>Endereço<br /></strong></label>
            <input class="label" type="text" name="endereco" value =" <?php echo  $endereco?>" required/>

            <label for="Telefone" class="label-text"><strong>Telefone<br/></strong></label>
            <input class="label" type="text" name="telefone" value =" <?php echo  $telefone?>" />

            <input class="label" type="hidden" name="id" value =" <?php echo  $id ?>" required />

            <input class="button" type="submit" name = "atualizar_cliente" value="Editar" />
          </fieldset>
        </form>
      </div>
    </main>

    <!--<footer class="section">
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
    </footer>-->

    <!-- main.js -->
    <script src="main.js"></script>
  </body>
</html>
