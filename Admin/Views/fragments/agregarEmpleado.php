<button class="au-btn au-btn-icon au-btn--green au-btn--small" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvaCategoria" aria-controls="offcanvaCategoria">
    <i class="zmdi zmdi-plus"></i>Agregar Empleado
</button>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvaCategoria" aria-labelledby="offcanvaCategoriaLabel" aria-modal="true" role="dialog">
    <div class="offcanvas-header">
        <h5 id="offcanvaCategoriaLabel" class="offcanvas-title">Añadir Empleado</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0">
        <form method="POST" name="modulos_add" id="crearEmpleado">
            <div class="mb-3">
                <h6 class="mb-3">Información Basica</h6>
                <div class="mb-3 ">
                    <label for="cedula">Cedula</label>
                    <input type="number" class="form-control" id="cedula" name="cedula" placeholder="Cedula" required>
                </div>
                <div class="mb-3 ">
                    <label for="nombreEmpleado">Nombre</label>
                    <input type="text" class="form-control" id="nombreEmpleado" name="nombreEmpleado" placeholder="Primer Nombre" required>
                </div>
                <div class="row ">
                    <div class="col-md-6">
                        <div class="mb-3 ">
                            <label for="apellidoEmpleado">Apellido</label>
                            <input type="text" class="form-control" id="apellidoEmpleado" name="apellidoEmpleado" placeholder="Primer Apellido" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 ">
                            <label for="segundoApEmpleado">Seg Apellido</label>
                            <input type="text" class="form-control" id="segundoApEmpleado" name="segundoApEmpleado" placeholder="Seg Apellido" required>
                        </div>
                    </div>
                </div>

                <div class="mb-3 ">
                    <label for="genero">Genero</label>
                    <select class="select2 select2-hidden-accessible" id="genero" name="genero" data-placeholder="Seleccionar genero" data-dropdown-css-class="select2-danger" style="width: 100%;" tabindex="1" aria-hidden="true">
                        <option>Masculino</option>
                        <option>Femenino</option>
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

                <div class="mb-3 ">
                    <label for="rol">Rol</label>
                    <select class="select2 select2-hidden-accessible" id="rol" name="rol" data-placeholder="Seleccionar Rol" data-dropdown-css-class="select2-danger" style="width: 100%;" tabindex="1" aria-hidden="true">
                        <option>Gerente</option>
                        <option>Admin</option>
                    </select>
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
    <select class="select2-options" name="type">
        <option selected="selected">Exportar</option>
        <option value="">PDF</option>
        <option value="">Excel</option>
    </select>
</div>