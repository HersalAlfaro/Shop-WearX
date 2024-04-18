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
              <h1 class="h2 text-uppercase mb-0">Checkout</h1>
            </div>
            <div class="col-lg-6 text-lg-end">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                  <li class="breadcrumb-item"><a class="text-dark" href="index.php">Inicio</a></li>
                  <li class="breadcrumb-item"><a class="text-dark" href="cart.php">Carrito</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>
      <section class="py-5">
        <!-- BILLING ADDRESS-->
        <h2 class="h5 text-uppercase mb-4">Detalle Compra</h2>
        <div class="row">
          <div class="col-lg-8">
            <form action="#">
              <div class="row gy-3">
                <div class="col-lg-6">
                  <label class="form-label text-sm text-uppercase" for="firstName">Primer Nombre </label>
                  <input class="form-control form-control-lg" type="text" id="firstName" placeholder="Ingrese su primer Nombre">
                </div>
                <div class="col-lg-6">
                  <label class="form-label text-sm text-uppercase" for="lastName">Apellidos </label>
                  <input class="form-control form-control-lg" type="text" id="lastName" placeholder="Ingrese sus apellidos">
                </div>
                <div class="col-lg-6">
                  <label class="form-label text-sm text-uppercase" for="email">Correo Electronico</label>
                  <input class="form-control form-control-lg" type="email" id="email" placeholder="e.g. Jason@example.com">
                </div>
                <div class="col-lg-6">
                  <label class="form-label text-sm text-uppercase" for="phone">Numero Telefono </label>
                  <input class="form-control form-control-lg" type="tel" id="phone" placeholder="e.g. +506 245354745">
                </div>
                <div class="col-lg-6">
                  <label class="form-label text-sm text-uppercase" for="company">Company name (optional) </label>
                  <input class="form-control form-control-lg" type="text" id="company" placeholder="Your company name">
                </div>
                <div class="col-lg-6 form-group">
                  <label class="form-label text-sm text-uppercase" for="country">Region</label>
                  <select class="country" id="country" data-customclass="form-control form-control-lg rounded-0">
                    <option value>Escoge tu país</option>
                  </select>
                </div>
                <div class="col-lg-12">
                  <label class="form-label text-sm text-uppercase" for="address">Direccion 1 </label>
                  <input class="form-control form-control-lg" type="text" id="address" placeholder="House number and street name">
                </div>
                <div class="col-lg-12">
                  <label class="form-label text-sm text-uppercase" for="addressalt">Direccion 2</label>
                  <input class="form-control form-control-lg" type="text" id="addressalt" placeholder="Apartment, Suite, Unit, etc (optional)">
                </div>
                <div class="col-lg-6">
                  <label class="form-label text-sm text-uppercase" for="city">Ciudad </label>
                  <input class="form-control form-control-lg" type="text" id="city">
                </div>
                <div class="col-lg-6">
                  <label class="form-label text-sm text-uppercase" for="state">Estado/Provincia</label>
                  <input class="form-control form-control-lg" type="text" id="state">
                </div>
               
                <div class="col-lg-12 form-group">
                  <button class="btn btn-dark" type="submit">Realizar pedido</button>
                </div>
              </div>
            </form>
          </div>
          
          <!-- ORDER SUMMARY-->
          <div class="col-lg-4">
            <div class="card border-0 rounded-0 p-lg-4 bg-light">
              <div class="card-body">
                <h5 class="text-uppercase mb-4">SU PEDIDO</h5>
                <ul class="list-unstyled mb-0">
                  <li class="d-flex align-items-center justify-content-between"><strong class="small fw-bold">Gray Nike running shoes</strong><span class="text-muted small">$21.000</span></li>
                  <li class="border-bottom my-2"></li>
                  <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small fw-bold">Total</strong><span>$21.000</span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <footer class="bg-dark text-white">

    </footer>
    <!-- JavaScript files-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/glightbox/js/glightbox.min.js"></script>
    <script src="vendor/nouislider/nouislider.min.js"></script>
    <script src="vendor/swiper/swiper-bundle.min.js"></script>
    <script src="vendor/choices.js/public/assets/scripts/choices.min.js"></script>
    <script src="js/front.js"></script>
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
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </div>
</body>

</html>