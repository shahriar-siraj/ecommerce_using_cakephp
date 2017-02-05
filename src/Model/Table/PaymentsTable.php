<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class PaymentsTable extends Table
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
        $this->table('payments');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Xety/Cake3Upload.Upload', [
            'fields' => [
                'hero' => [
                    'path' => 'upload/blog/hero/:id/:md5',
                    'overwrite' => true,
                    'prefix' => '../',
                    'defaultFile' => 'hero.jpg'
                ],
                'landscape' => [
                    'path' => 'upload/blog/landscape/:id/:md5',
                    'overwrite' => true,
                    'prefix' => '../',
                    'defaultFile' => 'landscape.jpg'
                ]
            ]
        ]);

        $this->addBehavior('Xety/Cake3Sluggable.Sluggable');

        $this->belongsTo('BlogCategories', [
            'foreignKey' => 'category_id',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasOne('BlogAttachments', [
            'foreignKey' => 'article_id',
            'dependent' => true,
            'cascadeCallbacks' => true
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Instance of the validator.
     *
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty("You must select a category.")
            ->add('category_id', 'numeric', [
                'rule' => 'numeric'
            ])
            ->notEmpty("The title is required.")
            ->add('title', [
                'unique' => [
                    'rule' => 'validateUnique',
                    'provider' => 'table',
                    'message' => "This title is already used."
                ],
                'minLength' => [
                    'rule' => ['minLength', 5],
                    'message' => "Please, 5 characters minimum for the title."
                ]
            ])
            ->notEmpty('content', "The content is required.")
            ->add('content', 'minLength', [
                'rule' => ['minLength', 15],
                'message' => "Please, 15 characters minimum for the content."
            ])
            ->notEmpty('is_display')
            ->add('is_display', 'inList', [
                'rule' => ['inList', [0, 1]],
                'message' => "Incorrect value, please do not attempt to modify the HTML, little hacker. ;)"
            ]);

        return $validator;
    }
}
