<?php
  class Log {
    public static function handle($next) {
      $log = date('Y-m-d H:i:s') . " - Rota acessada: " . $_SERVER['REQUEST_URI'] . "\n";
      file_put_contents(__DIR__ . '/../../logs/access.log', $log, FILE_APPEND);
      return $next();
    }
  }
?>