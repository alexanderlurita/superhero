<?php

require_once 'Conexion.php';

class Superhero extends Conexion{

  private $conexion;

  public function __CONSTRUCT() {
    $this->conexion = parent::getConexion();
  }

  public function listar($publisher_id) {
    try {
      $consulta = $this->conexion->prepare("CALL spu_superhero_list(?)");
      $consulta->execute(array($publisher_id));
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch(Exception $e) {
      die($e->getCode());
    }
  }
  
}

?>