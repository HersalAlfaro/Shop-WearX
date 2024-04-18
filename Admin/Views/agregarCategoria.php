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
        <div class="page-content--bgf7">
            <!-- BREADCRUMB-->
            <section class="au-breadcrumb2">
                <?php
                include 'fragments/migajas.php'
                ?>
            </section>
            <!-- END BREADCRUMB-->

            <!-- STATISTIC-->
            <section class="statistic statistic2">


                <div class="content-wrapper">

                    <!-- Content -->

                    <div class="container flex-grow-1">

                        <div class="app-ecommerce">

                            <!-- Add Product -->
                            <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                                <div class="d-flex flex-column justify-content-center">
                                    <h4 class="mb-1 mt-3">Añadir nueva Categoria</h4>
                                    <p class="text-muted">tienda</p>
                                </div>
                                <div class="d-flex align-content-center flex-wrap gap-3">
                                    <button class="btn btn-label-secondary">Descartar</button>
                                    <button type="submit" class="btn btn-primary">Publicar Categoria</button>
                                </div>

                            </div>

                            <div class="row">

                                <!-- First column-->
                                <div class="col-12 col-lg-8">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Información Categoria</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label class="form-label" for="nombre_categoria">Nombre</label>
                                                <input type="text" class="form-control" id="nombre_categoria" placeholder="Nombre categoria" name="nombre_categoria" aria-label="Nombre categoria">
                                            </div>
                                            <!-- Description -->
                                            <div>
                                                <label class="form-label">Descripción <span class="text-muted">(Opcional)</span></label>
                                                <textarea class="form-control" id="descripcion" placeholder="Descripción del categoria"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Product Information -->


                                    <!-- Media -->
                                    <div class="card mb-4">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h5 class="mb-0 card-title">Imagen</h5>
                                            <a href="javascript:void(0);" class="fw-medium">Añadir imagen mediante URL</a>
                                        </div>
                                        <div class="card-body">
                                            <form action="/upload" class="dropzone needsclick dz-clickable" id="dropzone-basic">
                                                <div class="dz-message needsclick my-5">
                                                    <p class="fs-4 my-2 text-center">Arrastra y suelta tu imagen aquí.</p>
                                                    <small class="text-muted d-block fs-6 my-2 text-center">O</small>
                                                    <span class="btn bg-label-primary d-inline" id="btnBrowse">Buscar imagen</span>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /Media -->
                                </div>

                                <div class="col-12 col-lg-4">

                                    <!-- Organize Card -->
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Otras Opciones</h5>
                                        </div>
                                        <div class="card-body">
                                            <!-- Status -->
                                            <div class="mb-3 col-md-12">
                                                <label class="form-label" for="status-org">Estado</label>
                                                <div class="position-relative">
                                                    <select id="status-org" class="select2 form-select" data-placeholder="Publicado" tabindex="-1" aria-hidden="true">
                                                        <option value="Publicado">Publicado</option>
                                                        <option value="Inactivo">Inactivo</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Organize Card -->


                                </div>
                                <!-- /Second column -->
                            </div>
                        </div>
                    </div>
                    <!-- / Content -->

                    <div class="content-backdrop fade"></div>
                </div>
            </section>
            <!-- END DATA TABLE-->

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

    <script>
        $(document).ready(function() {
            $('#category-org').select2();

            // Mostrar campo de entrada al seleccionar "Añadir nueva categoría"
            $('#category-org').on('select2:select', function(e) {
                var selectedOption = e.params.data;
                if (selectedOption.text === 'Añadir nueva categoria') {
                    // Mostrar el campo de entrada o realizar otras acciones necesarias
                    $('#nueva-categoria-input').removeClass('d-none');
                } else {
                    // Ocultar el campo de entrada si no se selecciona "Añadir nueva categoría"
                    $('#nueva-categoria-input').addClass('d-none');
                }
            });
        });
    </script>
</body>

</html>
<!-- end document-->