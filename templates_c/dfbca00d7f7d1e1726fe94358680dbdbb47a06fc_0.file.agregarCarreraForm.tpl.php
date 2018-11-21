<?php
/* Smarty version 3.1.33, created on 2018-11-21 22:30:11
  from 'C:\xampp\htdocs\proyectos\web 2\web2TPE-TP2\templates\agregarCarreraForm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bf5ce635c1d22_78874858',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dfbca00d7f7d1e1726fe94358680dbdbb47a06fc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyectos\\web 2\\web2TPE-TP2\\templates\\agregarCarreraForm.tpl',
      1 => 1542807230,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bf5ce635c1d22_78874858 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8">
        <h2>Formulario</h2>
        <form method="post" action="agregar">
          <div class="form-group">
            <label for="nombreForm">nombre</label>
            <input type="text" class="form-control" id="nombreForm" name="nombreForm" >
          </div>
          <div class="form-group">
            <label for="descripcionForm">Descripcion</label>
            <input type="text" class="form-control" id="descripcionForm" name="descripcionForm" >
          </div>
          <h3><?php echo $_smarty_tpl->tpl_vars['Mensaje']->value;?>
</h3>
          <button type="submit" class="btn btn-primary">Crear Carrera</button>
        </form>
      </div> 
    </div>
  </div>
</div><?php }
}
