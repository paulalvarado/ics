<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ICS | Iniciar sesión</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a class="h1"><b>Admin</b>ICS</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Regístrese para iniciar su sesión</p>

                <form>
                    <div class="input-group mb-3">
                        <input name="username" type="text" class="form-control" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="password" type="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-7">
                        </div>
                        <!-- /.col -->
                        <div class="col-5">
                            <a id="submit" class="btn btn-primary btn-block">Iniciar sesión</a>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.min.css">
    <!-- Styles -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/style.css">
    <script>
        $(document).ready(function() {
            $('#submit').click(function() {
                $.post('<?= base_url() ?>login/login', {
                    username: $('form input[name="username"]').val(),
                    password: $('form input[name="password"]').val()
                }).always(function(data) {
                    if (JSON.parse(data).user == 'Usuario no encontrado' || JSON.parse(data).pass == 'Contraseña incorrecta') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Error: ' + JSON.parse(data).user + ' - Error:' + JSON.parse(data).pass
                        })
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Ready',
                            text: 'Acceso consedido'
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                $(location).prop('href', '<?= base_url() ?>')
                            }
                        })
                    }
                })
            })
        })
    </script>
</body>

</html>