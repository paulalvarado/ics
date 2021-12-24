<div class="card">
    <div class="card-header">
        <h3 class="card-title">Todos los productos</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>SKU</th>
                    <th>Stock</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $key => $p) : ?>
                    <tr data-item='<?= json_encode($p) ?>'>
                        <td class="tooltip-<?= $p->id_producto ?>" data-toggle="tooltip" data-placement="auto" data-html="true" title="<b><a class='text-white' href='<?= base_url('productos/edit') . '/' . $p->id_producto ?>'>Editar</a></b>"><?= $p->producto ?></td>
                        <td><?= $p->descripcion ?></td>
                        <td><?= $p->sku ?></td>
                        <td><?= $p->stock ?></td>
                    </tr>
                    <script>
                        $('.tooltip-<?= $p->id_producto ?>').tooltip({
                            customClass: 'tooltip-show-<?= $p->id_producto ?>',
                            trigger: 'focus',
                            delay: { "show": 0, "hide": 0 }
                        })
                        $('.tooltip-<?= $p->id_producto ?>').click(function() {
                            $('.tooltip-show-<?= $p->id_producto ?>').css({
                                top: checkCursorY(),
                                left: checkCursorX(),
                                transform: 'translate3d(-20px, -20px, -10px)',
                                transition: '.2s'
                            })
                            console.log(checkCursorX() + checkCursorY())
                        })
                    </script>
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>SKU</th>
                    <th>Stock</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>

<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        $('.submit-form-add-product').click(function() {
            $.post(url + 'productos/guardar', {
                name: $('#form-add-product input[name="producto"]').val(),
                sku: $('#form-add-product input[name="sku"]').val(),
                stock: $('#form-add-product input[name="stock"]').val(),
                stockmin: $('#form-add-product input[name="stockmin"]').val(),
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
    });
    
    var cursorX;
        var cursorY;
        document.onmousemove = function(e) {
            cursorX = e.pageX;
            cursorY = e.pageY;
        }

        function checkCursorX() {
            return cursorX
        }
        function checkCursorY() {
            return cursorY
        }
</script>