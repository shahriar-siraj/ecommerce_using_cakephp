
<?= $this->assign('title', 'Add a Category') ?>

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
      <h1 class="page-title">New category</h1>
      <ol class="breadcrumb">
        <li>
        <?= $this->Html->link(('Dashboard'), ['controller' => 'admin',
            'action' => 'home', 'prefix' => 'admin'], ['escape' => false]) ?>
        </li>
        <li>
          <?= $this->Html->link(('Categories'), ['controller' => 'categories',
            'action' => 'index', 'prefix' => 'admin'], ['escape' => false]) ?>
        </li>
        <li class="active">New</li>
      </ol>
    </div>
    <div class="page-content container-fluid">
      <?= $this->Form->create($category, [
        'class' => 'form-horizontal',
        'role' => 'form'
      ]) ?>
      <div class="row">
        <div class="col-sm-12">
          <!-- Panel Static Lables -->
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">General</h3>
            </div>
            <div class="panel-body container-fluid">
              <div class="form-group form-material">
                <label class="control-label" for="inputText">Title</label>
                <?= $this->Form->input('title', ['class' => 'form-control', 'label' => false]) ?>
              </div>
            </div>
            <div class="panel-heading">
              <h3 class="panel-title">Description</h3>
            </div>
            <div class="panel-body container-fluid">
              <div class="form-group">
                <?= $this->Form->input(
                  'description', [
                    'label' => false,
                    'class' => 'form-control articleBox',
                    'id' => 'articleBox'
                  ]
                ) ?>
              </div>
            </div>
          </div>
          <!-- End Panel Static Lables -->
        </div>
      </div>
    <div class="row">
      <div class="pull-right">
        <div class="col-md-12">
          <?= $this->Form->button('Create Category', ['class' => 'btn btn-block btn-primary']) ?>
        </div>
      </div>
    </div>
    <?= $this->Form->end() ?>
    </div>
  </div>
  <!-- End Page -->