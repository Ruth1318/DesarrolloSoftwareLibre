const nombre = document.querySelector('#nombre');
const apellido = document.querySelector('#apellido');
const edad = document.querySelector('#edad');
const correo = document.querySelector('#correo');
const username = document.querySelector('#username');

function mostrar() {
    console.log(`Nombre completo: ${nombre.value} ${apellido.value} edad: ${edad.value} correo: ${correo.value} username: ${username.value}`);
    limpiarCampos();
}
function limpiarCampos(){
    nombre.value = "";
    apellido.value = "";
    edad.value = "";
    correo.value = "";
    username.value = "";
}


