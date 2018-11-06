<?php
require_once "AbstractView.php";

class CatedraView extends AbstractView
{

  function mostrar($Titulo, $carreras, $catedras, $lista_de, $mensaje=''){
    $this->showCatedras($Titulo, 'catedra', $catedras, 'templates/mostrarCatedras.tpl', $carreras); 
  }

  function mostrarEditarCatedra($Titulo, $catedra, $elementos){
    $this->showCatedras($Titulo, 'catedra', $catedra, 'templates/mostrarEditarCatedra.tpl', $elementos);
  }

  function resultado($metodo, $afectados){
    $this->show($metodo, 'catedra', $afectados, 'templates/afectados.tpl');
  }

  function detalle($carrera, $catedra) {
        $this->showCatedras('Información detallada de catedra', 'catedra', $catedra, 'templates/catedraDetalle.tpl', $carrera);
  }
}


 ?>
