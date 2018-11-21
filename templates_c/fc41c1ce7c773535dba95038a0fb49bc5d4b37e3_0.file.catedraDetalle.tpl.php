<?php
/* Smarty version 3.1.33, created on 2018-11-21 22:37:25
  from 'C:\xampp\htdocs\proyectos\web 2\web2TPE-TP2\templates\catedraDetalle.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bf5d01569af22_11180332',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fc41c1ce7c773535dba95038a0fb49bc5d4b37e3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyectos\\web 2\\web2TPE-TP2\\templates\\catedraDetalle.tpl',
      1 => 1542822874,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5bf5d01569af22_11180332 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<h2><?php echo $_smarty_tpl->tpl_vars['Titulo']->value;?>
</h2>
<table class="table">
  <thead>
    <th>Id</th>
    <th>Nombre</th>
    <th>Nombre Carrera</th>
    <th>Link</th>
    <th>Cantidad de alumnos</th>
    <?php if ($_smarty_tpl->tpl_vars['sesion_activa']->value) {?>
      <th>ELIMINAR</th>
      <th>EDITAR</th>
    <?php }?>
    <th>Comentarios</th>
  </thead>
  <tbody>
        <tr class="filaCatedra">
          <td> CATEDRA - <?php echo $_smarty_tpl->tpl_vars['Elementos']->value['id'];?>
 </td>
          <td> <?php echo $_smarty_tpl->tpl_vars['Elementos']->value['nombre'];?>
 </td>
          <td> <?php echo $_smarty_tpl->tpl_vars['carreras']->value['nombre'];?>
</td>
          <td> <a href="http://<?php echo $_smarty_tpl->tpl_vars['Elementos']->value['link'];?>
"  target="_blank"> <img src="images/icon-link.png"  alt="Link"></a> </td>
          <td> <?php echo $_smarty_tpl->tpl_vars['Elementos']->value['cant_alumnos'];?>
 </td>
          <!-- <td>
              <?php if (!empty($_smarty_tpl->tpl_vars['imagenes']->value)) {?>
                <select class="form-control" id="imagenesDropdown" name="imagenesDropdown">
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['imagenes']->value, 'imagen');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['imagen']->value) {
?>
                    <option><?php echo $_smarty_tpl->tpl_vars['imagen']->value['direccion'];?>
</option>
                    <?php $_smarty_tpl->_assignInScope('img', $_smarty_tpl->tpl_vars['imagen']->value ,false ,32);?>
                  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  <?php $_smarty_tpl->_assignInScope('path', $_smarty_tpl->tpl_vars['imagenes']->value[0]['direccion'] ,false ,32);?>
                  
                </select>
              <?php }?>
          </td> -->
          <?php if ($_smarty_tpl->tpl_vars['sesion_activa']->value) {?>            
            <td> <a href="eliminarCatedra/<?php echo $_smarty_tpl->tpl_vars['Elementos']->value['id'];?>
">ELIMINAR</a> </td>
            <td> <a href="editarCatedra/<?php echo $_smarty_tpl->tpl_vars['Elementos']->value['id'];?>
">EDITAR</a></td>
          <?php }?>
          <td>
            <form action="enDetalle/<?php echo $_smarty_tpl->tpl_vars['Elementos']->value['id'];?>
/comentarios">
              <input type="submit" value="Ver Comentarios" />
            </form>
          </td>

        </tr>
  </tbody>
</table>

<?php if ($_smarty_tpl->tpl_vars['sesion_activa']->value) {?>
<form method="post" action="agregarImagen" enctype="multipart/form-data">
  <div class="form-group">
    <input name="idCatedra" class="indiceImagenOculta" value="<?php echo $_smarty_tpl->tpl_vars['Elementos']->value['id'];?>
">
    <label for="imagenes">Imagen</label>
    <input type="file" id="imagenesAgregar" name="imagenesAgregar[]" multiple>
  </div>
  <button type="submit" class="btn btn-primary">Agregar Imagen</button>
</form>
<?php }?>
        

<?php if (!empty($_smarty_tpl->tpl_vars['imagenes']->value)) {?>
  <p> Imagenes: </p>
  <div class="form-group">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['imagenes']->value, 'imagen');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['imagen']->value) {
?>
      <img src=<?php echo $_smarty_tpl->tpl_vars['imagen']->value['direccion'];?>
 class="imagenSeleccionada">
      <?php if ($_smarty_tpl->tpl_vars['sesion_activa']->value) {?>
      <form method="post" action="eliminarImagen/<?php echo $_smarty_tpl->tpl_vars['imagen']->value['id'];?>
">
        <input name="idCatedra" class="indiceImagenOculta" value="<?php echo $_smarty_tpl->tpl_vars['Elementos']->value['id'];?>
">
        <button type="submit" class="btn btn-danger">Eliminar Imagen</button>
      </form>
      <?php }?>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </div>
<?php }
$_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
