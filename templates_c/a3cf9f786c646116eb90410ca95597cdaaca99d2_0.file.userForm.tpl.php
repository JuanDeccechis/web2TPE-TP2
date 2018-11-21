<?php
/* Smarty version 3.1.33, created on 2018-11-21 22:29:34
  from 'C:\xampp\htdocs\proyectos\web 2\web2TPE-TP2\templates\userForm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bf5ce3e5079b6_78366852',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a3cf9f786c646116eb90410ca95597cdaaca99d2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyectos\\web 2\\web2TPE-TP2\\templates\\userForm.tpl',
      1 => 1542807230,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5bf5ce3e5079b6_78366852 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div class="container-fluid">
	  <div class="row">
	    <div class="col-lg-4">
	      <h2><?php echo $_smarty_tpl->tpl_vars['Titulo']->value;?>
</h2>
	    </div>
	    <div class="col-lg-4">
	      <img src="images/logoguarani.png" alt="Logo Siu Guarani"></a>
	    </div>
	    <div class="col-lg-6">
	      <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['Accion']->value;?>
" class="navbar-form navbar-left">
			<div class="form-group">
			  <input class="form-control" placeholder="Usuario" type="text" name="Usuario" value="">
			  <input class="form-control" placeholder="Contraseña" type="password" name="Password" value="">
			</div>
			<h3><?php echo $_smarty_tpl->tpl_vars['Mensaje']->value;?>
</h3>
			<button type="submit" class="btn btn-primary"> <?php echo $_smarty_tpl->tpl_vars['Boton']->value;?>
 </button>
		  </form>
	    </div>
      </div>
    </div>
         
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
