<?= $this->assign('title', 'Update a package') ?>
<?php use Cake\Routing\Router; ?>

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
      <h1 class="page-title">Update package</h1>
      <ol class="breadcrumb">
        <li>
        <?= $this->Html->link(('Dashboard'), ['controller' => 'admin',
            'action' => 'home', 'prefix' => 'admin'], ['escape' => false]) ?>
        </li>
        <li>
          <?= $this->Html->link(('Packages'), ['controller' => 'packages',
            'action' => 'index', 'prefix' => 'admin'], ['escape' => false]) ?>
        </li>
        <li class="active"><?= $package->name; ?></li>
      </ol>
    </div>
    <div class="page-content container-fluid">

      <?= $this->Form->create($package, [
        'class' => 'form-horizontal',
        'role' => 'form',
        'type' => 'file'
      ]) ?>

      <!--<div class="row">
        <div class="col-md-12">
          <div class="panel">
            <?php if ($package->id == 8) { ?>
              <p>test</p>
            <?php } ?>
          </div>
        </div>
      </div>!-->

      <div class="row">
        <div class="col-sm-6">
          <!-- Panel Static Lables -->
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">General</h3>
            </div>
            <div class="panel-body container-fluid">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group form-material">
                    <label class="control-label" for="inputText">Name</label>
                    <?= $this->Form->input('name', ['class' => 'form-control', 'label' => false]) ?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group form-material">
                    <label class="control-label" for="inputText">Price</label>
                    <?= $this->Form->input('price', ['class' => 'form-control', 'label' => false]) ?>
                  </div>
                </div>
            </div>
          </div>
          <!-- End Panel Static Lables -->
        </div>
      </div>
    <div class="col-sm-6">
      <!-- Panel Static Lables -->
      <div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title">General</h3>
        </div>
        <div class="panel-body container-fluid">
          <div class="row">
            <div class="col-md-12">
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
          <div class="row">
            <div class="pull-right">
              <div class="col-md-12">
                <?= $this->Form->button('Save Package', ['class' => 'btn btn-block btn-success']) ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?= $this->Form->end() ?>
    </div>
  </div>
  <!-- End Page -->
