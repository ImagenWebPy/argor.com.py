<?php
ob_start();
session_start();

#incluimos los archivos de conexion a la BD y funciones
include 'conexiones-db.php';
if (!empty($_POST['user'])) {
    $user = input_special($_POST['user']);
    $password = input_special($_POST['password']);
    #Verificamos si el email existe en la tabla
    $sqlUsuario = "SELECT * FROM users WHERE user = '$user'";
    $db->setQuery($sqlUsuario);
    $usuario = $db->loadObject();
    #Verificamos la contraseña ingresada con la alamcenada
    if (crypt($password, $usuario->pass) == $usuario->pass) {
        echo 'hola';
        $_SESSION['TOKEN'] = md5(uniqid(microtime(), true));
        $_SESSION['USER'] = array('name' => $usuario->name, 'email' => $usuario->email, 'user' => $usuario->user, 'img' => $usuario->img);
        var_dump($_SESSION);
        header('Location:index.php');
    }else{
        echo 'Error, usuario y/o contraseña no coinciden';
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Administrador ARGOR | Ingresar</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="#"><b>Administrador</b> ARGOR</a>
            </div><!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Inicie sesión para ingresar al administrador</p>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="form-group has-feedback">
                        <input type="text" name="user" class="form-control" placeholder="Usuario`">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="password" class="form-control" placeholder="Contraseña">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">

                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat" name="login">Ingresar</button>
                        </div><!-- /.col -->
                    </div>
                </form>
                <a href="#" data-toggle="modal" data-target="#forgotPass" role="button">¿Olvide mi contraseña?</a><br>
            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->
        <!-- Modal -->
        <div class="modal fade" id="forgotPass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Recuperar mi Contraseña</h4>
                    </div>
                    <form id="frm-forgotPass" action="ajax/recuperar-pass-ajax.php">
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="emailPass">Dirección de Email:</label>
                                <input type="email" class="form-control" id="emailPass" name="emailPass" placeholder="Email">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary" id="btn-forgotPass">Enviar Contraseña</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- jQuery 2.1.4 -->
        <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="plugins/iCheck/icheck.min.js"></script>
        <script>
            $(function () {
                $("#btn-forgotPass").click(function () {
                    var formData = new FormData($("#frm-forgotPass")[0]);
                    var ruta = "ajax/recuperar-pass-ajax.php";
                    $.ajax({
                        url: ruta,
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (datos)
                        {
                            location.reload();
                        }
                    });
                });
            });
        </script>
    </body>
</html>
<?php ob_end_flush(); ?>