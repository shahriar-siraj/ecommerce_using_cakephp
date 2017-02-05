
<div class="content-wrap">
<?= $this->element('header', ['style' => '
    background-color: rgb(0, 0, 0);
    background-color: rgba(0, 0, 0, 0.6);
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);
    -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";']) ?>

<?= $this->element('top_banner', ['img' => 'service_banner.jpg', 'content' => '<h2 class="mt-sm no-txt-transform bold fs50 green-txt-color mb30 make-centered">EVERY TRADE <span class="white-txt-color">SERVICES</span></h2>']) ?>

<section class="doublediagonal no-pb">
    <div class="container">
        <div class="section-heading mt50">
            <h1 class="no-txt-transform bold no-mt fs25 mb30">Every Trade offers 6 essential services to give you the best valued project solution.</h1>
            <p class="no-txt-transform grey-text fs-md">As our name suggests ETBS offers many services across all trades. The backbone of our recent success is the long term 
			relationships we hold with our partners aligned with our team of motivated, experienced staff who will go above and 
			beyond in order to ensure the best possible result for our customers.</p>
 			<p class="no-txt-transform grey-text fs-md">It is through this that we offer the most practical solution in the areas below:</p>
        </div>
    </div>
</section>

<section class="doublediagonal pt35 pb120" id="all_services">
    <div class="container">
        <div class="section-heading col-md-12 col-sm-12 col-xs-12" style="margin-top: 0px !important; margin-bottom: 0px;">
          <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <a href="<?= $this->Url->build(['controller' => 'services', 'action' => 'facility_management', 'prefix' => false]) ?>">
                  <div class="hovereffect">
                        <?= $this->Html->image('services/facility_management_small.jpg', ['class' => 'img-responsive', 'alt' => 'Precision Builder']) ?>
                          <div class="overlay">
                      <?= $this->Html->image('small-logo.png', ['class' => 'img-responsive every-small-logo', 'alt' => 'Precision Builder']) ?>
                          </div>
                    </div>
                </a>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <a href="<?= $this->Url->build(['controller' => 'services', 'action' => 'remedial', 'prefix' => false]) ?>">
                  <div class="hovereffect">
                        <?= $this->Html->image('services/remedial_works_small.jpg', ['class' => 'img-responsive', 'alt' => 'Precision Builder']) ?>
                          <div class="overlay">
                      <?= $this->Html->image('small-logo.png', ['class' => 'img-responsive every-small-logo', 'alt' => 'Precision Builder']) ?>
                          </div>
                    </div>
                </a>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <a href="<?= $this->Url->build(['controller' => 'services', 'action' => 'construction', 'prefix' => false]) ?>">
                  <div class="hovereffect">
                        <?= $this->Html->image('services/construction_small.jpg', ['class' => 'img-responsive', 'alt' => 'Precision Builder']) ?>
                          <div class="overlay">
                      <?= $this->Html->image('small-logo.png', ['class' => 'img-responsive every-small-logo', 'alt' => 'Precision Builder']) ?>
                          </div>
                    </div>
                </a>
              </div>
            </div>
            <div class="row mt50">
	            <div class="col-md-4 col-sm-4 col-xs-12">
	                <a href="<?= $this->Url->build(['controller' => 'services', 'action' => 'civil_construction', 'prefix' => false]) ?>">
	                  <div class="hovereffect">
	                        <?= $this->Html->image('services/civil_construction_maintenance_small.jpg', ['class' => 'img-responsive', 'alt' => 'Precision Builder']) ?>
	                          <div class="overlay">
	                      <?= $this->Html->image('small-logo.png', ['class' => 'img-responsive every-small-logo', 'alt' => 'Precision Builder']) ?>
	                          </div>
	                    </div>
	                </a>
	              </div>
	              <div class="col-md-4 col-sm-4 col-xs-12">
	                <a href="<?= $this->Url->build(['controller' => 'services', 'action' => 'demolition', 'prefix' => false]) ?>">
	                  <div class="hovereffect">
	                        <?= $this->Html->image('services/demolition_small.jpg', ['class' => 'img-responsive', 'alt' => 'Precision Builder']) ?>
	                          <div class="overlay">
	                      <?= $this->Html->image('small-logo.png', ['class' => 'img-responsive every-small-logo', 'alt' => 'Precision Builder']) ?>
	                          </div>
	                    </div>
	                </a>
	              </div>
	              <div class="col-md-4 col-sm-4 col-xs-12">
	                <a href="<?= $this->Url->build(['controller' => 'services', 'action' => 'emergency', 'prefix' => false]) ?>">
	                  <div class="hovereffect">
	                        <?= $this->Html->image('services/emergency_small.jpg', ['class' => 'img-responsive', 'alt' => 'Precision Builder']) ?>
	                          <div class="overlay">
	                      <?= $this->Html->image('small-logo.png', ['class' => 'img-responsive every-small-logo', 'alt' => 'Precision Builder']) ?>
	                          </div>
	                    </div>
	                </a>
	              </div>
            </div>
          </div>
        </div>
</section>

<!--<section id="media" class="doublediagonal noPaddingBtn backgroundGrey" style="padding-top: 20px; padding-bottom: 20px;">
    <div class="section-heading mt-md">
        <div class="row mt-md" style="padding-left: 0px !important; padding-right: 0px !important; margin: 0px 0px 50px 0px !important;">
            <div class="col-md-12 sm-12">
	        	<div class="col-md-3">
	        		<a href="<?= $this->Url->build(['controller' => 'services', 'action' => 'view', 'prefix' => false]) ?>">
					<div class="hovereffect">
				        <?= $this->Html->image('services/building.jpg', ['class' => 'img-responsive', 'alt' => 'Precision Builder']) ?>
			            <div class="overlay">
							<?= $this->Html->image('small-logo.png', ['class' => 'img-responsive every-small-logo', 'alt' => 'Precision Builder']) ?>
			            </div>
				    </div>
				   </a>
	        	</div>
            	<div class="col-md-3">
	        		<a href="<?= $this->Url->build(['controller' => 'services', 'action' => 'view', 'prefix' => false]) ?>">
					<div class="hovereffect">
				        <?= $this->Html->image('services/building.jpg', ['class' => 'img-responsive', 'alt' => 'Precision Builder']) ?>
			            <div class="overlay">
							<?= $this->Html->image('small-logo.png', ['class' => 'img-responsive every-small-logo', 'alt' => 'Precision Builder']) ?>
			            </div>
				    </div>
				   </a>
	        	</div>
	        	<div class="col-md-3">
	        		<a href="<?= $this->Url->build(['controller' => 'services', 'action' => 'view', 'prefix' => false]) ?>">
					<div class="hovereffect">
				        <?= $this->Html->image('services/building.jpg', ['class' => 'img-responsive', 'alt' => 'Precision Builder']) ?>
			            <div class="overlay">
							<?= $this->Html->image('small-logo.png', ['class' => 'img-responsive every-small-logo', 'alt' => 'Precision Builder']) ?>
			            </div>
				    </div>
				   </a>
	        	</div>
	        	<div class="col-md-3">
	        		<a href="<?= $this->Url->build(['controller' => 'services', 'action' => 'view', 'prefix' => false]) ?>">
					<div class="hovereffect">
				        <?= $this->Html->image('services/building.jpg', ['class' => 'img-responsive', 'alt' => 'Precision Builder']) ?>
			            <div class="overlay">
							<?= $this->Html->image('small-logo.png', ['class' => 'img-responsive every-small-logo', 'alt' => 'Precision Builder']) ?>
			            </div>
				    </div>
				   </a>
	        	</div>
            </div>
    	</div>
    	<div class="row mt-md" style="padding-left: 0px !important; padding-right: 0px !important; margin: 0px 0px 0px 0px !important;">
            <div class="col-md-12 sm-12">
            	<div class="col-md-3">
	        		<a href="<?= $this->Url->build(['controller' => 'services', 'action' => 'view', 'prefix' => false]) ?>">
					<div class="hovereffect">
				        <?= $this->Html->image('services/building.jpg', ['class' => 'img-responsive', 'alt' => 'Precision Builder']) ?>
			            <div class="overlay">
							<?= $this->Html->image('small-logo.png', ['class' => 'img-responsive every-small-logo', 'alt' => 'Precision Builder']) ?>
			            </div>
				    </div>
				   </a>
	        	</div>
	        	<div class="col-md-3">
	        		<a href="<?= $this->Url->build(['controller' => 'services', 'action' => 'view', 'prefix' => false]) ?>">
					<div class="hovereffect">
				        <?= $this->Html->image('services/building.jpg', ['class' => 'img-responsive', 'alt' => 'Precision Builder']) ?>
			            <div class="overlay">
							<?= $this->Html->image('small-logo.png', ['class' => 'img-responsive every-small-logo', 'alt' => 'Precision Builder']) ?>
			            </div>
				    </div>
				   </a>
	        	</div>
	        	<div class="col-md-3">
	        		<a href="<?= $this->Url->build(['controller' => 'services', 'action' => 'view', 'prefix' => false]) ?>">
					<div class="hovereffect">
				        <?= $this->Html->image('services/building.jpg', ['class' => 'img-responsive', 'alt' => 'Precision Builder']) ?>
			            <div class="overlay">
							<?= $this->Html->image('small-logo.png', ['class' => 'img-responsive every-small-logo', 'alt' => 'Precision Builder']) ?>
			            </div>
				    </div>
				   </a>
	        	</div>
	        	<div class="col-md-3">
	        		<a href="<?= $this->Url->build(['controller' => 'services', 'action' => 'view', 'prefix' => false]) ?>">
					<div class="hovereffect">
				        <?= $this->Html->image('services/building.jpg', ['class' => 'img-responsive', 'alt' => 'Precision Builder']) ?>
			            <div class="overlay">
							<?= $this->Html->image('small-logo.png', ['class' => 'img-responsive every-small-logo', 'alt' => 'Precision Builder']) ?>
			            </div>
				    </div>
				   </a>
	        	</div>
            </div>
    	</div>
	</div>
</section>!-->

<?= $this->element('quote') ?>

<?= $this->element('footer') ?>