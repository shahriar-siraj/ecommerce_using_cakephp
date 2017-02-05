<?php if ($article->id == 11) { ?>
  <script>
  var urls = [
      "../../upload/blog/hero/11/8d022434f06638527f10f6c2cf938785.jpg",
      "../../img/everytrade-media2.jpg"
  ];

  // preload images
  function preloadImages(srcs, callback) {
      var img, imgs = [];
      var remaining = srcs.length;
      for (var i = 0; i < srcs.length; i++) {
          img = new Image();
          img.onload = function() {
              --remaining;
              if (remaining <= 0) {
                  callback();
              }
          };
          img.src = srcs[i];
          imgs.push(img);
      }
  }

  function runSlideshow(container, urls, fadeTime, delayTime) {
      // all images are preload now
      // start the slideshow
      var imgs = $(container).append(new Image()).append(new Image()).find("img");
      var curImage = 0;
      var urlIndex = -1;
      // no wait time for the first transition
      var waitTime = 0;
      
      function next() {
          // set src on the next image
          // fade out the current image
          // fade in the new image
          var nextImage = (curImage + 1) % 2;
          urlIndex = (urlIndex + 1) % urls.length;
          
          imgs.eq(curImage).delay(waitTime).fadeOut(fadeTime);
          imgs.eq(nextImage).attr("src", urls[urlIndex]).delay(waitTime).fadeIn(fadeTime, next);
          curImage = nextImage;
          // set normal wait time for subsequent images
          waitTime = delayTime;
      }
      next();
  }

  // preload the images and start the slideshow when they are all preloaded
  preloadImages(urls, function() {
      runSlideshow("#cf4a", urls, 3000, 1000);
  });
  </script>
<?php } ?>

<div class="content-wrap">
<?= $this->element('header', ['style' => '
    background-color: rgb(0, 0, 0);
    background-color: rgba(0, 0, 0, 0.6);
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);
    -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";']) ?>

<?= $this->element('top_banner', ['img' => 'article_view_banner.jpg']) ?>

<?php $title = '<strong class="black-text"><span class="green-txt-color">' . $article->title .  '</span><span class="black-text"> ' . $article->title2 . '</span></strong>'; ?>

<section class="doublediagonal no-pb" id="item_media">
    <div class="container">
        <?php if ($article): ?>
          <div class="row mt50">
            <div class="col-md-12">
              <div class="col-md-12 box first in-article" style="padding-bottom: 50px !important;">
                  <div class="make-centered">
                      <?= $this->Flash->render() ?>
                    <div class="row date-container">
                      <div class="pull-left date-bg" style="padding-right: 10px;">
                        <a href="<?= $this->Url->build(['controller' => 'media', 'action' => 'index', 'prefix' => false]) ?>" style="color: #fff !important;">
                          Back to articles
                        </a>
                      </div>
                      <div class="pull-right date-bg"><?= h($article->created->format('M')) ?> <?= h($article->created->format('d')) ?>, <?= h($article->created->format('Y')) ?></div>
                    </div>
                    <h3 class="title"> <a href="<?= $this->Url->build(['controller' => 'blog', 'action' => 'article', 'prefix' => false, 'id' => $article->id, 'slug' => $article->slug]) ?>" class="no-txt-decoration"><?= $title; ?></a></h3>
                    <h2 class="author"><?= $article->nbr_of_comments; ?> COMMENTS</h2>
                  </div>
                  <?= $this->Html->image('divider_image.jpg', ['alt' => 'EveryTrade', 'class' => 'img-responsive make-centered mb-sm']) ?>
                  <div class="divider"></div>
                  <?php if ($article->id == 11) { ?>
                    <div id="cf4a"></div>
                     <img src="../../upload/blog/hero/11/8d022434f06638527f10f6c2cf938785.jpg" class="img-responsive hidden-lg hidden-md hidden-sm" style="width: 100%;">
                     <img src="../../img/everytrade-media2.jpg" class="img-responsive hidden-lg hidden-md hidden-sm" style="width: 100%;">
                  <?php } ?>
                    <?php if ($article->id != 11) { ?>
                      <a href="<?= $this->Url->build(['controller' => 'blog', 'action' => 'article', 'prefix' => false, 'id' => $article->id, 'slug' => $article->slug]) ?>"><?= $this->Html->image($article->hero, ['alt' => $article->hero_alt, 'class' => 'img-responsive', 'style' => 'width: 100%;']) ?></a>
                    <?php } ?>
                     <div class="article_content"><p class="summary" style="margin-top: 50px !important;"><?= $article->content; ?></p></div>
                  </div>
              </div>
            </div>
          </div>
          <?php endif; ?>
    </div>
</section>

<section id="comments">
  <div class="container">
      <?php if ($comments): ?>
          <?php foreach ($comments as $comment): ?>
            <div class="col-sm-12 col-xs-12 item-comment">
                <div class="panel panel-white post">
                    <div class="post-heading">
                        <div class="pull-left image">
                            <img src="../../img/user_1.jpg" class="img-circle avatar" alt="user profile image">
                        </div>
                        <div class="pull-left meta left-side">
                            <div class="title h5">
                                <b><?= $comment->full_name; ?></b>
                            </div>
                            <h6 class="text-muted time"><strong><?= h($comment->created->format('M')) ?> <?= h($comment->created->format('d')) ?>, <?= h($comment->created->format('Y')) ?></strong></h6>
                            <h6 class="text-muted time"><?= $comment->content; ?></h6>
                        </div>
                    </div> 
                </div>
            </div>
          <?php endforeach; ?>
      <?php endif; ?>
  </div>
</section>

<section id="comment_form">

<div class="container">
  <div class="mb30">
    <h2 class="leave-reply">LEAVE A REPLY</h2>
    <p>Your email address will not published. Required fields are marked *</p>
  </div>
    <?= $this->Form->create($formComments) ?>
        <div class="form-group">
        <label data-toggle="tooltip" for="content">Comment <span class="text-danger">*</span></label>
        <?= $this->Form->input('content', ['type' => 'textarea', 'class' => 'form-control', 'placeholder' => "Enter your message...", 'label' => false]) ?>
         <?= $this->Form->error('content') ?>
    </div>
    <div class="form-group">
        <label data-toggle="tooltip" for="name">Name <span class="text-danger">*</span></label>
        <?= $this->Form->input('full_name', ['class' => 'form-control', 'placeholder' => "Name", 'label' => false]) ?>
    </div>
    <div class="form-group">
        <label data-toggle="tooltip" for="email">Email <span class="text-danger">*</span></label>
        <?= $this->Form->input('email', ['class' => 'form-control', 'placeholder' => "Email", 'label' => false]) ?>
    </div>
    <div class="form-group">
        <label data-toggle="tooltip" for="website">Website</label>
        <?= $this->Form->input('website', ['class' => 'form-control', 'placeholder' => "Website", 'label' => false]) ?>
    </div>
    <?= $this->Form->button("Send comment", ['class' => 'btn btn-info send-comment']) ?>
    <?= $this->Form->end() ?>
</div>
</section>

<?= $this->element('quote') ?>

<?= $this->element('footer') ?>
