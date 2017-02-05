
<body class="inabit_bg">
    <section class="content-2 simple col-1 col-undefined mbr-after-navbar" id="content5-77">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center white-text head-title">Contact Us</h3>
                </div>
            </div>
            <div class="row mgb-sm">
                <div class="col-md-12">
                    <p class="text-center">
                        <strong>Customer</strong><br />
                        Open Mon to Fri - 9am to 5pm<br />
                        1300 000 000
                    </p>
                    <p class="text-center">
                        <strong>Shoot us an email</strong><br />
                        info@inabit.com.au
                    </p>
                </div>
            </div>
            <?= $this->Form->create($contact,
                [
                    'class' => 'inabit-form',
                    'type' => 'file'
                ]
            ) ?>
            <div class="row mgb-sm">
                <div class="col-md-12">
                    <p class="text-left send-us-msg">
                        <strong>Send Us A Message...</strong>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-10">
                            <div class="form-group">
                                <?= $this->Form->input('name', ['class' => 'form-transparent', 'placeholder' => "Name*", 'label' => false]) ?>
                            </div>
                             <div class="form-group">
                                <?= $this->Form->input('email', ['class' => 'form-transparent', 'placeholder' => "Email*", 'label' => false]) ?>
                            </div>
                            <div class="form-group">
                                <?= $this->Form->input('phone', ['class' => 'form-transparent', 'placeholder' => "Phone", 'label' => false]) ?>
                            </div>
                            <div class="form-group">
                                <?= $this->Form->input('message', ['type' => 'textarea', 'class' => 'form-transparent', 'placeholder' => "Enquiry...*", 'label' => false]) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?= $this->Form->button('Send Message', ['class' => 'mbr-buttons__btn btn btn-lg btn-info btn-green-transparent']) ?>
            <?= $this->Form->end() ?>
            </div>
        </div>
    </section>
</body>