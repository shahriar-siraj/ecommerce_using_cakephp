<?php
namespace App\Controller;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\Network\Exception\NotFoundException;
use Cake\Log\Log;

class CheckoutController extends AppController
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
        $this->Auth->allow(['index']);
    }

    public function index() {

        // Current Logged User
        $this->loadModel('Users');
        $user = $this->Users->get($this->Auth->user('id'));

        if ($this->request->is('put')) {

            $this->Users->patchEntity($user, $this->request->data());
            if ($this->Users->save($user)) {
               
                // Create session for the shipping and billing details so it can be put in the fields as value
                $session = $this->request->session();

                // Billing
                $session->write('Cart.user_billing.address', $user->billing_address); 
                $session->write('Cart.user_billing.suburb', $user->billing_suburb); 
                $session->write('Cart.user_billing.state', $user->billing_state); 
                $session->write('Cart.user_billing.post_code', $user->billing_post_code); 

                // Delivery
                $session->write('Cart.user_delivery.address', $user->billing_address); 
                $session->write('Cart.user_delivery.suburb', $user->billing_suburb); 
                $session->write('Cart.user_delivery.state', $user->billing_state); 
                $session->write('Cart.user_delivery.post_code', $user->billing_post_code); 

                return $this->redirect(['controller' => 'checkout', 'action' => 'payment']);

            }

        }

        // Get the cart of the user
        $cart = $this->request->session()->read('Cart');
        $this->set(compact('cart', 'user'));

    }

    public function payment() {

        $this->loadModel('Orders');
        $this->loadModel('OrderProducts');
        $newOrder = $this->Orders->newEntity($this->request->data);

        if ($this->request->is('post')) {

            // User Details
            $newOrder->first_name = $this->Auth->user('first_name');
            $newOrder->last_name = $this->Auth->user('last_name');
            $newOrder->email = $this->Auth->user('email');
            $newOrder->phone = 0000;
            $newOrder->user_id = $this->Auth->user('id');

            // Save User Billing Details
            $newOrder->billing_address = $this->request->session()->read('Cart.user_billing.address'); 
            $newOrder->billing_suburb = $this->request->session()->read('Cart.user_billing.suburb'); 
            $newOrder->billing_state = $this->request->session()->read('Cart.user_billing.state'); 
            $newOrder->billing_post_code = $this->request->session()->read('Cart.user_billing.post_code'); 

            // Save User Delivery Details
            $newOrder->delivery_address = $this->request->session()->read('Cart.user_delivery.address'); 
            $newOrder->delivery_suburb = $this->request->session()->read('Cart.user_delivery.suburb'); 
            $newOrder->delivery_state = $this->request->session()->read('Cart.user_delivery.state'); 
            $newOrder->delivery_post_code = $this->request->session()->read('Cart.user_delivery.post_code'); 

            // Amount
            $newOrder->subtotal = $this->request->session()->read('Cart.subtotal'); 
            $newOrder->gst = $this->request->session()->read('Cart.gst'); 
            $newOrder->total = $this->request->session()->read('Cart.total'); 

            // Delivery Method Name & Price
            $newOrder->delivery_method_name = $this->request->session()->read('Cart.delivery.name'); 
            $newOrder->delivery_method_price = $this->request->session()->read('Cart.delivery.price'); 

            if ($this->Orders->save($newOrder)) {
                $error = 0;
            } else {
                $error = 1;
            }

            // Now Save Products if the order has been previously saved
            if ($error == 0) { 

                foreach ($this->request->session()->read('Cart.products') as $k => $v) {

                    $newOrderProduct = $this->Orders->newEntity($v);
                    $newOrderProduct->id = '';
                    $newOrderProduct->product_id = $v['id'];
                    $newOrderProduct->order_id = $newOrder['id'];

                    // Save the product in the order products table
                    $this->OrderProducts->save($newOrderProduct);

                }

            }

            if ($error == 0) {
                // The order has been successfuly placed, a redirection needs to be made
                 return $this->redirect(['controller' => 'checkout', 'action' => 'preview_order', $newOrder['id']]);
            }

        }

        // Get the cart of the user
        $cart = $this->request->session()->read('Cart');
        $this->set(compact('cart', 'newOrder'));

    }

    public function preview_order($order_id = null) {

            $this->loadModel('Orders');

            $order = $this->Orders
                ->find()
                ->where([
                    'Orders.id' => $order_id,
                    'Orders.user_id' => $this->Auth->user('id')
                ])
                ->first();

            if (is_null($order)) {
                // redirect to the home page
                return $this->redirect(['controller' => 'pages', 'action' => 'home']);
            } else {
                $this->set(compact('order'));
            }

        // Now we can get the order from the id, it needs to be the order of the customer


    }

}