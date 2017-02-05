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
        <?= $this->Html->meta('icon') ?>

        <?= $this->fetch('meta') ?>

        <!-- Styles -->
        <?= $this->Html->css([
          'http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic',
          'bootstrap.min.css',
          'bootstrap-extend.min.css',
          'site.min.css',
          'skins/blue.css',
          'vendor/animsition/animsition.css',
          'vendor/asscrollable/asScrollable.css',
          'vendor/switchery/switchery.css',
          'vendor/intro-js/introjs.css',
          'vendor/slidepanel/slidePanel.css',
          'vendor/flag-icon-css/flag-icon.css',
          'pages/login-v3.css',
          'fonts/web-icons/web-icons.min.css',
          'fonts/brand-icons/brand-icons.min.css',
          'vendor/modernizr/modernizr.js',
          'vendor/breakpoints/breakpoints.js'
        ]) ?>

        <?= $this->Html->script([
          'vendor/modernizr/modernizr.js',
          'vendor/breakpoints/breakpoints.js'
        ]); ?>

        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <script>
            Breakpoints();
        </script>

        <?= $this->fetch('css') ?>
        <?= $this->fetch('scriptTop') ?>

    </head>
    <body class="page-login-v3 layout-full">
        
        <!-- Page -->
        <div class="page animsition vertical-align text-center" data-animsition-in="fade-in"
        data-animsition-out="fade-out" style="background:#EEE !important;">
            <div class="page-content vertical-align-middle">
            <?= $this->fetch('content') ?>
            <?= $this->element('Admin/footer') ?>
            </div>
        </div>


        <?= $this->Html->script([
            'vendor/jquery/jquery.js',
            'vendor/bootstrap/bootstrap.js',
            'vendor/animsition/jquery.animsition.js',
            'vendor/asscroll/jquery-asScroll.js',
            'vendor/mousewheel/jquery.mousewheel.js',
            'vendor/asscrollable/jquery.asScrollable.all.js',
            'vendor/ashoverscroll/jquery-asHoverScroll.js',
            'vendor/switchery/switchery.min.js',
            'vendor/intro-js/intro.js',
            'vendor/screenfull/screenfull.js',
            'vendor/slidepanel/jquery-slidePanel.js',
            'vendor/jquery-placeholder/jquery.placeholder.js',
            'core.js',
            'site.js',
            'sections/menu.js',
            'sections/menubar.js',
            'sections/gridmenu.js',
            'sections/sidebar.js',
            'configs/config-colors.js',
            'configs/config-tour.js',
            'components/asscrollable.js',
            'components/animsition.js',
            'components/slidepanel.js',
            'components/switchery.js',
            'components/jquery-placeholder.js',
            'components/material.js',
            'components/multi-select',
            'components/jquery-placeholder',
            'forms/advanced.js'
        ]); ?>

        <script>
        (function(document, window, $) {
          'use strict';

          var Site = window.Site;
          $(document).ready(function() {
            Site.run();
          });
        })(document, window, jQuery);
        </script>

        <script>
$(document).ready( function ()
{
  /* we are assigning change event handler for select box */
  /* it will run when selectbox options are changed */
  $('.switchery').change(function()
  {
    alert('changed');
  });
});
</script>

        <?= $this->fetch('scriptBottom') ?>
    </body>
</html>
