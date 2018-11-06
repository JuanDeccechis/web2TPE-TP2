{include file="header.tpl"}

<div class="container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-8">
                <h2>{$Titulo}</h2>
            </div>
            <div class="col-4">
                <div class="dropdown">
                  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Buscar por carrera
                  <span class="caret"></span></button>
                  <ul class="dropdown-menu">
                      <li><a href="mostrarCatedras">Todas</a></li>
                      {foreach from=$carreras item=carrera}
                      <li><a href="mostrarUna/{$carrera['id']}">{$carrera['nombre']}</a></li>
                      {/foreach}
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
      {if $sesion_activa}
        <th>ELIMINAR</th>
        <th>EDITAR</th>
      {/if}
    </thead>
    <tbody>
      {foreach from=$Elementos item=carrera}

        {foreach from=$carrera['catedras'] item=catedra}
          <tr class="filaCatedra">
            <td> CATEDRA - {$catedra['id']} </td>
            <td> {$catedra['nombre']} </td>
            <td> <a href="enDetalle/{$catedra['id']}"> Ver en detalle </a> </td>
            {if $sesion_activa}
              <td> <a href="eliminarCatedra/{$catedra['id']}">ELIMINAR</a> </td>
              <td> <a href="editarCatedra/{$catedra['id']}">EDITAR</a></td>
            {/if}
          </tr>
        {/foreach}
      {/foreach}
    </tbody>
  </table>



</div>

  {if $sesion_activa}
    {include file="agregarCatedraForm.tpl"}
  {/if}

{include file="footer.tpl"}
