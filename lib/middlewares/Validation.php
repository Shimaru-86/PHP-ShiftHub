<?php
  class Validation {
    public static function handle($next) {
      // Verifica se o campo "id" na URL é numérico
      if (isset($_GET['id']) && !is_numeric($_GET['id'])) {
        http_response_code(400);
        return "ID inválido.";
      }
      return $next();
    }
  }
?>