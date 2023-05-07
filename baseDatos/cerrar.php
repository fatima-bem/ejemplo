<head>
    <link rel="stylesheet" href="../sweetalert/dist/sweetalert2.min.css">
</head>
<?php
session_start();
session_destroy();
error_reporting(0);
$existe = $_SESSION['nombre_usuario'];
if ($existe == null || $existe = '') {
    // window.location diregue al lugar deseado
    echo '<script>
    alert("Usted no tiene acceso al contenido");
    window.location = "../index.php"; 
    </script>';
    die();
}
$nombre = $_SESSION['nombre_usuario']['nombre_usuario'];
notificacionComun("success", "$nombre", "SU SESION FUE CERRADA INICIE SESIÓN NUEVAMENTE PARA PODER REALIZAR NUEVOS CAMBIOS", "../index.php");
#notificacion
function notificacionComun($tipo, $titulo, $texto, $ubicacion)
{
  echo "<script languaje='javascript'>
window.onload = function alerta(){
 Swal.fire({
 icon: '$tipo',
 title: '$titulo',
 text: '$texto',
 confirmButtonText: 'Aceptar'
}).then(function() {
    window.location = '$ubicacion';
});
}
</script>";
}
?>
<script src="../sweetalert/dist/sweetalert2.all.min.js"></script>