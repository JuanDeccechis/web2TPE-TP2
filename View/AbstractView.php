<?php
require('libs/Smarty.class.php');

abstract class AbstractView
{

  function show($Titulo, $table, $elementos, $template, $mensaje=''){
    $smarty = new Smarty();
    $smarty->assign('Titulo',$Titulo);
    /*$smarty->assign("basehref", $this->basehref);*/
    $smarty->assign('Table',$table);
    $smarty->assign('Mensaje',$mensaje);
    $smarty->assign('Elementos',$elementos);
    if($table == 'carrera')
    	$smarty->assign('home','');
    else
    	$smarty->assign('home','mostrarCatedras');
    $smarty->assign('sesion_activa', isset($_SESSION["User"]));
    if (isset($_SESSION["User"]))
        $smarty->assign('tipoUsuario', $_SESSION["User"]);
    else
        $smarty->assign('tipoUsuario', "no logeado");
    $smarty->display($template);
  }

/**************     cambiar     *******************/
  function showCatedras($Titulo, $table, $elementos, $template, $carreras, $mensaje=''){
    $smarty = new Smarty();
    $smarty->assign('Titulo',$Titulo);
    /*$smarty->assign("basehref", $this->basehref);*/
    $smarty->assign('Table',$table);
    $smarty->assign('Mensaje',$mensaje);
    $smarty->assign('Elementos',$elementos);
    if($table == 'carrera')
        $smarty->assign('home','');
    else
        $smarty->assign('home','mostrarCatedras');
    $smarty->assign('sesion_activa', isset($_SESSION["User"]));
    $smarty->assign('carreras', $carreras);
    if (isset($_SESSION["User"]))
        $smarty->assign('tipoUsuario', $_SESSION["User"]);
    else
        $smarty->assign('tipoUsuario', "no logeado");
    $smarty->display($template);
  }


  function showDetalleCatedra($Titulo, $table, $elementos, $template, $carreras, $imagenes=''){
    $smarty = new Smarty();
    $smarty->assign('Titulo',$Titulo);
    /*$smarty->assign("basehref", $this->basehref);*/
    $smarty->assign('Table',$table);
    $smarty->assign('Elementos',$elementos);
    if($table == 'carrera')
        $smarty->assign('home','');
    else
        $smarty->assign('home','mostrarCatedras');
    $smarty->assign('sesion_activa', isset($_SESSION["User"]));
    $smarty->assign('carreras', $carreras);
    $smarty->assign('imagenes', $imagenes);
    if (isset($_SESSION["User"]))
        $smarty->assign('tipoUsuario', $_SESSION["User"]);
    else
        $smarty->assign('tipoUsuario', "no logeado");
    $smarty->display($template);
  }

 
}

?>
