<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\I18n\I18n;
use Cake\Routing\Router;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;

class TransactionsController extends AppController
{

    /**
     * Components.
     *
     * @var array
     */
    public $components = [
        'RequestHandler'
    ];

    /**
     * Display all transactions.
     *
     * @return void
     */
    public function index()
    {

        $this->loadModel('Transactions');

        $transactions = $this->Transactions
            ->find()
            ->order([
                'Transactions.created' => 'desc'
            ])->toArray();

        $this->set(compact('transactions'));
        
    }

    /**
     * Add a Transaction.
     *
     * @return \Cake\Network\Response|void
     */
    public function add()
    {
        $this->loadModel('Transactions');

        $transaction = $this->Transactions->newEntity($this->request->data);

        if ($this->request->is('post')) {

            if ($this->Transactions->save($transaction)) {
                $this->Flash->success('Your transaction has been created successfully !');
                return $this->redirect(['action' => 'index']);
            }
        }
        $this->set(compact('transaction'));
    }

    /**
     * Edit a transaction.
     *
     * @return \Cake\Network\Response|void
     */
    public function edit()
    {
        $this->loadModel('Transactions');

        $transaction = $this->Transactions
            ->find('all')
            ->where([
                'Transactions.id' => $this->request->id
            ])
            ->first();

        //Check if the transaction is found.
        if (empty($transaction)) {
            $this->Flash->error('This transaction doesn\'t exist or has been deleted.');
            return $this->redirect(['action' => 'index']);
        }

        if ($this->request->is('put')) {
            $this->Transactions->patchEntity($transaction, $this->request->data());
            if ($this->Transactions->save($transaction)) {
                $this->Flash->success('This transaction has been updated successfully !');
                return $this->redirect(['action' => 'index']);
            }
        }

        //$categories = $this->Transactions->BlogCategories->find('list');
        $this->set(compact('transaction'));
    }

    /**
     * Delete an Transaction and all his comments and likes.
     *
     * @return \Cake\Network\Response
     */
    public function delete()
    {

        $this->loadModel('Transactions');

         $transaction = $this->Transactions
            ->find('all')
            ->where([
                'Transactions.id' => $this->request->id
            ])
            ->first();

        //Check if the transaction is found.
        if (empty($transaction)) {
            $this->Flash->error('This transaction doesn\'t exist or has been deleted.');
            return $this->redirect(['action' => 'index']);
        }

        if ($this->Transactions->delete($transaction)) {
            $this->Flash->success('This transaction has been deleted successfully !');
            return $this->redirect(['action' => 'index']);
        }

        $this->Flash->error('Unable to delete this transaction.');

        return $this->redirect(['action' => 'index']);
    }

}
