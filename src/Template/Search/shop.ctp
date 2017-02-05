

<?php $this->start('scriptBottom'); ?>

<script type="text/javascript">
   	jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.document.location = $(this).data("href");
    });
});
</script>

<?php $this->end() ?>

<body class="inabit_bg">

<div class="panel-body-header3 no-bg">
	<h2>
		Where would you like to purchase from ?
	</h2>

	<div class="absolute_order_filters">
		<div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0px;">
			<a href="#"> 
				<div class="col col-md-6 col-sm-6 col-xs-6 completed-filter btn-green-transparent">
					Sort By
				</div>
			</a>
			<a href="#"> 
				<div class="col col-md-6 col-sm-6 col-xs-6 completed-filter btn-green-transparent" style="border-left: 2px solid #000 !important;">
					Shop Name
				</div>
			</a>
		</div>
	</div>
</div>

<?php if($shops->toArray()): ?>
	<table class="table mgt-xs">
		<tbody>
			<?php foreach($shops as $shop): ?>
				<tr class='clickable-row' data-href="<?= $this->Url->build(['controller' => 'shop', 'action' => 'index', $shop->id, 'prefix' => false]) ?>">
					<td width="120px">
						<?= $this->Html->image($shop->hero, ['class' => 'img-responsive', 'style' => 'width: 120px; height: 70px; margin-top: 5px;']) ?>
					</td>
					<td>
						<p class="no-mg-b mgt-xs white-color"><strong><?= $shop->name ?></strong></p>
						<div class="rating">
                            <span class="glyphicon glyphicon-star stars-color"></span><span class="glyphicon glyphicon-star stars-color">
                            </span><span class="glyphicon glyphicon-star stars-color"></span><span class="glyphicon glyphicon-star stars-color">
                            </span><span class="glyphicon glyphicon-star-empty stars-color"></span>
                        </div>
                        <p class="grey-color">All <?= $shop->matched_products; ?></p>
					</td>
					<td>
						<p style="margin-top: 33px;" class="blue-color"><strong>$0.00 </strong></p>
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
			No shops were found for your search, please try again with a different word.<br /><br />
			<strong>Suggestions :</strong><br />
			- Check the spelling of your search words.<br />
			- Try more general keywords.
		</p>
	</div>
<?php endif; ?>
</body>