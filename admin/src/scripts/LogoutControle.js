function logoutControle() {

  let xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function() {
    if(xhr.readyState === 4) {
      if(xhr.status === 200) {
        // Lógica para manipular a resposta bem-sucedida
        console.log(xhr.responseText);
        try {
          // Converte a resposta JSON em um objeto JavaScript
          let responseObject = JSON.parse(xhr.responseText);
  
          if (responseObject.logout === "1") {
            //Destruir a SessionStorage.
            sessionStorage.clear();
  
            //Abrir o Dashboard (page).
            window.location.href = "./";
            
          } else if (responseObject.userLogged === "0") {
            showModal("modalAlert", "Erro ao deslogar. " + responseObject.info);
          } else {
            showModal("modalAlert", "Erro ao deslogar!");
          }
        } catch (error) {
          enableButton("btLoginAccount", "Logar");
          showModal("modalError", "Erro na requisição de lougout. Tente novamente mais tarde. Se o erro persistir, entre em contato com os administradores.");
        }
      } else {
        // Manipulador de erro para lidar com falhas na solicitação
        console.error("Erro na solicitação. Status: " + xhr.status);
      }
    }
  };

  xhr.onerror = function() {
    console.error("Erro de rede ao tentar fazer a solicitação.");
  };

  xhr.open("POST", "../controllers/LogoutControle.php");
  xhr.send();
}