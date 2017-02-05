

<?php $this->start('scriptBottom'); ?>

<script type="text/javascript">
   	jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.document.location = $(this).data("href");
    });
});
</script>

<?php $this->end() ?>

<div class="panel-body-header3">

	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<div class="shop_title">
					<h2 style="text-transform: uppercase;">
						<?= $shop->name; ?>
					</h2>
					<div class="rating shop-view-rating">
			            <span class="glyphicon glyphicon-star stars-color"></span><span class="glyphicon glyphicon-star stars-color">
			            </span><span class="glyphicon glyphicon-star stars-color"></span><span class="glyphicon glyphicon-star stars-color">
			            </span><span class="glyphicon glyphicon-star-empty stars-color"></span>
			        </div>
				</div>
			</div>
		</div>

		<div class="row mgt-sm">
			<div class="col-md-12">
				<div class="shop_info">
					<p class="text-center white-color"><span class="grey-color">Location</span> <br /> <strong><?= $shop->suburb; ?> <?= $shop->state; ?>, <?= $shop->postcode; ?></strong></p>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="shop_info">
					<p class="text-center white-color"><span class="grey-color">Open Hours</span> <br />  <strong><?= $shop->opening_time; ?> to <?= $shop->closing_time; ?></strong></p>
				</div>
			</div>
		</div>

	</div>

</div>

<div class="container">

	<div class="row mgb-sm mgt-xsm">
	    <div class="col-md-12">
	        <h2 class="text-center blue-color" style="text-transform: uppercase;"> ABOUT <?= $shop->name; ?> </p>
	    </div>
	</div>

	<div class="row mgb-sm">
	    <div class="col-md-12">
	        <p class="text-center"> <?= $shop->description; ?> </p>
	    </div>
	</div>

</div>

<div class="container mgb-xsm">

	<div class="row">
		<div class="col-md-12">
			<a href="<?= $this->Url->build(['controller' => 'shop', 'action' => 'products', $shop->id]) ?>" class="mbr-buttons__btn btn btn-lg btn-info btn-blue-simple">View Products</a>
		</div>
	</div>

	<?php if ($user_id == $shop->user_id) { ?>
		<div class="row">
			<div class="col-md-12">
				<a href="<?= $this->Url->build(['controller' => 'shop', 'action' => 'add_product']) ?>" class="mbr-buttons__btn btn btn-lg btn-info btn-blue-simple">Add Products</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<a href="<?= $this->Url->build(['controller' => 'shop', 'action' => 'edit']) ?>" class="mbr-buttons__btn btn btn-lg btn-info btn-blue-simple">Edit Shop</a>
			</div>
		</div>
	<?php } ?>

</div>