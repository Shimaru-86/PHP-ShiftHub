<?php
  class Config {
    public static function getAbsolutePath() {
      return __DIR__;
    }

    public static function getRequestUri() {
      return $_SERVER['REQUEST_URI'];
    }

    public static function getBasePath() {
      $basePath = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
      return rtrim($basePath, '/');
    }

    public static function getRelativePath() {
      $basePath = self::getBasePath();
      $requestUri = self::getRequestUri();
      return trim(str_replace($basePath, '', $requestUri), '/');
    }
  }

  define('BASE_URL', Config::getBasePath());

  // ***************************************************** CASO O CÓDIGO ACIMA NÃO FUNCIONAR,
  // ***************************************************** SERÁ NECESSÁRIO DEFINIR BASE_URL MANUALMENTE

  //***** Local development - Desenvolvimento com servidor local
  // Defines the website address
  //define('BASE_URL', '/projetos/php-shifthub');

  //*************/

  //***** In production - Site em produção = Site online
  // Defines the website address
  //define('BASE_URL', '/projetos/php-shifthub');
?>