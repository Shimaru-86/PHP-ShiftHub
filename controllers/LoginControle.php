<?php
  //Configura corretamente os caracteres para serem enviados pelo Json de volta para o Programa.
  header('Content-Type: application/json; charset=utf-8');

  require_once("../lib/Login.class.php");

  // Verifica se os campos esperados estão presentes e não estão vazios
  if(isset($_POST["email"]) && isset($_POST["senha"]) && !empty($_POST["email"]) && !empty($_POST["senha"])) { 
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    
    //A variável response guarda o resultado do login:
    $loginAccount = new Login();
    $response = $loginAccount->logar($email, $senha);
  } else {
    $response = array('userLogged' => '0', 'info' => 'Email ou senha em branco.');
  }



  echo(json_encode($response, JSON_UNESCAPED_UNICODE));
?>