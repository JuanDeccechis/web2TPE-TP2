document.addEventListener("DOMContentLoaded", function(){
'use strict';

let templateComentarios;





let id_catedra = document.querySelector("#id_catedra").title;
let logueado = document.querySelector("#logueado").title == 0 ? false : true;
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
		mostrarComentarios(json);
	})
	.catch(error => {
		console.log("Error al obtener comentarios, json(): " + error)
	});
}

function insertarComentario(){
	let id_usuario = document.querySelector("#id_usuario").title;
	let texto_comentario = document.querySelector("#input_comentario").value;
	let objeto = '{"idUsuario" : ' + id_usuario + ', "idCatedra" : ' + id_catedra + ', "textoComentario" : "' + texto_comentario + '", "puntaje" : 0}';
	fetch('apiComentarios/comentario/' + id_comentario,{
       "method": "POST",
       "headers": { "Content-Type": "application/json" }
    ,"body": JSON.stringify(objeto)})
	.then(response => console.log("POST status: " + response.status))
	.catch(error => console.log("Error al insertar comentario: " + error));
}

function eliminarComentario(id_comentario){
	fetch('apiComentarios/comentario/' + id_comentario,{
       "method": "DELETE",
       "headers": { "Content-Type": "application/json" }
    })
	.then(response => response.json())
	.catch(error => console.log("Error al eliminar comentario: " + error));
}

function mostrarComentarios(json){
	let context = {
		titulo: "Comentarios",
		catedra: id_catedra,
		logueado, logueado,
		comentarios: json
	}
	let html = templateComentarios(context);
	document.querySelector("#comentarios-container").innerHTML = html;
}


for (let boton of document.querySelectorAll('.eliminar_js')) {
    boton.addEventListener('click', eliminarComentario(boton.id));
}

document.querySelector('.insertar_js').addEventListener('click', insertarComentario());

});