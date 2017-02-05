


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
      <h1 class="page-title">Edit Password</h1>
      <ol class="breadcrumb">
        <li>
        <?= $this->Html->link(('Dashboard'), ['controller' => 'admin',
            'action' => 'home', 'prefix' => 'admin'], ['escape' => false]) ?>
        </li>
        <li class="active">Edit Password</li>
      </ol>
    </div>
    <div class="page-content container-fluid">
		<?= $this->Form->create($user, ['class' => 'section']); ?>
		<?= $this->Form->input('method', ['type' => 'hidden', 'value' => 'password']) ?>
      <div class="row">
      	<div class="col-md-12">
			<div class="form-group">
				<div class="row">
					<div class="col-md-4">
						<?= $this->Form->label('old_password', 'Current Password') ?>
						<?= $this->Form->input('old_password', ['type' => 'password', 'class' => 'form-control', 'label' => false, 'value' => false]) ?>
					</div>
					<div class="col-md-4">
						<?= $this->Form->label('password', "New Password") ?>
						<?= $this->Form->input('password', ['type' => 'password', 'class' => 'form-control', 'label' => false, 'value' => false]) ?>
					</div>
					<div class="col-md-4">
						<?= $this->Form->label('password_confirm', "New Password (Confirm)") ?>
						<?= $this->Form->input('password_confirm', ['type' => 'password', 'class' => 'form-control', 'label' => false, 'value' => false]) ?>
					</div>
				</div>
			</div>
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