<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tienda WearX</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <!-- gLightbox gallery-->
  <link rel="stylesheet" href="vendor/glightbox/css/glightbox.min.css">
  <!-- Range slider-->
  <link rel="stylesheet" href="vendor/nouislider/nouislider.min.css">
  <!-- Choices CSS-->
  <link rel="stylesheet" href="vendor/choices.js/public/assets/styles/choices.min.css">
  <!-- Swiper slider-->
  <link rel="stylesheet" href="vendor/swiper/swiper-bundle.min.css">
  <!-- Google fonts-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="css/custom.css">
  <!-- Favicon-->
  <link rel="shortcut icon" href="img/favicon.png">
</head>

<body>
  <div class="page-holder">
    <!-- navbar-->
    <header class="header bg-white">

      <?php
      include 'fragments/header.php'
      ?>

    </header>

    <!--  Modal -->
    <div class="modal fade" id="productView" tabindex="-1">
      <?php
      include 'fragments/modal.php'
      ?>
    </div>

    <div class="container">
      <!-- HERO SECTION-->
      <section class="py-5 bg-light">
        <div class="container">
          <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
            <div class="col-lg-6">
              <h1 class="h2 text-uppercase mb-0">Tienda</h1>
            </div>
            <div class="col-lg-6 text-lg-end">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                  <li class="breadcrumb-item"><a class="text-dark" href="index.php">Inicio</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Tienda</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>

      <section class="py-5">
        <div class="container p-0">
          <div class="row">
            <!-- SHOP SIDEBAR-->
            <div class="col-lg-3 order-2 order-lg-1">
              <h5 class="text-uppercase mb-4">Categorias</h5>
              <div class="py-2 px-4 bg-dark text-white mb-3"><strong class="small text-uppercase fw-bold">Ropa</strong></div>
              <ul class="list-unstyled small text-muted ps-lg-4 font-weight-normal">
                <li class="mb-2"><a class="reset-anchor" href="#!">T-Shirts</a></li>
                <li class="mb-2"><a class="reset-anchor" href="#!">Hoodies</a></li>
              </ul>
              <div class="py-2 px-4 bg-light mb-3"><strong class="small text-uppercase fw-bold">Estilos</strong></div>
              <ul class="list-unstyled small text-muted ps-lg-4 font-weight-normal">
                <li class="mb-2"><a class="reset-anchor" href="#!">Essentials</a></li>
                <li class="mb-2"><a class="reset-anchor" href="#!">Basics</a></li>
                <li class="mb-2"><a class="reset-anchor" href="#!">Design</a></li>
              </ul>
              <div class="py-2 px-4  mb-3"></div>

              <h6 class="text-uppercase mb-4">Rango de Precios</h6>
              <div class="price-range pt-4 mb-5">
                <div id="range"></div>
                <div class="row pt-2">
                  <div class="col-6"><strong class="small fw-bold text-uppercase">Desde</strong></div>
                  <div class="col-6 text-end"><strong class="small fw-bold text-uppercase">Hasta</strong></div>
                </div>
              </div>
              <h6 class="text-uppercase mb-3">Mostrar Solo</h6>
              <div class="form-check mb-1">
                <input class="form-check-input" type="checkbox" id="checkbox_1">
                <label class="form-check-label" for="checkbox_1">Acepta Reembolso</label>
              </div>
              <div class="form-check mb-1">
                <input class="form-check-input" type="checkbox" id="checkbox_6">
                <label class="form-check-label" for="checkbox_6">No Authentic</label>
              </div>
              <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" id="checkbox_6">
                <label class="form-check-label" for="checkbox_6">Sello Autorizado</label>
              </div>
              <h6 class="text-uppercase mb-3">Formato De Compra</h6>
              <div class="form-check mb-1">
                <input class="form-check-input" type="radio" name="customRadio" id="radio_2">
                <label class="form-check-label" for="radio_2">Ofertas</label>
              </div>
              <div class="form-check mb-1">
                <input class="form-check-input" type="radio" name="customRadio" id="radio_4">
                <label class="form-check-label" for="radio_4">Entrega Inmediata</label>
              </div>
            </div>
            <!-- SHOP LISTING-->
            <div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
              <div class="row mb-3 align-items-center">
                <div class="col-lg-6 mb-2 mb-lg-0">
                  <p class="text-sm text-muted mb-0">Showing 1–12 of 53 results</p>
                </div>
                <div class="col-lg-6">
                  <ul class="list-inline d-flex align-items-center justify-content-lg-end mb-0">
                    <li class="list-inline-item text-muted me-3"><a class="reset-anchor p-0" href="#!"><i class="fas fa-th-large"></i></a></li>
                    <li class="list-inline-item text-muted me-3"><a class="reset-anchor p-0" href="#!"><i class="fas fa-th"></i></a></li>
                    <li class="list-inline-item">
                      <select class="selectpicker" data-customclass="form-control form-control-sm">
                        <option value>Sort By </option>
                        <option value="default">Default sorting </option>
                        <option value="popularity">Popularity </option>
                        <option value="low-high">Price: Low to High </option>
                        <option value="high-low">Price: High to Low </option>
                      </select>
                    </li>
                  </ul>
                </div>
              </div>

              <div class="row">
            
                <!-- PRODUCT-->
                <div id="contenedor-productos-Tienda" class="row">
                  <!-- Aquí se mostrarán los productos -->
                </div>
                <!-- PRODUCT-->

              </div>
              <!-- PAGINATION-->
              <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center justify-content-lg-end">
                  <li class="page-item mx-1"><a class="page-link" href="#!" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                  <li class="page-item mx-1 active"><a class="page-link" href="#!">1</a></li>
                  <li class="page-item mx-1"><a class="page-link" href="#!">2</a></li>
                  <li class="page-item mx-1"><a class="page-link" href="#!">3</a></li>
                  <li class="page-item ms-1"><a class="page-link" href="#!" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </section>
    </div>
    <footer class="bg-dark text-white">
      <?php
      include 'fragments/footer.php';
      ?>
    </footer>
    <!-- JavaScript files-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/glightbox/js/glightbox.min.js"></script>
    <script src="vendor/nouislider/nouislider.min.js"></script>
    <script src="vendor/swiper/swiper-bundle.min.js"></script>
    <script src="vendor/choices.js/public/assets/scripts/choices.min.js"></script>
    <script src="js/front.js"></script>
    <!-- Nouislider Config-->
    <script>
      var range = document.getElementById('range');
      noUiSlider.create(range, {
        range: {
          'min': 0,
          'max': 2000
        },
        step: 5,
        start: [100, 1000],
        margin: 300,
        connect: true,
        direction: 'ltr',
        orientation: 'horizontal',
        behaviour: 'tap-drag',
        tooltips: true,
        format: {
          to: function(value) {
            return '$' + value;
          },
          from: function(value) {
            return value.replace('', '');
          }
        }
      });
    </script>
    <script>
      // ------------------------------------------------------- //
      //   Inject SVG Sprite - 
      //   see more here 
      //   https://css-tricks.com/ajaxing-svg-sprite/
      // ------------------------------------------------------ //
      function injectSvgSprite(path) {

        var ajax = new XMLHttpRequest();
        ajax.open("GET", path, true);
        ajax.send();
        ajax.onload = function(e) {
          var div = document.createElement("div");
          div.className = 'd-none';
          div.innerHTML = ajax.responseText;
          document.body.insertBefore(div, document.body.childNodes[0]);
        }
      }
      // this is set to BootstrapTemple website as you cannot 
      // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
      // while using file:// protocol
      // pls don't forget to change to your domain :)
      injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg');
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../Admin/Views/dist/js/producto.js"></script>
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </div>

</body>

</html>