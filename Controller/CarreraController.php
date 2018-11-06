<?php
require_once  "./View/CarreraView.php";
require_once  "./Model/CarreraModel.php";
require_once  "AbstractController.php";
class CarreraController extends AbstractController
{
 
  function __construct(){
    parent::__construct(new CarreraView(), new CarreraModel(), "Carreras");
  }

  function home(){
    $carreras = $this->model->mostrar();
    $this->view->mostrar($this->Titulo, "", $carreras);
  }

  function agregar(){
    if (isset($_SESSION["User"])) {
      if (((isset($_POST["nombreForm"])) && ($_POST["nombreForm"] != null)) && ((isset($_POST["descripcionForm"])) && ($_POST["descripcionForm"] != null))) {
        $nombre = $_POST["nombreForm"];
        $descripcion = $_POST["descripcionForm"];
        $this->model->agregar($nombre,$descripcion);
        header(HOME);
      }
      else{
        $carreras = $this->model->mostrar();
        $this->view->mostrar($this->Titulo, "Debe completar los campos", $carreras);
      }
    }
    else
      header(HOME."/login");
  }

  function eliminar($param){
    if (isset($_SESSION["User"])) {
      $afectados = $this->model->eliminar($param[0]);
      if ($afectados)
        header(HOME);
      else
        $this->view->borrarCarreraCompleta("eliminar carrera", $param[0]);
    }
    else
      header(HOME."/login");
  }

  function editar($param){
    if (isset($_SESSION["User"])) {
      $idCarrera = $param[0];
      $carrera = $this->model->mostrarUno($idCarrera);
      $this->view->mostrarOne($this->Titulo, $carrera);
    }
    else
      header(HOME."/login");
  }

  function guardarEditar(){
    if (isset($_SESSION["User"])) {
      if (((isset($_POST["idForm"])) && ($_POST["idForm"] != null)) && ((isset($_POST["nombreForm"])) && ($_POST["nombreForm"] != null)) && ((isset($_POST["descripcionForm"])) && ($_POST["descripcionForm"] != null))) {
        $id_carrera = $_POST["idForm"];
        $nombre = $_POST["nombreForm"];
        $descripcion = $_POST["descripcionForm"];
        $this->model->guardarEditar($nombre,$descripcion,$id_carrera);
        header(HOME);
      }
      else
        header(HOME);
    }
    else
      header(HOME."/login");
  }
}

 ?>
