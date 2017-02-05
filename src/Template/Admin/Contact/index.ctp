
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
      <h1 class="page-title">Edit contact details</h1>
      <ol class="breadcrumb">
        <li>
        <?= $this->Html->link(('Dashboard'), ['controller' => 'admin',
            'action' => 'home', 'prefix' => 'admin'], ['escape' => false]) ?>
        </li>
        <li class="active">Update</li>
      </ol>
    </div>
    <div class="page-content container-fluid">
      <?= $this->Form->create($contact, [
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
                <label class="control-label" for="inputText">Address</label>
                <?= $this->Form->input('address', ['class' => 'form-control', 'label' => false]) ?>
              </div>
              <div class="form-group form-material">
                <label class="control-label" for="inputText">Address (More)</label>
                <?= $this->Form->input('address2', ['class' => 'form-control', 'label' => false]) ?>
              </div>
              <div class="form-group form-material">
                <label class="control-label" for="inputText">Phone</label>
                <?= $this->Form->input('phone', ['class' => 'form-control', 'label' => false]) ?>
              </div>
              <div class="form-group form-material">
                <label class="control-label" for="inputText">Email Address</label>
                <?= $this->Form->input('email', ['class' => 'form-control', 'label' => false]) ?>
              </div>
            </div>
          </div>
          <!-- End Panel Static Lables -->
        </div>
        <div class="col-sm-6">
          <!-- Panel Static Lables -->
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">Thank You Page</h3>
            </div>
            <div class="panel-body container-fluid">
              <div class="form-group form-material">
                <label class="control-label" for="inputText">Title 1</label>
                <?= $this->Form->input('thank_you_title', ['class' => 'form-control', 'label' => false]) ?>
              </div>
              <div class="form-group form-material">
                <label class="control-label" for="inputText">Title 2</label>
                <?= $this->Form->input('thank_you_title2', ['class' => 'form-control', 'label' => false]) ?>
              </div>
              <div class="form-group form-material">
                <label class="control-label" for="inputText">Text</label>
                <?= $this->Form->input('thank_you_text', ['class' => 'form-control', 'label' => false]) ?>
              </div>
            </div>
          </div>
          <!-- End Panel Static Lables -->
        </div>
      </div>
    <div class="row">
      <div class="pull-left">
        <div class="col-md-12">
          <?= $this->Form->button('Update Contact', ['class' => 'btn btn-block btn-success']) ?>
        </div>
      </div>
    </div>
    <?= $this->Form->end() ?>
    </div>
  </div>
  <!-- End Page -->