<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\Core\Configure;
use Cake\I18n\Time;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
use HTMLPurifier;
use HTMLPurifier_Config;

class BlogArticle extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true
    ];

    /**
     * Get the full name of the user. If empty, return the username.
     *
     * @return string
     */
    protected function _getNbrOfComments()
    {

          $BlogArticlesComments = TableRegistry::get('BlogArticlesComments');
          $count_validated_comments = $BlogArticlesComments->find('all')->where(['article_id' => $this->id, 'approved' => 1])->count();

        return (!empty($count_validated_comments)) ? $count_validated_comments : 0;
    }

}
