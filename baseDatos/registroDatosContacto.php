<?php
require_once("conexion.php");
$user = mysqli_real_escape_string($conexion, $_POST["id"]);
$cliente = $_FILES["cliente"];
$colaborador = $_FILES["colaborador"];
$renta = $_FILES["renta"];
$provedor = $_FILES["provedor"];

if (empty($cliente) || empty($colaborador) || empty($renta)  || empty($provedor)) {
    echo "<script>
        alert('USTED NO TIENE ACCESO A ESTE CONTENIDO');
        window.location = '../index.php';
        </script>";
    die();
}

$DocUsu = $conexion->query("SELECT * FROM contacto WHERE Id_usuario = '$user'");
if ($DocUsu->num_rows == 1) {
    $respuesta = array(
        "respuesta" => "existe"
    );
} else {
    #verificacion de la carpeta existe
    $carpetacliente = '../docs/docontacto/cliente/';
    #creacion de carpeta en caso de no existir
    if (!is_dir($carpetacliente)) {
        mkdir($carpetacliente);
    }
    // crear nombre para el documento
    $nombrecliente = md5(uniqid(rand(), true)) . ".pdf";
    move_uploaded_file($cliente["tmp_name"], $carpetacliente . $nombrecliente);

    #verificacion de la carpeta existe
    $carpetarcolaborador = '../docs/docontacto/colaborador/';
    #creacion de carpeta en caso de no existir
    if (!is_dir($carpetarcolaborador)) {
        mkdir($carpetarcolaborador);
    }
    // crear nombre para el documento
    $nombrecolaborador = md5(uniqid(rand(), true)) . ".pdf";
    move_uploaded_file($colaborador["tmp_name"], $carpetarcolaborador . $nombrecolaborador);

    #verificacion de la carpeta existe
    $carpetarenta = '../docs/docontacto/renta/';
    #creacion de carpeta en caso de no existir
    if (!is_dir($carpetarenta)) {
        mkdir($carpetarenta);
    }
    // crear nombre para el documento
    $nombrerenta = md5(uniqid(rand(), true)) . ".pdf";
    move_uploaded_file($renta["tmp_name"], $carpetarenta. $nombrerenta);

    #verificacion de la carpeta existe
    $carpetaprovedor = '../docs/docontacto/provedor/';
    #creacion de carpeta en caso de no existir
    if (!is_dir($carpetaprovedor)) {
        mkdir($carpetaprovedor);
    }
    // crear nombre para el documento
    $nombreprovedor = md5(uniqid(rand(), true)) . ".pdf";
    move_uploaded_file($provedor["tmp_name"], $carpetaprovedor . $nombreprovedor);


    try {
        $stmt = $conexion->prepare("INSERT INTO contacto(Id_usuario,contactoCliente,contactoColabo,contactoRenta,contactoProve) VALUES (?,?,?,?,?)");
        $stmt->bind_param("issss", $user, $nombrecliente, $nombrecolaborador, $nombrerenta, $nombreprovedor);
        $stmt->execute();
        if ($stmt->affected_rows == 1) {
            $respuesta = array(
                "respuesta" => "correcto"
            );
        } else {
            $respuesta = array(
                "respuesta" => "error"
            );
        }
        $stmt->close();
        $conexion->close();
    } catch (Exception $e) {
        $respuesta = array(
            $e->getMessage()
        );
    }
}
echo json_encode($respuesta);
