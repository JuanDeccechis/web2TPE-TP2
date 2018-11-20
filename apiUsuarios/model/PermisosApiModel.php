<?php
/**
 *
 */
class PermisosApiModel
{
  private $db;

  function __construct()
  {
    $this->db = $this->Connect();
  }

  function Connect(){
    try{
      return new PDO('mysql:host=localhost;'
      .'dbname=web2Usuarios;charset=utf8'
      , 'root', '');
    }
    catch(PDOException $ex){
      $resultado = 'Excepción capturada: '.  $ex->getMessage(). "\n";
      return $resultado;
    }
  }

  private function entradaValida($parametros){
    $resultado = true;
    for ($i=0; $i < count($parametros); $i++) { 
      if(!((isset($parametros[$i]))))
        $resultado = false;
    }
    return $resultado;
  }

  function get($id=null){
    if(isset($id)){
      $sentencia = $this->db->prepare( "select * from permisosusuario where idUsuario=?");
      $sentencia->execute(array($id));
      return $sentencia->fetch(PDO::FETCH_ASSOC);
    }
    else{
      $sentencia = $this->db->prepare( "select * from permisosusuario");
      $sentencia->execute();
      $usuarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);
      /*foreach ($usuarios as $key => $usuario) 
        $usuario[$key]['completada'] = $usuario['completada'] == "1" ? true : false;
*/
      return $usuario;
    }
  }

  function insert($idUsuario, $alta, $baja, $modificacion, $visualizacion, $admin, $altaComentario, $inmortal){
    $parametros = array($idUsuario, $alta, $baja, $modificacion, $visualizacion, $admin, $altaComentario, $inmortal);
    if($this->entradaValida($parametros)){
      $this->db->beginTransaction();
      $sentencia = $this->db->prepare("INSERT INTO permisosusuario(idUsuario, alta, baja, modificacion, visualizacion, admin, altaComentario, inmortal) VALUES(?,?,?,?,?,?,?,?)");
      $sentencia->execute(array($idUsuario, $alta, $baja, $modificacion, $visualizacion, $admin, $altaComentario, $inmortal));
      $lastId =  $this->db->lastInsertId();
      $this->db->commit();
      $resultado = $sentencia->rowCount();
      $sentencia->closeCursor();
    }
  }
}