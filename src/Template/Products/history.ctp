

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
	<h2 style="margin-top: 0px !important; margin-bottom: 0px !important;">
		Order History for... <br />
		"<?= $product['name']; ?>"
	</h2>
</div>

<?php if($orders->toArray()): ?>
	<table class="table mgt-xs">
		<tbody>
			<?php foreach($orders as $order): ?>
				<tr>
					<td width="160px">
						<p class="blue-color" style="margin-top: 8px;"><strong>Order Date</strong></p>
                        <p class="blue-color"><strong>Order Price</strong></p>
					</td>
					<td>
						<p class="blue-color" style="margin-top: 8px;"><strong><?= $order->created->format('d-m-Y'); ?></strong></p>
                        <p class="blue-color"><strong>$<?= number_format((float)$order->price, 2, '.', ''); ?></strong></p>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

	<div class="pagination-centered">
		<ul class="pagination">
			<?php if ($this->Paginator->hasPrev()): ?>
				<?= $this->Paginator->prev('«') ?>
			<?php endif; ?>
			<?= $this->Paginator->numbers(['modulus' => 5]) ?>
			<?php if ($this->Paginator->hasNext()): ?>
				<?= $this->Paginator->next('»') ?>
			<?php endif; ?>
		</ul>
	</div>
<?php else: ?>
	<div class="infobox infobox-info mgt-sm">
		<h4 class="text-center">No results found</h4>
		<p class="text-center">
			Sorry but this product hasn't been ordered yet.
		</p>
	</div>
<?php endif; ?>