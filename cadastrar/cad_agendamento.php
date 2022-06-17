<?php
// Verificando se temos o id
if (!empty($_GET['id'])) {

  include "../validation/conn.php";
  require "../validation/verifica.php";

  $id = $_GET['id'];

  $sqlSelect = "SELECT nomeC FROM cliente WHERE id = '$id'";

  $result = $conexao->query($sqlSelect);

  if ($result->num_rows > 0) {
    while ($user_data = mysqli_fetch_assoc($result)) {
      $nome    = $user_data['nomeC'];
    }
  } else {
    header('Location: ../listar/listar_clientes.php');
  }
} else {
  header('Location: ../listar/listar_clientes.php');
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

  <!-- STYLES -->
  <link rel="stylesheet" href="../style/styleagendamento.css" />

  <!-- FONTS -->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />
</head>

<body>
  <main class="container">
    <!-- Form -->
    <form action="../cadastrar/salvarCadastro.php" method="POST">
      <div class="backtomenu">
        <a href="../listar/listar_admin.php">Voltar</a>
        <div class="space"></div>
      </div>
      <h1>Cadastrar Agendamento</h1>

      <label class="label-text-client"><strong>Cliente</strong></label>
      <div class="input-field">
        <input class="label" type="text" name="nome" value="<?php echo  $nome ?>" disabled="" required />
        <div class="underline"></div>
      </div>
      <div class="space"></div>

      <label class="label-text"><strong>Tipos de Serviço</strong></label>

      <div class="custom-checkbox">
        <input id="tira_risco" type="checkbox" name="tira_risco" value="1">
        <label for="tira_risco">Tira Risco</label>
      </div>

      <div class="custom-checkbox">
        <input id="revitalizacao_pintura" type="checkbox" name="revitalizacao_pintura" value="1">
        <label for="revitalizacao_pintura">Revitalização de Pintura</label>
      </div>

      <div class="custom-checkbox">
        <input id="polimento_cristalizado" type="checkbox" name="polimento_cristalizado" value="1">
        <label for="polimento_cristalizado">Polimento Cristalizado</label>
      </div>

      <div class="custom-checkbox">
        <input id="micro_pintura" type="checkbox" name="micro_pintura" value="1">
        <label for="micro_pintura">Micro Pintura</label>
      </div>

      <div class="custom-checkbox">
        <input id="polimento_farol" type="checkbox" name="polimento_farol" value="1">
        <label for="polimento_farol">Polimento de Farol</label>
      </div>

      <div class="custom-checkbox">
        <input id="pintura_geral" type="checkbox" name="pintura_geral" value="1">
        <label for="pintura_geral">Pintura Geral</label>
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

      <?php
      if (!empty($_SESSION['horario_uso'])) {
        echo "<p style='color: #f00; '>" . $_SESSION['horario_uso'] . "</p>";
        unset($_SESSION['horario_uso']);
      }
      ?>

      <label class="label-text" for="dia"><strong>Data</strong></label>
      <input class="label" type="date" name="dia" <?php
                                                  if (!empty($_SESSION['value_dia'])) {
                                                    echo "value='" . $_SESSION['value_dia'] . "'";
                                                    unset($_SESSION['value_dia']);
                                                  }
                                                  ?> required />

      <input class="label" type="hidden" name="id" value=" <?php echo  $id ?>" required />

      <input type="submit" class="button" name="cadastrar_agendamento" value="Agendar" />
    </form>
  </main>

  <!-- main.js -->
  <script src="../function.js"></script>

</body>

</html>