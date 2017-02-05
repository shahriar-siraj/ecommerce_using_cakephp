<?= $this->element('meta', [
    'title' => "Reset your Password"
]) ?>

<body class="inabit_bg">
    <section class="content-2 simple col-1 col-undefined mbr-after-navbar" id="content5-77">
        <div class="container">
            <div class="row">
                <h3 class="text-center pd-l-lg pd-r-lg white-text">Reset your password</h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?= $this->Flash->render() ?>
                </div>
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
                            <div class="form-group">
                                <?= $this->Form->input(
                                    'password',
                                    [
                                        'label' => false,
                                        'class' => 'form-transparent',
                                        'placeholder' => "Password",
                                        'error' => false,
                                        'value' => ''
                                    ]
                                ) ?>
                            <?= $this->Form->error('password') ?>
                            </div>
                            <div class="form-group">
                                <?= $this->Form->input(
                                    'password_confirm',
                                    [
                                        'label' => false,
                                        'class' => 'form-transparent',
                                        'placeholder' => "Password (Confirmation)",
                                        'value' => '',
                                        'error' => false,
                                        'type' => 'password'
                                    ]
                                ) ?>
                            <?= $this->Form->error('password_confirm') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?= $this->Form->button('Reset', ['class' => 'mbr-buttons__btn btn btn-lg btn-info btn-green-transparent']) ?>
            <?= $this->Form->end() ?>

            <div class="row mgt-sm grey-text">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="col-md-6 col-sm-4 col-xs-4 col-xs-offset-1">
                        <div class="border-separator"></div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-2">
                        <p>or</p>
                    </div>
                    <div class="col-md-6 col-sm-4 col-xs-4">
                        <div class="border-separator"></div>
                    </div>
                </div>
            </div>
            <div class="row mgt-sm">
                <div class="col-md-12">
                    <p><a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'type_account', 'prefix' => false]) ?>">Create New Account</a></p>
                </div>
            </div>

        </div>
    </section>

    <?= $this->element('social_footer') ?>

</body>