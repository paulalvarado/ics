<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/asidebar'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="d-flex">
                        <h1 class="m-0"><?= $titulo ?></h1>
                        <?php if (isset($btn)) : ?>
                            <?php foreach ($btn as $key => $b) : ?>
                                <button type="button" class="btn btn-outline-primary btn-sm ml-5" data-bs-toggle="modal" data-bs-target="#<?= $b['id'] ?>"><?= $b['titulo'] ?></button>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <?php $cuenta = count($breadcrumbs) - 1 ?>
                        <?php foreach ($breadcrumbs as $key => $value) : ?>
                            <li class="breadcrumb-item <?= ($cuenta == $key) ? 'active' : '' ?>"><?= $value ?></li>
                        <?php endforeach ?>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <?php $this->load->view($page); ?>
    </section>
    <!-- /.content -->
</div>



<!-- Add product modal -->
<div class="modal fade" id="add-product">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add product</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" id="form-add-product">
                    <div class="col-md-6">
                        <label for="producto" class="form-label">Name</label>
                        <input type="text" class="form-control" id="producto" name="producto">
                    </div>
                    <div class="col-md-6">
                        <label for="sku" class="form-label">SKU</label>
                        <input type="text" class="form-control" id="sku" name="sku">
                    </div>
                    <div class="col-md-4">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="number" class="form-control" id="stock" name="stock">
                    </div>
                    <div class="col-md-4">
                        <label for="stockmin" class="form-label">Minimum amount</label>
                        <input type="number" class="form-control" id="stockmin" name="stockmin">
                    </div>
                    <div class="col-md-4">
                        <label for="cantidad" class="form-label">In existence</label>
                        <input type="number" class="form-control" id="cantidad" name="cantidad">
                    </div>
                    <div class="col-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="4"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary submit-form-add-product">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
    $('.submit-form-add-product').click(function() {
        myModal.toggle()
        $.post(url + 'productos/guardar', {
            name: $('#form-add-product input[name="producto"]').val(),
            sku: $('#form-add-product input[name="sku"]').val(),
            stock: $('#form-add-product input[name="stock"]').val(),
            stockmin: $('#form-add-product input[name="stockmin"]').val(),
            cantidad: $('#form-add-product input[name="cantidad"]').val(),
            description: $('#form-add-product textarea[name="description"]').val(),
        }).done(function(data) {
            Swal.fire(
                'Product successfully saved!',
                data,
                'success'
            )
            setTimeout(function() {
                location.reload()
            }, 3000)
        })
    })
</script>
<?php $this->load->view('template/footer'); ?>