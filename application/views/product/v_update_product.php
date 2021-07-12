<div class="container-fluid">
    <!-- SELECT2 EXAMPLE -->
    <div class="card card-default">
        <div class="card-body">
            <?php echo form_open_multipart('product/update/' . $product->id_product) ?>
            <div class="form-group">
                <label>Product Name</label>
                <input type="text" name="product_name" class="form-control" placeholder="Product Name" value="<?= $product->product_name ?>" required>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Product Price</label>
                        <input name="price" class="form-control" placeholder="Product Price" value="<?= $product->price ?>" required>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Product Weight (gr)</label>
                        <input type="number" min="0" name="product_weight" class="form-control" placeholder="Product Weight" value="<?= $product->product_weight ?>" required>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Category</label>
                        <select name="id_category" class="form-control" required>
                            <option value="<?= $product->id_category ?>"><?= $product->category_name ?></option>
                            <?php foreach ($category as $key => $value) { ?>
                                <option value="<?= $value->id_category ?>"><?= $value->category_name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Product Description</label>
                        <textarea class="form-control" name="description" rows="10" placeholder="Product Description" required><?= $product->description ?></textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Product Images</label>
                        <input type="file" name="product_images" id="image_preview" class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <img src="<?= base_url('assets/img/product/'. $product->product_images) ?>" id="image_load" width="300px">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <a href="<?= base_url('product') ?>" class="btn btn-secondary btn-sm">Back</a>
                <button type="submit" class="btn btn-success btn-sm">Save</button>
            </div>

            <?php echo form_close() ?>
        </div>
    </div>
</div>

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