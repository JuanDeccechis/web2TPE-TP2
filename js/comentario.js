'use strict'
let templateComentarios;

let botonesEliminar = document.querySelectorAll('.eliminar_js');
for (let boton of botonesEliminar) {
    boton.addEventListener('click', deleteComentario(boton.id));
}
 /*document.querySelector('.insertar_js').addEventListener('click',insertarComentario());*/

let id_catedra = document.querySelector("#id_catedra").title;
let logueado = document.querySelector("#logueado").title == 0 ? false : true;
fetch('js/templates/comentarios.handlebars')
.then(response => response.text())
.then(template => {
	templateComentarios = Handlebars.compile(template);
	getComentarios();
});
 function getComentarios(){
	let f = fetch('apiComentarios/comentario?id_catedra=' + id_catedra);
	console.log(f);
	let r = f.then(response => response.json());
	console.log(r);
	let j = r.then(json => {
		mostrarComentarios(json);
	});
}
 function mostrarComentarios(json){
	let context = {
		titulo: "Comentarios",
		catedra: id_catedra,
		logueado, logueado,
		comentarios: json
	}
	console.log(context);
	let html = templateComentarios(context);
	document.querySelector("#comentarios-container").innerHTML = html;
 } 
