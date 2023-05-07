registrodocper.addEventListener("click",(e)=>{
e.preventDefault();
const curp = document.querySelector("#curp").value,
ine = document.querySelector("#ine").value,
Acta = document.querySelector("#Acta").value,
rfc = document.querySelector("#rfc").value,
domicilio = document.querySelector("#domicilio").value;
if(curp == '' && ine == '' && Acta == '' && rfc == '' && domicilio == ''){
    alerta('warning','Campos Estan vacios');
    return false;
}else if(curp == ''){
    alerta('warning','Campo Curp esta vacio');
    return false; 
}else if(ine == ''){
    alerta('warning','Campo ine esta vacio');
    return false; 
}else if(Acta == ''){
    alerta('warning','Campo Acta esta vacio');
    return false; 
}else if(rfc == ''){
    alerta('warning','Campo rfc esta vacio');
    return false; 
}else if(domicilio == ''){
    alerta('warning','Campo Comporbante domicilio esta vacio');
    return false; 
}
fetch("../baseDatos/registroDatosPersonal.php", {
    method: "POST",
    body: new FormData(formPersonal)
  }).then(response => response.json()).then(
    response => {
      console.log(response);
      if (response.respuesta == 'existe') {
        alerta('info', 'El usuario ya cuenta con datos registrados')
      } else if (response.respuesta == 'correcto') {
        alerta('success', 'El registro de documentos se realizo de forma corecta');
      } else if (response.respuesta == 'error') {
        alerta('error', 'Error al registrar archivos ')
      }
      formPersonal.reset();
    })
});

function alerta(icono, dato) {
    Swal.fire({
        icon: icono,
        title: dato,
        showConfirmButton: false,
        timer: 1500
    })
}