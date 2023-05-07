<?php
require_once("conexion.php");
$id=mysqli_real_escape_string($conexion,filter_var($_POST["idUsuario"],FILTER_SANITIZE_NUMBER_INT));
$nombre=mysqli_real_escape_string($conexion,filter_var(strtolower($_POST["EditarNombre"]),FILTER_SANITIZE_STRING));
$numero=mysqli_real_escape_string($conexion,filter_var($_POST["EditarNumero"],FILTER_SANITIZE_NUMBER_INT));
$nombre1 = ucwords($nombre);
try{
    $editar = $conexion->query("UPDATE usuario SET nombre_usuario='$nombre1',numero_telefono='$numero' WHERE Id_usuario='$id'");
    if($editar){
        $respueta = array(
            "respuesta"=> "correcto",
            "nombre"=>"$nombre",
            "numero"=>"$numero"
        );
    }
    }
    catch(Exception $e){
     $respueta = array(
         "respuesta"=>"error" 
        );
    };
echo json_encode($respueta);
?>