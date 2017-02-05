<?php
namespace App\Controller;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\Network\Exception\NotFoundException;

class ProductsController extends AppController
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
     * Initialize handle.
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
    }

    /**
     * BeforeFilter handle.
     *
     * @param Event $event The beforeFilter event that was fired.
     *
     * @return void
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['index', 'view', 'history']);
    }

    public function index() {

    }

    public function view() {

        $this->loadModel('Products');

        $product = $this->Products
            ->find('slug', [
                'slug' => $this->request->slug,
                'slugField' => 'Products.slug'
            ])
            ->contain([
                'ProductImages'
            ])
            ->where([
                'Products.is_display' => 1
            ])
            ->first();

        //Check if the product is found.
        if (empty($product)) {
            $this->Flash->error('This product doesn\'t exist or has been deleted.');
            return $this->redirect(['action' => 'index']);
        }
        $this->set(compact('product'));

    }

    public function history($product_id) {

        $this->loadModel('Products');
        $this->loadModel('OrderProducts');

        $product = $this->Products
            ->find('all')
            ->where([
                'Products.id' => $product_id
            ])
            ->first();

        // Find how many time this product has been ordered

        $this->paginate = [
            'limit' => 15,
            'conditions' => [
                'OrderProducts.product_id' => $product_id
            ],
            'order' => [
                'OrderProducts.created' => 'asc'
            ]
        ];

        $orders = $this->paginate($this->OrderProducts->find());

        $this->set(compact('orders', 'product'));

    }

}