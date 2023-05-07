<?php
require_once("conexion.php");
$eliminarDoc = filter_var(file_get_contents("php://input"), FILTER_SANITIZE_NUMBER_INT);
$elimArc = $conexion->query("SELECT * FROM docpersonal WHERE Id_usuario='$eliminarDoc'");
while ($row = $elimArc->fetch_assoc()) {
    $ine = $row["ine"];
    $carpetaine = '../docs/dtpersonal/ine/';
    unlink($carpetaine . $ine);
    #acta
    $acta = $row["acta_nacimeinto"];
    $carpetaAct = '../docs/dtpersonal/Acta/';
    unlink($carpetaAct . $acta);
    #curp  
    $curp = $row["curp"];
    $carpetacurp = '../docs/dtpersonal/curp/';
    unlink($carpetacurp . $curp);
    #rfc
    $rfc = $row["rfc"];
    $carpetarfc = '../docs/dtpersonal/rfc/';
    unlink($carpetarfc . $rfc);
    #rfc
    $domicilio = $row["comprobante_domi"];
    $carpetadomicilio = '../docs/dtpersonal/domicilio/';
    unlink($carpetadomicilio . $domicilio);
}
$eliminar = $conexion->query("DELETE FROM docpersonal WHERE Id_usuario='$eliminarDoc'");
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
