<?php

require_once '../models/Publisher.php';

if (isset($_POST['operacion'])) {

  $publisher = new Publisher();

  if ($_POST['operacion'] == 'listar') {
    $datos = $publisher->listar();
    
    if ($datos) {
      echo json_encode($datos);
    }
  }
}

?>