<div class="container" id="listaVentas">
    <div class="row">
        <div class="col-md-12">
            <h3 class="title-5 m-b-35">Lista Ventas</h3>
            <div class="table-data__tool">
                <div class="table-data__tool-left">
                    <div class="rs-select2--light rs-select2--md">
                        <select class="js-select2" name="property">
                            <option selected="selected">Todas</option>
                            <option value="">Semanal</option>
                            <option value="">Mensual</option>
                        </select>
                        <div class="dropDownSelect2"></div>
                    </div>
                    <div class="rs-select2--light rs-select2--sm">
                        <select class="js-select2" name="time">
                            <option selected="selected">Hoy</option>
                            <option value="">3 Dias</option>
                            <option value="">1 Semana</option>
                        </select>
                        <div class="dropDownSelect2"></div>
                    </div>
                    <button class="au-btn-filter">
                        <i class="zmdi zmdi-filter-list"></i>Filtros</button>
                </div>
                <div class="table-data__tool-right">
                    <button class="au-btn au-btn-icon au-btn--green au-btn--small" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvaVenta" aria-controls="offcanvaVenta">
                        <i class="zmdi zmdi-plus"></i>Agregar Venta
                    </button>

                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvaVenta" aria-labelledby="offcanvaVentaLabel" aria-modal="true" role="dialog">
                        <div class="offcanvas-header">
                            <h5 id="offcanvaVentaLabel" class="offcanvas-title">Añadir Cliente</h5>
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body mx-0 flex-grow-0">
                            <form class="pt-0" id="agregarCliente">
                                <div class="mb-3">
                                    <h6 class="mb-3">Información Basica</h6>
                                    <div class="mb-3">
                                        <label class="form-label" for="nombre">Nombre*</label>
                                        <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre" aria-label="Nombre">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="correo">Correo*</label>
                                        <input type="text" id="correo" class="form-control" placeholder="john.doe@example.com" aria-label="john.doe@example.com" name="correo">
                                    </div>
                                    <div>
                                        <label class="form-label" for="telefono">Telefono</label>
                                        <input type="text" id="telefono" class="form-control phone-mask" placeholder="+(506) 1111-4444" aria-label="+(506) 1111-4444" name="telefono">
                                    </div>
                                </div>

                                <div class="ecommerce-customer-add-shiping mb-3 pt-3">
                                    <h6 class="mb-3">Información Compras</h6>
                                    <div class="mb-3">
                                        <label class="form-label" for="ecommerce-customer-add-address">Direccion Linea 1</label>
                                        <input type="text" id="ecommerce-customer-add-address" class="form-control" placeholder="45 Roker Terrace" aria-label="45 Roker Terrace" name="customerAddress1">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="ecommerce-customer-add-address-2">Direccion Linea 2</label>
                                        <input type="text" id="ecommerce-customer-add-address-2" class="form-control" aria-label="direccion" name="customerAddress2">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="ecommerce-customer-add-town">Ciudad</label>
                                        <input type="text" id="ecommerce-customer-add-town" class="form-control" placeholder="Alajuela" aria-label="New York" name="customerTown">
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12 col-sm-6">
                                            <label class="form-label" for="ecommerce-customer-add-state">Estado / Provincia</label>
                                            <input type="text" id="ecommerce-customer-add-state" class="form-control" placeholder="San Antonio" aria-label="Southern tip" name="customerState">
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <label class="form-label" for="ecommerce-customer-add-post-code">Codigo Postal</label>
                                            <input type="text" id="ecommerce-customer-add-post-code" class="form-control" placeholder="20104" aria-label="734990" name="pin" pattern="[0-9]{8}" maxlength="8">
                                        </div>
                                    </div>

                                </div>

                                <div class="d-sm-flex mb-3 pt-3">
                                    <div class="me-auto mb-2 mb-md-0">
                                        <h6 class="mb-0">¿Usar como dirección de facturación?</h6>
                                        <small class="text-muted">Si necesitas más información, recibir</small>
                                    </div>
                                    <label class="switch m-auto pe-2">
                                        <input type="checkbox" class="switch-input">
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                        </span>
                                    </label>
                                </div>
                                <div class="pt-3">
                                    <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Añadir</button>
                                    <button type="reset" class="btn bg-label-danger" data-bs-dismiss="offcanvas">Descartar</button>
                                </div>
                                <input type="hidden">
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
                </div>
            </div>
            <div class="table-responsive table-responsive-data2">
                <table class="table table-data2">
                    <thead>
                        <tr>
                            <th>
                                <label class="au-checkbox">
                                    <input type="checkbox">
                                    <span class="au-checkmark"></span>
                                </label>
                            </th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Descripción</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Precio</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="tr-shadow">
                            <td>
                                <label class="au-checkbox">
                                    <input type="checkbox">
                                    <span class="au-checkmark"></span>
                                </label>
                            </td>
                            <td>Lori Lynch</td>
                            <td>
                                <span class="block-email">lori@example.com</span>
                            </td>
                            <td class="desc">Samsung S8 Black</td>
                            <td>2018-09-27 02:12</td>
                            <td>
                                <span class="status--process">Processed</span>
                            </td>
                            <td>$679.00</td>
                            <td>
                                <div class="table-data-feature">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Ver">
                                        <i class="zmdi zmdi-eye"></i>
                                    </button>
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Editar">
                                        <i class="zmdi zmdi-edit"></i>
                                    </button>
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Borrar">
                                        <i class="zmdi zmdi-delete"></i>
                                    </button>
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Más">
                                        <i class="zmdi zmdi-more"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="spacer"></tr>

                        <tr class="tr-shadow">
                            <td>
                                <label class="au-checkbox">
                                    <input type="checkbox">
                                    <span class="au-checkmark"></span>
                                </label>
                            </td>
                            <td>Lori Lynch</td>
                            <td>
                                <span class="block-email">lyn@example.com</span>
                            </td>
                            <td class="desc">iPhone X 256Gb Black</td>
                            <td>2018-09-25 19:03</td>
                            <td>
                                <span class="status--denied">Denied</span>
                            </td>
                            <td>$1199.00</td>
                            <td>
                                <div class="table-data-feature">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                        <i class="zmdi zmdi-mail-send"></i>
                                    </button>
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="zmdi zmdi-edit"></i>
                                    </button>
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="zmdi zmdi-delete"></i>
                                    </button>
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                        <i class="zmdi zmdi-more"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="spacer"></tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>