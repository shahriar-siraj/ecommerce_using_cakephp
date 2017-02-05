<?php
namespace App\Controller;

use App\Event\Badges;
use App\I18n\Language;
use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\I18n\Time;

class AppController extends Controller
{

    /**
     * Components.
     *
     * @var array
     */
    public $components = [
        'Flash',
        'Cookie',
    /**
     * If you want enable CSRF uncomment this.
     * I recommend to enable it. If i have disable it, it's because
     * CloudFlare have some problem with the header X-CSRF-Token (AJAX Request).
     */
        /*'Csrf' => [
            'secure' => true
        ],*/
        'Auth' => [
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'email']
                ],
                'Xety/Cake3CookieAuth.Cookie'
            ],
            'flash' => [
                'element' => 'error',
                'key' => 'flash',
                'params' => [
                    'class' => 'error'
                ]
            ],
            'loginAction' => [
                'controller' => 'users',
                'action' => 'login',
                'prefix' => 'admin'
            ],
            'unauthorizedRedirect' => [
                'controller' => 'pages',
                'action' => 'home',
                'prefix' => false
            ],
            'loginRedirect' => [
                'controller' => 'pages',
                'action' => 'home',
                'prefix' => false
            ],
            'logoutRedirect' => [
                'controller' => 'pages',
                'action' => 'home',
                'prefix' => false
            ],
            'authError' => false
        ]
    ];

    /**
     * Helpers.
     *
     * @var array
     */
    public $helpers = [
        'Form' => [
            'templates' => [
                'error' => '<div class="text-danger">{{content}}</div>',
                'radioWrapper' => '{{input}}{{label}}',
                'nestingLabel' => '<label{{attrs}}>{{text}}</label>'
            ]
        ]
    ];

    /**
     * beforeFilter handle.
     *
     * @param Event $event The beforeFilter event that was fired.
     *
     * @return void
     */
    public function beforeFilter(Event $event)
    {

        //Set trustProxy or get the original visitor IP.
        $this->request->trustProxy = true;

        if (isset($this->request->params['prefix'])) {
            $prefix = explode('/', $this->request->params['prefix'])[0];

            switch($prefix) {
                case 'admin':
                // If the user is already logged in but not as administrator
                if ($this->Auth->user() && $this->Auth->user('group_id') != 5) {
                    $this->Auth->logout();
                }
                $this->viewBuilder()->layout('admin');
                break;
            }
            
        }

        $allowCookies = $this->Cookie->check('allowCookies');
        $this->set(compact('allowCookies'));
    }
    
}
