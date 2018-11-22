<?php
/**
 *
 */
class ComentariosApiModel
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
      /*.'dbname=web2Comentarios;charset=utf8'*/
      , 'root', '');
    }
    catch(PDOException $ex){
      $resultado = 'Excepción capturada: '.  $ex->getMessage(). "\n";
      return $resultado;
    }
  }
  

  function crearDB(){
    $this->db->query("CREATE DATABASE IF NOT EXISTS `web2comentarios` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `web2comentarios`;");
    
    $tabla = "CREATE TABLE `comentario` (
  `id` int(11) NOT NULL,
  `idCatedra` int(11) NOT NULL,
  `textoComentario` text NOT NULL,
  `puntaje` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

    $this->db->query($tabla);
   
   $sentencias = "INSERT INTO `comentario` (`id`, `idCatedra`, `textoComentario`, `puntaje`) VALUES
  (1, 1, 1, 'comentario', 4);";

    $this->db->query($sentencias);
    
    $fk = "ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comentario_ibfk_2` (`idCatedra`);

  ALTER TABLE `comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

  ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`idCatedra`) REFERENCES `web2tp1`.`catedra` (`id`) ON DELETE CASCADE ON UPDATE CASCADE; COMMIT;  ";

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
      $sentencia = $this->db->prepare( "select * from comentario where id=?");
      $sentencia->execute(array($id));
      $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
      $this->db->commit();
      $sentencia->closeCursor();
      return $resultado;
    }
    else{
      $this->db->beginTransaction();
      $sentencia = $this->db->prepare( "select * from comentario");
      $sentencia->execute();
      $comentarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);
      $this->db->commit();
      $sentencia->closeCursor();
      return $comentarios;
    }
  }

  function getOrdenado($campo, $orden){
    $parametros = array($campo, $orden);
    if($this->entradaValida($parametros)){
      $this->db->beginTransaction();
      $sentencia = $this->db->prepare( "select * from comentario order by=(?,?)");
      $sentencia->execute(array($campo, $orden));
      $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
      $this->db->commit();
      $sentencia->closeCursor();
      return $resultado;
    }
    else
      return $this->get();
  }

  function insert($idCatedra, $textoComentario, $puntaje){
    $parametros = array($idCatedra, $textoComentario, $puntaje);
    if ($this->entradaValida($parametros)) {
      $this->db->beginTransaction();
      $sentencia = $this->db->prepare("INSERT INTO comentario(idCatedra,textoComentario, puntaje) VALUES(?,?,?)");
      $sentencia->execute(array($idCatedra,$textoComentario, $puntaje));
      $lastId =  $this->db->lastInsertId();
      $this->db->commit();
      $resultado = $sentencia->rowCount();
      $sentencia->closeCursor();
      if ($resultado)
        return $this->get($lastId);
      else
        return false;
    }
    else 
      return false;
  }

  function delete($id){
    $parametros = array($id);
    if ($this->entradaValida($parametros)) {
      $comentario = $this->get($id);
      if(isset($comentario)){
        $this->db->beginTransaction();
        $sentencia = $this->db->prepare( "delete from comentario where id=?");
        $sentencia->execute(array($id));
        $this->db->commit();
        $resultado = $sentencia->rowCount();
        $sentencia->closeCursor();
        if($resultado)
        return $comentario;
      else
        return false;
      }
      else return false;
    }
    else return false;
  }

  function update($idCatedra, $textoComentario, $puntaje, $id){
    $parametros = array($idCatedra, $textoComentario, $puntaje, $id);
    if ($this->entradaValida($parametros)) {
      $this->db->beginTransaction();
      $sentencia = $this->db->prepare( "update comentario set idCatedra = ?, textoComentario = ?, puntaje = ? where id=?");
      $sentencia->execute(array($idCatedra, $textoComentario, $puntaje, $id));
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

  function getByItem($item){
    $parametros = array($item);
    if($this->entradaValida($parametros)){
      $this->db->beginTransaction();
      $sentencia = $this->db->prepare( "select * from comentario where idCatedra = ?");
      $sentencia->execute(array($item));
      $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
      $this->db->commit();
      $sentencia->closeCursor();
      return $resultado;
    }
    else
      return false;
  }
}



 ?>
