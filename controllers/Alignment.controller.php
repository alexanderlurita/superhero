<?php

require_once '../models/Alignment.php';

if (isset($_POST['operacion'])){

  $alignment = new Alignment();

  if ($_POST['operacion'] == 'listar'){
    $datosObtenidos = $alignment->listar();
    if ($datosObtenidos){
      echo json_encode($datosObtenidos);
    }
  }


}