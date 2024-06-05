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
              <h1 class="h2 text-uppercase mb-0">Carrito</h1>
            </div>
            <div class="col-lg-6 text-lg-end">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                  <li class="breadcrumb-item"><a class="text-dark" href="index.php">Inicio</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Carrito</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>
      <section class="py-5">
        <h2 class="h5 text-uppercase mb-4">Compras</h2>
        <div class="row">
          <div class="col-lg-8 mb-4 mb-lg-0">
            <!-- CART TABLE-->
            <div class="table-responsive mb-4">
              <table class="table text-nowrap">
                <thead class="bg-light">
                  <tr>
                    <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Producto</strong></th>
                    <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Precio</strong></th>
                    <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Cantidad</strong></th>
                    <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Total</strong></th>
                    <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase"></strong></th>
                  </tr>
                </thead>
                <tbody class="border-0">
                  <tr>
                    <th class="ps-0 py-3 border-light" scope="row">
                      <div class="d-flex align-items-center"><a class="reset-anchor d-block animsition-link" href="detail.php"><img src="img/product-detail-3.jpg" alt="..." width="70" /></a>
                        <div class="ms-3"><strong class="h6"><a class="reset-anchor animsition-link" href="detail.php">Red digital smartwatch</a></strong></div>
                      </div>
                    </th>
                    <td class="p-3 align-middle border-light">
                      <p class="mb-0 small">$250</p>
                    </td>
                    <td class="p-3 align-middle border-light">
                      <div class="border d-flex align-items-center justify-content-between px-3"><span class="small text-uppercase text-gray headings-font-family">Quantity</span>
                        <div class="quantity">
                          <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                          <input class="form-control form-control-sm border-0 shadow-0 p-0" type="text" value="1" />
                          <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                        </div>
                      </div>
                    </td>
                    <td class="p-3 align-middle border-light">
                      <p class="mb-0 small">$250</p>
                    </td>
                    <td class="p-3 align-middle border-light"><a class="reset-anchor" href="#!"><i class="fas fa-trash-alt small text-muted"></i></a></td>
                  </tr>
                  <tr>
                    <th class="ps-0 py-3 border-0" scope="row">
                      <div class="d-flex align-items-center"><a class="reset-anchor d-block animsition-link" href="detail.php"><img src="img/product-detail-2.jpg" alt="..." width="70" /></a>
                        <div class="ms-3"><strong class="h6"><a class="reset-anchor animsition-link" href="detail.php">Apple watch</a></strong></div>
                      </div>
                    </th>
                    <td class="p-3 align-middle border-0">
                      <p class="mb-0 small">$250</p>
                    </td>
                    <td class="p-3 align-middle border-0">
                      <div class="border d-flex align-items-center justify-content-between px-3"><span class="small text-uppercase text-gray headings-font-family">Quantity</span>
                        <div class="quantity">
                          <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                          <input class="form-control form-control-sm border-0 shadow-0 p-0" type="text" value="1" />
                          <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                        </div>
                      </div>
                    </td>
                    <td class="p-3 align-middle border-0">
                      <p class="mb-0 small">$250</p>
                    </td>
                    <td class="p-3 align-middle border-0"><a class="reset-anchor" href="#!"><i class="fas fa-trash-alt small text-muted"></i></a></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- CART NAV-->
            <div class="bg-light px-4 py-3">
              <div class="row align-items-center text-center">
                <div class="col-md-6 mb-3 mb-md-0 text-md-start"><a class="btn btn-link p-0 text-dark btn-sm" href="shop.php"><i class="fas fa-long-arrow-alt-left me-2"> </i>Seguir comprando</a></div>
                <div class="col-md-6 text-md-end"><a class="btn btn-outline-dark btn-sm" href="checkout.php">Proceder al pago<i class="fas fa-long-arrow-alt-right ms-2"></i></a></div>
              </div>
            </div>
          </div>
          <!-- ORDER TOTAL-->
          <div class="col-lg-4">
            <div class="card border-0 rounded-0 p-lg-4 bg-light">
              <div class="card-body">
                <h5 class="text-uppercase mb-4">Total del carrito</h5>
                <ul class="list-unstyled mb-0">
                  <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">Subtotal</strong><span class="text-muted small">$250</span></li>
                  <li class="border-bottom my-2"></li>
                  <li class="d-flex align-items-center justify-content-between mb-4"><strong class="text-uppercase small font-weight-bold">Total</strong><span>$250</span></li>
                </ul>
              </div>
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