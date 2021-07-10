<!-- Main content -->
<div class="invoice p-3 mb-3 col-12">
    <!-- title row -->
    <div class="row">
        <div class="col-12">
            <div class="text-center font-weight-bold text-xl"><?= $title ?></div>
            <h4>
                <img src="<?= base_url('assets/img/icon/myspace.png') ?>">
                <small class="float-right">Date: <?= $date ?>/<?= $month ?>/<?= $year ?></small>
            </h4>
        </div>
        <!-- /.col -->
    </div>
    <!-- Table row -->
    <div class="row">
        <div class="col-12 table-responsive mt-2">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Order Number</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>QTY</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $total = 0;
                    foreach ($daily_report as $key => $value) {
                        $t_price = $value->qty * $value->price;
                        $total = $total + $t_price
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value->no_order ?></td>
                            <td><?= $value->product_name ?></td>
                            <td>Rp. <?= number_format($value->price, 0) ?></td>
                            <td><?= $value->qty ?></td>
                            <td>Rp. <?= number_format($t_price, 0) ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="row">
        <!-- accepted payments column -->
        <div class="col-7">

        </div>
        <!-- /.col -->
        <div class="col-5">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>Total:</th>
                        <td class="font-weight-bold">Rp. <?= number_format($total,0) ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->


    <!-- this row will not appear when printing -->
    <div class="row no-print">
        <div class="col-12">
            <button class="btn btn-default" onclick="window.print()"><i class="fas fa-print"></i> Print</button>
        </div>
    </div>
</div>
<!-- /.invoice -->