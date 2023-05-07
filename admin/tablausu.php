<?php 
      require_once("../baseDatos/conexion.php");
      $infUsu=$conexion->query("SELECT * FROM usuario");
      while ($row = $infUsu->fetch_assoc()) {
      echo "
      <tr>
      <td>".$row['nombre_usuario']."</td>
      <td>".$row['correo']."</td>
      <td>".$row['numero_telefono']."</td>
      <td><input type='submit' value='Editar' onclick=editarUsu('".$row["Id_usuario"]."')  class='btn btn-success'></td>
      <td><input type='submit' value='Eliminar' onclick=eliminarUsu('".$row["Id_usuario"]."') class='btn btn-danger'></td>
      </tr>";
       }

?>
