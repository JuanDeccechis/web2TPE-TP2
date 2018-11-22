<?php

  class SecuredController {
    protected $logeado;

    function __construct() {
      session_start();
      $logeado = true;
      if(isset($_SESSION["User"])){
        if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 60)) {
          $this->logout(); // destruye la sesión, y vuelve al login
          $logeado = false;
        }
          $_SESSION['LAST_ACTIVITY'] = time(); // actualiza el último instante de actividad
      }
    }

    function logout(){
      session_start();
      session_destroy();
      header(HOME."/login");
    }
  }
?>
