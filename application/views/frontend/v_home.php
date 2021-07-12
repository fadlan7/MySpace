<div class="jumbotron bg-white">
    <div class="row pt-5">
        <div class="col-md-6 col-sm-12 text-center">
            <h1 class="display-4 text-center font-weight-bold mt-3">Find Furniture</h1>
            <h1 class="display-4 text-center font-weight-bold">For Your Dream Room</h1>

            <p class="m-5" style="font-size: 20px;">We provide classy furniture
                that makes the room feel comfortable
                at an affordable price.</p>
            <p class="lead">
                <a class="btn btn-lg rounded-pill" style="background-color: #6FFF6A;" href="#content" role="button">Explore Now</a>
            </p>
        </div>

        <div class="col-md-6 col-sm-12">
            <img class="img-fluid" style="width: 100%;" src="<?= base_url() ?>assets/img/jumbotron/jumbotron.jpg">
        </div>
    </div>
</div>

<div class="content-wrapper" id="content">
    <!-- Content Header (Page header) -->
    <div class="content-header pt-5">
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
            <div class="row">
                <?php foreach ($product as $key => $value) { ?>

                    <div class="col-12 col-sm-6 col-md-4">
                        <?php
                        echo form_open('cart/add');
                        echo form_hidden('id', $value->id_product);
                        echo form_hidden('qty', 1);
                        echo form_hidden('price', $value->price);
                        echo form_hidden('name', $value->product_name);
                        echo form_hidden('redirect_page' . str_replace('index.php/', '', current_url()));
                        ?>

                        <div class="card bg-light d-flex flex-fill bg-white">
                            <img src="<?= base_url('assets/img/product/' . $value->product_images) ?>" class="card-img-top" alt="..." style="height: 270px;">
                            <div class="card-header text-muted border-bottom-0">
                                <h5 class="card-title font-weight-bold"><?= $value->product_name ?></h5>
                            </div>
                            <div class="card-body pt-0">
                                <p class="text-muted text-sm"><b>Category: </b> <?= $value->category_name ?> </p>
                            </div>
                            <div class="card-footer bg-white">
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

    $(document).ready(function() {
        // Add smooth scrolling to all links
        $("a").on('click', function(event) {

            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
                // Prevent default anchor click behavior
                event.preventDefault();

                // Store hash
                var hash = this.hash;

                // Using jQuery's animate() method to add smooth page scroll
                // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 800, function() {

                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                });
            } // End if
        });
    });
</script>