<?php
namespace App\Controller;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\I18n\Time;
class SearchController extends AppController
{
    /**
     * Initialize handle.
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
    }

    public $components = [
        'RequestHandler'
    ];

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
        $this->Auth->allow(['index', 'quick', 'advanced', 'input', 'products', 'shop', 'typeahead']);
    }

    public function index() {

    }

    public function advanced() {


        if (!empty($this->request->data['advanced_search'])) {

            $searched_inputs = $this->request->data['advanced_search'];
            // Remove the previous advanced search session
            $this->request->session()->delete('Search.Advanced');

            if (!empty($searched_inputs)) { 
                foreach ($searched_inputs as $input => $v) {
                    if ($v['value'] != '') { 
                        $this->request->session()->write('Search.Advanced.' . $input . '.value', $v['value']);
                    }
                }
            }

            return $this->redirect(['controller' => 'search', 'action' => 'shop']);

        } else {
            if ($this->request->session()->read('Search.Advanced')) {
                $searched_inputs = $this->request->session()->read('Search.Advanced');
            } else {
                $searched_inputs = '';
            }
        }

        // Generate a Random Number
        $random =  mt_rand(5, 99999999);
        $this->set(compact('random', 'searched_inputs'));

    }

    public function shop() {

        // Make a query to get the best prices by shop
        $searched_inputs = $this->request->session()->read('Search.Advanced');

        //echo "<pre>";
        //print_r($searched_inputs);
        //echo "</pre>";
        //die();

        foreach ($searched_inputs as $input => $v) {
            echo $v['value'];
            // Now we need to loop into each store to see if they have got the product or not.

        }

        $this->loadModel('Shops');
        $this->loadModel('Products');

        $this->paginate = [
            'limit' => 15,
            'order' => [
                'Shops.name' => 'asc'
            ]
        ];

        $shops = $this->paginate($this->Shops->find()->contain(['Products']));

        // Need to find if the shop has the products that the user search, at least one product
        // First loop into each shop 

        foreach ($shops as $k => $v) {
           //$shops[$k]['matched_products'] = 0;
           foreach ($searched_inputs as $input_key => $input_v) {
               foreach ($v['products'] as $product_key => $product_value) {
                    //$shops[$k]['matched_products'] += 1; 
               }
            }
        }

        $this->set(compact('shops'));


    }

    public function input() {

         $this->viewBuilder()->layout(false);
         // Generate a Random Number
         $random =  mt_rand(5, 99999999);
         $this->set(compact('random'));

    }


    /**
     * Display all Products based on the search.
     *
     * @return void
     */
    public function quick()
    {
        
        $this->loadModel('Products');

        //Keyword to search. (For pagination)
        if (!empty($this->request->data['search'])) {
            $keyword = $this->request->data['search'];
            $this->request->session()->write('Search.Quick.Products.Keyword', $keyword);
        } else {
            if ($this->request->session()->read('Search.Quick.Products.Keyword')) {
                $keyword = $this->request->session()->read('Search.Quick.Products.Keyword');
            } else {
                $keyword = '';
            }
        }

        $this->paginate = [
            'limit' => 15,
            'conditions' => [
                'Products.name LIKE' => "%$keyword%"
            ],
            'order' => [
                'Products.name' => 'asc'
            ]
        ];

        $products = $this->paginate($this->Products->find());

        $this->set(compact('products', 'keyword'));

    }

    public function typeahead()
    {
        
        $this->loadModel('Products');
        $keyword = strtolower($this->request->data['q']);
        $products = $this->Products
            ->find()
            ->where(function ($q) use ($keyword) {
                return $q
                ->like('LOWER(Products.name)', "%$keyword%");
            })
            ->limit(5)
            ->toArray();
        
        $json['status'] = true;
        $json['error'] = null;
        
        foreach ($products as $product) {
            $json['data'][] = h($product->name);
        }
                
        $this->set(compact('json'));
        $this->set('_serialize', 'json');
        
    }
}