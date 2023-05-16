<?php

require_once '../models/SuperheroFilter.php';

if (isset($_POST['operacion'])){

  $superherofilter = new SuperheroFilter();

  if ($_POST['operacion'] == 'listar'){
    $datos = $superherofilter->listar(
      $_POST['race_id'],
      $_POST['gender_id'],
      $_POST['alignment_id']
    );
    if ($datos){
      echo json_encode($datos);
    }
  }


}