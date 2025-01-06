<div id="loginControlePage" class="w3-main w3-theme-l5">

  <h1 class="w3-center"><strong>Login para o Painel de Controle</strong></h1>
  
  <br>
  
  <div class="w3-container">
    <div class="w3-card-4 w3-round-large w3-theme-l4 w3-padding" style="max-width: 1000px; margin: 0 auto;">
      
      <!-- Área de Login -->
        <div id="login" class="">
          <div class="w3-center">
            <h2 class="w3-center w3-color-d2"><b>Fazer Login</b></h2>
          </div>

          <form class="w3-container w3-margin">
            <div class="w3-row w3-section">
              <div class="w3-col" style="width: 50px">
                <i class="w3-xxlarge fa fa-user w3-color-d2"></i>
              </div>
              <div class="w3-rest">
                <input class="w3-input w3-border w3-hover-border-black w3-round" id="txtEmailLogin" type="text" placeholder="Email" autocomplete="email" />
              </div>
            </div>
      
            <div class="w3-row w3-section">
              <div class="w3-col" style="width: 50px">
                <i class="w3-xxlarge fa fa-eye w3-color-d2 sh-pointer" id="eyeIconLogin" onclick="seePassWord('txtSenhaLogin', 'eyeIconLogin')"></i>
              </div>
              <div class="w3-rest">
                <input class="w3-input w3-border w3-hover-border-black w3-round" id="txtSenhaLogin" type="password" placeholder="Senha" autocomplete="current-password" />
              </div>
            </div>
          </form>

          <div class="w3-container">
            <button id="btLoginControle" class="w3-button w3-round w3-block w3-section w3-ripple w3-padding sh-button" onclick="loginControle()">Entrar</button>
          </div>
        </div>
      <!--Fim da área para Login -->

    </div>
  </div>

  <br>
  
</div>