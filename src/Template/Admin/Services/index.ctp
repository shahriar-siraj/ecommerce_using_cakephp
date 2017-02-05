<?= $this->assign('title', 'Manage Services') ?>

  <!-- Page -->
  <div class="page animsition">
    <div class="page-header">
      <h1 class="page-title">Manage Services</h1>
      <ol class="breadcrumb">
        <li>
            <?= $this->Html->link(('Dashboard'), ['controller' => 'admin',
            'action' => 'home', 'prefix' => 'admin'], ['escape' => false]) ?>
        </li>
        <li class="active">Services</li>
      </ol>
      <div class="page-header-actions">
        <?= $this->Html->link(('New Service'), ['controller' => 'services', 'action' => 'add', 'prefix' => 'admin'], ['escape' => false]) ?>
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
          <h3 class="panel-title">Services</h3>
        </header>
        <div class="panel-body">
          <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Is Display</th>
                <th>Created By</th>
                <th>Created</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($services as $service):?>
                <tr>
                    <td>
                        #<?= $service->id ?>
                    </td>
                    <td>
                        <?= $service->title ?>
                    </td>
                    <td>
                        <?php if($service->is_display): ?>
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
                        <?= $service->user->full_name ?>
                    </td>
                    <td>
                        <?= $service->created->format('d-m-Y') ?>
                    </td>
                    <td>
                        <?= $this->Html->link(
                            '<i class="icon wb-edit"></i>',
                            [
                                '_name' => 'services-edit',
                                'slug' => $service->slug
                            ],
                            [
                                'class' => 'btn btn-sm btn-primary',
                                'data-toggle' => 'tooltip',
                                'title' => 'Update this Service',
                                'escape' => false
                            ]
                        )?>
                        <?= $this->Html->link(
                            '<i class="icon wb-trash"></i>',
                            [
                                '_name' => 'services-delete',
                                'slug' => $service->slug
                            ],
                            [
                                'class' => 'btn btn-sm btn-danger',
                                'data-toggle' => 'tooltip',
                                'title' => 'Delete This Service',
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