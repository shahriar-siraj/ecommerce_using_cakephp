<?php
use Cake\Utility\Inflector;
?>

<?php if($products): ?>
<div class="page-banner" style="padding:30px 0; background: #03738c;">
  <div class="container">
    <div class="row">
	    <div class="col-md-12 pb20">
	        <p class="text-center" style="color:#fff; text-transform: none; padding-top: 15px; padding-bottom: 15px; font-size: 35px;">Other "<?= $category->title; ?>" Products</p>
	      </div>
	  </div>
	  <div class="row">
      <?php foreach ($products as $product): ?>
      	<div class="col-md-3 text-center">
		    <?= $this->Html->link(
            $this->Html->image($product->image, ['alt' => $product->name, 'class' => 'img-thumbnail', 'style' => 'background-color: transparent;']),
            ['_name' => 'shop-products', 'id' => $product->id, 'slug' => $product->name],
            ['escape' => false]
        ) ?>
         <hr class="mt10 mbt10"></hr>
         <h4 class="txt-left"><?= $this->Html->link($product->name, ['_name' => 'shop-products', 'id' => $product->id, 'slug' => $product->name], ['style' => 'color:#fff;']) ?></h4>
         <hr class="mt10 mbt10"></hr>
      	</div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<?php endif; ?>