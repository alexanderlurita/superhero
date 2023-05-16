<?php

require_once '../models/GenderFilter.php';

if (isset($_POST['operacion'])){

  $gender = new Genderfilter();

  if ($_POST['operacion'] == 'listar'){
    $datosObtenidos = $gender->listar();
    if ($datosObtenidos){
      echo json_encode($datosObtenidos);
    }
  }


}