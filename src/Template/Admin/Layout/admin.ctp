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
          'vendor/select2/select2.css',
          'vendor/bootstrap-tokenfield/bootstrap-tokenfield.css',
          'vendor/bootstrap-tagsinput/bootstrap-tagsinput.css',
          'vendor/bootstrap-select/bootstrap-select.css',
          'vendor/icheck/icheck.css',
          'vendor/switchery/switchery.css',
          'vendor/asrange/asRange.css',
          'vendor/asspinner/asSpinner.css',
          'vendor/clockpicker/clockpicker.css',
          'vendor/ascolorpicker/asColorPicker.css',
          'vendor/bootstrap-touchspin/bootstrap-touchspin.css',
          'vendor/card/card.css',
          'vendor/jquery-labelauty/jquery-labelauty.css',
          'vendor/bootstrap-datepicker/bootstrap-datepicker.css',
          'vendor/bootstrap-maxlength/bootstrap-maxlength.css',
          'vendor/jt-timepicker/jquery-timepicker.css',
          'vendor/jquery-strength/jquery-strength.css',
          'vendor/multi-select/multi-select.css',
          'vendor/typeahead-js/typeahead.css',
          'examples/css/forms/advanced.css',
          'vendor/nestable/nestable.min.css?v2.1.0',
          'vendor/html5sortable/sortable.min.css?v2.1.0',
          'vendor/tasklist/tasklist.min.css?v2.1.0',
          'vendor/datatables-bootstrap/dataTables.bootstrap.css',
          'vendor/datatables-fixedheader/dataTables.fixedHeader.css',
          'vendor/datatables-responsive/dataTables.responsive.css',
          'examples/css/tables/datatable.css',
          'dropzone.css'
        ]) ?>

        <?= $this->Html->script([
          'vendor/modernizr/modernizr.js',
          'vendor/breakpoints/breakpoints.js'
        ]); ?>

        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js',
        <![endif]-->

        <script>
            Breakpoints();
        </script>

        <?= $this->fetch('css') ?>
        <?= $this->fetch('scriptTop') ?>

        <style>
        .page-header .breadcrumb {
          padding: 0;
          margin-top: 15px;
          background: #000;
          padding: 20px;
        }
        .page-header .breadcrumb a, a:focus, a:hover {
          color: #FFF;
        }
        .breadcrumb > .active {
          color: #99cc33;
        }
        .breadcrumb > li {
          display: inline-block;
          color: #fff;
        }
        .panel-title {
          display: block;
          padding: 20px 15px;
          font-size: 18px;
          color: #37474f;
        }
        .site-menubar-footer > a {
          display: block;
          float: left;
          width: 33.33333333%;
          height: 76px;
          padding: 1px 0;
          font-size: 16px;
          color: #76838f;
          text-align: center;
          background-color: #21292e;
          font-size: 50px;
        }
        .site-navbar {
          background-color: #000;
        }
        .form-horizontal .form-group {
          margin-right: 0px;
          margin-left: 0px;
        }
        .form-material .control-label {
          margin-bottom: 20px;
          color: #000;
        }
        .page-header-actions {
          position: absolute;
          top: 64%;
          right: 50px;
          color:#fff !important;
        }
        .page-header-actions a {
          color: #99cc33;
        }
        .special_message_info {
          margin-bottom: 23px;
          background: #337ab7;
          padding-top: 10px;
          padding-bottom: 10px;
          color: #fff;
          padding-left: 15px;
        }
        </style>

    </head>
    <body class="dashboard">
        
        <?= $this->element('Admin/header') ?>

        <?= $this->fetch('content') ?>

        <?= $this->element('Admin/footer') ?>

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
            'vendor/select2/select2.min.js',
            'vendor/bootstrap-tokenfield/bootstrap-tokenfield.min.js',
            'vendor/bootstrap-tagsinput/bootstrap-tagsinput.min.js',
            'vendor/bootstrap-select/bootstrap-select.js',
            'vendor/icheck/icheck.min.js',
            'vendor/switchery/switchery.min.js',
            'vendor/asrange/jquery-asRange.min.js',
            'vendor/asspinner/jquery-asSpinner.min.js',
            'vendor/clockpicker/bootstrap-clockpicker.min.js',
            'vendor/ascolor/jquery-asColor.min.js',
            'vendor/asgradient/jquery-asGradient.min.js',
            'vendor/ascolorpicker/jquery-asColorPicker.min.js',
            'vendor/bootstrap-maxlength/bootstrap-maxlength.min.js',
            'vendor/jquery-knob/jquery.knob.js',
            'vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js',
            'vendor/card/jquery.card.js',
            'vendor/jquery-labelauty/jquery-labelauty.js',
            'vendor/bootstrap-datepicker/bootstrap-datepicker.js',
            'vendor/jt-timepicker/jquery.timepicker.min.js',
            'vendor/datepair-js/datepair.min.js',
            'vendor/datepair-js/jquery.datepair.min.js',
            'vendor/jquery-strength/jquery-strength.min.js',
            'vendor/multi-select/jquery.multi-select.js',
            'vendor/typeahead-js/bloodhound.min.js',
            'vendor/typeahead-js/typeahead.jquery.min.js',
            'components/select2.js',
            'components/bootstrap-tokenfield.js',
            'components/bootstrap-tagsinput.js',
            'components/bootstrap-select.js',
            'components/icheck.js',
            'components/switchery.js',
            'components/asrange.js',
            'components/asspinner.js',
            'components/clockpicker.js',
            'components/ascolorpicker.js',
            'components/bootstrap-maxlength.js',
            'components/jquery-knob.js',
            'components/bootstrap-touchspin.js',
            'components/card.js',
            'components/jquery-labelauty.js',
            'components/bootstrap-datepicker.js',
            'components/jt-timepicker.js',
            'components/datepair-js.js',
            'components/jquery-strength.js',
            'components/multi-select.js',
            'components/jquery-placeholder.js',
            'forms/advanced.js',
            'vendor/html5sortable/html.sortable.min.js',
            'vendor/nestable/jquery.nestable.js',
            'components/html5sortable.min.js',
            'components/nestable.min.js',
            'components/tasklist.min.js',
            'vendor/datatables/jquery.dataTables.js',
            'vendor/datatables-fixedheader/dataTables.fixedHeader.js',
            'vendor/datatables-bootstrap/dataTables.bootstrap.js',
            'vendor/datatables-responsive/dataTables.responsive.js',
            'vendor/datatables-tabletools/dataTables.tableTools.js',
            'vendor/asrange/jquery-asRange.min.js',
            'vendor/bootbox/bootbox.js',
            'components/datatables.js',
            'dropzone.js'
        ]); ?>

        <script>
        (function(document, window, $) {
          'use strict';

          var Site = window.Site;
          $(document).ready(function() {
            Site.run();
          });
        })(document, window, jQuery);

          $(function() {

            console.log( "ready!" );

            $('#add_new_plugin_field').click(function() {

            //var first_name = $('#f_name_participant').val();
            //var last_name = $('#l_name_participant').val();
            //var role = $('#new_participant_role option:selected').text();
            //var email = $('#email_participant').val();

            $('#fields_list').append('<li class="list-group-item"><a href="#"><span class="badge badge-info">Edit</span></a> <i class="icon wb-user" aria-hidden="true"></i> ID</li>');

            });

          });
        </script>

        <?= $this->fetch('scriptBottom') ?>

        <script type="text/javascript">
          CKEDITOR.replace('articleBox2', {
            customConfig: 'config/article.js'
          });
        </script>

    </body>
</html>