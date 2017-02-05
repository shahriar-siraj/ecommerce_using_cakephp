    <div class="container">

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="col-md-6 col-sm-6 col-xs-6">
            Subtotal ($)
          </div>
          <div class="col-md-6 col-sm-6 col-xs-6">
            <span class="subtotal-line"><?php echo $cart['subtotal']; ?></span>
          </div>
        </div>
      </div>

      <?php if ($cart['stores']): ?>
        <?php foreach ($cart['stores'] as $store): ?>
          <?php if ((isset($store['delivery_method_name'])) && $store['delivery_method_price'] != '') { ?>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-6 col-sm-6 col-xs-6">
                  Delivery (<?php echo $store['delivery_method_name']; ?>)
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <strong><?php echo $store['delivery_method_price']; ?></strong><br />
                </div>
              </div>
            </div>
          <?php } ?>
        <?php endforeach; ?>
      <?php endif; ?>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="col-md-6 col-sm-6 col-xs-6">
            GST ($)
          </div>
          <div class="col-md-6 col-sm-6 col-xs-6">
            <span class="gst-line"><?php echo $cart['gst']; ?></span>
          </div>
        </div>
      </div>

      <div class="row mgb-sm">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="col-md-6 col-sm-6 col-xs-6">
            <strong>TOTAL ($)</strong>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-6">
            <span class="total-line"><?php echo $cart['total']; ?></span>
          </div>
        </div>
      </div>

    </div>