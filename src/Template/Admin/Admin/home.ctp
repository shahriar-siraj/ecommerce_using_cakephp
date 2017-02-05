
<?= $this->assign('title', 'Dashboard') ?>

<!-- Page -->
  <div class="page">
    <div class="page-header height-300 margin-bottom-30" style="background-image: url('http://imagine.emoceanlab.com.au/img/admin/dashboard2-header.jpg');">
      <div class="text-center blue-grey-800 margin-top-80">
        <div class="font-size-50 margin-bottom-30 blue-grey-800">Welcome <?= $this->request->session()->read('Auth.User.first_name') ?> <?= $this->request->session()->read('Auth.User.last_name') ?></div>
      </div>
    </div>
    <div class="page-content container-fluid">
      <h2 style="margin-bottom: 25px;">GOOGLE DATA</h2>
      <div class="row" data-plugin="matchHeight" data-by-row="true">
        <div class="col-xlg-4 col-md-4">
          <div class="row">

            <div class="col-xlg-12 col-md-12">
              <!-- Panel Today's Sales -->
              <div class="widget widget-shadow bg-red-600 white" style="background: #263238 !important;">
                <div class="widget-content padding-30">
                  <div class="counter counter-lg counter-inverse text-left">
                    <div class="counter-label margin-bottom-20">
                      <h2 style="color: #fff; font-size: 22px;">Pages Views</h2>
                    </div>
                    <div class="counter-number-group margin-bottom-10">
                      <span class="counter-number"><?= $this->Number->format($statistics->getTotalsForAllResults()['ga:pageviews'],
                    ['locale' => 'fr_FR']) ?></span>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Panel Today's Sales -->
            </div>
          </div>
        </div>
        <div class="col-xlg-4 col-md-4">
          <div class="row">

            <div class="col-xlg-12 col-md-12">
              <!-- Panel Today's Sales -->
              <div class="widget widget-shadow bg-red-600 white" style="background: #263238 !important;">
                <div class="widget-content padding-30">
                  <div class="counter counter-lg counter-inverse text-left">
                    <div class="counter-label margin-bottom-20">
                      <h2 style="color: #fff; font-size: 22px;">Pages/visit</h2>
                    </div>
                    <div class="counter-number-group margin-bottom-10">
                      <span class="counter-number"><?= $this->Number->format($statistics->getTotalsForAllResults()['ga:pageviewsPerVisit'],
                    ['locale' => 'fr_FR', 'precision' => 2]) ?></span>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Panel Today's Sales -->
            </div>
          </div>
        </div>
        <div class="col-xlg-4 col-md-4">
          <div class="row">
            <div class="col-xlg-12 col-md-12">
              <!-- Panel Overall Sales -->
              <div class="widget widget-shadow bg-blue-600 white" style="background: #263238 !important;">
                <div class="widget-content padding-30">
                  <div class="counter counter-lg counter-inverse text-left">
                    <div class="counter-label margin-bottom-20">
                      <h2 style="color: #fff; font-size: 22px;">Average length/Visit</h2>
                    </div>
                    <div class="counter-number-group margin-bottom-15">
                      <span class="counter-number"><?= gmdate("H:i:s", $statistics->getTotalsForAllResults()['ga:avgtimeOnSite']); ?></span>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Panel Overall Sales -->
            </div>
          </div>
        </div>
      </div>
      <div class="row" data-plugin="matchHeight" data-by-row="true">
        <div class="col-xlg-4 col-md-4">
          <div class="row">

            <div class="col-xlg-12 col-md-12">
              <!-- Panel Today's Sales -->
              <div class="widget widget-shadow bg-red-600 white" style="background: #263238 !important;">
                <div class="widget-content padding-30">
                  <div class="counter counter-lg counter-inverse text-left">
                    <div class="counter-label margin-bottom-20">
                      <h2 style="color: #fff; font-size: 22px;">Bounce Rate</h2>
                    </div>
                    <div class="counter-number-group margin-bottom-10">
                      <span class="counter-number"><?= $this->Number->format($statistics->getTotalsForAllResults()['ga:visitBounceRate'],
                    ['locale' => 'fr_FR', 'precision' => 2]) ?>%</span>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Panel Today's Sales -->
            </div>
          </div>
        </div>
        <div class="col-xlg-4 col-md-4">
          <div class="row">

            <div class="col-xlg-12 col-md-12">
              <!-- Panel Today's Sales -->
              <div class="widget widget-shadow bg-red-600 white" style="background: #263238 !important;">
                <div class="widget-content padding-30">
                  <div class="counter counter-lg counter-inverse text-left">
                    <div class="counter-label margin-bottom-20">
                      <h2 style="color: #fff; font-size: 22px;">Visits</h2>
                    </div>
                    <div class="counter-number-group margin-bottom-10">
                      <span class="counter-number"><?= $this->Number->format($statistics->getTotalsForAllResults()['ga:visits'],
                    ['locale' => 'fr_FR']) ?></span>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Panel Today's Sales -->
            </div>
          </div>
        </div>
        <div class="col-xlg-4 col-md-4">
          <div class="row">
            <div class="col-xlg-12 col-md-12">
              <!-- Panel Overall Sales -->
              <div class="widget widget-shadow bg-blue-600 white" style="background: #263238 !important;">
                <div class="widget-content padding-30">
                  <div class="counter counter-lg counter-inverse text-left">
                    <div class="counter-label margin-bottom-20">
                      <h2 style="color: #fff; font-size: 22px;">Unique Visitors</h2>
                    </div>
                    <div class="counter-number-group margin-bottom-15">
                      <span class="counter-number">
                    <?= $this->Number->format($statistics->getTotalsForAllResults()['ga:visitors'],
                    ['locale' => 'fr_FR']) ?></span>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Panel Overall Sales -->
            </div>
          </div>
        </div>
      </div>

      <h2 style="margin-bottom: 25px;">WEBSITE DATA</h2>

      <div class="row" data-plugin="matchHeight" data-by-row="true">
        
        <div class="col-xlg-3 col-md-4">
          <div class="row height-full">
            <div class="col-xlg-12 col-md-12" style="height:50%;">
              <!-- Panel Overall Sales -->
              <div class="widget widget-shadow bg-blue-600 white">
                <div class="widget-content padding-30">
                  <div class="counter counter-lg counter-inverse text-left">
                    <div class="counter-label margin-bottom-20">
                      <h2 style="color: #fff; font-size: 22px;">USERS</h2>
                    </div>
                    <div class="counter-number-group margin-bottom-15">
                      <span class="counter-number"><?= $usersCount; ?></span>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Panel Overall Sales -->
            </div>
          </div>
        </div>
        <div class="col-xlg-3 col-md-4">
          <div class="row height-full">
            <div class="col-xlg-12 col-md-12" style="height:50%;">
              <!-- Panel Overall Sales -->
              <div class="widget widget-shadow bg-blue-600 white">
                <div class="widget-content padding-30">
                  <div class="counter counter-lg counter-inverse text-left">
                    <div class="counter-label margin-bottom-20">
                      <h2 style="color: #fff; font-size: 22px;">PRODUCTS</h2>
                    </div>
                    <div class="counter-number-group margin-bottom-15">
                      <span class="counter-number"><?= $productsCount; ?></span>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Panel Overall Sales -->
            </div>
          </div>
        </div>
        <div class="col-xlg-3 col-md-4">
          <div class="row height-full">
            <div class="col-xlg-12 col-md-12" style="height:50%;">
              <!-- Panel Overall Sales -->
              <div class="widget widget-shadow bg-blue-600 white">
                <div class="widget-content padding-30">
                  <div class="counter counter-lg counter-inverse text-left">
                    <div class="counter-label margin-bottom-20">
                      <h2 style="color: #fff; font-size: 22px;">TRANSACTIONS</h2>
                    </div>
                    <div class="counter-number-group margin-bottom-15">
                      <span class="counter-number"><?= $transactionsCount; ?></span>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Panel Overall Sales -->
            </div>
          </div>
        </div>
        <div class="col-xlg-3 col-md-4">
          <div class="row height-full">
            <div class="col-xlg-12 col-md-12" style="height:50%;">
              <!-- Panel Overall Sales -->
              <div class="widget widget-shadow bg-blue-600 white">
                <div class="widget-content padding-30">
                  <div class="counter counter-lg counter-inverse text-left">
                    <div class="counter-label margin-bottom-20">
                      <h2 style="color: #fff; font-size: 22px;">NUMBER OF ORDERS</h2>
                    </div>
                    <div class="counter-number-group margin-bottom-15">
                      <span class="counter-number"><?= $ordersCount; ?></span>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Panel Overall Sales -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Page -->