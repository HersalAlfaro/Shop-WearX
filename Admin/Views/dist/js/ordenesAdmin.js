function limpiarForms() {
  $('#modulos_add').trigger('reset');
  $('#modulos_update').trigger('reset');
}

$(function () {
  //Initialize Select2 Elements
  $('.select2-options').select2({
    minimumResultsForSearch: Infinity, // Deshabilita la barra de búsqueda
  })
})

function borrarDatos() {
  $("#cliente").val("");
  $("#producto").val("");
  $("#nombreCliente").val("");
  $("#apellidoCliente").val("");
  $("#segundoApCliente").val("");
  $("#correo").val("");
  $("#provincia").val("");
  $("#distrito").val("");
  $("#canton").val("");
  $("#otros").val("");
  $("#precio").val("");
  $("#cantidad").val("");
  $("#montoTotal").val("");
  $("#sizeProducto").val("");
  $("#color").val("");
  $("#fechaOrden").val("");
  $("#estadoOrden").val("");
}
/* ---------------------------------------------------------------cargar los clientes--------------------------------------------------------------- */


function cargarCliente() {
  $.ajax({
    url: '../../admin/Controllers/clienteController.php?op=cargarCliente',
    type: 'POST',
    dataType: 'json',
    success: function (data) {
      var selectCliente = $('#cliente, #Ecliente');
      selectCliente.empty();

      selectCliente.append('<option value="" disabled selected>Seleccionar Cliente</option>');

      if (data && data.length > 0) {
        $.each(data, function (index, cliente) {
          // Agrega una opción para cada cliente con nombre y apellido
          selectCliente.append('<option value="' + cliente.Cedula + '">' + cliente.nombreCliente + ' ' + cliente.apellidoCliente + ' ' + cliente.segundoApCliente + '</option>');
        });

        // Evento change para el select de clientes
        selectCliente.change(function () {
          // Obtiene el cliente seleccionado
          var selectedClienteCedula = $(this).val();

          // Encuentra el cliente seleccionado en el array 'data'
          var selectedCliente = data.find(function (cliente) {
            return cliente.Cedula == selectedClienteCedula;
          });

          // Llena los campos con la información del cliente seleccionado
          if (selectedCliente) {
            $("#nombreCliente, #EnombreCliente").val(selectedCliente.nombreCliente);
            $("#apellidoCliente, #EapellidoCliente").val(selectedCliente.apellidoCliente);
            $("#segundoApCliente, #EsegundoApCliente").val(selectedCliente.segundoApCliente);
            $("#correo, #Ecorreo").val(selectedCliente.correo);
            $("#provincia, #Eprovincia").val(selectedCliente.provincia);
            $("#distrito, #Edistrito").val(selectedCliente.distrito);
            $("#canton, #Ecanton").val(selectedCliente.canton);
            $("#otros, #Eotros").val(selectedCliente.otros);
          }
        });
      }
    },
    error: function () {
      console.log('Error al cargar clientes');
    }
  });
}

$(document).ready(function () {
  cargarCliente();
});


/* ---------------------------------------------------------------cargar los productos--------------------------------------------------------------- */

