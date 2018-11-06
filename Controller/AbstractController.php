<?php 
/**
 * 
 */
require_once  "SecuredController.php";
 class AbstractController extends SecuredController{

	protected $view;
	protected $model;
	protected $Titulo;

	function __construct($view, $model, $Titulo) {
		parent::__construct();
		$this->view = $view;
    	$this->model = $model;
    	$this->Titulo = $Titulo;
	}
}
?>