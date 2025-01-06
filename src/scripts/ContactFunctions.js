function validarEmail(email) {
  var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return re.test(email);
}

function enviarMensagem() {
  
  var nome = document.getElementById('txtName').value;
  var email = document.getElementById('txtEmail').value;
  var mensagem = document.getElementById('txtMessage').value;

  if (!nome || !email || !mensagem) {
      showModal("modalAlert", "Por favor, preencha todos os campos.");
      return;
  }

  if (!validarEmail(email)) {
      showModal("modalAlert", "Por favor, insira um email válido.");
      return;
  }

  var xhr = new XMLHttpRequest();
  xhr.open('POST', './controllers/EnviarMensagem.php', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
      if (xhr.status === 200) {
          var response = JSON.parse(xhr.responseText);
          if (response.success) {
              showModal("modalNews", "Mensagem enviada com sucesso!");
          } else {
              showModal("modalError", "Erro no envio da mensagem. Tente novamente.");
          }
      } else {
          showModal("modalError", "Erro no envio da mensagem. Tente novamente.");
      }
  };
  xhr.send('nome=' + encodeURIComponent(nome) + '&email=' + encodeURIComponent(email) + '&mensagem=' + encodeURIComponent(mensagem));
  }