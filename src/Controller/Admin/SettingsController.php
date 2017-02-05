<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\I18n\I18n;
use Cake\Routing\Router;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;

class SettingsController extends AppController
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
     * Display the settings.
     *
     * @return void
     */
    public function index()
    {

       $this->loadModel('Settings');

        $settings = $this->Settings
            ->find('all')
            ->where([
                'Settings.id' => 19
            ])
            ->first();

        //Check if the settings is found.
        if (empty($settings)) {
            $this->Flash->error('The settings doesn\'t exist or has been deleted.');
            return $this->redirect(['action' => 'index']);
        }

        if ($this->request->is('put')) {
            $this->Settings->patchEntity($settings, $this->request->data());
            if ($this->Settings->save($settings)) {
                $this->Flash->success('The settings has been updated successfully !');
                return $this->redirect(['action' => 'index']);
            }
        }

        $this->set(compact('settings'));

    }

}
