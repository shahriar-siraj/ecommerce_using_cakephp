<?= $this->Html->docType('html5') ?>
<html lang="en">
    <head>
        <?= $this->Html->charset() ?>
        <?= $this->Html->meta(
            'viewport',
            'width=device-width, initial-scale=1.0, maximum-scale=1.0'
        ) ?>
        <title>
            <?= \Cake\Core\Configure::read('Site.name') . ' - ' . $this->fetch('title') ?>
        </title>
        
        <?= $this->fetch('meta') ?>

        <!-- Styles -->
        <?= $this->Html->css([
             'https://fonts.googleapis.com/css?family=Arimo',
             'https://fonts.googleapis.com/css?family=PT+Sans',
             'front/bootstrap/css/bootstrap.min.css',
             'front/mobirise/css/style.css',
             'front/mobirise-slider/style.css',
             'front/mobirise-gallery/style.css',
             'front/mobirise/css/mbr-additional.css',
             'helper.css',
             'front/in-a-bit.css',
             'jquery.typeahead.css',
             'bootstrap-datetimepicker.min.css',
             'price-table.css'
        ]) ?>

        <link rel="stylesheet" href="http://cdn.bootcss.com/animate.css/3.5.1/animate.min.css">
		
    		<!--[if IE 8]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js<![endif]-->
    		<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js<![endif]-->

        <?= $this->fetch('css') ?>
        <?= $this->fetch('scriptTop') ?>

    </head>

        <?= $this->element('header') ?>

        <?= $this->fetch('content') ?>

        <?= $this->Html->script([
          'front/minify-lib.js',
          'cart.js',
          'search.js',
          'general.js',
          'jquery.typeahead.js',
          'moment.js',
          'front/bootstrap-datetimepicker.js'
        ]); ?>

        <script type="text/javascript">
            $(function () {
                $('#datetimepicker8').datetimepicker({
                    icons: {
                        time: "fa fa-clock-o",
                        date: "fa fa-calendar",
                        up: "fa fa-arrow-up",
                        down: "fa fa-arrow-down"
                    }
                });
            });
        </script>

        <script type="text/javascript">

        (function( $ ) {
            
          //Function to animate slider captions 
          function doAnimations( elems ) {
            //Cache the animationend event in a variable
            var animEndEv = 'webkitAnimationEnd animationend';
            
            elems.each(function () {
              var $this = $(this),
                $animationType = $this.data('animation');
              $this.addClass($animationType).one(animEndEv, function () {
                $this.removeClass($animationType);
              });
            });
          }
          
          //Variables on page load 
          var $myCarousel = $('#carousel-example-generic'),
            $firstAnimatingElems = $myCarousel.find('.item:first').find("[data-animation ^= 'animated']");
            
          //Initialize carousel 
          $myCarousel.carousel();
          
          //Animate captions in first slide on page load 
          doAnimations($firstAnimatingElems);
          
          //Pause carousel  
          $myCarousel.carousel('pause');
          
          
          //Other slides to be animated on carousel slide event 
          $myCarousel.on('slide.bs.carousel', function (e) {
            var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
            doAnimations($animatingElems);
          });  
            $('#carousel-example-generic').carousel({
                interval:3000,
                pause: "false"
            });
            
          })(jQuery); 
        </script>

        <?= $this->fetch('scriptBottom') ?>
</html>