<?php
require_once("conexion.php");
$user = mysqli_real_escape_string($conexion, $_POST["id"]);
$actacos = $_FILES["actacos"];
$regis = $_FILES["regis"];
$certi = $_FILES["certi"];
$rfc = $_FILES["rfc"];
$cuenta = $_FILES["cuenta"];

    if (empty($actacos) || empty($regis) || empty($cuenta)  || empty($rfc)) {
        echo "<script>
        alert('USTED NO TIENE ACCESO A ESTE CONTENIDO');
        window.location = '../index.php';
        </script>";
        die();
    }
 
$DocUsu=$conexion->query("SELECT * FROM docEmpresa WHERE Id_usuario = '$user'");
if($DocUsu->num_rows == 1){
    $respuesta= array(
        "respuesta"=>"existe"
    );
}else{
   #verificacion de la carpeta existe
   $carpetaactacos = '../docs/docempresa/actaCos/';
   #creacion de carpeta en caso de no existir
   if (!is_dir($carpetaactacos)) {
       mkdir($carpetaactacos);
   }
   // crear nombre para el documento
   $nombreactacos = md5(uniqid(rand(), true)) . ".pdf";
   move_uploaded_file($actacos["tmp_name"], $carpetaactacos . $nombreactacos);
   
    #verificacion de la carpeta existe
    $carpetarregis = '../docs/docempresa/registroPeb/';
    #creacion de carpeta en caso de no existir
    if (!is_dir($carpetarregis)) {
        mkdir($carpetarregis);
    }
    // crear nombre para el documento
    $nombreregis = md5(uniqid(rand(), true)) . ".pdf";
    move_uploaded_file($regis["tmp_name"],$carpetarregis . $nombreregis);
   
    #verificacion de la carpeta existe
    $carpetarcerti = '../docs/docempresa/certificado/';
    #creacion de carpeta en caso de no existir
    if (!is_dir($carpetarcerti)) {
        mkdir($carpetarcerti);
    }
    // crear nombre para el documento
    $nombrercerti = md5(uniqid(rand(), true)) . ".pdf";
    move_uploaded_file($certi["tmp_name"], $carpetarcerti . $nombrercerti);
     
    #verificacion de la carpeta existe
      $carpetarfc = '../docs/docempresa/rfc/';
      #creacion de carpeta en caso de no existir
      if (!is_dir($carpetarfc)) {
          mkdir($carpetarfc);
      }
      // crear nombre para el documento
      $nombrerfc = md5(uniqid(rand(), true)) . ".pdf";
      move_uploaded_file($rfc["tmp_name"], $carpetarfc . $nombrerfc);
      
    #verificacion de la carpeta existe
    $carpetacuenta = '../docs/docempresa/cuentaBan/';
    #creacion de carpeta en caso de no existir
    if (!is_dir($carpetacuenta)) {
        mkdir($carpetacuenta);
    }
    // crear nombre para el documento
    $nombrecuenta = md5(uniqid(rand(), true)) . ".pdf";
    move_uploaded_file($cuenta["tmp_name"], $carpetacuenta . $nombrecuenta);
    
    try {
        $stmt = $conexion->prepare("INSERT INTO docempresa(Id_usuario,acta_constitutiva,rfc,regisPubEmpr,cuentaBancaria,certificadoEmprGro) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("isssss",$user,$nombreactacos,$nombrerfc,$nombreregis,$nombrecuenta,$nombrercerti);
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