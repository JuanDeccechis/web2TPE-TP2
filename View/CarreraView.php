<?php
require_once "AbstractView.php";

class CarreraView extends AbstractView
{

  function mostrar($Titulo, $mensaje, $carreras){
/*    if(isset($_SESSION["User"]))
      $this->show($Titulo, 'carrera', $carreras, 'templates/home_admin.tpl');
    else*/
      $this->show($Titulo, 'carrera', $carreras, 'templates/home.tpl', $mensaje);
  }

  function mostrarOne($Titulo, $carrera){
    $this->show($Titulo, 'carrera', $carrera, 'templates/mostrarEditarCarrera.tpl');
  }

  function resultado($Titulo, $afectados){
    $this->show($Titulo, 'carrera', $afectados, 'templates/afectados.tpl');
  }

  function borrarCarreraCompleta(/*$metodo,*/$Titulo, $afectados){
    $this->show($Titulo, 'carrera', $afectados, 'templates/borrarCarreraCompleta.tpl');
  }
  

}

 ?>
