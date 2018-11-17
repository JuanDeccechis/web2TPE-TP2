<?php
require_once  "./View/CatedraView.php";
require_once  "./Model/CatedraModel.php";
require_once  "./Model/CarreraModel.php";
require_once  "./Model/ImagenModel.php";
require_once  "AbstractController.php";

class CatedraController extends AbstractController
{
  private $carreraModel;
  private $imagenModel;

  function __construct()
  {
    parent::__construct(new CatedraView(), new CatedraModel(), "Catedras");
    $this->carreraModel = new CarreraModel();
    $this->imagenModel = new ImagenModel();

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
    $imagenes = $this->imagenModel->mostrarPorCatedra($id_catedra);
    $this->view->detalle($carrera, $catedra, $imagenes);
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
        /***  Parte imagenes  ***/
        $last =  $this->model->getLast();
        $lastId = $last["id"];
        if (($afectados)&&(isset($_FILES['imagenes']))) {
          for ($i=0; $i < count($_FILES['imagenes']['name']); $i++) { 
            $ruta = $_FILES['imagenes']['name'][$i];
            /*var_dump("ruta: ". $ruta. " para " . $i);*/
            $rutaTempImagenes = $_FILES['imagenes']['tmp_name'][$i];
            $tamaño = strlen($ruta)-3;
            $ext = substr($ruta, $tamaño);
            if(($ext == "jpg") || ($ext == "png")){
              /*var_dump("dato: ". $lastId . $rutaTempImagenes . $ext. " para " . $i);*/
              $path = $this->imagenModel->subirImagen($lastId, $rutaTempImagenes, $ext);
            }
          }
        }
        if ($afectados) {//debería borrar el header!!!!
          //header(HOME."/mostrarCatedras");
          //die();
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
      var_dump(($_POST["nombreForm"]));
      var_dump(($_POST["nombreCarreraForm"]));
      var_dump(($_POST["linkForm"]));
      if (((isset($_POST["nombreForm"])) && ($_POST["nombreForm"] != null)) && ((isset($_POST["nombreCarreraForm"])) && ($_POST["nombreCarreraForm"] != null)) && ((isset($_POST["linkForm"])) && ($_POST["linkForm"] != null))) {
        $id_catedra = $_POST["idForm"];
        $nombre = $_POST["nombreForm"];
        $link = $_POST["linkForm"];
        // $id_carrera = $_POST["id_carreraForm"];
        $nombre_carrera = $_POST["nombreCarreraForm"];
        $id_carrera = $this->carreraModel->getBy('nombre', $nombre_carrera, 1)['id'];
        $cant_alumnos = 2;
        $afectados = $this->model->guardarEditar($nombre,$link,$cant_alumnos,$id_carrera,$id_catedra);
        /***  Parte imagenes  ***/
        if (($afectados)&&(isset($_FILES['imagenesEditar']))) {
          for ($i=0; $i < count($_FILES['imagenesEditar']['name']); $i++) { 
            $ruta = $_FILES['imagenesEditar']['name'][$i];
            var_dump("ruta: ". $ruta. " para " . $i);
            $rutaTempImagenes = $_FILES['imagenesEditar']['tmp_name'][$i];
            $tamaño = strlen($ruta)-3;
            $ext = substr($ruta, $tamaño);
            if(($ext == "jpg") || ($ext == "png")){
              var_dump("dato: ". $lastId . $rutaTempImagenes . $ext. " para " . $i);
              $path = $this->imagenModel->subirImagen($id_catedra, $rutaTempImagenes, $ext);
            }
          }
        }
        if ($afectados) {
          //header(HOME."/mostrarCatedras");
          //die();
        }else{
          $resul = "";
          $this->view->resultado("editar catedra", $afectados);
        } 
      }
      else{
        //header(HOME."/mostrarCatedras");
        //die();
      }
    }
    else{
      //header(HOME."/login");
      //die();
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

  function eliminarImagen($param){
    if (isset($_SESSION["User"])) {
      $id_imagen = $param[0];
      if (isset($_POST["idCatedra"]) && ($_POST["idCatedra"] != null)) {
        $id_catedra = $_POST["idCatedra"];
        $this->imagenModel->borrarImagen($id_imagen, $id_catedra);
        /*header(HOME."/enDetalle/{$id_catedra}");
        die();*/
      }
    }
    else{
      header(HOME."/login");
      die();
    }
  }
}

 ?>
