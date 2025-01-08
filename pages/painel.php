<!DOCTYPE html>
<html lang="pt-br">
<head>
  <?php include("./src/components/head/Head.php"); //Inclue os dados gerais do Head ?>
  <title>PHP-ShiftHub</title>
</head>

<body class="w3-theme-l5">
  <div class="w3-container w3-card-4 w3-margin w3-light-grey w3-round-large">
    <h1 class="w3-center">Estou na página PAINEL</h1>
    <p>Esta é uma área restrita, que apenas usuários logados no sistemas podem acessar.</p>

    <br>

    <!-- Botão de Logout -->
    <form action="<?php echo BASE_URL; ?>/logout" method="GET">
      <button class="w3-button w3-section w3-blue w3-ripple w3-round-large" type="submit">Sair</button>
    </form>
  </div>
</body>
</html>