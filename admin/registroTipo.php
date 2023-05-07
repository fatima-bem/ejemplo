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
    <title>Registro Tipo</title>
</head>
<style>
    form.formu {
        background-color: rgba(0, 0, 0, 0.4);
        padding: 2%;
        border-radius: 5%;
    }

    label.form-label {
        color: whitesmoke;
        font-size: 20px;
    }
</style>

<body class="bg-dark">
    <header>
        <?php require_once("menu.php"); ?>
    </header>
    <div class="container">
        <div class="row" style="justify-content: center; ">
            <div class="col-sm-6 col-md-6" style="margin-top:2%;">
                <form action="#" class="formu" id="formTipo">
                    <div class="mb-3">
                        <label for="nameTipo" class="form-label">Tipo</label>
                        <input type="text" class="form-control" placeholder="Escribe tipo" name="Tipo" id="nameTipo"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="centrar ">
                        <button type="submit" class="btn btn-primary" id="registroTipo">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
    <script src="../js/datosTipo.js"></script>
</body>

</html>