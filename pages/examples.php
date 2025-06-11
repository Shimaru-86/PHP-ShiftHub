<!DOCTYPE html>
<html lang="pt-br">
<head>
  <?php include("./src/components/head/Head.php"); ?>
  <title>PHP-ShiftHub</title>
  <style>
    html, body, h1, h2, h3, h4 { font-family: "Lato", sans-serif; }
  </style>
</head>
<body class="w3-theme-l5">

  <!-- Navbar - Barra de navegação -->
  <?php include("./src/components/navbar/Navbar.php"); ?>

  <!-- Hero Section - Seção Herói -->
  <section id="hero" class="w3-row w3-center w3-padding w3-bottombar" style="margin: 60px 20px;">
    <div class="w3-container w3-quarter">
      <img src="./src/images/logo.png" class="w3-round" style="width: 100%;" alt="Logo - Elefante sobre rodas">
    </div>
    <div class="w3-container w3-threequarter">
      <h1><strong>Exemplos em PHP-ShiftHub com W3CSS</strong></h1>
      <p class="w3-large w3-wide">O framework de transição para desenvolvedores PHP que buscam avançar suas habilidades com facilidade.</p>
    </div>

    <br>

    <div class="w3-right">
      <a href="https://php-shifthub.shfocus.site/" target="_blank" class="w3-button w3-theme-d2 w3-round">Conheça Mais</a>
    </div>
  </section>

  <!-- Border Section -->
  <?php include("./src/components/samples/Borders.php"); ?>

  <!-- About Sections -->
  <?php include("./src/components/samples/About_01.php"); ?>

  <!-- Footer -->
  <?php include("./src/components/footer/Footer.php"); ?>

  <!-- Scripts JavaScript -->

  <!-- Open and close the accordions - Abrir e fechar acordeões -->
  <script type="text/javascript" src="./src/scripts/Accordions.js"></script>

</body>
</html>