<?php
session_start();
$correoSesion = $_SESSION["nombre_usuario"]["correo"];
if(isset($_SESSION['nombre_usuario'])){
    if($_SESSION['nombre_usuario']['Id_tipo']==1){
        
    }else if($_SESSION['nombre_usuario']['Id_tipo']==2){
        header("Location: ../php/index.php");
    }
  }else{
    echo '<script>
        alert("Usted no tiene acceso al contenido");
        window.location="../index.php";
        </script>';
    die();
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../sweetalert/dist/sweetalert2.min.css">
    <title>Registro Usuarios</title>
</head>
<style>
    form.formu {
        background-color: rgba(0, 0, 0, 0.4);
        padding: 2%;
        border-radius: 5%;
    }

    label.form-label {
        color: white;
        font-size: 20px;
    }
</style>

<body style="background:rgba(127, 131, 134, 0.507);">
    <header>
        <?php require_once("menu.php"); ?>
    </header>
    <div class="container">
        <div class="row" style="justify-content: center; ">
            <div class="col-sm-6 col-md-6" style="margin-top:2%;">
                <form action="#" class="formu" id="formUsu">
                    <div class="mb-3">
                        <label for="nombreUsu" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombreUsu" id="nombreUsu"
                            placeholder="Ingresa el Nombre">
                        <label for="tel" class="form-label">Celular</label>
                        <input type="tel" class="form-control" name="tel" id="tel" placeholder="Ingresa tu Celular">
                        <label for="correo" class="form-label">Correo</label>
                        <input type="email" class="form-control" placeholder="Escribe Correo" name="correo" id="correo"
                            aria-describedby="emailHelp">
                        <label for="correo2" class="form-label">Verifica Correo</label>
                        <input type="email" class="form-control" placeholder="Confirma Correo" name="correo2"
                            id="correo2" aria-describedby="emailHelp">
                        <input type="hidden" name="tipo" value="2">
                    </div>
                    <div class="centrar ">
                        <button type="submit" class="btn btn-primary" id="registroUsu">Registrar</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-6 colmd-6" style="margin-top:2%;">
                <div class="tabla-1">
                    <table class="table table-light table-striped">
                        <thead>
                            <tr>
                                <th class="table-dark">Nombre Usuario</th>
                                <th class="table-dark">Correo Usuario</th>
                                <th class="table-dark">Numero Usuario</th>
                                <th class="table-dark">Editar</th>
                                <th class="table-dark">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody id="tbUsuario">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
        <!-- Modal -->
        <div class="modal fade" id="Modalusuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <center>
                <div class="modal-body">
                    <form action="#" id="forEditUsu" onKeyPress="if(event.keyCode == 13) event.returnValue = false;">
                        <input type="hidden" name="idUsuario" id="idUsuario">
                        <label for="EditarNombre" class="form-label" style="color: black;">Nombre</label>
                        <input type="text" class="form-control" name="EditarNombre" id="EditarNombre"
                            placeholder="Ingresa el nombrer">
                        <label for="EditarNumero" class="form-label" style="color: black;">Celular</label>
                        <input type="tel" class="form-control" name="EditarNumero" id="EditarNumero" placeholder="Ingresa tu celular">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="cerrarmodal" class="btn btn-danger"
                        data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="EditUsu">Guardar Cambio</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
    <script src="../js/datosusuario.js"></script>
    <script src="../sweetalert/dist/sweetalert2.all.min.js"></script>
</body>

</html>