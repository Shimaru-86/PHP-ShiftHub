<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-theme-d1 w3-card" style="display: table; width: 100%;">
    <!-- Menu visível em telas grandes -->
    <div style="display: flex; align-items: center;">
      <button
        class="w3-bar-item w3-button w3-left w3-padding-large w3-hover-white w3-large w3-theme-d2"
        onclick="loadPage('Home')"
        title="Página Inicial">
        <img src="./src/images/logo_180x60.png" class="" style="height:40px;width:120px" alt="Logo">
      </button>
      <button class="w3-bar-item w3-button w3-hide-small w3-hide-medium" onclick="loadPage('Home')">Início</button>
      <button class="w3-bar-item w3-button w3-hide-small w3-hide-medium" onclick="loadPage('./src/pages/Presentation_Page.php')">Apresentação</button>
      <button class="w3-bar-item w3-button w3-hide-small w3-hide-medium" onclick="loadPage('./src/pages/About_Page.php')">Sobre</button>
      <button class="w3-bar-item w3-button w3-hide-small w3-hide-medium" onclick="loadPage('./src/pages/Faq_Page.php')">Perguntas Frequentes</button>
      <button class="w3-bar-item w3-button w3-hide-small w3-hide-medium" onclick="loadPage('./src/pages/Features_Page.php')">Recursos Adicionais</button>
      <button class="w3-bar-item w3-button w3-hide-small w3-hide-medium" onclick="loadPage('./src/pages/Contact_Page.php')">Contato</button>
      <button class="w3-bar-item w3-button w3-hide-small w3-hide-medium" onclick="loadPage('./src/pages/Support_Page.php')">Apoiar</button>
    </div>
    <!-- Botão de Menu para telas pequenas e médias - fica oculta em telas grandes --> 
    <div style="display: table-cell; vertical-align: middle; text-align: right;">
      <a class="w3-bar-item w3-button w3-padding-large w3-hide-large w3-right" title="Menu" onclick="openMobileMenu()"><i class="fa fa-bars"></i></a>
    </div>
  </div>
</div>

<!-- Navbar em telas pequenas e médias -->
<div id="navMobile" class="w3-bar-block w3-theme-d1 w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top: 65px;">
  <button class="w3-bar-item w3-button w3-padding-large" onclick="loadPage('Home')">Início</button>
  <button class="w3-bar-item w3-button w3-padding-large" onclick="loadPage('./src/pages/Presentation_Page.php')">Apresentação</button>
  <button class="w3-bar-item w3-button w3-padding-large" onclick="loadPage('./src/pages/About_Page.php')">Sobre</button>
  <button class="w3-bar-item w3-button w3-padding-large" onclick="loadPage('./src/pages/Faq.Faq_Page')">Perguntas Frequentes</button>
  <button class="w3-bar-item w3-button w3-padding-large" onclick="loadPage('./src/pages/Features_Page.php')">Recursos Adicionais</button>
  <button class="w3-bar-item w3-button w3-padding-large" onclick="loadPage('./src/pages/Contact_Page.php')">Contato</button>
  <button class="w3-bar-item w3-button w3-padding-large" onclick="loadPage('./src/pages/Support_Page.php')">Apoiar</button>
</div>
