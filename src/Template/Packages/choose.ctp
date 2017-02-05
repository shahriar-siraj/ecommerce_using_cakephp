
<?php use Cake\Routing\Router; ?>

<?php $this->start('scriptBottom'); ?>

<?php $this->end() ?>

<body class="product-view">

    <div class="container">

      <section class="product_breadcrumb" style="background:#fff !important; margin-top: 90px;">
        <div class="row">
            <p class="grey-color fs21 text-center" style="margin-bottom: 0px !important;"><span class="black-color">Packages List</span> > Pachage Informations > <span class="black-color">Payment</span></p>
        </div>
      </section>

      <div class="row">
        <div class="col-md-12" style="background: #fff;">
          <h3 class="text-center pd-l-lg pd-r-lg black-text fs35 mgt-xs" style="padding-bottom: 5px;"><?= $package['name']; ?> Package</h3>
        </div>
      </div>


      <div class="row">
        <div class="col-md-12" style="background: #fff;">
          <p class="text-center pd-l-lg pd-r-lg black-text fs35 mgt-xs" style="padding-bottom: 5px;"><?= $package['description']; ?></p>
        </div>
      </div>

    </div>



</body>