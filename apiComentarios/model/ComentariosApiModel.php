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
  `idUsuario` int(11) NOT NULL,
  `idCatedra` int(11) NOT NULL,
  `textoComentario` text NOT NULL,
  `puntaje` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

    $this->db->query($tabla);
   /*
   $sentencias = "INSERT INTO `carrera` (`id`, `nombre`, `descripcion`) VALUES
  (1, 'carrera1', 'agregada'),
  (2, 'car sin cat', 'agregada'),
  (3, 'carrera 2', 'agregada'),
  (4, 'carrera 3', 'desde frontend');

  INSERT INTO `catedra` (`id`, `nombre`, `link`, `cant_alumnos`, `id_carrera`) VALUES
  (1, 'catedra 1', 'asd', 1, 1),
  (2, 'user1', 'http/prog_1', 1, 1),
  (3, 'catedra 2', 'http/prog_2', 1, 1),
  (4, 'catedra 1', 'agregad', 1, 3);

  INSERT INTO `usuario` (`id`, `nickname`, `pass`) VALUES
  (1, 'juan', '\$2y\$10\$dC4rtG4juiZKIQ9IYvGpoeeh5x9DPqJ3aW37.tepitqCCRmSqIKn.'),
  (2, 'andres', '\$2y\$10\$sw4HN33NKJ0t67BftE6kVua7xvQFYY8AVLKJPqPv8S7oDVsWXqSQO'),
  (3, 'ultimo', '\$2y\$10\$yc5vEHT/xb0Ssv5NT.38a.kWyC3PK4q1qxwJmFPa1QQib5ZtkQOwu');";

    $this->db->query($sentencias);*/
    
    $fk = "ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comentario_ibkf_1` (`idUsuario`),
  ADD KEY `comentario_ibfk_2` (`idCatedra`);

  ALTER TABLE `comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

  ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`idCatedra`) REFERENCES `web2tp1`.`catedra` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_ibkf_1` FOREIGN KEY (`idUsuario`) REFERENCES `web2usuarios`.`usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE; COMMIT;  ";

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

  function insert($idUsuario, $idCatedra, $textoComentario, $puntaje){
    $parametros = array($idUsuario, $idCatedra, $textoComentario, $puntaje);
    if ($this->entradaValida($parametros)) {
      $this->db->beginTransaction();
      $sentencia = $this->db->prepare("INSERT INTO comentario(idUsuario,idCatedra,textoComentario, puntaje) VALUES(?,?,?,?)");
      $sentencia->execute(array($idUsuario,$idCatedra,$textoComentario, $puntaje));
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

  function update($idUsuario, $idCatedra, $textoComentario, $puntaje, $id){
    $parametros = array($idUsuario, $idCatedra, $textoComentario, $puntaje, $id);
    if ($this->entradaValida($parametros)) {
      $this->db->beginTransaction();
      $sentencia = $this->db->prepare( "update comentario set idUsuario = ?, idCatedra = ?, textoComentario = ?, puntaje = ? where id=?");
      $sentencia->execute(array($idUsuario, $idCatedra, $textoComentario, $puntaje, $id));
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
