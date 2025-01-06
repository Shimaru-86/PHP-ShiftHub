<?php
  // Verifica se os dados do usuário estão na sessão
  if (isset($_SESSION['userData'])) {
      $nome = $_SESSION['userData']['nome'];
  } else {
      $nome = "Visitante";
  }
?>

<div class="w3-light-grey">

  <!-- Top container -->
  <div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
    <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
    <span class="w3-bar-item w3-right">Logo</span>
  </div>

  <!-- Sidebar/menu -->
  <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
    <div class="w3-container w3-row">
      <div class="w3-col s4">
        <img src="https://www.w3schools.com//w3images/avatar2.png" class="w3-circle w3-margin-right" style="width:46px">
      </div>
      <div class="w3-col s8 w3-bar">
        <span>Olá, <strong><?php echo("$nome"); ?></strong></span>!<br>
      </div>
    </div>
    <hr>
    <div class="w3-container">
      <h5>Painel de Controle</h5>
    </div>
    <div class="w3-bar-block">
      <button class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="fechar menu"><i class="fa fa-remove fa-fw"></i>  Fechar Menu</button>
      <button class="w3-bar-item w3-button w3-padding" onclick="abrirPainel('painelVerbeteConsultar')"><i class="fa fa-bank fa-fw"></i>  Verbete - Consultar</button>
      <button class="w3-bar-item w3-button w3-padding" onclick="abrirPainel('painelVerbeteCriar')"><i class="fa fa-bank fa-fw"></i>  Verbete - Criar</button>
      <button class="w3-bar-item w3-button w3-padding" onclick="abrirPainel('painelMensagens')"><i class="fa fa-envelope fa-fw"></i>  Mensagens</button>
      <button class="w3-bar-item w3-button w3-padding" onclick="logoutControle()"><i class="fa fa-power-off fa-fw"></i>  Sair</button><br><br>
    </div>
  </nav>


  <!-- Efeito de Overlay quando abre o sidebar em telas pequenas -->
  <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

  <!-- PÁGINA DE CONTEÚDO -->
  <div class="w3-main" style="margin-left:300px;margin-top:43px;">
    <!-- Área dos Paineis -->

    <!-- Painel Consultar Verbete -->
    <div id="painelVerbeteConsultar" class="w3-panel paineis" style="display: none;">
      <div class="w3-row-padding" style="margin:0 -16px">
        <h4 class="w3-bottombar">
          <b><i class="fa fa-dashboard"></i> Consultar / Editar</b>
          <span class="w3-right w3-margin-right w3-text-red w3-xlarge sh-pointer" onclick="fecharPainelConsultar()"><strong>X</strong></span>
        </h4>
        
        
      </div>
    </div>

    <!-- Painel Criar Verbete -->
    <div id="painelVerbeteCriar" class="w3-panel paineis" style="display: none;">
      <div class="w3-row-padding" style="margin:0 -16px">
        <h4 class="w3-bottombar">
          <b><i class="fa fa-dashboard"></i> Criar</b>
          <span class="w3-right w3-margin-right w3-text-red w3-xlarge sh-pointer" onclick="fecharPainel()"><strong>X</strong></span>
        </h4>
      </div>
    </div>

    <!-- Inclue as telas do buscador e do editor -->
    <?php
      include(__DIR__ . "/../components/Buscador.php");
      include(__DIR__ . "/../components/Editor.php");
    ?>

    <!-- Painel Mensagens Não Respondidas -->
    <div id="painelMensagens" class="w3-panel paineis" style="display: none;">
      <div class="w3-row-padding" style="margin:0 -16px">
        <h4 class="w3-bottombar">
          <b><i class="fa fa-dashboard"></i> Mensagens não respondidas</b>
          <span class="w3-right w3-margin-right w3-text-red w3-xlarge sh-pointer" onclick="fecharPainel()"><strong>X</strong></span>
        </h4>
        <div id="divMensagens"></div>
      </div>
    </div>
    <br>

    <!-- Footer -->
    <footer class="w3-container w3-padding-16 w3-grey">
      <p>© Dicionário Túlio Flores</p>
    </footer>

    <!-- End page content -->
  </div>

</div>