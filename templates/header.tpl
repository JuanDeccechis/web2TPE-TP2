<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--<base href="//localhost/proyectos/web%202/web2TPE-TP2/"> --> <!-- "$_SERVER['SERVER_NAME']">  -->
    <!-- <base href=" <?php $_SERVER['SERVER_NAME'] . ":". $_SERVER['SERVER_PORT']?> -->
    <!-- <base href="./"> -->
    <!-- <base href= <?php'//'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).'/';>?> -->
    <!-- <base href="{$smarty.server.SERVER_NAME}"> -->
    <!-- <base href="{$basehref}"> -->
    <base href="{$smarty.server.REQUEST_SCHEME}://{$smarty.server.SERVER_NAME}{':'}{$smarty.server.SERVER_PORT}{dirname($smarty.server.PHP_SELF)}/">

    <title>Wiki-Exactas</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/tp.css">
  </head>
  <body>
    <header>
      <div class="container-fluid">
        <div class="row">
          <div class="col-8 offset-lg-0 offset-2"> 
            <h1>Wiki Exactas</h1>
            <h2>{$smarty.server.REQUEST_SCHEME}://{$smarty.server.SERVER_NAME}{':'}{$smarty.server.SERVER_PORT}{dirname($smarty.server.PHP_SELF)}/</h2>
          </div>
          <div class="col-lg-4 offset-lg-0 col-8 offset-2">
            <img src="images/exactas-wikipedia.png" class="logo" alt="Logo de la página">
          </div>
        </div>
      </div>
    </header>
{include file="nav.tpl"}