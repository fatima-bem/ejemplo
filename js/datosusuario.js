listarUsuario();

function listarUsuario() {
    //peticion a la base de datos para general una tabla
    fetch("../admin/tablausu.php", {
        method: "POST"
    }).then(response => response.text()).then(response => {
        //convertir el php a html y anexarlo 
        tbUsuario.innerHTML = response;
    })
}
registroUsu.addEventListener("click", (e) => {
    e.preventDefault();
    const correo = document.querySelector("#correo").value;
    const correo2 = document.querySelector("#correo2").value;
    const tel = document.querySelector("#tel").value;
    const nombre = document.querySelector("#nombreUsu").value;
    if (correo == '' || correo2 == '' || tel == '' || nombre == '') {
        alerta('warning','Campos incompletos');
        exit;
    }
    validarEmail(correo);
    validarEmail(correo2);
    if (correo == correo2) {
        fetch("../baseDatos/registroUsuario.php", {
            method: "POST",
            body: new FormData(formUsu)
        }).then(response => response.json()).then(response => {
            console.log(response.respuesta);
            if (response.respuesta == "existe") {
                alerta('warning',response.correo+' Se encunetra resgistrado');
            } else if (response.respuesta == 'correcto') {
                alerta('success','Usuario registrado correctamente');
                formUsu.reset();
                listarUsuario();
            } else if (response.respuesta == 'error') {
                alerta('error','Error al realizar registro')
            } else if (response.respuesta == 'correoDistinto') {
                alerta('error','Correos Distintos')
            }
        });

    } else {
        alerta('error','Los correos son distintos')
        exit;
    }
});

function validarEmail(valor) {
    if (/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(valor)) {} else {
        alert("Los datos proporcionados " + valor + " no es valido.");
        exit;
    }
}

//editar
const myModal = new bootstrap.Modal(document.getElementById('Modalusuario'));
function editarUsu(Id_usuario) {
  //console.log(Id_Tipo);
  fetch("../admin/tablaEditarUsu.php", {
    method: "POST",
    body: Id_usuario
  }).then(response => response.json()).then(response => {
    idUsuario.value=response.id;
    EditarNombre.value=response.nombre;
    EditarNumero.value=response.numero;
    myModal.show();
    //console.log(response);
    //se concatena la respuesta del servidor trayendo el id y el nomrbe
    
  })
}


EditUsu.addEventListener("click", (m)=>{
    m.preventDefault();
    const vacio = document.querySelector('#EditarNombre').value;
    const vacio2 = document.querySelector('#EditarNumero').value;
    if(vacio === '' || vacio2 === ''){
      alerta("warning", "Campo vacio Debes llenar los campos para poder editar");
      exit;  
    }
    fetch('../baseDatos/editarUsu.php',{
      method:'POST',
      body:new FormData(forEditUsu)
    }).then(response=>response.json()).then(response=>{
      //console.log(response);
      if(response.respuesta === 'correcto'){
        alerta('success','Usuario '+response.nombre+' editado con exito');
        listarUsuario();
        myModal.hide();
      }
      else if(response.respuesta === 'error'){
        sinboton('error','response.nombre Error al editar')
      }
     
    });
  })
//eliminar usuario
function eliminarUsu(Id_usuario) {
  Swal.fire({
    title: "¿Desea eliminar?",
    text: "Al eliminar usuario podria afectar los registros",
    icon: "question",
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: "Cancelar",
    confirmButtonText: "Eliminar",
  }).then((result) => {
    if (result.isConfirmed) {
      fetch("../baseDatos/eliminarUsuario.php", {
        method: "POST",
        body: Id_usuario
      }).then(response => response.json()).then(response => {
        //console.log(response);
        //console.log(response.respuesta);
        if (response.respuesta === "correcto") {
          Swal.fire({
            icon: 'success',
            title: 'Se Elimino de forma correcta',
            showConfirmButton: false,
            timer: 1500
          })
          listarUsuario();
        } else if (response.respuesta === "error") {
          alerta("error", "Error al eliminar");
        }
      })

    }
  })
}

function alerta(icono, dato) {
    Swal.fire({
        icon: icono,
        title: dato,
        showConfirmButton: false,
        timer: 1500
    })
}