<?php
namespace App\View\Cell;

use Cake\Core\Configure;
use Cake\View\Cell;

class ShopCell extends Cell
{

    /**
     * Display 4 random products from the category id and different as the current product.
     *
     * @return \Cake\Network\Response
     */
    public function random_products()
    {
        $this->loadModel('Products');

        $products = $this->Products
            ->find()
            ->where([
                'Products.category_id' => $id
            ])
            ->order(['Products.created' => 'DESC'])
            ->limit(4)
            ->toArray();

        $this->set(compact('products'));
    }

}