function cargarProducto() {
  $.ajax({
    url: '../../admin/Controllers/productoController.php?op=cargarProducto',
    type: 'POST',
    dataType: 'json',
    success: function (data) {
      var selectProducto = $('#producto, #Eproducto');
      selectProducto.empty();

      selectProducto.append('<option value="" disabled selected>Seleccionar Producto</option>');

      if (data && data.length > 0) {
        $.each(data, function (index, producto) {
          // Agrega una opción para cada producto con nombre y descripción
          selectProducto.append('<option value="' + producto.codigoProducto + '">' + producto.nombreProducto + ' - ' + producto.descripcionProducto + '</option>');
        });

        // Evento change para el select de productos
        selectProducto.change(function () {
          // Obtiene el producto seleccionado
          var selectedProductoCodigo = $(this).val();

          // Encuentra el producto seleccionado en el array 'data'
          var selectedProducto = data.find(function (producto) {
            return producto.codigoProducto == selectedProductoCodigo;
          });

          if (selectedProducto) {
            // Llena los campos con la información del producto seleccionado
            $("#precio, #Eprecio").val(selectedProducto.precio);
            $("#cantidad, #Ecantidad").attr("min", 1);
            $("#cantidad, #Ecantidad").attr("max", selectedProducto.enStock);

            // Llena el select de tallas
            var selectTallas = $("#sizeProducto, #EsizeProducto");
            selectTallas.empty();
            selectTallas.append('<option value="" disabled selected>Seleccionar Talla</option>');
            // Agrega cada talla al select
            selectedProducto.tallas.forEach(function (talla) {
              selectTallas.append('<option value="' + talla + '">' + talla + '</option>');
            });

            // Llena el select de colores
            var selectColores = $("#color, #Ecolor");
            selectColores.empty();
            selectColores.append('<option value="" disabled selected>Seleccionar Color</option>');
            // Agrega cada color al select
            selectedProducto.colores.forEach(function (color) {
              selectColores.append('<option value="' + color + '">' + color + '</option>');
            });

            // Calcular el monto total al cambiar la cantidad
            $("#cantidad, #Ecantidad").on("input", function () {
              var cantidad = parseInt($(this).val());
              var precio = parseFloat(selectedProducto.precio);
              var montoTotal = cantidad * precio;
              $("#montoTotal, #EmontoTotal").val(montoTotal.toFixed(2)); // Redondear a 2 decimales
            });
          }
        });
      }
    },
    error: function () {
      console.log('Error al cargar productos');
    }
  });
}

$(document).ready(function () {
  cargarProducto();
});


/* ---------------------------------------------------------------LISTAR LOS Ordenes--------------------------------------------------------------- */
function listarOrdenes() {
  tabla = $('#lista-Ordenes').dataTable({
    aProcessing: true, //actiavmos el procesamiento de datatables
    aServerSide: true, //paginacion y filtrado del lado del serevr
    dom: 'Bfrtip', //definimos los elementos del control de tabla
    buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdf'],
    ajax: {
      url: '../../admin/Controllers/ordenController.php?op=listaTabla',
      type: 'get',
      dataType: 'json',
      error: function (e) {
        console.log(e.responseText);
      },

      bDestroy: true,
      iDisplayLength: 5,

    }, language: {
      sProcessing: "Procesando...", // Mensaje de procesamiento
      sLengthMenu: "Mostrar _MENU_ registros", // Menú para seleccionar cantidad de registros por página
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo: "Mostrando _START_ al _END_ de _TOTAL_ registros",
      sInfoEmpty: "Mostrando 0 al 0 de 0 registros",
      sInfoFiltered: "(filtrado de _MAX_ registros en total)",
      sInfoPostFix: "",
      sSearch: "Buscar:",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      oAria: {
        sSortAscending: ": Activar para ordenar la columna en orden ascendente",
        sSortDescending: ": Activar para ordenar la columna en orden descendente",
      },
    },
    columns: [
      { data: "0", visible: true },
      // ID de Ordenes
      {
        data: null,
        render: function (data, type, row) {
          return `
                <div class="d-flex align-items-center">
                    <div class="d-flex flex-column justify-content-center">
                        <span class="text-body text-wrap fw-medium">${data[1]}</span>
                    </div>
                </div>
                `;
        }
      },
      // Cedula
      {
        data: null,
        render: function (data, type, row) {
          return `
                <div class="d-flex align-items-center">
                    <div class="d-flex flex-column justify-content-center">
                        <span class="text-body text-wrap fw-medium">${data[2]}</span>
                    </div>
                </div>
                `;
        }
      },
      // Codigo
      {
        data: null,
        render: function (data, type, row) {
          return `
                <div class="d-flex align-items-center">
                    <div class="d-flex flex-column justify-content-center">
                        <span class="text-body text-wrap fw-medium">${data[3]}</span>
                    </div>
                </div>
                `;
        }
      },
      // Cantidad
      {
        data: null,
        render: function (data, type, row) {
          return `
                <div class="d-flex align-items-center">
                    <div class="d-flex flex-column justify-content-center">
                        <span class="text-body text-wrap fw-medium">${data[4]}</span>
                    </div>
                </div>
                `;
        }
      },
      // monto
      {
        data: null,
        render: function (data, type, row) {
          return `
                <div class="d-flex align-items-center">
                    <div class="d-flex flex-column justify-content-center">
                        <span class="text-body text-wrap fw-medium">${data[5]}</span>
                    </div>
                </div>
                `;
        }
      },
      // fecha
      {
        data: null,
        render: function (data, type, row) {
          return `
                <div class="d-flex align-items-center">
                    <div class="d-flex flex-column justify-content-center">
                        <span class="text-body text-wrap fw-medium">${data[6]}</span>
                    </div>
                </div>
                `;
        }
      },
      // estado
      {
        data: null,
        render: function (data, type, row) {
          return `
                <div class="d-flex align-items-center">
                    <div class="d-flex flex-column justify-content-center">
                        <span class="text-body text-wrap fw-medium">${data[7]}</span>
                    </div>
                </div>
                `;
        }
      },
      // direccion
      {
        data: null,
        render: function (data, type, row) {
          return `
                <div class="table-data-feature">
                    <button class="item eliminar-Orden" data-toggle="tooltip" data-placement="top" title="Borrar" data-id="${data[0]}">
                        <i class="zmdi zmdi-delete"></i>
                    </button>
                    <button id="modificarOrden" class="item" data-toggle="tooltip" data-placement="top" title="Editar" data-id="${data[0]}">
                      <i class="zmdi zmdi-edit"></i>
                    </button>
                    <button class="item" data-toggle="tooltip" data-placement="top" title="Ver" data-id="${data[0]}" onclick="window.location.href='verProducto.php?Codigo=${data[0]}'">
                        <i class="zmdi zmdi-eye"></i>
                    </button>
                </div>
            `;
        }
      }
    ]
  });
}
$(function () {
  listarOrdenes();
});

