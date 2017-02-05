<?= $this->assign('title', 'Manage Blog Categories') ?>

  <!-- Page -->
  <div class="page animsition">
    <div class="page-header">
      <h1 class="page-title">Manage Blog Categories</h1>
      <ol class="breadcrumb">
        <li>
            <?= $this->Html->link(('Dashboard'), ['controller' => 'admin',
            'action' => 'home', 'prefix' => 'admin'], ['escape' => false]) ?>
        </li>
        <li>Blog</li>
        <li class="active">Categories</li>
      </ol>
      <div class="page-header-actions">
        <?= $this->Html->link(('New Category'), ['controller' => 'categories', 'action' => 'add', 'prefix' => 'admin'], ['escape' => false]) ?>
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
          <h3 class="panel-title">Categories</h3>
        </header>
        <div class="panel-body">
          <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
            <thead>
              <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Created</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($categories as $category):?>
                <tr>
                    <td>
                        #<?= $category->id ?>
                    </td>
                    <td>
                        <?= $category->title ?>
                    </td>
                    <td>
                        <?= $this->Text->truncate(
                            h($category->description),
                            55,
                            [
                                'ellipsis' => '...',
                                'exact' => false
                            ]
                        ) ?>
                    </td>
                    <td>
                        <?= $category->created->format('d-m-Y') ?>
                    </td>
                    <td>
                        <?= $this->Html->link(
                            '<i class="icon wb-edit"></i>',
                            [
                                '_name' => 'categories-edit',
                                'slug' => $category->slug
                            ],
                            [
                                'class' => 'btn btn-sm btn-primary',
                                'data-toggle' => 'tooltip',
                                'title' => 'Edit this category',
                                'escape' => false
                            ]
                        )?>
                        <?= $this->Html->link(
                            '<i class="icon wb-trash"></i>',
                            [
                                '_name' => 'categories-delete',
                                'slug' => $category->slug
                            ],
                            [
                                'class' => 'btn btn-sm btn-danger',
                                'data-toggle' => 'tooltip',
                                'title' => 'Delete this category',
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