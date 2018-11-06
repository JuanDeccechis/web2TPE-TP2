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
    $this->db->query("CREATE DATABASE IF NOT EXISTS `db_web2_tp1` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
      USE `db_web2_tp1`;");
    
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
  
  CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(50) NOT NULL,
  `pass` varchar(300) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nickname`),
  UNIQUE KEY `nombre_2` (`nickname`),
  UNIQUE KEY `nickname` (`nickname`)
  ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;";

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

  INSERT INTO `usuario` (`id`, `nickname`, `pass`) VALUES
  (1, 'juan', '\$2y\$10\$dC4rtG4juiZKIQ9IYvGpoeeh5x9DPqJ3aW37.tepitqCCRmSqIKn.'),
  (2, 'andres', '\$2y\$10\$sw4HN33NKJ0t67BftE6kVua7xvQFYY8AVLKJPqPv8S7oDVsWXqSQO'),
  (3, 'ultimo', '\$2y\$10\$yc5vEHT/xb0Ssv5NT.38a.kWyC3PK4q1qxwJmFPa1QQib5ZtkQOwu');";

    $this->db->query($sentencias);

    $fk = "ALTER TABLE `catedra`
  ADD CONSTRAINT `catedra_ibfk_1` FOREIGN KEY (`id_carrera`) REFERENCES `carrera` (`id`);
  COMMIT;";

    $this->db->query($fk);

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
    $this->db->beginTransaction();
    $sentencia = $this->db->prepare( "delete from $this->tabla where id=?");
    $sentencia->execute(array($id));
    $this->db->commit();
    $resultado = $sentencia->rowCount();
    $sentencia->closeCursor();
    return $resultado;
  }

  function mostrarUno($id){
    $this->db->beginTransaction();
    $sentencia = $this->db->prepare( "select * from $this->tabla where id=?");
    $sentencia->execute(array($id));
    $this->db->commit();
    $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
    $sentencia->closeCursor();
    return $resultado;
  }

  function mostrarPorCarrera($id_carrera){
    $this->db->beginTransaction();
    $sentencia = $this->db->prepare( "select * from $this->tabla where id_carrera=?");
    $sentencia->execute(array($id_carrera));
    $this->db->commit();
    $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    $sentencia->closeCursor();
    return $resultado;
  }

}
