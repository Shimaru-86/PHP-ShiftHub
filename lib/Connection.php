<?php
  class Connection {
    private $connect = null;

    //Teste
    private string $host = "localhost";
    private string $user = "root";
    private string $pass = "";
    private string $dbname = "php_shifthub_teste";

    /*
    //REAL
    private string $host = "localhost";
    private string $user = "user";
    private string $pass = "pass";
    private string $dbname = "Banco_de_Dados";
    */

    public function connectDB() {
      $this->connect = new mysqli($this->host, $this->user, $this->pass, $this->dbname);

      if ($this->connect->connect_error) {
        die("Erro ao conectar ao Banco de Dados: " . $this->connect->connect_error);
      }

      $this->connect->set_charset('utf8mb4');

      return $this->connect;
    }

    public function disconnectDB() {
      if ($this->connect) {
        $this->connect->close();
      }
    }
  }
?>
