<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class AboutPageTable extends Table
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
        $this->table('about_page');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Xety/Cake3Upload.Upload', [
            'fields' => [
                'hero' => [
                    'path' => 'upload/about/:id/:md5',
                    'overwrite' => true,
                    'prefix' => '/',
                    'defaultFile' => ''
                ]
            ]
        ]);

    }

}
