<div class="form-group">
    <?= $this->Form->input('first_name', ['class' => 'form-transparent', 'label' => false, 'placeholder' => 'First Name']) ?>
</div>
<div class="form-group">
    <?= $this->Form->input('email', ['class' => 'form-transparent', 'label' => false, 'placeholder' => 'Email *']) ?>
</div>
<div class="form-group">
    <?= $this->Form->input('post_code', ['class' => 'form-transparent', 'label' => false, 'placeholder' => 'Post Code']) ?>
</div>
<div class="form-group">
	<?= $this->Form->select('gender', $options_gender, ['class' => 'custom-dropdown', 'label' => false]); ?>
</div>
<div class="form-group">
    <?= $this->Form->input('date_of_birth', ['class' => 'form-transparent', 'label' => false, 'placeholder' => 'Date of Birth']) ?>
</div>
<div class="form-group">
    <div class='input-group date' id='datetimepicker8'>
        <input type='text' class="form-control" />
        <span class="input-group-addon">
            <span class="fa fa-calendar">
            </span>
        </span>
    </div>
</div>
<div class="form-group">
    <?= $this->Form->input('password', ['class' => 'form-transparent', 'label' => false, 'placeholder' => 'Password *']) ?>
</div>
<div class="form-group">
    <?= $this->Form->input('password_confirm', ['class' => 'form-transparent', 'label' => false, 'placeholder' => 'Confirm Password *', 'type' => 'password']) ?>
</div>