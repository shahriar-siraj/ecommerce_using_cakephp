
<body class="inabit_bg">
    <section class="content-2 simple col-1 col-undefined mbr-after-navbar" id="content5-77">
        <div class="container">
            <div class="row">
                <h3 class="text-center pd-l-lg pd-r-lg white-text">Add a product</h3>
                 <?= $this->Html->image('shop_account_icon.png', ['class' => 'img-responsive text-center plus-icon', 'alt' => \Cake\Core\Configure::read('Site.name'), 'title' => 'IN A BIT']) ?>
            </div>
            <?= $this->Form->create($product,
                [
                    'class' => 'inabit-form',
                    'type' => 'file'
                ]
            ) ?>
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center pd-l-lg pd-r-lg white-text">Product Details</h3>
                    <div class="form-group">
                        <div class="col-md-10">
                            <div class="form-group">
                                <?= $this->Form->input('name', ['class' => 'form-transparent', 'label' => false, 'placeholder' => 'Name']) ?>
                            </div>
                            <div class="form-group">
                                <?= $this->Form->input('price', ['class' => 'form-transparent', 'label' => false, 'placeholder' => 'Price ($)']) ?>
                            </div>
                            <div class="form-group">
                                <?= $this->Form->input('product_code', ['class' => 'form-transparent', 'label' => false, 'placeholder' => 'Product Code']) ?>
                            </div>
                            <div class="form-group">
                                <?= $this->Form->textarea('description', ['class' => 'form-transparent', 'label' => false, 'placeholder' => 'Describe your product...']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center pd-l-lg pd-r-lg white-text">Other</h3>
                    <div class="form-group">
                        <div class="col-md-10">
                            <div class="form-group">
                                <?= $this->Form->input('weight', ['class' => 'form-transparent', 'label' => false, 'placeholder' => 'Weight (KG)']) ?>
                            </div>
                            <div class="form-group">
                                <?= $this->Form->input('stock_code', ['class' => 'form-transparent', 'label' => false, 'placeholder' => 'Stock Code']) ?>
                            </div>
                            <div class="form-group">
                                <?= $this->Form->input('stock', ['class' => 'form-transparent', 'label' => false, 'placeholder' => 'Quantities']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center pd-l-lg pd-r-lg white-text">Hero Image</h3>
	                <div class="form-group">
	                    <?= $this->Form->input('hero_file', ['type' => 'file', 'label' => false, 'style' => 'color: #fff !important;', 'templates' => [
	                        'inputContainer' => '{{content}}</span>',
	                        'inputContainerError' => '{{content}}</span>{{error}}'
	                    ]]) ?>
	                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center pd-l-lg pd-r-lg white-text">Additional Images</h3>
	                <div class="form-group">
	                    
	                </div>
                </div>
            </div>

            <?= $this->Form->button('Save', ['class' => 'mbr-buttons__btn btn btn-lg btn-info btn-blue-transparent']) ?>
            <?= $this->Form->end() ?>
            </div>
        </div>
    </section>
</body>