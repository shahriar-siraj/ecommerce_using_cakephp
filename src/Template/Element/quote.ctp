
<?php use Cake\Routing\Router; ?>

<section class="doublediagonal no-pb backgroundGrey pt80 quote_section">
    <div class="container">
        <div style="margin-top: 50px !important; text-align:center;">
        	<h2 class="bold ml10p">Let's build something great together</h2>
            <div class="row">
            	<div class="col-md-4">
	            	<?= $this->Html->image('green-square.png', ['class' => 'img-responsive', 'alt' => 'Client']) ?>
	            </div>
	            <div class="col-md-6">
		            <p class="grey-text make-centered"><strong>Click the button below and let us know how we can help you today</strong></p>
		            <!--<a class="btn btn-primary mt-sm" href="#" style="height: 66px;">Request a quote</a>!-->
                     <a class="btn btn-info mt-sm btn-quote make-centered" href="<?php echo Router::url('/contact', true); ?>">Request a quote</a>
		         </div>
            </div>
        </div>
    </div>
</section>