<?php 
require_once  "./View/LoginView.php";
require_once  "././apiUsuarios/model/UsuariosApiModel.php";
/*require_once "./Model/UsuarioModel.php";*/
require_once  "AbstractController.php";

	class LoginController extends AbstractController {
		function __construct() {
			parent::__construct(new LoginView(), new UsuariosApiModel(), "Login");
		}

		function login() {
			$this->view->mostrar($this->Titulo, "", 'verify');
		}

		function verify(){
			if (((isset($_POST["Usuario"])) && ($_POST["Usuario"] != null)) && ((isset($_POST["Password"])) && ($_POST["Password"] != null))) {
				$user = $_POST["Usuario"];
				$pass = $_POST["Password"];
				$dbUser = $this->model->getByNick($user);

				if($dbUser){
					if (password_verify($pass, $dbUser["pass"])){
						session_start();
						echo( "mi login tipo: " . $dbUser["tipo"]);
	              		$_SESSION["User"] = $dbUser["tipo"]; //user = tipo de usuario
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