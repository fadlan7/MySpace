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
                        <!-- <li class="breadcrumb-item"><a href="#"><?= $product->category_name ?></a></li>
                        <li class="breadcrumb-item text-bold active" aria-current="page"><?= $product->product_name ?></li> -->
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="register-box m-auto">
                <div class="card card-outline card-primary">
                    <div class="card-header text-center">
                        <a href="<?= base_url() ?>" class="h1"><b>My</b>Space</a>
                    </div>
                    <div class="card-body">
                        <p class="login-box-msg">Register a new membership</p>

                        <?php
                        echo validation_errors('<div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>', '</div>');

                        if ($this->session->flashdata('regist')) {
                            echo '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i> Success!</h5>';
                            echo $this->session->flashdata('regist');
                            echo '</div>';
                        }

                        echo form_open('customer/register'); ?>
                        <div class="input-group mb-3">
                            <input type="text" name="full_name" value="<?= set_value('full_name') ?>" class="form-control" placeholder="Full name">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" name="email" value="<?= set_value('email') ?>" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control" value="<?= set_value('password') ?>" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="retype_password" value="<?= set_value('retype_password') ?>" class="form-control" placeholder="Retype password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                    <label for="agreeTerms">
                                        I agree to the <a href="#">terms</a>
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                            </div>
                            <!-- /.col -->
                        </div>
                        <?php echo form_close() ?>

                        <div class="social-auth-links text-center">
                            <a href="#" class="btn btn-block btn-primary">
                                <i class="fab fa-facebook mr-2"></i>
                                Sign up using Facebook
                            </a>
                            <a href="#" class="btn btn-block btn-danger">
                                <i class="fab fa-google-plus mr-2"></i>
                                Sign up using Google+
                            </a>
                        </div>

                        <a href="<?= base_url('customer/login') ?>" class="text-center">I already have a membership</a>
                    </div>
                    <!-- /.form-box -->
                </div><!-- /.card -->
            </div>
            <!-- /.register-box -->
        </div>
    </div>
</div>


<script>
    $(function() {
        $('.navbar').addClass('active');
    });
</script>