<?php
define('HOME', 'Location: //'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']));

class ConfigApi
{
    public static $RESOURCE = 'resource';
    public static $PARAMS = 'params';
    public static $RESOURCES = [
      'tarea#GET'=> 'TareasApiController#GetTareas',
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
      'tarea#DELETE'=> 'TareasApiController#DeleteTarea',
      'tarea#POST'=> 'TareasApiController#InsertTarea',
      'tarea#PUT'=> 'TareasApiController#UpdateTarea'
    ];

}

 ?>
