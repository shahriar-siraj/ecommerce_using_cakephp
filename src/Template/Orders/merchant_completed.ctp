<?php $this->start('scriptBottom'); ?>

<script type="text/javascript">
   	jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.document.location = $(this).data("href");
    });
});
</script>

<?php $this->end() ?>

<div class="panel-body-header2">
	<h2>
		MY ORDERS
	</h2>

	<div class="absolute_order_filters">
		<div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0px;">
			<a href="<?= $this->Url->build(['controller' => 'orders', 'action' => 'merchant', 'prefix' => false]) ?>"> 
				<div class="col col-md-6 col-sm-6 col-xs-6 completed-filter">
					New
				</div>
			</a>
			<a href="<?= $this->Url->build(['controller' => 'orders', 'action' => 'merchant_completed', 'prefix' => false]) ?>"> 
				<div class="col col-md-6 col-sm-6 col-xs-6">
					Completed
				</div>
			</a>
		</div>
	</div>
</div>

<?= $this->element('orders_list', ['merchant' => true]) ?>