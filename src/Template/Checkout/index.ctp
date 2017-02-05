
<body class="inabit_white">
    <section class="content-2 simple col-1 col-undefined mbr-after-navbar" id="content5-77">
        <div class="container">
            <div class="row">
                <h3 class="text-center pd-l-lg pd-r-lg white-text">BILLING & SHIPPING</h3>
            </div>
            <?= $this->Form->create($user,
                [
                    'class' => 'inabit-form',
                    'type' => 'file'
                ]
            ) ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-10">
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
                                                <?= $this->Form->input('delivery_state', ['class' => 'form-transparent', 'label' => false, 'placeholder' => 'Delivery State']) ?>
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
                                                <?= $this->Form->input('billing_state', ['class' => 'form-transparent', 'label' => false, 'placeholder' => 'Billing State']) ?>
                                            </div>
                                            <div class="form-group">
                                                <?= $this->Form->input('billing_post_code', ['class' => 'form-transparent', 'label' => false, 'placeholder' => 'Billing Post Code']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-sm">
                <div class="col-md-12">
                    <?= $this->Form->button('Continue', ['class' => 'mbr-buttons__btn btn btn-lg btn-info btn-green-transparent']) ?>
                </div>
            </div>
            <?= $this->Form->end() ?>
            </div>
        </div>
    </section>
</body>