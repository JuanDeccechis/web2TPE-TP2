<?php
require_once  "./View/CatedraView.php";
require_once  "./Model/CatedraModel.php";
require_once  "./Model/CarreraModel.php";
require_once  "AbstractController.php";

class CatedraController extends AbstractController
{
  private $carreraModel;

  function __construct()
  {
    parent::__construct(new CatedraView(), new CatedraModel(), "Catedras");
    $this->carreraModel = new CarreraModel();
  }

  private function listaCarreras() { // retorna todas las carreras con sus catedras
    $carreras = $this->carreraModel->mostrar();
    for ($i=0; $i < count($carreras); $i++) {
      $catedras = $this->model->mostrarPorCarrera($carreras[$i]['id']);
      $carreras[$i]["catedras"] = $catedras;
    }
    return $carreras;
  }

  function mostrar(){
    $this->view->mostrar($this->Titulo, $this->carreraModel->getNombres(), $this->listaCarreras(), 'carreras');
  }

  function mostrarUna($param){
    $id_carrera = $param[0];
    $carrera = $this->carreraModel->mostrarUno($id_carrera);
    $catedras = $this->model->mostrarPorCarrera($id_carrera);
    $carrera["catedras"] = $catedras;
    $lista_carreras [0] = $carrera;
    $this->view->mostrar($this->Titulo, $this->carreraModel->getNombres(), $lista_carreras, 'catedras');
  }

  function mostrarEnDetalle($params) {
      $id_catedra = $params[0];
      $catedra = $this->model->mostrarUno($id_catedra);
      $carrera = $this->carreraModel->mostrarUno($catedra['id_carrera']);
      $this->view->detalle($carrera, $catedra);
  }

  function agregar(){
    if (isset($_SESSION["User"])) {
      if (((isset($_POST["nombreForm"])) && ($_POST["nombreForm"] != null)) && ((isset($_POST["linkForm"])) && ($_POST["linkForm"] != null)) && ((isset($_POST["nombreCarreraForm"])) && ($_POST["nombreCarreraForm"] != null))) {  
        $nombre = $_POST["nombreForm"];
        $link = $_POST["linkForm"];
        $nombre_carrera = $_POST["nombreCarreraForm"];
        $id_carrera = $this->carreraModel->getBy('nombre', $nombre_carrera, 1)['id'];
        $cant_alumnos = 1;
        $afectados = $this->model->agregar($nombre, $link, $cant_alumnos, $id_carrera);
        if ($afectados) {
          header(HOME."/mostrarCatedras");
          die();
        }else{
          $resul = "";
          $this->view->resultado("agregar catedra", $afectados);
        }
      }
      else{
        $catedras = $this->model->mostrar();
        $this->view->mostrar($this->Titulo, $this->carreraModel->getNombres(), $this->listaCarreras(), 'carreras', "Debe completar los campos");
      }

    }
    else
      //$this->view->mostrar($this->Titulo, $this->carreraModel->getNombres(), $this->listaCarreras(), 'carreras');
      header(HOME."/login");
      die();
  }

  function eliminar($param){
    if (isset($_SESSION["User"])) {
      $this->model->eliminar($param[0]);
      header(HOME."/mostrarCatedras");
      die();
    }
    else{
      //$this->view->mostrar($this->Titulo, $this->carreraModel->getNombres(), $this->listaCarreras(), 'carreras');
      header(HOME."/login");
     die();
    }
  }

  function editar($param){
    if (isset($_SESSION["User"])) {
      $idCatedra = $param[0];
      $catedra = $this->model->mostrarUno($idCatedra);
      $lista_carreras = $this->listaCarreras();
      $this->view->mostrarEditarCatedra($this->Titulo, $catedra, $lista_carreras);
    }
    else{
      //$this->view->mostrar($this->Titulo, $this->carreraModel->getNombres(), $this->listaCarreras(), 'carreras');
      header(HOME."/login");
      die();
    }
  }

  function guardarEditar(){
    if (isset($_SESSION["User"])) {
      if (((isset($_POST["idForm"])) && ($_POST["idForm"] != null)) && ((isset($_POST["nombreForm"])) && ($_POST["nombreForm"] != null)) && ((isset($_POST["nombreCarreraForm"])) && ($_POST["nombreCarreraForm"] != null)) && ((isset($_POST["linkForm"])) && ($_POST["linkForm"] != null))) {
        $id_catedra = $_POST["idForm"];
        $nombre = $_POST["nombreForm"];
        $link = $_POST["linkForm"];
        // $id_carrera = $_POST["id_carreraForm"];
        $nombre_carrera = $_POST["nombreCarreraForm"];
        $id_carrera = $this->carreraModel->getBy('nombre', $nombre_carrera, 1)['id'];
        $cant_alumnos = 2;
        $afectados = $this->model->guardarEditar($nombre,$link,$cant_alumnos,$id_carrera,$id_catedra);
        if ($afectados) {
          header(HOME."/mostrarCatedras");
          die();
        }else{
          $resul = "";
          $this->view->resultado("editar catedra", $afectados);
        } 
      }
      else{
        header(HOME."/mostrarCatedras");
        die();
      }
    }
    else{
      header(HOME."/login");
      die();
    }
  }

  function borrarCarreraCompleta($param){
    if (isset($_SESSION["User"])) {
      $id_carrera = $param[0];
      $catedras = $this->model->mostrarPorCarrera($id_carrera);
      for ($i=0; $i < count($catedras); $i++) {
        $this->model->eliminar($catedras[$i]['id']);
      }
      $this->carreraModel->eliminar($id_carrera);
      header(HOME);
      die();
    }
    else{
      //$this->view->mostrar($this->Titulo, $this->carreraModel->getNombres(), $this->listaCarreras(), 'carreras');
      header(HOME."/login");
      die();
    }
  }
}

 ?>
