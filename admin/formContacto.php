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
    <title>Registro Datos Contacto</title>
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

<body class="bg-dark">
    <header>
        <?php require_once("menu.php"); ?>
    </header>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Selecciona Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php
        error_reporting(0);
        require_once("../baseDatos/conexion.php");
        include("listarUsuariosContacto.php");
        $lisId=$_GET["Id_User"];
        $Lista=$conexion->query("SELECT * FROM usuario WHERE Id_usuario = '$lisId'");
        while($dau = $Lista->fetch_assoc()){
            $correoUsu = $dau["correo"]; 
            $idUsu = $dau["Id_usuario"]; 
        }
       ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row" style="justify-content: center; ">
            <div class="col-sm-6 col-md-6" style="margin-top:2%;">
                <h2 class="text-white">Registro Datos Contacto</h2>
                <h5 class="text-white">Todos los documentos deben ser en formato PDF </h5>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Usuarios
                </button>
                <form class="" id="formContacto" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="id" class="form-label text-white">Usuario</label>
                        <p class="form-control"><?php echo $correoUsu;?> </p>
                        <input type="hidden" name="id" id="id" value="<?php echo $idUsu?> ">
                    </div>
                  
                    <div class="mb-3">
                        <label for="cliente" class="form-label text-white">Selecciona Contacto Cliente</label>
                        <input class="form-control" name="cliente" type="file" id="cliente" required>
                    </div>
                    <div class="mb-3">
                        <label for="colaborador" class="form-label text-white">Selecciona Contacto Colaborador</label>
                        <input class="form-control" name="colaborador" type="file" id="colaborador" required>
                    </div>
                    <div class="mb-3">
                        <label for="renta" class="form-label text-white">Selecciona Contacto Renta</label>
                        <input class="form-control" name="renta" type="file" id="renta" required>
                    </div>
                    <div class="mb-3">
                        <label for="provedor" class="form-label text-white">Selecciona Contacto Proveedor</label>
                        <input class="form-control" name="provedor" type="file" id="provedor" required>
                    </div>
                    <div class="centrar ">
                        <button type="submit" class="btn btn-primary" id="registrcontacto">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
    <script src="../js/datosContacto.js"></script>
    <script src="../sweetalert/dist/sweetalert2.all.min.js"></script>
</body>

</html>