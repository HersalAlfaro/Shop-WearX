<!-- Botón para abrir el modal -->
<button class="au-btn au-btn-icon au-btn--green au-btn--small" type="button" data-bs-toggle="modal" data-bs-target="#modalAgregarOrden">
    <i class="zmdi zmdi-plus"></i>Agregar Orden
</button>

<!-- Modal -->
<div class="modal fade" id="modalAgregarOrden" tabindex="-1" aria-labelledby="modalAgregarOrdenLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAgregarOrdenLabel">Añadir Orden</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="borrarDatos()"></button>
            </div>
            <div class="modal-body">
                <form method="POST" name="modulos_add" id="crearOrden">
                    <div class="mb-3">
                        <h6 class="mb-3">Información Basica</h6>
                        <div class="mb-3 ">
                            <label for="cliente">Cédula Cliente</label>
                            <select class="form-select" id="cliente" name="cliente" required>
                                <!-- Clientes cargados desde PHP se insertarán aquí automáticamente -->
                            </select>
                        </div>
                        <!-- Los datos al seleccionar el cliente se llenan solos -->
                        <div class="row ">
                            <div class="col-md-4">
                                <div class="mb-3 ">
                                    <label for="nombreCliente">Nombre</label>
                                    <input type="text" class="form-control" id="nombreCliente" name="nombreCliente" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 ">
                                    <label for="apellidoCliente">Apellido</label>
                                    <input type="text" class="form-control" id="apellidoCliente" name="apellidoCliente" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 ">
                                    <label for="segundoApCliente">Seg Apellido</label>
                                    <input type="text" class="form-control" id="segundoApCliente" name="segundoApCliente" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 ">
                            <label for="correo">Correo Electrónico</label>
                            <input type="email" class="form-control" id="correo" name="correo" readonly>
                        </div>


                        <div class="mb-3 ">
                            <label for="producto">Buscar Producto</label>
                            <select class="form-select" id="producto" name="producto" required>
                                <!-- Productos cargados desde PHP se insertarán aquí automáticamente -->
                            </select>
                        </div>

                        <div class="row ">
                            <div class="col-md-4">
                                <div class="mb-3 ">
                                    <label for="sizeProducto">Size</label>
                                    <select class="form-select" id="sizeProducto" name="sizeProducto" required>
                                        <option value="" selected disabled hidden>Seleccionar Size</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 ">
                                    <label for="color">Color</label>
                                    <select class="form-select" id="color" name="color" required>
                                        <option value="" selected disabled hidden>Seleccionar Color</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 ">
                                    <label for="precio">Precio</label>
                                    <input type="number" class="form-control" id="precio" name="precio" readonly>

                                </div>
                            </div>
                        </div>

                        <div class="mb-3 ">
                            <label for="cantidad">Cantidad</label>
                            <input type="number" class="form-control" id="cantidad" name="cantidad" required>
                        </div>

                        <div class="row ">
                            <div class="col-md-4">
                                <div class="mb-3 ">
                                    <label for="montoTotal">Monto Total</label>
                                    <input type="number" class="form-control" id="montoTotal" name="montoTotal" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="estadoOrden">Estado Orden</label>
                                    <select class="form-select" id="estadoOrden" name="estadoOrden" required>
                                        <option value="" selected disabled hidden>Seleccionar Estado</option>
                                        <option value="Finalizada">Finalizada</option>
                                        <option value="Pendiente">Pendiente</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <h6 class="mb-3">Información Direccion</h6>
                        <div class="row ">
                            <div class="col-md-4">
                                <div class="mb-3 ">
                                    <label for="provincia">Provincia</label>
                                    <input type="text" class="form-control" id="provincia" name="provincia" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 ">
                                    <label for="distrito">Distrito</label>
                                    <input type="text" class="form-control" id="distrito" name="distrito" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 ">
                                    <label for="canton">Canton</label>
                                    <input type="text" class="form-control" id="canton" name="canton" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 ">
                            <label for="otros">Otros</label>
                            <input type="text" class="form-control" id="otros" name="otros" required>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="borrarDatos()">Descartar</button>
                <button type="submit" class="btn btn-primary" form="crearOrden" id="btnAñadirOrden">Añadir</button>
            </div>
        </div>
    </div>
</div>


<div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
    <select class="select2-options" name="type">
        <option selected="selected">Exportar</option>
        <option value="">PDF</option>
        <option value="">Excel</option>
    </select>
</div>