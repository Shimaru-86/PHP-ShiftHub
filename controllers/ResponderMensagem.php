<?php
  header('Content-Type: application/json');
  require("../lib/Connection.class.php");

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Criar Conexão
    $connectionDB = new Connection();
    $connect = $connectionDB->connectDB();

    if ($connect->connect_error) {
      echo json_encode(array('success' => false, 'message' => 'Erro ao conectar com o Banco de Dados: ' . $connect->connect_error));
      exit(); // Saia do script após enviar a resposta JSON
    }

    // Capturar e validar os dados enviados
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $resposta = isset($_POST['resposta']) ? $_POST['resposta'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $respondida = 1;

    if ($id > 0) {
      // Enviar email
      $to = $email;
      $subject = "Resposta à sua mensagem";
      $message = $resposta;
      $headers = "From: suporte@esperantovtfbr.shfocus.site\r\n" .
                 "Reply-To: suporte@esperantovtfbr.shfocus.site\r\n" .
                 "X-Mailer: PHP/" . phpversion();

      if (mail($to, $subject, $message, $headers)) {
        // Se o e-mail for enviado com sucesso, atualizar o banco de dados
        $sqlUpdate = $connect->prepare("UPDATE mensagens SET respondida = ?, resposta = ? WHERE id = ?");
        $sqlUpdate->bind_param('isi', $respondida, $resposta, $id);

        if($sqlUpdate->execute()) {
          $response = array(
            'success' => true,
            'message' => 'Mensagem respondida com sucesso.'
          );
        } else {
          $response = array(
            'success' => false,
            'message' => 'Erro ao responder mensagem: ' . $sqlUpdate->error
          );
        }

        $sqlUpdate->close();
      } else {
        $response = array(
          'success' => false,
          'message' => 'Erro ao enviar e-mail.'
        );
      }
    } else {
      $response = array(
        'success' => false,
        'message' => 'ID inválido.'
      );
    }

    $connectionDB->disconnectDB();
    echo json_encode($response);
  }
?>
