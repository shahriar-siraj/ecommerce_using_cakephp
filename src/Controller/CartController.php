<?php
namespace App\Controller;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\Network\Exception\NotFoundException;
use Cake\I18n\Number;
use Cake\Log\Log;

class CartController extends AppController
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
        $this->Auth->allow(['index', 'notify', 'test', 'add_cart']);
    }

    public function index() {

        // EZYPAY REQUEST EXAMPLE
        //$url = 'https://api.ezypay.com/api/v1/customers/11111111-1111-1111-1111-1111';
        //$ch = curl_init($url);                                                                      
        //curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                                                                                     
        //curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);             
        //curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        //curl_setopt($ch, CURLOPT_USERPWD, "aZj1zkAivrnZiiWpiM71O3hBUAAN6S:a");
        //curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
        //'Content-Type: application/json',  
        //'Accept: application/json', 
        //'Content-Length: ' . strlen($data))                                                                       
        //);

        // Get the cart of the user
        $cart = $this->request->session()->read('Cart');
        $this->loadModel('Shops');

        foreach ($cart['stores'] as $k => $v):
            // We need to find the delivery methods of the store
            $shop = $this->Shops
            ->find()
            ->where([
                'Shops.id' => $v['store_id']
            ])
            ->first();
            if (!is_null($shop)) {

                $cart['stores'][$k]['delivery_methods'][0]['name'] = 'Select a shipping method...';
                $cart['stores'][$k]['delivery_methods'][0]['value'] = '';

                // Weight, Order Price
                if ($shop['order_greater_activated'] == 1 && $shop['order_greater_value'] >= $cart['total']) {
                    $cart['stores'][$k]['delivery_methods'][1]['name'] = 'Free Delivery';
                    $cart['stores'][$k]['delivery_methods'][1]['value'] = 0.00;
                } else if ($shop['order_greater_weight_activated'] == 1 && $shop['order_greater_weight_value'] >= $cart['weight']) {
                    $cart['stores'][$k]['delivery_methods'][1]['name'] = 'Free Delivery';
                    $cart['stores'][$k]['delivery_methods'][1]['value'] = 0.00;
                } else {
                    if ($shop['flat_rate_activated'] == 1) {
                        $cart['stores'][$k]['delivery_methods'][1]['name'] = 'Flat Rate';
                        $cart['stores'][$k]['delivery_methods'][1]['value'] = $shop['flat_rate_value'];
                    }
                    if ($shop['pickup_activated'] == 1) {
                        $cart['stores'][$k]['delivery_methods'][2]['name'] = 'Pickup';
                        $cart['stores'][$k]['delivery_methods'][2]['value'] = 0.00;
                    }
                }
            }
        endforeach;

        $this->set(compact('cart'));

    }

    public function add_cart($product_id) {

        if (!$this->request->is('ajax')) {
            throw new NotFoundException();
        }

        $json = [];

        $this->loadModel('Products');
        $this->loadModel('Shops');

        $product = $this->Products
        ->find()
        ->where([
            'Products.id' => $product_id
        ])
        ->first();

        if (!is_null($product)) {

            // Create session for carts
            $session = $this->request->session();

            /////////////////////////////////////////////////////////////////////
            /////////////////////////// PRODUCTS ////////////////////////////////
            /////////////////////////////////////////////////////////////////////

            $session->write('Cart.products.' . $product_id . '.id', $product_id); 
            // Calculate the price based on the qty 
            $price = $product->price; 
            // QTY
            $qty_to_be_read = $this->request->session()->read('Cart.products.' . $product_id . '.qty'); 
            if (isset($qty_to_be_read)) {
               $qty = $this->request->data['qty'] + $qty_to_be_read;
            } else {
               $qty = $this->request->data['qty'];
            }

            $session->write('Cart.products.' . $product_id . '.qty', $qty); 
            $price = number_format((float)$price * $qty, 2, '.', '');
            $session->write('Cart.products.' . $product_id . '.name', $product->name); 
            $session->write('Cart.products.' . $product_id . '.content', $product->content); 
            $session->write('Cart.products.' . $product_id . '.hero', $product->hero); 
            $session->write('Cart.products.' . $product_id . '.price', $price); 
            $session->write('Cart.products.' . $product_id . '.merchant_id', $product->merchant_id); 
            $session->write('Cart.products.' . $product_id . '.store_id', $product->shop_id); 
            $session->write('Cart.products.' . $product_id . '.weight', $product->weight); 
            $cart = $this->request->session()->read('Cart.products');
            /////////////////////////////////////////////////////////////////////
            /////////////////////////// Stores //////////////////////////////////
            /////////////////////////////////////////////////////////////////////
            $shop = $this->Shops
            ->find()
            ->where([
                'Shops.id' => $product->shop_id
            ])
            ->first();
            // The product needs to be linked to a store anyway
            $session->write('Cart.stores.' . $product->shop_id . '.store_id', $product->shop_id); 
            $session->write('Cart.stores.' . $product->shop_id . '.store_name', $shop->name); 
            $stores = $this->request->session()->read('Cart.stores');
            // Calcul the subtotal, gst, total
            $subtotal_store = '';
            $gst_store = '';
            $total_store = '';
            foreach ($cart as $k => $v) {
                // Need to loop each store to see if the shop match the shop cart product
                foreach ($stores as $k_store => $v_store) { 
                    if($v['store_id'] == $v_store['store_id']) {
                        $subtotal_store += $v['price'];
                        $gst_store = number_format((float)0.10 * $subtotal_store, 2, '.', '');
                        $delivery_store = '';
                        $total_store = number_format((float)$subtotal_store + $gst_store + $delivery_store, 2, '.', '');
                        // SUBTOTAL
                        $session->write('Cart.stores.' . $product->shop_id . '.subtotal', $subtotal_store); 
                        // GST
                        $session->write('Cart.stores.' . $product->shop_id . '.gst', $gst_store); 
                        // TOTAL
                        $session->write('Cart.stores.' . $product->shop_id . '.total', $total_store); 
                        // Delivery Method Name and Price
                        $session->write('Cart.stores.' . $product->shop_id . '.delivery_method_name', ''); 
                        $session->write('Cart.stores.' . $product->shop_id . '.delivery_method_price', ''); 
                    }
                }
            }

            $subtotal = '';
            $weight = '';
            $delivery = $this->request->session()->read('Cart.delivery.name');
            // Loop to concenate the subtotal value
            foreach ($cart as $k => $v) {
                $subtotal += $v['price'];
                $weight +=  $v['weight'];
            }

            // Subtotal
            $session->write('Cart.subtotal', $subtotal); 

            // Taxes and Delivery
            if (empty($delivery)) {
                $delivery = 0;
            }

            $subtotal = number_format((float)$subtotal, 2, '.', '');

            // GST
            $gst = number_format((float)0.10 * $subtotal, 2, '.', '');
            $session->write('Cart.gst', $gst); 

            // Total
            $session->write('Cart.total', number_format((float)$subtotal + $gst + $delivery, 2, '.', '')); 

            // Total Weight
            $session->write('Cart.weight', number_format((float)$weight, 2, '.', '')); 

            $json['message'] = "Product added to the cart!";
            $json['error'] = false;
            $json['order'] = $this->request->session()->read('Cart');
            $this->set(compact('json'));

        } else {

            $json['message'] = "This product doesn't exist";
            $json['error'] = true;
            $this->set(compact('json'));

        }

        //Send response in JSON.
        $this->set('_serialize', 'json');

    }

    public function remove_cart($product_id) {

        if (!$this->request->is('ajax')) {
            throw new NotFoundException();
        }

        $json = [];

        $this->loadModel('Products');

        $product = $this->Products
        ->find()
        ->where([
            'Products.id' => $product_id
        ])
        ->first();

        if (!is_null($product)) {

            // Remove session for this product
            $session = $this->request->session();
            //$session->delete('Cart'); 
            $session->delete('Cart.products.' . $product_id); 

            $cart = $this->request->session()->read('Cart.products');

            // First we need to check if there is still at least one product of the merchant
            // Then if it's the case we don't need to remove the merchant otherwise remove it
            $contain = 0;
            foreach ($cart as $k => $v) {
                if ($v['store_id'] == $product['shop_id']) {
                    $contain++;
                }
            }

            if ($contain == 0) { 
                $session->delete('Cart.stores.' . $product['shop_id']); 
            }

            $subtotal = '';
            $delivery = $this->request->session()->read('Cart.delivery.name');
            // Loop to concenate the subtotal value
            foreach ($cart as $k => $v) {
                $subtotal += $v['price'];
            }

            // Subtotal
            $session->write('Cart.subtotal', $subtotal); 

            // Taxes and Delivery
            if (empty($delivery)) {
                $delivery = 0;
            }

            $subtotal = number_format((float)$subtotal, 2, '.', '');

            // GST
            $gst = number_format((float)0.10 * $subtotal, 2, '.', '');
            $session->write('Cart.gst', $gst); 

            // Total
            $session->write('Cart.total', number_format((float)$subtotal + $gst + $delivery, 2, '.', '')); 

            $json['message'] = "Product removed to the cart!";
            $json['cart'] = $this->request->session()->read('Cart');
            $json['error'] = false;
            $this->set(compact('json'));

        } else {

            $json['message'] = "This product doesn't exist";
            $json['error'] = true;
            $this->set(compact('json'));

        }

        //Send response in JSON.
        $this->set('_serialize', 'json');

    }

    public function update_cart($product_id) {

        if (!$this->request->is('ajax')) {
            throw new NotFoundException();
        }

        // QTY
        $qty = $this->request->data['qty'];
        $json = [];

        $this->loadModel('Products');

        $product = $this->Products
        ->find()
        ->where([
            'Products.id' => $product_id
        ])
        ->first();

        if (!is_null($product)) {

            // Create session for carts
            $session = $this->request->session();
            $session->write('Cart.products.' . $product_id . '.id', $product_id); 
            $session->write('Cart.products.' . $product_id . '.qty', $qty); 
            $price = $product->price; 
            $qty = $this->request->session()->read('Cart.products.' . $product_id . '.qty'); 
            $price = number_format((float)$price * $qty, 2, '.', '');

            $session->write('Cart.products.' . $product_id . '.name', $product->name); 
            $session->write('Cart.products.' . $product_id . '.content', $product->content); 
            $session->write('Cart.products.' . $product_id . '.hero', $product->hero); 
            $session->write('Cart.products.' . $product_id . '.price', $price); 
            // Merchant
            $session->write('Cart.products.' . $product_id . '.merchant_id', $product->merchant_id); 
            $session->write('Cart.products.' . $product_id . '.store_id', $product->store_id); 

            $cart = $this->request->session()->read('Cart.products');
            $subtotal = '';
            // Loop to concenate the subtotal value
            foreach ($cart as $k => $v) {
                $subtotal += $v['price'];
            }

            // Subtotal
            $session->write('Cart.subtotal', $subtotal); 

            $subtotal = number_format((float)$subtotal, 2, '.', '');

            // GST
            $gst = number_format((float)0.10 * $subtotal, 2, '.', '');
            $session->write('Cart.gst', $gst); 

            // Total
            $session->write('Cart.total', number_format((float)$subtotal + $gst + $delivery, 2, '.', '')); 

            $json['message'] = "Qty of this product updated!";
            $json['cart'] = $this->request->session()->read('Cart');
            $json['error'] = false;
            $this->set(compact('json'));

        } else {
            $json['message'] = "This product doesn't exist";
            $json['error'] = true;
            $this->set(compact('json'));
        }

        //Send response in JSON.
        $this->set('_serialize', 'json');

    }

    public function choose_delivery() {

        if (!$this->request->is('ajax')) {
            throw new NotFoundException();
        }

        $session = $this->request->session();
        $json = [];

        // Delivery and store variables
        $store_id = $this->request->data['store_id'];
        $delivery_name = $this->request->data['delivery_name'];
        $delivery_price = $this->request->data['delivery_price'];

        // Need to write the delivery name and price for the store
        $session->write('Cart.stores.' . $store_id . '.delivery_method_name', $delivery_name); 
        $session->write('Cart.stores.' . $store_id . '.delivery_method_price', number_format((float)$delivery_price, 2, '.', '')); 

        $cart = $this->request->session()->read('Cart.products');
        $stores = $this->request->session()->read('Cart.stores');
        $subtotal = '';
        $delivery = '';
        // Loop to concenate the subtotal value
        foreach ($cart as $k => $v) {
            $subtotal += $v['price'];
        }

        $subtotal = number_format((float)$subtotal, 2, '.', '');

        // Calcul the delivery price for each store
        foreach ($stores as $k_store => $v_store) {
            $delivery += number_format((float)$v_store['delivery_price'], 2, '.', '');
        }

        $delivery = number_format((float)$delivery, 2, '.', '');

        // GST
        $gst = number_format((float)0.10 * $subtotal, 2, '.', '');
        $session->write('Cart.gst', $gst); 

        // Total
        $session->write('Cart.total', number_format((float)$subtotal + $gst + $delivery, 2, '.', '')); 

        $json['cart'] = $this->request->session()->read('Cart');
        $json['error'] = true;
        $this->set(compact('json'));

         //Send response in JSON.
        $this->set('_serialize', 'json');


    }

    /**
     * Paypal has sent a notification.
     *
     * @return void
     *
     * @throws \Cake\Network\Exception\NotFoundException
     */
    public function notify()
    {

         Log::error(('Notify Url'), 'paypal');

        $this->loadComponent('Paypal');

        $response = $this->Paypal->notify();

        if ($response === false) {
            throw new NotFoundException();
        }

    }

    public function test() {


        $this->loadComponent('Paypal');

        $response = $this->Paypal->_saveOrder();

        echo "<pre>";
        print_r($response);
        echo "</pre>";
        
        echo $response;
        die();

    }

    public function pay_order() {

        // if get = paypal or .... 

        $cart = $this->request->session()->read('Cart');
        $this->loadComponent('Transaction');

        // Need to get the price and the needed variables
        $price = Number::format($this->request->session()->read('Cart.total'), ['locale' => 'au_AU']);
        $tax = Number::format(0.00, ['locale' => 'au_AU']);
        $discountPercentage = null;

        $custom = [
            'user_id' => $this->request->session()->read('Auth.User.id'),
            'order_id' => ''
        ];

        $paypalUrl = $this->Transaction->getPaypalUrl(
            $price,
            $tax,
            'Payment Order',
            http_build_query($custom),
            $discountPercentage
        );

        if (!$paypalUrl) {
            $this->Flash->error("Unable to get the Paypal URL, please contact an administrator or try again later.");
            return $this->redirect(['controller' => 'checkout', 'action' => 'payment']);
        }

        $this->redirect($paypalUrl);

    }

     /**
     * A payment has been done.
     *
     * @return void
     */
    public function success()
    {
        
        // Redirect to the Thank You page ?

    }

}