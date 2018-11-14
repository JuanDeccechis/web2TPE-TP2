<?php
require('libs/Smarty.class.php');

abstract class AbstractView
{

    private $basehref;

    public function __construct(){
        $this->basehref = '//'.$_SERVER['SERVER_NAME']/*. ":". $_SERVER['SERVER_PORT']*/.dirname($_SERVER['PHP_SELF']).'/';     
    }


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
    $smarty->display($template);
  }

 
}

?>
