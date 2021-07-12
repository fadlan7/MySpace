<div class="container-fluid">
    <!-- SELECT2 EXAMPLE -->
    <div class="card card-default">
        <div class="card-body">
            <?php
            echo form_open('admin/setting');
            if ($this->session->flashdata('messages')) {
                echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Success !</h5>';
                echo $this->session->flashdata('messages');
                echo '</div>';
            }
            ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Province</label>
                        <select name="province" class="form-control"></select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>City / Districts</label>
                        <select name="city" class="form-control">
                            <option value="<?= $setting->location ?>"><?= $setting->location ?></option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Store Name</label>
                        <input type="text" value="<?= $setting->store_name ?>" name="store_name" class="form-control" placeholder="Store Name" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>No. Telp</label>
                        <input type="text" value="<?= $setting->tel ?>" name="tel" class="form-control" placeholder="No. Telp" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Address</label>
                <input type="text" value="<?= $setting->address ?>" name="address" class="form-control" placeholder="Address" required>
            </div>

            <div class="form-group">
                <a href="<?= base_url('admin') ?>" class="btn btn-secondary btn-sm">Back</a>
                <button type="submit" class="btn btn-success btn-sm">Save</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        //input data province
        $.ajax({
            type: "POST",
            url: "<?= base_url('rajaongkir/province') ?>",
            success: function(province_result) {
                // console.log(province_result);
                $("select[name=province]").html(province_result);
            }
        });

        //input data city
        $("select[name=province]").on("change", function(params) {
            let id_province = $("option:selected", this).attr("id_province");

            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/city') ?>",
                data: "id_province=" + id_province,
                success: function(city_result) {
                    // console.log(city_result)
                    $("select[name=city]").html(city_result);
                }
            });
        });
    });
</script>