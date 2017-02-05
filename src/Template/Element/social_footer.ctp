<div class="absolute_social">
    <ul class="social_media_icons">
        <li>
            <a href="<?= $this->Url->build('/') ?>" target="_blank">
              <?= $this->Html->image('facebook-icon.png', ['alt' => 'Facebook ' . \Cake\Core\Configure::read('Site.name'), 'title' => 'Facebook IN A BIT', 'width' => '50px']) ?>
            </a>
        </li>
        <li>
            <a href="<?= $this->Url->build('/') ?>" target="_blank">
              <?= $this->Html->image('google-icon.png', ['alt' => 'Google ' . \Cake\Core\Configure::read('Site.name'), 'title' => 'Google IN A BIT', 'width' => '50px']) ?>
            </a>
        </li>
        <li>
            <a href="<?= $this->Url->build('/') ?>" target="_blank">
              <?= $this->Html->image('twitter-icon.png', ['alt' => 'Facebook ' . \Cake\Core\Configure::read('Site.name'), 'title' => 'Twitter IN A BIT', 'width' => '50px']) ?>
            </a>
        </li>
    </ul>
    <uL class="links_bottom">
        <li><a href="<?= $this->Url->build(['controller' => 'pages', 'action' => 'terms_conditions', 'prefix' => false]) ?>">T's & C's</a></li>
        <li><a href="<?= $this->Url->build(['controller' => 'pages', 'action' => 'privacy_policy', 'prefix' => false]) ?>">Privacy Policy</a></li>
        <li><a href="<?= $this->Url->build(['controller' => 'pages', 'action' => 'about', 'prefix' => false]) ?>">About</a></li>
        <li><a href="<?= $this->Url->build(['controller' => 'contact', 'action' => 'index', 'prefix' => false]) ?>">Contact Us</a></li>
    </uL>
</div>