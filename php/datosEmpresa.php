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
                        <th class="">Correo</th>
                        <th class="">Acta Constitutiva</th>
                        <th class="">RFC</th>
                        <th class="">Registro Público Empresarial</th>
                        <th class="">Cuenta Bancaria</th>
                        <th class="">Certificado Empr Gro</th>

                    </thead>
                    <?php
    require_once("../baseDatos/conexion.php");
    $consult = $conexion->query("SELECT * FROM docempresa LEFT JOIN usuario ON docempresa.Id_usuario = usuario.Id_usuario WHERE correo='$correoSesion'");
   
    while ($row = $consult->fetch_assoc()) {   
    
    ?>
                    <tbody>
                        <tr>
                            <td><?php echo $row["correo"]; ?></td>
                            <td>
                                <a href="../baseDatos/archivosempresal.php?acta=<?php echo $row["acta_constitutiva"] ?>&&corr=<?php echo $row["correo"] ?>" class="btn btn-primary"
                                    target="_blank">Ver Acta Constitutiva</a>
                            </td>
                           <td>
                           <a href="../baseDatos/archivosempresal.php?rfc=<?php echo $row["rfc"] ?>&&corr=<?php echo $row["correo"] ?>" class="btn btn-primary"
                                    target="_blank">Ver RFC</a>
                           </td>
                            <td>
                            <a href="../baseDatos/archivosempresal.php?regis=<?php echo $row["regisPubEmpr"] ?>&&corr=<?php echo $row["correo"] ?>" class="btn btn-primary"
                                    target="_blank">Ver Registro Público Empresarial</a>
                            </td>
                            <td>
                            <a href="../baseDatos/archivosempresal.php?cuenta=<?php echo $row["cuentaBancaria"] ?>&&corr=<?php echo $row["correo"] ?>" class="btn btn-primary"
                                    target="_blank">Ver Cuenta Bancaria</a>

                            </td>
                            <td>
                                <a href="../baseDatos/archivosempresal.php?certi=<?php echo $row["certificadoEmprGro"] ?>&&corr=<?php echo $row["correo"] ?>" class="btn btn-primary"
                                    target="_blank">Ver Certificado Empr Gro</a>

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