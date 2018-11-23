document.addEventListener("DOMContentLoaded", function(){
'use strict';

let templateComentarios;


let id_catedra = document.querySelector("#id_catedra").title;
let logueado = document.querySelector("#logueado").title == 0 ? false : true;
let tipoUsuario = document.querySelector("#tipoUsuario").title;



fetch('js/templates/comentarios.handlebars')
.then(response => response.text())
.then(template => {
	templateComentarios = Handlebars.compile(template);
	getComentarios();
});

function getComentarios(){
	fetch('apiComentarios/comentario?id_catedra=' + id_catedra)
	.then(response => response.json())
	.then(json => {
		console.log(json);
		mostrarComentarios(json);
	})
	.catch(error => {
		console.log("Error al obtener comentarios, json(): " + error)
	});
}

function mostrarComentarios(json){
	let puedeBorrar = false;
	console.log("user: " +tipoUsuario);
	if ((tipoUsuario == "inmortal") ||(tipoUsuario == "admin"))
		puedeBorrar = true;
	else
		puedeBorrar = false;
	let context = {
		titulo: "Comentarios",
		catedra: id_catedra,
		logueado: logueado,
		puedeBorrar: puedeBorrar,
		comentarios: json
	}
	let container = document.querySelector("#comentarios-container");
	let html = templateComentarios(context);
	container.innerHTML = html;

	for (let boton of document.querySelectorAll('.eliminar_js')) {
	    boton.addEventListener('click', function(){
	    	event.preventDefault();
			fetch('apiComentarios/comentario/' + boton.id, {
				"method": "DELETE", 
				"headers": { "Content-Type": "application/json" }
			})
			.then(response => getComentarios())
			.catch(error => console.log("Error al eliminar comentario: " + error));
	    });
	}

	if(logueado){
		document.querySelectorAll('.insertar_js')[0].addEventListener('click', insertarComentario);
	}
}

function insertarComentario(){
	event.preventDefault();
	let texto_comentario = document.querySelector("#input_comentario").value;
	let puntaje = document.querySelector("#input_puntaje").value;
	let objeto = {
					"idCatedra" : id_catedra, 
					"textoComentario" : texto_comentario, 
					"puntaje" : puntaje
				};
	console.log(JSON.stringify(objeto));
	fetch('apiComentarios/comentario/99',{
       method: "POST",
       headers: { "Content-Type": "application/json" },
       body: JSON.stringify(objeto)})
	.then(response => getComentarios())
	.catch(error => console.log("Error al insertar comentario: " + error));
}

});