<?php 
	/**
	 * 
	 */
	class SignInView extends AbstractView {
		
		private $Smarty;

		function __construct() {
			$this->Smarty = new Smarty();
		}
		function mostrar($Titulo, $mensaje, $Accion){
    		$this->Smarty->assign('Titulo',$Titulo);
    		$this->Smarty->assign('Mensaje', $mensaje);
		    $this->Smarty->assign('Accion',$Accion);
		    $this->Smarty->assign('Boton',"Registrarse"); 
		    $this->Smarty->assign('sesion_activa', isset($_SESSION["User"]));
		    $this->Smarty->display('templates/userForm.tpl');
		}
	}

 ?>