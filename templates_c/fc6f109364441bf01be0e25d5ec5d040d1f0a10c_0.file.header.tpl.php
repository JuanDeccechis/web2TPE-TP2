<?php
/* Smarty version 3.1.33, created on 2018-11-21 22:23:51
  from 'C:\xampp\htdocs\proyectos\web 2\web2TPE-TP2\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bf5cce76a78f5_49265940',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fc6f109364441bf01be0e25d5ec5d040d1f0a10c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyectos\\web 2\\web2TPE-TP2\\templates\\header.tpl',
      1 => 1542807230,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:nav.tpl' => 1,
  ),
),false)) {
function content_5bf5cce76a78f5_49265940 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--<base href="//localhost/proyectos/web%202/web2TPE-TP2/"> --> <!-- "$_SERVER['SERVER_NAME']">  -->
    <!-- <base href=" <?php echo '<?php ';?>$_SERVER['SERVER_NAME'] . ":". $_SERVER['SERVER_PORT']<?php echo '?>';?> -->
    <!-- <base href="./"> -->
    <!-- <base href= <?php echo '<?php'; ?>
'//'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).'/';><?php echo '?>';?> -->
    <!-- <base href="<?php echo $_SERVER['SERVER_NAME'];?>
"> -->
    <!-- <base href="<?php echo $_smarty_tpl->tpl_vars['basehref']->value;?>
"> -->
    <base href="<?php echo $_SERVER['REQUEST_SCHEME'];?>
://<?php echo $_SERVER['SERVER_NAME'];
echo ':';
echo $_SERVER['SERVER_PORT'];
echo dirname($_SERVER['PHP_SELF']);?>
/">

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
            <h2><?php echo $_SERVER['REQUEST_SCHEME'];?>
://<?php echo $_SERVER['SERVER_NAME'];
echo ':';
echo $_SERVER['SERVER_PORT'];
echo dirname($_SERVER['PHP_SELF']);?>
/</h2>
          </div>
          <div class="col-lg-4 offset-lg-0 col-8 offset-2">
            <img src="images/exactas-wikipedia.png" class="logo" alt="Logo de la página">
          </div>
        </div>
      </div>
    </header>
<?php $_smarty_tpl->_subTemplateRender("file:nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
