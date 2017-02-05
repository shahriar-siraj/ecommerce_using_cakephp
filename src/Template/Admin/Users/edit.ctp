<?= $this->assign('title', 'Add a user') ?>
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
      <h1 class="page-title">Edit a user</h1>
      <ol class="breadcrumb">
        <li>
        <?= $this->Html->link(('Dashboard'), ['controller' => 'admin',
            'action' => 'home', 'prefix' => 'admin'], ['escape' => false]) ?>
        </li>
        <li>
          <?= $this->Html->link(('Users'), ['controller' => 'users',
            'action' => 'index', 'prefix' => 'admin'], ['escape' => false]) ?>
        </li>
        <li class="active">Edit User</li>
      </ol>
    </div>
    <div class="page-content container-fluid">
      <?= $this->Form->create($user, [
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
                    <label class="control-label" for="inputText">First Name</label>
                    <?= $this->Form->input('first_name', ['class' => 'form-control', 'label' => false]) ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group form-material">
                    <label class="control-label" for="inputText">Last Name</label>
                    <?= $this->Form->input('last_name', ['class' => 'form-control', 'label' => false]) ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group form-material">
                    <label class="control-label" for="inputText">Email</label>
                    <?= $this->Form->input('email', ['class' => 'form-control', 'label' => false]) ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group form-material">
                    <label class="control-label" for="inputText">Company Name</label>
                    <?= $this->Form->input('company_name', ['class' => 'form-control', 'label' => false]) ?>
                  </div>
                </div>
                <!--<div class="col-md-6">
                  <div class="form-group form-material">
                    <label class="control-label" for="inputText">Password</label>
                    <?= $this->Form->input('password', ['class' => 'form-control', 'label' => false]) ?>
                  </div>
                </div>!-->
                <div class="col-md-6">
                  <div class="form-group form-material">
                    <label class="control-label" for="inputText">Role</label>
                     <?= $this->Form->input('group_id', ['options' => $groups, 'class' => 'form-control', 'label' => false]) ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Panel Static Lables -->
        </div>
        <div class="col-sm-6">
          <!-- Panel Static Lables -->
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">Billing Address</h3>
            </div>
            <div class="panel-body container-fluid">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group form-material">
                    <label class="control-label" for="inputText">Billing Address</label>
                    <?= $this->Form->input('billing_address', ['class' => 'form-control', 'label' => false]) ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group form-material">
                    <label class="control-label" for="inputText">Billing Suburb</label>
                    <?= $this->Form->input('billing_suburb', ['class' => 'form-control', 'label' => false]) ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group form-material">
                    <label class="control-label" for="inputText">Billing State</label>
                    <?= $this->Form->select('billing_state', $options_states, ['class' => 'form-control', 'label' => false]); ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group form-material">
                    <label class="control-label" for="inputText">Billing Post Code</label>
                    <?= $this->Form->input('billing_post_code', ['class' => 'form-control', 'label' => false]) ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Panel Static Lables -->
        </div>
        <div class="col-sm-6">
          <!-- Panel Static Lables -->
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">Delivery Address</h3>
            </div>
            <div class="panel-body container-fluid">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group form-material">
                    <label class="control-label" for="inputText">Delivery Address</label>
                    <?= $this->Form->input('delivery_address', ['class' => 'form-control', 'label' => false]) ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group form-material">
                    <label class="control-label" for="inputText">Delivery Suburb</label>
                    <?= $this->Form->input('delivery_suburb', ['class' => 'form-control', 'label' => false]) ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group form-material">
                    <label class="control-label" for="inputText">Delivery State</label>
                    <?= $this->Form->select('delivery_state', $options_states, ['class' => 'form-control', 'label' => false]); ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group form-material">
                    <label class="control-label" for="inputText">Delivery Post Code</label>
                    <?= $this->Form->input('delivery_post_code', ['class' => 'form-control', 'label' => false]) ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Panel Static Lables -->
        </div>
      </div>
    <div class="row">
      <div class="pull-right">
        <div class="col-md-12">
          <?= $this->Form->button('Save User', ['class' => 'btn btn-block btn-success']) ?>
        </div>
      </div>
    </div>
    <?= $this->Form->end() ?>
    </div>
  </div>
  <!-- End Page -->
