<?= $this->assign('title', 'View Lead') ?>

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
      <h1 class="page-title">View Lead</h1>
      <ol class="breadcrumb">
        <li>
        <?= $this->Html->link(('Dashboard'), ['controller' => 'admin',
            'action' => 'home', 'prefix' => 'admin'], ['escape' => false]) ?>
        </li>
        <li class="active">View Lead</li>
      </ol>
    </div>
    <div class="page-content container-fluid">

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
              <h3 class="panel-title">General</h3>
            </div>
            <div class="panel-body container-fluid">
              <div class="form-group form-material">
                <label class="control-label" for="inputText">Name</label>
                <p><?= $lead->fname; ?></p>
              </div>
              <div class="form-group form-material">
                <label class="control-label" for="inputText">Email</label>
               <p><?= $lead->email; ?></p>
              </div>
              <div class="form-group form-material">
                <label class="control-label" for="inputText">IP Address</label>
                <p><?= $lead->ip; ?></p>
              </div>
              <br /><div class="form-group form-material">
              <label class="control-label" for="inputText">Contact via Form</label>
                <?php if($lead->via_form): ?>
                    <span class="label label-success">
                        YES
                    </span>
                <?php else: ?>
                    <span class="label label-danger">
                        NO
                    </span>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <!-- End Panel Static Lables -->
        </div>
        <div class="col-sm-6">
          <!-- Panel Static Lables -->
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">Message</h3>
            </div>
            <div class="panel-body container-fluid">
              <?= $lead->message; ?>
            </div>
          </div>
          <!-- End Panel Static Lables -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Page -->