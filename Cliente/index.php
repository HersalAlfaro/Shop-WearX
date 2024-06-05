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
    <!-- BANNER SECTION -->
    <div class="container">
      <section class="hero pb-3 bg-cover bg-center d-flex align-items-center" style="background: url(img/.jpg)">
        <div class="container py-5">
          <div class="row px-4 px-lg-5">
            <div class="col-lg-6">
              <p class="text-muted small text-uppercase mb-2">Nuevos Ingresos</p>
              <h1 class="h2 text-uppercase mb-3">20% off en nueva temporada</h1><a class="btn btn-dark" href="tienda.php">Buscar Colección</a>
            </div>
          </div>
        </div>
      </section>


      <!-- CATEGORIES SECTION-->
      <section class="pt-5">
        <header class="text-center">
          <p class="small text-muted small text-uppercase mb-1">COLECCIONES CUIDADOSAMENTE CREADAS</p>
          <h2 class="h5 text-uppercase mb-4">Busca tu categoria</h2>
        </header>
        <div class="row">
          <div class="col-md-4"><a class="category-item" href="tienda.php"><img class="img-fluid" src="img/hoodie-negro.jpeg" alt="" /><strong class="category-item-title">T-Shirts</strong></a>
          </div>
          <div class="col-md-4"><a class="category-item mb-4" href="tienda.php"><img class="img-fluid" src="img/hoodie-negro.jpeg" alt="hododie" /><strong class="category-item-title">Hoodies</strong></a>
          </div>
          <div class="col-md-4"><a class="category-item" href="tienda.php"><img class="img-fluid" src="img/hoodie-negro.jpeg" alt="" /><strong class="category-item-title">Hoodies</strong></a>
          </div>
        </div>
      </section>

      <!-- TRENDING PRODUCTS-->
      <section class="py-5">
        <header>
          <p class="small text-muted small text-uppercase mb-1">HECHO DEL CAMINO DIFÍCIL</p>
          <h2 class="h5 text-uppercase mb-4">Productos Destacados</h2>
        </header>
        <div class="row">
          <!-- PRODUCT-->
          <div id="contenedor-productos" class="row">
            <!-- Aquí se mostrarán los productos -->
          </div>

        </div>
      </section>


      <!-- SERVICES-->
      <section class="py-5 bg-light">
        <div class="container">
          <div class="row text-center gy-3">
            <div class="col-lg-4">
              <div class="d-inline-block">
                <div class="d-flex align-items-end">
                  <svg class="svg-icon svg-icon-big svg-icon-light">
                    <use xlink:href="#delivery-time-1"> </use>
                  </svg>
                  <div class="text-start ms-3">
                    <h6 class="text-uppercase mb-1">Envio Gratis</h6>
                    <p class="text-sm mb-0 text-muted">Envio gratis dentro del GAM</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="d-inline-block">
                <div class="d-flex align-items-end">
                  <svg class="svg-icon svg-icon-big svg-icon-light">
                    <use xlink:href="#helpline-24h-1"> </use>
                  </svg>
                  <div class="text-start ms-3">
                    <h6 class="text-uppercase mb-1">Calidad</h6>
                    <p class="text-sm mb-0 text-muted">La mejor calidad en nuestros productos</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="d-inline-block">
                <div class="d-flex align-items-end">
                  <svg class="svg-icon svg-icon-big svg-icon-light">
                    <use xlink:href="#label-tag-1"> </use>
                  </svg>
                  <div class="text-start ms-3">
                    <h6 class="text-uppercase mb-1">Ofertas Mensuales</h6>
                    <p class="text-sm mb-0 text-muted">Ofertas mensuales para miembros VIP</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Noticias-->
      <section class="py-5">
        <?php
        include 'fragments/noticias.php'
        ?>
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