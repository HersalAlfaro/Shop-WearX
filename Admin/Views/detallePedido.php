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

            <div class="content-wrapper">

                <!-- Content -->

                <div class="container flex-grow-1 ">

                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">

                        <div class="d-flex flex-column justify-content-center">
                            <h5 class="mb-1 mt-3">Orden # <span class="badge bg-label-success me-2 ms-2">Estado</span> <span class="badge bg-label-info">Listo para enviar</span></h5>
                            <p class="text-body">Aug 17, <span id="orderYear">2024</span>, 5:48 (ET)</p>
                        </div>
                        <div class="d-flex align-content-center flex-wrap gap-2">
                            <button class="btn btn-danger ">Borrar Orden</button>
                        </div>
                    </div>

                    <!-- Order Details Table -->

                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <div class="card mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="card-title m-0">Detalle de la Orden</h5>
                                    <h6 class="m-0"><a href=" javascript:void(0)">Editar</a></h6>
                                </div>
                                <div class="card-datatable table-responsive">
                                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                        <table class="datatables-order-details table dataTable no-footer dtr-column" id="DataTables_Table_0" style="width: 919px;">
                                            <thead>
                                                <tr>
                                                    <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label=""></th>
                                                    <th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1" colspan="1" style="width: 18px;" data-col="1" aria-label=""><input type="checkbox" class="form-check-input"></th>
                                                    <th class="w-50 sorting_disabled" rowspan="1" colspan="1" style="width: 354px;" aria-label="products">Producto</th>
                                                    <th class="w-25 sorting_disabled" rowspan="1" colspan="1" style="width: 154px;" aria-label="price">Precio</th>
                                                    <th class="w-25 sorting_disabled" rowspan="1" colspan="1" style="width: 144px;" aria-label="qty">Cantidad</th>
                                                    <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 53px;" aria-label="total">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="odd">
                                                    <td class="  control" tabindex="0" style="display: none;"></td>
                                                    <td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td>
                                                    <td class="sorting_1">
                                                        <div class="d-flex justify-content-start align-items-center text-nowrap">
                                                            <div class="avatar-wrapper">
                                                                <div class="avatar me-2"><img src="" alt="" class="rounded-2"></div>
                                                            </div>
                                                            <div class="d-flex flex-column">
                                                                <h6 class="text-body mb-0">Tshirt</h6><small class="text-muted">Material: </small>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><span>$841</span></td>
                                                    <td><span class="text-body">2</span></td>
                                                    <td>
                                                        <h6 class="mb-0">$1682</h6>
                                                    </td>
                                                </tr>

                                                <tr class="even">
                                                    <td class="  control" tabindex="0" style="display: none;"></td>
                                                    <td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td>
                                                    <td class="sorting_1">
                                                        <div class="d-flex justify-content-start align-items-center text-nowrap">
                                                            <div class="avatar-wrapper">
                                                                <div class="avatar me-2"><img src="" alt="" class="rounded-2"></div>
                                                            </div>
                                                            <div class="d-flex flex-column">
                                                                <h6 class="text-body mb-0">Oneplus 10</h6><small class="text-muted">Material:</small>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><span>$896</span></td>
                                                    <td><span class="text-body">3</span></td>
                                                    <td>
                                                        <h6 class="mb-0">$2688</h6>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-flex justify-content-end align-items-center m-3 mb-2 p-1">
                                        <div class="order-calculations">
                                            <div class="d-flex justify-content-between mb-2">
                                                <span class="w-px-100">Subtotal:</span>
                                                <span class="text-heading"></span>
                                            </div>
                                            <div class="d-flex justify-content-between mb-2">
                                                <span class="w-px-100">Descuento:</span>
                                                <span class="text-heading mb-0"></span>
                                            </div>
                                            <div class="d-flex justify-content-between mb-2">
                                                <span class="w-px-100">IVA:</span>
                                                <span class="text-heading">%13</span>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <h6 class="w-px-100 mb-0">Total:</h6>
                                                <h6 class="mb-0"></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h6 class="card-title m-0">Detalle del Cliente</h6>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-start align-items-center mb-4">
                                        <div class="avatar me-2">
                                            <img src="../../assets/img/avatars/1.png" alt="Avatar" class="rounded-circle">
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a href="app-user-view-account.html" class="text-body text-nowrap">
                                                <h6 class="mb-0">Nombre Productos</h6>
                                            </a>
                                            <small class="text-muted">ID Cliente: #</small>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start align-items-center mb-4">
                                        <span class="avatar rounded-circle bg-label-success me-2 d-flex align-items-center justify-content-center"><i class="bx bx-cart-alt bx-sm lh-sm"></i></span>
                                        <h6 class="text-body text-nowrap mb-0">numero de ordenes</h6>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <h6>Información Contacto</h6>
                                        <h6><a href=" javascript:void(0)" data-bs-toggle="modal" data-bs-target="#editUser">Editar</a></h6>
                                    </div>
                                    <p class=" mb-1">Correo: </p>
                                    <p class=" mb-0">Mobile: +506</p>
                                </div>
                            </div>

                            <div class="card mb-4">

                                <div class="card-header d-flex justify-content-between">
                                    <h6 class="card-title m-0">Dirección Compra</h6>
                                    <h6 class="m-0"><a href=" javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addNewAddress">Editar</a></h6>
                                </div>
                                <div class="card-body">
                                    <p class="mb-0">45 Roker Terrace <br>Latheronwheel <br>KW5 8NW,London <br>UK</p>
                                </div>

                            </div>
                            <div class="card mb-4">
                                <div class="card-header d-flex justify-content-between">
                                    <h6 class="card-title m-0">Dirección de Envio</h6>
                                    <h6 class="m-0"><a href=" javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addNewAddress">Editar</a></h6>
                                </div>
                                <div class="card-body">
                                    <p class="mb-4">
                                        <br>
                                        Latheronwheel
                                        <br>
                                        KW5 8NW,London
                                        <br>
                                        UK
                                    </p>
                                    <h6 class="mb-0 pb-2">Metodo Pago</h6>
                                    <p class="mb-0">

                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Edit User Modal -->
                    <div class="modal fade" id="editUser" tabindex="-1" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                            <div class="modal-content p-3 p-md-5">
                                <div class="modal-body">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    <div class="text-center mb-4">
                                        <h3>Edit User Information</h3>
                                        <p>Updating user details will receive a privacy audit.</p>
                                    </div>
                                    <form id="editUserForm" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework" onsubmit="return false" novalidate="novalidate">
                                        <div class="col-12 col-md-6 fv-plugins-icon-container">
                                            <label class="form-label" for="modalEditUserFirstName">First Name</label>
                                            <input type="text" id="modalEditUserFirstName" name="modalEditUserFirstName" class="form-control" placeholder="John">
                                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                        </div>
                                        <div class="col-12 col-md-6 fv-plugins-icon-container">
                                            <label class="form-label" for="modalEditUserLastName">Last Name</label>
                                            <input type="text" id="modalEditUserLastName" name="modalEditUserLastName" class="form-control" placeholder="Doe">
                                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                        </div>
                                        <div class="col-12 fv-plugins-icon-container">
                                            <label class="form-label" for="modalEditUserName">Username</label>
                                            <input type="text" id="modalEditUserName" name="modalEditUserName" class="form-control" placeholder="john.doe.007">
                                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label" for="modalEditUserEmail">Email</label>
                                            <input type="text" id="modalEditUserEmail" name="modalEditUserEmail" class="form-control" placeholder="example@domain.com">
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label" for="modalEditUserStatus">Status</label>
                                            <select id="modalEditUserStatus" name="modalEditUserStatus" class="form-select" aria-label="Default select example">
                                                <option selected="">Status</option>
                                                <option value="1">Active</option>
                                                <option value="2">Inactive</option>
                                                <option value="3">Suspended</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label" for="modalEditTaxID">Tax ID</label>
                                            <input type="text" id="modalEditTaxID" name="modalEditTaxID" class="form-control modal-edit-tax-id" placeholder="123 456 7890">
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label" for="modalEditUserPhone">Phone Number</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text">+1</span>
                                                <input type="text" id="modalEditUserPhone" name="modalEditUserPhone" class="form-control phone-number-mask" placeholder="202 555 0111">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label" for="modalEditUserLanguage">Language</label>
                                            <div class="position-relative">
                                                <div class="position-relative"><select id="modalEditUserLanguage" name="modalEditUserLanguage" class="select2 form-select select2-hidden-accessible" multiple="" tabindex="-1" aria-hidden="true" data-select2-id="modalEditUserLanguage">
                                                        <option value="">Select</option>
                                                        <option value="english" selected="" data-select2-id="17">English</option>
                                                        <option value="spanish">Spanish</option>
                                                        <option value="french">French</option>
                                                        <option value="german">German</option>
                                                        <option value="dutch">Dutch</option>
                                                        <option value="hebrew">Hebrew</option>
                                                        <option value="sanskrit">Sanskrit</option>
                                                        <option value="hindi">Hindi</option>
                                                    </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="16" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false">
                                                                <ul class="select2-selection__rendered">
                                                                    <li class="select2-selection__choice" title="English" data-select2-id="18"><span class="select2-selection__choice__remove" role="presentation">×</span>English</li>
                                                                    <li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li>
                                                                </ul>
                                                            </span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label" for="modalEditUserCountry">Country</label>
                                            <div class="position-relative">
                                                <div class="position-relative"><select id="modalEditUserCountry" name="modalEditUserCountry" class="select2 form-select select2-hidden-accessible" data-allow-clear="true" tabindex="-1" aria-hidden="true" data-select2-id="modalEditUserCountry">
                                                        <option value="" data-select2-id="45">Select</option>
                                                        <option value="Australia">Australia</option>
                                                        <option value="Bangladesh">Bangladesh</option>
                                                        <option value="Belarus">Belarus</option>
                                                        <option value="Brazil">Brazil</option>
                                                        <option value="Canada">Canada</option>
                                                        <option value="China">China</option>
                                                        <option value="France">France</option>
                                                        <option value="Germany">Germany</option>
                                                        <option value="India">India</option>
                                                        <option value="Indonesia">Indonesia</option>
                                                        <option value="Israel">Israel</option>
                                                        <option value="Italy">Italy</option>
                                                        <option value="Japan">Japan</option>
                                                        <option value="Korea">Korea, Republic of</option>
                                                        <option value="Mexico">Mexico</option>
                                                        <option value="Philippines">Philippines</option>
                                                        <option value="Russia">Russian Federation</option>
                                                        <option value="South Africa">South Africa</option>
                                                        <option value="Thailand">Thailand</option>
                                                        <option value="Turkey">Turkey</option>
                                                        <option value="Ukraine">Ukraine</option>
                                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                                        <option value="United Kingdom">United Kingdom</option>
                                                        <option value="United States">United States</option>
                                                    </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="44" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-modalEditUserCountry-container"><span class="select2-selection__rendered" id="select2-modalEditUserCountry-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder">Select value</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input">
                                                <span class="switch-toggle-slider">
                                                    <span class="switch-on"></span>
                                                    <span class="switch-off"></span>
                                                </span>
                                                <span class="switch-label">Use as a billing address?</span>
                                            </label>
                                        </div>
                                        <div class="col-12 text-center">
                                            <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                                            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                        </div>
                                        <input type="hidden">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Edit User Modal -->

                    <!-- Add New Address Modal -->
                    <div class="modal fade" id="addNewAddress" tabindex="-1" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-simple modal-add-new-address">
                            <div class="modal-content p-3 p-md-5">
                                <div class="modal-body">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    <div class="text-center mb-4">
                                        <h3 class="address-title">Add New Address</h3>
                                        <p class="address-subtitle">Add new address for express delivery</p>
                                    </div>
                                    <form id="addNewAddressForm" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework" onsubmit="return false" novalidate="novalidate">

                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-md mb-md-0 mb-3">
                                                    <div class="form-check custom-option custom-option-icon checked">
                                                        <label class="form-check-label custom-option-content" for="customRadioHome">
                                                            <span class="custom-option-body">
                                                                <i class="bx bx-home"></i>
                                                                <span class="custom-option-title">Home</span>
                                                                <small> Delivery time (9am – 9pm) </small>
                                                            </span>
                                                            <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="customRadioHome" checked="">
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md mb-md-0 mb-3">
                                                    <div class="form-check custom-option custom-option-icon">
                                                        <label class="form-check-label custom-option-content" for="customRadioOffice">
                                                            <span class="custom-option-body">
                                                                <i class="bx bx-briefcase"></i>
                                                                <span class="custom-option-title"> Office </span>
                                                                <small> Delivery time (9am – 5pm) </small>
                                                            </span>
                                                            <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="customRadioOffice">
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 fv-plugins-icon-container">
                                            <label class="form-label" for="modalAddressFirstName">First Name</label>
                                            <input type="text" id="modalAddressFirstName" name="modalAddressFirstName" class="form-control" placeholder="John">
                                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                        </div>
                                        <div class="col-12 col-md-6 fv-plugins-icon-container">
                                            <label class="form-label" for="modalAddressLastName">Last Name</label>
                                            <input type="text" id="modalAddressLastName" name="modalAddressLastName" class="form-control" placeholder="Doe">
                                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label" for="modalAddressCountry">Country</label>
                                            <div class="position-relative">
                                                <div class="position-relative"><select id="modalAddressCountry" name="modalAddressCountry" class="select2 form-select select2-hidden-accessible" data-allow-clear="true" tabindex="-1" aria-hidden="true" data-select2-id="modalAddressCountry">
                                                        <option value="" data-select2-id="72">Select</option>
                                                        <option value="Australia">Australia</option>
                                                        <option value="Bangladesh">Bangladesh</option>
                                                        <option value="Belarus">Belarus</option>
                                                        <option value="Brazil">Brazil</option>
                                                        <option value="Canada">Canada</option>
                                                        <option value="China">China</option>
                                                        <option value="France">France</option>
                                                        <option value="Germany">Germany</option>
                                                        <option value="India">India</option>
                                                        <option value="Indonesia">Indonesia</option>
                                                        <option value="Israel">Israel</option>
                                                        <option value="Italy">Italy</option>
                                                        <option value="Japan">Japan</option>
                                                        <option value="Korea">Korea, Republic of</option>
                                                        <option value="Mexico">Mexico</option>
                                                        <option value="Philippines">Philippines</option>
                                                        <option value="Russia">Russian Federation</option>
                                                        <option value="South Africa">South Africa</option>
                                                        <option value="Thailand">Thailand</option>
                                                        <option value="Turkey">Turkey</option>
                                                        <option value="Ukraine">Ukraine</option>
                                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                                        <option value="United Kingdom">United Kingdom</option>
                                                        <option value="United States">United States</option>
                                                    </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="71" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-modalAddressCountry-container"><span class="select2-selection__rendered" id="select2-modalAddressCountry-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder">Select value</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div>
                                            </div>
                                        </div>
                                        <div class="col-12 ">
                                            <label class="form-label" for="modalAddressAddress1">Address Line 1</label>
                                            <input type="text" id="modalAddressAddress1" name="modalAddressAddress1" class="form-control" placeholder="12, Business Park">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label" for="modalAddressAddress2">Address Line 2</label>
                                            <input type="text" id="modalAddressAddress2" name="modalAddressAddress2" class="form-control" placeholder="Mall Road">
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label" for="modalAddressLandmark">Landmark</label>
                                            <input type="text" id="modalAddressLandmark" name="modalAddressLandmark" class="form-control" placeholder="Nr. Hard Rock Cafe">
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label" for="modalAddressCity">City</label>
                                            <input type="text" id="modalAddressCity" name="modalAddressCity" class="form-control" placeholder="Los Angeles">
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label" for="modalAddressLandmark">State</label>
                                            <input type="text" id="modalAddressState" name="modalAddressState" class="form-control" placeholder="California">
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label" for="modalAddressZipCode">Zip Code</label>
                                            <input type="text" id="modalAddressZipCode" name="modalAddressZipCode" class="form-control" placeholder="99950">
                                        </div>
                                        <div class="col-12">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input">
                                                <span class="switch-toggle-slider">
                                                    <span class="switch-on"></span>
                                                    <span class="switch-off"></span>
                                                </span>
                                                <span class="switch-label">Use as a billing address?</span>
                                            </label>
                                        </div>
                                        <div class="col-12 text-center">
                                            <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                                            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                        </div>
                                        <input type="hidden">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Add New Address Modal -->

                </div>
                <!-- / Content -->

                <div class="content-backdrop fade"></div>
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