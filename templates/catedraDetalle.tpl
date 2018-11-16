{include file="header.tpl"}
<h2>{$Titulo}</h2>
<table class="table">
  <thead>
    <th>Id</th>
    <th>Nombre</th>
    <th>Nombre Carrera</th>
    <th>Link</th>
    <th>Cantidad de alumnos</th>
    <th>IMAGENES</th>
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
          <td>
              {if !empty($imagenes)}
                <select class="form-control" id="imagenesDropdown" name="imagenesDropdown">
                  {foreach from=$imagenes item=imagen}
                    <option>{$imagen['direccion']}</option>
                    {assign var="img" value=$imagen scope='global'}
                  {/foreach}
                  {assign var="path" value=$imagenes[0]['direccion'] scope='global'}
                </select>
              {/if}
              <!-- {html_options values=$imagenes output=$imagenes['direccion'] selected=$path} -->
              
              <!-- {html_options name="imagenes" options=$imagenes selected=$path} -->
          </td>
          {if $sesion_activa}
            
            <td> <a href="eliminarCatedra/{$Elementos['id']}">ELIMINAR</a> </td>
            <td> <a href="editarCatedra/{$Elementos['id']}">EDITAR</a></td>
          {/if}
        </tr>
  </tbody>
</table>

{if !empty($imagenes)}
  <div class="form-group">
    <img src={$path} class="imagenSeleccionada">
    {if $sesion_activa}
    <form method="post" action="eliminarImagen">
      <input name="indiceImagenOculta" class="indiceImagenOculta">
      <input name="indiceImagenOculta" class="indiceImagenOculta" value={$imagenes[]}><!-- esto no esta completo -->
      <button type="submit" class="btn btn-primary">Eliminar Imagen</button>
    </form>
    {/if}
  </div>
{/if}
      
{include file="footer.tpl"}

