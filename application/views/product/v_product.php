<div class="col-md-12">
    <div class="card card-success shadow-sm">
        <div class="card-header">
            <!-- <h3 class="card-title">User Data</h3> -->

            <div class="card-tools">
                <a href="<?= base_url('product/add') ?>" type="button" class="btn btn-success"><i class="fas fa-plus"></i>
                    Add</a>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php
            if ($this->session->flashdata('messages')) {
                echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Success !</h5>';
                echo $this->session->flashdata('messages');
                echo '</div>';
            }
            ?>
            <table id="dtBasicExample" class="table table-bordered table-striped table-responsive-sm">
                <thead>
                    <tr class="text-center">
                        <th>No.</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Product Images</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($product as $key => $value) { ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td>
                                <b><?= $value->product_name ?></b>
                                <br>
                                Product Weight: <?= $value->product_weight ?> gr
                            </td>
                            <td><?= $value->category_name ?></td>
                            <td>Rp. <?= number_format($value->price, 00) ?></td>
                            <td class="text-center"><img src="<?= base_url('assets/img/product/' . $value->product_images) ?>" alt="" srcset="" width="150px"></td>
                            <td class="text-center">
                                <a href="<?= base_url('product/update/' . $value->id_product) ?>" class="btn btn-primary btn-sm m-2">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete<?= $value->id_product ?>">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>


<!-- Modal Delete -->
<?php
foreach ($product as $key => $value) { ?>
    <div class="modal fade" id="modal-delete<?= $value->id_product ?>">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete <?= $value->product_name ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <h4>Are you sure you want to delete <?= $value->product_name ?>?</h4>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <a href="<?= base_url('product/delete/' . $value->id_product) ?>" class="btn btn-danger">Delete</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
    <!-- /.modal -->
<?php } ?>