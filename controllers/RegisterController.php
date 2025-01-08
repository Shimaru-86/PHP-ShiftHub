<?php
require_once __DIR__ . '/../lib/Connection.php';
require_once __DIR__ . '/../config/Config.php';

class RegisterController {
  public static function register() {
    session_start();
    $db = (new Connection())->connectDB();

    // Recebendo os dados do formulário
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Validações
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
      $_SESSION['error'] = "Preencha todos os campos.";
      header("Location: " . BASE_URL . "/register");
      exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $_SESSION['error'] = "E-mail inválido.";
      header("Location: " . BASE_URL . "/register");
      exit;
    }

    if ($password !== $confirm_password) {
      $_SESSION['error'] = "As senhas não coincidem.";
      header("Location: " . BASE_URL . "/register");
      exit;
    }

    try {
      // Verifica se o e-mail já existe
      $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
      $stmt->bind_param('s', $email);
      $stmt->execute();
      $result = $stmt->get_result();

      if ($result->num_rows > 0) {
        $_SESSION['error'] = "E-mail já cadastrado.";
        header("Location: " . BASE_URL . "/register");
        exit;
      }

      // Hash da senha
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);

      // Insere o novo usuário
      $stmt = $db->prepare("INSERT INTO users (username, email, password_user) VALUES (?, ?, ?)");
      $stmt->bind_param('sss', $username, $email, $hashed_password);
      $stmt->execute();

      $_SESSION['success'] = "Usuário registrado com sucesso!";
      header("Location: " . BASE_URL . "/login");
      exit;
    } catch (Exception $e) {
      $_SESSION['error'] = "Erro ao registrar: " . $e->getMessage();
      header("Location: " . BASE_URL . "/register");
      exit;
    }
  }
}
?>
