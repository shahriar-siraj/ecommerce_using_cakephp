
<div class="content-wrap">
<?= $this->element('header', ['style' => '
    background-color: rgb(0, 0, 0);
    background-color: rgba(0, 0, 0, 0.6);
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);
    -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";']) ?>

<?= $this->element('top_banner', ['img' => 'sectors_banner.jpg', 'content' => '<h2 class="mt-sm text-left no-txt-transform bold fs50 green-txt-color mb30 make-centered">SECTORS WE <span class="white-txt-color">CATER FOR</span></h2>']) ?>


<section class="doublediagonal no-pb">
    <div class="container">
        <div class="section-heading mt50">
            <h1 class="no-txt-transform bold no-mt fs25 mb30">At Every Trade Building Services we cater for any job of any size.</h1>
            <p class="no-txt-transform grey-text fs-md">It is through this that we offer services in the diverse sectors listed below:</p>
        </div>
    </div>
</section>

<section class="doublediagonal pt35 pb120">
    <div class="container">
        <div class="section-heading" style="margin-top: 0px !important; margin-bottom: 0px;">
          <div class="row">
            <div class="col-md-4">
                    <?= $this->Html->image('services/sectores/retail.jpg', ['class' => 'img-responsive', 'alt' => 'Precision Builder']) ?>
              </div>
            <div class="col-md-4">
                    <?= $this->Html->image('services/sectores/education.jpg', ['class' => 'img-responsive', 'alt' => 'Precision Builder']) ?>
              </div>
            <div class="col-md-4">
                    <?= $this->Html->image('services/sectores/health_aged.jpg', ['class' => 'img-responsive', 'alt' => 'Precision Builder']) ?>
              </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <?= $this->Html->image('services/sectores/civil.jpg', ['class' => 'img-responsive', 'alt' => 'Precision Builder']) ?>
              </div>
                <div class="col-md-4">
                    <?= $this->Html->image('services/sectores/residential.jpg', ['class' => 'img-responsive', 'alt' => 'Precision Builder']) ?>
              </div>
                <div class="col-md-4">
                    <?= $this->Html->image('services/sectores/industrial.jpg', ['class' => 'img-responsive', 'alt' => 'Precision Builder']) ?>
              </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <?= $this->Html->image('services/sectores/defence.jpg', ['class' => 'img-responsive', 'alt' => 'Precision Builder']) ?>
              </div>
                <div class="col-md-4">
                    <?= $this->Html->image('services/sectores/commercial.jpg', ['class' => 'img-responsive', 'alt' => 'Precision Builder']) ?>
              </div>
                <div class="col-md-4">
                    <?= $this->Html->image('services/sectores/corporate.jpg', ['class' => 'img-responsive', 'alt' => 'Precision Builder']) ?>
              </div>
          </div>
        </div>
</section>

<?= $this->element('quote') ?>

<?= $this->element('footer') ?>