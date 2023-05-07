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

if(isset($_GET['acta']) && isset($_GET["corr"])){
?>
    <div class="container" style="margin-top:2%;">
    <h4>Comporbante de domicilio Personal de <?php echo $_GET["corr"] ?></h4>
        <iframe src="../docs/docempresa/actaCos/<?php echo $_GET["acta"] ?>" style="margin-top:2%; width:100%; height: 480px;"
            frameborder="0"></iframe>
    </div>
    <?php
exit;
}else if(isset($_GET["rfc"]) && isset($_GET["corr"])){
    ?>
    <div class="container" style="margin-top:2%;">
    <h4>INE Personal de <?php echo $_GET["corr"] ?></h4>
        <iframe src="../docs/docempresa/rfc/<?php echo $_GET["rfc"]; ?>" style="margin-top:2%; width:100%; height: 480px;"
            frameborder="0"></iframe>
    </div>
    <?php
exit;
}else if(isset($_GET["regis"]) && isset($_GET["corr"])){
   ?>
    <div class="container" style="margin-top:2%;">
    <h4>Acta de NAcimiento Personal de <?php echo $_GET["corr"] ?></h4>
        <iframe src="../docs/docempresa/registroPeb/<?php echo $_GET["regis"]; ?>" style="margin-top:2%; width:100%; height: 480px;"
            frameborder="0"></iframe>
    </div>
    <?php
exit;
}else if(isset($_GET["cuenta"]) && isset($_GET["corr"])){
    ?>
    <div class="container" style="margin-top:2%;">
    <h4>RFC Personal de <?php echo $_GET["corr"] ?></h4>
        <iframe src="../docs/docempresa/cuentaBan/<?php echo $_GET["cuenta"]; ?>" style="margin-top:2%; width:100%; height: 500px;"
            frameborder="0"></iframe>
    </div>
    <?php
exit;
}else if(isset($_GET["certi"]) && isset($_GET["corr"])){
    ?>
    <div class="container" style="margin-top:2%;">
    <h4>Curp Personal de <?php echo $_GET["corr"] ?></h4>
        <iframe src="../docs/docempresa/certificado/<?php echo $_GET["certi"]; ?>" style="margin-top:2%; width:100%; height: 480px;"
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