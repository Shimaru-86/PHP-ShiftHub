// Pega o sidebar
var mySidebar = document.getElementById("mySidebar");

// Pega a div com o efeito de overlay
var overlayBg = document.getElementById("myOverlay");

// Alterna entre mostrar e esconder o sidebar e faz o efeito de overlay
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Fecha o sidebar com o botão de fechar
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}

//Funções para responder mensagem
function cancelarResposta(id) {
  let idDivResposta = `divResposta-${id}`;
  let idBtResponder = `btResponder-${id}`;
  let idBtCancelar = `btCancelar-${id}`;
  let idBtEnviar = `btEnviar-${id}`;
  document.getElementById(idDivResposta).style.display = "none";
  document.getElementById(idBtCancelar).style.display = "none";
  document.getElementById(idBtEnviar).style.display = "none";
  document.getElementById(idBtResponder).style.display = "block";
}

function responderMensagem(id) {
  let idDivResposta = `divResposta-${id}`;
  let idBtResponder = `btResponder-${id}`;
  let idBtCancelar = `btCancelar-${id}`;
  let idBtEnviar = `btEnviar-${id}`;
  document.getElementById(idDivResposta).style.display = "block";
  document.getElementById(idBtCancelar).style.display = "block";
  document.getElementById(idBtEnviar).style.display = "block";
  document.getElementById(idBtResponder).style.display = "none";
}

function enviarResposta(id, email) {
  let msgResposta = `msgResposta-${id}`;
  let resposta = document.getElementById(msgResposta).value;

  if(resposta == "") {
    showModal("modalAlert", "Digite a mensagem.");
    return;
  }
  
  let xhr = new XMLHttpRequest();
  xhr.open('POST', '../controllers/ResponderMensagem.php', true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      var response = JSON.parse(xhr.responseText);

      if (response.success) {
        showModal("modalNews", "Mensagem respondida com sucesso.");
        let idMensagem = `msg-${id}`;
        document.getElementById(idMensagem).style.display = "none";
      } else {
        showModal("modalError", `${response.message}`);
      }

      document.getElementById('resultado').innerHTML = resultHTML;
    }
  };
  xhr.send('id=' + encodeURIComponent(id) + '&resposta=' + encodeURIComponent(resposta) + '&email=' + encodeURIComponent(email));
}

function carregaMensagens() {
  document.getElementById('divMensagens').innerHTML = '<strong>Status: </strong> <i class="fa fa-spinner fa-spin"></i> Carregando Mensagens...';

  //Carrega as mensagens do Banco de Dados
  const xhr = new XMLHttpRequest();
  xhr.open('POST', '../controllers/BuscarMensagens.php', true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      const response = JSON.parse(xhr.responseText);

      if (response.success) {
        // Recebeu as mensagens
        const mensagens = response.mensagens;
        const divMensagens = document.getElementById('divMensagens');

        // Limpar o conteúdo atual
        divMensagens.innerHTML = '';

        // Iterar sobre as mensagens e criar elementos HTML para cada uma
        mensagens.forEach(mensagem => {
          const divMensagem = document.createElement('div');
          divMensagem.classList.add('mensagem');

          const html = `
            <div id="msg-${mensagem.id}" class="w3-card w3-border w3-margin w3-round w3-padding">
              <button id="btResponder-${mensagem.id}" class="w3-right w3-blue w3-button w3-round w3-margin" onclick="responderMensagem(${mensagem.id})">Responder</button>
              <button id="btEnviar-${mensagem.id}" class="w3-right w3-blue w3-button w3-round w3-margin" style="display:none" onclick="enviarResposta(${mensagem.id}, '${mensagem.email}')">Enviar Resposta</button>
              <button id="btCancelar-${mensagem.id}" class="w3-right w3-red w3-button w3-round w3-margin" style="display:none" onclick="cancelarResposta(${mensagem.id})">Cancelar</button>
              <p><strong>Nome:</strong> ${mensagem.nome}</p>
              <p><strong>Email:</strong> ${mensagem.email}</p>
              <p><strong>Data de Envio:</strong> ${mensagem.data_envio}</p>
              <p><strong>Mensagem:</strong> ${mensagem.mensagem}</p>
              <div id="divResposta-${mensagem.id}" style="display:none">
                <textarea id="msgResposta-${mensagem.id}" style="width: 100%; height: 100px; margin-top: 10px;"></textarea>
              </div>
            </div>
          `;

          console.log(html);

          divMensagem.innerHTML = html;
          divMensagens.appendChild(divMensagem);
        });
      } else {
        //Exibir mensagem de erro.
        showModal("modalError", "Erro ao carregar mensagens: " + response.message)
      }
    }
  };
  xhr.send();
}

// Abre o painel escolhido e fecha os demais
function abrirPainel(idPainel) {
  // Seleciona todas as divs com a classe "paineis"
  let paineis = document.querySelectorAll('.paineis');
  // Itera sobre cada div e define display como "none"
  paineis.forEach(function(painel) {
    painel.style.display = "none";
  });

  //Abre o painel selecionado -- Antes das divs internas
  document.getElementById(idPainel).style.display = "block";

  //Abre as divs internas do painel selecionado

  //Abre o editor para criar verbetes caso o painel aberto seja o de Consulta/Edição
  if(idPainel == "painelVerbeteConsultar") {
    document.getElementById("buscadorDeVerbetes").style.display = "block";
    document.getElementById('saveButton').innerText = "Atualizar Verbete";
  }
  //Abre o editar para editar verbetes caso o painel aberto seja o de criação
  if(idPainel == "painelVerbeteCriar") {
    document.getElementById("divEditor").style.display = "block";
    document.getElementById("idVerbete").innerHTML = 0;
    document.getElementById("editorVerbete").value = "";
    document.getElementById("editor").innerHTML = '<p class="MsoNormal" style="margin-top:0cm;margin-right:0cm;margin-bottom:3.0pt;margin-left:5.65pt;text-align:justify;text-indent:-5.65pt">...</p>';
    document.getElementById('verbete').innerText = "";
    document.getElementById('preview').innerHTML = "";
    document.getElementById('output').value = "";
    document.getElementById('saveButton').innerText = "Salvar Verbete";
  }
  //Abre o painel das mensagens a serem respondidas
  if(idPainel == "painelMensagens") {
    carregaMensagens();
  }
}

function fecharPainel() {
  // Seleciona todas as divs com a classe "paineis"
  let paineis = document.querySelectorAll('.paineis');
  // Itera sobre cada div e define display como "none"
  paineis.forEach(function(painel) {
    painel.style.display = "none";
  });
}

function fecharPainelConsultar() {
  //Fecha o buscador de verbetes
  if(document.getElementById("buscadorDeVerbetes").style.display == "block") {
    document.getElementById("palavra").value = "";
    fecharPainel();
    return;
  }

  //Fecha o Editor de verbetes
  if(document.getElementById("divEditor").style.display == "block") {
    document.getElementById("divEditor").style.display = "none";
    document.getElementById("buscadorDeVerbetes").style.display = "block";
    buscarPalavra();
    return;
  }
}