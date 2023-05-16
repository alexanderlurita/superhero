<?php

require_once '../models/Race.php';

if (isset($_POST['operacion'])){

  $race = new Race();

  if ($_POST['operacion'] == 'listar'){
    $datosObtenidos = $race->listar();
    if ($datosObtenidos){
      echo json_encode($datosObtenidos);
    }
  }


}