<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <?php

if(isset($_GET['cliente']) && isset($_GET["corr"])){
?>
    <div class="container" style="margin-top:2%;">
    <h4>Contacto Cliente de <?php echo $_GET["corr"] ?></h4>
        <iframe src="../docs/docontacto/cliente/<?php echo $_GET["cliente"] ?>" style="margin-top:2%; width:100%; height: 480px;"
            frameborder="0"></iframe>
    </div>
    <?php
exit;
}else if(isset($_GET["colabo"]) && isset($_GET["corr"])){
    ?>
    <div class="container" style="margin-top:2%;">
    <h4>Contacto Colaborador de <?php echo $_GET["corr"] ?></h4>
        <iframe src="../docs/docontacto/colaborador/<?php echo $_GET["colabo"]; ?>" style="margin-top:2%; width:100%; height: 480px;"
            frameborder="0"></iframe>
    </div>
    <?php
exit;
}else if(isset($_GET["renta"]) && isset($_GET["corr"])){
   ?>
    <div class="container" style="margin-top:2%;">
    <h4>Contacto Renta de <?php echo $_GET["corr"] ?></h4>
        <iframe src="../docs/docontacto/renta/<?php echo $_GET["renta"]; ?>" style="margin-top:2%; width:100%; height: 480px;"
            frameborder="0"></iframe>
    </div>
    <?php
exit;
}else if(isset($_GET["prove"]) && isset($_GET["corr"])){
    ?>
    <div class="container" style="margin-top:2%;">
    <h4>Contacto Proveedor de <?php echo $_GET["corr"] ?></h4>
        <iframe src="../docs/docontacto/provedor/<?php echo $_GET["prove"]; ?>" style="margin-top:2%; width:100%; height: 500px;"
            frameborder="0"></iframe>
    </div>
    <?php
exit;
}{
    echo "no hay datos";
}

?>


    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
</body>

</html>