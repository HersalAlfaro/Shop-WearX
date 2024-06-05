<!-- Modal Actualizar ORDEN -->
<div class="modal fade" id="modalActualizar" tabindex="-1" aria-labelledby="modal1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method=POST name=orden_update id=orden_update>
                    <div class="mb-3">
                        <h6 class="mb-3">Información Basica</h6>
                        <div class="mb-3 ">
                            <label for="cliente">Cédula Cliente</label>
                            <select class="form-select" id="Ecliente" name="Ecliente" required>
                                <!-- Clientes cargados desde PHP se insertarán aquí automáticamente -->
                            </select>
                        </div>
                        <!-- Los datos al seleccionar el cliente se llenan solos -->
                        <div class="row ">
                            <div class="col-md-4">
                                <div class="mb-3 ">
                                    <label for="nombreCliente">Nombre</label>
                                    <input type="text" class="form-control" id="EnombreCliente" name="EnombreCliente" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 ">
                                    <label for="apellidoCliente">Apellido</label>
                                    <input type="text" class="form-control" id="EapellidoCliente" name="EapellidoCliente" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 ">
                                    <label for="segundoApCliente">Seg Apellido</label>
                                    <input type="text" class="form-control" id="EsegundoApCliente" name="EsegundoApCliente" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 ">
                            <label for="correo">Correo Electrónico</label>
                            <input type="email" class="form-control" id="Ecorreo" name="Ecorreo" readonly>
                        </div>


                        <div class="mb-3 ">
                            <label for="producto">Buscar Producto</label>
                            <select class="form-select" id="Eproducto" name="Eproducto" required>
                                <!-- Productos cargados desde PHP se insertarán aquí automáticamente -->
                            </select>
                        </div>

                        <div class="row ">
                            <div class="col-md-4">
                                <div class="mb-3 ">
                                    <label for="sizeProducto">Size</label>
                                    <select class="form-select" id="EsizeProducto" name="EsizeProducto" required>
                                        <option value="" selected disabled hidden>Seleccionar Size</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 ">
                                    <label for="color">Color</label>
                                    <select class="form-select" id="Ecolor" name="Ecolor" required>
                                        <option value="" selected disabled hidden>Seleccionar Color</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 ">
                                    <label for="precio">Precio</label>
                                    <input type="number" class="form-control" id="Eprecio" name="Eprecio" readonly>

                                </div>
                            </div>
                        </div>

                        <div class="mb-3 ">
                            <label for="cantidad">Cantidad</label>
                            <input type="number" class="form-control" id="Ecantidad" name="Ecantidad" required>
                        </div>

                        <div class="row ">
                            <div class="col-md-4">
                                <div class="mb-3 ">
                                    <label for="montoTotal">Monto Total</label>
                                    <input type="number" class="form-control" id="EmontoTotal" name="EmontoTotal" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="estadoOrden">Estado Orden</label>
                                    <select class="form-select" id="EestadoOrden" name="EestadoOrden" required>
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
                                    <input type="text" class="form-control" id="Eprovincia" name="Eprovincia" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 ">
                                    <label for="distrito">Distrito</label>
                                    <input type="text" class="form-control" id="Edistrito" name="Edistrito" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 ">
                                    <label for="canton">Canton</label>
                                    <input type="text" class="form-control" id="Ecanton" name="Ecanton" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 ">
                            <label for="otros">Otros</label>
                            <input type="text" class="form-control" id="Eotros" name="Eotros" required>
                        </div>

                    </div>
                    <div class="pt-3">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1" id="btnEditar">Editar</button>
                        <button type="reset" class="btn bg-label-danger" data-bs-dismiss="modal">Descartar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>