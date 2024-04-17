function limpiarForms() {
    $('#modulos_add').trigger('reset');
    $('#modulos_update').trigger('reset');
}

/* --------------------------------------------------------------- LISTAR LOS PRODUCTOS --------------------------------------------------------------- */
function listarCategorias() {
    tabla = $('#lista-categorias').DataTable({
        aProcessing: true, // Activamos el procesamiento de datatables
        aServerSide: true, // Paginación y filtrado del lado del servidor
        dom: 'Bfrtip', // Definimos los elementos del control de tabla
        buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdf'],
        ajax: {
            url: '../../admin/Controllers/categoriaController.php?op=listaCategoria',
            type: 'get',
            dataType: 'json',
            error: function (e) {
                console.log(e.responseText);
            }
        },
        bDestroy: true,
        iDisplayLength: 10,
        language: {
            sProcessing: "Procesando...",
            sLengthMenu: "Mostrar _MENU_ registros",
            sZeroRecords: "No se encontraron resultados",
            sEmptyTable: "Ningún dato disponible en esta tabla",
            sInfo: "Mostrando _START_ al _END_ de _TOTAL_ registros",
            sInfoEmpty: "Mostrando 0 al 0 de 0 registros",
            sInfoFiltered: "(filtrado de _MAX_ registros en total)",
            sSearch: "Buscar:",
            oPaginate: {
                sFirst: "Primero",
                sLast: "Último",
                sNext: "Siguiente",
                sPrevious: "Anterior",
            },
            oAria: {
                sSortAscending: ": Activar para ordenar la columna en orden ascendente",
                sSortDescending: ": Activar para ordenar la columna en orden descendente",
            }
        },
        columns: [
            { data: "0", visible: true },
             // Nombre de Categorias
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
            // Total de productos
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
    listarCategorias();
});



/* --------------------------------------------------------------- CREAR LOS PRODUCTOS --------------------------------------------------------------- */
$('#agregarCategoria').on('submit', function (event) {
    event.preventDefault();
    $('#btnRegistrar').prop('disabled', true);
    var formData = new FormData($('#agregarCategoria')[0]);
    $.ajax({
        url: '../../admin/Controllers/categoriaController.php?op=insertar',
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
                        text: 'Categoria registrada',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#agregarCategoria')[0].reset();
                            tabla.api().ajax.reload();
                        }
                    });
                    break;
                case '2':
                    Swal.fire({
                        icon: 'error',
                        title: 'Errror',
                        text: 'Error al insertar Categoria',
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
            $('#BtnAgregar').removeAttr('disabled');
        },
    });
});

/* --------------------------------------------------------------- OBTENER LOS DATOS DEL PRODUCTO --------------------------------------------------------------- */

const rellenarFormulario = async () => {
    const urlSearchParams = new URLSearchParams(window.location.search);
    const Codigo = urlSearchParams.get("Codigo");

    if (Codigo) {
        try {
            const response = await fetch(`../../../admin/Controllers/productoController.php?op=obtener&Codigo=${Codigo}`);
            if (response.ok) {
                const datos = await response.json();

                // Rellena el formulario con los datos obtenidos
                $("#ECodigo").val(datos.Codigo);
                $("#Enombre").val(datos.nombre);
                $("#Edescripcion").val(datos.descripcion);
                $("#Ecantidad").val(datos.cantidad);
                $("#Eprecio").val(datos.precio);
            } else {
                console.error("Error al obtener los datos del categoria");
            }
        } catch (error) {
            console.error("Error en la solicitud AJAX:", error);
        }
    }
};

rellenarFormulario(); // Llamar la funcion 

/* --------------------------------------------------------------- EDITAR LOS DATOS DEL PRODUCTO --------------------------------------------------------------- */
$('#producto_update').on('submit', function (event) {
    event.preventDefault();
    Swal.fire({
        title: 'Confirmación de Modificación',
        text: '¿Desea modificar los datos?',
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

function modificarProducto(formData) {
    $.ajax({
        url: '../../../admin/Controllers/productoController.php?op=editar',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (datos) {
            switch (datos) {
                case '0':
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Error: Cambiar los datos para Actualizar'
                    });
                    break;
                case '1':
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: 'Categoria actualizado exitosamente',
                        showConfirmButton: false
                    });
                    setTimeout(function () {
                        window.location.href = 'productos.php'; // Redirige a la lista después de 1 segundo
                    }, 1000)
                    break;
                case '2':
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Error: No se pudo editar.'
                    });
                default:
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: datos,
                    });
                    break;
            }
        },
    });
}

/* --------------------------------------------------------------- ELIMINAR EL PRODUCTO MEDIANTE EL CODIGO --------------------------------------------------------------- */

$(document).on('click', '.eliminar-categoria', function () {
    var cod = $(this).data('cod');
    console.log('Cod del categoria: ' + cod);

    Swal.fire({
        title: 'Confirmación de Eliminación',
        text: '¿Estás seguro de que deseas eliminar este categoria?',
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
                    text: 'No se pudo eliminar el categoria. Inténtalo de nuevo'
                });
            } else {
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: 'Se eliminó el categoria correctamente',
                    showConfirmButton: false
                });
                setTimeout(function () {
                    location.reload();
                }, 1800);
            }
        },
        error: function (error) {
            console.error("Error al eliminar el categoria:", error);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'No se pudo eliminar el categoria. Inténtalo de nuevo'
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





