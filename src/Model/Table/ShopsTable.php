<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ShopsTable extends Table
{

    /**
     * Initialize method.
     *
     * @param array $config The configuration for the Table.
     *
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('shops');
        $this->displayField('email');

        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Products', [
            'foreignKey' => 'shop_id'
        ]);

        $this->hasMany('Orders', [
            'foreignKey' => 'shop_id'
        ]);

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);

    }

}
