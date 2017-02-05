<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\I18n\I18n;

class ContactController extends AppController
{

    /**
     * Edit a Payment.
     *
     * @return \Cake\Network\Response|void
     */
    public function index()
    {

        $this->loadModel('Contact');

        $contact = $this->Contact
            ->find('all')
            ->where([
                'Contact.id' => 12
            ])
            ->first();

        //Check if the contact informations is found.
        if (empty($contact)) {
            $this->Flash->error('There is an issue, please contact Emocean Studios.');
            return $this->redirect(['action' => 'index']);
        }

        if ($this->request->is('put')) {
            $this->Contact->patchEntity($contact, $this->request->data());
            if ($this->Contact->save($contact)) {
                $this->Flash->success('The contact informations has been updated successfully !');
                return $this->redirect(['action' => 'index']);
            }
        }

        $this->set(compact('contact'));
    }

}