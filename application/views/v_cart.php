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
            <div class="card card-solid">
                <div class="card-body pb-5">
                    <div class="row">
                        <div class="col-sm-12">
                            <?php echo form_open('cart/update'); ?>

                            <table class="table table-striped table-bordered table-responsive-sm" cellpadding="6" cellspacing="1" style="width:100%">
                                <thead>
                                    <tr class="text-center">
                                        <th>Product Name</th>
                                        <th width="100px">QTY</th>
                                        <th style="text-align:right">Item Price</th>
                                        <th style="text-align:right">Sub-Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php $i = 1; ?>

                                <?php foreach ($this->cart->contents() as $items) : ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $items['name']; ?></td>
                                            <td><?php echo form_input(array(
                                                    'name' => $i . '[qty]',
                                                    'value' => $items['qty'],
                                                    'maxlength' => '3',
                                                    'size' => '5',
                                                    'min' => '0',
                                                    'type' => 'number',
                                                    'class' => 'form-control',
                                                )); ?></td>
                                            <td style="text-align:right">Rp.<?php echo $this->cart->format_number($items['price']); ?></td>
                                            <td style="text-align:right">Rp.<?php echo $this->cart->format_number($items['subtotal']); ?></td>
                                            <td class="text-center">
                                                <a href="<?= base_url('cart/delete/' . $items['rowid']) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>

                                        <?php $i++; ?>

                                    <?php endforeach; ?>

                                    <tr>
                                        <td colspan="2"> </td>
                                        <td class="right"><strong>Total</strong></td>
                                        <td class="right"><strong>Rp.<?php echo $this->cart->format_number($this->cart->total()); ?></strong> </td>
                                    </tr>
                                    </tbody>
                            </table>

                            <div class="row mt-4 mb-2">
                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-primary">Update your Cart</button>
                                    <a href="<?= base_url('cart/clear') ?>" class="btn btn-danger">Clear Cart</a>
                                    <a href="" class="btn btn-success">Checkout</a>
                                </div>
                            </div>
                            <?php echo form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(function() {
        $('.navbar').addClass('active');
    });
</script>