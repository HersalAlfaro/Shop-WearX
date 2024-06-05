<?php
require_once '../../admin/config/global.php';
require_once '../../admin/config/conexion.php';

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>WearX Admin</title>

    <!-- Fontfaces CSS-->
    <link href="dist/css/font-face.css" rel="stylesheet" media="all">
    <link href="dist/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="dist/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="dist/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="dist/vendor/bootstrap-5.3/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="dist/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="dist/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="dist/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="dist/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="dist/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="dist/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="dist/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="dist/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">

    <div class="page-wrapper">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop3 d-none d-lg-block">
            <?php
            include 'fragments/header.php'
            ?>
        </header>
        <!-- END HEADER DESKTOP-->

        <!-- HEADER MOBILE-->
        <header class="header-mobile header-mobile-2 d-block d-lg-none">
            <?php
            include 'fragments/headerMobile.php'
            ?>
        </header>
        <!-- END HEADER MOBILE -->

        <!-- PAGE CONTENT-->
        <div class="content-wrapper">

            <!-- Content -->
            <div class="container flex-grow-1">
                <!-- Add Product -->
                <div class="my-5">
                    <form method="POST" name="modulos_add" id="agregarProducto">

                    <div class="row">
                        <div class="col-md-3">

                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                    <img id="imagenPreview" src="" alt="No hay imagen" style="max-width: 50%; max-height: 50px;">
                                    </div>
                                    <h3 class="profile-username text-center"><?php echo isset($usuario) ? $usuario->getRol() : ''; ?></h3>
                                    <p class="text-muted text-center"><?php echo isset($usuario) ? $usuario->getNombre() : ''; ?></p>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                        </div>
                  
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header p-2">
                                    <h3 class="text-center ">Mis Datos</h3>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="settings">
                                            <form class="form-horizontal" method="POST" name="empleado_update" id="empleado_update"> 
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Nombre">Cedula</label>
                                                            <input type="text" class="form-control" id="Ecedula" name="cedula" placeholder="Cedula" readonly>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="Nombre">Nombre</label>
                                                            <input type="text" class="form-control" id="Enombre" name="nombre" placeholder="Primer Nombre" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="apellido">Apellido</label>
                                                            <input type="text" class="form-control" id="Eapellido" name="apellido" placeholder="Apellido" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="correo">Correo Electrónico</label>
                                                            <input type="email" class="form-control" id="Ecorreo" name="correo" placeholder="Correo" readonly>
                                                        </div>


                                                        <div class="form-group">
                                                            <label for="telefono">Telefono</label>
                                                            <input type="number" class="form-control" id="Etelefono" name="telefono" placeholder="Telefono" required>
                                                        </div>

                                                    </div>
                                                    <div class=" col-md-6">
                                                        <div class="form-group">
                                                            <label for="fechaCita">Provincia</label>
                                                            <input type="text" class="form-control" id="Eprovincia" name="provincia" placeholder="Provincia" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="distrito">Distrito</label>
                                                            <input type="text" class="form-control" id="Edistrito" name="distrito" placeholder="Distrito" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="canton">Canton</label>
                                                            <input type="text" class="form-control" id="Ecanton" name="canton" placeholder="Canton" required>
                                                        </div>


                                                        <div class="form-group">
                                                            <label for="otros">Otros</label>
                                                            <input type="text" class="form-control" id="Eotros" name="otros" placeholder="Otras Señales" required>
                                                        </div>



                                                        <div class="form-group">
                                                            <label for="genero">Genero</label>
                                                            <input type="text" class="form-control" id="Egenero" name="genero" placeholder="Genero" readonly>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-10 mt-5">
                                                        <button type="submit" class="btn" style="background-color: #202126; color: #F7F4ED;">Actualizar</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>
                        
                </div>
                    </form>
                </div>

            </div>
            <!-- / Content -->
            <div class="content-backdrop fade"></div>
        </div>


        <!-- COPYRIGHT-->
        <?php
        include 'fragments/footer.php'
        ?>
        <!-- END COPYRIGHT-->
    </div>

    </div>

    <!-- Jquery JS-->
    <script src="dist/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="dist/vendor/bootstrap-5.3/popper.min.js"></script>
    <script src="dist/vendor/bootstrap-5.3/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="dist/vendor/slick/slick.min.js">
    </script>
    <script src="dist/vendor/wow/wow.min.js"></script>
    <script src="dist/vendor/animsition/animsition.min.js"></script>
    <script src="dist/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="dist/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="dist/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="dist/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="dist/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="dist/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="dist/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="dist/js/main.js"></script>


</body>

</html>
<!-- end document-->