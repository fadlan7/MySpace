<div class=" grid-container">
    <div class="grid-item">
        <h1 class="display-4">Hello, world!</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
    </div>

    <div class="grid-item">22121</div>
</div>

<!-- Content Wrapper. Contains page content -->
<!-- <div class="content-wrapper bg-grey">
    <div class="content">
        <div class="container pb-4 pt-4">
            <h3 class="text-bold">
                Browse The Room
                <br>
                That We Designed For You
            </h3>

            <div class="row">
                <div class="col-sm border">
                    One of three columns
                </div>
                <div class="col-sm border">
                    One of three columns
                </div>
                <div class="col-sm border">
                    One of three columns
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="content-wrapper">
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
                        <li class="breadcrumb-item"><a href="#"><?= $title ?></a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">

            <!-- Default box -->
            <div class="card card-solid">
                <div class="card-body pb-0">
                    <div class="row">

                        <?php foreach ($product as $key => $value) { ?>

                            <div class="col-12 col-sm-6 col-md-4">
                                <?php 
                                echo form_open('cart/add');
                                echo form_hidden('id', $value->id_product);
                                echo form_hidden('qty', 1);
                                echo form_hidden('price', $value->price);
                                echo form_hidden('name', $value->product_name);
                                echo form_hidden('redirect_page'.str_replace('index.php/','',current_url()));
                                ?>

                                <div class="card bg-light d-flex flex-fill">
                                    <div class="card-header text-muted border-bottom-0">
                                        <h2 class="lead"><b><?= $value->product_name ?></b></h2>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="col">
                                            <div class="col-7">
                                                <p class="text-muted text-sm"><b>Category: </b> <?= $value->category_name ?> </p>
                                            </div>
                                            <div class="col-5 text-center">
                                                <img src="<?= base_url('assets/img/product/' . $value->product_images) ?>" height="250px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                Rp. <?= number_format($value->price, 0) ?>
                                            </div>
                                            <div class="col-sm-6 text-right">
                                                <a href="<?= base_url('home/product_details/' . $value->id_product) ?>" class="btn btn-sm bg-teal">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <button type="submit" class="btn btn-sm btn-primary swalDefaultSuccess">
                                                    <i class="fas fa-cart-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- SweetAlert2 -->
<script src="<?= base_url() ?>templates/plugins/sweetalert2/sweetalert2.min.js"></script>
<script>
    $(function() {
        $(window).on('scroll', function() {
            if ($(window).scrollTop() > 10) {
                $('.navbar').addClass('active');
            } else {
                $('.navbar').removeClass('active');
            }
        });


        var Toast = Swal.mixin({
            toast: true,
            position: 'bottom-end',
            showConfirmButton: false,
            timer: 3000
        });

        $('.swalDefaultSuccess').click(function() {
            Toast.fire({
                icon: 'success',
                title: 'Product successfully added to cart!!'
            })
        });
    });
</script>