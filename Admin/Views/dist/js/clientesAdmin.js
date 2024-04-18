function limpiarForms() {
    $('#modulos_add').trigger('reset');
    $('#modulos_update').trigger('reset');
  }
  
  /* ---------------------------------------------------------------LISTAR LOS CLIENTES--------------------------------------------------------------- */
  function listarClientesTodos() {
    tabla = $('#lista-clientes').dataTable({
      aProcessing: true, //actiavmos el procesamiento de datatables
      aServerSide: true, //paginacion y filtrado del lado del serevr
      dom: 'Bfrtip', //definimos los elementos del control de tabla
      buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdf'],
      ajax: {
        url: '../../admin/Controllers/clienteController.php?op=listaTabla',
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
         // Cedula de Clientes
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
        // Apellido
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
        // Correo
        {
            data: null,
            render: function (data, type, row) {
                return `
                <div class="table-data-feature">
                    <button class="item eliminar-cliente" data-toggle="tooltip" data-placement="top" title="Borrar" data-ced="${data[0]}">
                        <i class="zmdi zmdi-delete"></i>
                    </button>
                    <button class="item" data-toggle="tooltip" data-placement="top" title="Editar" data-ced="${data[0]}" onclick="window.location.href='editarProducto.php?Codigo=${data[0]}'">
                        <i class="zmdi zmdi-edit"></i>
                    </button>
                    <button class="item" data-toggle="tooltip" data-placement="top" title="Ver" data-ced="${data[0]}" onclick="window.location.href='verProducto.php?Codigo=${data[0]}'">
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
  
    listarClientesTodos();
  });
  
  /* ---------------------------------------------------------------CREAR LOS CLIENTES--------------------------------------------------------------- */
  
  $('#crearCliente').on('submit', function (event) {
    event.preventDefault();
    $('#btnRegistrar').prop('disabled', true);
    var formData = new FormData($('#crearCliente')[0]);
    $.ajax({
      url: '../../admin/Controllers/clienteController.php?op=insertar',
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
              text: 'Cliente registrado',
            }).then((result) => {
              if (result.isConfirmed) {
                $('#crearCliente')[0].reset();
                tabla.api().ajax.reload();
              }
            });
            break;
          case '2':
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: 'No se pudieron actualizar los datos',
            });
            break;
          case '3':
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: 'El cliente ya existe. Corrija e inténtelo nuevamente.',
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
  
  
  /* ---------------------------------------------------------------OBTENER LOS DATOS DEL CLIENTE--------------------------------------------------------------- */
  
  const rellenarFormulario = async () => {
    const urlSearchParams = new URLSearchParams(window.location.search);
    const Cedula = urlSearchParams.get("Cedula");
  
    if (Cedula) {
      try {
        const response = await fetch(`../../admin/Controllers/clienteController.php?op=obtener&Cedula=${Cedula}`);
        if (response.ok) {
          const datos = await response.json();
  
          $("#EIdCliente").val(datos.Cedula);
          $("#Enombre").val(datos.nombre);
          $("#Eapellido").val(datos.apellido);
          $("#Ecorreo").val(datos.correo);
          $("#Etelefono").val(datos.telefono);
          $("#Eprovincia").val(datos.provincia);
          $("#Edistrito").val(datos.distrito);
          $("#Ecanton").val(datos.canton);
          $("#Eotros").val(datos.otros);
          var tipo = datos.tipoCliente;
          var valorMostrado;
          
          if (tipo === 0) {
              valorMostrado = 'Cliente';
          } else if (tipo === 1) {
              valorMostrado = 'Empleado';
          } else {
              // Manejar otro caso si es necesario
              valorMostrado = 'Desconocido';
          }
          
          $("#EtipoCliente").val(valorMostrado);
        } else {
          console.error("Error al obtener los datos del cliente");
        }
      } catch (error) {
        console.error("Error en la solicitud AJAX:", error);
      }
    }
  };
  
  rellenarFormulario(); // Llamar la funcion 
  
  /* ---------------------------------------------------------------EDITAR LOS DATOS DEL CLIENTE--------------------------------------------------------------- */
  $('#cliente_update').on('submit', function (event) {
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
        var formData = new FormData($('#cliente_update')[0]);
        modificarCliente(formData);
      }
    });
  });
  
  function modificarCliente(formData) {
    $.ajax({
      url: '../../admin/Controllers/clienteController.php?op=editar',
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
              text: 'Cliente actualizado exitosamente',
              showConfirmButton: false
            });
            setTimeout(function () {
              window.location.href = 'listaClientes.php'; // Redirige a la lista después de 1 segundo
            }, 1000)
            break;
  
          case '2':
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: 'Error: Cambiar los datos para Actualizar'
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
    });
  }
  
  /* ---------------------------------------------------------------ELIMINAR EL CLIENTE MEDIANTE EL ID--------------------------------------------------------------- */
  $(document).on('click', '.eliminar-cliente', function () {
    var ced = $(this).data('ced');
    Swal.fire({
        title: 'Confirmación de Eliminación',
        text: '¿Estás seguro de que deseas eliminar este Cliente ' +ced+ '?' ,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            eliminarCliente(ced);
        }
    });
});

  function eliminarCliente(ced) {
    $.ajax({
      url: '../../admin/Controllers/clienteController.php?op=eliminar',
      method: 'POST',
      data: { op: 'eliminar', ced: ced },
      success: function (response) {
        if (response === '1') {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'No se pudo eliminar el Cliente. Inténtalo de nuevo'
          });
        } else {
          Swal.fire({
            icon: 'success',
            title: 'Éxito',
            text: 'Se eliminó el cliente correctamente',
            showConfirmButton: false
          });
          setTimeout(function () {
            location.reload();
          }, 1800);
        }
      },
      error: function (error) {
        console.error("Error al eliminar el Cliente:", error);
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'No se pudo eliminar el Cliente. Inténtalo de nuevo'
        });
      }
    });
  }
  
  
  
  
  
  
  
  
  
  
  