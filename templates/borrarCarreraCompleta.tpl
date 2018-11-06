{include file="header.tpl"}

    <h2>{$Titulo}</h2>
    <h4>Id de carrera: {$Elementos}</h4>
    <p>Esta carrera tiene catedras dependiendo. Desea eliminar la carrera junto con todas sus catedras?</p>
    
    <form method="post" action="borrarCarreraCompleta/{$Elementos}">
      <button type="submit" class="btn btn-primary">SI</button>
    </form>
    
    <button class="btn btn-primary">
    	<a href="" class="eliminar">
    		NO</a></button>
    

{include file="footer.tpl"}