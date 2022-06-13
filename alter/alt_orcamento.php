<?php

      // Verificando se temos o id
      if (!empty($_GET['id']))
      {

        include "../validation/conn.php";
        require "../validation/verifica.php";

        $id = $_GET['id'];

        $sqlSelect = "SELECT orcamento.id, cliente.nomeC, servico.tira_risco,servico.revitalizacao_pintura,servico.polimento_cristalizado,servico.micro_pintura,servico.polimento_farol,servico.pintura_geral, dia, orcamento.valor
        FROM servico
        INNER JOIN orcamento on orcamento.servico_id = servico.id
        INNER JOIN cliente on servico.cliente_id = cliente.id WHERE orcamento.id = '$id'";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
          while($user_data = mysqli_fetch_assoc($result))
           {
            
            $nome    = $user_data['nomeC'];
            /*$tira_risco = $user_data['tira_risco'];
            $rev_pint = $user_data['revitalizacao_pintura'];
            $pol_cristalizado = $user_data['polimento_cristalizado'];
            $micro_pint = $user_data['micro_pintura'];
            $pol_farol = $user_data['polimento_farol'];
            $pint_geral = $user_data['pintura_geral'];*/
            $valor   = $user_data['valor'];
            $dia        = $user_data['dia'];

            


      
           } 
           
        }
        else 
        {
          header('Location: ../listar/listar_orcamento.php');
              
        }
    } 
    else
     {
      header('Location: ../listar/listar_orcamento.php');
    }
  

      ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <!-- Page Info -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cadastro de Orçamento</title>

  <!-- Icons -->
  <link rel="stylesheet" href="assets/fonts/style.css" />

  <!-- Styles -->
  <link rel="stylesheet" href="../style/styleorcamento.css" />

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
            <a class="title" href="../home/home_administrador.php">Início</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <main>
    <fieldset class="field">
      <form method="POST" action="../alter/salvarEdicao.php">
        <div>
          <h1>Editar Orçamento</h1>

          <label for="cliente_nome" class="label-text"><strong>Nome do Cliente</strong></label>
          <input class="label" type="text" name="cliente_nome" value =" <?php echo  $nome?>" disabled="" required />

          
          <label class="label-text" for="dia"><strong>Data:</strong></label>
          <input class="label" type="date" name="dia"  value ="<?php echo  $dia ?>" disabled="" required />

          <label for="valor" class="label-text"><strong>Valor do Serviço</strong></label>
          <input class="label" type="text" name="valor" value =" <?php echo  $valor?>" required />

          <input class="label" type="hidden" name="id" value =" <?php echo  $id ?>" required />

          <input class="button" type="submit" name="atualizar_orcamento" value="Editar" />
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
        <a href="https://api.whatsapp.com/send?phone=+5561993398630&text=Oi! Gostaria de agendar um horário"
          target="_blank"><i class="icon-whatsapp"></i></a>
      </div>
    </div>
  </footer>-->
</body>

<!-- main.js -->
<script src="main.js"></script>

</html>
