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
                <!-- left column -->
                <div class="col-sm-6">
                    <!-- general form elements -->
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Payment transfer</h3>
                        </div>
                        <div class="card-body">
                            <!-- <p style="font-size: 2em;">Transfer payment to the account number below in the amount of:</p> -->
                            <p style="font-size: 2rem;">Total: <span class="font-weight-bold">Rp. <?= number_format($orders->total, 0) ?>.-</span></p>

                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th>Bank</th>
                                        <th>Account Number</th>
                                        <th>Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($rekening as $key => $value) { ?>
                                        <tr>
                                            <td><?= $value->bank_name ?></td>
                                            <td><?= $value->no_rek ?></td>
                                            <td><?= $value->atas_nama ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Proof of Payment</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php
                        echo form_open_multipart('my_order/pay/' . $orders->id_transaction);
                        ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input name="in_the_name_of" class="form-control" placeholder="Enter Name" required>
                            </div>

                            <div class="form-group">
                                <label>Bank Name</label>
                                <input name="bank_name" class="form-control" placeholder="Enter Bank Name" required>
                            </div>

                            <div class="form-group">
                                <label>Rekening Number</label>
                                <input name="no_rek" class="form-control" placeholder="Enter Rekening Number" required>
                            </div>

                            <div class="form-group">
                                <label>Photo of Receipt/Proof of Payment</label>
                                <div class="custom-file mb-3">
                                    <input name="proof_payment" type="file" class="form-control" aria-describedby="ppayment" required>
                                    <small id="ppayment" class="form-text ">Max. 5MB</small>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <a href="<?= base_url('my_order') ?>" class="btn btn-secondary">Back</a>
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                    <!-- /.card -->
                    </>
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