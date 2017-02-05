
<body class="product-view">

    <section class="product_breadcrumb">
      <div class="row">
          <h3 class="text-center pd-l-lg pd-r-lg white-text">All Orders</h3>
      </div>
    </section>

    <section class="content-2 simple col-1 col-undefined mbr-after-navbar" id="content11-77" style="color: #000;">
      <div class="container">
      <?php foreach($order_products as $product): ?>
            <div class="row row-product-detail">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-6 col-sm-6 col-xs-4">
                    <?= $this->Html->image($product->product->hero, ['class' => 'img-responsive', 'style' => 'max-width: 120px; margin-top: 5px;']) ?>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-8">
                    <p class="text-left"><strong><?= h($product->name) ?></strong></p>
                    <div class="text-left" id="small-pr" style="text-align: left !important;">
                    <?=
                    $this->Text->truncate(
                        $product->product->content,
                        50,
                        [
                            'ellipsis' => '...',
                            'exact' => false
                        ]
                    ) ?>
                    </div>
                   <p class="text-left"><?= h($product->price) ?></p>
                </div>
              </div>
            </div> <br />
        <?php endforeach; ?>
        <div class="row order-detail-billing">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <p class="text-center">Sub Total ($)</p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <p class="text-center">$<?= $order['subtotal']; ?></p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <p class="text-center">Delivery (<?= $order['delivery_method_name']; ?>)</p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <p class="text-center">$<?= $order['delivery_method_price']; ?></p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <p class="text-center">GST ($)</p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <p class="text-center">$<?= $order['gst']; ?></p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-offset-2 col-xs-8">
                <div style="height: 2px; width: 100%; background: #ccc; margin-top: 5px;
margin-bottom: 10px;"></div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <p class="text-center"><strong>TOTAL</strong></p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <p class="text-center"><strong>$<?= $order['total']; ?></strong></p>
                </div>
              </div>
            </div>
        </div>
        <div class="row order-detail-delivery">
          <div class="col-md-12">
            <h2 class="text-center" style="margin-bottom: 0px !important;">Deliver Items To...</h2>
            <p style="color: #000;" class="text-center"><?= $order['first_name'] . ' ' . $order['last_name']; ?><br />
            <?= $order['delivery_address']; ?> <br />
            <?= $order['delivery_suburb']; ?> <?= $order['delivery_state']; ?> <?= $order['delivery_post_code']; ?> <br />
            e. <?= $order['email']; ?> <br />
            p. <?= $order['phone']; ?></p>
          </div>
        </div>
        <div class="row order-detail-billing">
          <div class="col-md-12">
            <h2 class="text-center" style="margin-bottom: 0px !important;">Send Invoice To...</h2>
            <p style="color: #000;" class="text-center"><?= $order['first_name'] . ' ' . $order['last_name']; ?><br />
            <?= $order['billing_address']; ?> <br />
            <?= $order['billing_suburb']; ?> <?= $order['billing_state']; ?> <?= $order['billing_post_code']; ?> <br />
            e. <?= $order['email']; ?> <br />
            p. <?= $order['phone']; ?></p>
          </div>
        </div>
      </div>
    </section>
</body>