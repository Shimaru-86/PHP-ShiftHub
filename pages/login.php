<!DOCTYPE html>
<html lang="pt-br">
<head>
  <?php include("./src/components/head/Head.php"); //Inclue os dados gerais do Head ?>
  <title>PHP-ShiftHub</title>
</head>

<body class="w3-theme-l5">
  <div class="w3-display-container" style="height: 100vh;">
    <div class="w3-display-middle" style="width: 100%; max-width: 600px;">
      
      <?php if (isset($_SESSION['error'])): ?>
        <p class="w3-text-red w3-center"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
      <?php endif; ?>
      
      <form 
        action="<?php echo BASE_URL; ?>/auth" 
        method="POST" 
        class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-round-large">
        
        <h2 class="w3-center">Formulário de Login</h2>
        
        <div class="w3-row w3-section">
          <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
          <div class="w3-rest">
            <input class="w3-input w3-border" type="text" id="username" name="username" placeholder="Nome de usuário" required>
          </div>
        </div>

        <div class="w3-row w3-section">
          <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-lock"></i></div>
          <div class="w3-rest">
            <input class="w3-input w3-border" type="password" id="password" name="password" placeholder="Senha" required>
          </div>
        </div>

        <p class="w3-center">
          <button class="w3-button w3-section w3-blue w3-ripple w3-round-large"> Logar </button>
        </p>
      </form>
    </div>
  </div>
</body>
</html>