const departamento = document.querySelector('#departamento');
const genero = document.querySelector('#genero');
const educacion = document.querySelector('#educacion');

const lsDepto = localStorage.getItem("departamento");
if(lsDepto){
    departamento.value = lsDepto;
}
departamento.addEventListener('change', function(){
    const agregar = departamento.value;
    localStorage.setItem("departamento",agregar);
    });

const lsGenero = localStorage.getItem("genero");
if(lsGenero){
    genero.value = lsGenero;
}
genero.addEventListener('change',()=>{
    const agregar = genero.value;
    localStorage.setItem("genero",agregar);
    });

    const lsEducacion = localStorage.getItem("educacion");
if(lsEducacion){
    educacion.value = lsEducacion;
}
educacion.addEventListener('change',()=>{
    const agregar = educacion.value;
    localStorage.setItem("educacion",agregar);
    });


