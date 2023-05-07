<?php
require_once("conexion.php");
$eliminarDoc = filter_var(file_get_contents("php://input"), FILTER_SANITIZE_NUMBER_INT);
$elimArc = $conexion->query("SELECT * FROM docEmpresa WHERE Id_usuario='$eliminarDoc'");
while ($row = $elimArc->fetch_assoc()) {
    $actaCos = $row["acta_constitutiva"];
    $carpetaactaCos = '../docs/docempresa/actaCos/';
    unlink($carpetaactaCos . $actaCos);
    #rfc
    $rfc = $row["rfc"];
    $carpetarfc = '../docs/docempresa/rfc/';
    unlink($carpetarfc . $rfc);
    #acta
    $regis = $row["regisPubEmpr"];
    $carpetaregis = '../docs/docempresa/registroPeb/';
    unlink($carpetaregis . $regis);
    #curp  
    $cuenta = $row["cuentaBancaria"];
    $carpetacuenta = '../docs/docempresa/cuentaBan/';
    unlink($carpetacuenta . $cuenta);
    #rfc
    $certificado = $row["certificadoEmprGro"];
    $carpetacertificado = '../docs/docempresa/certificado/';
    unlink($carpetacertificado . $certificado);
}
$eliminar = $conexion->query("DELETE FROM docEmpresa WHERE Id_usuario='$eliminarDoc'");
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
