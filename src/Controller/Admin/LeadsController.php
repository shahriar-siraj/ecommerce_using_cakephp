<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\I18n\I18n;

class LeadsController extends AppController
{


    /**
     * Display all leads.
     *
     * @return void
     */
    public function index()
    {

        $this->loadModel('Leads');

        $leads = $this->Leads
            ->find()
            ->order([
                'Leads.id' => 'desc'
            ]);

        $leads = $leads->toArray();

        $this->set(compact('leads'));
    }

    public function view() {

        $this->loadModel('Leads');

        $lead = $this->Leads
            ->find('all')
            ->where([
                'Leads.id' => $this->request->id
            ])
            ->first();

        //Check if the lead is found.
        if (empty($lead)) {
            $this->Flash->error('This lead doesn\'t exist or has been deleted.');
            return $this->redirect(['action' => 'index']);
        }

         $this->set(compact('lead'));

    }

    /**
     * Delete a Lead.
     *
     * @return \Cake\Network\Response
     */
    public function delete()
    {
        $this->loadModel('Leads');

        $lead = $this->Leads
            ->find('all')
            ->where([
                'Leads.id' => $this->request->id
            ])
            ->first();

        //Check if the lead is found.
        if (empty($lead)) {
            $this->Flash->error('This lead doesn\'t exist or has been deleted.');
            return $this->redirect(['action' => 'index']);
        }

        if ($this->Leads->delete($lead)) {
            $this->Flash->success('This lead has been deleted successfully !');
            return $this->redirect(['action' => 'index']);
        }

        $this->Flash->error('Unable to delete this lead.');

        return $this->redirect(['action' => 'index']);
    }
}
