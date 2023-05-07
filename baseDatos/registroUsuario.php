<?php
require_once("conexion.php");
$correo = mysqli_real_escape_string($conexion, filter_var(strtolower($_POST["correo"]), FILTER_SANITIZE_EMAIL));
$correo2 = mysqli_real_escape_string($conexion, filter_var(strtolower($_POST["correo2"]), FILTER_SANITIZE_EMAIL));
$nombreU = mysqli_real_escape_string($conexion, filter_var(strtolower($_POST["nombreUsu"]), FILTER_SANITIZE_STRING));
$tipo = mysqli_real_escape_string($conexion, filter_var($_POST["tipo"], FILTER_SANITIZE_NUMBER_INT));
$cel = mysqli_real_escape_string($conexion, filter_var($_POST["tel"], FILTER_SANITIZE_NUMBER_INT));
$contra = password_hash("facil2021", PASSWORD_BCRYPT);
$nombre1 = ucwords($nombreU);
if (empty($correo2) && empty($correo)) {
    $respuesta = array(
        "respuesta" => "vacio"
    );
}

if (isset($_POST)) {
    #consulta de verificacion para nombre
    if ($correo == $correo2) {
        $verifica = $conexion->query("SELECT * FROM usuario where correo='$correo'");
        if ($verifica->num_rows == 0) {
            try {
                $stmt = $conexion->prepare("INSERT INTO usuario(Id_tipo,numero_telefono,nombre_usuario,correo,password) VALUE (?,?,?,?,?)");
                $stmt->bind_param("iisss", $tipo,$cel,$nombre1,$correo,$contra);
                $stmt->execute();
                if ($stmt->affected_rows == 1) {
                    $respuesta =  array(
                        "respuesta" => "correcto",
                    );
                } else {
                    $respuesta =  array(
                        "respuesta" => "error",
                    );
                }
            } catch (Exception $e) {
                $respuesta = array(
                    $e->getMessage()
                );
            }
        } else {
            $respuesta = array(
                "respuesta" => "existe",
                "correo"=>"$correo"
            );
        }
    } else {
        $respuesta = array(
            "respuesta" => "correoDistinto",
        );
    }
    echo json_encode($respuesta);


} else {
    echo "<script>
        alert('USTED NO TIENE ACCESO A ESTE CONTENIDO');
        window.location = '../index.php';
        </script>";
    die();
}
