<?php 
/**
 * 
 */
require_once  "SecuredController.php";
require_once "././apiUsuarios/model/UsuariosApiModel.php";
 class AbstractController extends SecuredController{

	protected $view;
	protected $model;
	protected $Titulo;

	function __construct($view, $model, $Titulo) {
		parent::__construct();
		$this->view = $view;
    	$this->model = $model;
    	$this->Titulo = $Titulo;
    	/*if (isset($_SESSION["User"])) {
    		$this->initUsuario();
    		var_dump("construct permisos: " . $this->permisos["baja"]);
    	}*/
	}

}
?>