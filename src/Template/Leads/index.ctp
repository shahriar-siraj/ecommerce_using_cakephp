<?= $this->assign('title', 'Manage Images') ?>

  <!-- Page -->
  <div class="page animsition">
    <div class="page-header">
      <h1 class="page-title">Manage Leads</h1>
      <ol class="breadcrumb">
        <li>
            <?= $this->Html->link(('Dashboard'), ['controller' => 'admin',
            'action' => 'home', 'prefix' => 'admin'], ['escape' => false]) ?>
        </li>
        <li class="active">Leads</li>
      </ol>
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
          <h3 class="panel-title">Leads</h3>
        </header>
        <div class="panel-body">
          <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contacted (Form)</th>
                <th>Package (Link)</th>
                <th>IP Address</th>
                <th>Created</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                <?php foreach($leads as $lead):?>
                <tr>
                    <td>
                        #<?= $lead->id; ?>
                    </td>
                     <td>
                        <?= $lead->fname; ?>
                    </td>
                    <td>
                        <?= $lead->email; ?>
                    </td>
                    <td>
                         <?php if($lead->via_form): ?>
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
                        <?= $lead->package; ?>
                    </td>
                    <td>
                        <?= $lead->ip; ?>
                    </td>
                    <td>
                        <?= $lead->created->format('d-m-Y') ?>
                    </td>
                    <td>
                        <?= $this->Html->link(
                            '<i class="icon wb-eye"></i>',
                            [
                                '_name' => 'leads-view',
                                'id' => $lead->id
                            ],
                            [
                                'class' => 'btn btn-sm btn-primary',
                                'data-toggle' => 'tooltip',
                                'title' => 'View',
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