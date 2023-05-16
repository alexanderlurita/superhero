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

  if ($_POST['operacion'] == 'filtrar') {
    $datos = $superhero->filtrar(
      $_POST['race_id'],
      $_POST['gender_id'],
      $_POST['alignment_id']
    );

    if ($datos){
      echo json_encode($datos);
    }
  }

  if ($_POST['operacion'] == 'graficar') {
    $datos = $superhero->graficar();
    echo json_encode($datos);
  }

  if ($_POST['operacion'] == 'generarReporte01') {
    $datos = $superhero->generarReporte01($_POST['publisher_id']);
    echo json_encode($datos);
  }

  if ($_POST['operacion'] == 'generarReporte02') {
    $datos = $superhero->generarReporte02();
    echo json_encode($datos);
  }
    
}

?>