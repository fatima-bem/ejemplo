<?php
require_once("conexion.php");
$user = mysqli_real_escape_string($conexion, $_POST["id"]);
$curp = $_FILES["curp"];
$ine = $_FILES["ine"];
$Acta = $_FILES["Acta"];
$rfc = $_FILES["rfc"];
$domicilio = $_FILES["domicilio"];

    if (empty($user) || empty($curp) || empty($ine) || empty($Acta) || empty($rfc)) {
        echo "<script>
        alert('USTED NO TIENE ACCESO A ESTE CONTENIDO');
        window.location = '../index.php';
        </script>";
        die();
    }
    
$DocUsu=$conexion->query("SELECT * FROM docPersonal WHERE Id_usuario = '$user'");
if($DocUsu->num_rows == 1){
    $respuesta= array(
        "respuesta"=>"existe"
    );
}else{
    #verificacion de la carpeta existe
    $carpetaine = '../docs/dtpersonal/ine/';
    #creacion de carpeta en caso de no existir
    if (!is_dir($carpetaine)) {
        mkdir($carpetaine);
    }
    // crear nombre para el documento
    $nombreine = md5(uniqid(rand(), true)) . ".pdf";
    move_uploaded_file($ine["tmp_name"], $carpetaine . $nombreine);
    
    #verificacion de la carpeta existe
    $carpetacurp = '../docs/dtpersonal/curp/';
    #creacion de carpeta en caso de no existir
    if (!is_dir($carpetacurp)) {
        mkdir($carpetacurp);
    }
    // crear nombre para el documento
    $nombrecurp = md5(uniqid(rand(), true)) . ".pdf";
    move_uploaded_file($curp["tmp_name"], $carpetacurp . $nombrecurp);
  
    #verificacion de la carpeta existe
    $carpetaActa = '../docs/dtpersonal/Acta/';
    #creacion de carpeta en caso de no existir
    if (!is_dir($carpetaActa)) {
        mkdir($carpetaActa);
    }
    // crear nombre para el documento
    $nombreActa = md5(uniqid(rand(), true)) . ".pdf";
    move_uploaded_file($Acta["tmp_name"], $carpetaActa . $nombreActa);
    
    #verificacion de la carpeta existe
    $carpetarfc = '../docs/dtpersonal/rfc/';
    #creacion de carpeta en caso de no existir
    if (!is_dir($carpetarfc)) {
        mkdir($carpetarfc);
    }
    // crear nombre para el documento
    $nombrerfc = md5(uniqid(rand(), true)) . ".pdf";
    move_uploaded_file($rfc["tmp_name"], $carpetarfc . $nombrerfc);
    
    #verificacion de la carpeta existe
    $carpetadomicilio = '../docs/dtpersonal/domicilio/';
    #creacion de carpeta en caso de no existir
    if (!is_dir($carpetadomicilio)) {
        mkdir($carpetadomicilio);
    }
    // crear nombre para el documento
    $nombredomicilio = md5(uniqid(rand(), true)) . ".pdf";
    move_uploaded_file($domicilio["tmp_name"], $carpetadomicilio . $nombredomicilio);
    
    try {
        $stmt = $conexion->prepare("INSERT INTO docPersonal(Id_usuario,ine,curp,acta_nacimeinto,rfc,comprobante_domi) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("isssss",$user,$nombreine,$nombrecurp,$nombreActa,$nombrerfc,$nombredomicilio);
        $stmt->execute();
        if ($stmt->affected_rows == 1) {
            $respuesta= array(
                "respuesta"=>"correcto"
            );
        } else {
            $respuesta= array(
                "respuesta"=>"error"
            );
        }
        $stmt->close();
        $conexion->close();
    } catch (Exception $e) {
        $respuesta= array(
            $e->getMessage()
        );
    }
}
echo json_encode($respuesta);
?>