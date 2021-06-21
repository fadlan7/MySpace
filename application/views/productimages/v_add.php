<div class="col-md-12">
    <div class="card card-success shadow-sm">
        <div class="card-header">
            <h3 class="card-title"><?= $product->product_name ?></h3>
        </div>

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

            <?php echo form_open_multipart('productimages/add/' . $product->id_product) ?>

            <div class="form-group">
                <label>Image Description</label>
                <input type="text" name="img_desc" class="form-control" placeholder="Image Description" value="<?= set_value('img_desc') ?>" required>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Product Images</label>
                        <input type="file" name="productimages" id="image_preview" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <img src="<?= base_url('assets/img/icon/no-images.png') ?>" id="image_load" width="200px">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <a href="<?= base_url('productimages') ?>" class="btn btn-secondary btn-sm">Back</a>
                <button type="submit" class="btn btn-success btn-sm">Save</button>
            </div>
            <?php echo form_close() ?>

            <hr>
            <div class="row">
                <?php foreach ($productimages as $key => $value) { ?>

                    <div class="col-md-3 text-center">
                        <div class="form-group">
                            <img src="<?= base_url('assets/img/productimages/' . $value->product_images) ?>" id="image_load" width="150px" height="150px">
                        </div>
                        <label for=""><?= $value->img_desc ?></label>
                        <br>
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete<?= $value->id_images ?>"><i class="fas fa-trash"></i></button>
                    </div>

                <?php } ?>
            </div>

            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>



<!-- Modal Delete -->
<?php
foreach ($productimages as $key => $value) { ?>
    <div class="modal fade" id="modal-delete<?= $value->id_images ?>">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete <?= $value->img_desc ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">

                    <div class="form-group">
                        <img src="<?= base_url('assets/img/productimages/' . $value->product_images) ?>" id="image_load" width="150px" height="150px">
                    </div>
                    <h4>Are you sure you want to delete this images?</h4>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <a href="<?= base_url('productimages/delete/' . $value->id_product . '/' . $value->id_images) ?>" class="btn btn-danger">Delete</a>
                    </div>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
    <!-- /.modal -->
<?php } ?>

<script>
    function readImages(input) {
        if (input.files && input.files[0]) {
            let read = new FileReader();
            read.onload = function(e) {
                $('#image_load').attr('src', e.target.result)
            }
            read.readAsDataURL(input.files[0]);
        }
    }

    $("#image_preview").change(function() {
        readImages(this);
    });
</script>