/* ---------------------------------------------------------------CREAR LOS Ordenes--------------------------------------------------------------- */
$('#crearOrden').on('submit', function (event) {
  event.preventDefault(); // Evitar el envío del formulario por defecto
  $('#btnAñadirOrden').prop('disabled', true); // Deshabilitar el botón de registro

  // Obtener los datos del formulario
  var formData = new FormData($('#crearOrden')[0]);

  // Realizar la solicitud AJAX
  $.ajax({
    url: '../../admin/Controllers/ordenController.php?op=insertar', // URL para insertar la orden
    type: 'POST',
    data: formData,
    contentType: false, // No establecer contentType, FormData se encargará de ello
    processData: false, // No procesar los datos, FormData se encargará de ello
    success: function (response) {
      // Manejar la respuesta del servidor
      try {
        response = JSON.parse(response); // Convertir la respuesta a un objeto JSON
        if (response.success) {
          // Caso de éxito: Mostrar mensaje de éxito y resetear el formulario
          Swal.fire({
            icon: 'success',
            title: 'Éxito',
            text: response.message,
          }).then((result) => {
            if (result.isConfirmed) {
              $('#crearOrden')[0].reset(); // Resetear el formulario
              tabla.api().ajax.reload(); // Recargar la tabla de órdenes
            }
          });
        } else {
          // Caso de error: Mostrar mensaje de error
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: response.message,
          });
        }
      } catch (error) {
        // Si no se pudo parsear la respuesta como JSON, mostrar mensaje de error genérico
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'Ocurrió un error al procesar la solicitud. Por favor, inténtelo de nuevo.',
        });
      }
    },
    error: function (xhr, status, error) {
      // Manejar errores de la solicitud AJAX
      Swal.fire({
        icon: 'error',
        title: 'Error',
        text: 'Ocurrió un error al procesar la solicitud. Por favor, inténtelo de nuevo.',
      });
    },
    complete: function () {
      // Habilitar el botón de registro al completar la solicitud
      $('#btnAñadirOrden').removeAttr('disabled');
    },
  });
});


/* ---------------------------------------------------------------EDITAR LAS ORDENES--------------------------------------------------------------- */

function obtenerOrdenPorIdURL() {
  var parametros = new URLSearchParams(window.location.search);
  var ordenID = parametros.get('ordenID');
  return ordenID;
}

$(document).ready(function () {
  $(document).on('click', '#modificarOrden', function () {
    var ordenID = $(this).attr('data-id');
    obtenerOrdenPorID(ordenID);
  });
});


