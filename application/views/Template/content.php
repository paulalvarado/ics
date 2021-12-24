<?php $this->load->view('Template/header'); ?>
<?php $this->load->view('Template/asidebar'); ?>
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
                                <a href="<?= $b['url'] ?>" id="<?= $b['id'] ?>" class="btn btn-outline-success btn-sm ml-5"><?= $b['titulo'] ?></a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <?php $cuenta = count($breadcrumbs) - 1 ?>
                        <?php foreach ($breadcrumbs as $key => $value) : ?>
                            <li class="breadcrumb-item <?= ($cuenta == $key) ? 'active' : '' ?>"><a href="<?= $value['url'] ?>"><?= $value['name'] ?></a></li>
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
<?php $this->load->view('Template/footer'); ?>