<?php

require_once "Api.php";
require_once "./model/UsuariosApiModel.php";

class UsuariosApiController extends Api{

  private $model;
  function __construct(){
    parent::__construct();
    $this->model = new UsuariosApiModel();
  }

  function Get($param = null){

    if(isset($param)){
        $id = $param[0];
        $arreglo = $this->model->Get($id);
        $data = $arreglo;
        
    }else{
      $data = $this->model->Get();
    }
      if(isset($data)){
        return $this->json_response($data, 200);
      }else{
        return $this->json_response(null, 404);
      }
  }

  function Delete($param = null){
    if(count($param) == 1){
        $id = $param[0];
        $r =  $this->model->Borrar($id);
        if($r == false){
          return $this->json_response($r, 300);
        }

        return $this->json_response($r, 200);
    }else{
      return  $this->json_response("No task specified", 300);
    }
  }

  function Insert($param = null){

    $objetoJson = $this->getJSONData();
    $r = $this->model->Insertar($objetoJson->Titulo, $objetoJson->Descripcion, $objetoJson->Completada);

    return $this->json_response($r, 200);
  }

  function Update($param = null){
    if(count($param) == 1){
      $id = $param[0];
      $objetoJson = $this->getJSONData();
      $r = $this->model->GuardarEditar($objetoJson->Titulo, $objetoJson->Descripcion, $objetoJson->Completada, $id);
      return $this->json_response($r, 200);

    }else{
      return  $this->json_response("No task specified", 300);
    }

  }
}
 ?>
