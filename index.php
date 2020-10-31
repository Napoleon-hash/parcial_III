<?php
include './controllers/procesos.php';

    del();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="./public/css/bootstrap.min.css">
        <link rel="stylesheet" href="./public/css/bootstrap-theme.css">
        <link rel="stylesheet" href="./public/css/estilo.css">
        <!--JS -->
        <script src="./public/js/jquery-3.5.1.slim.min.js"></script>
        <script src="./public/js/jquery-1.9.1.min.js"></script>
        <script src="./public/js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/05f4903dc9.js" crossorigin="anonymous"></script>
    </head>
    <body class="bodylogin">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="d-none d-sm-none d-md-block">
                        <div class="contenlogin">
                            <div class="login">
                                <div style="text-align: center;white-space: normal; color: white;">
                                    <h3><b>Bienvenidos/as</b></h3>
                                </div>
                                <div style="text-align: center;white-space: normal;margin: 10px auto;">
                                    <img src="./public/img/logos/logo.png" width="150px" alt="Logo">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contenlogin">
                        <div class="login">
                            <div class="d-block d-sm-block d-md-none">
                                <div style="text-align: center;white-space: normal; color: white;">
                                    <h3><b>Bienvenidos/as</b></h3>
                                </div>
                                <div style="text-align: center;white-space: normal;margin: 10px auto;">
                                    <img src="./public/img/logos/logo.png" width="150px" alt="Logo">
                                </div>
                            </div>
                            <?php if (isset($_GET['mensaje'])): ?>
                            <div class="alert alert-danger">
                                <?php  
                                echo $msj = base64_decode($_GET['mensaje']);
                                ?>
                            </div>
                            <?php endif ?>
                            <form action="./controllers/controller_login.php" method="POST" class="border p-3 formlogin">
                                <div style="color: white;text-align: center;font-weight: bold;white-space: normal;margin: 10px auto;">
                                    El usuario y la contraseña son los placeholder.
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="fas fa-user"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="user" class="form-control" placeholder="napoleon" autocomplete="off" required>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="fas fa-key"></i>
                                        </span>
                                    </div>
                                    <input type="password" name="passw" class="form-control" placeholder="12345"  autocomplete="off" required>
                                </div>
                                <div>
                                    <button class="btn btn-success centrado boton" name="acclogin">Acceder</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>