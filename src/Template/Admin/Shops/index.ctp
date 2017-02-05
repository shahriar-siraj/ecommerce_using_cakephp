<?= $this->assign('title', 'Manage Shops') ?>

  <!-- Page -->
  <div class="page animsition">
    <div class="page-header">
      <h1 class="page-title">Manage Shops</h1>
      <ol class="breadcrumb">
        <li>
            <?= $this->Html->link(('Dashboard'), ['controller' => 'admin',
            'action' => 'home', 'prefix' => 'admin'], ['escape' => false]) ?>
        </li>
        <li class="active">Shops</li>
      </ol>
      <div class="page-header-actions">
        <?= $this->Html->link(('New Shop'), ['controller' => 'shops', 'action' => 'add', 'prefix' => 'admin'], ['escape' => false]) ?>
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
          <h3 class="panel-title">Shops</h3>
        </header>
        <div class="panel-body">
          <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
            <thead>
              <tr>

                <th>Name</th>
                <th>Merchant</th>
                <th>Localisation</th>
                <th>Show/Hide</th>
                <th>Created</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($shops as $shop):?>
                <tr>
                    <td>
                        <?= $shop->name ?>
                    </td>
                     <td>
                        <?= $shop->user->first_name ?> <?= $shop->user->last_name ?>
                    </td>
                    <td><?= $shop->suburb ?>, <?= $shop->postcode ?> - <?= $shop->state ?></td>
                    <td>
                        <?php if($shop->is_display): ?>
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
                        <?= $shop->created->format('d-m-Y') ?>
                    </td>
                    <td>
                        <?= $this->Html->link(
                            '<i class="icon wb-edit"></i>',
                            [
                                '_name' => 'shops-edit',
                                'id' => $shop->id
                            ],
                            [
                                'class' => 'btn btn-sm btn-primary',
                                'data-toggle' => 'tooltip',
                                'title' => 'Update this Shop',
                                'escape' => false
                            ]
                        )?>
                        <?= $this->Html->link(
                            '<i class="icon wb-trash"></i>',
                            [
                                '_name' => 'shops-delete',
                                'id' => $shop->id
                            ],
                            [
                                'class' => 'btn btn-sm btn-danger',
                                'data-toggle' => 'tooltip',
                                'title' => 'Delete This Shop',
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