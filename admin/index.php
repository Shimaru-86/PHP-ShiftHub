<?php
  session_start();

  include_once '../config/VerificaLogin.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Controle VTF</title>
  <!-- Favicon -->
  <link rel="icon" href="../src/images/icon.png" />
  <!-- Folhas de Estilo -->
  <link rel="stylesheet" href="../src/styles/w3css_4.css">
  <link rel="stylesheet" href="../src/styles/theme.css">
  <link rel="stylesheet" href="../src/styles/sh_custom.css">
  <link rel="stylesheet" href="../src/styles/fonts.css">
  <link rel="stylesheet" href="../src/styles/vtf.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <!-- Ícones -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}

    .editor-toolbar {
      display: flex;
      flex-wrap: wrap;
      margin-bottom: 10px;
    }

    .editor-toolbar button, .editor-toolbar select {
      margin-right: 5px;
      padding: 5px;
      font-size: 14px;
      cursor: pointer;
    }

    .editor-toolbar button.active {
      background-color: #ddd;
    }

    .editor-textarea {
      width: 100%;
      height: 200px;
      max-height: 400px; /* Ajuste conforme necessário */
      overflow-y: auto;
      padding: 15px;
      font-family: 'Times New Roman';
      font-size: 14pt;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .texto {
      margin-top: 0;
      margin-right: 0;
      margin-bottom: 3pt;
      margin-left: 5.65pt;
      text-align: justify;
      text-indent: -5.65pt;
    }
    .negrito { font-weight: bold; }
    .italico { font-style: italic; }
    .underline { text-decoration: underline; }
    .font-14 { font-size: 14pt; }
    .font-12 { font-size: 12pt; }
    .font-10 { font-size: 10pt; }
    .arial { font-family: 'Arial', sans-serif; }
    .courier { font-family: 'Courier New'; }
    .symbol { font-family: Symbol; }
    .times { font-family: 'Times New Roman'; }
    .sup { vertical-align: super; font-size: smaller; }
    .verbete {
      color: brown;
      font-weight: bold;
      margin-bottom: 10px;
    }
  </style>

  <!-- Adiciona o script de carregamento de páginas -->
  <script>
    function loadPage(page) {
      document.getElementById('divConteudoSpa').innerHTML = "<p style='margin-top: 65px'>Carregando...</p>";
      fetch(page)
      .then(response => response.text())
      .then(html => {
          document.getElementById('divConteudoSpa').innerHTML = html;
          //console.log(html);
      })
      .catch(error => console.error('Error:', error));

      //Fecha o submenu
      let navMobile = document.getElementById("navMobile");
      if (navMobile.className.indexOf("w3-show") != -1) {
        navMobile.className = navMobile.className.replace(" w3-show", "");
      }
    }
  </script>
</head>

<body class="w3-theme-l5">

  <div id="divConteudoSpa" style="margin-top: 65px">
    <?php
      if($logado) {
        include("./src/pages/Painel.php");
      } else {
        include("./src/pages/LoginControle.php");
      }
    ?>
  </div>

  <div>
    <?php
      //Inclue as Páginas Modais
      include("../src/components/modals/ModalAlert.php");
      include("../src/components/modals/ModalError.php");
      include("../src/components/modals/ModalNews.php");
    ?>
  </div>

  <!-- Adiciona os Scripts Globais -->
  <script src="../src/scripts/ButtonFunctions.js"></script>
  <script src="../src/scripts/ModalFunctions.js"></script>
  <script src="../src/scripts/navbar/NavbarFunctions.js"></script>

  <!-- Adiciona os Scripts Locais -->
  <script src="./src/scripts/PanelFunctions.js"></script>
  <script src="./src/scripts/LoginControle.js"></script>
  <script src="./src/scripts/LogoutControle.js"></script>
  <script src="./src/scripts/EditorFunctions.js"></script>
  <script src="./src/scripts/TranslateFunctions.js"></script>
</body>
</html>