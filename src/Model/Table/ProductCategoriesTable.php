<?php
namespace App\Model\Table;
use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class ForumCategoriesTable extends Table
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
        $this->table('product_categories');
        $this->displayField('title');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->addBehavior('Tree');
        $this->belongsTo('ParentProductCategories', [
            'className' => 'ProductCategories',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('ChildProductCategories', [
            'className' => 'ProductCategories',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('Products', [
            'foreignKey' => 'category_id'
        ]);
    }
    /**
     * Create validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     *
     * @return \Cake\Validation\Validator
     */
    public function validationCreate(Validator $validator)
    {
        $validator
            ->notEmpty('title', __('You must set a title for the category.'))
            ->add('title', [
                'lengthBetween' => [
                    'rule' => ['lengthBetween', 3, 100],
                    'message' => __("The title must be between {0} and {1} characters.", 3, 100)
                ]
            ]);
        return $validator;
    }
}