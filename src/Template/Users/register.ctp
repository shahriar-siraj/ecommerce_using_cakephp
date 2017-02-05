
<body class="inabit_bg">
    <section class="content-2 simple col-1 col-undefined mbr-after-navbar" id="content5-77">
        <div class="container">
            <div class="row">
                <h3 class="text-center pd-l-lg pd-r-lg white-text">Create New Account</h3>
                 <?= $this->Html->image('website/plus-icon.png', ['class' => 'img-responsive text-center plus-icon', 'alt' => \Cake\Core\Configure::read('Site.name'), 'title' => 'IN A BIT']) ?>
            </div>
            <?= $this->Form->create($userRegister,
                [
                    'class' => 'inabit-form',
                    'type' => 'file'
                ]
            ) ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-10">
                            <?php if ($layout == 'merchant') { ?>
                                <?= $this->element('Registration/merchant') ?>
                            <?php } else { ?>
                                <?= $this->element('Registration/customer') ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-sm">
                <div class="col-md-12">
                     <?php if ($layout == 'merchant') { ?>
                        <?= $this->Form->button('Create Account', ['class' => 'mbr-buttons__btn btn btn-lg btn-info btn-blue-transparent']) ?>
                    <?php } else { ?>
                        <?= $this->Form->button('Create Account', ['class' => 'mbr-buttons__btn btn btn-lg btn-info btn-green-transparent']) ?>
                    <?php } ?>
                </div>
            </div>
            <?= $this->Form->end() ?>
            </div>
        </div>
    </section>
</body>