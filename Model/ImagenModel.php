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
    $parametros = array($idCatedra, $tempPath, $ext);
    if ($this->entradaValida($parametros)) {
      $destino_final = 'images/' . uniqid() . '.' . $ext;
      var_dump("destino_final: ".$destino_final);
      move_uploaded_file($tempPath, $destino_final);
      $this->db->beginTransaction();
      $sentencia = $this->db->prepare( "INSERT INTO imagen(idCatedra, direccion) VALUES (?,?)");
      $sentencia->execute(array($idCatedra, $destino_final));
      $this->db->commit();
      $resul = $sentencia->rowCount();
      $sentencia->closeCursor();
      if($resul)
        return $destino_final;
      else
        return false;
    }
    else return false;
  }

  function borrarImagen($id, $idCatedra){
    $parametros = array($id, $idCatedra);
    if ($this->entradaValida($parametros)) {
      $this->db->beginTransaction();
      $sentencia = $this->db->prepare( "SELECT * FROM imagen WHERE id=? AND idCatedra=?");
      $sentencia->execute(array($id, $idCatedra));
      $this->db->commit();
      $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
      var_dump($resultado);
      $sentencia->closeCursor();
      if($resultado){
        $direccion = $resultado["direccion"];
        var_dump($direccion);
        unlink($direccion);
        $this->db->beginTransaction();
        $sentencia = $this->db->prepare( "DELETE FROM imagen WHERE id=? AND idCatedra=?");
        $sentencia->execute(array($id, $idCatedra));
        $this->db->commit();
        $resul = $sentencia->rowCount();
        $sentencia->closeCursor();
        if($resul)
          return $destino_final;
        else
          return false; //no se eliminó la imagen de la tabla
      }
      else return false; //no existe la imagen
    }
    else return false; //la entrada no es válida
  }

  function mostrarPorCatedra($id_catedra){
    $parametros = array($id_catedra);
    if ($this->entradaValida($parametros)) {
      $this->db->beginTransaction();
      $sentencia = $this->db->prepare( "SELECT * FROM imagen WHERE idCatedra=?");
      $sentencia->execute(array($id_catedra));
      $this->db->commit();
      $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
      $sentencia->closeCursor();
      return $resultado;
    }
    else return false;
  }

}
