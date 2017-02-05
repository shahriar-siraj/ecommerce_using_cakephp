<?php use Cake\Routing\Router; ?>

<?php
  // Check class
  if (isset($class)) {
    $class = $class; 
  } else {
    $class = '';
  } 
  // Check content
  if (isset($content)) {
    $content = $content; 
  } else {
    $content = '';
  } 
?>

<section class="banner-top-everytrade <?= $class; ?>" style="background-image: url(<?php echo Router::url('/img/', true) . $img; ?>);">           
  <div class="container">
      <div class="col-md-12">
            <div class="top-mg">
              <?= $content; ?>
            </div>
      </div>              
  </div>
</section>