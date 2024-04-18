<button class="au-btn au-btn-icon au-btn--green au-btn--small" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvaCategoria" aria-controls="offcanvaCategoria">
    <i class="zmdi zmdi-plus"></i>Agregar Categoria
</button>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvaCategoria" aria-labelledby="offcanvaCategoriaLabel" aria-modal="true" role="dialog">
    <div class="offcanvas-header">
        <h5 id="offcanvaCategoriaLabel" class="offcanvas-title">Añadir Categoria</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0">
        <form class="pt-0" id="agregarCategoria" method="POST">
            <div class="mb-3">
                <h6 class="mb-3">Información Basica</h6>
                <div class="mb-3 ">
                    <label class="form-label" for="nombreCategoria">Nombre Categoria*</label>
                    <input type="text" class="form-control" id="nombreCategoria" placeholder="Nombre" name="nombreCategoria" aria-label="Nombre">
                </div>
            </div>
            <div class="pt-3">
                <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit" id="BtnAgregar">Añadir</button>
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

