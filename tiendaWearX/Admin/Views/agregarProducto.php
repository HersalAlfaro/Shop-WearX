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
                            <form method="POST" name="modulos_add" id="agregarProducto">

                                <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h4 class="mb-1 mt-3">Añadir nuevo Producto</h4>
                                        <p class="text-muted">tienda</p>
                                    </div>
                                    <div class="d-flex align-content-center flex-wrap gap-3">
                                        <button class="btn btn-label-secondary">Descartar</button>
                                        <button type="submit" class="btn btn-primary" id="btnRegistrar">Publicar Producto</button>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- First column-->
                                    <div class="col-12 col-lg-8">
                                        <div class="card mb-4">
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Información Producto</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label class="form-label" for="nombreProducto">Nombre</label>
                                                    <input type="text" class="form-control" id="nombreProducto" placeholder="Nombre Producto" name="nombreProducto" aria-label="Nombre Producto" required>
                                                </div>
                                                <!-- Description -->
                                                <div>
                                                    <label class="form-label">Descripción <span class="text-muted">(Opcional)</span></label>
                                                    <textarea class="form-control" id="descripcionProducto" name="descripcionProducto" placeholder="Descripción del producto" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Product Information -->


                                        <!-- Media -->
                                        <div class="card mb-4">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <h5 class="mb-0 card-title">Imagen</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="input-group">
                                                    <label class="input-group-btn">
                                                        <input type="file" class="custom-file-input" id="imagen" name="imagen" accept="image/*" required>
                                                        <label class="custom-file-label" for="imagen" data-browse="Elegir archivo">Seleccionar archivo</label>
                                                    </label>
                                                </div>
                                                <div class="mt-3">
                                                    <img id="imagenMostrada" src="" alt="Imagen" style="max-width: 100%; max-height: 300px; display: none;">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Media -->


                                        <!-- Variants -->
                                        <div class="card mb-4">
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Variantes</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <!-- Input Field para Size -->
                                                    <div class="mb-3 col-12">
                                                        <label class="form-label" for="sizeProducto">Size</label>
                                                        <input type="text" class="form-control" id="sizeProducto" name="sizeProducto" placeholder="Ingrese Size" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="mb-3 col-12">
                                                        <label class="form-label" for="color">Color</label>
                                                        <input type="text" class="form-control" id="color" name="color" placeholder="Ingrese Color" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Variants -->

                                        <!-- Inventory -->
                                        <div class="card mb-4">
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Inventario</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <!-- Options -->
                                                    <div class="col-12 pt-4 pt-md-0">
                                                        <div class=" p-0">
                                                            <div class="tab-pane fade show active" id="restock" role="tabpanel">
                                                                <h5>Stock</h5>
                                                                <label class="form-label" for="enStock">Añadir Stock</label>
                                                                <div class="row mb-3 g-3">
                                                                    <div class="col-12 ">
                                                                        <input type="number" class="form-control" id="enStock" placeholder="Stock" name="enStock" aria-label="Stock" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /Options-->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Inventory -->

                                    </div>


                                    <div class="col-12 col-lg-4">
                                        <!-- Pricing Card -->
                                        <div class="card mb-4">
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Precio</h5>
                                            </div>
                                            <div class="card-body">
                                                <!-- Base Price -->
                                                <div class="mb-3">
                                                    <label class="form-label" for="precio">Precio</label>
                                                    <input type="number" class="form-control" id="precio" placeholder="Precio" name="precio" aria-label="Precio" required>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Pricing Card -->

                                        <!-- Organize Card -->
                                        <div class="card mb-4">
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Otras Opciones</h5>
                                            </div>
                                            <div class="card-body">
                                                <!-- Categoria -->
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label" for="categoriaID">Categoría</label>
                                                    <div class="position-relative">
                                                        <select id="categoriaID" name="categoriaID" class="select2 form-select" data-placeholder="Seleccionar Categoria" tabindex="-1" aria-hidden="true" required>
                                                            <option value="" disabled selected>Seleccionar Categoría</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- Status -->
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label" for="estadoProducto">Estado</label>
                                                    <div class="position-relative">
                                                        <select id="estadoProducto" name="estadoProducto" class="select2 form-select" data-placeholder="Publicado" tabindex="-1" aria-hidden="true" required>
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
                            </form>
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
    <script src="dist/vendor/slick/slick.min.js"> </script>
    <script src="dist/vendor/wow/wow.min.js"></script>
    <script src="dist/vendor/animsition/animsition.min.js"></script>
    <script src="dist/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"> </script>
    <script src="dist/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="dist/vendor/counter-up/jquery.counterup.min.js"> </script>
    <script src="dist/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="dist/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="dist/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="dist/vendor/select2/select2.min.js"> </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Main JS-->
    <script src="dist/js/main.js"></script>

    <script>
        function mostrarImagen(event) {
            var input = event.target;
            var reader = new FileReader();

            reader.onload = function() {
                var dataURL = reader.result;
                var img = document.getElementById('imagenMostrada');
                img.src = dataURL;
                img.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        }
    </script>


    <script src="dist/js/productosAdmin.js"></script>

</body>

</html>
<!-- end document-->