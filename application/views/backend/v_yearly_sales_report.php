<!-- Main content -->
<div class="invoice p-3 mb-3 col-12">
    <!-- title row -->
    <div class="row">
        <div class="col-12">
            <div class="text-center font-weight-bold text-xl"><?= $title ?></div>
            <h4>
                <img src="<?= base_url('assets/img/icon/myspace.png') ?>">
                <small class="float-right">Year: <?= $year ?></small>
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
                        <th>Date</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $total = 0;
                    foreach ($yearly_report as $key => $value) {
                        $total = $total + $value->total;
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value->no_order ?></td>
                            <td><?= $value->date_order ?></td>
                            <td>Rp. <?= number_format($value->total,0)?></td>
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
                        <td class="font-weight-bold">Rp. <?= number_format($total,2) ?></td>
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