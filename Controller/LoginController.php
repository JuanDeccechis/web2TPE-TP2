<?php 
require_once  "./View/LoginView.php";
require_once  "./Model/UsuarioModel.php";
require_once  "AbstractController.php";

	class LoginController extends AbstractController {
		
		function __construct() {
			parent::__construct(new LoginView(), new UsuarioModel(), "Login");
		}

		function login() {
			$this->view->mostrar($this->Titulo, "", 'verify');
		}

		function verify(){
			if (((isset($_POST["Usuario"])) && ($_POST["Usuario"] != null)) && ((isset($_POST["Password"])) && ($_POST["Password"] != null))) {
				$user = $_POST["Usuario"];
				$pass = $_POST["Password"];
				$dbUser = $this->model->getUser($user);

				if(isset($dbUser[0])){
					if (password_verify($pass, $dbUser[0]["pass"])){
						session_start();
	              		$_SESSION["User"] = $user;
	              		header(HOME);
	          		}
	          		else 
			            $this->view->mostrar($this->Titulo, "Contraseña incorrecta", 'verify');
	      		}
	      		else //No existe el usario
	        		$this->view->mostrar($this->Titulo, "No existe el usario", 'verify');
	      	}
	      	else
	      		$this->view->mostrar($this->Titulo, "Debe completar los campos", 'verify');
		}

		function logout(){
			session_start();
			session_destroy();
			header(HOME);
  		}
	}
?>