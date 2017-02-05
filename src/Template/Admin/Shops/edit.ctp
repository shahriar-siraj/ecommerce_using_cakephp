<?= $this->assign('title', 'Update a shop') ?>
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
      <h1 class="page-title">Update shop</h1>
      <ol class="breadcrumb">
        <li>
        <?= $this->Html->link(('Dashboard'), ['controller' => 'admin',
            'action' => 'home', 'prefix' => 'admin'], ['escape' => false]) ?>
        </li>
        <li>
          <?= $this->Html->link(('Shops'), ['controller' => 'shops',
            'action' => 'index', 'prefix' => 'admin'], ['escape' => false]) ?>
        </li>
        <li class="active"><?= $shop->name; ?></li>
      </ol>
    </div>
    <div class="page-content container-fluid">

      <?= $this->Form->create($shop, [
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
                        <label class="control-label" for="inputText">Opening Time</label>
                        <?= $this->Form->select('opening_time', $options, ['class' => 'form-control', 'label' => false]); ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group form-material">
                        <label class="control-label" for="inputText">Closing Time</label>
                        <?= $this->Form->select('closing_time', $options, ['class' => 'form-control', 'label' => false]); ?>
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group form-material">
                    <label class="control-label" for="inputText">Address</label>
                    <?= $this->Form->input('address', ['class' => 'form-control', 'label' => false]) ?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group form-material">
                    <label class="control-label" for="inputText">Suburb</label>
                    <?= $this->Form->input('suburb', ['class' => 'form-control', 'label' => false]) ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group form-material">
                    <label class="control-label" for="inputText">Post Code</label>
                    <?= $this->Form->input('postcode', ['class' => 'form-control', 'label' => false]) ?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group form-material">
                    <label class="control-label" for="inputText">State</label>
                    <?= $this->Form->input('state', ['class' => 'form-control', 'label' => false]) ?>
                  </div>
                </div>
              </div>
              <div class="form-group form-material">
                <label class="control-label" for="inputPassword">Show/Hide</label>
                <select class="form-control" name="is_display">
                  <option value="1">Yes</option>
                  <option value="0">No</option>
                </option>
                </select>
              </div>
            </div>
          </div>
          <!-- End Panel Static Lables -->
        </div>

        <div class="col-sm-6">
          <div class="panel">
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
          <!-- End Panel Floating Lables -->
        </div>
      </div>
    <div class="row">
      <div class="pull-right">
      	<div class="col-md-12">
        	<?= $this->Form->button('Save Shop', ['class' => 'btn btn-block btn-success']) ?>
        </div>
      </div>
    </div>
    <?= $this->Form->end() ?>
    </div>
  </div>
  <!-- End Page -->
