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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
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
        <div class="page-content--bgf7">
            <!-- BREADCRUMB-->
            <section class="au-breadcrumb2">
                <?php
                include 'fragments/migajas.php'
                ?>
            </section>
            <!-- END BREADCRUMB-->

            <div class="content-wrapper">

                <!-- Content -->

                <div class="container flex-grow-1 container-p-y">

                    <!-- DataTable with Buttons -->
                    <div class="container" id="listaCategorias">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="title-5 m-b-35">Lista Categorias</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-right">
                                        <?php
                                        include 'fragments/agregarCategoria.php'
                                        ?>
                                    </div>
                                </div>


                                <div class="card">
                                    <div class="card-datatable table-responsive">
                                        <table class="datatables-basic table border-top" id="lista-categorias">
                                            <thead>
                                                <tr>
                                                    <th>Codigo</th>
                                                    <th>Nombre</th>
                                                    <th>Productos con Categoria</th>
                                                    <th class="text-end">Acciones</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <!-- / Content -->
                </div>

                <!-- COPYRIGHT-->
                <section class="p-t-60 p-b-20">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2024 Colorlib X WearX. Todos los derechos Reservados.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- END COPYRIGHT-->
            </div>

        </div>

        <script src="dist/vendor/jquery-3.2.1.min.js"></script>

        <script src="dist/vendor/bootstrap-5.3/popper.min.js"></script>
        <script src="dist/vendor/bootstrap-5.3/bootstrap.min.js"></script>

        <script src="dist/vendor/slick/slick.min.js"> </script>
        <script src="dist/vendor/wow/wow.min.js"></script>
        <script src="dist/vendor/animsition/animsition.min.js"></script>
        <script src="dist/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <script src="dist/vendor/counter-up/jquery.waypoints.min.js"></script>
        <script src="dist/vendor/counter-up/jquery.counterup.min.js"></script>
        <script src="dist/vendor/circle-progress/circle-progress.min.js"></script>
        <script src="dist/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="dist/vendor/chartjs/Chart.bundle.min.js"></script>
        <script src="dist/vendor/select2/select2.min.js"></script>
        <script src="dist/js/main.js"></script>

        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

        <script src="dist/js/categoriasAdmin.js"></script>


</body>

</html>
<!-- end document-->