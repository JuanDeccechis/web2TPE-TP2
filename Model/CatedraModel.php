<?php
/**
 *
 */
require_once "AbstractModel.php";

class CatedraModel extends AbstractModel
{
    
  function __construct()
  {
    parent::__construct();
    parent::setVar("catedra");
  }

  /*function mostrar(){
      return $this->getAll(CatedraModel::INSTANCE);
  }

  function eliminar($id){
    $afectados = $this->delete(CatedraModel::INSTANCE, $id);
  }

  function mostrarUno($id){
    return $this->getOne(CatedraModel::INSTANCE, $id);
  }

  function mostrarPorCarrera($id_carrera){
    return $this->getByIdCarrera(CatedraModel::INSTANCE, $id_carrera);
  }
*/
  function agregar($nombre,$link, $cant_alumnos, $id_carrera){
    $sentencia = $this->db->prepare("INSERT INTO catedra(nombre, link, cant_alumnos, id_carrera) VALUES(?,?,?,?)");
    $sentencia->execute(array($nombre,$link, $cant_alumnos, $id_carrera));
    $resul = $sentencia->rowCount();
    return $resul;
  }

  function guardarEditar($nombre,$link,$cant_alumnos,$id_carrera,$id){
    $sentencia = $this->db->prepare( "update catedra set nombre = ?, link = ?, cant_alumnos = ?, id_carrera = ? where id=?");
    $sentencia->execute(array($nombre,$link, $cant_alumnos, $id_carrera, $id));
    $resul = $sentencia->rowCount();
    return $resul;
  }

}


 ?>
