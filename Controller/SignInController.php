<?php 
	require_once  "./View/SignInView.php";
	require_once  "././apiUsuarios/model/UsuariosApiModel.php";
	require_once "AbstractController.php";
	require_once "LoginController.php";

	class SignInController extends AbstractController {
		private $LoginController;

		function __construct() {
			parent::__construct(new SignInView(), new UsuariosApiModel(), "Usuario");
		}

		function signIn() {
			$this->view->mostrar('Registrarse', "", 'newUser');
		}

		function agregar() {
			if (((isset($_POST["Usuario"])) && ($_POST["Usuario"] != null)) && ((isset($_POST["Password"])) && ($_POST["Password"] != null))) {
				$nombre = $_POST["Usuario"];
	    		$pass = $_POST["Password"];
	    		
				$dbUser = $this->model->getByNick($nombre); 
				if($dbUser)
					$this->view->mostrar("Registrarse", "ya existe el usuario", 'newUser');
	      		else {
	        		//No existe el usario
	        		$this->model->insert($nombre,$pass);
	        		$this->LoginController = new LoginController();
	        		$this->LoginController->verify();
	        		header(HOME);
	      		}
	      	}
	      	else
	      		$this->view->mostrar('Registrarse', "Debe completar los campos", 'newUser');
		}
	}
?>