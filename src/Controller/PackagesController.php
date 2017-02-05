<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\I18n\Number;
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
     * Beforefilter.
     *
     * @param Event $event The beforeFilter event that was fired.
     *
     * @return void
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['index', 'choose']);
    }

    /**
     * Index page.
     *
     * @return void
     */
    public function index() { 

        // Packages List
        $packages = $this->Packages
            ->find()
            ->order([
                'Packages.created' => 'desc'
            ]);
        $packages = $packages->toArray();
        $this->set(compact('packages'));

    }

    public function choose($package_id) {

        //$url = 'https://api.ezypay.com/api/v1/debits';
        //$headers = array(
           // 'Content-Type:application/json',
        // 'Authorization: Basic '. base64_encode("z4Mc2z0tYOFBUertWAZtDggEAJTKCq")
        //);
        //$curlPost = array('variable' => 'value');

        //$process = curl_init($url);
        //curl_setopt($process, CURLOPT_HTTPHEADER, $headers);
        //curl_setopt($process, CURLOPT_HEADER, 1);
        //curl_setopt($process, CURLOPT_USERPWD, $username . ":" . $password);
        //curl_setopt($process, CURLOPT_TIMEOUT, 30);
        //curl_setopt($process, CURLOPT_POST, 1);
        //curl_setopt($process, CURLOPT_POSTFIELDS, $curlPost);
        //curl_setopt($process, CURLOPT_RETURNTRANSFER, TRUE);
        //$result = curl_exec($process);

        //curl_close($process);

        //echo "<pre>";
        //print_r($result);
        //echo "</pre>";
        //die();

        $this->loadModel('Packages');

        $package = $this->Packages
            ->find()
            ->where([
                'Packages.id' => $package_id
            ])
            ->first();

        $this->set(compact('package'));

    }

}
