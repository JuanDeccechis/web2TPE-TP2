<?php
/* Smarty version 3.1.33, created on 2018-11-21 22:23:51
  from 'C:\xampp\htdocs\proyectos\web 2\web2TPE-TP2\templates\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bf5cce72a1c83_86536348',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dbeb1151677e5ddc859c7a34c188ff26ac9f758a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyectos\\web 2\\web2TPE-TP2\\templates\\home.tpl',
      1 => 1542821812,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:agregarCarreraForm.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5bf5cce72a1c83_86536348 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container">
  <h2><?php echo $_smarty_tpl->tpl_vars['Titulo']->value;?>
</h2>
  <table class="table">
    <thead>
      <th>Id</th>
      <th>Nombre</th>
      <th>Descripción</th>
      <th>VER catedras</th>
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
        <tr class="filaCarrera">
          <td> CARRERA - <?php echo $_smarty_tpl->tpl_vars['carrera']->value['id'];?>
 </td>
          <td> <?php echo $_smarty_tpl->tpl_vars['carrera']->value['nombre'];?>
 </td>
          <td> <?php echo $_smarty_tpl->tpl_vars['carrera']->value['descripcion'];?>
 </td>
          <td> <a href="mostrarUna/<?php echo $_smarty_tpl->tpl_vars['carrera']->value['id'];?>
"> Ver catedras </a> </td>
          <?php if ($_smarty_tpl->tpl_vars['sesion_activa']->value) {?>
            <td> <a href="eliminar/<?php echo $_smarty_tpl->tpl_vars['carrera']->value['id'];?>
">ELIMINAR</a>  </td>
            <td> <a href="editar/<?php echo $_smarty_tpl->tpl_vars['carrera']->value['id'];?>
">EDITAR</a> </td>
          <?php }?>
        </tr>      
      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
  </table>

</div>

  <?php if ($_smarty_tpl->tpl_vars['sesion_activa']->value) {?>
    <?php $_smarty_tpl->_subTemplateRender("file:agregarCarreraForm.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  <?php }?>

<div id="permisos-container">
     <p>Cargando...</p>   
</div>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
