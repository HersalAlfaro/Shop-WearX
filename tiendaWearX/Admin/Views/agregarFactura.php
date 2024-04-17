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


                    <div class="container flex-grow-1">

                        <div class="row invoice-add">
                            <!-- Invoice Add-->


                            <div class="col-lg-9 col-12 mb-lg-0 mb-4">
                                <div class="card invoice-preview-card">
                                    <div class="card-body">
                                        <div class="row p-sm-3 p-0">
                                            <div class="col-md-6 mb-md-0 mb-4">
                                                <div class="d-flex svg-illustration mb-4 gap-2">
                                                    <span class="app-brand-text demo menu-text fw-bold">WearX</span>
                                                </div>
                                                <p class="mb-1">Roble Alajuela</p>
                                                <p class="mb-1">20104, Alajuela, Costa Rica</p>
                                                <p class="mb-0">+506 61295592</p>
                                            </div>
                                            <div class="col-md-6">
                                                <dl class="row mb-2">
                                                    <dt class="col-sm-6 mb-2 mb-sm-0 text-md-end">
                                                        <span class="h4 text-capitalize mb-0 text-nowrap">Factura #</span>
                                                    </dt>
                                                    <dd class="col-sm-6 d-flex justify-content-md-end">
                                                        <div class="w-px-150">
                                                            <input type="text" class="form-control" disabled="" placeholder="3905" value="3905" id="invoiceId">
                                                        </div>
                                                    </dd>
                                                    <dt class="col-sm-6 mb-2 mb-sm-0 text-md-end">
                                                        <span class="fw-normal">Fecha:</span>
                                                    </dt>
                                                    <dd class="col-sm-6 d-flex justify-content-md-end">
                                                        <div class="w-px-150">
                                                            <input type="text" class="form-control date-picker flatpickr-input" placeholder="YYYY-MM-DD" readonly="readonly">
                                                        </div>
                                                </dl>
                                            </div>
                                        </div>

                                        <hr class="my-4 mx-n4">

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

                                        <hr class="mx-n4">

                                        <form class="source-item py-sm-3">
                                            <div class="mb-3" data-repeater-list="group-a">
                                                <div class="repeater-wrapper pt-0 pt-md-4" data-repeater-item="">
                                                    <div class="d-flex border rounded position-relative pe-0">
                                                        <div class="row w-100 m-0 p-3">
                                                            <div class="col-md-6 col-12 mb-md-0 mb-3 ps-md-0">
                                                                <p class="mb-2 repeater-title">Producto</p>
                                                                <select class="form-select item-details mb-2">
                                                                    <option selected="" disabled="">Seleccionar Producto</option>
                                                                </select>
                                                                <textarea class="form-control" rows="2" placeholder="Informacion del producto"></textarea>
                                                            </div>
                                                            <div class="col-md-3 col-12 mb-md-0 mb-3">
                                                                <p class="mb-2 repeater-title">Costo</p>
                                                                <input type="number" class="form-control invoice-item-price mb-2" placeholder="0" min="12">
                                                                <div>
                                                                    <span>Descuento:</span>
                                                                    <span class="discount me-2">0%</span>
                                                                    <span class="tax-1 me-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="IVA">0%</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 col-12 mb-md-0 mb-3">
                                                                <p class="mb-2 repeater-title">Cantidad</p>
                                                                <input type="number" class="form-control invoice-item-qty" placeholder="1" min="1" max="50">
                                                            </div>
                                                            <div class="col-md-1 col-12 pe-0">
                                                                <p class="mb-2 repeater-title">Precio</p>
                                                                <p class="mb-0">$24.00</p>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-column align-items-center justify-content-between border-start p-2">
                                                            <i class="bx bx-x fs-4 text-muted cursor-pointer" data-repeater-delete=""></i>
                                                            <div class="dropdown">
                                                                <i class="bx bx-cog bx-xs text-muted cursor-pointer more-options-dropdown" role="button" id="dropdownMenuButton" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                                                </i>
                                                                <div class="dropdown-menu dropdown-menu-end w-px-300 p-3" aria-labelledby="dropdownMenuButton">

                                                                    <div class="row g-3">
                                                                        <div class="col-12">
                                                                            <label for="discountInput" class="form-label">Descuento (%)</label>
                                                                            <input type="number" class="form-control" id="discountInput" min="0" max="100">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label for="taxInput1" class="form-label">IVA</label>
                                                                            <select name="group-a[0][tax-1-input]" id="taxInput1" class="form-select tax-select">
                                                                                <option value="0%" selected="">0%</option>
                                                                                <option value="1%">1%</option>
                                                                                <option value="10%">10%</option>
                                                                                <option value="18%">18%</option>
                                                                                <option value="40%">40%</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="dropdown-divider my-3"></div>
                                                                    <button type="button" class="btn btn-label-primary btn-apply-changes">Aplicar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <button type="button" class="btn btn-primary" data-repeater-create="">Añadir Producto</button>
                                                </div>
                                            </div>
                                        </form>

                                        <hr class="my-4 mx-n4">

                                        <div class="row py-sm-3">
                                            <div class="col-md-6 mb-md-0 mb-3"></div>
                                            <div class="col-md-6 d-flex justify-content-end">
                                                <div class="invoice-calculations">
                                                    <div class="d-flex justify-content-between mb-2">
                                                        <span class="w-px-100">Subtotal:</span>
                                                        <span class="fw-medium">$</span>
                                                    </div>
                                                    <div class="d-flex justify-content-between mb-2">
                                                        <span class="w-px-100">Descuento:</span>
                                                        <span class="fw-medium">$</span>
                                                    </div>
                                                    <div class="d-flex justify-content-between mb-2">
                                                        <span class="w-px-100">Iva:</span>
                                                        <span class="fw-medium">$</span>
                                                    </div>
                                                    <hr>
                                                    <div class="d-flex justify-content-between">
                                                        <span class="w-px-100">Total:</span>
                                                        <span class="fw-medium">$0</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="my-4">

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label for="note" class="form-label fw-medium">Nota:</label>
                                                    <textarea class="form-control" rows="2" id="note" placeholder="Nota factura"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Invoice Add-->

                            <!-- Invoice Actions -->
                            <div class="col-lg-3 col-12 invoice-actions">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <button class="btn btn-primary d-grid w-100 mb-3" data-bs-toggle="offcanvas" data-bs-target="#sendInvoiceOffcanvas">
                                            <span class="d-flex align-items-center justify-content-center text-nowrap"><i class="bx bx-paper-plane bx-xs me-1"></i>Enviar Factura</span>
                                        </button>
                                        <a href="factura.php" class="btn btn-label-secondary d-grid w-100 mb-3">Preview</a>
                                        <button type="button" class="btn btn-label-secondary d-grid w-100">Guardar</button>
                                    </div>
                                </div>
                                <div>
                                    <p class="mb-2">Aceptar pagos a través de</p>
                                    <select class="form-select mb-4">
                                        <option value="Cuenta Banco">Cuenta Banco</option>
                                        <option value="Sinpe">Sinpe</option>
                                    </select>
                                    <div class="d-flex justify-content-between mb-2">
                                        <label for="payment-terms" class="mb-0">Terminos Pago</label>
                                        <label class="switch switch-primary me-0">
                                            <input type="checkbox" class="switch-input" id="terminos-pago" checked="">
                                            <span class="switch-toggle-slider">
                                                <span class="switch-on">
                                                    <i class="bx bx-check"></i>
                                                </span>
                                                <span class="switch-off">
                                                    <i class="bx bx-x"></i>
                                                </span>
                                            </span>
                                            <span class="switch-label"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>


                            <!-- /Invoice Actions -->
                        </div>

                        <!-- Offcanvas -->
                        <!-- 
                        <div class="offcanvas offcanvas-end" id="sendInvoiceOffcanvas" aria-hidden="true">
                            <div class="offcanvas-header mb-3">
                                <h5 class="offcanvas-title">Send Invoice</h5>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body flex-grow-1">
                                <form>
                                    <div class="mb-3">
                                        <label for="invoice-from" class="form-label">From</label>
                                        <input type="text" class="form-control" id="invoice-from" value="shelbyComapny@email.com" placeholder="company@email.com">
                                    </div>
                                    <div class="mb-3">
                                        <label for="invoice-to" class="form-label">To</label>
                                        <input type="text" class="form-control" id="invoice-to" value="qConsolidated@email.com" placeholder="company@email.com">
                                    </div>
                                    <div class="mb-3">
                                        <label for="invoice-subject" class="form-label">Subject</label>
                                        <input type="text" class="form-control" id="invoice-subject" value="Invoice of purchased Admin Templates" placeholder="Invoice regarding goods">
                                    </div>
                                    <div class="mb-3">
                                        <label for="invoice-message" class="form-label">Message</label>
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
                                        <button type="button" class="btn btn-primary me-3" data-bs-dismiss="offcanvas">Send</button>
                                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        Send Invoice Sidebar -->


                        <!-- /Send Invoice Sidebar -->

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

    <!-- Main JS-->
    <script src="dist/js/main.js"></script>

</body>

</html>
<!-- end document-->