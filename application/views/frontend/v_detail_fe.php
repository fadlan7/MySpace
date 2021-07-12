<style>
    /* .qty .count {
        color: #000;
        display: inline-block;
        vertical-align: top;
        font-size: 25px;
        font-weight: 700;
        line-height: 30px;
        padding: 0 2px;
        min-width: 35px;
        text-align: center;
    }

    .qty .plus {
        cursor: pointer;
        display: inline-block;
        vertical-align: top;
        color: white;
        width: 30px;
        height: 30px;
        font: 30px/1 Arial, sans-serif;
        text-align: center;
        border-radius: 50%;
    }

    .qty .minus {
        cursor: pointer;
        display: inline-block;
        vertical-align: top;
        color: white;
        width: 30px;
        height: 30px;
        font: 30px/1 Arial, sans-serif;
        text-align: center;
        border-radius: 50%;
        background-clip: padding-box;
    }

    .minus:hover {
        background-color: #717fe0 !important;
    }

    .plus:hover {
        background-color: #717fe0 !important;
    }

    /*Prevent text selection*/
    /* span {
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
    }

    input {
        border: 0;
        width: 2%;
    }

    nput::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input:disabled {
        background-color: white;
    } */
</style>

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
    <div class="content pb-5">
        <div class="container">

            <!-- Default box -->
            <div class="card card-solid m-0">
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
                            <h3 class="mb-0 text-bold">
                                Rp. <?= number_format($product->price, 0) ?>.00
                            </h3>
                            <?php echo form_open('cart/add');
                            echo form_hidden('id', $product->id_product);
                            echo form_hidden('price', $product->price);
                            echo form_hidden('name', $product->product_name);
                            echo form_hidden('redirect_page' . str_replace('index.php/', '', current_url()));
                            ?>
                            <div class="mt-3">
                                <div class="row">
                                    <div class="qty ml-2">
                                        <!-- <span class="minus bg-dark">-</span> -->
                                        <input type="number" name="qty" value="1" min="1">
                                        <!-- <span class="plus bg-dark">+</span> -->
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <!-- <div class="col-sm-2">
                                        <input type="number" class="form-control" value="1" min="1">
                                    </div> -->
                                    <div class="col-sm-8">
                                        <button type="submit" class="btn btn-flat rounded-pill swalDefaultSuccess" style="background-color: #6FFF6A;">
                                            <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                            Add to Cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <?php echo form_close() ?>
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



<!-- SweetAlert2 -->
<script src="<?= base_url() ?>templates/plugins/sweetalert2/sweetalert2.min.js"></script>
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

    $(function() {
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

    // $(document).ready(function() {
    //     $('.count').prop('disabled', true);
    //     $(document).on('click', '.plus', function() {
    //         $('.count').val(parseInt($('.count').val()) + 1);
    //     });
    //     $(document).on('click', '.minus', function() {
    //         $('.count').val(parseInt($('.count').val()) - 1);
    //         if ($('.count').val() == 0) {
    //             $('.count').val(1);
    //         }
    //     });
    // });
</script>