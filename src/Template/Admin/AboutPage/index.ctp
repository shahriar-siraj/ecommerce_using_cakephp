
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
      <h1 class="page-title">Edit About Us Page</h1>
      <ol class="breadcrumb">
        <li>
        <?= $this->Html->link(('Dashboard'), ['controller' => 'admin',
            'action' => 'home', 'prefix' => 'admin'], ['escape' => false]) ?>
        </li>
        <li class="active">About US</li>
      </ol>
    </div>
    <div class="page-content container-fluid">
      <?= $this->Form->create($about_page, [
        'class' => 'form-horizontal',
        'role' => 'form',
        'type' => 'file'
      ]) ?>
      <div class="row">
        <div class="col-sm-6">
          <!-- Panel Static Lables -->
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">General</h3>
            </div>
            <div class="panel-body container-fluid">
              <div class="form-group form-material">
                <label class="control-label" for="inputText">Intro Title</label>
                <?= $this->Form->input('intro_title', ['class' => 'form-control', 'label' => false]) ?>
              </div>
              <div class="form-group form-material">
                <label class="control-label" for="inputText">Intro Text</label>
                <?= $this->Form->input('intro_text', ['class' => 'form-control', 'label' => false]) ?>
              </div>
            </div>
          </div>
          <!-- End Panel Static Lables -->
        </div>

        <div class="col-sm-6">
          <div class="form-group">
            <label class="control-label"><strong>Hero Image</strong></label>
            <div class="fileinput">
              <?php if (!empty($about_page->hero)) : ?>
                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px; margin-top: 10px;">
                  <?= $this->Html->image($about_page->hero) ?>
                </div>
              <?php endif; ?>
              <div>
                <span class="btn btn-default btn-file">
                  <?= $this->Form->input('hero_file', ['type' => 'file', 'label' => false, 'templates' => [
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
        <div class="col-sm-6">
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">Content Left</h3>
            </div>
            <div class="panel-body container-fluid">
              <div class="form-group">
                <?= $this->Form->input(
                  'content', [
                    'label' => false,
                    'class' => 'form-control articleBox',
                    'id' => 'articleBox'
                  ]
                ) ?>
              </div>
            </div>
          </div>
          <!-- End Panel Floating Lables -->
        </div>

        <div class="col-sm-6">
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">Content Right</h3>
            </div>
            <div class="panel-body container-fluid">
              <div class="form-group">
                <?= $this->Form->input(
                  'content2', [
                    'label' => false,
                    'class' => 'form-control articleBox2',
                    'id' => 'articleBox2'
                  ]
                ) ?>
              </div>
            </div>
          </div>
          <!-- End Panel Floating Lables -->
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