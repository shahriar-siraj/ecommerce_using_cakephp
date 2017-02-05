
<?php use Cake\Routing\Router; ?>

<?php $this->start('scriptBottom'); ?>

<?php $this->end() ?>

<body class="product-view">

    <div class="container">

      <section class="product_breadcrumb" style="background:#fff !important; margin-top: 90px;">
        <div class="row">
            <p class="grey-color fs21 text-center" style="margin-bottom: 0px !important;"><span class="black-color">Cart</span> > Billing & Shipping > Pay Method > Preview Order</p>
        </div>
      </section>

      <div class="row">
        <div class="col-md-12" style="background: #fff;">
          <h3 class="text-center pd-l-lg pd-r-lg black-text fs35 mgt-xs" style="padding-bottom: 5px;">YOUR CART</h3>
        </div>
      </div>

    </div>

    <?php if ($cart['products']): ?>

       <table class="table mgt-xs" style="background-color: #f7f7f7;">
        <tbody>

            <?php foreach ($cart['products'] as $product): ?>
              <tr class="product-line">
                  <td style="width: 80px;"><?= $this->Html->image($product['hero'], ['class' => 'img-responsive', 'style' => 'max-width: 80px; min-height: 70px; max-height: 70px; margin-top: 10px;']) ?></td>
                  <td>
                    <strong><?php echo $product['name']; ?></strong><br />
                    <span style="color: #999999">
                      <?=
                      $this->Text->truncate(
                          $product['content'],
                          30,
                          [
                              'ellipsis' => '...',
                              'exact' => false
                          ]
                      ) ?>
                    </span>
                    <div>
                      <input type="text" class="form-control updateQty" value="<?= $product['qty']; ?>" data-url="<?php echo $this->Url->build(['controller' => 'cart', 'action' => 'update_cart',$product['id']]); ?>" style="background: #fff !important; width: 55px; text-align: center; padding-top: 5px; padding-bottom: 5px;">
                    </div>
                  </td>
                  <td>
                    <a href="#" class="removeProduct" data-url="<?php echo $this->Url->build(['controller' => 'cart', 'action' => 'remove_cart',$product['id']]); ?>">
                      <span class="glyphicon glyphicon-remove" style="top: 5px; color: red;"></span>
                    </a>
                    <div style="margin-top:30px;">
                      <span class="blue-color">$<?= $product['price']; ?></span>
                    </div>
                  </td>
              </tr>
            <?php endforeach; ?>

          </tbody>
      </table>

    <div class="row">
      <div class="col-md-12" style="background: #fff;">
        <h3 class="text-center pd-l-lg pd-r-lg black-text fs35 mgt-xs" style="padding-bottom: 5px; font-size: 25px !important;">SHIPPING METHODS</h3>
      </div>
    </div>

    <?php if ($cart['stores']): ?>
      <?php foreach ($cart['stores'] as $store): ?>
        <h2 class="cart_store_name"><?= $store['store_name']; ?></h2> 
        <!--<i><?= $store['store_name']; ?> - GST: <?= $store['gst']; ?> - SUBTOTAL: <?= $store['subtotal']; ?> - TOTAL: <?= $store['total']; ?></i>!-->
        <section class="green-block" style="background: #94db70; padding-top: 15px; padding-bottom: 15px;">
            <div class="container">
                <div class="row">
                      <div class="col-md-12">
                            <select class="custom-dropdown-grey chooseDelivery" data-url="<?php echo $this->Url->build(['controller' => 'cart', 'action' => 'choose_delivery']); ?>" data-store-id="<?= $store['store_id']; ?>">
                            <?php foreach ($store['delivery_methods'] as $k => $v): ?>
                              <option value="<?= $v['value']; ?>"><?= $v['name']; ?> <?php if ($k != 0) { ?>($<?= number_format((float)$v['value'], 2, '.', ''); ?>)</option>
                              <?php } ?>
                              <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
        </section>
      <?php endforeach; ?>
    <?php endif; ?>

    <br /><br /><?= $this->element('Cart/total') ?>

    <div class="container mgb-sm">
      <div class="product_search">
        <div class="mbr-buttons btn-inverse mbr-buttons--center">
            <a class="mbr-buttons__btn btn btn-lg btn-info" href="<?php echo $this->Url->build(['controller' => 'checkout', 'action' => 'index']); ?>" style="background: #68c835; border-color: #68c835; font-size: 25px;">Checkout</a> 
        </div>
      </div>
    </div>

    <?php else: ?>
      <p class="text-center fs21"><strong>There are no items in your cart!</strong></p>
    <?php endif; ?>

</body>