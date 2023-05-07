registroTipo.addEventListener("click", (e) => {
    e.preventDefault();
    const valor = document.querySelector("#nameTipo").value;
    if (valor == '') {
        alert("Tipo Vacio");
        exit;
    };
    fetch("../baseDatos/registroTipo.php", {
        method: "POST",
        body: new FormData(formTipo)
      }).then(response => response.json()).then(
        response => {
          //console.log(response);
          if (response.respuesta === "correcto") {
          alert("Registrado corectamente")
          } else if (response.respuesta === "error") {
           alert("Existio un problema al registrar")
          } else if (response.respuesta === "existe") {
           alert("El tipo ya existe")
          }
          formTipo.reset();
        })
});