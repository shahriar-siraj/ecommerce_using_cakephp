<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class HomePageTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     *
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('home_page');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Xety/Cake3Upload.Upload', [
            'fields' => [
                'slideshow_image' => [
                    'path' => 'upload/home/:id/:md5',
                    'overwrite' => true,
                    'prefix' => '/',
                    'defaultFile' => ''
                ]
            ]
        ]);
    }

}
