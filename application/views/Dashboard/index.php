<div class="container-fluid">
    <div class="row mt-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title">Ventas</h3>
                </div>
                <div class="card-body">
                    <label>Productos</label>
                    <div class="row">
                        <div class="col-10">
                            <div class="form-group">
                                <select class="form-control select2" style="width: 100%;">
                                    <?php foreach ($productos as $p) : ?>
                                        <option data-detalle='<?= json_encode($p) ?>' value="<?= $p->id_producto ?>"><?= $p->producto ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <div class="col-2">
                            <button id="see-product" class="btn btn-primary w-100">Ver</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <!-- Small boxes (Stat box) -->
    <div class="row mt-2">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3><?= count($productos) ?></h3>

                    <p>Productos</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="<?= base_url('productos') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="overlay dark">
                    <i class="fas fa-3x fa-exclamation-triangle"></i>
                </div>
                <div class="inner">
                    <h3>53<sup style="font-size: 20px">%</sup></h3>

                    <p>Bounce Rate</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="overlay dark">
                    <i class="fas fa-3x fa-exclamation-triangle"></i>
                </div>
                <div class="inner">
                    <h3>44</h3>

                    <p>User Registrations</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="overlay dark">
                    <i class="fas fa-3x fa-exclamation-triangle"></i>
                </div>
                <div class="inner">
                    <h3>65</h3>

                    <p>Unique Visitors</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->

</div><!-- /.container-fluid -->

<!-- Select2 -->
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Select2 -->
<script src="<?= base_url() ?>assets/plugins/select2/js/select2.full.min.js"></script>
<script>
    $('.select2').select2()
    var precioEdit = 0;
    $(document).ready(function() {
        console.log(precioEdit)
        $('#see-product').click(function() {
            var detalle = $('.select2 option:selected').data('detalle');

            Swal.fire({
                title: 'Vender ' + detalle.producto,
                input: 'number',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                inputValue: detalle.precio,
                showCancelButton: true,
                confirmButtonText: 'Vender',
                showLoaderOnConfirm: true,
                inputValidator: (value) => {
                    if (!value) {
                        return 'You need to write something!'
                    } else {
                        console.log(value)
                        precioEdit = value;
                    }
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                    console.log(precioEdit)
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "<?= base_url('productos/vender') ?>",
                            data: {
                                'id_producto': detalle.id_producto,
                                'producto': detalle.producto,
                                'precio': (precioEdit != detalle.precio && precioEdit > 0) ? precioEdit : detalle.precio,
                            },
                            cache: false,
                            success: function(response) {
                                Swal.fire(
                                    "¡Éxito!",
                                    "¡Su venta ha sido registrada!",
                                    "success"
                                )
                            },
                            failure: function(response) {
                                Swal.fire(
                                    "Error interno",
                                    "Ups, tu venta no ha sido registrada.", // had a missing comma
                                    "error"
                                )
                            }
                        });
                    }
                },
                function(dismiss) {
                    if (dismiss === "cancel") {
                        swal(
                            "Cancelled",
                            "Canceled Note",
                            "error"
                        )
                    }
                })

        })
    })
</script>