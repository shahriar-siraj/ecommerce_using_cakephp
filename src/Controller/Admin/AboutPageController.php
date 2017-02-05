<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\I18n\I18n;

class AboutPageController extends AppController
{


    /**
     * Edit About US Page.
     *
     * @return \Cake\Network\Response|void
     */
    public function index()
    {

        $this->loadModel('AboutPage');

        $about_page = $this->AboutPage
            ->find('all')
            ->where([
                'AboutPage.id' => 14
            ])
            ->first();

        //Check if the home page is found.
        if (empty($about_page)) {
            $this->Flash->error('There is an issue, please contact Emocean Studios.');
            return $this->redirect(['action' => 'index']);
        }

        if ($this->request->is('put')) {
            $this->AboutPage->patchEntity($about_page, $this->request->data());
            if ($this->AboutPage->save($about_page)) {
                $this->Flash->success('The about page informations has been updated successfully !');
                return $this->redirect(['action' => 'index']);
            }
        }

        $this->set(compact('about_page'));
        
    }

}
