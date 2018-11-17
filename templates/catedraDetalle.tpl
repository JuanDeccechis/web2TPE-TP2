{include file="header.tpl"}
<h2>{$Titulo}</h2>
<table class="table">
  <thead>
    <th>Id</th>
    <th>Nombre</th>
    <th>Nombre Carrera</th>
    <th>Link</th>
    <th>Cantidad de alumnos</th>
    {if $sesion_activa}
      <th>ELIMINAR</th>
      <th>EDITAR</th>
    {/if}
  </thead>
  <tbody>
        <tr class="filaCatedra">
          <td> CATEDRA - {$Elementos['id']} </td>
          <td> {$Elementos['nombre']} </td>
          <td> {$carreras['nombre']}</td>
          <td> <a href="http://{$Elementos['link']}"  target="_blank"> <img src="images/icon-link.png"  alt="Link"></a> </td>
          <td> {$Elementos['cant_alumnos']} </td>
          <!-- <td>
              {if !empty($imagenes)}
                <select class="form-control" id="imagenesDropdown" name="imagenesDropdown">
                  {foreach from=$imagenes item=imagen}
                    <option>{$imagen['direccion']}</option>
                    {assign var="img" value=$imagen scope='global'}
                  {/foreach}
                  {assign var="path" value=$imagenes[0]['direccion'] scope='global'}
                  
                </select>
              {/if}
          </td> -->
          {if $sesion_activa}
            
            <td> <a href="eliminarCatedra/{$Elementos['id']}">ELIMINAR</a> </td>
            <td> <a href="editarCatedra/{$Elementos['id']}">EDITAR</a></td>
          {/if}
        </tr>
  </tbody>
</table>



{if !empty($imagenes)}
  <p> Imagenes: </p>
  <div class="form-group">
    {foreach from=$imagenes item=imagen}
      <img src={$imagen['direccion']} class="imagenSeleccionada">
      {if $sesion_activa}
      <form method="post" action="eliminarImagen/{$imagen['id']}">
        <input name="idCatedra" class="indiceImagenOculta" value="{$Elementos['id']}">
        <button type="submit" class="btn btn-danger">Eliminar Imagen</button>
      </form>
      {/if}
    {/foreach}
  </div>
{/if}
      
{include file="footer.tpl"}

