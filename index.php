<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ecommerce</title>
    <link rel="stylesheet" href="assets/css/material-dashboard.css">
    <script src="assets/js/core/jquery.min.js"></script>
</head>

<body>
    <div class="wrapper ">
        <div class="main-panel">
            <div class="content">
                <div class="container-fluid">
                    <h2><strong>INICIO DE SESIÓN</strong></h2>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">Correo electrónico</label>
                                <input type="email" id="correo" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">Contraseña</label>
                                <input type="password" id="contrasena" class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
                <button id="login" class="btn btn-info">Login</button>
                <button id="registrar" class="btn btn-success">Registrar</button>
            </div>

        </div>
    </div>
    </div>

    <!-- script firebase -->
    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/6.1.1/firebase-app.js"></script>

    <!-- Add additional services that you want to use -->
    <script src="https://www.gstatic.com/firebasejs/5.9.1/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.9.1/firebase-database.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.9.1/firebase-firestore.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.9.1/firebase-messaging.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.9.1/firebase-functions.js"></script>

    <script src="assets/js/app.js"></script>

    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap-material-design.min.js"></script>
    <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/js/plugins/moment.min.js"></script>
    <script src="assets/js/material-dashboard.js?v=2.1.1"></script>
</body>

</html>