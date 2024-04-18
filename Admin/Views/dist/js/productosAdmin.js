function limpiarForms() {
    $('#modulos_add').trigger('reset');
    $('#modulos_update').trigger('reset');
}

/* --------------------------------------------------------------- LISTAR LOS PRODUCTOS --------------------------------------------------------------- */
function listarProductos() {
    tabla = $('#datatable-productos').dataTable({
        aProcessing: true, //actiavmos el procesamiento de datatables
        aServerSide: true, //paginacion y filtrado del lado del serevr
        dom: 'Bfrtip', //definimos los elementos del control de tabla
        buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdf'],
        ajax: {
            url: '../../admin/Controllers/productoController.php?op=listaProducto',
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
             // Codigo 
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
            // Nombre 
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
             // Descrip 
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
             // precio 
            {
                data: null,
                render: function (data, type, row) {
                    return `
                    <div class="table-data-feature">
                        <button class="item" data-toggle="tooltip" data-placement="top" title="Borrar" data-cod="${data[0]}">
                            <i class="zmdi zmdi-delete"></i>
                        </button>
                        <button class="item" data-toggle="tooltip" data-placement="top" title="Editar" data-cod="${data[0]}" onclick="window.location.href='editarProducto.php?Codigo=${data[0]}'">
                            <i class="zmdi zmdi-edit"></i>
                        </button>
                        <button class="item" data-toggle="tooltip" data-placement="top" title="Ver" data-cod="${data[0]}" onclick="window.location.href='verProducto.php?Codigo=${data[0]}'">
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
    listarProductos();
});

/* --------------------------------------------------------------- CREAR LOS PRODUCTOS --------------------------------------------------------------- */
$('#agregarProducto').on('submit', function (event) {
    event.preventDefault();
    $('#btnRegistrar').prop('disabled', true);
    var formData = new FormData($('#agregarProducto')[0]);
    $.ajax({
        url: '../../admin/Controllers/productoController.php?op=insertar',
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
                        text: 'Producto registrado',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#agregarProducto')[0].reset();
                            tabla.api().ajax.reload();
                        }
                    });
                    break;
                case '2':
                    Swal.fire({
                        icon: 'error',
                        title: 'Errror',
                        text: 'Error al insertar Producto',
                    });
                    break;
                case '3':
                    Swal.fire({
                        icon: 'error',
                        title: 'Errror',
                        text: 'Nombre ya existe',
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
            $('#btnRegistrar').removeAttr('disabled');
        },
    });
});

/* --------------------------------------------------------------- OBTENER LOS DATOS DEL PRODUCTO --------------------------------------------------------------- */

function obtenerCodigoProductoDesdeURL() {
    var parametros = new URLSearchParams(window.location.search);
    var codigoProducto = parametros.get('codigoProducto');
    return codigoProducto;
}

$(document).ready(function () {
    // Agrega un controlador de eventos al botón "Editar"
    $(document).on('click', '#modificarProducto', function () {
        // Obtiene el código del producto del atributo data-cod del botón
        var codigoProducto = $(this).attr('data-cod');
        $('#modalActualizar').modal('show');

        // Llama a la función cargarProductosPorCodigo para llenar los campos del modal
        cargarProductosPorCodigo(codigoProducto);
        
    });
});

// Función para cargar los datos del producto y llenar el modal
function cargarProductosPorCodigo(codigoProducto) {
    $.ajax({
        url: '../../admin/Controllers/productoController.php?op=obtenerProductoPorCodigo',
        type: 'POST',
        dataType: 'json',
        data: { codigoProducto: codigoProducto },
        success: function (data) {
            if (data && !data.error) {

                console.log(data);
                // Asignar valores a los campos del modal
                // Llenar el modal con los datos del producto
                $('#modalActualizar #modalTitle').text(data.nombreProducto);
                $('#modalActualizar #modalContent').html(`
                         <p>Categoría: ${data.nombreCategoria}</p>
                         <p>Precio: ₡${data.precio}</p>
                         <p>Descripción: ${data.descripcionProducto}</p>
                         <p>En stock: ${data.enStock}</p>
                         <p>Color: ${data.color}</p>
                         <p>Tamaño: ${data.sizeProducto}</p>
                         <p>Estado: ${data.estadoProducto}</p>
                         <p>Código Producto: ${data.codigoProducto}</p>
                         <img src="../../Admin/Views/dist/images/${data.imagenURLProducto}" alt="${data.nombreProducto}" style="max-width: 100px;">
                     `);

                // Mostrar el modal
                
            } else {
                console.error('Error al cargar el producto:', data.error);
            }
        },
        error: function () {
            console.error('Error al cargar el producto');
        }
    });
}

/* --------------------------------------------------------------- EDITAR LOS DATOS DEL PRODUCTO --------------------------------------------------------------- */
function modificarProducto(formData) {
    $.ajax({
        url: '../../admin/Controllers/productoController.php?op=editar',
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
                        text: 'Producto actualizado exitosamente',
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
                text: 'Hubo un problema al actualizar el producto. Por favor, intenta nuevamente.'
            });
        }
    });
}

// Modifica el evento de submit para llamar a modificarProducto
$('#producto_update').on('submit', function (event) {
    event.preventDefault();
    Swal.fire({
        title: 'Confirmación de Modificación',
        text: '¿Desea modificar los datos del producto?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, modificar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            var formData = new FormData($('#producto_update')[0]);
            modificarProducto(formData);
        }
    });
});

/* --------------------------------------------------------------- ELIMINAR EL PRODUCTO MEDIANTE EL CODIGO --------------------------------------------------------------- */

$(document).on('click', '.eliminar-producto', function () {
    var cod = $(this).data('cod');
    console.log('Cod del producto: ' + cod);

    Swal.fire({
        title: 'Confirmación de Eliminación',
        text: '¿Estás seguro de que deseas eliminar este producto?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            eliminarProducto(cod);
        }
    });
});

function eliminarProducto(cod) {
    $.ajax({
        url: '../../../admin/Controllers/ProductoController.php?op=eliminar',
        method: 'POST',
        data: { op: 'eliminar', cod: cod },
        success: function (response) {
            if (response === '1') {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se pudo eliminar el producto. Inténtalo de nuevo'
                });
            } else {
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: 'Se eliminó el producto correctamente',
                    showConfirmButton: false
                });
                setTimeout(function () {
                    location.reload();
                }, 1800);
            }
        },
        error: function (error) {
            console.error("Error al eliminar el producto:", error);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'No se pudo eliminar el producto. Inténtalo de nuevo'
            });
        }
    });
}


function cargarCategorias() {
    $.ajax({
        url: '../../admin/Controllers/productoController.php?op=obtenerCategorias',
        type: 'POST',
        dataType: 'json',
        success: function (data) {
            var selectCategoria = $('#categoriaID');

            selectCategoria.empty();
            selectCategoria.append('<option value="" disabled selected>Seleccionar Categoría</option>');

            if (data && data.length > 0) {
                $.each(data, function (index, categoria) {
                    // Agregar una opción para cada categoría con su ID y nombre
                    selectCategoria.append('<option value="' + categoria.categoriaID + '">' + categoria.nombreCategoria + '</option>');
                });
            }
        },
        error: function () {
            console.log('Error al cargar categorías');
        }
    });
}



cargarCategorias();





