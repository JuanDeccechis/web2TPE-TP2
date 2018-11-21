<?php
/* Smarty version 3.1.33, created on 2018-11-21 22:37:14
  from 'C:\xampp\htdocs\proyectos\web 2\web2TPE-TP2\templates\mostrarCatedras.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bf5d00a4edab4_91365629',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2bc787d53ff613b11848c786beca4782dbbfe6e1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyectos\\web 2\\web2TPE-TP2\\templates\\mostrarCatedras.tpl',
      1 => 1542807230,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:agregarCatedraForm.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5bf5d00a4edab4_91365629 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-8">
                <h2><?php echo $_smarty_tpl->tpl_vars['Titulo']->value;?>
</h2>
            </div>
            <div class="col-4">
                <div class="dropdown">
                  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Buscar por carrera
                  <span class="caret"></span></button>
                  <ul class="dropdown-menu">
                      <li><a href="mostrarCatedras">Todas</a></li>
                      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['carreras']->value, 'carrera');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['carrera']->value) {
?>
                      <li><a href="mostrarUna/<?php echo $_smarty_tpl->tpl_vars['carrera']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['carrera']->value['nombre'];?>
</a></li>
                      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  </ul>
                </div>
            </div>
        </div>
    </div>
  <table class="table">
    <thead>
      <th>Id</th>
      <th>Nombre</th>
      <th>VER</th>
      <?php if ($_smarty_tpl->tpl_vars['sesion_activa']->value) {?>
        <th>ELIMINAR</th>
        <th>EDITAR</th>
      <?php }?>
    </thead>
    <tbody>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Elementos']->value, 'carrera');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['carrera']->value) {
?>

        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['carrera']->value['catedras'], 'catedra');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['catedra']->value) {
?>
          <tr class="filaCatedra">
            <td> CATEDRA - <?php echo $_smarty_tpl->tpl_vars['catedra']->value['id'];?>
 </td>
            <td> <?php echo $_smarty_tpl->tpl_vars['catedra']->value['nombre'];?>
 </td>
            <td> <a href="enDetalle/<?php echo $_smarty_tpl->tpl_vars['catedra']->value['id'];?>
"> Ver en detalle </a> </td>
            <?php if ($_smarty_tpl->tpl_vars['sesion_activa']->value) {?>
              <td> <a href="eliminarCatedra/<?php echo $_smarty_tpl->tpl_vars['catedra']->value['id'];?>
">ELIMINAR</a> </td>
              <td> <a href="editarCatedra/<?php echo $_smarty_tpl->tpl_vars['catedra']->value['id'];?>
">EDITAR</a></td>
            <?php }?>
          </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
  </table>



</div>

  <?php if ($_smarty_tpl->tpl_vars['sesion_activa']->value) {?>
    <?php $_smarty_tpl->_subTemplateRender("file:agregarCatedraForm.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  <?php }?>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
