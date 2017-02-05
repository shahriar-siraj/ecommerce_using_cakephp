
<?= $this->element('header') ?>

<section class="doublediagonal noPaddingBtn">
    <div class="container">
        <div class="section-heading">
            <div class="row mt-md">
                <div class="col-md-12 sm-12">
                    <div class="col-md-4">
                        <a href="#"><?= $this->Html->image('services/worker.jpg', ['class' => 'img-responsive', 'alt' => 'Precision Builder']) ?></a>
                    </div>
                    <div class="col-md-4">
                        <a href="#"><?= $this->Html->image('services/worker.jpg', ['class' => 'img-responsive', 'alt' => 'Precision Builder']) ?></a>
                    </div>
                    <div class="col-md-4">
                        <a href="#"><?= $this->Html->image('services/worker.jpg', ['class' => 'img-responsive', 'alt' => 'Precision Builder']) ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="doublediagonal no-pb">
    <div class="container">
        <div class="section-heading mt-md">
            <h2 class="no-txt-transform grey-text bold">Get to know the</h2>
            <h1 class="no-txt-transform bold no-mt">Services we provided</h1>
            <div class="divider"></div>
            <p class="no-txt-transform grey-text fs-md">Enter the text here that you wish the visitor to read. Enter the text here that you wish the visitor to read. Enter the text here that you wish the visitor to read. Enter the text here that you wish the visitor to read.</p>
        </div>
    </div>
</section>

<section id="service-view no-mg no-pd">
    <div class="row no-mg no-pd">
        <div class="col-md-6" style="padding-left: 0px !important; padding-right: 0px !important">
            <?= $this->Html->image('services/hero-hand.jpg', ['class' => 'img-responsive', 'alt' => 'Hero Worker', 'style' => 'width: 100%;']) ?>
        </div>
        <div class="col-md-6">
            <div class="section-heading content-mainb mt-sm">
                <h2 class="no-txt-transform grey-text bold text-center">Our Skills</h2>
                <h1 class="no-txt-transform bold no-mt text-center">We Rock at Every Trade</h1>
                <div class="divider"></div>
                <p class="text-center mt-xs">Enter the text here that you wish the visitor to read. Enter the text here that you wish the visitor to read. Enter the text here that you wish the visitor to read. Enter the text here that you wish the visitor to read.</p>
                <div class="building">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6 mb-sm item">
                                <div class="col-md-3" style="margin-top: 25px;">
                                    <?= $this->Html->image('services/construction-house.jpg', ['class' => 'img-responsive', 'alt' => 'Building']) ?>
                                </div>
                                <div class="col-md-9">
                                    <h3>Construction</h3>
                                    <p><i>Fresh minds with creative ideas</i></p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-sm">
                                <div class="item">
                                    <a href="#">Steady construction requires solid and robust foundation as well as prosperous relations are built only on faith and mutual respect. We pay attention to all small details for best results.</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6 mb-sm item">
                                <div class="col-md-3" style="margin-top: 25px;">
                                    <?= $this->Html->image('services/construction-house.jpg', ['class' => 'img-responsive', 'alt' => 'Building']) ?>
                                </div>
                                <div class="col-md-9">
                                    <h3>Special Projects</h3>
                                    <p><i>Fresh minds with creative ideas</i></p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-sm item">
                                <div class="col-md-3" style="margin-top: 25px;">
                                    <?= $this->Html->image('services/construction-house.jpg', ['class' => 'img-responsive', 'alt' => 'Building']) ?>
                                </div>
                                <div class="col-md-9">
                                    <h3>Special Projects</h3>
                                    <p><i>Fresh minds with creative ideas</i></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->element('clients') ?>

<?= $this->element('quote') ?>

<?= $this->element('footer') ?>