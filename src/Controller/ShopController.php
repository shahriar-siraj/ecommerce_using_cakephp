<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\I18n\Number;
use Cake\Network\Exception\NotFoundException;
use Intervention\Image\ImageManager;

class ShopController extends AppController
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
        $this->Auth->allow(['index', 'view', 'products']);
    }

    public function index($shop_id = null) {

        $this->loadModel('Shops');
        $user_id = $this->Auth->user('id');

        if ($shop_id == null) {

            
            // Store View
            $shop = $this->Shops
            ->find()
            ->where([
                'Shops.user_id' => $user_id
            ])
            ->first();

        } else {

            // Store View
            $shop = $this->Shops
            ->find()
            ->where([
                'Shops.id' => $shop_id
            ])
            ->first();

        }

        if (is_null($shop)) {
            // It means that my shop doesn't exist yet
            return $this->redirect(['controller' => 'shop', 'action' => 'edit']);
        } else {
            $this->set(compact('shop', 'user_id'));
        }

    }

    public function edit() { 

        $this->loadModel('Shops');

        // Edit or add a store if the store doesn't exist yet 
        $shop = $this->Shops
        ->find()
        ->where([
            'Shops.user_id' => $this->Auth->user('id')
        ])
        ->first();

        if (is_null($shop)) {
            // The shop doesn't exist yet
            $shop = $this->Shops->newEntity($this->request->data);
            $shop->user_id = $this->Auth->user('id');
        } else {
            // The shop exist
            $this->Shops->patchEntity($shop, $this->request->data());
        }


        if ($this->request->is(['patch', 'post', 'put'])) {

            // Shop Image
            if ((isset($_FILES["shop_file"]['name'])) && $_FILES["shop_file"]["name"] != '') { 

                $manager = new ImageManager();
                $file = $_FILES["shop_file"];
                $random = rand(1,99999);
                $filename = $random . $_FILES["shop_file"]["name"];

                // Thumbnail
                $directory_thumbnail = 'img/shops_images/thumbnail-' . $filename;
                $path_thumbnail = $_SERVER['DOCUMENT_ROOT'] . '/webroot/' . $directory_thumbnail;
                $manager->make($_FILES["shop_file"]["tmp_name"])->fit(240)->resize(240, 167)->save($path_thumbnail);
                // Large
                $directory_large = 'img/shops_images/large-' . $filename;
                $path_large = $_SERVER['DOCUMENT_ROOT'] . '/webroot/' . $directory_large;
                $manager->make($_FILES["shop_file"]["tmp_name"])->fit(767)->resize(767, 329)->save($path_large);
                // Original
                $directory = 'img/shops_images/original-' . $filename;
                $path = $_SERVER['DOCUMENT_ROOT'] . '/webroot/' . $directory;
                $manager->make($_FILES["shop_file"]["tmp_name"])->save($path);

                $shop->picture = $filename;

            }

            if ($this->Shops->save($shop)) {
                $this->Flash->success("Your information has been updated !");
            }

        }

        $options = array('9am' => '9am', '10am' => '10am', '11am' => '11am', '12pm' => '12pm', '1pm' => '1pm', '2pm' => '2pm', '3pm' => '3pm', '4pm' => '4pm', '5pm' => '5pm');
        $options_choices = array('0' => 'No', '1' => 'Yes');
        $options_states = array('New South Wales', 'Victoria', 'Queensland', 'Western Australia', 'South Australia', 'Australian Capital Territory', 'Tasmania');

        $this->set(compact('shop', 'options', 'options_choices', 'options_states'));

    }

    public function products($shop_id = null) {
        
        // Store
        $this->loadModel('Shops');

        $shop = $this->Shops
        ->find()
        ->where([
            'Shops.id' => $shop_id
        ])
        ->first();

        // Associated Products
        $this->loadModel('Products');

        $this->paginate = [
            'limit' => 15,
            'order' => [
                'Products.name' => 'asc'
            ]
        ];

        $products = $this->paginate($this->Products->find()->where(['Products.shop_id' => $shop_id]));

        if (is_null($shop)) {
            // It means that my shop doesn't exist yet
            return $this->redirect(['controller' => 'shop', 'action' => 'edit']);
        } else {
            $this->set(compact('shop', 'products', 'user_id'));
        }

    }

    public function add_product() {

        // Products
        $this->loadModel('Products');

        $product = $this->Products->newEntity($this->request->data, ['validate' => 'create']);
        $product->merchant_id = $this->Auth->user('id');

        if ($this->request->is('post')) {
            if ($this->Products->save($product)) {
                $this->Flash->success("Your product has been added!");
            }
        }

        $this->set(compact('product'));

    }

    public function edit_product($product_id = null) {

        // Products
        $this->loadModel('Products');

        $shop = $this->Products
        ->find()
        ->where([
            'Products.id' => $product_id,
            'Products.user_id' => $this->Auth->user('id')
        ])
        ->first();

        $this->Products->patchEntity($product, $this->request->data());

        if ($this->request->is('put')) {
            if ($this->Products->save($product)) {
                $this->Flash->success("Your product has been updated!");
            }
        }

    }

}
