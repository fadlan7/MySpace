<div class="content-wrapper pb-4" style="padding-top: 100px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">MySpace</a></li>
                        <li class="breadcrumb-item font-weight-bold"><a href="#"><?= $title ?></a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="card card-solid">
                <div class="card-body pb-5">
                    <!-- <div class="row">
                        <div class="col-md-4">
                        <?php echo form_open_multipart('customer/account/' . $customer->id_customer) ?>
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" name="full_name" class="form-control" placeholder="Customer Full Name" value="<?= $customer->full_name ?>" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" class="form-control" placeholder="Email" value="<?= $customer->email?>" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Password</label>
                                <input name="password" class="form-control" placeholder="Password" value="<?= $customer->password ?>" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Customer Photo</label>
                                    <input type="file" name="photo" id="image_preview" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <img src="<?= base_url('assets/img/customer/' . $customer->photo) ?>" id="image_load" width="300px">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12"></div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-sm">Save</button>
                        </div>
                    </div>
                    <?php echo form_close() ?> -->
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(function() {
        $('.navbar').addClass('active');
    });

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