

<div class="content-wrap">
<?= $this->element('header', ['style' => '
    background-color: rgb(0, 0, 0);
    background-color: rgba(0, 0, 0, 0.6);
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);
    -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";']) ?>

<?= $this->element('top_banner', ['img' => 'media_banner.jpg', 'content' => '<h2 class="mt-sm no-txt-transform bold fs50 green-txt-color mb30 make-centered">EVERY TRADE <span class="white-txt-color">MEDIA</span></h2>', 'class' => 'media_add']) ?>

<section class="doublediagonal no-pb" id="item_media" style="background: #f5f5f5;">
    <div class="container">
        <?php if ($articles->toArray()): ?>
          <?php
            $i = 0;
            $len = count($articles->toArray());
          ?>
          <div class="row mt50">
            <div class="col-md-12">
            <?php foreach ($articles as $article): ?>
              <?php
                if ($i == 0) {
                  // first
                  $class = 'first';
                  $title = '<strong class="black-text"><span class="green-txt-color">CALYN’S</span> NEW HOUSE</strong>';
                } else if ($i == 1) {
                  $class = 'second';
                  $title = '<strong class="black-text"><span class="green-txt-color">RENOVATION</span> RESCUE</strong>';
                } else {
                  $class = '';
                }
                $i++;
              ?>
              <div class="col-md-offset-2 col-md-8 box <?= $class; ?>" style="padding: 0px;">
                  <div class="make-centered">
                    <div class="row date-container">
                      <div class="pull-right date-bg"><?= h($article->created->format('M')) ?> <?= h($article->created->format('d')) ?>, <?= h($article->created->format('Y')) ?></div>
                    </div>
                    <h3 class="title"> <a href="<?= $this->Url->build(['controller' => 'blog', 'action' => 'article', 'prefix' => false, 'id' => $article->id, 'slug' => $article->slug]) ?>" class="no-txt-decoration"><?= $title; ?></a></h3>
                    <h2 class="author"><?= $article->nbr_of_comments; ?> COMMENTS</h2>
                  </div>
                  <?= $this->Html->image('divider_image.jpg', ['alt' => 'EveryTrade', 'class' => 'img-responsive make-centered mb-sm']) ?>
                  <div class="divider"></div>
                  <a href="<?= $this->Url->build(['controller' => 'blog', 'action' => 'article', 'prefix' => false, 'id' => $article->id, 'slug' => $article->slug]) ?>"><?= $this->Html->image($article->hero, ['alt' => $article->hero_alt, 'class' => 'img-responsive']) ?></a>
                  <p class="summary"><?= $article->summary; ?></p>

                  <p class="text-center read_more_article_button"><a class="btn btn-info mt-sm btn-quote make-centered" href="<?= $this->Url->build(['controller' => 'blog', 'action' => 'article', 'prefix' => false, 'id' => $article->id, 'slug' => $article->slug]) ?>">READ MORE</a></p>
              </div>
            <?php endforeach; ?>
            </div>
          </div>
          <?php endif; ?>
    </div>
</section>

<?= $this->element('quote') ?>

<?= $this->element('footer') ?>