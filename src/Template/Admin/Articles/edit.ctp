
<?= $this->assign('title', 'Add an Article') ?>

<?php $this->start('scriptBottom');

echo $this->Html->script('ckeditor/ckeditor') ?>
<script type="text/javascript">
  CKEDITOR.replace('articleBox', {
    customConfig: 'config/article.js'
  });
</script>

<?php $this->end() ?>

 <!-- Page -->
  <div class="page animsition">
    <div class="page-header">
      <h1 class="page-title">Update article</h1>
      <ol class="breadcrumb">
        <li>
        <?= $this->Html->link(('Dashboard'), ['controller' => 'admin',
            'action' => 'home', 'prefix' => 'admin'], ['escape' => false]) ?>
        </li>
        <li>
          <?= $this->Html->link(('Articles'), ['controller' => 'articles',
            'action' => 'index', 'prefix' => 'admin'], ['escape' => false]) ?>
        </li>
        <li class="active"><?= $article->title; ?></li>
      </ol>
    </div>
    <div class="page-content container-fluid">
      <?= $this->Form->create($article, [
        'class' => 'form-horizontal',
        'role' => 'form',
        'type' => 'file'
      ]) ?>
      <div class="row">
        <div class="col-sm-6">
          <!-- Panel Static Lables -->
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">General</h3>
            </div>
            <div class="panel-body container-fluid">
              <div class="form-group form-material">
                <label class="control-label" for="inputText">Title</label>
                <?= $this->Form->input('title', ['class' => 'form-control', 'label' => false]) ?>
              </div>
              <div class="form-group form-material">
                <label class="control-label" for="inputEmail">Category</label>
                <?= $this->Form->input('category_id', ['options' => $categories, 'class' => 'form-control', 'label' => false]) ?>
              </div>
              <div class="form-group form-material">
                <label class="control-label" for="inputPassword">Is Display</label>
                <select class="form-control" name="is_display">
                  <option value="1">Yes</option>
                  <option value="0">No</option>
                </option>
                </select>
              </div>
              <div class="col-md-6" style="padding-left: 0px;">
                <div class="form-group">
                  <label class="control-label"><strong>Hero File</strong></label>
                  <div class="fileinput">
                    <?php if (!empty($article->hero)) : ?>
                      <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px; margin-top: 10px;">
                        <?= $this->Html->image($article->hero) ?>
                      </div>
                    <?php endif; ?>
                    <div>
                      <span class="btn btn-default btn-file">
                        <?= $this->Form->input('hero_file', ['type' => 'file', 'label' => false, 'templates' => [
                          'inputContainer' => '{{content}}</span>',
                          'inputContainerError' => '{{content}}</span>{{error}}'
                        ]]) ?>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6" style="padding-left: 0px;">
                <div class="form-group">
                  <label class="control-label"><strong>Landscape File</strong></label>
                  <div class="fileinput">
                    <?php if (!empty($article->landscape)) : ?>
                      <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px; margin-top: 10px;">
                        <?= $this->Html->image($article->landscape) ?>
                      </div>
                    <?php endif; ?>
                    <div>
                      <span class="btn btn-default btn-file">
                        <?= $this->Form->input('landscape_file', ['type' => 'file', 'label' => false, 'templates' => [
                          'inputContainer' => '{{content}}</span>',
                          'inputContainerError' => '{{content}}</span>{{error}}'
                        ]]) ?>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Panel Static Lables -->
        </div>

        <div class="col-sm-6">
          <!-- Panel Floating Lables -->
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">Summary</h3>
            </div>
            <div class="panel-body container-fluid">
              <div class="form-group">
                <?= $this->Form->textarea(
                  'summary', [
                    'label' => false,
                    'class' => 'form-control'
                  ]
                ) ?>
              </div>
            </div>
          </div>
          <!-- Panel Floating Lables -->
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">Content</h3>
            </div>
            <div class="panel-body container-fluid">
              <div class="form-group">
                <?= $this->Form->input(
                  'content', [
                    'label' => false,
                    'class' => 'form-control articleBox',
                    'id' => 'articleBox'
                  ]
                ) ?>
              </div>
            </div>
          </div>
          <!-- End Panel Floating Lables -->
        </div>
      </div>
    <div class="row">
      <div class="pull-right">
      	<div class="col-md-12">
        	<?= $this->Form->button('Save Article', ['class' => 'btn btn-block btn-success']) ?>
        </div>
      </div>
    </div>
    <?= $this->Form->end() ?>
    </div>
  </div>
  <!-- End Page -->