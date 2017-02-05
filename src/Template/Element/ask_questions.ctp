<?php
if (isset($background)) 
  $background = $background;
else
  $background = "#000";
?>

<div class="page-banner" style="padding:30px 0; background: <?= $background; ?>;">
  <div class="container">
    <div class="row">
      <div class="col-md-8 pt30 pb20">
        <p class="no-text-transform txt-white pt15 pb15 ask_questions">Ask us some questions today...</p>
      </div>
      <div class="col-md-4 pt30 pb20">
       <a href="<?= $this->Url->build(['controller' => 'contact', 'action' => 'index', 'prefix' => false]) ?>" class="btn-system btn-large border-btn"><i class="icon-heart-4"></i> Read More</a>
      </div>
    </div>
  </div>
</div>