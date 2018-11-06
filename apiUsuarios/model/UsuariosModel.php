<?php
/**
 *
 */
class UsuariosModel
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
  }

  function crearDB(){
    $this->db->query("CREATE DATABASE IF NOT EXISTS `web2usuarios` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `web2usuarios`;");
    
    $tabla = "CREATE TABLE `permisosusuario` (
    `id` int(11) NOT NULL,
    `idUsuario` int(11) NOT NULL,
    `alta` tinyint(1) NOT NULL,
    `baja` tinyint(1) NOT NULL,
    `modificacion` tinyint(1) NOT NULL,
    `visualizacion` tinyint(1) NOT NULL,
    `admin` tinyint(1) NOT NULL,
    `altaComentario` tinyint(1) NOT NULL,
    `inmortal` tinyint(1) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

  CREATE TABLE `usuario` (
    `id` int(11) NOT NULL,
    `nickname` varchar(50) NOT NULL,
    `pass` varchar(300) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

    $this->db->query($tabla);
   
   $sentencias = "INSERT INTO `usuario` (`id`, `nickname`, `pass`) VALUES
  (1, 'juan', '$2y$10$dC4rtG4juiZKIQ9IYvGpoeeh5x9DPqJ3aW37.tepitqCCRmSqIKn.'),
  (2, 'andres', '$2y$10$sw4HN33NKJ0t67BftE6kVua7xvQFYY8AVLKJPqPv8S7oDVsWXqSQO'),
  (3, 'ultimo', '$2y$10$yc5vEHT/xb0Ssv5NT.38a.kWyC3PK4q1qxwJmFPa1QQib5ZtkQOwu'),
  (4, 'ljr', '$2y$10$uiXhLZrMPEr9HHV6DdYlt.oJzWqS8hYyuIOYbAnvzuCS2yAPY1j7O');";

    $this->db->query($sentencias);
    
    $fk = "ALTER TABLE `permisosusuario`
  ADD PRIMARY KEY (`id`,`idUsuario`),
  ADD KEY `permisosusuario_ibfk_1` (`idUsuario`);

  ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nickname`),
  ADD UNIQUE KEY `nombre_2` (`nickname`),
  ADD UNIQUE KEY `nickname` (`nickname`);

  ALTER TABLE `permisosusuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

  ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

  ALTER TABLE `permisosusuario`
  ADD CONSTRAINT `permisosusuario_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`); COMMIT;  ";

    $this->db->query($fk);

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

/*************REVISAR**********/
  function Insertar($titulo,$descripcion,$completada){
    $sentencia = $this->db->prepare("INSERT INTO usuario(titulo, descripcion, completada) VALUES(?,?,?)");
    $sentencia->execute(array($titulo,$descripcion,$completada));
    $lastId =  $this->db->lastInsertId();
    return $this->Get($lastId);
  }

  function Borrar($id){
    $usuario = $this->Get($id);
    if(isset($usuario)){
      $sentencia = $this->db->prepare( "delete from usuario where id=?");
      $sentencia->execute(array($id));
      return $usuario;
    }
  }
/*
  function Completar($id){

    $sentencia = $this->db->prepare( "update usuario set completada=1 where id=?");
    $sentencia->execute(array($id));
  }*/

/*************REVISAR**********/
  function GuardarEditar($titulo,$descripcion,$completada,$id){
    $sentencia = $this->db->prepare( "update usuario set titulo = ?, descripcion = ?, completada = ? where id=?");
    $sentencia->execute(array($titulo,$descripcion,$completada,$id));
  }
}


 ?>
