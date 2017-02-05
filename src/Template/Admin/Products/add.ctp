<?= $this->assign('title', 'Add a product') ?>
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
      <h1 class="page-title">Add a product</h1>
      <ol class="breadcrumb">
        <li>
        <?= $this->Html->link(('Dashboard'), ['controller' => 'admin',
            'action' => 'home', 'prefix' => 'admin'], ['escape' => false]) ?>
        </li>
        <li>
          <?= $this->Html->link(('Products'), ['controller' => 'products',
            'action' => 'index', 'prefix' => 'admin'], ['escape' => false]) ?>
        </li>
        <li class="active">New Product</li>
      </ol>
    </div>
    <div class="page-content container-fluid">
      <?= $this->Form->create($product, [
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
                <div class="col-md-6">
                  <div class="form-group form-material">
                    <label class="control-label" for="inputText">Price</label>
                    <?= $this->Form->input('price', ['class' => 'form-control', 'label' => false]) ?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class='col-md-6'>
                  <div class="form-group form-material">
                    <label class="control-label" for="inputPassword">Show/Hide</label>
                    <select class="form-control" name="is_display">
                      <option value="1">Yes</option>
                      <option value="0">No</option>
                    </option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group form-material">
                    <label class="control-label" for="inputText">Merchant</label>
                    <?= $this->Form->input('user_id', ['options' => $merchants, 'class' => 'form-control', 'label' => false]) ?>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="control-label"><strong>Hero File</strong></label>
                  <div class="fileinput">
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
          </div>
          <!-- End Panel Static Lables -->
        </div>

        <div class="col-sm-6">
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">Content</h3>
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

              <div class="panel-heading">
                <h3 class="panel-title" style="padding-left: 0px;">Other</h3>
              </div>

              <div class="form-group form-material">
                <label class="control-label" for="inputText">Weight</label>
                <?= $this->Form->input('stock_code', ['class' => 'form-control', 'label' => false]) ?>
              </div>

              <div class="form-group form-material">
                <label class="control-label" for="inputText">Stock Code</label>
                <?= $this->Form->input('stock_code', ['class' => 'form-control', 'label' => false]) ?>
              </div>

              <div class="form-group form-material">
                <label class="control-label" for="inputText">Quantities</label>
                <?= $this->Form->input('stock', ['class' => 'form-control', 'label' => false]) ?>
              </div>

            </div>
          </div>
          <!-- End Panel Floating Lables -->
        </div>
      </div>
    <div class="row">
      <div class="pull-right">
        <div class="col-md-12">
          <?= $this->Form->button('Save Product', ['class' => 'btn btn-block btn-success']) ?>
        </div>
      </div>
    </div>
    <?= $this->Form->end() ?>
    </div>
  </div>
  <!-- End Page -->
