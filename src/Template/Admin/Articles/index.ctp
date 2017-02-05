<?= $this->assign('title', 'Manage Articles') ?>

  <!-- Page -->
  <div class="page animsition">
    <div class="page-header">
      <h1 class="page-title">Manage Blog Articles</h1>
      <ol class="breadcrumb">
        <li>
            <?= $this->Html->link(('Dashboard'), ['controller' => 'admin',
            'action' => 'home', 'prefix' => 'admin'], ['escape' => false]) ?>
        </li>
        <li>Blog</li>
        <li class="active">Articles</li>
      </ol>
      <div class="page-header-actions">
        <?= $this->Html->link(('New Article'), ['controller' => 'articles', 'action' => 'add', 'prefix' => 'admin'], ['escape' => false]) ?>
      </div>
    </div>
    <div class="page-content">

      <div class="row">
        <div class="col-md-12">
            <?= $this->Flash->render() ?>
        </div>
      </div>

      <!-- Panel Basic -->
      <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          <h3 class="panel-title">Articles</h3>
        </header>
        <div class="panel-body">
          <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
            <thead>
              <tr>
                <th>ID</th>
                <th>Author</th>
                <th>Title</th>
                <th>Category</th>
                <th>Display</th>
                <th>Created</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($articles as $article):?>
                <tr>
                    <td>
                        #<?= $article->id ?>
                    </td>
                    <td>
                        <?= $article->user->full_name ?>
                    </td>
                    <td>
                        <?= $article->title ?>
                    </td>
                    <td>
                        <?= $this->Html->link($article->blog_category->title, ['_name' => 'categories-edit',
                                'slug' => $article->user->slug]) ?>
                    </td>
                    <td>
                        <?php if($article->is_display): ?>
                            <span class="label label-success">
                                YES
                            </span>
                        <?php else: ?>
                            <span class="label label-danger">
                                NO
                            </span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?= $article->created->format('d-m-Y') ?>
                    </td>
                    <td>
                        <?= $this->Html->link(
                            '<i class="icon wb-edit"></i>',
                            [
                                '_name' => 'articles-edit',
                                'slug' => $article->slug
                            ],
                            [
                                'class' => 'btn btn-sm btn-primary',
                                'data-toggle' => 'tooltip',
                                'title' => 'Update this Article',
                                'escape' => false
                            ]
                        )?>
                        <?= $this->Html->link(
                            '<i class="icon wb-trash"></i>',
                            [
                                '_name' => 'articles-delete',
                                'slug' => $article->slug
                            ],
                            [
                                'class' => 'btn btn-sm btn-danger',
                                'data-toggle' => 'tooltip',
                                'title' => 'Delete This Article',
                                'escape' => false
                            ]
                        )?>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
          </table>
        </div>
      </div>
      <!-- End Panel Basic -->
    </div>
</div>