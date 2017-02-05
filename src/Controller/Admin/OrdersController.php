<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\I18n\I18n;
use Cake\Routing\Router;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;

class OrdersController extends AppController
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
     * Display all orders.
     *
     * @return void
     */
    public function index()
    {

        $this->loadModel('Orders');

        $orders = $this->Orders
            ->find()
            ->contain([
                'Shops'
            ])
            ->order([
                'Orders.created' => 'desc'
            ])->toArray();

        $this->set(compact('orders'));
        
    }

    /**
     * Add a order.
     *
     * @return \Cake\Network\Response|void
     */
    public function add()
    {
        $this->loadModel('Orders');

        $order = $this->Orders->newEntity($this->request->data);

        if ($this->request->is('post')) {

            if ($this->Orders->save($order)) {
                $this->Flash->success('Your order has been created successfully !');
                return $this->redirect(['action' => 'index']);
            }
        }
        $this->set(compact('order'));
    }

    /**
     * Edit an Order.
     *
     * @return \Cake\Network\Response|void
     */
    public function edit()
    {
        $this->loadModel('Orders');

        $order = $this->Orders
            ->find('all')
            ->contain([
                'Shops'
            ])
            ->where([
                'Orders.id' => $this->request->id
            ])
            ->first();

        //Check if the order is found.
        if (empty($order)) {
            $this->Flash->error('This order doesn\'t exist or has been deleted.');
            return $this->redirect(['action' => 'index']);
        }

        if ($this->request->is('put')) {
            $this->Orders->patchEntity($order, $this->request->data());
            if ($this->Orders->save($order)) {
                $this->Flash->success('This order has been updated successfully !');
                return $this->redirect(['action' => 'index']);
            }
        }

        //$categories = $this->Orders->BlogCategories->find('list');
        $this->set(compact('order'));
    }

    /**
     * Delete an Order and all his comments and likes.
     *
     * @return \Cake\Network\Response
     */
    public function delete()
    {
        $this->loadModel('OrdeRs');

        $order = $this->Orders
            ->find('all')
            ->where([
                'Orders.id' => $this->request->id
            ])
            ->first();

        //Check if the order is found.
        if (empty($order)) {
            $this->Flash->error('This order doesn\'t exist or has been deleted.');
            return $this->redirect(['action' => 'index']);
        }

        if ($this->Orders->delete($order)) {
            $this->Flash->success('This order has been deleted successfully !');
            return $this->redirect(['action' => 'index']);
        }

        $this->Flash->error('Unable to delete this order.');

        return $this->redirect(['action' => 'index']);
    }

}
