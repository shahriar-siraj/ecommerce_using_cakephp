<?= $this->assign('title', 'Update a order') ?>
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
      <h1 class="page-title">Update an order</h1>
      <ol class="breadcrumb">
        <li>
        <?= $this->Html->link(('Dashboard'), ['controller' => 'admin',
            'action' => 'home', 'prefix' => 'admin'], ['escape' => false]) ?>
        </li>
        <li>
          <?= $this->Html->link(('Orders'), ['controller' => 'orders',
            'action' => 'index', 'prefix' => 'admin'], ['escape' => false]) ?>
        </li>
        <li class="active">Order #<?= $order->id; ?></li>
      </ol>
    </div>
    <div class="page-content container-fluid">
      <?= $this->Form->create($order, [
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
              <div class="row" style="margin-bottom: 20px;">
                <div class="col-md-6">
                  <div class="form-group form-material">
                    <label class="control-label" for="inputText">Order Status</label>
                    <select name="status" class="form-control">
                      <option value="0" <?php if ($order->status == 1) { echo 'selected="selected"'; } ?>>Pending</option>
                      <option value="1" <?php if ($order->status == 2) { echo 'selected="selected"'; } ?>>Completed</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group form-material">
                    <label class="control-label" for="inputText">Shop</label>
                    <select name="shop_id" class="form-control">
                      <option value="<?= $order->shop->id; ?>"><?= $order->shop->name; ?></option>
                    </select>
                  </div>
                </div>
              </div>
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
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group form-material">
                    <label class="control-label" for="inputText">Email</label>
                    <?= $this->Form->input('email', ['class' => 'form-control', 'label' => false]) ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group form-material">
                    <label class="control-label" for="inputText">Phone</label>
                    <?= $this->Form->input('phone', ['class' => 'form-control', 'label' => false]) ?>
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
              <h3 class="panel-title">Billing</h3>
            </div>
            <div class="panel-body container-fluid">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group form-material">
                    <label class="control-label" for="inputText">Address</label>
                    <?= $this->Form->input('billing_address', ['class' => 'form-control', 'label' => false]) ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group form-material">
                    <label class="control-label" for="inputText">Suburb</label>
                    <?= $this->Form->input('billing_suburb', ['class' => 'form-control', 'label' => false]) ?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group form-material">
                    <label class="control-label" for="inputText">State</label>
                    <?= $this->Form->input('billing_state', ['class' => 'form-control', 'label' => false]) ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group form-material">
                    <label class="control-label" for="inputText">Post Code</label>
                    <?= $this->Form->input('billing_post_code', ['class' => 'form-control', 'label' => false]) ?>
                  </div>
                </div>
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
            <h3 class="panel-title">Delivery</h3>
          </div>
          <div class="panel-body container-fluid">
            <div class="row">
            <div class="col-md-6">
              <div class="form-group form-material">
              <label class="control-label" for="inputText">Address</label>
              <?= $this->Form->input('delivery_address', ['class' => 'form-control', 'label' => false]) ?>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group form-material">
              <label class="control-label" for="inputText">Suburb</label>
              <?= $this->Form->input('delivery_suburb', ['class' => 'form-control', 'label' => false]) ?>
              </div>
            </div>
            </div>
            <div class="row">
            <div class="col-md-6">
              <div class="form-group form-material">
              <label class="control-label" for="inputText">State</label>
              <?= $this->Form->input('delivery_state', ['class' => 'form-control', 'label' => false]) ?>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group form-material">
              <label class="control-label" for="inputText">Post Code</label>
              <?= $this->Form->input('delivery_post_code', ['class' => 'form-control', 'label' => false]) ?>
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
            <h3 class="panel-title">Payment Summary</h3>
          </div>
          <div class="panel-body container-fluid">
            <div class="row">
            <div class="col-md-6">
              <div class="form-group form-material">
              <label class="control-label" for="inputText">Subtotal</label>
              <?= $this->Form->input('subtotal', ['class' => 'form-control', 'label' => false]) ?>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group form-material">
              <label class="control-label" for="inputText">Delivery Method Name</label>
              <?= $this->Form->input('delivery_method_name', ['class' => 'form-control', 'label' => false]) ?>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group form-material">
              <label class="control-label" for="inputText">Delivery Method Price</label>
              <?= $this->Form->input('delivery_method_price', ['class' => 'form-control', 'label' => false]) ?>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group form-material">
              <label class="control-label" for="inputText">GST</label>
              <?= $this->Form->input('gst', ['class' => 'form-control', 'label' => false]) ?>
              </div>
            </div>
            </div>
            <div class="row">
            <div class="col-md-6">
              <div class="form-group form-material">
              <label class="control-label" for="inputText">Total</label>
              <?= $this->Form->input('total', ['class' => 'form-control', 'label' => false]) ?>
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
          <?= $this->Form->button('Save Order', ['class' => 'btn btn-block btn-success']) ?>
        </div>
      </div>
    </div>
    <?= $this->Form->end() ?>
    </div>
  </div>
  <!-- End Page -->
