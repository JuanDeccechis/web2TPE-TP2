<?php
/**
 *
 */
class TareasModel
{
  private $db;

  function __construct()
  {
    $this->db = $this->Connect();
  }

  function Connect(){
    return new PDO('mysql:host=localhost;'
    .'dbname=web2;charset=utf8'
    , 'root', '');
  }

  function GetTareas(){

      $sentencia = $this->db->prepare( "select * from tarea");
      $sentencia->execute();
      $tareas = $sentencia->fetchAll(PDO::FETCH_ASSOC);

      foreach ($tareas as $key => $tarea) 
        $tareas[$key]['completada'] = $tarea['completada'] == "1" ? true : false;

      return $tareas;
  }

  function GetTarea($id){

      $sentencia = $this->db->prepare( "select * from tarea where id=?");
      $sentencia->execute(array($id));
      return $sentencia->fetch(PDO::FETCH_ASSOC);
  }

  function InsertarTarea($titulo,$descripcion,$completada){

    $sentencia = $this->db->prepare("INSERT INTO tarea(titulo, descripcion, completada) VALUES(?,?,?)");
    $sentencia->execute(array($titulo,$descripcion,$completada));
    $lastId =  $this->db->lastInsertId();
    return $this->GetTarea($lastId);
  }

  function BorrarTarea($idTarea){

    $tarea = $this->GetTarea($idTarea);
    if(isset($tarea)){
      $sentencia = $this->db->prepare( "delete from tarea where id=?");
      $sentencia->execute(array($idTarea));
      return $tarea;
    }
  }

  function CompletarTarea($id_tarea){

    $sentencia = $this->db->prepare( "update tarea set completada=1 where id=?");
    $sentencia->execute(array($id_tarea));
  }

  function GuardarEditarTarea($titulo,$descripcion,$completada,$id){
    $sentencia = $this->db->prepare( "update tarea set titulo = ?, descripcion = ?, completada = ? where id=?");
    $sentencia->execute(array($titulo,$descripcion,$completada,$id));
  }
}


 ?>
