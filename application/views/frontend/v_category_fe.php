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

                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
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
                                        <!-- <button type="submit" class="btn btn-sm btn-primary swalDefaultSuccess">
                                            <i class="fas fa-cart-plus"></i>
                                        </button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        $('.navbar').addClass('active');
    });
</script>