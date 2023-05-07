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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require_once("menu.php")
    ?>
      <div class="container">
        <div class="row" style="justify-content: center; ">
            <div class="table-responsive" style="margin-top:2%;">
                <table class="table table-dark">
                    <thead>
                        <th class="">Correo</th>
                        <th class="">INE</th>
                        <th class="">CURP</th>
                        <th class="">Acta de Nacimiento</th>
                        <th class="">RFC</th>
                        <th class="">Comprobante De Domicilio</th>

                    </thead>
                    <?php
    require_once("../baseDatos/conexion.php");
    $consult = $conexion->query("SELECT * FROM docpersonal LEFT JOIN usuario ON docpersonal.Id_usuario = usuario.Id_usuario WHERE correo='$correoSesion'");
   
    while ($row = $consult->fetch_assoc()) {   
    
    ?>
                    <tbody>
                        <tr>
                            <td><?php echo $row["correo"]; ?></td>
                            <td>
                                <a href="../baseDatos/archivospersonal.php?Ine=<?php echo $row["ine"] ?>&&corr=<?php echo $row["correo"]?>" class="btn btn-primary"
                                    target="_blank">Ver INE</a>
                            </td>
                           <td>
                           <a href="../baseDatos/archivospersonal.php?curp=<?php echo $row["curp"] ?>&&corr=<?php echo $row["correo"]?>" class="btn btn-primary"
                                    target="_blank">Ver CURP</a>
                           </td>
                            <td>
                            <a href="../baseDatos/archivospersonal.php?acta=<?php echo $row["acta_nacimeinto"] ?>&&corr=<?php echo $row["correo"]?>" class="btn btn-primary"
                                    target="_blank">Ver Acta</a>
                            </td>
                            <td>
                            <a href="../baseDatos/archivospersonal.php?rfc=<?php echo $row["rfc"] ?>&&corr=<?php echo $row["correo"]?>" class="btn btn-primary"
                                    target="_blank">Ver RFC</a>

                            </td>
                            <td>
                                <a href="../baseDatos/archivospersonal.php?compro=<?php echo $row["comprobante_domi"] ?>&&corr=<?php echo $row["correo"]?>" class="btn btn-primary"
                                    target="_blank">Ver Comprobante</a>

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
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>