<?php 
	/**
	 * 
	 */
	class LoginView extends AbstractView {
		private $Smarty;

		function __construct() {
			$this->Smarty = new Smarty();
		}

		function mostrar($Titulo, $mensaje, $Accion){
    		$this->Smarty->assign('Titulo',"Login");
    		$this->Smarty->assign('Mensaje', $mensaje);
    		$this->Smarty->assign('Accion',$Accion); // Accion = Login
    		$this->Smarty->assign('Boton',"Iniciar Sesion"); 
    		$this->Smarty->assign('sesion_activa', isset($_SESSION["User"]));
    		$this->Smarty->display('templates/userForm.tpl');
  		}
	}
?>