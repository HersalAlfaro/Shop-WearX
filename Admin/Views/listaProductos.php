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

            <div class="modal fade" id="modalActualizar" tabindex="-1" aria-labelledby="modal1" aria-modal="true" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content" id="modalHijo">
                        <!-- Encabezado del modal -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitle"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Cuerpo del modal -->
                        <div class="modal-body">
                            <p id="modalContent"></p>

                        </div>

                        <!-- Pie de página del modal -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary" id="confirmButton">Actualizar</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-wrapper">

                <div class="container flex-grow-1">

                    <!-- Product List Widget -->

                    <div class="card mb-4">
                        <div class="card-widget-separator-wrapper">
                            <div class="card-body card-widget-separator">
                                <div class="row gy-4 gy-sm-1">
                                    <div class="col-sm-6 col-lg-3">
                                        <div class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
                                            <div>
                                                <h6 class="mb-2">Ventas En Tienda</h6>
                                                <h4 class="mb-2">$</h4>
                                                <p class="mb-0"><span class="text-muted me-2">5k orders</span><span class="badge bg-label-success">+5.7%</span></p>
                                            </div>
                                            <div class="avatar me-sm-4">
                                                <span class="avatar-initial rounded bg-label-secondary">
                                                    <i class="bx bx-store-alt bx-sm"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <hr class="d-none d-sm-block d-lg-none me-4">
                                    </div>
                                    <div class="col-sm-6 col-lg-3">
                                        <div class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-3 pb-sm-0">
                                            <div>
                                                <h6 class="mb-2">Ventas en linea</h6>
                                                <h4 class="mb-2">$</h4>
                                                <p class="mb-0"><span class="text-muted me-2">21k orders</span><span class="badge bg-label-success">+12.4%</span></p>
                                            </div>
                                            <div class="avatar me-lg-4">
                                                <span class="avatar-initial rounded bg-label-secondary">
                                                    <i class="bx bx-laptop bx-sm"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <hr class="d-none d-sm-block d-lg-none">
                                    </div>
                                    <div class="col-sm-6 col-lg-3">
                                        <div class="d-flex justify-content-between align-items-start border-end pb-3 pb-sm-0 card-widget-3">
                                            <div>
                                                <h6 class="mb-2">Descuento</h6>
                                                <h4 class="mb-2">$14,235.12</h4>
                                                <p class="mb-0 text-muted">6k orders</p>
                                            </div>
                                            <div class="avatar me-sm-4">
                                                <span class="avatar-initial rounded bg-label-secondary">
                                                    <i class="bx bx-gift bx-sm"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-3">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                                <h6 class="mb-2">VIP</h6>
                                                <h4 class="mb-2">$8,345.23</h4>
                                                <p class="mb-0"><span class="text-muted me-2">150 orders</span><span class="badge bg-label-danger">-3.5%</span></p>
                                            </div>
                                            <div class="avatar">
                                                <span class="avatar-initial rounded bg-label-secondary">
                                                    <i class="bx bx-wallet bx-sm"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container flex-grow-1 container-p-y">

                        <!-- DataTable with Buttons -->
                        <div class="container" id="listaOrdenes">
                            <h3 class="title-5 m-b-35">Lista Productos</h3>
                            <div class="card">
                                <div class="card-datatable table-responsive">
                                    <table class="datatables-basic table border-top" id="datatable-productos">
                                        <thead>
                                            <tr>
                                                <th>codigo</th>
                                                <th>nombre</th>
                                                <th>descripcion</th>
                                                <th>cantidad</th>
                                                <th>precio</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- / Content -->
                    </div>

                    <div class="content-backdrop fade"></div>
                </div>

                <!-- COPYRIGHT-->
                <?php
                include 'fragments/footer.php'
                ?>
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
        <script src="dist/vendor/select2/js/select2.full.min.js"></script>
        <script src="dist/js/main.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@latest/dist/sweetalert2.all.min.js"></script>
        <script src="dist/js/productosAdmin.js"></script>

</body>

</html>
<!-- end document-->