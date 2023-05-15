<?php

require_once '../models/Superhero.php';

if (isset($_POST['operacion'])) {

  $superhero = new Superhero();

  if ($_POST['operacion'] == 'listar') {
    $datos = $superhero->listar($_POST['publisher_id']);
    
    if ($datos) {
      echo json_encode($datos);
    }
  }
}

?>