

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
	<h2>
		Your search results for... <br />
		"<?= $keyword; ?>"
	</h2>

	<div class="absolute_order_filters">
		<div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0px;">
			<a href="#"> 
				<div class="col col-md-6 col-sm-6 col-xs-6 completed-filter btn-green-transparent">
					Sort By
				</div>
			</a>
			<a href="#"> 
				<div class="col col-md-6 col-sm-6 col-xs-6 completed-filter btn-green-transparent">
					Release Date
				</div>
			</a>
		</div>
	</div>
</div>

<?php if($products->toArray()): ?>
	<table class="table mgt-xs">
		<tbody>
			<?php foreach($products as $product): ?>
				<tr class='clickable-row' data-href="<?= $this->Url->build(['controller' => 'products', 'action' => '/' . $product->slug . '.' . $product->id, 'prefix' => false]) ?>">
					<td width="120px">
						<?= $this->Html->image($product->hero, ['class' => 'img-responsive', 'style' => 'width: 120px; height: 70px; margin-top: 5px;']) ?>
					</td>
					<td>
						<p class="no-mg-b mgt-xs"><strong><?=
                        $this->Text->truncate(
                            $product->name,
                            30,
                            [
                                'ellipsis' => '...',
                                'exact' => false
                            ]
                        ) ?></strong></p>
						<div class="content-product-list"><span class="grey-color"><?=
                        $this->Text->truncate(
                            $product->content,
                            30,
                            [
                                'ellipsis' => '...',
                                'exact' => false
                            ]
                        ) ?></span></div>
                        <p class="blue-color"><strong>$<?= number_format((float)$product->price, 2, '.', ''); ?></strong></p>
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
			No products were found for your search, please try again with a different word.<br /><br />
			<strong>Suggestions :</strong><br />
			- Check the spelling of your search words.<br />
			- Try more general keywords.
		</p>
	</div>
<?php endif; ?>