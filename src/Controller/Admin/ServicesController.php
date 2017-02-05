<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\I18n\I18n;

class ServicesController extends AppController
{


    /**
     * Display all services.
     *
     * @return void
     */
    public function index()
    {
        $this->loadModel('BlogServices');

        $this->paginate = [
            'maxLimit' => 15
        ];

        $services = $this->Services
            ->find()
            ->contain([
                'Users' => function ($q) {
                    return $q->find('short');
                }
            ])
            ->order([
                'Services.created' => 'desc'
            ]);

        $services = $this->paginate($services);
        $this->set(compact('services'));
    }

    /**
     * Add a service.
     *
     * @return \Cake\Network\Response|void
     */
    public function add()
    {

        $service = $this->Services->newEntity($this->request->data);

        if ($this->request->is('post')) {
            $service->user_id = $this->Auth->user('id');

            if ($this->Services->save($service)) {
                $this->Flash->success('Your service has been created successfully !');
                return $this->redirect(['action' => 'index']);
            }
        }

        $this->set(compact('service'));
    }

    /**
     * Edit a Service.
     *
     * @return \Cake\Network\Response|void
     */
    public function edit()
    {

        $service = $this->Services
            ->find('all')
            ->where([
                'Services.slug' => $this->request->slug
            ])
            ->contain([
                'Users' => function ($q) {
                        return $q->find('short');
                }
            ])
            ->first();

        //Check if the service is found.
        if (empty($service)) {
            $this->Flash->error('This service doesn\'t exist or has been deleted.');
            return $this->redirect(['action' => 'index']);
        }

        if ($this->request->is('put')) {
            $service->accessible('hero_file', true);
            $service->accessible('picture_file', true);
            $this->Services->patchEntity($service, $this->request->data());
            if ($this->Services->save($service)) {
                $this->Flash->success('This service has been updated successfully !');
                return $this->redirect(['action' => 'index']);
            }
        }

        $this->set(compact('service'));
    }

    /**
     * Delete a Service.
     *
     * @return \Cake\Network\Response
     */
    public function delete()
    {

        $service = $this->Services
            ->find('slug', [
                'slug' => $this->request->slug,
                'slugField' => 'Services.slug'
            ])
            ->first();

        //Check if the service is found.
        if (empty($service)) {
            $this->Flash->error('This service doesn\'t exist or has been deleted.');
            return $this->redirect(['action' => 'index']);
        }

        if ($this->Services->delete($service)) {
            $this->Flash->success('This service has been deleted successfully !');
            return $this->redirect(['action' => 'index']);
        }

        $this->Flash->error('Unable to delete this service.');

        return $this->redirect(['action' => 'index']);
    }
}
