<?= $this->assign('title', 'Manage Orders') ?>

  <!-- Page -->
  <div class="page animsition">
    <div class="page-header">
      <h1 class="page-title">Manage Orders</h1>
      <ol class="breadcrumb">
        <li>
            <?= $this->Html->link(('Dashboard'), ['controller' => 'admin',
            'action' => 'home', 'prefix' => 'admin'], ['escape' => false]) ?>
        </li>
        <li class="active">Orders</li>
      </ol>
      <div class="page-header-actions">
        <?= $this->Html->link(('New Order'), ['controller' => 'orders', 'action' => 'add', 'prefix' => 'admin'], ['escape' => false]) ?>
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
          <h3 class="panel-title">Orders</h3>
        </header>
        <div class="panel-body">
          <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
            <thead>
              <tr>
                <th>Client</th>
                <th>Shop</th>
                <th>Total</th>
                <th>Status</th>
                <th>Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($orders as $order):?>
                <tr>
                    <td>
                        <?= $order->first_name ?> <?= $order->last_name ?>
                    </td>
                     <td>
                        <?= $order->shop->name ?>
                    </td>
                    <td>
                        $<?= $order->total ?>
                    </td>
                    <td>
                    <?php if ($order->status == 1) {
                      $status_name = 'Pending';
                    } else {
                      $status_name = 'Completed';
                    } ?>
                        <?= $status_name; ?>
                    </td>
                    <td>
                        <?= $order->created->format('d-m-Y') ?>
                    </td>
                    <td>
                        <?= $this->Html->link(
                            '<i class="icon wb-edit"></i>',
                            [
                                '_name' => 'orders-edit',
                                'id' => $order->id
                            ],
                            [
                                'class' => 'btn btn-sm btn-primary',
                                'data-toggle' => 'tooltip',
                                'title' => 'Update this Order',
                                'escape' => false
                            ]
                        )?>
                        <?= $this->Html->link(
                            '<i class="icon wb-trash"></i>',
                            [
                                '_name' => 'orders-delete',
                                'id' => $order->id
                            ],
                            [
                                'class' => 'btn btn-sm btn-danger',
                                'data-toggle' => 'tooltip',
                                'title' => 'Delete This Order',
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