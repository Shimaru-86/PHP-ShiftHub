function loginControle() {
  //Desativa o botão de Login
  disableButton("btLoginControle", "Logando...");

  let dados = new FormData();
  let xhr; // xmlHttpRequest

  let email = document.getElementById('txtEmailLogin').value;
  let senha = document.getElementById('txtSenhaLogin').value;

  //Validações
  if(email === "")
  {
    showModal("modalAlert", "Preencha seu email.");
    enableButton("btLoginControle", "Logar");
    return;
  }
  if(senha === "")
  {
    showModal("modalAlert", "Preencha sua senha.");
    enableButton("btLoginControle", "Logar");
    return;
  }

  //Execução do Request de Login
  if(email !== "" && senha !== "") {
    dados.append('email', email);
    dados.append('senha', senha);
  
    xhr = new XMLHttpRequest();
  
    xhr.onreadystatechange = function() {
      /*
        0- Requisição não inicializada
        1- Estabeleceu requisição com o servidor
        2- Pedido recebido
        3- Processando pedido
        4- Solicitação concluída e resposta pronta
      */

      if(xhr.readyState === 4 && xhr.status === 200) {

        try {
          // Converte a resposta JSON em um objeto JavaScript
          let responseObject = JSON.parse(xhr.responseText);

          console.log(xhr.responseText);

          if (responseObject.userLogged === "1") {
            //Cria os dados da sessionStorage do JavaScript
            sessionStorage.setItem('userLogged', responseObject.userLogged);
            sessionStorage.setItem('info', responseObject.info);
            sessionStorage.setItem('idUsuario', responseObject.idUsuario_PK);
            sessionStorage.setItem('nome', responseObject.nome);
            sessionStorage.setItem('email', responseObject.email);

            //Abrir o Dashboard (page).
            window.location.href = "./";
            
          } else if (responseObject.userLogged === "0") {
            enableButton("btLoginControle", "Logar");
            showModal("modalAlert", "Erro ao logar. " + responseObject.info);
          } else {
            enableButton("btLoginControle", "Logar");
            showModal("modalAlert", "Erro ao logar! Verifique se seu email e sua senha estão corretos");
          }
        } catch (error) {
          enableButton("btLoginControle", "Logar");
          showModal("modalError", "Erro na requisição de login. Tente novamente mais tarde. Se o erro persistir, entre em contato com os administradores.");
        }
      }
    }
    xhr.open("POST", "../controllers/LoginControle.php");
    xhr.send(dados);
  }
}