registrempresa.addEventListener("click",(e)=>{
    e.preventDefault();
    const actacos = document.querySelector("#actacos").value,
    regis = document.querySelector("#regis").value,
    certi = document.querySelector("#certi").value,
    rfc = document.querySelector("#rfc").value,
    cuenta = document.querySelector("#cuenta").value;
    if(certi == '' && regis == '' && actacos == '' && rfc == '' && cuenta == ''){
        alerta('warning','Campos Estan vacios');
        return false;
    }else if(actacos == ''){
        alerta('warning','Campo Acta esta vacio');
        return false; 
    }else if(regis == ''){
        alerta('warning','Campo registro esta vacio');
        return false; 
    }else if(certi == ''){
        alerta('warning','Campo certificado esta vacio');
        return false; 
    }else if(rfc == ''){
        alerta('warning','Campo rfc esta vacio');
        return false; 
    }else if(cuenta == ''){
        alerta('warning','Campo esta vacio');
        return false; 
    }
    fetch("../baseDatos/registroDatosEmpresa.php", {
        method: "POST",
        body: new FormData(formEmpresa)
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
          formEmpresa.reset();
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