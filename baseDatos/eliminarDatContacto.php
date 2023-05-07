<?php
require_once("conexion.php");
$eliminarDoc = filter_var(file_get_contents("php://input"), FILTER_SANITIZE_NUMBER_INT);
$elimArc = $conexion->query("SELECT * FROM contacto WHERE Id_usuario='$eliminarDoc'");
while ($row = $elimArc->fetch_assoc()) {
    $cliente = $row["contactoCliente"];
    $carpetacliente = '../docs/docontacto/cliente/';
    unlink($carpetacliente . $cliente);
    #rfc
    $colaborador = $row["contactoColabo"];
    $carpetacolaborador = '../docs/docontacto/colaborador/';
    unlink($carpetacolaborador . $colaborador);
    #acta
    $renta = $row["contactoRenta"];
    $carpetarenta = '../docs/docontacto/renta/';
    unlink($carpetarenta . $renta);
    #curp  
    $provedor = $row["contactoProve"];
    $carpetaprovedor = '../docs/docontacto/provedor/';
    unlink($carpetaprovedor . $provedor);
   
}
$eliminar = $conexion->query("DELETE FROM contacto WHERE Id_usuario='$eliminarDoc'");
if ($eliminar) {
    $respuesta = array(
        "respuesta" => "correcto"
    );
} else {
    $respuesta = array(
        "respuesta" => "error"
    );
}


echo json_encode($respuesta);
