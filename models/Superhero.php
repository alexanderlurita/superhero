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
  public function generarGrafico01($publisher_id) {
    try {
      $consulta = $this->conexion->prepare("CALL spu_superhero_grafico01(?)");
      $consulta->execute(array($publisher_id));
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function generarGrafico02() {
    try {
      $consulta = $this->conexion->prepare("CALL spu_superhero_grafico02()");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function generarGrafico03() {
    try {
      $consulta = $this->conexion->prepare("CALL spu_superhero_grafico03()");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function generarGrafico04() {
    try {
      $consulta = $this->conexion->prepare("CALL spu_superhero_grafico04()");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function generarGrafico05() {
    try {
      $consulta = $this->conexion->prepare("CALL spu_superhero_grafico05()");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
  
}

?>