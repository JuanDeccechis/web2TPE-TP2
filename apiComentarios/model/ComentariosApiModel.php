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
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`idCatedra`) REFERENCES `web2tp1`.`catedra` (`id`),
  ADD CONSTRAINT `comentario_ibkf_1` FOREIGN KEY (`idUsuario`) REFERENCES `web2usuarios`.`usuario` (`id`); COMMIT;  ";

    $this->db->query($fk);

  }

  function Get($id=null){
    if(isset($id)){
      $sentencia = $this->db->prepare( "select * from comentario where id=?");
      $sentencia->execute(array($id));
      return $sentencia->fetch(PDO::FETCH_ASSOC);
    }
    else{
      $sentencia = $this->db->prepare( "select * from comentario");
      $sentencia->execute();
      $comentarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);
      foreach ($comentarios as $key => $comentario) 
        $comentario[$key]['completada'] = $comentario['completada'] == "1" ? true : false;

      return $comentario;
    }
  }

  function GetOrdenado($campo, $orden){
    if((isset($campo))&&(isset($orden))){
      $sentencia = $this->db->prepare( "select * from comentario order by=(?,?)");
      $sentencia->execute(array($campo, $orden));
      return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }
    else
      return $this->Get();
  }

  function Insertar($titulo,$descripcion,$completada){
    $sentencia = $this->db->prepare("INSERT INTO comentario(titulo, descripcion, completada) VALUES(?,?,?)");
    $sentencia->execute(array($titulo,$descripcion,$completada));
    $lastId =  $this->db->lastInsertId();
    return $this->Get($lastId);
  }

  function Borrar($id){
    $comentario = $this->Get($id);
    if(isset($comentario)){
      $sentencia = $this->db->prepare( "delete from comentario where id=?");
      $sentencia->execute(array($id));
      return $comentario;
    }
  }

  function Completar($id){

    $sentencia = $this->db->prepare( "update comentario set completada=1 where id=?");
    $sentencia->execute(array($id));
  }

  function GuardarEditar($titulo,$descripcion,$completada,$id){
    $sentencia = $this->db->prepare( "update comentario set titulo = ?, descripcion = ?, completada = ? where id=?");
    $sentencia->execute(array($titulo,$descripcion,$completada,$id));
  }
}


 ?>
