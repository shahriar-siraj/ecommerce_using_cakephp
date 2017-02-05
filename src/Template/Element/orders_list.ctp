<?php if($orders): ?>
	<table class="table table-striped">
		<tbody>
			<?php foreach($orders as $order): ?>
				<tr class='clickable-row orders-table' data-href="<?= $this->Url->build(['controller' => 'orders', 'action' => '/view/' . $order->id, 'prefix' => false]) ?>">
					<td align="center">
						<?= $this->Html->image('pending_order_icon.jpg', ['alt' =>'Pending Order', 'style' => 'width: 25px; margin-top: 35%;']) ?>
					</td>
					<td>
						<strong><?= h($order->created) ?></strong><br />
						<?php if ((isset($merchant)) && $merchant === TRUE) { ?>
							<strong style="text-transform: uppercase;"><?= $order->first_name; ?> <?= $order->last_name; ?></strong><br />
						<?php } else { ?>
							<strong style="text-transform: uppercase;"><?= $order->shop->name; ?></strong><br />
						<?php } ?>
						<strong>#<?= h($order->id) ?></strong>
					</td>
					<td>
						<span class="product_nbrs">(<?= $order->products_nbr; ?>)</span>
					</td>
					<td>
						<strong>$<?= h($order->total) ?></strong><br />
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php else: ?>
	<div class="infobox infobox-info">
		<h4 class="text-center mt-sm">No order found.</h4>
	</div>
<?php endif; ?>