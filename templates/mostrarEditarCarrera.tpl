{include file="header.tpl"}

    <h2>{$Titulo}</h2>


    <div class="container">
      <h2>Formulario</h2>
      <form method="post" action="guardarEditar">
        <input type="hidden" class="form-control" id="idForm" name="idForm" value="{$Elementos['id']}">
        <div class="form-group">
          <label for="tituloForm">Titulo</label>
          <input type="text" class="form-control" id="nombreForm" name="nombreForm" value="{$Elementos['nombre']}">
        </div>
        <div class="form-group">
          <label for="descripcionForm">Descripcion</label>
          <input type="text" class="form-control" id="descripcionForm" name="descripcionForm" value="{$Elementos['descripcion']}">
        </div>
        
        <button type="submit" class="btn btn-primary">Editar Carrera</button>
      </form>
    </div>
{include file="footer.tpl"}
