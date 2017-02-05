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
      <h1 class="page-title">Settings</h1>
      <ol class="breadcrumb">
        <li>
        <?= $this->Html->link(('Dashboard'), ['controller' => 'admin',
            'action' => 'home', 'prefix' => 'admin'], ['escape' => false]) ?>
        </li>
        <li class="active">Settings</li>
      </ol>
    </div>
    <div class="page-content container-fluid">
      <?= $this->Form->create($settings, [
        'class' => 'form-horizontal',
        'role' => 'form',
        'type' => 'file'
      ]) ?>
      <div class="row">
        <div class="col-md-12">
            <?= $this->Flash->render() ?>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <!-- Panel Static Lables -->
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">Order Fees</h3>
              <p style="margin-left: 15px; margin-bottom: 15px;">If no fees, put 0 as value</p>
            </div>
            <div class="panel-body container-fluid">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group form-material">
                    <label class="control-label" for="inputText">Paypal Fees (Percentage/Fixed)</label>
                    <select name="paypal_fees_type" class="form-control">
                      <option value="fixed" <? if ($settings->paypal_fees_type == 'fixed') { echo 'selected="selected"'; } ?>>Fixed Rate</option>
                      <option value="percentage" <? if ($settings->paypal_fees_type == 'percentage') { echo 'selected="selected"'; } ?>>Percentage</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group form-material">
                    <label class="control-label" for="inputText">Value</label>
                    <?= $this->Form->input('paypal_fees_value', ['class' => 'form-control', 'label' => false]) ?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group form-material">
                    <label class="control-label" for="inputText">Ezypay Fees (Percentage/Fixed)</label>
                    <select name="ezypay_fees_type" class="form-control">
                      <option value="fixed" <? if ($settings->ezypay_fees_type == 'fixed') { echo 'selected="selected"'; } ?>>Fixed Rate</option>
                      <option value="percentage" <? if ($settings->ezypay_fees_type == 'percentage') { echo 'selected="selected"'; } ?>>Percentage</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group form-material">
                    <label class="control-label" for="inputText">Value</label>
                    <?= $this->Form->input('ezypay_fees_value', ['class' => 'form-control', 'label' => false]) ?>
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
              <h3 class="panel-title">SEO</h3>
            </div>
            <div class="panel-body container-fluid">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group form-material">
                    <label class="control-label" for="inputText">Meta Title Name</label>
                    <?= $this->Form->input('meta_title_name', ['class' => 'form-control', 'label' => false]) ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group form-material">
                    <label class="control-label" for="inputText">Meta Title Description</label>
                    <?= $this->Form->input('meta_title_description', ['class' => 'form-control', 'label' => false]) ?>
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
          <?= $this->Form->button('Save', ['class' => 'btn btn-block btn-success']) ?>
        </div>
      </div>
    </div>
    <?= $this->Form->end() ?>
    </div>
  </div>
  <!-- End Page -->
