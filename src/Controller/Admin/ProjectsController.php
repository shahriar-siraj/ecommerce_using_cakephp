<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\I18n\I18n;
use Cake\Routing\Router;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;

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
     * Display all projects.
     *
     * @return void
     */
    public function index()
    {
        $this->loadModel('Projects');

        $this->paginate = [
            'maxLimit' => 15
        ];

        $projects = $this->Projects
            ->find()
            ->order([
                'Projects.created' => 'desc'
            ]);

        $projects = $this->paginate($projects);
        $this->set(compact('projects'));
    }

    /**
     * Add a project.
     *
     * @return \Cake\Network\Response|void
     */
    public function add()
    {
        $this->loadModel('Projects');

        $project = $this->Projects->newEntity($this->request->data);

        if ($this->request->is('post')) {

            if ($this->Projects->save($project)) {
                $this->Flash->success('Your project has been created successfully !');
                return $this->redirect(['action' => 'index']);
            }
        }
        $this->set(compact('project'));
    }

    /**
     * Edit an Article.
     *
     * @return \Cake\Network\Response|void
     */
    public function edit()
    {
        $this->loadModel('Projects');

        $project = $this->Projects
            ->find('all')
            ->where([
                'Projects.slug' => $this->request->slug
            ])
            ->first();

        //Check if the project is found.
        if (empty($project)) {
            $this->Flash->error('This project doesn\'t exist or has been deleted.');
            return $this->redirect(['action' => 'index']);
        }

        if ($this->request->is('put')) {
            $this->Projects->patchEntity($project, $this->request->data());
            if ($this->Projects->save($project)) {
                $this->Flash->success('This project has been updated successfully !');
                return $this->redirect(['action' => 'index']);
            }
        }

        //$categories = $this->Projects->BlogCategories->find('list');
        $this->set(compact('project'));
    }

    /**
     * Delete an Article and all his comments and likes.
     *
     * @return \Cake\Network\Response
     */
    public function delete()
    {
        $this->loadModel('BlogArticles');

        $article = $this->BlogArticles
            ->find('slug', [
                'slug' => $this->request->slug,
                'slugField' => 'BlogArticles.slug'
            ])
            ->first();

        //Check if the article is found.
        if (empty($article)) {
            $this->Flash->error('This article doesn\'t exist or has been deleted.');
            return $this->redirect(['action' => 'index']);
        }

        if ($this->BlogArticles->delete($article)) {
            $this->Flash->success('This article has been deleted successfully !');
            return $this->redirect(['action' => 'index']);
        }

        $this->Flash->error('Unable to delete this article.');

        return $this->redirect(['action' => 'index']);
    }

    public function uploadImages() {

        $this->loadModel('ProjectImages');

        $unique_id = $_GET['slug'];
        $upload_folder = '/projects/';

        // Main Directory
        $upload_dir = '/webroot/upload' . $upload_folder;

        // Then... We need to parse the id or the slug
        $upload_dir = $upload_dir . $unique_id;

        $targetPath = $_SERVER['DOCUMENT_ROOT'] . $upload_dir . DIRECTORY_SEPARATOR;

        // If the directory doesn't exist, create it
        if (!file_exists($targetPath)) { 
            mkdir($targetPath, 0755, true); 
        }

        if (!empty($_FILES)) {
             $tempFile = $_FILES['file']['tmp_name'];
             // Adding timestamp with image's name so that files with same name can be uploaded easily.
             $file_name = time().'-'. $_FILES['file']['name'];
             $mainFile = $targetPath.$file_name;
             move_uploaded_file($tempFile,$mainFile);
             $this->request->data['project_id'] = $_GET['project_id'];
             $this->request->data['picture'] = 'upload' . $upload_folder . $unique_id . '/' . $file_name;
             $this->request->data['unique_id'] = $unique_id;
             $image = $this->ProjectImages->newEntity($this->request->data);
             $this->ProjectImages->save($image);
        }

        die();

    }

    public function getImages() {

        $unique_id = $_GET['unique_id'];
        $upload_folder = '/projects/';
        $storeFolder = '/webroot/upload' . $upload_folder;  
        $storeFolder = $storeFolder . $unique_id;

        $files = preg_grep('~\.(jpeg|jpg|png|gif)$~', scandir($_SERVER['DOCUMENT_ROOT'] . $storeFolder));

        // If the directory doesn't exist, create it
        if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $storeFolder)) { 
            mkdir($_SERVER['DOCUMENT_ROOT'] . $storeFolder, 0755, true); 
        }

        foreach($files as $file){ //get an array which has the names of all the files and loop through it 
            $obj['name'] = $file; //get the filename in array
            $obj['size'] = filesize($_SERVER['DOCUMENT_ROOT'] . $storeFolder. '/' . $file); //get the flesize in array
            $obj['url'] = Router::url('/upload', true) . $upload_folder . $unique_id . '/' . $file; 
            $result[] = $obj; // copy it to another array
        }

        $this->set(compact('result'));
        $this->set('_serialize', ['result']);

    }

    public function deleteImage() {

        if (!$this->request->is('ajax')) {
            throw new NotFoundException();
        }

        $this->loadModel('ProjectImages');

        $json = [];
        $json['file'] = $_POST['id'];
        $upload_folder = '/projects/';
        $json['storeFolder'] = '/webroot/upload' . $upload_folder . $_POST['unique_id'];
        $filepath = $_SERVER['DOCUMENT_ROOT'] . $json['storeFolder']. '/' . $json['file'];
        $json['filepath'] = $filepath;

        // Remove the image if exist
        if (is_file($filepath)) { 
            unlink($filepath);
             $image = $this->ProjectImages
            ->find()
            ->where([
                'ProjectImages.portfolio_id' => $_GET['portfolio_id'],
                'ProjectImages.unique_id'    => $_POST['unique_id']
            ])
            ->first();
            $this->ProjectImages->delete($image);
        }

        $this->set(compact('json'));
        $this->set('_serialize', 'json');
    }

}
