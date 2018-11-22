<?php

require_once "Api.php";
require_once "./model/ComentariosApiModel.php";

class ComentariosApiController extends Api{

  private $model;
  function __construct(){
    parent::__construct();
    $this->model = new ComentariosApiModel();
  }

  private function entradaValida($parametros){
    $resultado = true;
    if (count($parametros) == 0) 
      $resultado = false;
    for ($i=0; $i < count($parametros); $i++) { 
      if(!((isset($parametros[$i])) && ($parametros[$i] != null)))
        $resultado = false;
    }
    return $resultado;
  }

  function get($param = null){
    $parametros = array($param);
    if($this->entradaValida($parametros)){
      $id = $parametros[0];
      $arreglo = $this->model->get($id);
      $data = $arreglo;      
    }else
      $data = $this->model->get();
    if(isset($data))
      return $this->json_response($data, 200);
    else
      return $this->json_response(null, 404);
      
  }

  function getOrdenado($param){
    if(count($param) == 2)
      if($this->entradaValida($param))
        $data = $this->model->getOrdenado($param[0], $param[1]);
    if(isset($data))
      return $this->json_response($data, 200);
    else
      return $this->json_response("get comentarios ordenados. No task specified", 300);
  }

  function delete($param = null){
    var_dump("estoy borrando");
    if(count($param) == 1){
      if($this->entradaValida($param)){
        $id = $param[0];
        $r =  $this->model->delete($id);
        if($r == false)
          return $this->json_response("delete comentarios. No task specified", 300);
        return $this->json_response($r, 200);
      }else
        return  $this->json_response("delete comentarios. No task specified", 300);
    }else
      return  $this->json_response("delete comentarios. No task specified", 300);
  }

  function insert($param = null){
    if(count($param) == 1){
      if($this->entradaValida($param)){
        $objetoJson = $this->getJSONData();
        var_dump($objetoJson);
        if(isset($objetoJson)){
          $r = $this->model->insert($objetoJson->idUsuario, $objetoJson->idCatedra, $objetoJson->textoComentario, $objetoJson->puntaje);
          if($r === false)
            return $this->json_response("insert comentarios. Fallo al insertar", 300);
        return $this->json_response($r, 200);
        }
        else return  $this->json_response("insert comentarios. JSONData no valido", 300);
      }else
        return  $this->json_response("insert comentarios. Parametros mal incluidos", 300);
    }else
      return  $this->json_response("insert comentarios. Cantidad de parametros incorrecta", 300);
  }

  function update($param = null){
    if(count($param) == 1){
      if($this->entradaValida($param)){
        $id = $param[0];
        $objetoJson = $this->getJSONData();
        $r = $this->model->update($objetoJson->idUsuario, $objetoJson->idCatedra, $objetoJson->textoComentario, $objetoJson->puntaje, $id);
        if($r == false)
          return $this->json_response("update comentarios. No task specified", 300);
        return $this->json_response($r, 200);
      }else
        return  $this->json_response("update comentarios. No task specified", 300);
    }else
      return  $this->json_response("update comentarios. No task specified", 300);
  }
}
 ?>