// Función para cargar los ordenID de la orden y llenar el modal
function obtenerOrdenPorID(ordenID) {
  $.ajax({
    url: '../../admin/Controllers/ordenController.php?op=obtenerOrdenPorID',
    type: 'POST',
    dataType: 'json',
    data: { ordenID: ordenID },
    success: function (data) {
      if (data && !data.error) {
        console.log(data)

        $('#modalActualizar #modalTitle').text('Informacion de la orden');
        $('#modalActualizar #EnombreCliente').val(data.nombreCliente);
        $('#modalActualizar #EapellidoCliente').val(data.apellidoCliente);
        $('#modalActualizar #EsegundoApCliente').val(data.segundoApCliente);
        $('#modalActualizar #Ecorreo').val(data.correo);
        $('#modalActualizar #Eproducto').val(data.codigoProducto);
        $('#modalActualizar #EsizeProducto').val(data.sizeProducto);
        $('#modalActualizar #Ecolor').val(data.color);
        $('#modalActualizar #Eprecio').val(data.precio);
        $('#modalActualizar #Ecantidad').val(data.cantidad);
        $('#modalActualizar #EmontoTotal').val(data.montoTotal);


       


        var direccionArray = data.direccionEnvio.split(',').map(function (item) {
          return item.trim(); // Eliminar espacios en blanco alrededor de cada elemento
        });

        // Asignar valores a los campos del formulario
        $('#modalActualizar #Eprovincia').val(direccionArray[0]); // Primera parte de la dirección
        $('#modalActualizar #Edistrito').val(direccionArray[1]); // Segunda parte de la dirección
        $('#modalActualizar #Ecanton').val(direccionArray[2]); // Tercera parte de la dirección
        $('#modalActualizar #Eotros').val(direccionArray.slice(3).join(', '));

        // Mostrar el modal
        $('#modalActualizar').modal('show');

      } else {
        console.error('Error al cargar la orden:', data.error);
      }
    },
    error: function () {
      console.error('Error al cargar la orden');
    }
  });
}
/* --------------------------------------------------------------- EDITAR LOS DATOS DEL PRODUCTO --------------------------------------------------------------- */
function modificarOrden(formData) {
  $.ajax({
    url: '../../admin/Controllers/ordenController.php?op=editar',
    type: 'POST',
    data: formData,
    contentType: false,
    processData: false,
    success: function (datos) {
      switch (datos) {
        case '1':
          Swal.fire({
            icon: 'success',
            title: 'Éxito',
            text: 'Orden actualizada exitosamente',
            showConfirmButton: false
          });
          break;

        case '2':
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Error: Cambiar los datos para actualizar'
          });
          break;

        case '3':
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Error: No se pudo editar.'
          });
          break;

        default:
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: datos,
          });
          break;
      }
    },
    error: function () {
      Swal.fire({
        icon: 'error',
        title: 'Error',
        text: 'Hubo un problema al actualizar el cliente. Por favor, intenta nuevamente.'
      });
    }
  });
}

// Modifica el evento de submit para llamar a modificarOrden
$('#cliente_update').on('submit', function (event) {
  event.preventDefault();
  Swal.fire({
    title: 'Confirmación de Modificación',
    text: '¿Desea modificar los datos del cliente?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sí, modificar',
    cancelButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      var formData = new FormData($('#cliente_update')[0]);
      modificarOrden(formData);
    }
  });
});


/* ---------------------------------------------------------------ELIMINAR EL Orden MEDIANTE EL ID--------------------------------------------------------------- */
$(document).on('click', '.eliminar-Orden', function () {
  var id = $(this).data('id');
  Swal.fire({
    title: 'Confirmación de Eliminación',
    text: '¿Estás seguro de que deseas eliminar esta Orden con # ' + id + '?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sí, eliminar',
    cancelButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      eliminarOrden(id);
    }
  });
});

function eliminarOrden(id) {
  $.ajax({
    url: '../../admin/Controllers/ordenController.php?op=eliminar',
    method: 'POST',
    data: { op: 'eliminar', id: id },
    success: function (response) {
      if (response === '1') {
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'No se pudo eliminar el Ordenes. Inténtalo de nuevo'
        });
      } else {
        Swal.fire({
          icon: 'success',
          title: 'Éxito',
          text: 'Se eliminó el Orden correctamente',
          showConfirmButton: false
        });
        setTimeout(function () {
          location.reload();
        }, 1800);
      }
    },
    error: function (error) {
      console.error("Error al eliminar el Ordenes:", error);
      Swal.fire({
        icon: 'error',
        title: 'Error',
        text: 'No se pudo eliminar el Ordenes. Inténtalo de nuevo'
      });
    }
  });
}










