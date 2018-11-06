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
          {if $sesion_activa}
            <td> <a href="eliminarCatedra/{$Elementos['id']}">ELIMINAR</a> </td>
            <td> <a href="editarCatedra/{$Elementos['id']}">EDITAR</a></td>
          {/if}
        </tr>
  </tbody>
</table>
{include file="footer.tpl"}
