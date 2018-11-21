<?php
/* Smarty version 3.1.33, created on 2018-11-21 22:37:44
  from 'C:\xampp\htdocs\proyectos\web 2\web2TPE-TP2\templates\catedraComentarios.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bf5d0280e7c09_13817754',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7b3ff3e7702f1d0f674d6034cd023402fb6c81f0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyectos\\web 2\\web2TPE-TP2\\templates\\catedraComentarios.tpl',
      1 => 1542817019,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5bf5d0280e7c09_13817754 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	<span id="id_catedra" class="oculto" title="<?php echo $_smarty_tpl->tpl_vars['id_catedra']->value;?>
"></span>
    <span id="logueado"class="oculto" title="<?php echo $_smarty_tpl->tpl_vars['sesion_activa']->value;?>
"></span>
	<div id="comentarios-container">
		<p>Cargando...</p>
    </div>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
