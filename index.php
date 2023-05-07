<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="sweetalert/dist/sweetalert2.css">
    <title>Iniciar Sesión</title>
</head>

<body class="">
    <div class="container">
        <div class="row" style="justify-content: center;">
            <div class="col-sm-6 col-md-6" style="margin-top:2%;">
            <form action="#" class="formu" id="iniciar">
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo</label>
                        <input type="text" class="form-control" placeholder="Introduce Correo" name="correo" id="correo"
                            aria-describedby="emailHelp">
                        <label for="pass" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" placeholder="Introduce contraseña" name="pass" id="pass">
                    </div>
                    <div class="centrar ">
                        <button type="submit" class="btn btn-primary" id="entrar">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
    <script src="js/inicar.js"></script>
    <script src="sweetalert/dist/sweetalert2.all.min.js"></script>
</body>

</html>