<?php
  require("../lib/Connection.class.php");

  header('Content-Type: application/json');

  $response = ['success' => false, 'message' => 'Erro desconhecido.'];

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $nome = isset($_POST['nome']) ? trim($_POST['nome']) : '';
      $email = isset($_POST['email']) ? trim($_POST['email']) : '';
      $mensagem = isset($_POST['mensagem']) ? trim($_POST['mensagem']) : '';

      if (empty($nome) || empty($email) || empty($mensagem)) {
          $response['message'] = 'Todos os campos são obrigatórios.';
          echo json_encode($response);
          exit;
      }

      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $response['message'] = 'Email inválido.';
          echo json_encode($response);
          exit;
      }

      try {
          $connectionDB = new Connection();
          $connect = $connectionDB->connectDB();

          $stmt = $connect->prepare("INSERT INTO mensagens (nome, email, mensagem, respondida) VALUES (?, ?, ?, 0)");
          $stmt->bind_param("sss", $nome, $email, $mensagem);

          if ($stmt->execute()) {
              $response['success'] = true;
              $response['message'] = 'Mensagem enviada com sucesso!';
          } else {
              $response['message'] = 'Erro ao salvar a mensagem no banco de dados.';
          }

          $stmt->close();
          $connect->close();
      } catch (Exception $e) {
          $response['message'] = 'Erro no servidor: ' . $e->getMessage();
      }
  }

  echo json_encode($response);
?>
