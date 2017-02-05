<div class="form-group">
    <?= $this->Form->input('first_name', ['class' => 'form-transparent', 'label' => false, 'placeholder' => 'First Name']) ?>
</div>
<div class="form-group">
    <?= $this->Form->input('last_name', ['class' => 'form-transparent', 'label' => false, 'placeholder' => 'Last Name']) ?>
</div>
<div class="form-group">
    <?= $this->Form->input('company_name', ['class' => 'form-transparent', 'label' => false, 'placeholder' => 'Company Name']) ?>
</div>
<div class="form-group">
    <?= $this->Form->input('abn_acn', ['class' => 'form-transparent', 'label' => false, 'placeholder' => 'ABN/ACN']) ?>
</div>
<div class="form-group">
    <?= $this->Form->input('billing_address', ['class' => 'form-transparent', 'label' => false, 'placeholder' => 'Address']) ?>
</div>
<div class="form-group">
    <?= $this->Form->input('billing_suburb', ['class' => 'form-transparent', 'label' => false, 'placeholder' => 'Suburb']) ?>
</div>
<div class="form-group">
    <?= $this->Form->select('billing_state', $options_states, ['class' => 'custom-dropdown', 'label' => false]); ?>
</div>
<div class="form-group">
    <?= $this->Form->input('billing_post_code', ['class' => 'form-transparent', 'label' => false, 'placeholder' => 'Post Code']) ?>
</div>

<h3 class="text-center pd-l-lg pd-r-lg white-text">Connexion</h3>

<div class="form-group">
    <?= $this->Form->input('email', ['class' => 'form-transparent', 'label' => false, 'placeholder' => 'Email Address *']) ?>
</div>

<div class="form-group">
    <?= $this->Form->input('password', ['class' => 'form-transparent', 'label' => false, 'placeholder' => 'Password *']) ?>
</div>
<div class="form-group">
    <?= $this->Form->input('password_confirm', ['class' => 'form-transparent', 'label' => false, 'placeholder' => 'Confirm Password *', 'type' => 'password']) ?>
</div>