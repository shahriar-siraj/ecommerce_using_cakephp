
<?php if($this->request->session()->read('Auth.User') && ($this->request->session()->read('Auth.User.group_id') == 3)): ?>
    <style>
    .mbr-navbar--auto-collapse .mbr-navbar__item {
        background: #328ca9;
    }
    </style>
<?php endif; ?>

<section class="mbr-navbar mbr-navbar--freeze mbr-navbar--absolute mbr-navbar--transparent mbr-navbar--sticky mbr-navbar--auto-collapse" id="menu-59">
    <div class="mbr-navbar__section mbr-section">
        <div class="mbr-section__container container">
            <div class="mbr-navbar__container">
                <div class="mbr-navbar__hamburger mbr-hamburger text-white"><span class="mbr-hamburger__line"></span></div>
                <div class="mbr-navbar__column mbr-navbar__menu">
                    <nav class="mbr-navbar__menu-box mbr-navbar__menu-box--inline-right">
                        <div class="mbr-navbar__column">
                        <?php if($this->request->session()->read('Auth.User') && ($this->request->session()->read('Auth.User.group_id') == 2)): ?>
                            <ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons-menu mbr-buttons--freeze mbr-buttons--right btn-decorator mbr-buttons--active">
                                <li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" href="<?= $this->Url->build(['controller' => 'users', 'action' => 'account', 'prefix' => false]) ?>"><div class="row" style="margin-bottom:20px;">
                                    <?= $this->Html->image('menu_account_icon.png', ['class' => 'mbr-navbar__brand-img mbr-brand__img', 'alt' => \Cake\Core\Configure::read('Site.name'), 'title' => 'IN A BIT', 'height' > '80px']) ?> 
                                    </div> <span>Account</span></a></li>
                                <li class="mbr-navbar__item mg-l-sm"><a class="mbr-buttons__link btn text-white" href="<?= $this->Url->build(['controller' => 'search', 'action' => 'index', 'prefix' => false]) ?>">  <div class="row" style="margin-bottom:20px;">
                                    <?= $this->Html->image('menu-search-icon.png', ['class' => 'mbr-navbar__brand-img mbr-brand__img', 'alt' => \Cake\Core\Configure::read('Site.name'), 'title' => 'IN A BIT', 'height' > '80px']) ?> 
                                    </div>  Search</a></li>
                                <li class="mbr-navbar__item mg-l-sm"><a class="mbr-buttons__link btn text-white"  href="<?= $this->Url->build(['controller' => 'contact', 'action' => 'index', 'prefix' => false]) ?>">  <div class="row" style="margin-bottom:20px;">
                                    <?= $this->Html->image('menu_account_icon.png', ['class' => 'mbr-navbar__brand-img mbr-brand__img', 'alt' => \Cake\Core\Configure::read('Site.name'), 'title' => 'IN A BIT', 'height' > '80px']) ?> 
                                    </div>  Contact</a></li>
                                <li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white"  href="<?= $this->Url->build(['controller' => 'cart', 'action' => 'index', 'prefix' => false]) ?>"> <div class="row" style="margin-bottom:20px;">
                                    <?= $this->Html->image('cart_icon_menu.png', ['class' => 'mbr-navbar__brand-img mbr-brand__img', 'alt' => \Cake\Core\Configure::read('Site.name'), 'title' => 'IN A BIT', 'height' > '80px']) ?> 
                                    </div>  Cart</a></li>
                                <li class="mbr-navbar__item mg-l-sm"><a class="mbr-buttons__link btn text-white"  href="<?= $this->Url->build(['controller' => 'orders', 'action' => 'index', 'prefix' => false]) ?>"> <div class="row" style="margin-bottom:20px;">
                                    <?= $this->Html->image('menu_account_icon.png', ['class' => 'mbr-navbar__brand-img mbr-brand__img', 'alt' => \Cake\Core\Configure::read('Site.name'), 'title' => 'IN A BIT', 'height' > '80px']) ?> 
                                    </div>  My Orders</a></li>
                                <li class="mbr-navbar__item mg-l-sm"><a class="mbr-buttons__link btn text-white"  href="<?= $this->Url->build(['controller' => 'users', 'action' => 'logout', 'prefix' => false]) ?>"> <div class="row" style="margin-bottom:20px;">
                                    <?= $this->Html->image('signin-icon.png', ['class' => 'mbr-navbar__brand-img mbr-brand__img', 'alt' => \Cake\Core\Configure::read('Site.name'), 'title' => 'IN A BIT', 'height' > '80px']) ?> 
                                    </div>  Log Out</a></li>
                            </ul>
                        <?php elseif($this->request->session()->read('Auth.User') && ($this->request->session()->read('Auth.User.group_id') == 3)): ?>
                            <ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons-menu mbr-buttons--freeze mbr-buttons--right btn-decorator mbr-buttons--active">
                                <li class="mbr-navbar__item mg-l-sm"><a class="mbr-buttons__link btn text-white" href="<?= $this->Url->build(['controller' => 'users', 'action' => 'account', 'prefix' => false]) ?>">
                                    <div class="row" style="margin-bottom:20px;">
                                    <?= $this->Html->image('menu_account_icon.png', ['class' => 'mbr-navbar__brand-img mbr-brand__img', 'alt' => \Cake\Core\Configure::read('Site.name'), 'title' => 'IN A BIT', 'height' > '80px']) ?> 
                                    </div> 
                                <span>Account</span></a></li>
                                <li class="mbr-navbar__item mg-l-sm"><a class="mbr-buttons__link btn text-white" href="<?= $this->Url->build(['controller' => 'shop', 'action' => 'index', 'prefix' => false]) ?>">  <div class="row" style="margin-bottom:20px;">
                                    <?= $this->Html->image('cart_icon_menu.png', ['class' => 'mbr-navbar__brand-img mbr-brand__img', 'alt' => \Cake\Core\Configure::read('Site.name'), 'title' => 'IN A BIT', 'height' > '80px']) ?> 
                                    </div> My Shop</a></li>
                                <li class="mbr-navbar__item mg-l-sm"><a class="mbr-buttons__link btn text-white"  href="<?= $this->Url->build(['controller' => 'contact', 'action' => 'index', 'prefix' => false]) ?>"> <div class="row" style="margin-bottom:20px;">
                                    <?= $this->Html->image('menu_account_icon.png', ['class' => 'mbr-navbar__brand-img mbr-brand__img', 'alt' => \Cake\Core\Configure::read('Site.name'), 'title' => 'IN A BIT', 'height' > '80px']) ?> 
                                    </div> Contact</a></li>
                                <li class="mbr-navbar__item mg-l-sm"><a class="mbr-buttons__link btn text-white"  href="<?= $this->Url->build(['controller' => 'orders', 'action' => 'merchant', 'prefix' => false]) ?>"> <div class="row" style="margin-bottom:20px;">
                                    <?= $this->Html->image('menu_account_icon.png', ['class' => 'mbr-navbar__brand-img mbr-brand__img', 'alt' => \Cake\Core\Configure::read('Site.name'), 'title' => 'IN A BIT', 'height' > '80px']) ?> 
                                    </div>  My Orders</a></li>
                                <li class="mbr-navbar__item mg-l-sm"><a class="mbr-buttons__link btn text-white"  href="<?= $this->Url->build(['controller' => 'packages', 'action' => 'index', 'prefix' => false]) ?>"> <div class="row" style="margin-bottom:20px;">
                                    <?= $this->Html->image('menu_account_icon.png', ['class' => 'mbr-navbar__brand-img mbr-brand__img', 'alt' => \Cake\Core\Configure::read('Site.name'), 'title' => 'IN A BIT', 'height' > '80px']) ?> 
                                    </div>  Packages</a></li>
                                <li class="mbr-navbar__item mg-l-sm"><a class="mbr-buttons__link btn text-white"  href="<?= $this->Url->build(['controller' => 'users', 'action' => 'logout', 'prefix' => false]) ?>"> <div class="row" style="margin-bottom:20px;">
                                    <?= $this->Html->image('signin-icon.png', ['class' => 'mbr-navbar__brand-img mbr-brand__img', 'alt' => \Cake\Core\Configure::read('Site.name'), 'title' => 'IN A BIT', 'height' > '80px']) ?> 
                                    </div> <span>Log Out</span></a></li>
                            </ul>
                        <?php else:?>
                             <ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons-menu mbr-buttons--freeze mbr-buttons--right btn-decorator mbr-buttons--active">
                                <li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" href="<?= $this->Url->build(['controller' => 'users', 'action' => 'login', 'prefix' => false]) ?>"><div class="row" style="margin-bottom:20px;">
                                    <?= $this->Html->image('signin-icon.png', ['class' => 'mbr-navbar__brand-img mbr-brand__img', 'alt' => \Cake\Core\Configure::read('Site.name'), 'title' => 'IN A BIT', 'height' > '80px']) ?> 
                                    </div> <span>Sign In</span></a></li>
                                <li class="mbr-navbar__item mg-l-sm"><a class="mbr-buttons__link btn text-white" href="<?= $this->Url->build(['controller' => 'users', 'action' => 'type_account', 'prefix' => false]) ?>"> <div class="row" style="margin-bottom:3px;">
                                    <?= $this->Html->image('new-account-icon.png', ['class' => 'mbr-navbar__brand-img mbr-brand__img', 'alt' => \Cake\Core\Configure::read('Site.name'), 'title' => 'IN A BIT', 'height' > '80px']) ?> 
                                    </div> <span>New <br />Account</span></a></li>
                                <li class="mbr-navbar__item mg-l-sm"><a class="mbr-buttons__link btn text-white" href="<?= $this->Url->build(['controller' => 'search', 'action' => 'index', 'prefix' => false]) ?>"> <div class="row" style="margin-bottom:20px;">
                                    <?= $this->Html->image('menu-search-icon.png', ['class' => 'mbr-navbar__brand-img mbr-brand__img', 'alt' => \Cake\Core\Configure::read('Site.name'), 'title' => 'IN A BIT', 'height' > '80px']) ?> 
                                    </div> <span>Search</span></a></li>
                            </ul>
                        <?php endif; ?>
                        </div>
                    </nav>
                </div>

                <div class="mbr-navbar__column mbr-navbar__column--s mbr-navbar__brand">
                    <span class="mbr-navbar__brand-link mbr-brand mbr-brand--inline" style="float: left; margin-left: 55px;">
                        <span class="mbr-brand__logo">
                            <a href="<?= $this->Url->build('/') ?>">
                              <?= $this->Html->image('website/my_account_icon.png', ['class' => 'mbr-navbar__brand-img mbr-brand__img', 'alt' => \Cake\Core\Configure::read('Site.name'), 'title' => 'IN A BIT', 'height' > '27px']) ?>
                            </a>
                        </span>

                    </span>
                </div>

                <div class="mbr-navbar__column mbr-navbar__column--s mbr-navbar__brand">
                    <span class="mbr-navbar__brand-link mbr-brand mbr-brand--inline">
                        <span class="mbr-brand__logo">
                            <a href="<?= $this->Url->build('/') ?>">
                              <?= $this->Html->image('website/in-a-bit-logo.png', ['class' => 'mbr-navbar__brand-img mbr-brand__img', 'alt' => \Cake\Core\Configure::read('Site.name'), 'title' => 'IN A BIT']) ?>
                            </a>
                        </span>
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>