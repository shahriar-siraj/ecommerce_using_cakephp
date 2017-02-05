<?php
namespace App\View\Cell;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\View\Cell;
use Cake\View\Helper\PaginatorHelper;

class ShopCell extends Cell
{

    /**
     * Display 4 random products from the category id and different as the current product.
     *
     * @return \Cake\Network\Response
     */
    public function random_products($product_id, $category_id)
    {

        // Load the Models
        $this->loadModel('Products');
        $this->loadModel('ProductCategories');

        // Get 4 products from the current category except the current product
        $products = $this->Products
        ->find()
        ->where([
            'Products.category_id' => $category_id,
            'Products.id !=' => $product_id
        ])
        ->order('rand()')
        ->limit(4)
        ->toArray();

        $category = $this->ProductCategories
        ->find()
        ->where([
            'ProductCategories.id' => $category_id
        ])
        ->select(['title'])
        ->first();

        $this->set(compact('products', 'category'));

    }

}
