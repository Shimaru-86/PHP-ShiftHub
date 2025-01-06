<?php
  require_once __DIR__ . '/../../config/Config.php';

  class Authentication {
    public static function handle($next) {
      if (isset($_SESSION['user'])) {
        return $next();
      } else {
        http_response_code(403);

        // Redireciona usando BASE_URL do config
        header("Location: " . BASE_URL . "/login");
        exit;
      }
    }
  }
?>