<?php

require_once "Api.php";
require_once "./model/ComentariosApiModel.php";

class ComentariosApiController extends Api{

  private $model;
  function __construct(){
    parent::__construct();
    $this->model = new ComentariosApiModel();
  }

  function get($param = null){

    if(isset($param)){
        $id = $param[0];
        $arreglo = $this->model->get($id);
        $data = $arreglo;
        
    }else{
      $data = $this->model->get();
    }
      if(isset($data)){
        return $this->json_response($data, 200);
      }else{
        return $this->json_response(null, 404);
      }
  }

  function getOrdenado($param){
    if(isset($param)){
      return $this->model->getOrdenado($param[0], $param[1]);
    }
    else
      return $this->Get();
  }

  function delete($param = null){
    if(count($param) == 1){
        $id = $param[0];
        $r =  $this->model->delete($id);
        if($r == false){
          return $this->json_response($r, 300);
        }

        return $this->json_response($r, 200);
    }else{
      return  $this->json_response("No task specified", 300);
    }
  }

  function insert($param = null){

    $objetoJson = $this->getJSONData();
    $r = $this->model->insert($objetoJson->idUsuario, $objetoJson->idCatedra, $objetoJson->textoComentario, $objetoJson->puntaje);

    return $this->json_response($r, 200);
  }

  function update($param = null){
    if(count($param) == 1){
      $id = $param[0];
      $objetoJson = $this->getJSONData();
      $r = $this->model->update($objetoJson->idUsuario, $objetoJson->idCatedra, $objetoJson->textoComentario, $objetoJson->puntaje, $id);
      return $this->json_response($r, 200);

    }else{
      return  $this->json_response("No task specified", 300);
    }

  }
}
 ?>
