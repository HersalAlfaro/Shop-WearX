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

      <!-- WELCOME-->
      <section class="welcome p-t-10">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h1 class="title-4">Bienvenido de nuevo
                <span>
                  <?php
                  echo "nombre"
                  ?>
                </span>
              </h1>
              <hr class="line-seprate">
            </div>
          </div>
        </div>
      </section>
      <!-- END WELCOME-->

      <!-- STATISTIC-->
      <section class="statistic statistic2">
        <?php
        include 'fragments/stats.php'
        ?>
      </section>
      <!-- END STATISTIC-->

      <!-- STATISTIC CHART-->
      <section class="statistic-chart">
        <?php
        include 'fragments/statsCharts.php'
        ?>
      </section>
      <!-- END STATISTIC CHART-->

      <!-- DATA TABLE-->
      <section class="p-t-20">
        <?php
        include 'fragments/dataTable.php'
        ?>
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
  

</body>

</html>
<!-- end document-->