<?php
namespace App\Model\Table;

use ArrayObject;
use Cake\Event\Event;
use Cake\ORM\Entity;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ProjectImagesTable extends Table
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
        $this->table('project_images');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->addBehavior('Xety/Cake3Upload.Upload', [
            'fields' => [
                'picture' => [
                    'path' => 'upload/projects/:id/:md5',
                    'overwrite' => true,
                    'prefix' => '../',
                    'defaultFile' => ''
                ]
            ]
        ]);

        $this->belongsTo('Projects', [
            'foreignKey' => 'project_id',
        ]);
    }
}
