
<body>

    <div class="container">

      <section class="product_breadcrumb" style="background:#fff !important; margin-top: 90px;">
        <div class="row">
            <p class="grey-color fs21 text-center" style="margin-bottom: 0px !important;" class="grey-color"><a href="<?= $this->Url->build(['controller' => 'cart', 'action' => 'index', 'prefix' => false]) ?>" class="grey-color">Cart</a> > <a href="<?= $this->Url->build(['controller' => 'checkout', 'action' => 'index', 'prefix' => false]) ?>" class="grey-color">Billing & Shipping</a> > <span class="black-color">Pay Method</span> > Preview Order</p>
        </div>
      </section>

      <div class="row">
        <div class="col-md-12" style="background: #fff;">
          <h3 class="text-center pd-l-lg pd-r-lg black-text mgt-xsm" style="padding-bottom: 5px;">PAYMENT METHOD</h3>
        </div>
      </div>

    </div>

    <div class="container" style="background: #f7f7f7; height: 140px;">
        <div class="row">
            <div class="col-md-12">
                <h3 class="fs21 black-color text-center">We accept...</h3>
                <?= $this->Html->image('bank_cards.png', ['class' => 'img-responsive text-center']) ?> 
            </div>
        </div>
    </div>

    <section class="green-block mgt-xsm" style="background: #94db70; padding-top: 15px; padding-bottom: 15px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                        <select class="custom-dropdown-grey" id="pay_method">
                            <option value="">Choose your pay method...</option>
                            <option value="paypal">Paypal</option>
                        </select>
                    </div>
                </div>
            </div>
    </section>

    <div class="mgt-xsm"><?= $this->element('Cart/total') ?></div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                 <a class="mbr-buttons__btn btn btn-lg btn-info btn-green-transparent" href="<?= $this->Url->build(['controller' => 'cart', 'action' => 'pay_order', 'prefix' => false]) ?>" id="next_link_payment">Next</a>
            </div>
        </div>
    </div>
</body>