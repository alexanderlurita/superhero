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

  public function filtrar($race_id, $gender_id, $alignment_id) {
    try {
      $consulta = $this->conexion->prepare("CALL spu_filtrar_superheros(?,?,?)");
      $consulta->execute(array($race_id, $gender_id, $alignment_id));
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function graficar() {
    try {
      $consulta = $this->conexion->prepare("CALL spu_superhero_graphic()");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  //Métodos para ejercicios
  public function generarReporte01($publisher_id) {
    try {
      $consulta = $this->conexion->prepare("CALL spu_superhero_ejercicio01(?)");
      $consulta->execute(array($publisher_id));
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function generarReporte02() {
    try {
      $consulta = $this->conexion->prepare("CALL spu_superhero_ejercicio02()");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
  
}

?>