<?php 
	

	class PermisosUsuarioModel extends AbstractModel {
		
		function getPermisos($user){
			$sentencia = $this->db->prepare("select * from permisosusuario where idUsuario=?");
			$sentencia->execute(array($user));
			return $sentencia->fetchAll(PDO::FETCH_ASSOC);
	 	}

	 	function agregar($idUsuario, $alta, $baja, $modificacion, $visualizacion, $admin, $altaComentario, $inmortal){
	 		$this->db->beginTransaction();
	    	$sentencia = $this->db->prepare("INSERT INTO permisosusuario(idUsuario, alta, baja, modificacion, visualizacion, admin, altaComentario, inmortal) VALUES(?,?, ?, ?, ?, ?, ?, ?)");
	   		$sentencia->execute(array($idUsuario, $alta, $baja, $modificacion, $visualizacion, $admin, $altaComentario, $inmortal));
    		$this->db->commit();
    		$sentencia->closeCursor();
	  	}


	 	function guardarEditar($idUsuario, $alta, $baja, $modificacion, $visualizacion, $admin, $altaComentario, $inmortal, $id){
	 		$this->db->beginTransaction();
	    	$sentencia = $this->db->prepare("update permisosusuario set alta = ?, baja = ?, modificacion = ?, visualizacion = ?, admin = ?, altaComentario = ?, inmortal = ? where id = ? and idUsuario = ?");
	   		$sentencia->execute(array($alta, $baja, $modificacion, $visualizacion, $admin, $altaComentario, $inmortal, $id, $idUsuario));
    		$this->db->commit();
    		$resul = $sentencia->rowCount();
    		$sentencia->closeCursor();
    		return $resul;
	  	}
	
	}
?>