
<div class="content-wrap">
<?= $this->element('header', ['style' => '
    background-color: rgb(0, 0, 0);
    background-color: rgba(0, 0, 0, 0.6);
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);
    -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";']) ?>

<?= $this->element('top_banner', ['img' => '/past_project_banner.jpg', 'content' => '<h2 class="mt-sm no-txt-transform bold fs50 green-txt-color mb30 make-centered">PAST <span class="white-txt-color">PROJECTS</span></h2>']) ?>

<section class="doublediagonal no-pb">
    <div class="container">
        <div class="section-heading mt50">
        <p class="no-txt-transform grey-text fs-md">Welcome to our showcase of past projects we’ve worked on.</p>
        </div>
    </div>
</section>

<section class="doublediagonal no-pb mb-md" id="item_media">
    <div class="container">
        <?php if ($projects->toArray()): ?>
          <div class="row">
            <div class="col-md-12">
            <?php foreach ($projects as $project): ?>
              <div class="col-md-6">
          <!-- normal -->
        <div class="ih-item square effect15 left_to_right">
          <a href="<?= $this->Url->build(['controller' => 'projects', 'action' => 'view', 'prefix' => false, 'id' => $project->id, 'slug' => $project->slug]) ?>">
            <div class="img"><?= $this->Html->image($project->hero, ['alt' => $project->title]) ?></div>
            <div class="h_black">
            <div class="info">
              <h3><strong><span class="green-txt-color"><?= $project->title; ?></span> <?= $project->title2; ?></strong></h3>
              <hr class="separator"></hr>
              <p><?= $project->type; ?></p>
            </div>
            </div>
          </a>
        </div>
          <!-- end normal -->
              </div>
            <?php endforeach; ?>
            </div>
          </div>
          <?php endif; ?>
    </div>
</section>


<?= $this->element('quote') ?>

<?= $this->element('footer') ?>