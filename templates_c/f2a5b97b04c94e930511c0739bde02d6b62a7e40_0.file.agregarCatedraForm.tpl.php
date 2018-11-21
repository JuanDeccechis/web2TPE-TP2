<?php
/* Smarty version 3.1.33, created on 2018-11-21 23:36:24
  from 'C:\xampp\htdocs\proyectos\web 2\web2TPE-TP2\templates\agregarCatedraForm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bf5dde8d9d869_04469109',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f2a5b97b04c94e930511c0739bde02d6b62a7e40' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyectos\\web 2\\web2TPE-TP2\\templates\\agregarCatedraForm.tpl',
      1 => 1542807230,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bf5dde8d9d869_04469109 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8">
        <h2>Formulario</h2>
        <form method="post" action="agregarCatedra" enctype="multipart/form-data">
          <div class="form-group">
            <label for="nombreForm">nombre</label>
            <input type="text" class="form-control" id="nombreForm" name="nombreForm" >
          </div>
          <div class="form-group">
            <label for="linkForm">link</label>
            <input type="text" class="form-control" id="linkForm" name="linkForm" >
          </div>

          <div class="container-fluid">
            <div class="row">
              <div class="col-4">
                <div class="form-group">
                  <label for="nombreCarreraForm">nombre carrera</label>
                  <select class="form-control" id="nombreCarreraForm" name="nombreCarreraForm">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Elementos']->value, 'carrera');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['carrera']->value) {
?>
                      <option><?php echo $_smarty_tpl->tpl_vars['carrera']->value['nombre'];?>
</option>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file" id="imagenes" name="imagenes[]" multiple>
              </div>
              <h3><?php echo $_smarty_tpl->tpl_vars['Mensaje']->value;?>
</h3>
              <div class="col-4">
                <button type="submit" class="btn btn-primary">Crear Catedra</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div><?php }
}
