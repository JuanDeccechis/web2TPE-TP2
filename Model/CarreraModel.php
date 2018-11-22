<?php
/**
 *
 */
require_once "AbstractModel.php";

class CarreraModel extends AbstractModel
{

  function __construct()
  {
    parent::__construct();
    parent::setVar("carrera");
  }

  /*function mostrar(){
    return $this->getAll(CarreraModel::INSTANCE);
  }

  function mostrarUno($id){
    return $this->getOne(CarreraModel::INSTANCE, $id);
  }
*/
  function eliminar($id){
    $afectados = parent::eliminar($id);
    return $afectados;
  }

  function getBy($columna, $valor, $cantidad) {
    $parametros = array($columna, $valor, $cantidad);
    if ($this->entradaValida($parametros)) {
      $this->db->beginTransaction();
      $sentencia = $this->db->prepare( "select * from carrera where $columna=? limit $cantidad");
      $sentencia->execute(array($valor));
      $this->db->commit();
      $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
      $sentencia->closeCursor();
      return $resultado;
    }
    else return false;
  }
  function getNombres() { // Solo id y nombre de todas las carreras
    $this->db->beginTransaction();
    $sentencia = $this->db->prepare("select id, nombre from carrera");
    $sentencia->execute();
    $this->db->commit();
    $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    $sentencia->closeCursor();
    return $resultado;
  }

  function agregar($nombre,$descripcion){
    $parametros = array($nombre,$descripcion);
    if ($this->entradaValida($parametros)) {
      $this->db->beginTransaction();
      $sentencia = $this->db->prepare("INSERT INTO carrera(nombre, descripcion) VALUES(?,?)");
      $sentencia->execute(array($nombre,$descripcion));
      $lastId =  $this->db->lastInsertId();
      $this->db->commit();
      $resultado = $sentencia->rowCount();
      $sentencia->closeCursor();
      if ($resultado)
        return $this->mostrar($lastId);
      else return false;
    }
    else return false;
  }

  function guardarEditar($nombre,$descripcion,$id){
    $parametros = array($nombre,$descripcion,$id);
    if ($this->entradaValida($parametros)) {
      $this->db->beginTransaction();   
      $sentencia = $this->db->prepare( "update carrera set nombre = ?, descripcion = ? where id=?");
      $sentencia->execute(array($nombre,$descripcion,$id));
      $this->db->commit();
      $resultado = $sentencia->rowCount();
      $sentencia->closeCursor();
      if($resultado)
        return $this->mostrar($id);
      else
        return false;
    }
    else return false;
  }
}


 ?>
