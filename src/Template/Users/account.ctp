
<body class="inabit_bg">
    <section class="content-2 simple col-1 col-undefined mbr-after-navbar" id="content5-77">
        <div class="container">
            <div class="row">
                <h3 class="text-center pd-l-lg pd-r-lg white-text">My Account</h3>
                 <?= $this->Html->image('website/account_icon.png', ['class' => 'img-responsive text-center plus-icon', 'alt' => \Cake\Core\Configure::read('Site.name'), 'title' => 'IN A BIT']) ?>
            </div>
            <?= $this->Form->create($user,
                [
                    'class' => 'inabit-form',
                    'type' => 'file'
                ]
            ) ?>
            <div class="row">
                <div class="col-md-12">
                    <?= $this->Flash->render() ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center pd-l-lg pd-r-lg white-text">Personal Details</h3>
                    <div class="form-group">
                        <div class="col-md-10">
                            <div class="form-group">
                                <?= $this->Form->input('first_name', ['class' => 'form-transparent', 'label' => false, 'placeholder' => 'First Name']) ?>
                            </div>
                            <div class="form-group">
                                <?= $this->Form->input('last_name', ['class' => 'form-transparent', 'label' => false, 'placeholder' => 'Last Name']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center pd-l-lg pd-r-lg white-text">Delivery Address</h3>
                    <div class="form-group">
                        <div class="col-md-10">
                            <div class="form-group">
                                <?= $this->Form->input('delivery_address', ['class' => 'form-transparent', 'label' => false, 'placeholder' => 'Delivery Address']) ?>
                            </div>
                            <div class="form-group">
                                <?= $this->Form->input('delivery_suburb', ['class' => 'form-transparent', 'label' => false, 'placeholder' => 'Delivery Suburb']) ?>
                            </div>
                            <div class="form-group">
                                <?= $this->Form->select('delivery_state', $options_states, ['class' => 'custom-dropdown', 'label' => false]); ?>
                            </div>
                            <div class="form-group">
                                <?= $this->Form->input('delivery_post_code', ['class' => 'form-transparent', 'label' => false, 'placeholder' => 'Delivery Post Code']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center pd-l-lg pd-r-lg white-text">Billing Address</h3>
                    <div class="form-group">
                        <div class="col-md-10">
                            <div class="form-group">
                                <?= $this->Form->input('billing_address', ['class' => 'form-transparent', 'label' => false, 'placeholder' => 'Billing Address']) ?>
                            </div>
                            <div class="form-group">
                                <?= $this->Form->input('billing_suburb', ['class' => 'form-transparent', 'label' => false, 'placeholder' => 'Billing Suburb']) ?>
                            </div>
                            <div class="form-group">
                                <?= $this->Form->select('billing_state', $options_states, ['class' => 'custom-dropdown', 'label' => false]); ?>
                            </div>
                            <div class="form-group">
                                <?= $this->Form->input('billing_post_code', ['class' => 'form-transparent', 'label' => false, 'placeholder' => 'Billing Post Code']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?= $this->Form->button('Save', ['class' => 'mbr-buttons__btn btn btn-lg btn-info btn-green-transparent']) ?>
            <?= $this->Form->end() ?>
            </div>
        </div>
    </section>
</body>