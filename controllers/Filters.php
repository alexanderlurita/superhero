<?php

require_once '../models/Alignment.php';
require_once '../models/Gender.php';
require_once '../models/Race.php';

function renderJSON($object = []) {
  if ($object) {
    echo json_encode($object);
  }
}

if (isset($_POST['operacion'])) {
  
  switch ($_POST['operacion']) {
    case 'listarBandos':
      $alignment = new Alignment();
      renderJSON($alignment->listar());
      break;
    case 'listarRazas':
      $race = new Race();
      renderJSON($race->listar());
      break;
    case 'listarGeneros':
      $gender = new Gender();
      renderJSON($gender->listar());
      break;
  }
}

?>