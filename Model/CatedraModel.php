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
    $parametros = array($nombre,$link, $cant_alumnos, $id_carrera);
    if ($this->entradaValida($parametros)) {
      /*$this->db->beginTransaction();   */
      $sentencia = $this->db->prepare("INSERT INTO catedra(nombre, link, cant_alumnos, id_carrera) VALUES(?,?,?,?)");
      $sentencia->execute(array($nombre,$link, $cant_alumnos, $id_carrera));
      /*$this->db->commit();        si uso el commit no puedo pedir el lastInsertedId()*/
      $resul = $sentencia->rowCount();
      /*$sentencia->closeCursor();*/
      return $resul;
    }
    else return false;
  }

  function guardarEditar($nombre,$link,$cant_alumnos,$id_carrera,$id){
    $parametros = array($nombre,$descripcion,$id);
    if ($this->entradaValida($parametros)) {
      $this->db->beginTransaction(); 
      $sentencia = $this->db->prepare( "update catedra set nombre = ?, link = ?, cant_alumnos = ?, id_carrera = ? where id=?");
      $sentencia->execute(array($nombre,$link, $cant_alumnos, $id_carrera, $id));
      $this->db->commit();
      $resul = $sentencia->rowCount();
      $sentencia->closeCursor();
      return $resul;
    }
    else return false;
  }

  function getLast(){
    $lastId =  $this->db->lastInsertId();
    return $this->mostrarUno($lastId);
  }

}


 ?>
