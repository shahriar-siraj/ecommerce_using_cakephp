<?php
namespace App\Model\Table;

use ArrayObject;
use Cake\Event\Event;
use Cake\ORM\Entity;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class BlogArticlesCommentsTable extends Table
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
        $this->table('blog_articles_comments');
        $this->displayField('comment');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('CounterCache', [
            'BlogArticles' => ['comment_count']
        ]);

        $this->belongsTo('BlogArticles', [
            'foreignKey' => 'article_id',
        ]);
    }

    /**
     * Create validation rules.
     *
     * @param \Cake\Validation\Validator $validator Instance of the validator.
     *
     * @return \Cake\Validation\Validator
     */
    public function validationCreate(Validator $validator)
    {
        $validator
            ->notEmpty('content')
            ->notEmpty('full_name')
            ->notEmpty('email');

        return $validator;
    }
}
