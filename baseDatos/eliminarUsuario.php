<?php
require_once("conexion.php");
$eliminarusuario = filter_var(file_get_contents("php://input"),FILTER_SANITIZE_NUMBER_INT);
$eliminar=$conexion->query("DELETE FROM usuario WHERE Id_usuario='$eliminarusuario'");
if($eliminar){
    $respuesta = array(
        "respuesta"=>"correcto"
    );
}else{
    $respuesta = array(
        "respuesta"=>"error"
    );
}


echo json_encode($respuesta);
?>