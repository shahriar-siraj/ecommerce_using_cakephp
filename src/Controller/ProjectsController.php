<?php
namespace App\Controller;
use App\Event\Badges;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Routing\Router;
class ProjectsController extends AppController
{
    /**
     * Components.
     *
     * @var array
     */
    public $components = [
        'RequestHandler'
    ];
    /**
     * BeforeFilter handle.
     *
     * @param Event $event The beforeFilter event that was fired.
     *
     * @return void
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['index', 'view']);
    }
    /**
     * Display all Articles.
     *
     * @return void
     */
    public function index()
    {
        $this->loadModel('Projects');
        $projects = $this->Projects
            ->find()
            ->order([
                'Projects.created' => 'desc'
            ])
            ->where([
                'Projects.is_display' => 1
            ]);
        $projects = $this->paginate($projects);
        $this->set(compact('projects'));
    }
    /**
     * Display a specific view.
     *
     * @return \Cake\Network\Response|void
     */
    public function view()
    {
        $this->loadModel('Projects');

        $project = $this->Projects
            ->find('slug', [
                'slug' => $this->request->slug,
                'slugField' => 'Projects.slug'
            ])
             ->contain([
                'ProjectImages'
            ])
            ->where([
                'Projects.is_display' => 1
            ])
            ->first();
        //Check if the project is found.
        if (empty($project)) {
            $this->Flash->error('This project doesn\'t exist or has been deleted.');
            return $this->redirect(['action' => 'index']);
        }

        $this->set(compact('project'));
    }
}