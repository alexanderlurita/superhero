<?php

require_once '../models/RaceFilter.php';

if (isset($_POST['operacion'])){

  $race = new RaceFilter();

  if ($_POST['operacion'] == 'listar'){
    $datosObtenidos = $race->listar();
    if ($datosObtenidos){
      echo json_encode($datosObtenidos);
    }
  }


}