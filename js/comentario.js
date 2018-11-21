'use strict'

let templateComentarios;

for (let boton of document.querySelectorAll('.eliminar_js')) {
    boton.addEventListener('click', deleteComentario(boton.id));
}

document.querySelector('.insertar_js').addEventListener('click',insertarComentario());

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

function deleteComentario(id_comentario){
	fetch('apiComentarios/comentario/' + id_comentario,{
       "method": "DELETE",
       "mode": "cors",
       "headers": { "Content-Type": "application/json" }
    })
	.then(response => response.json())
	.then(json => console.log("Dato eliminado: " + json));
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