<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\I18n\Number;
use Cake\Network\Exception\NotFoundException;

class ServicesController extends AppController
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
        $this->Auth->allow(['index', 'view', 'construction', 'facility_management', 'civil_construction', 'remedial', 'emergency', 'demolition', 'trades', 'sectors']);
    }

    /**
     * Index page.
     *
     * @return void
     */
    public function index() { }

    public function view() { }

    public function construction() { }

    public function facility_management() { }

    public function civil_construction() { }

    public function remedial() { }

    public function emergency() { }

    public function demolition() { }

    public function trades() { }

    public function sectors() { }

}
