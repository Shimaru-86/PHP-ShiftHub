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
      <h1><strong>Boas Vindas ao PHP-ShiftHub</strong></h1>
      <p class="w3-large w3-wide">O framework de transição para desenvolvedores PHP que buscam avançar suas habilidades com facilidade.</p>
    </div>

    <br>

    <div class="w3-right">
      <a href="https://php-shifthub.shfocus.site/" target="_blank" class="w3-button w3-theme-d2 w3-round">Conheça Mais</a>
    </div>
  </section>

  <!-- Features - Recursos -->
  <section id="features" class="w3-container w3-padding w3-center">
    <h2 class="w3-text-dark-gray w3-wide w3-border-bottom w3-border-green w3-padding">Recursos do PHP-ShiftHub</h2>
    <div class="w3-row-padding w3-margin-top">
      
      <!-- Feature: Accelerated Development - Recurso: Desenvolvimento Acelerado -->
      <div class="w3-third w3-padding">
        <div class="w3-card w3-hover-shadow w3-round-large">
          <div class="w3-container w3-green w3-padding w3-round-large w3-topbar">
            <h3 class="w3-text-white">Desenvolvimento Acelerado</h3>
          </div>
          <div class="w3-container w3-padding">
            <p>Construa aplicativos PWA/TWA e sites responsivos rapidamente com uma estrutura simples e eficiente.</p>
          </div>
        </div>
      </div>
      
      <!-- Feature: Organization Made Easy - Recurso: Organização Facilitada -->
      <div class="w3-third w3-padding">
        <div class="w3-card w3-hover-shadow w3-round-large">
          <div class="w3-container w3-teal w3-padding w3-round-large w3-topbar">
            <h3 class="w3-text-white">Organização Facilitada</h3>
          </div>
          <div class="w3-container w3-padding">
            <p>Gerencie seus arquivos, classes e módulos com uma estrutura limpa que facilita a manutenção e a evolução do projeto.</p>
          </div>
        </div>
      </div>
      
      <!-- Feature: Perfect Intermediate - Recurso: Intermediário Perfeito -->
      <div class="w3-third w3-padding">
        <div class="w3-card w3-hover-shadow w3-round-large">
          <div class="w3-container w3-blue w3-padding w3-round-large w3-topbar">
            <h3 class="w3-text-white">Intermediário Perfeito</h3>
          </div>
          <div class="w3-container w3-padding">
            <p>Ideal para quem busca algo entre o desenvolvimento puro e frameworks robustos como Laravel.</p>
          </div>
        </div>
      </div>
      
    </div>

    <div class="w3-row-padding w3-margin-top">
      
      <!-- Feature: Extensibility - Recurso: Extensibilidade -->
      <div class="w3-third w3-padding">
        <div class="w3-card w3-hover-shadow w3-round-large">
          <div class="w3-container w3-purple w3-padding w3-round-large w3-topbar">
            <h3 class="w3-text-white">Extensibilidade</h3>
          </div>
          <div class="w3-container w3-padding">
            <p>Adicione suas próprias bibliotecas e recursos sem complicações, integrando ferramentas externas com facilidade.</p>
          </div>
        </div>
      </div>
      
      <!-- Feature: Optimized Performance - Recurso: Performance Otimizada -->
      <div class="w3-third w3-padding">
        <div class="w3-card w3-hover-shadow w3-round-large">
          <div class="w3-container w3-orange w3-padding w3-round-large w3-topbar">
            <h3 class="w3-text-white">Performance Otimizada</h3>
          </div>
          <div class="w3-container w3-padding">
            <p>Minimize a sobrecarga no servidor com um framework leve e rápido, focado em entregar resultados eficientes.</p>
          </div>
        </div>
      </div>
      
      <!-- Feature: Modularity - Recurso: Modularidade -->
      <div class="w3-third w3-padding">
        <div class="w3-card w3-hover-shadow w3-round-large">
          <div class="w3-container w3-red w3-padding w3-round-large w3-topbar">
            <h3 class="w3-text-white">Modularidade</h3>
          </div>
          <div class="w3-container w3-padding">
            <p>Projete seus sistemas com módulos independentes, permitindo reuso de código e fácil adaptação para novos projetos.</p>
          </div>
        </div>
      </div>
      
    </div>
  </section>

  <!-- Section with more resources - Seção com mais recursos -->
  <section id="more_resources" class="w3-theme-l4 w3-padding">
    <div class="w3-row w3-container w3-margin w3-center">
      <h2 class="w3-text-dark-gray w3-wide w3-border-bottom w3-border-green w3-padding">Principais Características</h2>
      <div class="w3-col l3 m6 w3-light-grey w3-container w3-padding-16">
        <h3>Design Responsivo</h3>
        <p>Crie sites e aplicativos otimizados para todos os dispositivos.</p>
      </div>

      <div class="w3-col l3 m6 w3-grey w3-container w3-padding-16">
        <h3>Suporte a PWA/TWA</h3>
        <p>Transforme suas aplicações web em aplicativos para SmartPhones.</p>
      </div>

      <div class="w3-col l3 m6 w3-dark-grey w3-container w3-padding-16">
        <h3>Fácil de Usar</h3>
        <p>Mais funcionalidades que o básico, mais simples que os avançados.</p>
      </div>

      <div class="w3-col l3 m6 w3-black w3-container w3-padding-16">
        <h3>Fácil Manutenção</h3>
        <p>Estrutura organizada que facilita a manutenção e a escalabilidade.</p>
      </div>
    </div>
  </section>

  <!-- Benefits Section - Seção de Benefícios -->
  <section id="benefits" class="w3-padding-32">
    <h2 class="w3-center">Por que usar o PHP-ShiftHub?</h2>
    <p class="w3-center">Perfeito para desenvolvedores que desejam crescer sem a complexidade inicial de frameworks robustos.</p>
    <ul class="w3-ul w3-border w3-white w3-margin-top" style="cursor: pointer;">
      <li onclick="accordion('li01')">
        Curva de aprendizado suave
        <p id="li01" class="w3-light-gray w3-padding" style="display: none;">
          O PHP-ShiftHub foi projetado para ser intuitivo, com uma estrutura simples que facilita o entendimento, mesmo para programadores iniciantes. Ele oferece uma transição natural para desenvolvedores que desejam evoluir sem enfrentar uma barreira inicial alta.
        </p>
      </li>
      <li onclick="accordion('li02')">
        Compatível com PWA-TWA
        <p id="li02" class="w3-light-gray w3-padding" style="display: none;">
          Transforme facilmente seus projetos em aplicativos progressivos (PWA) ou aplicativos Android (TWA) usando ferramentas modernas. Ideal para quem deseja explorar o potencial mobile sem complexidade adicional.
        </p>
      </li>
      <li onclick="accordion('li03')">
        Fácil manutenção e escalabilidade
        <p id="li03" class="w3-light-gray w3-padding" style="display: none;">
          O PHP-ShiftHub permite que seu projeto cresça de forma organizada. Com uma estrutura modular e bem documentada, é fácil adicionar novos recursos ou realizar manutenção sem comprometer a base existente.
        </p>
      </li>
      <li onclick="accordion('li04')">
        Criação de sites e aplicativos modernos
        <p id="li04" class="w3-light-gray w3-padding" style="display: none;">
          O framework é otimizado para criar interfaces responsivas e funcionalidades modernas, alinhadas com as tendências atuais do mercado. Perfeito para entregar projetos profissionais em pouco tempo.
        </p>
      </li>
      <li onclick="accordion('li05')">
        Suporte a práticas modernas de desenvolvimento
        <p id="li05" class="w3-light-gray w3-padding" style="display: none;">
          O PHP-ShiftHub incentiva o uso de padrões atuais como separação de camadas, templates reutilizáveis e integração com APIs, ajudando você a escrever código limpo e eficiente.
        </p>
      </li>
      <li onclick="accordion('li06')">
        Compatibilidade com bancos de dados
        <p id="li06" class="w3-light-gray w3-padding" style="display: none;">
          O framework é otimizado para trabalhar com bancos de dados relacionais como MySQL/MariaDB, permitindo consultas eficientes e integração perfeita com suas tabelas.
        </p>
      </li>
      <li onclick="accordion('li07')">
        Rápido para prototipação
        <p id="li07" class="w3-light-gray w3-padding" style="display: none;">
          Com a estrutura pronta para uso e recursos pré-configurados, você pode iniciar rapidamente novos projetos e obter resultados funcionais em um curto espaço de tempo.
        </p>
      </li>
    </ul>
  </section>

  <!-- Call to Action - Chamada para ação -->
  <section id="call_to_action" class="w3-center w3-dark-gray w3-text-white w3-padding-16">
    <h2><strong>Comece agora com o PHP-ShiftHub!</strong></h2>
    <p class="w3-large">Leve seu desenvolvimento para o próximo nível de forma simples e eficiente.</p>
    <a href="https://www.php-shifthub.shfocus.site" target="_blank" class="w3-button w3-green w3-large w3-round">Visitar Site Oficial</a>
  </section>

  <!-- Footer - Rodapé -->
  <?php include("./src/components/footer/Footer.php"); ?>
  
  <!-- Scripts JavaScript -->
  <script type="text/javascript" src="./src/scripts/Accordions.js">
    // Used to open and close the accordions
    // Usado para abrir e fechar acordeões
  </script>

</body>
</html>
