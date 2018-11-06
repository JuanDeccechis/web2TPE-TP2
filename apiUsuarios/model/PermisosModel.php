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

  function Get($id=null){
    if(isset($id)){
      $sentencia = $this->db->prepare( "select * from usuario where id=?");
      $sentencia->execute(array($id));
      return $sentencia->fetch(PDO::FETCH_ASSOC);
    }
    else{
      $sentencia = $this->db->prepare( "select * from usuario");
      $sentencia->execute();
      $usuarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);
      /*foreach ($usuarios as $key => $usuario) 
        $usuario[$key]['completada'] = $usuario['completada'] == "1" ? true : false;
*/
      return $usuario;
    }
  }
}