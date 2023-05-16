<?php

require_once '../models/Gender.php';

if (isset($_POST['operacion'])){

  $gender = new Gender();

  if ($_POST['operacion'] == 'listar'){
    $datosObtenidos = $gender->listar();
    if ($datosObtenidos){
      echo json_encode($datosObtenidos);
    }
  }


}