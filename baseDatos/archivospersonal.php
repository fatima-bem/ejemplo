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

if(isset($_GET['compro']) && isset($_GET["corr"])){
$comrpo=$_GET["compro"];
?>
    <div class="container" style="margin-top:2%;">
    <h4>Comporbante de domicilio Personal de <?php echo $_GET["corr"] ?></h4>
        <iframe src="../docs/dtpersonal/domicilio/<?php echo $comrpo; ?>" style="margin-top:2%; width:100%; height: 480px;"
            frameborder="0"></iframe>
    </div>
    <?php
exit;
}else if(isset($_GET["Ine"]) && isset($_GET["corr"])){
    $ine = $_GET["Ine"];
    ?>
    <div class="container" style="margin-top:2%;">
    <h4>INE Personal de <?php echo $_GET["corr"] ?></h4>
        <iframe src="../docs/dtpersonal/ine/<?php echo $ine; ?>" style="margin-top:2%; width:100%; height: 480px;"
            frameborder="0"></iframe>
    </div>
    <?php
exit;
}else if(isset($_GET["acta"]) && isset($_GET["corr"])){
   $acta = $_GET["acta"];
   ?>
    <div class="container" style="margin-top:2%;">
    <h4>Acta de NAcimiento Personal de <?php echo $_GET["corr"] ?></h4>
        <iframe src="../docs/dtpersonal/Acta/<?php echo $acta; ?>" style="margin-top:2%; width:100%; height: 480px;"
            frameborder="0"></iframe>
    </div>
    <?php
exit;
}else if(isset($_GET["rfc"]) && isset($_GET["corr"])){
   $rfc = $_GET["rfc"];
    ?>
    <div class="container" style="margin-top:2%;">
    <h4>RFC Personal de <?php echo $_GET["corr"] ?></h4>
        <iframe src="../docs/dtpersonal/rfc/<?php echo $rfc; ?>" style="margin-top:2%; width:100%; height: 500px;"
            frameborder="0"></iframe>
    </div>
    <?php
exit;
}else if(isset($_GET["curp"]) && isset($_GET["corr"])){
    $curp = $_GET["curp"];
    ?>
    <div class="container" style="margin-top:2%;">
    <h4>Curp Personal de <?php echo $_GET["corr"] ?></h4>
        <iframe src="../docs/dtpersonal/curp/<?php echo $curp; ?>" style="margin-top:2%; width:100%; height: 480px;"
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