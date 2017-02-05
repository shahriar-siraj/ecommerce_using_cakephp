<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\I18n\I18n;
use Cake\Routing\Router;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;

class ShopsController extends AppController
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
     * Display all shops.
     *
     * @return void
     */
    public function index()
    {

        $this->loadModel('Shops');

        $shops = $this->Shops
            ->find()
            ->contain([
                'Users'
            ])
            ->order([
                'Shops.created' => 'desc'
            ]);

        $shops = $shops->toArray();
        $this->set(compact('shops'));

    }

    /**
     * Add a shop.
     *
     * @return \Cake\Network\Response|void
     */
    public function add()
    {
        $this->loadModel('Shops');
        $this->loadModel('Users');

        $shop = $this->Shops->newEntity($this->request->data);

        if ($this->request->is('post')) {

            $selected_merchant = $this->Shops
            ->find('all')
            ->where([
                'Shops.user_id' => $shop->user_id
            ])
            ->first();

            // Id this user is already assigned to a shop say it
            if (!is_null($selected_merchant)) {
                $this->Flash->error("This merchant is already assigned to a store! A merchant cannot be assigned to multiple store!");
                return $this->redirect(['controller' => 'shops', 'action' => 'add']);
            }

            //$shop-> = $selected_merchant->id;
            //echo "<pre>";
            //print_r($selected_merchant);
            //echo "</pre>";
            //die();
            
            if ($this->Shops->save($shop)) {
                $this->Flash->success('This shop has been created successfully !');
                return $this->redirect(['action' => 'index']);
            }
        }

        // Opening and Closing Time
        $options = array('9am' => '9am', '10am' => '10am', '11am' => '11am', '12pm' => '12pm', '1pm' => '1pm', '2pm' => '2pm', '3pm' => '3pm', '4pm' => '4pm', '5pm' => '5pm');
        $merchants = $this->Users->find('all')->where(['Users.group_id' => 3])->toArray();
        $this->set(compact('shop', 'merchants', 'options'));

    }

    /**
     * Edit a Shop.
     *
     * @return \Cake\Network\Response|void
     */
    public function edit()
    {
        $this->loadModel('Shops');

        $shop = $this->Shops
            ->find('all')
            ->where([
                'Shops.id' => $this->request->id
            ])
            ->first();

        //Check if the shop is found.
        if (empty($shop)) {
            $this->Flash->error('This shop doesn\'t exist or has been deleted.');
            return $this->redirect(['action' => 'index']);
        }

        if ($this->request->is('put')) {
            $this->Shops->patchEntity($shop, $this->request->data());
            if ($this->Shops->save($shop)) {
                $this->Flash->success('This shop has been updated successfully !');
                return $this->redirect(['action' => 'index']);
            }
        }

        // Opening and Closing Time
        $options = array('9am' => '9am', '10am' => '10am', '11am' => '11am', '12pm' => '12pm', '1pm' => '1pm', '2pm' => '2pm', '3pm' => '3pm', '4pm' => '4pm', '5pm' => '5pm');
        $this->set(compact('shop', 'options'));
    }

    /**
     * Delete a Shop.
     *
     * @return \Cake\Network\Response
     */
    public function delete()
    {

        $this->loadModel('Shops');

        $shop = $this->Shops
            ->find('all')
            ->where([
                'Shops.id' => $this->request->id
            ])
            ->first();

        //Check if the shop is found.
        if (empty($shop)) {
            $this->Flash->error('This shop doesn\'t exist or has been deleted.');
            return $this->redirect(['action' => 'index']);
        }

        if ($this->Shops->delete($shop)) {
            $this->Flash->success('This shop has been deleted successfully !');
            return $this->redirect(['action' => 'index']);
        }

        $this->Flash->error('Unable to delete this shop.');

        return $this->redirect(['action' => 'index']);

    }

}
