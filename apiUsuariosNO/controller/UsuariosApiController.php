<?php

require_once "Api.php";
require_once "./model/UsuariosApiModel.php";
require_once "./model/PermisosApiModel.php";

class UsuariosApiController extends Api{

  private $model;
  private $permisosModel;
  function __construct(){
    parent::__construct();
    $this->model = new UsuariosApiModel();
    $this->permisosModel = new PermisosApiModel();

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
    if($this->entradaValida($param)){
      $id = $param[0];
      $arreglo = $this->model->get($id);
      $data = $arreglo;  
    }else
      $data = $this->model->get();
    if(isset($data))
      return $this->json_response($data, 200);
    else
      return $this->json_response(null, 404);
  }

  function delete($param = null){
    if(count($param) == 1){
      if($this->entradaValida($param)){
        $id = $param[0];
        $r =  $this->model->delete($id);
        if($r == false)
          return $this->json_response("delete usuarios. No task specified", 300);
        return $this->json_response($r, 200);
      }else
        return  $this->json_response("delete usuarios. No task specified", 300);
    }else
      return  $this->json_response("delete usuarios. No task specified", 300);
  }

  function insert($param = null){
    if(count($param) == 1){
      if($this->entradaValida($param)){
        $objetoJson = $this->getJSONData();
        $r = $this->model->insert($objetoJson->nickname, $objetoJson->pass);
        if($r === false)
          return $this->json_response("insert usuarios. No task specified", 300);
        else{
          $this->permisosModel->insert($r["id"], 0, 0, 0, 1, 0, 1, 0);
          return $this->json_response($r, 200);
        }
      }else
        return  $this->json_response("insert usuarios. No task specified", 300);
    }else
      return  $this->json_response("insert usuarios. No task specified", 300);
  }

  function update($param = null){
    if(count($param) == 1){
      if($this->entradaValida($param)){
      $id = $param[0];
      $objetoJson = $this->getJSONData();
      $r = $this->model->update($objetoJson->nickname, $objetoJson->pass, $id);
      if($r == false)
          return $this->json_response("update usuarios. No task specified", 300);
        return $this->json_response($r, 200);
      }else
        return  $this->json_response("update usuarios. No task specified", 300);
    }else
      return  $this->json_response("update usuarios. No task specified", 300);

  }
}
 ?>
