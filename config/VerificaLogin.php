<?php
  if(isset($_SESSION['userData'])) {
    $idUsuario = $_SESSION['userData']['idUsuario'];
    $logado = true;
  } else {
    $logado = false;
  }
?>