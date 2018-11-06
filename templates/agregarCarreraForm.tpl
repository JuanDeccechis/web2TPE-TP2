<div class="container">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8">
        <h2>Formulario</h2>
        <form method="post" action="agregar">
          <div class="form-group">
            <label for="nombreForm">nombre</label>
            <input type="text" class="form-control" id="nombreForm" name="nombreForm" >
          </div>
          <div class="form-group">
            <label for="descripcionForm">Descripcion</label>
            <input type="text" class="form-control" id="descripcionForm" name="descripcionForm" >
          </div>
          <h3>{$Mensaje}</h3>
          <button type="submit" class="btn btn-primary">Crear Carrera</button>
        </form>
      </div> 
    </div>
  </div>
</div>