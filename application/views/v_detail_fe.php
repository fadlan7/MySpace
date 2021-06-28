<div class="content-wrapper" style="padding-top: 100px;">
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
                        <li class="breadcrumb-item"><a href="#"><?= $product->category_name ?></a></li>
                        <li class="breadcrumb-item text-bold active" aria-current="page"><?= $product->product_name ?></li>
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
                <div class="card-body pb-5">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <h3 class="d-inline-block d-sm-none"><?= $product->product_name ?></h3>
                            <div class="col-12">
                                <img src="<?= base_url('assets/img/product/' . $product->product_images) ?>" class="product-image" alt="Product Image">
                            </div>
                            <div class="col-12 product-image-thumbs">
                                <div class="product-image-thumb active"><img src="<?= base_url('assets/img/product/' . $product->product_images) ?>" alt="Product Image"></div>

                                <?php foreach ($images as $key => $value) { ?>
                                    <div class="product-image-thumb"><img src="<?= base_url('assets/img/productimages/' . $value->product_images) ?>" alt="Product Image"></div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h3 class="my-3"><?= $product->product_name ?></h3>
                            <div class="mt-4">
                                <h2 class="mb-0 text-bold">
                                    Rp. <?= number_format($product->price, 0) ?>.00
                                </h2>
                            </div>
                            <div class="mt-4">
                                <div class="btn btn-lg btn-flat rounded-pill" style="background-color: #6FFF6A;">
                                    <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                    Add to Cart
                                </div>
                            </div>

                            <hr>
                            <h4>About the product:</h4>
                            <p><?= $product->description ?></p>

                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>


<script>
    $(function() {
        $('.navbar').addClass('active');
    });


    $(document).ready(function() {
        $('.product-image-thumb').on('click', function() {
            var $image_element = $(this).find('img')
            $('.product-image').prop('src', $image_element.attr('src'))
            $('.product-image-thumb.active').removeClass('active')
            $(this).addClass('active')
        })
    })
</script>