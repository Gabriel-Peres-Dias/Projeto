<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <!-- Page Info -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Orçamentos</title>

  <!-- Icons -->
  <link rel="stylesheet" href="assets/fonts/style.css" />

  <!-- STYLES -->
  <link rel="stylesheet" href="../style/stylelist.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- FONTS -->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />


</head>

<body>

  <!-- Header -->
  <header id="header">
    <nav class="container">
      <a class="logo" href="../home/home_administrador.php">mecânica<span>baiano</span>.</a>

      <!-- Menu -->
     <div class="dd-menu">
        <ul>
              <li><a href="../home/index.php">Início</a></li>
              <li><a href="../listar/listar_clientes.php">Clientes</a></li>
              <li><a href="../listar/listar_agendamentos.php">Agendamentos</a></li>
              <li><a href="../listar/listar_admin.php">Administradores</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>


</body>
<main>
  <?php

  include "../validation/conn.php";
  require "../validation/verifica.php";

  $resultado = mysqli_query($conexao, "SELECT orcamento.id, cliente.nomeC, tira_risco,revitalizacao_pintura,polimento_cristalizado,micro_pintura,polimento_farol,pintura_geral, dia, orcamento.valor
 FROM servico
 INNER JOIN orcamento on orcamento.servico_id = servico.id
 INNER JOIN cliente on servico.cliente_id = cliente.id;
 ");
  
  mysqli_close($conexao);

  ?>

<div class = "m-5">
        <table class="table">
      <thead>
        <tr>
              <th scope="col">Nome do Cliente</th>
              <th scope="col">Serviço</th>
              <th scope="col">Data</th>
              <th scope="col">Valor</th>
              <th scope="col">Editar</th>
              <th scope="col">Excluir</th>
        </tr>
      </thead>
      <tbody>
         <?php
          while($user_data = mysqli_fetch_assoc($resultado))
          {
            echo "<tr>";
            echo "<td>".$user_data['nomeC']."</td>";
            if ($user_data['tira_risco'] == 1) {
              echo "<td>Tira Risco<BR>";
            } else {
              echo "<td>";
            }
            if ($user_data['revitalizacao_pintura'] == 1) {
              echo "Revitalização de Pintura<BR>";
            }
            if ($user_data['polimento_cristalizado'] == 1) {
              echo "Polimento Cristalizado<BR>";
            }
            if ($user_data['micro_pintura'] == 1) {
              echo "Micro Pintura<BR>";
            }
            if ($user_data['polimento_farol'] == 1) {
              echo "Polimento de Farol<BR>";
            }
            if ($user_data['pintura_geral'] == 1) {
              echo "Pintura Geral</td>";
            }
            echo "<td>".date('d/m/Y', strtotime($user_data['dia']))."</td>";
            echo "<td>"."R$ ".$user_data['valor']."</td>";
            echo "<td>
            <a class = 'btn btn-sm btn-primary' href = '../alter/alt_orcamento.php?id=$user_data[id]'>
            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
            <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
            <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
          </svg>
           </td>";
           echo "<td>
            <a class = 'btn btn-sm btn-danger' href = '../delete/delete_orcamento.php?id=$user_data[id]'>
           <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
  <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
  <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
</svg>
            </td>";
            echo "</tr>";
          }
         ?>
        </tbody>
      </table>
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
      <a href="https://api.whatsapp.com/send?phone=+5561993398630&text=Oi! Gostaria de agendar um horário" target="_blank"><i class="icon-whatsapp"></i></a>
    </div>
  </div>
</footer>

</body>
<!-- main.js -->
<script src="main.js"></script>

</html>