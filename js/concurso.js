document.addEventListener("DOMContentLoaded", function(){

	"use-strict";

	let jsimagenes = document.querySelector("#imagenesDropdown");
	jsimagenes.addEventListener('change', cambiarImagen);
	
	function cambiarImagen(event){
		event.preventDefault();
		let srcImagen = document.querySelector(".imagenSeleccionada");
		let indiceImagenOculta = document.querySelector(".indiceImagenOculta");
		srcImagen.src=jsimagenes.value;
		indiceImagenOculta.value = jsimagenes.selectedIndex;
	}
})