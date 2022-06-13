<?php

      // Verificando se temos o id
      if (!empty($_GET['id']))
      {

        include "../validation/conn.php";
        require "../validation/verifica.php";

        $id = $_GET['id'];

        $sqlSelect = "SELECT nomeC FROM cliente WHERE id = '$id'";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
          while($user_data = mysqli_fetch_assoc($result))
           {
            
            $nome    = $user_data['nomeC'];
      
           } 
           
        }
        else 
        {
          header('Location: ../listar/listar_cliente.php');
              
        }
    } 
    else
     {
      header('Location: ../listar/listar_cliente.php');
    }
  

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <!-- Page Info -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cadastro de Agendamento</title>

  <!-- Icons -->
  <link rel="stylesheet" href="assets/fonts/style.css" />

  <!-- STYLES -->
  <link rel="stylesheet" href="../style/styleagendamento.css" />

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
      <a class="logo" href="../home/home_administrador.html">mecânica<span>baiano</span>.</a>

      <!-- MENU -->
      <div class="menu">
        <ul class="grid">
          <li>
            <a class="title" href="../home/home_administrador.php">Início</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <main>
    <fieldset class="field">
      <h1>Cadastrar Agendamento</h1>

      <form action="../cadastrar/salvarCadastro.php" method="POST">
        <label class="label-text" for="nome"><strong>Nome do Cliente:</strong></label>
        <input class="label" type="text" name="nome" value =" <?php echo  $nome ?>" disabled="" required />

        <label class="label-text" ><strong>Tipos de Serviço</strong></label>
        
        <br><input type = "checkbox"  name = "tira_risco" value = "1">
        <label for = "tira_risco"> Tira Risco </label>

        <br><input type = "checkbox"  name = "revitalizacao_pintura" value = "1">
        <label for = "revitalizacao_pintura"> Revitalização de Pintura </label>

        <br><input type = "checkbox"  name = "polimento_cristalizado" value = "1">
        <label for = "polimento_cristalizado"> Polimento Cristalizado </label>

        <br><input type = "checkbox"  name = "micro_pintura" value = "1">
        <label for = "micro_pintura"> Micro Pintura </label>

        <br><input type = "checkbox"  name = "polimento_farol" value = "1">
        <label for = "polimento_farol"> Polimento de Farol </label>

        <br><input type = "checkbox"  name = "pintura_geral" value = "1">
        <label for = "pintura_geral"> Pintura Geral </label><br>
       

        <label class="label-text" for="horario"><strong>Horário</strong></label>
        <select class="label-select-service" name="horario" id="horario" required>
          <option value="">Escolha</option>
          <option value="08:00">08:00</option>
          <option value="09:00">09:00</option>
          <option value="10:00">10:00</option>
          <option value="11:00">11:00</option>
          <option value="12:00">12:00</option>
          <option value="14:00">14:00</option>
          <option value="15:00">15:00</option>
          <option value="16:00">16:00</option>
          <option value="17:00">17:00</option>
        </select>

        <?php
							if(!empty($_SESSION['horario_uso'])){
								echo "<p style='color: #f00; '>".$_SESSION['horario_uso']."</p>";
								unset($_SESSION['horario_uso']);
							}
					 ?>

        <label class="label-text" for="dia"><strong>Data:</strong></label>
        <input class="label" type="date" name="dia" 
        <?php
							if(!empty($_SESSION['value_dia'])){
								echo "value='".$_SESSION['value_dia']."'";
								unset($_SESSION['value_dia']);
							}
						 ?>	 required/>

        <input class="label" type="hidden" name="id" value =" <?php echo  $id ?>" required />

        <input type="submit" class="button" name ="cadastrar_agendamento" value="Agendar" />
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
        <a href="https://api.whatsapp.com/send?phone=+5561993398630&text=Oi! Gostaria de agendar um horário"
          target="_blank"><i class="icon-whatsapp"></i></a>
      </div>
    </div>
  </footer>
</body>

<!-- main.js -->
<script src="main.js"></script>

</html>