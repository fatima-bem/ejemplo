<?php 
      require_once("../baseDatos/conexion.php");
      $editar = filter_var(file_get_contents("php://input"),FILTER_SANITIZE_NUMBER_INT);
      $infUsu=$conexion->query("SELECT * FROM usuario WHERE Id_usuario='$editar'");
      while ($row = $infUsu->fetch_assoc()) {
            $nombre=$row["nombre_usuario"];
            $numero=$row["numero_telefono"];
      }
      if($infUsu){
            $respuesta=array(
                  "id"=>"$editar",
                  "nombre"=>"$nombre",
                  "numero"=>"$numero"
            );
      }
      echo json_encode($respuesta);

?>
