<?php
namespace App\Controller;

use App\Event\Badges;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Routing\Router;
use Cake\Network\Email\Email;
use Cake\I18n\Time;

class RegistrationController extends AppController
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
     * Beforefilter.
     *
     * @param Event $event The beforeFilter event that was fired.
     *
     * @return void
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['index', 'step_company_signup', 'step_trade_services', 'step_account_details', 'thank_you']);
    }

    /**
     * Index page.
     *
     * @return void
     */
    public function index() { }

    public function step_company_signup() {

        $this->viewBuilder()->layout(false);
    }

    public function step_trade_services() {

        if (isset($this->request->data['form'])) { 

            $this->request->data['form'] = urldecode($this->request->data['form']);
            $returndata = array();
            $strArray = explode("&", $this->request->data['form']);
            $i = 0;

            foreach ($strArray as $item) {
                $array = explode("=", $item);
                $returndata[$array[0]] = $array[1];
            }
        }

       foreach ($returndata as $k => $v) {
            $this->request->session()->write('Form.' . $k, $v);
       }

       $this->viewBuilder()->layout(false);

    }

    public function step_account_details() {

        if (isset($this->request->data['form'])) { 

            $this->request->data['form'] = urldecode($this->request->data['form']);
            $returndata = array();
            $strArray = explode("&", $this->request->data['form']);
            $i = 0;

            $trade_relevants = '';

            foreach ($strArray as $item) {
                $array = explode("=", $item);
                if (strpos($array[0], 'trade_relevant') !== false) {
                    $trade_relevants .= $array[1] . ' ';
                } else {
                    $returndata[$array[0]] = $array[1];
                }
            }

            $trade_relevants = str_replace(' ', ',', $trade_relevants);
            $trade_relevants = substr($trade_relevants, 0, -1);
            $this->request->session()->write('Form.' . 'trade_relevant', $trade_relevants);
        }

        foreach ($returndata as $k => $v) {
            $this->request->session()->write('Form.' . $k, $v);
        }

        $this->viewBuilder()->layout(false);
    }

    public function thank_you() {

        $this->loadModel('Induction');

        if ($this->request->is('post')) {

            foreach ($this->request->data['form'] as $k => $v) {
                $k = str_replace('form[', '', $k);
                $k = str_replace(']', '', $k);
                $this->request->session()->write('Form.' . $k, $v);
            }

            $public_liability_file = $this->request->data['public_liability_file'];
            $insurance_file = $this->request->data['insurance_file'];
            $client_specific_inductions_file = $this->request->data['client_specific_inductions_file'];
            $arr_ext = array('jpg', 'jpeg', 'gif', 'png', 'docx', 'pdf', 'csv', 'zip'); //set allowed extensions

            if(!empty($public_liability_file['name']))
            {
                $ext = substr(strtolower(strrchr($public_liability_file['name'], '.')), 1); //get the extension

                //only process if the extension is valid
                if(in_array($ext, $arr_ext))
                {
                    $setNewFileName = time() . "_" . rand(000000, 999999) . '-' . $public_liability_file['name'];
                    $path = '/registration_files/' . $setNewFileName;
                    //do the actual uploading of the file. First arg is the tmp name, second arg is
                    //where we are putting it
                    move_uploaded_file($public_liability_file['tmp_name'], WWW_ROOT . $path);
                    $this->request->session()->write('Form.public_liability_file', $path);
                } else {
                    echo 'extension invalid...';
                    die();
                }
            }

            if(!empty($insurance_file['name']))
            {
                $ext = substr(strtolower(strrchr($insurance_file['name'], '.')), 1); //get the extension

                //only process if the extension is valid
                if(in_array($ext, $arr_ext))
                {
                    $setNewFileName = time() . "_" . rand(000000, 999999) . '-' . $insurance_file['name'];
                    $path = '/registration_files/' . $setNewFileName;
                    //do the actual uploading of the file. First arg is the tmp name, second arg is
                    //where we are putting it
                    move_uploaded_file($insurance_file['tmp_name'], WWW_ROOT . $path);
                    $this->request->session()->write('Form.insurance_file', $path);
                } else {
                    echo 'extension invalid...';
                    die();
                }
            }

            if(!empty($client_specific_inductions_file['name']))
            {
                $ext = substr(strtolower(strrchr($client_specific_inductions_file['name'], '.')), 1); //get the extension

                //only process if the extension is valid
                if(in_array($ext, $arr_ext))
                {
                    $setNewFileName = time() . "_" . rand(000000, 999999) . '-' . $client_specific_inductions_file['name'];
                    $path = '/registration_files/' . $setNewFileName;
                    //do the actual uploading of the file. First arg is the tmp name, second arg is
                    //where we are putting it
                    move_uploaded_file($client_specific_inductions_file['tmp_name'], WWW_ROOT . $path);
                    $this->request->session()->write('Form.client_specific_inductions_file', $path);
                } else {
                    echo 'extension invalid...';
                    die();
                }
            }

            $viewVars = [
                'ip' => $this->request->clientIp()
            ];

            // Thank You Email
            $email = new Email();
            $email->profile('default')
                ->template('thank_you_registration', 'default')
                ->emailFormat('html')
                ->from(['brian@emoceanstudios.com.au' => 'Contact Form'])
                ->to($this->request->session()->read('Form.company_email'))
                ->subject('[Every Trade] Thank you!')
                ->viewVars($viewVars)
                ->attachments(ROOT.'/webroot/upload/Subby-Pack.pdf')
                ->send();

            $this->request->session()->write('Form.created', new Time()); 
            $this->request->session()->write('Form.modified', new Time()); 

            $induction_form = $this->Induction->newEntity($this->request->session()->read('Form'));
            $this->Induction->save($induction_form);

        }

    }
}
