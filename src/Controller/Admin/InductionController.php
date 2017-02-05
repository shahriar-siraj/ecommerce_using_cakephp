<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\I18n\Number;
use Mexitek\PHPColors\Color;
use Widop\GoogleAnalytics\Client;
use Widop\GoogleAnalytics\Query;
use Widop\GoogleAnalytics\Service;
use Widop\HttpAdapter\CurlHttpAdapter;

class InductionController extends AppController
{

    // In your controller:
    public $components = [
        'RequestHandler' => [
            'viewClassMap' => ['csv' => 'CsvView.Csv']
        ]
    ];

    /**
     * Display all forms.
     *
     * @return void
     */
    public function index()
    {
        $this->loadModel('Induction');

        $this->paginate = [
            'maxLimit' => 15
        ];

        $forms = $this->Induction
            ->find()
            ->order([
                'Induction.created' => 'desc'
            ]);

        $forms = $this->paginate($forms);
        $this->set(compact('forms'));
    }

    /**
     * View a form.
     *
     * @return \Cake\Network\Response|void
     */
    public function view()
    {
        $this->loadModel('Induction');

        $form = $this->Induction
            ->find('all')
            ->where([
                'Induction.id' => $this->request->id
            ])
            ->first();

        //Check if the form is found.
        if (empty($form)) {
            $this->Flash->error('This form doesn\'t exist or has been deleted.');
            return $this->redirect(['action' => 'index']);
        }

        $this->set(compact('form'));
    }

    /**
     * Delete Induction Form.
     *
     * @return \Cake\Network\Response
     */
    public function delete()
    {
        $this->loadModel('Induction');

        $form = $this->Induction
            ->find('all')
            ->where([
                'Induction.id' => $this->request->id
            ])
            ->first();

        //Check if the form is found.
        if (empty($form)) {
            $this->Flash->error('This induction form doesn\'t exist or has been deleted.');
            return $this->redirect(['action' => 'index']);
        }

        if ($this->Induction->delete($form)) {
            $this->Flash->success('This induction form has been deleted successfully !');
            return $this->redirect(['action' => 'index']);
        }

        $this->Flash->error('Unable to delete this induction form.');

        return $this->redirect(['action' => 'index']);
    }

    public function export() {

        $this->loadModel('Induction');
        $registration = $this->Induction->find('all');
        $this->set(compact('registration'));

        if ($this->request->params['_ext'] === 'csv') {
            $_serialize = 'registration';
            $_header = array('id', 'Business Name', 'First Name', 'Last Name', 'ABN NO', 'City', 
                'State', 'Post Code', 'Country', 'Website', 'Email Address', 'Company Phone', 'Company Mobile', 'Company Phone', 'Emergency Contact Name', 'Emergency Contact Phone'
                ,'Trade Service Rates', 'Business Hours', 'Business Hours (Call Out Fee)', 'Registered for GST', 'Company Account Name', 'BSB', 'Account No', 'Trade licence No', 
                'Work cover No', 'Trade Licence No', 'Work Cover No', 'Policy No', 'Other', 'Insurance Notes', 'Relevant Trade Services', 'List of Locations', 'Suppliers Become Part'
                , 'After Hours Message');
            $_extract = array('id', 'company_business_name', 'company_first_name', 'company_last_name', 'company_abn', 'company_city', 'company_state', 'company_postcode', 'company_country', 'company_website', ' company_email', 'company_phone', 'company_mobile',
                '   company_emergency_contact_name', 'company_emergency_contact_phone', 'trade_relevant', 'trade_locations', 'trade_part_team', 'trade_after_hours_message', 'company_account_service_rates',
                'company_account_business_hours', ' company_account_business_hours_call_out', 'company_account_after_hours', 'company_account_after_hours_call_out', 'company_account_registered_gst',
                'company_account_name', 'company_account_bsb', 'company_account_account_no', 'company_account_trade_licence', 'company_account_work_cover', 'company_account_policy_no', 'company_account_other',
                'company_account_insurance', 'created');
            $this->set(compact('_serialize', '_header', '_extract'));
        }
   }
}
