<?php
  require_once __DIR__ . '/../../../config/Config.php';

  // Busca o caminho da URL para saber em qual página estamos neste momento.
  $relativePath = Config::getRelativePath();

  // Analisa em qual página está e marca o menu da página atual.
  $home = $relativePath === '' || $relativePath === 'home' ? 'w3-teal' : '';
  $exemplos = $relativePath === 'exemplos' ? 'w3-teal' : '';
  $apoiar = $relativePath === 'apoiar' ? 'w3-teal' : '';
?>

<div>
  <!-- Navbar on large or medium screens -->
  <div class="w3-top">
    <div class="w3-bar w3-theme-d2 w3-left-align">
      <button class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" onclick="openSmallMenu()"><i class="fa fa-bars"></i></button>
      <a href="home" class="w3-bar-item w3-button w3-hover-white <?php echo $home ?>"><i class="fa fa-home w3-margin-right"></i>PHP-ShiftHub</a>
      <a href="exemplos" class="w3-bar-item w3-button w3-hide-small w3-hover-white <?php echo $exemplos ?>">Exemplos</a>
      <a href="apoiar" class="w3-bar-item w3-button w3-hide-small w3-hover-white <?php echo $apoiar ?>">Apoiar</a>
    </div>

    <!-- Navbar on small screens -->
    <div id="navSmall" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium">
      <a href="home" class="w3-bar-item w3-button">PHP-ShiftHub</a>
      <a href="exemplos" class="w3-bar-item w3-button">Exemplos</a>
      <a href="apoiar" class="w3-bar-item w3-button">Apoiar</a>
    </div>
  </div>
</div>

<script>
  function openSmallMenu() {
    var x = document.getElementById("navSmall");
    if (x.className.indexOf("w3-show") == -1) {
      x.className += " w3-show";
    } else { 
      x.className = x.className.replace(" w3-show", "");
    }
  }
</script>