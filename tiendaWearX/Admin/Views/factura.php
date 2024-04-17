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
            <section class="au-breadcrumb2">
                <?php
                include 'fragments/migajas.php'
                ?>
            </section>

            <!-- STATISTIC-->
            <section class="statistic statistic2">


                <div class="content-wrapper">

                    <!-- Content -->
                    <div class="container flex-grow-1 ">

                        <div class="row invoice-preview">
                            <!-- Invoice -->
                            <div class="col-xl-9 col-md-8 col-12 mb-md-0 mb-4">
                                <div class="card invoice-preview-card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column p-sm-3 p-0">
                                            <div class="mb-xl-0 mb-4">
                                                <div class="d-flex svg-illustration mb-3 gap-2">
                                                    <span class="app-brand-text demo menu-text fw-bold">WearX</span>
                                                </div>
                                                <p class="mb-1">Roble Alajuela</p>
                                                <p class="mb-1">20104, Alajuela, Costa Rica</p>
                                                <p class="mb-0">+506 61295592</p>
                                            </div>
                                            <div>
                                                <h4 id="invoiceNumber">Factura #</h4>
                                                <div class="mb-2">
                                                    <span class="me-1">Date Issues:</span>
                                                    <span class="fw-medium" id="dateIssued">---</span>
                                                </div>
                                                <div>
                                                    <span class="me-1">Date Due:</span>
                                                    <span class="fw-medium" id="dateDue">---</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-0">
                                    <div class="card-body">
                                        <div class="row p-sm-3 p-0">
                                            <div class="col-xl-6 col-md-12 col-sm-5 col-12 mb-xl-0 mb-md-4 mb-sm-0 mb-4">
                                                <h6 class="pb-2">Invoice To:</h6>
                                                <p class="mb-1">---</p>
                                                <p class="mb-1">---</p>
                                                <p class="mb-1">---</p>
                                                <p class="mb-1">---</p>
                                                <p class="mb-0">---</p>
                                            </div>
                                            <div class="col-xl-6 col-md-12 col-sm-7 col-12">
                                                <h6 class="pb-2">Bill To:</h6>
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td class="pe-3">Total Due:</td>
                                                            <td id="totalDue">$---</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pe-3">Bank name:</td>
                                                            <td id="bankName">---</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pe-3">Country:</td>
                                                            <td id="country">---</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pe-3">IBAN:</td>
                                                            <td id="iban">---</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pe-3">SWIFT code:</td>
                                                            <td id="swiftCode">---</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table border-top m-0">
                                            <thead>
                                                <tr>
                                                    <th>Item</th>
                                                    <th>Descripcion</th>
                                                    <th>Costo</th>
                                                    <th>Cantidad</th>
                                                    <th>Precio</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-nowrap">Vuexy Admin Template</td>
                                                    <td class="text-nowrap">HTML Admin Template</td>
                                                    <td>$32</td>
                                                    <td>1</td>
                                                    <td>$32.00</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <span class="fw-medium">Nota:</span>
                                                <span id="invoiceNote"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Invoice Actions -->
                            <div class="col-xl-3 col-md-4 col-12 ">
                                <div class="card">
                                    <div class="card-body">
                                        <button class="btn btn-primary d-grid w-100 mb-3" data-bs-toggle="offcanvas" data-bs-target="#enviarFacturaOffCanva">
                                            <span class="d-flex align-items-center justify-content-center text-nowrap"><i class="bx bx-paper-plane bx-xs me-1"></i>Enviar Factura</span>
                                        </button>
                                        <button class="btn btn-label-secondary d-grid w-100 mb-3">
                                            Descargar
                                        </button>
                                        <a class="btn btn-label-secondary d-grid w-100 mb-3" target="_blank" href="/sneat-html-django-admin-template/demo-1/app/invoice/print/">
                                            Imprimir
                                        </a>
                                        <a href="/sneat-html-django-admin-template/demo-1/app/invoice/edit/" class=" btn btn-label-secondary d-grid w-100 mb-3">
                                            Editar Factura
                                        </a>
                                        <button class="btn btn-primary d-grid w-100" data-bs-toggle="offcanvas" data-bs-target="#addPaymentOffcanvas">
                                            <span class="d-flex align-items-center justify-content-center text-nowrap"><i class="bx bx-dollar bx-xs me-1"></i>Añadir Pago</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- /Invoice Actions -->
                        </div>

                        <!-- Offcanvas -->

                        <!-- Send Invoice Sidebar -->
                        <div class="offcanvas offcanvas-end" id="enviarFacturaOffCanva" aria-hidden="true">
                            <div class="offcanvas-header mb-3">
                                <h5 class="offcanvas-title">Enviar Factura</h5>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body flex-grow-1">
                                <form>
                                    <div class="mb-3">
                                        <label for="invoice-from" class="form-label">From</label>
                                        <input type="text" class="form-control" id="invoice-from" value="wearXcompany@gmail.com" placeholder="wearXcompany@gmail.com">
                                    </div>
                                    <div class="mb-3">
                                        <label for="invoice-to" class="form-label">To</label>
                                        <input type="text" class="form-control" id="invoice-to" placeholder="example@email.com">
                                    </div>
                                    <div class="mb-3">
                                        <label for="invoice-subject" class="form-label">Subject</label>
                                        <input type="text" class="form-control" id="invoice-subject" placeholder="Invoice regarding goods">
                                    </div>
                                    <div class="mb-3">
                                        <label for="invoice-message" class="form-label">Mensaje</label>
                                        <textarea class="form-control" name="invoice-message" id="invoice-message" cols="3" rows="8">Dear Queen Consolidated,
                      Thank you for your business, always a pleasure to work with you!
                      We have generated a new invoice in the amount of $95.59
                      We would appreciate payment of this invoice by 05/11/2021</textarea>
                                    </div>
                                    <div class="mb-4">
                                        <span class="badge bg-label-primary">
                                            <i class="bx bx-link bx-xs"></i>
                                            <span class="align-middle">Invoice Attached</span>
                                        </span>
                                    </div>
                                    <div class="mb-3 d-flex flex-wrap">
                                        <button type="button" class="btn btn-primary me-3" data-bs-dismiss="offcanvas">Enviar</button>
                                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancelar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /Send Invoice Sidebar -->

                        <!-- Add Payment Sidebar -->
                        <div class="offcanvas offcanvas-end" id="addPaymentOffcanvas" aria-hidden="true">
                            <div class="offcanvas-header mb-3">
                                <h5 class="offcanvas-title">Añadir Pago</h5>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body flex-grow-1">
                                <div class="d-flex justify-content-between bg-lighter p-2 mb-3">
                                    <p class="mb-0">Factura Balance:</p>
                                    <p class="fw-medium mb-0">$5000.00</p>
                                </div>
                                <form>
                                    <div class="mb-3">
                                        <label class="form-label" for="invoiceAmount">Monto Pago</label>
                                        <div class="input-group">
                                            <span class="input-group-text">$</span>
                                            <input type="text" id="invoiceAmount" name="invoiceAmount" class="form-control invoice-amount" placeholder="100">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="payment-date">Fecha Pago</label>
                                        <input id="payment-date" class="form-control invoice-date flatpickr-input" type="text" readonly="readonly">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="metodo-pago">Metodo Pago</label>
                                        <select class="form-select" id="metodo-pago">
                                            <option value="" selected="" disabled="">Seleccionar metodo de pago</option>
                                            <option value="Efectivo">Efectivo</option>
                                            <option value="Transferencia Bancaria">Transferencia Bancaria</option>
                                            <option value="Tarjeta Debito">Tarjeta Debito</option>
                                            <option value="Tarjeta Credito">Tarjeta Credito</option>
                                            <option value="Paypal">Paypal</option>
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="payment-note">Internal Payment Note</label>
                                        <textarea class="form-control" id="payment-note" rows="2"></textarea>
                                    </div>
                                    <div class="mb-3 d-flex flex-wrap">
                                        <button type="button" class="btn btn-primary me-3" data-bs-dismiss="offcanvas">Enviar</button>
                                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancelar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /Add Payment Sidebar -->

                        <!-- /Offcanvas -->

                    </div>
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
    <script src="dist/vendor/slick/slick.min.js"></script>
    <script src="dist/vendor/wow/wow.min.js"></script>
    <script src="dist/vendor/animsition/animsition.min.js"></script>
    <script src="dist/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <script src="dist/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="dist/vendor/counter-up/jquery.counterup.min.js"></script>
    <script src="dist/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="dist/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="dist/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="dist/vendor/select2/select2.min.js"></script>

    <!-- Main JS-->
    <script src="dist/js/main.js"></script>

</body>

</html>
<!-- end document-->