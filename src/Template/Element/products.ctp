<?php if($products->toArray()): ?>

<div class="row mbt40">
  <div class="col-md-12">
      <div class="pagination-centered">
          <ul class="pagination">
              <?php if ($this->Paginator->hasPrev()): ?>
                  <?= $this->Paginator->prev('«'); ?>
              <?php endif; ?>
              <?= $this->Paginator->numbers(['modulus' => 5]); ?>
              <?php if ($this->Paginator->hasNext()): ?>
                  <?= $this->Paginator->next('»'); ?>
              <?php endif; ?>
          </ul>
      </div>
  </div>
</div>

  <?php 
  $i = 0;
  foreach ($products as $product): 
    $i++;
  ?>
  <div class="col-md-4 image-service-box text-center products-list">
  <?= $this->Html->link(
      $this->Html->image($product->image, ['alt' => $product->name, 'class' => 'img-thumbnail', 'style' => 'background-color: transparent; min-height: 270px; max-height: 270px;']),
      ['_name' => 'shop-products', 'id' => $product->id, 'slug' => $product->name],
      ['escape' => false]
  ) ?>
   <hr class="mt10 mbt10"></hr>
   <h4 class="txt-left"><?= $this->Html->link($product->name, ['_name' => 'shop-products', 'id' => $product->id, 'slug' => $product->name]) ?></h4>
   </div>
  <?php
      $i++;
      if ($i % 6 == 0 or $i == 0) echo '</div><div class="row mbt40">';
  ?>
  <?php endforeach; ?>

</div>
<div class="row" style="margin-top: -35px;">
  <div class="col-md-12">
      <div class="pagination-centered">
          <ul class="pagination">
              <?php if ($this->Paginator->hasPrev()): ?>
                  <?= $this->Paginator->prev('«'); ?>
              <?php endif; ?>
              <?= $this->Paginator->numbers(['modulus' => 5]); ?>
              <?php if ($this->Paginator->hasNext()): ?>
                  <?= $this->Paginator->next('»'); ?>
              <?php endif; ?>
          </ul>
      </div>
  </div>
</div>

  <?php else: ?>
  <h4>Sorry, there are no products in this category.</h4>
<?php endif; ?>