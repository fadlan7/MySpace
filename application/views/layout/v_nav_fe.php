<header class="header">
    <nav class="navbar navbar-expand-lg fixed-top py-3">
        <div class="container">
            <!-- <a href="#" class="navbar-brand text-uppercase font-weight-bold">Transparent Nav</a> -->
            <a class="navbar-brand" href="<?= base_url() ?>">
                <img class="img-myspace" src="<?= base_url() ?>assets/img/icon/myspace.png" alt="">
            </a>
            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>

            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <!-- Messages Dropdown Menu -->
                    <li class="nav-item active"><a href="<?= base_url() ?>" class="nav-link text-uppercase font-weight-bold text-black">Home <span class="sr-only">(current)</span></a></li>
                    <!-- <li class="nav-item"><a href="#" class="nav-link text-uppercase font-weight-bold">About</a></li> -->
                    <?php $category = $this->m_home->get_all_data_category() ?>
                    <li class="nav-item dropdown">
                        <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link text-uppercase font-weight-bold dropdown-toggle">Category</a>
                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                            <?php foreach ($category as $key => $value) { ?>
                                <li><a href="<?= base_url('home/category/' . $value->id_category) ?>" class="dropdown-item"><?= $value->category_name ?> </a></li>
                            <?php } ?>
                        </ul>
                    </li>

                    <?php
                    $cart = $this->cart->contents();
                    $total_product = 0;

                    foreach ($cart as $key => $value) {
                        // $total_product += $value['qty'];
                        $total_product = $total_product + $value['qty'];
                    }
                    ?>
                    <li class="nav-item dropdown">
                        <button class="nav-link wrap-img-shop mx-3 btn" data-toggle="dropdown">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="badge badge-danger navbar-badge"><?= $total_product ?></span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                            <?php if (empty($cart)) { ?>
                                <a href="#" class="dropdown-item">
                                    <p>Your Shopping Cart Is Empty</p>
                                </a>

                                <?php } else {
                                foreach ($cart as $key => $value) {
                                    $product = $this->m_home->product_details($value['id']);
                                ?>
                                    <!-- Product Start -->
                                    <a href="#" class="dropdown-item">
                                        <div class="media">
                                            <img src="<?= base_url('assets/img/product/' . $product->product_images) ?>" alt="User Avatar" class="img-size-50 mr-3">
                                            <div class="media-body">
                                                <h3 class="dropdown-item-title">
                                                    <?= $value['name'] ?>
                                                </h3>
                                                <p class="text-sm"><?= $value['qty'] ?> x Rp.<?= number_format($value['price'], 0) ?></p>
                                                <p class="text-sm text-muted"><i class="fa fa-calculator"></i> Rp.<?= $this->cart->format_number($value['subtotal']); ?></p>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                <?php } ?>
                                <!-- Product End -->
                                <a href="#" class="dropdown-item">
                                    <div class="media">
                                        <div class="media-body">
                                            <tr>
                                                <td colspan="2"> </td>
                                                <td class="right"><strong>Total:</strong></td>
                                                <td class="right">Rp.<?= $this->cart->format_number($this->cart->total()); ?></td>
                                            </tr>
                                        </div>
                                    </div>
                                </a>

                                <div class="dropdown-divider"></div>
                                <a href="<?= base_url('cart') ?>" class="dropdown-item dropdown-footer">View Cart</a>
                                <a href="<?= base_url('cart/checkout') ?>" class="dropdown-item dropdown-footer">Checkout</a>
                            <?php } ?>

                        </div>
                    </li>
                    <li class="nav-item">
                        <!-- <div class="mr-3 line" style="font-size: 26px;color: #cdcdcd;margin-bottom: 8px;font-weight: 100;">|</div> -->
                        <?php
                        if ($this->session->userdata('email') == "") { ?>
                            <a href="<?= base_url('customer/login') ?>" class="nav-link">
                                <div class="d-flex">
                                    <!-- <button class="btn font-weight-bold mr-3 text-white" style=" border-radius: 8px;font-size: 13px;background-color: #03ac0e;">Masuk</button> -->
                                    <button class="btn font-weight-bold" style=" border: 1px solid #03ac0e;color: #03ac0e;">Login / Register </button>
                                </div>
                            </a>
                        <?php } else { ?>
                            <a href="#" class="nav-link" data-toggle="dropdown">
                                <img style="width: 40px;" src="<?= base_url('assets/img/customer/' . $this->session->userdata('photo')) ?>" srcset="<?= base_url('assets/img/customer/customer1.jpg
                                ') ?>" class="brand-image img-circle elevation-1" style="opacity: .8">
                                <span class="brand-text font-weight-bold"><?= $this->session->userdata('full_name') ?></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                <div class="dropdown-divider"></div>
                                <a href="<?= base_url('customer/account') ?>" class="dropdown-item">
                                    <i class="fas fa-user mr-2"></i>My Account
                                </a>

                                <div class="dropdown-divider"></div>
                                <a href="<?= base_url('my_order') ?>" class="dropdown-item">
                                    <i class="fas fa-shopping-cart mr-2"></i>My Orders
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="<?= base_url('customer/logout') ?>" class="dropdown-item dropdown-footer">Sign Out</a>
                            </div>
                        <?php } ?>
                    </li>
                </ul>



                <!-- <div class="mr-3 line" style="font-size: 26px;color: #cdcdcd;margin-bottom: 8px;font-weight: 100;">|</div> -->
                <!-- 
                <div class="d-flex">
                    <button class="btn font-weight-bold mr-3 text-white" style=" border-radius: 8px;font-size: 13px;background-color: #03ac0e;">Masuk</button>
                    <button class="btn font-weight-bold" style=" background-color: #fff;border: 1px solid #03ac0e;color: #03ac0e;">Daftar </button>
                </div> -->
            </div>
        </div>
    </nav>
</header>