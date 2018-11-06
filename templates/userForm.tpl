{include file="header.tpl"}
    <div class="container-fluid">
	  <div class="row">
	    <div class="col-lg-4">
	      <h2>{$Titulo}</h2>
	    </div>
	    <div class="col-lg-4">
	      <img src="images/logoguarani.png" alt="Logo Siu Guarani"></a>
	    </div>
	    <div class="col-lg-6">
	      <form method="post" action="{$Accion}" class="navbar-form navbar-left">
			<div class="form-group">
			  <input class="form-control" placeholder="Usuario" type="text" name="Usuario" value="">
			  <input class="form-control" placeholder="Contraseña" type="password" name="Password" value="">
			</div>
			<h3>{$Mensaje}</h3>
			<button type="submit" class="btn btn-primary"> {$Boton} </button>
		  </form>
	    </div>
      </div>
    </div>
         
{include file="footer.tpl"}