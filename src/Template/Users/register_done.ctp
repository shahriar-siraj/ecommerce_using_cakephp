<body class="inabit_bg">
    <section class="content-2 simple col-1 col-undefined mbr-after-navbar" id="content5-77">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center white-text head-title">Nice Work...</h3>
                </div>
            </div>
            <div class="row mgb-sm">
                <div class="col-md-12">
                    <p class="text-center"><strong>Your account is now set up and ready to use.</strong></p>        
                </div>
            </div>
            <div class="row">
                 <?= $this->Html->image('tick_icon.png', ['class' => 'img-responsive text-center tick_icon', 'alt' => \Cake\Core\Configure::read('Site.name'), 'title' => 'IN A BIT']) ?>
            </div>
            <div class="row pd-t-lg" style="margin-top: 5px;">
                <div class="col-md-12">
                    <h3 class="text-center white-text head-title">Now let's get started...</h3>
                </div>
            </div>
            <?php if ($group_id == 2) { ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="span12">
                             <?= $this->Form->create(null, [
                                'class' => 'form-search form-horizontal',
                                'url' => ['controller' => 'search', 'action' => 'quick'],
                                'role' => 'form',
                                'id' => 'custom-search-form'
                            ]) ?>
                                <div class="input-group">
                                    <input type="text" class="search-query" placeholder="Search Products" name="search" value="<?= $this->request->session()->read('Search.Quick.Products.Keyword'); ?>">
                                    <div class="input-group-btn">
                                        <div class="btn-group" role="group">
                                            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
                        <p><a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'account', 'prefix' => false]) ?>">My Account</a></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
</body>