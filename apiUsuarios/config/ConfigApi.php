<?php
define('HOME', 'Location: //'.$_SERVER['SERVER_NAME'] . ":". $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']));

class ConfigApi
{
    public static $RESOURCE = 'resource';
    public static $PARAMS = 'params';
    public static $RESOURCES = [
      'usuario#GET'=> 'UsuariosApiController#Get',
      /*''=> 'TareasController#Home',
      'home'=> 'TareasController#Home',
      'javito'=> 'TareasController#Home',
      'borrar'=> 'TareasController#BorrarTarea',
      'completada'=> 'TareasController#CompletarTarea',
      'editar'=> 'TareasController#EditarTarea',
      'guardarEditar'=> 'TareasController#GuardarEditarTarea',
      'mostrarUsuarios'=> 'UsuarioController#MostrarUsuario',
      'login'=> 'LoginController#login',
      'logout'=> 'LoginController#logout',
      'verificarLogin' => 'LoginController#verificarLogin'*/
      'usuario#DELETE'=> 'UsuariosApiController#Delete',
      'usuario#POST'=> 'UsuariosApiController#Insert',
      'usuario#PUT'=> 'UsuariosApiController#Update'
    ];

}

 ?>
