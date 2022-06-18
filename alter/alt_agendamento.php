<?php
// Verificando se temos o id
if (!empty($_GET['id'])) {
  include "../validation/conn.php";

  $id = $_GET['id'];

  $sqlSelect = "SELECT cliente.nomeC, tira_risco,revitalizacao_pintura,polimento_cristalizado,micro_pintura,polimento_farol,pintura_geral, horario, dia FROM cliente
        INNER JOIN servico on cliente.id = servico.cliente_id WHERE servico.id = '$id'";

  $result = $conexao->query($sqlSelect);

  if ($result->num_rows > 0) {
    while ($user_data = mysqli_fetch_assoc($result)) {
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
        $tiraC = "checked";
      } else {
        $tiraC = "";
      }
      if ($user_data['revitalizacao_pintura'] == 1) {
        $revC = "checked";
      } else {
        $revC = "";
      }
      if ($user_data['polimento_cristalizado'] == 1) {
        $polC = "checked";
      } else {
        $polC = "";
      }
      if ($user_data['micro_pintura'] == 1) {
        $micC = "checked";
      } else {
        $micC = "";
      }
      if ($user_data['polimento_farol'] == 1) {
        $polfC = "checked";
      } else {
        $polfC = "";
      }
      if ($user_data['pintura_geral'] == 1) {
        $pintC = "checked";
      } else {
        $pintC = "";
      }
    }
  } else {
    header('Location: ../listar/listar_agendamento.php');
  }
} else {
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
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />
</head>

<body>
  <!-- Form -->
  <main class="container">
    <div class="backtomenu">
      <a href="../listar/listar_agendamentos.php">Voltar</a>
      <div class="space"></div>
    </div>

    <h1>Editar Agendamento</h1>
    <form action="../alter/salvarEdicao.php" method="POST">

      <label class="label-text"><strong>Tipos de Serviço</strong></label>

      <div class="custom-checkbox">
        <input type="checkbox" name="tira_risco" value="<?php echo $tira_risco; ?>" <?php echo  $tiraC  ?>>
        <label for="tira_risco"> Tira Risco </label>
      </div>

      <div class="custom-checkbox">
        <input type="checkbox" name="revitalizacao_pintura" value="<?php echo $rev_pint; ?>" <?php echo $revC    ?>>
        <label for="revitalizacao_pintura"> Revitalização de Pintura </label>
      </div>

      <div class="custom-checkbox">
        <input type="checkbox" name="polimento_cristalizado" value="<?php echo $pol_cristalizado; ?>" <?php echo $polC ?>>
        <label for="polimento_cristalizado"> Polimento Cristalizado </label>
      </div>

      <div class="custom-checkbox">
        <input type="checkbox" name="micro_pintura" value="<?php echo $micro_pint; ?>" <?php echo $micC ?>>
        <label for="micro_pintura"> Micro Pintura </label>
      </div>

      <div class="custom-checkbox">
        <input type="checkbox" name="polimento_farol" value="<?php echo $pol_farol; ?>" <?php echo $polfC  ?>>
        <label for="polimento_farol"> Polimento de Farol </label>
      </div>

      <div class="custom-checkbox">
        <input type="checkbox" name="pintura_geral" value="<?php echo $pint_geral; ?>" <?php echo $pintC   ?>>
        <label for="pintura_geral"> Pintura Geral </label><br>
      </div>

      <div class="select-box">
        <div class="options-container" id="horario">
          <div class="option">
            <input class="radio" type="radio" id="h1" name="horario-1">
            <label for="horario-1">08:00</label>
          </div>

          <div class="option">
            <input class="radio" type="radio" id="h2" name="horario-2">
            <label for="horario-2">09:00</label>
          </div>

          <div class="option">
            <input class="radio" type="radio" id="h3" name="horario-3">
            <label for="horario-3">10:00</label>
          </div>

          <div class="option">
            <input class="radio" type="radio" id="h4" name="horario-4">
            <label for="horario-4">11:00</label>
          </div>

          <div class="option">
            <input class="radio" type="radio" id="h5" name="horario-5">
            <label for="horario-5">12:00</label>
          </div>

          <div class="option">
            <input class="radio" type="radio" id="h6" name="horario-6">
            <label for="horario-6">14:00</label>
          </div>

          <div class="option">
            <input class="radio" type="radio" id="h7" name="horario-7">
            <label for="horario-7">15:00</label>
          </div>

          <div class="option">
            <input class="radio" type="radio" id="h8" name="horario-8">
            <label for="horario-8">16:00</label>
          </div>

          <div class="option">
            <input class="radio" type="radio" id="h9" name="horario-9">
            <label for="horario-9">17:00</label>
          </div>
        </div>
        <div class="selected">
          Escolha um Horário
        </div>
      </div>

      <label class="label-text-data" for="dia"><strong>Data</strong></label>
      <input class="label" type="date" name="dia" value="<?php echo  $dia ?>" required />

      <input class="label" type="hidden" name="id" value=" <?php echo  $id ?>" required />

      <input type="submit" class="button" name="atualizar_agendamento" value="Editar" />
    </form>
  </main>

  <!-- main.js -->
  <script src="../function.js"></script>

</body>

</html>