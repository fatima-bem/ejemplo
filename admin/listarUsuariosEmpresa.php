<table class="table table-dark">
    <thead>
        <th class="">Correo</th>
        <th class="">Nombre</th>
        <th class="">Seleccionar</th>
    </thead>
    <?php
    require_once("../baseDatos/conexion.php");
    $consult = $conexion->query("SELECT * FROM usuario");
    while ($row = $consult->fetch_assoc()) {

    ?>
        <tbody>
            <tr>
                <td><?php echo $row["correo"]; ?></td>
                <td><?php echo $row["nombre_usuario"]; ?></td>
                <td>
                  <!-- Se envia el id de cada apartado -->
                <a href="formEmpresa.php?Id_User=<?php echo $row["Id_usuario"]?>"
                  class=""><input type="submit"class="btn btn-primary"  value="Select"></a>
                <a href="#?id="></a>
              </td>
            </tr>

        </tbody>
    <?php
    }
    ?>
</table>