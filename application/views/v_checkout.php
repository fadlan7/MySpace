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
            <div class="card card-solid">
                <div class="card-body pb-5">
                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <!-- <i class="fas fa-globe"></i> <b>My</b>Space -->
                                    <img src="<?= base_url() ?>assets/img/icon/myspace.png" alt="">
                                    <small class="float-right">Date: <?= date('d-m-y') ?></small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-6 invoice-col">
                                From
                                <address>
                                    <strong>Admin, Inc.</strong><br>
                                    795 Folsom Ave, Suite 600<br>
                                    San Francisco, CA 94107<br>
                                    Phone: (804) 123-5432<br>
                                    Email: info@almasaeedstudio.com
                                </address>
                            </div>

                            <div class="col-sm-6 invoice-col">
                                <b>Invoice #007612</b><br>
                                <br>
                                <b>Order ID:</b> 4F3S8J<br>
                                <b>Payment Due:</b> 2/22/2014<br>
                                <b>Account:</b> 968-34567
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Qty</th>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Weight</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        $t_weight = 0;

                                        foreach ($this->cart->contents() as $items) {
                                            $product = $this->m_home->product_details($items['id']);
                                            $weight = $items['qty'] * $product->product_weight;
                                            $t_weight = $t_weight + $weight;
                                        ?>
                                            <tr>
                                                <td class="text-center"><?php echo $items['qty']; ?></td>
                                                <td><?php echo $items['name']; ?></td>
                                                <td class="text-right">Rp.<?php echo $this->cart->format_number($items['price']); ?></td>
                                                <td class="text-right"><?= $weight ?> gr</td>
                                                <td class="text-right">Rp.<?php echo $this->cart->format_number($items['subtotal']); ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <?php
                        echo validation_errors('<div class="alert alert-danger alert-dismissible">
                             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            ', '</div>');
                        ?>
                        <?php
                        echo form_open('cart/checkout');
                        $no_order = date('Ymd') . strtoupper(random_string('alnum', 8));

                        ?>
                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-7 invoice-col">
                                To
                                <address>
                                    <!-- <strong>John Doe</strong><br>
                                    795 Folsom Ave, Suite 600<br>
                                    San Francisco, CA 94107<br>
                                    Phone: (555) 539-1037<br>
                                    Email: john.doe@example.com -->
                                </address>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Province</label>
                                            <select name="province" class="form-control"></select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>City / Districts</label>
                                            <select name="city" class="form-control">
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Courier</label>
                                            <select name="courier" class="form-control">
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Choose Delivery</label>
                                            <select name="delivery" class="form-control">
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Recipient's Name</label>
                                            <input type="text" name="recipient_name" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Recipient's Phone Number</label>
                                            <input type="text" name="tel" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea name="address" class="form-control" required cols="30" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Postal Code</label>
                                            <input type="text" name="postal_code" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-5">
                                <!-- <p class="lead">Amount Due 2/22/2014</p> -->

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Subtotal:</th>
                                            <td class="font-weight-bold text-right">Rp.<?php echo $this->cart->format_number($this->cart->total()); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Weight:</th>
                                            <td class="font-weight-bold text-right"><?php echo $t_weight ?> gr</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping:</th>
                                            <td class="font-weight-bold text-right" id="shipping"></td>
                                        </tr>
                                        <tr>
                                            <th>Total:</th>
                                            <td class="font-weight-bold text-right" id="pay"></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Transaction -->
                        <input name="no_order" value="<?= $no_order ?>">
                        <input name="estimation">
                        <input name="shipping">
                        <input name="weight" value="<?= $t_weight  ?>">
                        <input name="subtotal" value="<?= $this->cart->total() ?>">
                        <input name="total">
                        <!-- End Transaction -->

                        <div class="row no-print">
                            <div class="col-12">
                                <a href="<?= base_url('cart') ?>" rel="noopener" class="btn btn-default">Back to Cart</a>

                                <button type="submit" class="btn btn-success float-right" style="margin-right: 5px;">
                                    Checkout Now
                                </button>
                            </div>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                    <!-- /.invoice -->

                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(function() {
        $('.navbar').addClass('active');
    });

    $(document).ready(function() {
        //input data province
        $.ajax({
            type: "POST",
            url: "<?= base_url('rajaongkir/province') ?>",
            success: function(province_result) {
                // console.log(province_result);
                $("select[name=province]").html(province_result);
            }
        });

        //input data city
        $("select[name=province]").on("change", function(params) {
            let id_province = $("option:selected", this).attr("id_province");

            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/city') ?>",
                data: "id_province=" + id_province,
                success: function(city_result) {
                    // console.log(city_result)
                    $("select[name=city]").html(city_result);
                }
            });
        });

        $("select[name=city]").on("change", function(params) {
            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/courier') ?>",
                success: function(courier_result) {
                    // console.log(courier_result)
                    $("select[name=courier]").html(courier_result);
                }
            });
        });

        $("select[name=courier]").on("change", function(params) {
            //get courier 
            let get_courier = $('select[name=courier]').val()

            //get id_city destination
            let city_destination = $('option:selected', 'select[name=city]').attr('id_city');

            //get ongkir
            let t_weight = <?= $t_weight ?>;

            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/delivery') ?>",
                data: 'courier=' + get_courier + '&id_city=' + city_destination + '&weight=' + t_weight,
                success: function(delivery_result) {
                    // console.log(delivery_result);
                    $("select[name=delivery]").html(delivery_result);
                }
            });
        });


        $("select[name=delivery]").on("change", function(params) {
            //shipping
            let shipping = $('option:selected', this).attr('shipping');
            let reverse = shipping.toString().split('').reverse().join(''),
                ribuan_ongkir = reverse.match(/\d{1,3}/g);
            ribuan_ongkir = ribuan_ongkir.join(',').split('').reverse().join('');

            $('#shipping').html("Rp. " + ribuan_ongkir)


            //total
            let pay = parseInt(shipping) + parseInt(<?= $this->cart->total(); ?>)
            let reverse1 = pay.toString().split('').reverse().join(''),
                ribuan_ttl = reverse1.match(/\d{1,3}/g);
            ribuan_ttl = ribuan_ttl.join(',').split('').reverse().join('');

            $('#pay').html("Rp. " + ribuan_ttl);


            //estimation and shipping
            let estimation = $('option:selected', this).attr('estimation');
            $('input[name=estimation]').val(estimation);
            $('input[name=shipping]').val(shipping);
            $('input[name=total]').val(pay);
        });
    });
</script>