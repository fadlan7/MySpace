<div class="col-md-12">
    <div class="card card-success shadow-sm">
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
                        <th>Featured Image</th>
                        <th>Number of Pictures</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($productimages as $key => $value) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value->product_name ?></td>
                            <td class="text-center"><img src="<?= base_url('assets/img/product/' . $value->product_images) ?>" width="100px"></td>
                            <td class="text-center">
                                <h4><?= $value->number_of_images ?></h4>
                            </td>
                            <td class="text-center">
                                <a href="<?= base_url('productimages/add/' . $value->id_product) ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add Images</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            </>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>