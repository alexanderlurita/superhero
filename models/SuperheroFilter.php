<?php

require "Conexion.php";

class SuperheroFilter extends Conexion{
  private $conexion;

  public function __CONSTRUCT() {
    $this->conexion = parent::getConexion();
  }

  public function listar($race_id, $gender_id, $alignment_id) {
    try {
      $consulta = $this->conexion->prepare("CALL spu_filtrar_superheros(?,?,?)");
      $consulta->execute(array($race_id, $gender_id, $alignment_id));
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

}