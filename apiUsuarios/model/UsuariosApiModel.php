<?php
/**
 *
 */
class UsuariosApiModel
{
  private $db;

 function __construct()
  {
    $this->db = $this->Connect();
    $this->crearDB();
  }

  function Connect(){
    try{
      return new PDO('mysql:host=localhost;'
      /*.'dbname=web2Usuarios;charset=utf8'*/
      , 'root', '');
    }
    catch(PDOException $ex){
      $resultado = 'Excepción capturada: '.  $ex->getMessage(). "\n";
      return $resultado;
    }
  }

  function crearDB(){
    $this->db->query("CREATE DATABASE IF NOT EXISTS `web2usuarios` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `web2usuarios`;");
    
    $tabla = "CREATE TABLE `usuario` (
    `id` int(11) NOT NULL,
    `nickname` varchar(50) NOT NULL,
    `pass` varchar(300) NOT NULL,
    `tipo` varchar(50) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

    $this->db->query($tabla);
   
   $sentencias = "INSERT INTO `usuario` (`id`, `nickname`, `pass`, `tipo`) VALUES
  (1, 'juan', '\$2y\$10\$lcCBoAjPj2iaHCIY4TtGF.YgVS53vv7djT791gj8Vx7QZe2rjyUZu', 'inmortal'),
  (2, 'andres', '\$2y\$10\$c7.t6Mg50nRFy8mVknV8WeseJRH1ZTcDZPCfVFyQn9BahDJqKzOBy', 'inmortal');";

    $this->db->query($sentencias);
    
    $fk = "ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nickname` (`nickname`);

  ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;";

    $this->db->query($fk);

  }

  private function entradaValida($parametros){
    $resultado = true;
    for ($i=0; $i < count($parametros); $i++) { 
      if(!((isset($parametros[$i])) && ($parametros[$i] != null)))
        $resultado = false;
    }
    return $resultado;
  }

  function get($id=null){
    $parametros = array($id);
    if($this->entradaValida($parametros)){
      $this->db->beginTransaction();
      $sentencia = $this->db->prepare( "select * from usuario where id=?");
      $sentencia->execute(array($id));
      $this->db->commit();
      $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
      $sentencia->closeCursor();
      return $resultado;
    }
    else{
      $this->db->beginTransaction();
      $sentencia = $this->db->prepare( "select * from usuario");
      $sentencia->execute();
      $this->db->commit();
      $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
      $sentencia->closeCursor();
      return $resultado;
    }
  }

  function getByNick($nickname=null){
    $parametros = array($nickname);
    if($this->entradaValida($parametros)){
      $this->db->beginTransaction();
      $sentencia = $this->db->prepare( "select * from usuario where nickname=?");
      $sentencia->execute(array($nickname));
      $this->db->commit();
      $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
      $sentencia->closeCursor();
      return $resultado;
    }
    else{
      return false;
    }
  }

/*************REVISAR**********/
  function insert($nickname, $pass, $tipo){
    $parametros = array($nickname, $pass, $tipo);
    if ($this->entradaValida($parametros)) {
      $hash = password_hash($pass, PASSWORD_DEFAULT);
      $this->db->beginTransaction();
      $sentencia = $this->db->prepare("INSERT INTO usuario(nickname, pass, tipo) VALUES(?,?,?)");
      $sentencia->execute(array($nickname, $hash, $tipo));
      $this->db->commit();
      $resultado = $sentencia->rowCount();
      $sentencia->closeCursor();
      if ($resultado)
        return $this->getByNick($nickname);
      else return false;
    }
    else return false;
  }

  function delete($id){
    $parametros = array($id);
    if ($this->entradaValida($parametros)) {
      $usuario = $this->get($id);
      if(isset($usuario)){
        if ($usuario["tipo"] != "inmortal") {
          $this->db->beginTransaction();
          $sentencia = $this->db->prepare( "delete from usuario where id=?");
          $sentencia->execute(array($id));
          $this->db->commit();
          $resultado = $sentencia->rowCount();
          $sentencia->closeCursor();
          if($resultado)
            return $usuario;
          else return false;
        }
        else return false;
      }
      else return false;
    }
    else return false;
  }
/*
  function Completar($id){

    $sentencia = $this->db->prepare( "update usuario set completada=1 where id=?");
    $sentencia->execute(array($id));
  }*/

/*************REVISAR**********/
  function update($nickname, $pass, $tipo, $id){
    $parametros = array($nickname, $pass, $tipo, $id);
    if ($this->entradaValida($parametros)) {
      $hash = password_hash($pass, PASSWORD_DEFAULT);
      $this->db->beginTransaction();   
      $sentencia = $this->db->prepare( "update usuario set nickname = ?, pass = ?, tipo = ? where id=?");
      $sentencia->execute(array($nickname, $hash, $tipo, $id));
      $this->db->commit();
      $resultado = $sentencia->rowCount();
      $sentencia->closeCursor();
      if($resultado)
        return $this->get($id);
      else
        return false;
    }
    else return false;
  }
}
 ?>

