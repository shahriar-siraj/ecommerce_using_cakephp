<?= $this->assign('title', 'Manage Products') ?>

  <!-- Page -->
  <div class="page animsition">
    <div class="page-header">
      <h1 class="page-title">Manage Products</h1>
      <ol class="breadcrumb">
        <li>
            <?= $this->Html->link(('Dashboard'), ['controller' => 'admin',
            'action' => 'home', 'prefix' => 'admin'], ['escape' => false]) ?>
        </li>
        <li class="active">Products</li>
      </ol>
      <div class="page-header-actions">
        <?= $this->Html->link(('New Product'), ['controller' => 'products', 'action' => 'add', 'prefix' => 'admin'], ['escape' => false]) ?>
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
          <h3 class="panel-title">Products</h3>
        </header>
        <div class="panel-body">
          <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
            <thead>
              <tr>
                <th>Name</th>
                <th>Shop</th>
                <th>Merchant</th>
                <th>Price</th>
                <th>Show/Hide</th>
                <th>Created</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($products as $product):?>
                <tr>
                    <td>
                        <?= $product->name ?>
                    </td>
                    <td>
                        <?= $product['shop']['name'] ?>
                    </td>
                     <td>
                        <?= $product['user']['first_name'] ?>  <?= $product['user']['last_name'] ?>
                    </td>
                    <td>$<?= $product->price ?></td>
                    <td>
                        <?php if($product->is_display): ?>
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
                        <?= $product->created->format('d-m-Y') ?>
                    </td>
                    <td>
                        <?= $this->Html->link(
                            '<i class="icon wb-edit"></i>',
                            [
                                '_name' => 'products-edit',
                                'id' => $product->id
                            ],
                            [
                                'class' => 'btn btn-sm btn-primary',
                                'data-toggle' => 'tooltip',
                                'title' => 'Update this Product',
                                'escape' => false
                            ]
                        )?>
                        <?= $this->Html->link(
                            '<i class="icon wb-trash"></i>',
                            [
                                '_name' => 'products-delete',
                                'id' => $product->id
                            ],
                            [
                                'class' => 'btn btn-sm btn-danger',
                                'data-toggle' => 'tooltip',
                                'title' => 'Delete This Product',
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