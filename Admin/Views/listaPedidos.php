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
    <!-- Font Awesome 4.7 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font Awesome 5 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet" media="all">
    <!-- Material Design Iconic Font -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animsition/4.0.2/css/animsition.min.css" rel="stylesheet" media="all">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-progressbar/0.9.0/css/bootstrap-progressbar.min.css" rel="stylesheet" media="all">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet" media="all">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/hamburgers/1.1.3/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" rel="stylesheet" media="all">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" media="all">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/perfect-scrollbar/1.5.2/css/perfect-scrollbar.min.css" rel="stylesheet" media="all">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/boxicons/2.1.0/css/boxicons.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="https://cdn.example.com/path/to/demo.css">

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/perfect-scrollbar/1.5.2/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.9/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/checkboxes/1.4.3/css/dataTables.checkboxes.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/12.4.0/sweetalert2.min.css">
    <!-- Remove local reference of SweetAlert2 -->

    <!-- Helpers -->
    <script src="../../assets/vendor/js/helpers.js"></script>
</head>

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
                    <div class="container" id="listaOrdenes">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="title-5 m-b-35">Lista Ordenes</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <div class="rs-select2--light rs-select2--md">
                                            <select class="js-select2" name="property">
                                                <option selected="selected">Todas</option>
                                                <option value="">Semanal</option>
                                                <option value="">Mensual</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--light rs-select2--sm">
                                            <select class="js-select2" name="time">
                                                <option selected="selected">Hoy</option>
                                                <option value="">3 Dias</option>
                                                <option value="">1 Semana</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <button class="au-btn-filter">
                                            <i class="zmdi zmdi-filter-list"></i>Filtros</button>
                                    </div>
                                    <div class="table-data__tool-right">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>Agregar Venta</button>
                                        <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                            <select class="js-select2" name="type">
                                                <option selected="selected">Exportar</option>
                                                <option value="">PDF</option>
                                                <option value="">Excel</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </th>
                                                <th>Nombre</th>
                                                <th>Correo</th>
                                                <th>Descripción</th>
                                                <th>Fecha</th>
                                                <th>Estado</th>
                                                <th>Precio</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="tr-shadow">
                                                <td>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </td>
                                                <td>Lori Lynch</td>
                                                <td>
                                                    <span class="block-email">lori@example.com</span>
                                                </td>
                                                <td class="desc">Samsung S8 Black</td>
                                                <td>2018-09-27 02:12</td>
                                                <td>
                                                    <span class="status--process">Processed</span>
                                                </td>
                                                <td>$679.00</td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Ver">
                                                            <i class="zmdi zmdi-eye"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Editar">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Borrar">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Más">
                                                            <i class="zmdi zmdi-more"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="spacer"></tr>

                                            <tr class="tr-shadow">
                                                <td>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </td>
                                                <td>Lori Lynch</td>
                                                <td>
                                                    <span class="block-email">lyn@example.com</span>
                                                </td>
                                                <td class="desc">iPhone X 256Gb Black</td>
                                                <td>2018-09-25 19:03</td>
                                                <td>
                                                    <span class="status--denied">Denied</span>
                                                </td>
                                                <td>$1199.00</td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Enviar">
                                                            <i class="zmdi zmdi-mail-send"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Editar">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Borrar">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Mñas">
                                                            <i class="zmdi zmdi-more"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="spacer"></tr>

                                        </tbody>
                                    </table>
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