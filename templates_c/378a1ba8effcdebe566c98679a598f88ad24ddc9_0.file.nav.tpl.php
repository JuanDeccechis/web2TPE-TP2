<?php
/* Smarty version 3.1.33, created on 2018-11-21 22:23:51
  from 'C:\xampp\htdocs\proyectos\web 2\web2TPE-TP2\templates\nav.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bf5cce77c3197_87789698',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '378a1ba8effcdebe566c98679a598f88ad24ddc9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyectos\\web 2\\web2TPE-TP2\\templates\\nav.tpl',
      1 => 1542807230,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bf5cce77c3197_87789698 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- bootstrap nav (botonera) -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarToggler">
              <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                  <a class="js-home nav-link" href=""> Home <span class="sr-only">(current)</span> </a>
                </li>                
                <li class="nav-item">
                  <a class="nav-link" href="mostrarCatedras"> Cátedras <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <?php if ($_smarty_tpl->tpl_vars['sesion_activa']->value) {?>
                  <a class="nav-link" href="logout"> Logout <span class="sr-only">(current)</span></a>
                  <?php } else { ?>
                  <a class="nav-link" href="login"> Login <span class="sr-only">(current)</span></a>
                  <?php }?>
                </li>
                <?php if (!$_smarty_tpl->tpl_vars['sesion_activa']->value) {?>
                <li class="nav-item">
                  <a class="nav-link" href="signIn"> Registrarse <span class="sr-only">(current)</span></a>
                </li>
                <?php }?>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
<?php }
}
