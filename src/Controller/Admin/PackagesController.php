<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\I18n\I18n;
use Cake\Routing\Router;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;

class PackagesController extends AppController
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
     * Display all packages.
     *
     * @return void
     */
    public function index()
    {

        $this->loadModel('Packages');

        $packages = $this->Packages
            ->find()
            ->order([
                'Packages.created' => 'desc'
            ]);

        $packages = $packages->toArray();
        $this->set(compact('packages'));

    }

    /**
     * Add a package.
     *
     * @return \Cake\Network\Response|void
     */
    public function add()
    {
        $this->loadModel('Packages');

        $package = $this->Packages->newEntity($this->request->data);

        if ($this->request->is('post')) {

            if ($this->Packages->save($package)) {
                $this->Flash->success('This package has been created successfully !');
                return $this->redirect(['action' => 'index']);
            }
        }

        $this->set(compact('package'));
    }

    /**
     * Edit a Package.
     *
     * @return \Cake\Network\Response|void
     */
    public function edit()
    {
        $this->loadModel('Packages');

        $package = $this->Packages
            ->find('all')
            ->where([
                'Packages.id' => $this->request->id
            ])
            ->first();

        //Check if the package is found.
        if (empty($package)) {
            $this->Flash->error('This package doesn\'t exist or has been deleted.');
            return $this->redirect(['action' => 'index']);
        }

        if ($this->request->is('put')) {
            $this->Packages->patchEntity($package, $this->request->data());
            if ($this->Packages->save($package)) {
                $this->Flash->success('This package has been updated successfully !');
                return $this->redirect(['action' => 'index']);
            }
        }

        // The package has to be linked to a store

        //$categories = $this->Packages->BlogCategories->find('list');
        $this->set(compact('package'));
    }

    /**
     * Delete a Package.
     *
     * @return \Cake\Network\Response
     */
    public function delete()
    {

        $this->loadModel('Packages');

        $package = $this->Packages
            ->find('all')
            ->where([
                'Packages.id' => $this->request->id
            ])
            ->first();

        //Check if the package is found.
        if (empty($package)) {
            $this->Flash->error('This package doesn\'t exist or has been deleted.');
            return $this->redirect(['action' => 'index']);
        }

        if ($this->Packages->delete($package)) {
            $this->Flash->success('This package has been deleted successfully !');
            return $this->redirect(['action' => 'index']);
        }

        $this->Flash->error('Unable to delete this package.');

        return $this->redirect(['action' => 'index']);

    }

}
