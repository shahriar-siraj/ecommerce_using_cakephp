<div class="row">
    <div class="col-md-12">
        <?= $this->Flash->render() ?>
    </div>
</div>

<div class="panel">
  <div class="panel-body" STYLE="background: #000; border: 3px solid #afd523;">
    <div class="brand">
       <?= $this->Html->image('website/in-a-bit-logo.png', ['class' => 'brand-img', 'alt' => \Cake\Core\Configure::read('Site.name'), 'style' => 'max-width: 196px; margin-bottom: 15px;']) ?>
    </div>
    <?= $this->Form->create() ?>
      <div class="form-group form-material floating">
        <input type="email" class="form-control" name="email" />
        <label class="floating-label">Email</label>
        <?= $this->Form->error('email') ?>
      </div>
      <div class="form-group form-material floating">
        <input type="password" class="form-control" name="password" />
        <label class="floating-label">Password</label>
        <?= $this->Form->error('password') ?>
      </div>
      <?= $this->Form->button(
          __('Sign in {0}', '<i class="fa fa-arrow-right"></i>'),
          ['class' => 'btn btn-primary btn-block btn-lg margin-top-40']
      ); ?>
    <?= $this->Form->end(); ?>
  </div>
</div>