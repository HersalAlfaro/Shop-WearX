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


    <section class="py-5">
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-6">
            <!-- PRODUCT SLIDER-->
            <div class="row m-sm-0">
              <div class="col-sm-2 p-sm-0 order-2 order-sm-1 mt-2 mt-sm-0 px-xl-2">
                <div class="swiper product-slider-thumbs">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide h-auto swiper-thumb-item mb-3"><img class="w-100" src="img/Steet Dreams.png" alt="..."></div>
                    <div class="swiper-slide h-auto swiper-thumb-item mb-3"><img class="w-100" src="img/Steet Dreams.png" alt="..."></div>
                    <div class="swiper-slide h-auto swiper-thumb-item mb-3"><img class="w-100" src="img/Steet Dreams.png" alt="..."></div>
                    <div class="swiper-slide h-auto swiper-thumb-item mb-3"><img class="w-100" src="img/Steet Dreams.png" alt="..."></div>
                  </div>
                </div>
              </div>
              <div class="col-sm-10 order-1 order-sm-2">
                <div class="swiper product-slider">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide h-auto"><a class="glightbox product-view" href="" data-gallery="gallery2" data-glightbox="Product item 1"><img class="img-fluid" src="img/Steet Dreams.png" alt="..."></a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- PRODUCT DETAILS-->
          <div class="col-lg-6 mb-5" id="contenedor-producto">
            <h1 class="nombreProducto"></h1>
            <p class="text-muted lead precioProducto">₡</p>
            <p class="text-sm mb-4 descripcionProducto"></p>

            <div class="row align-items-stretch mb-4">
              <div class="col-sm-5 pr-sm-0">
                <div class="border d-flex align-items-center justify-content-between py-1 px-3 bg-white border-white">
                  <span class="small text-uppercase text-gray mr-4 no-select">Cantidad</span>
                  <div class="quantity">
                    <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                    <input class="form-control border-0 shadow-0 p-0" type="text" value="1">
                    <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                  </div>
                </div>
              </div>
              <div class="col-sm-3 pl-sm-0">
                <a class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0" href="carrito.php">Añadir al carrito</a>
              </div>
            </div>

            <br>
            <ul class="list-unstyled small d-inline-block">
              <li class="px-3 py-2 mb-1 bg-white"><strong class="text-uppercase">Stock:</strong><span class="ms-2 text-muted enStock"></span></li>
              <li class="px-3 py-2 mb-1 bg-white"><strong class="text-uppercase">Codigo:</strong><span class="ms-2 text-muted codigoProducto"></span></li>
              <li class="px-3 py-2 mb-1 bg-white text-muted"><strong class="text-uppercase text-dark">Categoria:</strong><span class="ms-2 text-muted nombreCategoria"></span><a class="reset-anchor ms-2" href="#!"></a></li>
            </ul>
          </div>

        </div>

        <!-- RELATED PRODUCTS-->
        <h2 class="h5 text-uppercase mb-4">Productos relacionados</h2>

        <div class="row">
          <!-- PRODUCT-->
          <div id="contenedor-productos">
            <!-- Aquí se mostrarán los productos -->
          </div>
          <!-- PRODUCT-->

        </div>
      </div>
    </section>

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