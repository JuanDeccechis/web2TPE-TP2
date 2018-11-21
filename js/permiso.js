'use strict'

let templatePermiso;

fetch('js/templates/permiso.handlebars')
.then(response => response.text())
.then(template => {
	templatePermiso = Handlebars.compile(template);
	getPermisos();
});

function getPermisos(){
	let f = fetch('apiUsuarios/permiso'); //  http://localhost/proyectos/web%202/web2TPE-TP2/apiUsuarios/permiso
	let r = f.then(response => response.json());
	let j = r.then(json => {
		mostrarPermisos(json);
	});
}

function mostrarPermisos(json){
	let context = {
		titulo: "Permisos",
		permisos: json
	}
	let html = templatePermiso(context);
	document.querySelector("#permisos-container").innerHTML = html;
}