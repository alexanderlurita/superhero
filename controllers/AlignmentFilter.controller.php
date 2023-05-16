<?php

require_once '../models/AlignmentFilter.php';

if (isset($_POST['operacion'])){

  $alignment = new AlignmentFilter();

  if ($_POST['operacion'] == 'listar'){
    $datosObtenidos = $alignment->listar();
    if ($datosObtenidos){
      echo json_encode($datosObtenidos);
    }
  }


}