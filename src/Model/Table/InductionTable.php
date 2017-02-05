<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
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
        $this->table('inductions');
        $this->displayField('email');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
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
            ->notEmpty('first_name', 'You must specify your first name.')
            ->notEmpty('last_name', 'You must specify your last name.')
            ->notEmpty('email')
            ->add('email', [
                'unique' => [
                    'rule' => 'validateUnique',
                    'provider' => 'table',
                    'message' => 'This E-mail is already used.'
                ],
                'email' => [
                    'rule' => 'email',
                    'message' => 'You must specify a valid E-mail address.'
                ]
            ]);

        return $validator;
    }
}
