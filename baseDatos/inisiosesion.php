<?php
include("conexion.php");
$correo = filter_var($_POST["correo"], FILTER_SANITIZE_EMAIL);
$password = filter_var($_POST["pass"], FILTER_SANITIZE_STRING);
$usuario = $conexion->query("SELECT * from usuario where correo='$correo'");
//hacemo un arreglo asociativo con los dats que sean del correo 
if ($usuario->num_rows == 1) {
  $datos = $usuario->fetch_assoc();
}
$consulta = "SELECT * from usuario where correo='$correo'";
$query = mysqli_query($conexion, $consulta);
#se crea una variable con el numero de filas para arrogar que existe el usuario
$existe = mysqli_num_rows($query);
if ($existe > 0) {
#se recorre la solicitud a los datoa del usuario obteniendo contraseña, nombre,Id del tipo, Id del usuario
while ($rows = mysqli_fetch_assoc($query)) {
    $contr = $rows['password'];
    $diri = $rows['Id_tipo'];
    $nobreU = $rows["nombre_usuario"];
    $solinoti = $rows['Id_usuario'];
  }
  #se obtiene la fecha actual de la sona mexico
  date_default_timezone_set("America/Mexico_City");
  $fecha_Actual = date("Y-m-d");
  #Se crea el nombre para la cookie que bloqueare el proceso de sesion
  $bloquear = str_replace(' ', '', $nobreU);
  #bloqueado por 1 min
  if (isset($_COOKIE["block" . $bloquear])) {
    $respuesta = array(
        "respuesta" => "bloquenoti",
        "titulo" => "TU CUENTA SE A BLOQUEADO DURANTE 1 MIN",
        "cuerpo" => "$correo INICIA SESION DESPUES DE 1 MIN",
        "alerta" => "warning"
     );
}else{
    if (password_verify($password, $contr)) {
      session_start();
      $_SESSION['nombre_usuario'] = $datos;
      #Datos Sin pedidos
        $respuesta = array(
            "respuesta" => "contraBien",
            "titulo" => "$nobreU",
            "cuerpo" => "BIENVENIDO PUEDES VISUALIZAR ENTRE LA GRAN VARIEDAD DE LIBROS DISPONIBLES",
            "direccion" => "$diri",
            "alerta" => "succsses"
        );
    } else {
        $respuesta = array(
            "respuesta" => "contraMal",
            "titulo" => "$nobreU",
            "cuerpo" => "LA CONTRASEÑA ES INCORRECTA PARA PODER INCIAR SESION INTRODUCE TU CONTRASEÑA",
            "alerta" => "question"
         );
     if (isset($_COOKIE["$bloquear"])) {
      $cont = $_COOKIE["$bloquear"];
      $cont++;
      setcookie($bloquear, $cont, time() + 120);
      if ($cont >= 3) {
        setcookie("block" . $bloquear, $cont, time() + 60);
        $respuesta = array(
            "respuesta" => "bloqueo",
            "titulo" => "HAS FALLADO 3 INTNTOS DE CONTRASEÑA ",
            "cuerpo" => "$correo TU CUENTA SE BLOQUEARA DURANTE 1 MIN",
            "alerta" => "warning"
         );
        }
    } else {
      setcookie($bloquear, 1, time() + 120);
    }
    }
  }
}else {
  $correom = strtoupper($correo);
  $respuesta = array(
    "respuesta" => "NoExiste",
    "titulo" => "LO SENTIMOS USTED DEBE REGUSTRARSE",
    "cuerpo" => "$correo NO EXISTE",
    "alerta" => "error"
);

}

echo json_encode($respuesta);
