
<?php use Cake\Routing\Router; ?>

<?php $this->start('scriptBottom'); ?>

<?php $this->end() ?>

<body class="product-view">

    <section class="product_breadcrumb" style="padding-top: 17px; padding-bottom: 17px;">
      <a href="<?= $this->Url->build(['controller' => 'search', 'action' => 'quick', 'prefix' => false]) ?>">
        <h3 class="text-center pd-l-lg pd-r-lg white-text" style="margin-top: 0px; margin-bottom: 0px;"><span class="glyphicon glyphicon-chevron-left pull-left" style="top: 5px;"></span> <?= $product->name ; ?></h3>
      </a>
    </section>

    <section class="content-2 simple col-1 col-undefined mbr-after-navbar mgb-xsm" id="content5-77">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <?= $this->Html->image($product->hero, ['class' => 'img-responsive', 'style' => 'margin: 0px auto;']) ?>
          </div>
        </div>
        <div class="row product-general">
          <div class="col-md-12">
            <p class="text-left black-color"><strong><?= $product->name; ?></strong><br /><span class="grey-color">Product Code: <?= $product->product_code; ?></span></p>
            <p class="text-left blue-color"><strong>$<?= number_format((float)$product->price, 2, '.', ''); ?></strong></p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 content-product">
            <p class="black-color"><?= $product->content; ?></p>
          </div>
        </div>
        <div class="row addToCartContainer mgt-sm">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="col-md-3 col-sm-3 col-xs-3" style="padding-left:0px; padding-right: 0px;">
              <input type="text" class="form-control add-cart-field" value="1">
            </div>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <button class="mbr-buttons__btn btn btn-lg btn-info btn-green-transparent addToCart" data-url="<?php echo $this->Url->build(['controller' => 'cart', 'action' => 'add_cart',$product->id]); ?>">Add To List</button>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
           <a class="mbr-buttons__btn btn btn-lg btn-info btn-green-simple" href="<?php echo $this->Url->build(['controller' => 'products', 'action' => 'history',$product->id]); ?>">Product History</a>
          </div>
        </div>
      </div>
    </section>

</body>