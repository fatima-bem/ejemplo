<?php
session_start();
$correoSesion = $_SESSION["nombre_usuario"]["correo"];
if(isset($_SESSION['nombre_usuario'])){
    if($_SESSION['nombre_usuario']['Id_tipo']==1){
        header("Location: ../admin/index.php");
    }else if($_SESSION['nombre_usuario']['Id_tipo']==2){
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Docs Personal</title>
</head>
<header>
    <?php
require_once("menu.php")
?>
</header>

<body>
    <div class="container">
        <div class="row" style="justify-content: center; ">
            <div class="table-responsive" style="margin-top:2%;">
                <table class="table table-dark">
                    <thead>
                        <th class="">Corero</th>
                        <th class="">Contacto Cliente</th>
                        <th class="">Contacto Colaborado</th>
                        <th class="">Contacto Renta</th>
                        <th class="">Contacto Proveedor</th>

                    </thead>
                    <?php
    require_once("../baseDatos/conexion.php");
    $consult = $conexion->query("SELECT * FROM contacto LEFT JOIN usuario ON contacto.Id_usuario = usuario.Id_usuario WHERE correo='$correoSesion'");
   
    while ($row = $consult->fetch_assoc()) {   
    
    ?>
                    <tbody>
                        <tr>
                            <td><?php echo $row["correo"]; ?></td>
                            <td>
                                <a href="../baseDatos/archivoscontacto.php?cliente=<?php echo $row["contactoCliente"] ?>&&corr=<?php echo $row["correo"] ?>" class="btn btn-primary"
                                    target="_blank">Ver Contacto Cliente</a>
                            </td>
                           <td>
                           <a href="../baseDatos/archivoscontacto.php?colabo=<?php echo $row["contactoColabo"] ?>&&corr=<?php echo $row["correo"] ?>" class="btn btn-primary"
                                    target="_blank">Ver Contacto Colaborador</a>
                           </td>
                            <td>
                            <a href="../baseDatos/archivoscontacto.php?renta=<?php echo $row["contactoRenta"] ?>&&corr=<?php echo $row["correo"] ?>" class="btn btn-primary"
                                    target="_blank">Ver Contacto Renta</a>
                            </td>
                            <td>
                            <a href="../baseDatos/archivoscontacto.php?prove=<?php echo $row["contactoProve"] ?>&&corr=<?php echo $row["correo"] ?>" class="btn btn-primary"
                                    target="_blank">Ver Contacto Proveedor </a>

                            </td>


                        </tr>

                    </tbody>

                    <?php
    }
    ?>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
</body>

</html>