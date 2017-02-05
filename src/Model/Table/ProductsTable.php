<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ProductsTable extends Table
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
        $this->table('products');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Xety/Cake3Upload.Upload', [
            'fields' => [
                'hero' => [
                    'path' => 'upload/product/hero/:id/:md5',
                    'overwrite' => true,
                    'prefix' => '/',
                    'defaultFile' => 'hero.jpg'
                ]
            ]
        ]);

        $this->addBehavior('Xety/Cake3Sluggable.Sluggable');

        $this->hasMany('ProductImages', [
            'foreignKey' => 'project_id',
            'dependent' => true
        ]);

        $this->belongsTo('Users', [
            'foreignKey' => 'merchant_id'
        ]);

        $this->belongsTo('Shops', [
            'foreignKey' => 'shop_id'
        ]);

    }

    /**
     * Create validation rules.
     *
     * @param \Cake\Validation\Validator $validator The Validator instance.
     *
     * @return \Cake\Validation\Validator
     */
    public function validationCreate(Validator $validator)
    {
        $validator
            ->notEmpty('name', "You must specify the name of the product.")
            ->notEmpty('description', "You must specify the description.");

        return $validator;
    }
}
