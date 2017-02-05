<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\I18n\I18n;

class HomePageController extends AppController
{


    /**
     * Edit a Payment.
     *
     * @return \Cake\Network\Response|void
     */
    public function index()
    {

        $this->loadModel('HomePage');

        $home_page = $this->HomePage
            ->find('all')
            ->where([
                'HomePage.id' => 13
            ])
            ->first();

        //Check if the home page is found.
        if (empty($home_page)) {
            $this->Flash->error('There is an issue, please contact Emocean Studios.');
            return $this->redirect(['action' => 'index']);
        }

        if ($this->request->is('put')) {
            $this->HomePage->patchEntity($home_page, $this->request->data());
            if ($this->HomePage->save($home_page)) {
                $this->Flash->success('The home page informations has been updated successfully !');
                return $this->redirect(['action' => 'index']);
            }
        }

        $this->set(compact('home_page'));
        
    }

}
