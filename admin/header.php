<?php
session_start();
#incluimos los archivos de conexion a la BD y funciones
include 'conexiones-db.php';
#verificamos si el usuario esta logueado
if ((!isset($_SESSION['TOKEN'])) && (!isset($_SESSION['USER']))) {
    header('Location:login.php');
    exit();
}
define('IMAGE_PRODUCT', getUrl() . '/img/productos');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Administrador ARGOR</title>
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
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
        <!-- Morris chart -->
        <link rel="stylesheet" href="plugins/morris/morris.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <!-- Date Picker -->
        <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- jQuery 2.1.4 -->
        <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <script src="dist/js/html5fileupload.min.js"></script>
        
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="index.php" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>ARGOR</b></span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Administrador</b> ARGOR</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Navegación</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <?php if (!empty($_SESSION['USER']['img'])): ?>
                                        <img src="dist/img/<?php echo $_SESSION['USER']['img']; ?>" class="user-image" alt="User Image">
                                    <?php else: ?>
                                        <img src="dist/img/blank-profile.png" class="user-image" alt="User Image">
                                    <?php endif; ?>
                                    <span class="hidden-xs"><?php echo $_SESSION['USER']['name']; ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <?php if (!empty($_SESSION['USER']['img'])): ?>
                                            <img src="dist/img/<?php echo $_SESSION['USER']['img']; ?>" class="img-circle" alt="User Image">
                                        <?php else: ?>
                                            <img src="dist/img/blank-profile.png" class="img-circle" alt="User Image">
                                        <?php endif; ?>
                                        <p>
                                            <?php echo $_SESSION['USER']['name']; ?>
                                            <small><?php echo $_SESSION['USER']['email']; ?></small>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <form method="post" id="frm-mod-user" enctype="multipart/form-data" action="ajax/mod-user-ajax.php">
                                        <li class="user-body">
                                            <div class="form-group" style=" margin-bottom: 0px;">
                                                <label>Nombre: </label>
                                                <input type="text" class="form-control input-sm" name="nombre" placeholder="Ingrese el titulo" value="<?php echo $_SESSION['USER']['name']; ?>">
                                            </div>
                                            <div class="form-group" style=" margin-bottom: 0px;">
                                                <label>Email: </label>
                                                <input type="text" class="form-control input-sm" name="email" placeholder="Ingrese el titulo" value="<?php echo $_SESSION['USER']['email']; ?>">
                                            </div>
                                            <div class="form-group" style=" margin-bottom: 0px;">
                                                <label>Subir Imagen</label>
                                                <input type="file" name="img-perfil" class="form-control input-sm" />
                                                <p class="help-block" style=" font-size: 11px;">Solo seleccione un archivo si desea modicar la imagen.</p>
                                            </div>
                                            <p>Contraseña</p>
                                            <div class="form-group" style=" margin-bottom: 0px;">
                                                <label>Nueva Contraseña: </label>
                                                <input type="password" class="form-control input-sm" name="pass">
                                            </div>
                                            <div class="form-group" style=" margin-bottom: 0px;">
                                                <label>Repita la Contraseña: </label>
                                                <input type="password" class="form-control input-sm" name="pass2">
                                                <input type="hidden" name="user" value="<?php echo $_SESSION['USER']['user']; ?>">
                                            </div>
                                        </li>
                                        <!-- Menu Footer-->
                                        <li class="user-footer">
                                            <div class="pull-right">
                                                <a href="#" class="btn btn-default btn-flat" id="mod-User">Modificar Datos</a>
                                            </div>
                                        </li>
                                    </form>
                                    <script>
                                        $(function () {
                                            $("#mod-User").click(function () {
                                                var formData = new FormData($("#frm-mod-user")[0]);
                                                var ruta = "ajax/mod-user-ajax.php";
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
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                            <li>
                                <a href="signout.php"><i class="glyphicon glyphicon-off"></i></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header">Navegación</li>
                        <li class="treeview">
                            <a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>
                        <li class="treeview">
                            <a href="empresa.php"><i class="fa fa-files-o"></i><span>La Empresa</span></a>
                        </li>
                        <li class="treeview">
                            <a href="ofertas.php"><i class="fa fa-files-o"></i><span>Ofertas</span></a>
                        </li>
                        <li class="treeview">
                            <a href="productos.php"><i class="fa fa-barcode" aria-hidden="true"></i><span>Productos</span></a>
                        </li>
                        <li class="treeview">
                            <a href="marcas.php"><i class="fa fa-barcode" aria-hidden="true"></i><span>Marcas</span></a>
                        </li>
                        <li class="treeview">
                            <a href="sucursales.php"><i class="fa fa-files-o"></i><span>Sucursales</span></a>
                        </li>
                        <li class="treeview">
                            <a href="trabaja.php"><i class="fa fa-files-o"></i><span>Trabaja con Nosotros</span></a>
                        </li>
                        <li class="treeview">
                            <a href="contacto.php"><i class="fa fa-files-o"></i><span>Contacto</span></a>
                        </li>
                        <li class="treeview">
                            <a href="logo.php"><i class="fa fa-image"></i><span>Logo</span></a>
                        </li>
                        <li class="treeview">
                            <a href="remates.php"><i class="fa fa-calendar"></i> <span>Remates</span></a>
                        </li>
                        <li class="treeview">
                            <a href="redes.php"><i class="fa fa-share"></i> <span>Redes Sociales</span></a>
                        </li>
                        <li class="treeview">
                            <a href="tags.php"><i class="fa fa-share"></i> <span>Tags</span></a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>