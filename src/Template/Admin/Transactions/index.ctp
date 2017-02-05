<?= $this->assign('title', 'Manage Transactions') ?>

  <!-- Page -->
  <div class="page animsition">
    <div class="page-header">
      <h1 class="page-title">Manage Transactions</h1>
      <ol class="breadcrumb">
        <li>
            <?= $this->Html->link(('Dashboard'), ['controller' => 'admin',
            'action' => 'home', 'prefix' => 'admin'], ['escape' => false]) ?>
        </li>
        <li class="active">Transactions</li>
      </ol>
      <div class="page-header-actions">
        <?= $this->Html->link(('New Transaction'), ['controller' => 'transactions', 'action' => 'add', 'prefix' => 'admin'], ['escape' => false]) ?>
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
          <h3 class="panel-title">Transactions</h3>
        </header>
        <div class="panel-body">
          <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
            <thead>
              <tr>
                <th>Payer Name</th>
                <th>Transaction Number</th>
                <th>Amount Paid</th>
                <th>Created</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($transactions as $transaction):?>
                <tr>
                    <td>
                        <?= $transaction->payer_name ?>
                    </td>
                    <td>
                        <?= $transaction->transaction_number ?>
                    </td>
                    <td>
                        <?= $transaction->amount_paid ?>
                    </td>
                    <td>
                        <?= $transaction->created->format('d-m-Y') ?>
                    </td>
                    <td>
                        <?= $this->Html->link(
                            '<i class="icon wb-edit"></i>',
                            [
                                '_name' => 'transactions-edit',
                                'id' => $transaction->id
                            ],
                            [
                                'class' => 'btn btn-sm btn-primary',
                                'data-toggle' => 'tooltip',
                                'title' => 'Update this Transaction',
                                'escape' => false
                            ]
                        )?>
                        <?= $this->Html->link(
                            '<i class="icon wb-trash"></i>',
                            [
                                '_name' => 'transactions-delete',
                                'id' => $transaction->id
                            ],
                            [
                                'class' => 'btn btn-sm btn-danger',
                                'data-toggle' => 'tooltip',
                                'title' => 'Delete This Transaction',
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