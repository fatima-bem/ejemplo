entrar.addEventListener("click",(e)=>{
    e.preventDefault();
    const correo = document.querySelector('#correo').value,
    password = document.querySelector('#pass').value;

if (correo === '' || password === '') {
    alerta('warning', 'LOS DATOS ESTAN INCOMPLETOS', 'ALGUNO DE LOS CAMPOS ESTA VACIO LLENA LOS CAMPOS PRIMERO');
} else {
   fetch("baseDatos/inisiosesion.php",{
       method: "POST",
       body: new FormData(iniciar)
   }).then(response=>response.json()).then(response=>{
    console.log(response.respuesta);
    if (response.respuesta === "contraBien") {
        console.log(response);
        dobledirige('success',response.titulo, response.cuerpo, response.direccion, "admin/formUsuario.php", "php/index.php");
    } else if (response.respuesta === "contraMal") {
        alerta(response.alerta, response.titulo, response.cuerpo);
    } else if (response.respuesta === "NoExiste") {
        alerta(response.alerta, response.titulo, response.cuerpo);
    } else if (response.respuesta === "bloqueo") {
        alerta(response.alerta, response.titulo, response.cuerpo);
    } else if (response.respuesta === "bloquenoti") {
        alerta(response.alerta, response.titulo, response.cuerpo);
    }
   });
}
});

function alerta(tipo, titulo, cuerpo) {
    Swal.fire({
        icon: tipo,
        title: titulo,
        text: cuerpo,
        showConfirmButton: false,
        timer: 1500
   });
}

function dobledirige(tipo,titulo, cuerpo, dirige, admin, estandar) {
    Swal.fire({
        icon: tipo,
        title: titulo,
        text: cuerpo,
        showConfirmButton: false,
        timer: 1500

    }).then(function () {
        if (dirige == 1) {
            window.location = admin;
        } else if (dirige == 2) {
            window.location = estandar;
        }

    });
}