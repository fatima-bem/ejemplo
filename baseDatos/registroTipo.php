<?php
require_once("conexion.php");

#rescibimiento de tipo 
$tipo = mysqli_real_escape_string($conexion, filter_var(ucwords($_POST['Tipo']), FILTER_SANITIZE_STRING));
if(empty($tipo)){
$respuesta = array(
    "respuesta" => "vacio"
);
}
if (isset($_POST)){
#consulta de verificacion para nombre
$verifica = $conexion->query("SELECT * FROM tipo where nombreTipo='$tipo'");
if ($verifica->num_rows == 0) {
    try {
        #solicitud la preparacion de los datos 
        $stmt = $conexion->prepare("INSERT INTO tipo(nombreTipo) VALUE (?)");
        $stmt->bind_param("s", $tipo);
        $stmt->execute();
        if ($stmt->affected_rows == 1) {
            $respuesta=  array(
                "respuesta"=>"correcto",
            );
            #notifiUnaDireccion($tipo, "TIPO REGISTRADO CORRECTAMENTE", "../admin/formTipo.php");
        } else {
            $respuesta=  array(
                "respuesta"=>"error",
            );
           # notifiUnaDireccion("ERROR", "EXISTIO UN PROBLEMA AL INSERTAR EL TIPO", "../admin/formTipo.php");
        }
    } catch (Exception $e) {
        $respuesta = array(
            $e->getMessage()
        );
    }
} else {
    $respuesta = array(
        "respuesta" => "existe",
    );
}
}else{
    echo "<script>
    alert('USTED NO TIENE ACCESO A ESTE CONTENIDO');
    window.location = '../index.php';
    </script>";
    die();
}
echo json_encode($respuesta);