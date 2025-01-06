<?php
  header('Content-Type: text/html; charset=utf-8');

  if (!isset($_SESSION['apresentacao'])) {
    // Se a variável de sessão não estiver definida, defina-a com o valor 0
    $_SESSION['apresentacao'] = 0;
  }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <?php include("./src/components/head/Head.php"); //Inclue os dados gerais do Head ?>

  <!-- Adicionar outros dados para o Head -->
  <title>PHP-ShiftHub</title>

  <!--Ativa o Service Worker - PWA Builder -->
  <script>
    if(typeof navigator.serviceWorker !== 'undefined') {
      navigator.serviceWorker.register('pwabuilder-sw.js');
    }
  </script>
</head>

<body class="w3-theme-l5">
  <!-- Top Menu / Navbar -->
  <?php //include("./src/components/navbar/Navbar.php"); ?>

  <h1>Estou na página LOGIN</h1>
</body>
</html>