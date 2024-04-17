$(document).ready(function () {
  obtenerProductos(),
    obtenerProductosTienda(),
    cargarProductosPorCodigo(codigoProducto);
});


/* --------------------------------------------------------------- Traer EL PRODUCTO MEDIANTE a la tienda --------------------------------------------------------------- */

function obtenerProductos() {
  $.ajax({
    url: '../admin/Controllers/productoController.php?op=obtenerProductoCliente',
    method: 'GET',
    dataType: 'json',
    success: function (response) {
      if (response && !response.error) {
        $('#contenedor-productos').empty();

        var productosMostrados = 0; // Contador de productos mostrados

        $.each(response, function (index, producto) {
          if (productosMostrados < 3) { // Mostrar solo 3 productos
            var html = `
                              <div class="col-xl-3 col-lg-4 col-sm-6">
                                  <div class="product text-center">
                                      <div class="position-relative mb-3">
                                          <div class="badge text-white bg-"></div>
                                          <a class="d-block" href="detail.php?codigoProducto=${producto.codigoProducto}">
                                          <img class="img-fluid w-100" src="img/Street_Dreams.png" alt="${producto.nombreProducto}">
                                        </a>
                                          <div class="product-overlay">
                                              <ul class="mb-0 list-inline">
                                              <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="cart.php">Añadir al carrito</a></li>
                                              <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark" href="#productView" data-bs-toggle="modal"><i class="fas fa-expand"></i></a></li>
                                              </ul>
                                          </div>
                                      </div>
                                      <h6><a class="reset-anchor" href="detail.php">${producto.nombreProducto}</a></h6>
                                      <p class="small text-muted">₡ ${producto.precio}</p>
                                      </div>
                              </div>
                          `;
            $('#contenedor-productos').append(html);
            productosMostrados++; // Incrementar el contador de productos mostrados
          } else {
            return false; // Salir del bucle $.each() después de mostrar 3 productos
          }
        });
      } else {
        console.error('Error al obtener los productos:', response.error);
      }
    },
    error: function (xhr, status, error) {
      console.error('Error al obtener los productos:', status, error);
    }
  });
}

function obtenerProductosTienda() {
  $.ajax({
    url: '../admin/Controllers/productoController.php?op=obtenerProductoTienda',
    method: 'GET', // Utilizamos el método GET para solicitar los datos
    dataType: 'json',
    success: function (response) {
      // Verificar si se recibieron datos válidos del servidor
      if (response && !response.error) {
        // Limpiar el contenedor de productos
        $('#contenedor-productos-Tienda').empty();

        // Iterar sobre los productos recibidos y mostrarlos en el HTML
        $.each(response, function (index, producto) {
          var html = `
          <div class="col-lg-4 col-sm-6">
          <div class="product text-center">
            <div class="mb-3 position-relative">
              <div class="badge text-white bg-primary">Nuevo</div>
              <a class="d-block" href="detail.php?codigoProducto=${producto.codigoProducto}">
              <img class="img-fluid w-100" src="img/Street_Dreams.png" alt="${producto.nombreProducto}">
            </a>
              <div class="product-overlay">
                <ul class="mb-0 list-inline">
                  <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="cart.php">Añadir al carrito</a></li>
                  <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark" href="#productView" data-bs-toggle="modal"><i class="fas fa-expand"></i></a></li>
                </ul>
              </div>
            </div>
            <h6><a class="reset-anchor" href="detail.html">${producto.nombreProducto}</a></h6>
            <p class="small text-muted">₡ ${producto.precio}</p>
          </div>
        </div>
        `;
          $('#contenedor-productos-Tienda').append(html);
        });

      } else {
        // Mostrar mensaje de error si no se recibieron datos válidos
        console.error('Error al obtener los productos:', response.error);
      }
    },
    error: function (xhr, status, error) {
      console.error('Error al obtener los productos:', status, error);
    }
  });
}


function obtenerCodigoProductoDesdeURL() {
  var parametros = new URLSearchParams(window.location.search);
  var codigoProducto = parametros.get('codigoProducto');
  return codigoProducto;
}

var codigoProducto = obtenerCodigoProductoDesdeURL();

function cargarProductosPorCodigo(codigoProducto) {

  $.ajax({
    url: '../admin/Controllers/productoController.php?op=obtenerProductoPorCodigo',
    type: 'POST',
    dataType: 'json',
    data: { codigoProducto: codigoProducto },
    success: function (data) {
      if (data && !data.error) {
        var producto = data;
        // Actualizar el HTML con los detalles del producto
        var imagenURL = producto.imagenURLProducto;
        $('.swiper-thumb-item img').attr('src', '../Admin/Views/dist/images/' + imagenURL);
        $('.swiper-slide img').attr('src', '../Admin/Views/dist/images/' + imagenURL);

        // Actualizar el nombre del producto en el contenedor
        $('#contenedor-producto .nombreProducto').text(producto.nombreProducto);
        $('#contenedor-producto .precioProducto').text('₡ ' + producto.precio);
        $('#contenedor-producto .descripcionProducto').text(producto.descripcionProducto);
        $('#contenedor-producto .enStock').text(producto.enStock);
        $('#contenedor-producto .codigoProducto').text(producto.codigoProducto);
        $('#contenedor-producto .nombreCategoria').text(producto.nombreCategoria);

      } else {
        console.error('Error al cargar el producto:', data.error);
      }
    },
    error: function () {
      console.error('Error al cargar el producto');
    }
  });
}




