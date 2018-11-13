<?php
/**
 *
 */
require_once "AbstractModel.php";

class ImagenModel extends AbstractModel
{
    
  function __construct()
  {
    parent::__construct();
    parent::setVar("imagen");
  }

  function subirImagen($idCatedra, $tempPath, $ext){
    $destino_final = 'images/' . uniqid() . '.' . $ext;
    var_dump("destino_final: ".$destino_final);
    move_uploaded_file($tempPath, $destino_final);
    $this->db->beginTransaction();
    $sentencia = $this->db->prepare( "INSERT INTO imagen(idCatedra, direccion) VALUES (?,?)");
    $sentencia->execute(array($idCatedra, $destino_final));
    $this->db->commit();
    $sentencia->closeCursor();
    return $destino_final;
  }

  function borrarImagen($id, $idCatedra, $direccion){
    unlink($direccion);
    $this->db->beginTransaction();
    $sentencia = $this->db->prepare( "DELETE FROM imagen WHERE id=? AND idCatedra=?");
    $sentencia->execute(array($id, $idCatedra));
    $this->db->commit();
    $sentencia->closeCursor();
      
  }

}
