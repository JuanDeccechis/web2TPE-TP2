<?php
define('HOME', 'Location: //'.$_SERVER['SERVER_NAME'] . ":". $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']));

class ConfigApi
{
    /*tareas/:parametros*/
    public static $RESOURCE = 'resource';
    public static $PARAMS = 'params';
    public static $RESOURCES = [
      'comentario#GET'=> 'ComentariosApiController#Get',
      'comentarioOrdenado#GET'=> 'ComentariosApiController#GetOrdenado',
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
      'comentario#DELETE'=> 'ComentariosApiController#Delete',
      'comentario#POST'=> 'ComentariosApiController#Insert',
      'comentario#PUT'=> 'ComentariosApiController#Update'
    ];

}

 ?>
