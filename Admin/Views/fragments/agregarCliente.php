<button class="au-btn au-btn-icon au-btn--green au-btn--small" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvaCategoria" aria-controls="offcanvaCategoria">
    <i class="zmdi zmdi-plus"></i>Agregar Cliente
</button>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvaCategoria" aria-labelledby="offcanvaCategoriaLabel" aria-modal="true" role="dialog">
    <div class="offcanvas-header">
        <h5 id="offcanvaCategoriaLabel" class="offcanvas-title">Añadir Cliente</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0">
        <form method="POST" name="modulos_add" id="crearCliente">
            <div class="mb-3">
                <h6 class="mb-3">Información Basica</h6>
                <div class="mb-3 ">
                    <label for="Cedula">Cedula</label>
                    <input type="number" class="form-control" id="Cedula" name="Cedula" placeholder="Cedula" required>
                </div>
                <div class="mb-3 ">
                    <label for="nombreCliente">Nombre</label>
                    <input type="text" class="form-control" id="nombreCliente" name="nombreCliente" placeholder="Primer Nombre" required>
                </div>
                <div class="row ">
                    <div class="col-md-6">
                        <div class="mb-3 ">
                            <label for="apellidoCliente">Apellido</label>
                            <input type="text" class="form-control" id="apellidoCliente" name="apellidoCliente" placeholder="Primer Apellido" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 ">
                            <label for="segundoApCliente">Seg Apellido</label>
                            <input type="text" class="form-control" id="segundoApCliente" name="segundoApCliente" placeholder="Seg Apellido" required>
                        </div>
                    </div>
                </div>

                <div class="mb-3 ">
                    <label for="genero">Genero</label>
                    <select class="form-select" id="genero" name="genero" placeholder="Seleccionar Genero" required>
                        <option>Femenino</option>
                        <option>Masculino</option>
                        <option>Otro</option>
                    </select>
                </div>

                <div class="mb-3 ">
                    <label for="correo">Correo Electrónico</label>
                    <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo" required>
                </div>
                <div class="mb-3 ">
                    <label for="contrasena">Contraseña</label>
                    <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Contraseña" required>
                </div>

                <div class="mb-3 ">
                    <label for="telefono">Telefono</label>
                    <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Telefono" required>
                </div>

                <div class="row ">
                    <div class="col-md-4">
                        <div class="mb-3 ">
                            <label for="provincia">Provincia</label>
                            <input type="text" class="form-control" id="provincia" name="provincia" placeholder="Provincia" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3 ">
                            <label for="distrito">Distrito</label>
                            <input type="text" class="form-control" id="distrito" name="distrito" placeholder="Distrito" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3 ">
                            <label for="canton">Canton</label>
                            <input type="text" class="form-control" id="canton" name="canton" placeholder="Canton" required>
                        </div>
                    </div>
                </div>

                <div class="mb-3 ">
                    <label for="otros">Otros</label>
                    <input type="text" class="form-control" id="otros" name="otros" placeholder="Otras Señales" required>
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" value="false" id="tipoCliente" name="tipoCliente">
                    <label class="form-check-label" for="EmpleadoCheck">Empleado</label>
                </div>

            </div>
            <div class="pt-3">
                <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit" id="btnRegistrar">Añadir</button>
                <button type="reset" class="btn bg-label-danger" data-bs-dismiss="offcanvas">Descartar</button>
            </div>
        </form>
    </div>
</div>

<div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
    <select class="js-select2" name="type">
        <option selected="selected">Exportar</option>
        <option value="">PDF</option>
        <option value="">Excel</option>
    </select>
    <div class="dropDownSelect2"></div>
</div>