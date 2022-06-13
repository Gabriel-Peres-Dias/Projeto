<?php

      // Verificando se temos o id
      if (!empty($_GET['id']))
      {

        include "../validation/conn.php";
        

        $id = $_GET['id'];

        $sqlSelect = "SELECT cliente.nomeC, tira_risco,revitalizacao_pintura,polimento_cristalizado,micro_pintura,polimento_farol,pintura_geral, horario, dia FROM cliente
        INNER JOIN servico on cliente.id = servico.cliente_id WHERE servico.id = '$id'";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
          while($user_data = mysqli_fetch_assoc($result))
           {
            
            $nome    = $user_data['nomeC'];
            $tira_risco = $user_data['tira_risco'];
            $rev_pint = $user_data['revitalizacao_pintura'];
            $pol_cristalizado = $user_data['polimento_cristalizado'];
            $micro_pint = $user_data['micro_pintura'];
            $pol_farol = $user_data['polimento_farol'];
            $pint_geral = $user_data['pintura_geral'];
            $horario    = $user_data['horario'];
            $dia        = $user_data['dia'];

            if ($user_data['tira_risco'] == 1) {
              $tiraC = "checked" ;
            } else {
              $tiraC = "";
            }
            if ($user_data['revitalizacao_pintura'] == 1) {
              $revC = "checked" ;
            } else {
              $revC = "";
            }
            if ($user_data['polimento_cristalizado'] == 1) {
              $polC = "checked" ;
            }else {
              $polC = "";
            }
            if ($user_data['micro_pintura'] == 1) {
              $micC = "checked" ;
            } else {
              $micC = "";
            }
            if ($user_data['polimento_farol'] == 1) {
              $polfC = "checked" ;
            } else {
              $polfC = "";
            }
            if ($user_data['pintura_geral'] == 1) {
              $pintC = "checked" ;
            }else {
              $pintC = "";
            }

            

      
           } 
           
        }
        else 
        {
          header('Location: ../listar/listar_agendamento.php');
              
        }
    } 
    else
     {
      header('Location: ../listar/listar_agendamento.php');
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
      rel="stylesheet"
    />
  </head>

  <body>
    <!-- Header -->
    <header id="header">
      <nav class="container">
        <a class="logo" href="../home/home_administrador.php"
          >mecânica<span>baiano</span>.</a
        >

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
        <h1>Editar Agendamento</h1>

        <form action="../alter/salvarEdicao.php" method="POST">

         

          <label class="label-text" ><strong>Tipos de Serviço</strong></label>
          
          <br><input type = "checkbox"  name = "tira_risco" value = "<?php  echo $tira_risco; ?>" <?php echo  $tiraC  ?> >
          <label for = "tira_risco"> Tira Risco </label>
          <?php  echo $tira_risco; echo $tiraC; ?>

          <br><input type = "checkbox"  name = "revitalizacao_pintura" value = "<?php echo $rev_pint; ?>" <?php echo $revC    ?> >
          <label for = "revitalizacao_pintura"> Revitalização de Pintura </label>

          <br><input type = "checkbox"  name = "polimento_cristalizado" value = "<?php echo $pol_cristalizado; ?>" <?php  echo $polC ?> >
          <label for = "polimento_cristalizado"> Polimento Cristalizado </label>

          <br><input type = "checkbox"  name = "micro_pintura" value = "<?php echo $micro_pint; ?>" <?php  echo $micC ?> >
          <label for = "micro_pintura"> Micro Pintura </label>

          <br><input type = "checkbox"  name = "polimento_farol" value = "<?php echo $pol_farol; ?>" <?php echo $polfC  ?> >
          <label for = "polimento_farol"> Polimento de Farol </label>

          <br><input type = "checkbox"  name = "pintura_geral" value = "<?php echo $pint_geral; ?>" <?php echo $pintC   ?> >
          <label for = "pintura_geral"> Pintura Geral </label><br>

          <label class="label-text" for="horario"><strong>Horário</strong></label>
        <select class="label-select-service" name="horario" id="horario" value =" <?php echo  $horario ?>"  required>
          <option value="">Escolha</option>
          <option value="08:00" <?=($horario == '08:00:00')?'selected':''?>>08:00</option>
          <option value="09:00" <?=($horario == '09:00:00')?'selected':''?>>09:00</option>
          <option value="10:00" <?=($horario == '10:00:00')?'selected':''?>>10:00</option>
          <option value="11:00" <?=($horario == '11:00:00')?'selected':''?>>11:00</option>
          <option value="12:00" <?=($horario == '12:00:00')?'selected':''?>>12:00</option>
          <option value="14:00" <?=($horario == '14:00:00')?'selected':''?>>14:00</option>
          <option value="15:00" <?=($horario == '15:00:00')?'selected':''?>>15:00</option>
          <option value="16:00" <?=($horario == '16:00:00')?'selected':''?>>16:00</option>
          <option value="17:00" <?=($horario == '17:00:00')?'selected':''?>>17:00</option>
        </select>

          <label class="label-text" for="dia"><strong>Data:</strong></label>
          <input class="label" type="date" name="dia" value="<?php echo  $dia ?>" required />

          <input class="label" type="hidden" name="id" value =" <?php echo  $id ?>" required />

          <input type="submit" class="button" name = "atualizar_agendamento"value="Editar" />
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
          <a
            href="https://api.whatsapp.com/send?phone=+5561993398630&text=Oi! Gostaria de agendar um horário"
            target="_blank"
            ><i class="icon-whatsapp"></i
          ></a>
        </div>
      </div>
    </footer>-->
  </body>

  <!-- main.js -->
  <script src="main.js"></script>
</html>
