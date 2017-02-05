<?= $this->assign('title', 'Manage Payments') ?>

  <!-- Page -->
  <div class="page animsition">
    <div class="page-header">
      <h1 class="page-title">Manage Payments</h1>
      <ol class="breadcrumb">
        <li>
            <?= $this->Html->link(('Dashboard'), ['controller' => 'admin',
            'action' => 'home', 'prefix' => 'admin'], ['escape' => false]) ?>
        </li>
        <li>Blog</li>
        <li class="active">Payments</li>
      </ol>
      <div class="page-header-actions">
        <?= $this->Html->link(('New Payment'), ['controller' => 'payments', 'action' => 'add', 'prefix' => 'admin'], ['escape' => false]) ?>
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
          <h3 class="panel-title">Payments</h3>
        </header>
        <div class="panel-body">
          <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Is Display</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($payments as $payment):?>
                <tr>
                    <td>
                        #<?= $payment->id ?>
                    </td>
                    <td>
                        <?= $payment->name ?>
                    </td>
                    <td>
                        <?php if($payment->is_display): ?>
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
                        <?= $this->Html->link(
                            '<i class="icon wb-edit"></i>',
                            [
                                '_name' => 'payments-edit',
                                'id' => $payment->id
                            ],
                            [
                                'class' => 'btn btn-sm btn-primary',
                                'data-toggle' => 'tooltip',
                                'title' => 'Update this Payment',
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