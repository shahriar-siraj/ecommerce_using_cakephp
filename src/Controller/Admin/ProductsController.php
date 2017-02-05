<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\I18n\I18n;
use Cake\Routing\Router;
use Cake\Core\Configure;
use Cake\Event\Event;
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
     * Display all products.
     *
     * @return void
     */
    public function index()
    {

        $this->loadModel('Products');

        $products = $this->Products
            ->find()
            ->contain([
                'Users',
                'Shops'
            ])
            ->order([
                'Products.created' => 'desc'
            ]);

        $products = $products->toArray();

        $this->set(compact('products'));

    }

    /**
     * Add a product.
     *
     * @return \Cake\Network\Response|void
     */
    public function add()
    {
        $this->loadModel('Products');
        $this->loadModel('Users');

        $product = $this->Products->newEntity($this->request->data);

        if ($this->request->is('post')) {

            if ($this->Products->save($product)) {
                $this->Flash->success('This product has been created successfully !');
                return $this->redirect(['action' => 'index']);
            }
        }

        $merchants = $this->Users->find('list')->where(['Users.group_id' => 3]);

        $this->set(compact('product', 'merchants'));

    }

    /**
     * Edit a Product.
     *
     * @return \Cake\Network\Response|void
     */
    public function edit()
    {
        $this->loadModel('Products');

        $product = $this->Products
            ->find('all')
            ->where([
                'Products.id' => $this->request->id
            ])
            ->first();

        //Check if the product is found.
        if (empty($product)) {
            $this->Flash->error('This product doesn\'t exist or has been deleted.');
            return $this->redirect(['action' => 'index']);
        }

        if ($this->request->is('put')) {
            $this->Products->patchEntity($product, $this->request->data());
            if ($this->Products->save($product)) {
                $this->Flash->success('This product has been updated successfully !');
                return $this->redirect(['action' => 'index']);
            }
        }

        // The product has to be linked to a store

        //$categories = $this->Products->BlogCategories->find('list');
        $this->set(compact('product'));
    }

    /**
     * Delete a Product.
     *
     * @return \Cake\Network\Response
     */
    public function delete()
    {

        $this->loadModel('Products');

        $product = $this->Products
            ->find('all')
            ->where([
                'Products.id' => $this->request->id
            ])
            ->first();

        //Check if the product is found.
        if (empty($product)) {
            $this->Flash->error('This product doesn\'t exist or has been deleted.');
            return $this->redirect(['action' => 'index']);
        }

        if ($this->Products->delete($product)) {
            $this->Flash->success('This product has been deleted successfully !');
            return $this->redirect(['action' => 'index']);
        }

        $this->Flash->error('Unable to delete this product.');

        return $this->redirect(['action' => 'index']);

    }

    public function uploadImages() {

        $this->loadModel('ProductImages');

        $unique_id = $_GET['slug'];
        $upload_folder = '/products/';

        // Main Directory
        $upload_dir = '/webroot/upload' . $upload_folder;

        // Then... We need to parse the id or the slug
        $upload_dir = $upload_dir . $unique_id;

        $targetPath = $_SERVER['DOCUMENT_ROOT'] . $upload_dir . DIRECTORY_SEPARATOR;

        // If the directory doesn't exist, create it
        if (!file_exists($targetPath)) { 
            mkdir($targetPath, 0755, true); 
        }

        if (!empty($_FILES)) {
             $tempFile = $_FILES['file']['tmp_name'];
             // Adding timestamp with image's name so that files with same name can be uploaded easily.
             $file_name = time().'-'. $_FILES['file']['name'];
             $mainFile = $targetPath.$file_name;
             move_uploaded_file($tempFile,$mainFile);
             $this->request->data['product_id'] = $_GET['product_id'];
             $this->request->data['picture'] = 'upload' . $upload_folder . $unique_id . '/' . $file_name;
             $this->request->data['unique_id'] = $unique_id;
             $image = $this->ProductImages->newEntity($this->request->data);
             $this->ProductImages->save($image);
        }

        die();

    }

    public function getImages() {

        $unique_id = $_GET['unique_id'];
        $upload_folder = '/products/';
        $storeFolder = '/webroot/upload' . $upload_folder;  
        $storeFolder = $storeFolder . $unique_id;

        $files = preg_grep('~\.(jpeg|jpg|png|gif)$~', scandir($_SERVER['DOCUMENT_ROOT'] . $storeFolder));

        // If the directory doesn't exist, create it
        if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $storeFolder)) { 
            mkdir($_SERVER['DOCUMENT_ROOT'] . $storeFolder, 0755, true); 
        }

        foreach($files as $file){ //get an array which has the names of all the files and loop through it 
            $obj['name'] = $file; //get the filename in array
            $obj['size'] = filesize($_SERVER['DOCUMENT_ROOT'] . $storeFolder. '/' . $file); //get the flesize in array
            $obj['url'] = Router::url('/upload', true) . $upload_folder . $unique_id . '/' . $file; 
            $result[] = $obj; // copy it to another array
        }

        $this->set(compact('result'));
        $this->set('_serialize', ['result']);

    }

    public function deleteImage() {

        if (!$this->request->is('ajax')) {
            throw new NotFoundException();
        }

        $this->loadModel('ProductImages');

        $json = [];
        $json['file'] = $_POST['id'];
        $upload_folder = '/products/';
        $json['storeFolder'] = '/webroot/upload' . $upload_folder . $_POST['unique_id'];
        $filepath = $_SERVER['DOCUMENT_ROOT'] . $json['storeFolder']. '/' . $json['file'];
        $json['filepath'] = $filepath;

        // Remove the image if exist
        if (is_file($filepath)) { 
            unlink($filepath);
             $image = $this->ProductImages
            ->find()
            ->where([
                'ProductImages.portfolio_id' => $_GET['portfolio_id'],
                'ProductImages.unique_id'    => $_POST['unique_id']
            ])
            ->first();
            $this->ProductImages->delete($image);
        }

        $this->set(compact('json'));
        $this->set('_serialize', 'json');
    }

}
