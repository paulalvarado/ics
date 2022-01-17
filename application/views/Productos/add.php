<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Formulario</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <form class="row g-3 needs-validation" id="form-add-product" method="POST" action="<?= base_url('productos/guardar') ?>" novalidate>
            <div class="col-md-6">
                <label for="producto" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="producto" name="producto" required>
                <div class="valid-feedback">
                    ¡Listo!
                </div>
                <div class="invalid-feedback">
                    Proporcione un nombre al producto.
                </div>
            </div>
            <div class="col-md-6">
                <label for="sku" class="form-label">SKU</label>
                <input type="text" class="form-control" id="sku" name="sku">
                <div class="valid-feedback">
                    ¡Listo!
                </div>
            </div>
            <div class="col-md-4">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" class="form-control" id="stock" name="stock" required>
                <div class="valid-feedback">
                    ¡Listo!
                </div>
                <div class="invalid-feedback">
                    Proporcione una cantidad al producto.
                </div>
            </div>
            <div class="col-md-4">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" class="form-control" id="precio" name="precio" required>
                <div class="valid-feedback">
                    ¡Listo!
                </div>
                <div class="invalid-feedback">
                    Proporcione el precio del producto.
                </div>
            </div>
            <div class="col-md-4">
                <label for="stockmin" class="form-label">Cantidad mínima</label>
                <input type="number" class="form-control" id="stockmin" name="stockmin" required>
                <div class="valid-feedback">
                    ¡Listo!
                </div>
                <div class="invalid-feedback">
                    Proporcione una cantidad mínima al producto.
                </div>
            </div>
            <div class="col-12">
                <label for="description" class="form-label">Descripcióna</label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="4"></textarea>
                <div class="valid-feedback">
                    ¡Listo!
                </div>
            </div>
        </form>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="button" class="btn btn-outline-success btn-sm submit-form-add-product">Guardar</button>
        <button type="button" id="btn-form-add-product" class="btn btn-outline-success btn-sm ml-5">Guardar y salir</button>
    </div>
    <!-- /.card-footer-->
</div>
<!-- /.card -->


<script>
    $(function() {
        $.fn.isValid = function() {
            return this[0].checkValidity()
        }
        var forms = $('#form-add-product');
        $('.submit-form-add-product').click(function() {
            if (forms.isValid() == false) {
                forms.addClass('was-validated')
            } else {
                forms.addClass('was-validated');
                $.post(url + 'productos/guardar', {
                    name: $('#form-add-product input[name="producto"]').val(),
                    sku: $('#form-add-product input[name="sku"]').val(),
                    stock: $('#form-add-product input[name="stock"]').val(),
                    precio: $('#form-add-product input[name="precio"]').val(),
                    stockmin: $('#form-add-product input[name="stockmin"]').val(),
                    description: $('#form-add-product textarea[name="description"]').val(),
                }).done(function(data) {
                    console.log(data)
                    Swal.fire(
                        '¡Producto guardado correctamente!',
                        data,
                        'success'
                    )
                    setTimeout(function() {
                        location.reload()
                    }, 3000)
                })
            }
        })
        $('#btn-form-add-product').click(function() {
            if (forms.isValid() == false) {
                forms.addClass('was-validated')
            } else {
                forms.addClass('was-validated')
                $.post(url + 'productos/guardar', {
                    name: $('#form-add-product input[name="producto"]').val(),
                    sku: $('#form-add-product input[name="sku"]').val(),
                    stock: $('#form-add-product input[name="stock"]').val(),
                    precio: $('#form-add-product input[name="precio"]').val(),
                    stockmin: $('#form-add-product input[name="stockmin"]').val(),
                    description: $('#form-add-product textarea[name="description"]').val(),
                }).done(function(data) {
                    Swal.fire(
                        '¡Producto guardado correctamente!',
                        data,
                        'success'
                    )
                    setTimeout(function() {
                        window.location = '<?= base_url('productos') ?>';
                    }, 3000)
                })
            }
        })
    });
</script>