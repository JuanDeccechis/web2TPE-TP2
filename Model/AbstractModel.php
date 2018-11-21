<?php
/**
 *
 */
abstract class AbstractModel
{
  protected $db;
  private $tabla;

  function __construct() {
    $this->db = $this->Connect();
    $this->crearDB();
  }

  function Connect(){
    try{
      return new PDO('mysql:host=localhost;'
      /*.'dbname=db_web2_tp1;charset=utf8'*/
      , 'root', '');
    }
    catch(PDOException $ex){
      $resultado = 'Excepción capturada: '.  $ex->getMessage(). "\n";
      return $resultado;
    }
  }

  function setVar($var){
    $this->tabla = $var;
  }

  function crearDB(){
    $this->db->query("CREATE DATABASE IF NOT EXISTS `web2tp1` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
      USE `web2tp1`;");
    
    $tabla = "CREATE TABLE IF NOT EXISTS `carrera` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
  ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
  
  CREATE TABLE IF NOT EXISTS `catedra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `link` varchar(50) NOT NULL,
  `cant_alumnos` int(11) NOT NULL,
  `id_carrera` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_carrera` (`id_carrera`)
  ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

  CREATE TABLE IF NOT EXISTS `imagen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCatedra` int(11) NOT NULL,
  `direccion` text NOT NULL,
  PRIMARY KEY (`id`,`idCatedra`)
  ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;";

    $this->db->query($tabla);
   
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

  INSERT INTO `imagen` (`id`, `idCatedra`, `direccion`) VALUES
  (31, 2, 'images/5beb6f7de4a5b.png'),
  (32, 2, 'images/5beb6f7de88dc.png');";

    $this->db->query($sentencias);

    $fk = "ALTER TABLE `catedra`
  ADD CONSTRAINT `catedra_ibfk_1` FOREIGN KEY (`id_carrera`) REFERENCES `carrera` (`id`);
  COMMIT;

  ALTER TABLE `imagen`
  ADD CONSTRAINT `imagen_ibfk_1` FOREIGN KEY (`idCatedra`) REFERENCES `catedra` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
  COMMIT;";

    $this->db->query($fk);

  }

  protected function entradaValida($parametros){
    $resultado = true;
    for ($i=0; $i < count($parametros); $i++) { 
      if(!((isset($parametros[$i])) && ($parametros[$i] != null)))
        $resultado = false;
    }
    return $resultado;
  }

  function mostrar(){
    $this->db->beginTransaction();
    $sentencia = $this->db->prepare( "select * from $this->tabla");
    $sentencia->execute();
    $this->db->commit();
    $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    $sentencia->closeCursor();
    return $resultado;
  }

  function eliminar($id){
    $parametros = array($id);
    if ($this->entradaValida($parametros)) {
      $tupla = $this->mostrarUno($id);
      if(isset($tupla)){
        $this->db->beginTransaction();
        $sentencia = $this->db->prepare( "delete from $this->tabla where id=?");
        $sentencia->execute(array($id));
        $this->db->commit();
        $resultado = $sentencia->rowCount();
        var_dump("elimino: " . $resultado);
        $sentencia->closeCursor();
        var_dump("elimino: " . $resultado);
        if($resultado)
          return $tupla;
        else return false;
      }
      else return false;
    }
    else return false;
  }

  function mostrarUno($id){
    $parametros = array($id);
    if ($this->entradaValida($parametros)) {
      $this->db->beginTransaction();
      $sentencia = $this->db->prepare( "select * from $this->tabla where id=?");
      $sentencia->execute(array($id));
      $this->db->commit();
      $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
      $sentencia->closeCursor();
      return $resultado;
    }
    else return false;
  }

  function mostrarPorCarrera($id_carrera){
    $parametros = array($id_carrera);
    if ($this->entradaValida($parametros)) {
      $this->db->beginTransaction();
      $sentencia = $this->db->prepare( "select * from $this->tabla where id_carrera=?");
      $sentencia->execute(array($id_carrera));
      $this->db->commit();
      $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
      $sentencia->closeCursor();
      return $resultado;
    }
    else return false;
  }

}
