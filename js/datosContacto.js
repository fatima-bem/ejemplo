registrcontacto.addEventListener("click",(e)=>{
    e.preventDefault();
    const cliente = document.querySelector("#cliente").value,
    colaborador = document.querySelector("#colaborador").value,
    renta = document.querySelector("#renta").value,
    provedor = document.querySelector("#provedor").value;
    if(cliente == '' && colaborador == '' && renta == '' && provedor == '' ){
        alerta('warning','Campos Estan vacios');
        return false;
    }else if(cliente == ''){
        alerta('warning','Campo contacto cliente esta vacio');
        return false; 
    }else if(colaborador == ''){
        alerta('warning','Campo contacto colaborador esta vacio');
        return false; 
    }else if(renta == ''){
        alerta('warning','Campo contacto renta esta vacio');
        return false; 
    }else if(provedor == ''){
        alerta('warning','Campo contacto provedor esta vacio');
        return false; 
    }
    fetch("../baseDatos/registroDatosContacto.php", {
        method: "POST",
        body: new FormData(formContacto)
      }).then(response => response.json()).then(
        response => {
          console.log(response);
           if (response.respuesta == 'existe') {
            alerta('info', 'El usuario ya cuenta con datos registrados');
          } else if (response.respuesta == 'correcto') {
            alerta('success', 'El registro de documentos se realizo de forma corecta');
          } else if (response.respuesta == 'error') {
            alerta('error', 'Error al registrar archivos ')
          }
          formContacto.reset();
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