const nombre = document.querySelector('#nombre');
const dui = document.querySelector('#dui');
const fecha = document.querySelector('#fecha');
const genero = document.querySelector('#genero');
const depto = document.querySelector('#departamento');

nombre.addEventListener('keyup',function(event){
    if(nombre.value != ""){
        document.body.style.backgroundColor = "white";
    }else{
        document.body.style.backgroundColor = "gray";
    }
});
dui.addEventListener('keyup',function(event){
    if(dui.value != ""){
        document.body.style.backgroundColor = "white";
    }else{
        document.body.style.backgroundColor = "gray";
    }
});
fecha.addEventListener('change',function(event){
    if(fecha.value != ""){
        document.body.style.backgroundColor = "white";
    }else{
        document.body.style.backgroundColor = "gray";
    }
});
genero.addEventListener('keyup',function(event){
    if(genero.value != ""){
        document.body.style.backgroundColor = "white";
    }else{
        document.body.style.backgroundColor = "gray";
    }
});
depto.addEventListener('keyup',function(event){
    if(depto.value != ""){
        document.body.style.backgroundColor = "white";
    }else{
        document.body.style.backgroundColor = "gray";
    }
})

const limpiar = () =>{
    nombre.value = "";
    dui.value = "";
    fecha.value = "";
    genero.value = "";
    depto.value = "";
}