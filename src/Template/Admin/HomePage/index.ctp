
<?= $this->assign('title', 'Add an Article') ?>

<?php $this->start('scriptBottom');

echo $this->Html->script('ckeditor/ckeditor') ?>
<script type="text/javascript">
  CKEDITOR.replace('articleBox', {
    customConfig: 'config/article.js'
  });
</script>

<?php $this->end() ?>

 <!-- Page -->
  <div class="page animsition">
    <div class="page-header">
      <h1 class="page-title">Edit Home Page details</h1>
      <ol class="breadcrumb">
        <li>
        <?= $this->Html->link(('Dashboard'), ['controller' => 'admin',
            'action' => 'home', 'prefix' => 'admin'], ['escape' => false]) ?>
        </li>
        <li class="active">Home Page</li>
      </ol>
    </div>
    <div class="page-content container-fluid">
      <?= $this->Form->create($home_page, [
        'class' => 'form-horizontal',
        'role' => 'form',
        'type' => 'file'
      ]) ?>
      <div class="row">
        <div class="col-sm-6">
          <!-- Panel Static Lables -->
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">Main Image</h3>
            </div>
            <div class="panel-body container-fluid">
              <div class="form-group form-material">
                <label class="control-label" for="inputText">Intro Text (Part 1)</label>
                <?= $this->Form->input('slideshow_intro', ['class' => 'form-control', 'label' => false]) ?>
              </div>
              <div class="form-group form-material">
                <label class="control-label" for="inputText">Intro Text (Part 2)</label>
                <?= $this->Form->input('slideshow_intro2', ['class' => 'form-control', 'label' => false]) ?>
              </div>
              <div class="form-group form-material">
                <label class="control-label" for="inputText">Button Text</label>
                <?= $this->Form->input('slideshow_button', ['class' => 'form-control', 'label' => false]) ?>
              </div>
            </div>
          </div>
          <!-- End Panel Static Lables -->
        </div>
        <div class="col-sm-6">
          <!-- Panel Static Lables -->
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">Intro</h3>
            </div>
            <div class="panel-body container-fluid">
              <div class="form-group form-material">
                <label class="control-label" for="inputText">Intro Text</label>
                <?= $this->Form->input('intro_text', ['class' => 'form-control', 'label' => false]) ?>
              </div>
              <div class="form-group form-material">
                <label class="control-label" for="inputText">Intro Title 2</label>
                <?= $this->Form->input('intro_title2', ['class' => 'form-control', 'label' => false]) ?>
              </div>
              <div class="form-group form-material">
                <label class="control-label" for="inputText">Services Button Text</label>
                <?= $this->Form->input('button_services', ['class' => 'form-control', 'label' => false]) ?>
              </div>
            </div>
          </div>
          <!-- End Panel Static Lables -->
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <!-- Panel Static Lables -->
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">3 Points</h3>
            </div>
            <div class="panel-body container-fluid">
              <div class="form-group form-material">
                <label class="control-label" for="inputText">Intro Title</label>
                <?= $this->Form->input('intro_title', ['class' => 'form-control', 'label' => false]) ?>
              </div>
              <div class="col-sm-4" style="padding: 0px;">
                <div class="form-group form-material">
                  <label class="control-label" for="inputText">Icon 1</label>
                  <?= $this->Form->input('icon1_text', ['class' => 'form-control', 'label' => false]) ?>
                </div>
              </div>
              <div class="col-sm-4" style="padding: 0px;">
                <div class="form-group form-material">
                  <label class="control-label" for="inputText">Icon 2</label>
                  <?= $this->Form->input('icon2_text', ['class' => 'form-control', 'label' => false]) ?>
                </div>
              </div>
              <div class="col-sm-4" style="padding: 0px;">
                <div class="form-group form-material">
                  <label class="control-label" for="inputText">Icon 3</label>
                  <?= $this->Form->input('icon3_text', ['class' => 'form-control', 'label' => false]) ?>
                </div>
              </div>
            </div>
          </div>
          <!-- End Panel Static Lables -->
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label class="control-label"><strong>Slideshow Image (1794 × 817 pixels)</strong></label>
            <div class="fileinput">
              <?php if (!empty($home_page->slideshow_image)) : ?>
                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px; margin-top: 10px;">
                  <?= $this->Html->image($home_page->slideshow_image) ?>
                </div>
              <?php endif; ?>
              <div>
                <span class="btn btn-default btn-file">
                  <?= $this->Form->input('slideshow_image_file', ['type' => 'file', 'label' => false, 'templates' => [
                    'inputContainer' => '{{content}}</span>',
                    'inputContainerError' => '{{content}}</span>{{error}}'
                  ]]) ?>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    <div class="row">
      <div class="pull-right">
        <div class="col-md-12">
          <?= $this->Form->button('Update', ['class' => 'btn btn-block btn-success']) ?>
        </div>
      </div>
    </div>
    <?= $this->Form->end() ?>
    </div>
  </div>
  <!-- End Page -->