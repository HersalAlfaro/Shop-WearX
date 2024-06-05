<!-- Modal Actualizar Cliente -->
<div class="modal fade" id="modalActualizar" tabindex="-1" aria-labelledby="modal1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" name="cliente_update" id="cliente_update">
                    <div class="mb-3">
                        <h6 class="mb-3">Información Básica</h6>
                        <div class="mb-3">
                            <label for="Cedula">Cedula</label>
                            <input type="number" class="form-control" id="ECedula" name="ECedula" placeholder="Cedula" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="nombreCliente">Nombre</label>
                            <input type="text" class="form-control" id="EnombreCliente" name="EnombreCliente" placeholder="Primer Nombre" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="apellidoCliente">Apellido</label>
                                    <input type="text" class="form-control" id="EapellidoCliente" name="EapellidoCliente" placeholder="Primer Apellido" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="segundoApCliente">Seg Apellido</label>
                                    <input type="text" class="form-control" id="EsegundoApCliente" name="EsegundoApCliente" placeholder="Seg Apellido" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 ">
                            <label for="genero">Genero</label>
                            <select class="form-select" id="Egenero" name="Egenero" placeholder="Seleccionar Genero">
                                <option>Femenino</option>
                                <option>Masculino</option>
                                <option>Otro</option>
                            </select>
                        </div>


                        <div class="mb-3">
                            <label for="correo">Correo Electrónico</label>
                            <input type="email" class="form-control" id="Ecorreo" name="Ecorreo" placeholder="Correo" required>
                        </div>
                       
                        <div class="mb-3">
                            <label for="telefono">Telefono</label>
                            <input type="number" class="form-control" id="Etelefono" name="Etelefono" placeholder="Telefono" required>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="provincia">Provincia</label>
                                    <input type="text" class="form-control" id="Eprovincia" name="Eprovincia" placeholder="Provincia" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="distrito">Distrito</label>
                                    <input type="text" class="form-control" id="Edistrito" name="Edistrito" placeholder="Distrito" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="canton">Canton</label>
                                    <input type="text" class="form-control" id="Ecanton" name="Ecanton" placeholder="Canton" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="otros">Otros</label>
                            <input type="text" class="form-control" id="Eotros" name="Eotros" placeholder="Otras Señales" required>
                        </div>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" value="false" id="EtipoCliente" name="EtipoCliente">
                            <label class="form-check-label" for="EmpleadoCheck">Empleado</label>
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