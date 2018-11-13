<?php 
	

	class UsuarioModel extends AbstractModel {
		
		function getUser($user){
			$sentencia = $this->db->prepare("select * from usuario where nickname=?");
			$sentencia->execute(array($user));
			return $sentencia->fetchAll(PDO::FETCH_ASSOC);
	 	}

	 	function agregar($nombre, $pass){
	 		$hash = password_hash($pass, PASSWORD_DEFAULT);
	    	$sentencia = $this->db->prepare("INSERT INTO usuario(nickname, pass) VALUES(?,?)");
	   		$sentencia->execute(array($nombre, $hash));
	  	}

	  	function eliminar($id){
		    $this->db->beginTransaction();
		    $sentencia = $this->db->prepare( "delete from usuario where id=?");
		    $sentencia->execute(array($id));
		    $this->db->commit();
		    $resultado = $sentencia->rowCount();
		    $sentencia->closeCursor();
		    return $resultado;
		}
	}
?>