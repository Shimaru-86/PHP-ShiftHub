<?php
require_once __DIR__ . '/../lib/Connection.php';
require_once __DIR__ . '/../config/Config.php';

class AuthController {
  public static function login() {
    session_start();
    $db = (new Connection())->connectDB();

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verifica se os campos foram preenchidos
    if (empty($username) || empty($password)) {
      $_SESSION['error'] = "Preencha todos os campos.";
      header("Location: " . BASE_URL . "/login");
      exit;
    }

    // Busca o usuário no banco
    $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Verifica a senha
    if ($user && password_verify($password, $user['password_user'])) {
      $_SESSION['user'] = $user['username'];
      $_SESSION['user_id'] = $user['id_user'];

      // Redireciona para o painel
      header("Location: " . BASE_URL . "/painel");
      exit;
    } else {
      $_SESSION['error'] = "Usuário ou senha incorretos.";
      header("Location: " . BASE_URL . "/login");
      exit;
    }
  }
}
?>
