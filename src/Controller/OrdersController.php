<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\I18n\Number;
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
     * Beforefilter.
     *
     * @param Event $event The beforeFilter event that was fired.
     *
     * @return void
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['index', 'view']);
    }

    public function merchant() { 

        $this->loadModel('Shops');

        // First find the shop of the user
        $shop = $this->Shops
                ->find()
                ->where([
                    'Shops.user_id' => $this->Auth->user('id')
                ])
                ->first();

        $orders = $this->Orders
        ->find()
        ->contain([
            'Shops'
        ])
        ->where([
            'Orders.shop_id' => $shop->id
        ]);

        $orders_count = $orders->count();
        $orders = $orders->toArray();

        $this->loadModel('OrderProducts');

        // Loop into the orders to count the number of products
        if ($orders_count >= 1) { 
            foreach ($orders as $k => $v) {

                $orders[$k]['products_nbr'] = $this->OrderProducts
                ->find()
                ->where([
                    'OrderProducts.order_id' => $v['id']
                ])->count();

            }
        }

        $this->set(compact('orders', 'orders_count'));

    }

    public function merchant_completed() { 

        $this->loadModel('Shops');

        // First find the shop of the user
        $shop = $this->Shops
                ->find()
                ->contain([
                    'Shops'
                ])
                ->where([
                    'Shops.user_id' => $this->Auth->user('id')
                ])
                ->first();

        echo $shop->id;

        $orders = $this->Orders
        ->find()
        ->where([
            'Orders.shop_id' => $shop->id
        ]);

        $orders_count = $orders->count();
        $orders = $orders->toArray();

        $this->loadModel('OrderProducts');

        // Loop into the orders to count the number of products
        if ($orders_count >= 1) { 
            foreach ($orders as $k => $v) {

                $orders[$k]['products_nbr'] = $this->OrderProducts
                ->find()
                ->where([
                    'OrderProducts.order_id' => $v['id']
                ])->count();

            }
        }

        $this->set(compact('orders', 'orders_count'));

    }

    /**
     * Index page.
     *
     * @return void
     */
    public function index() { 

        $orders = $this->Orders
        ->find()
        ->contain([
            'Shops'
        ])
        ->where([
            'Orders.user_id' => $this->Auth->user('id'),
            'Orders.status' => 1
        ]);

        $orders_count = $orders->count();
        $orders = $orders->toArray();

        //echo "<pre>";
        //print_r($orders);
        //echo "</pre>";
        //die();

        $this->loadModel('OrderProducts');

        // Loop into the orders to count the number of products
        if ($orders_count >= 1) { 
            foreach ($orders as $k => $v) {

                $orders[$k]['products_nbr'] = $this->OrderProducts
                ->find()
                ->where([
                    'OrderProducts.order_id' => $v['id']
                ])->count();

            }
        }

        $this->set(compact('orders', 'orders_count'));

    }

    /**
     * Index page.
     *
     * @return void
     */
    public function completed() { 

        $orders = $this->Orders
        ->find()
        ->contain([
            'Shops'
        ])
        ->where([
            'Orders.user_id' => $this->Auth->user('id'),
            'Orders.status' => 4
        ]);

        $orders_count = $orders->count();
        $orders = $orders->toArray();

        $this->loadModel('OrderProducts');

        // Loop into the orders to count the number of products
        if ($orders_count >= 1) { 
            foreach ($orders as $k => $v) {

                $orders[$k]['products_nbr'] = $this->OrderProducts
                ->find()
                ->where([
                    'OrderProducts.order_id' => $v['id']
                ])->count();

            }
        }

        $this->set(compact('orders', 'orders_count'));

    }

    public function view($order_id) { 

            // Orders

            $this->loadModel('Orders');

            $order = $this->Orders
                ->find()
                ->where([
                    'Orders.id' => $order_id
                ])
                ->first();

            // Order Products 

            $this->loadModel('OrderProducts');

            $order_products = $this->OrderProducts
                ->find()
                ->contain([
                    'Products'
                ])
                ->where([
                    'OrderProducts.order_id' => $order_id
                ])
                ->toArray();

            if (is_null($order)) {
                // redirect to the home page because htis order doesn't exist
                return $this->redirect(['controller' => 'pages', 'action' => 'home']);
            } else {
                $this->set(compact('order', 'order_products'));
            }

    }

}
