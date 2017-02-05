<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Network\Email\Email;
use Cake\Validation\Validator;
use Cake\I18n\Time;

class ContactController extends AppController
{

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

        $this->Auth->allow(['index', 'thank_you']);
    }

    /**
     * Contact page.
     *
     * @return \Cake\Network\Response|void
     */
    public function index()
    {
        $contact = [
            'schema' => [
                'name' => [
                    'type' => 'string',
                    'length' => 100
                ],
                'email' => [
                    'type' => 'string',
                    'length' => 100
                ],
                'phone' => [
                    'type' => 'string',
                    'length' => 100
                ],
                'message' => [
                    'type' => 'string'
                ]
            ]
        ];

        if ($this->request->is('post')) {

            $validator = new Validator();
            $validator
                ->notEmpty('email', 'You need to put your E-mail.')
                ->add('email', 'validFormat', [
                    'rule' => 'email',
                    'message' =>'You must specify a valid E-mail address.'
                ])
                ->notEmpty('name', 'You need to put your name.')
                ->notEmpty('message', 'You need to give a message')
                ->add('message', 'minLength', [
                    'rule' => ['minLength', 10],
                    'message' => 'Your message can not contain less than 10 characters.'
                ]);

            $contact['errors'] = $validator->errors($this->request->data());

            if (empty($contact['errors'])) {

                $viewVars = [
                    'ip' => $this->request->clientIp()
                ];

                $viewVars = array_merge($this->request->data(), $viewVars);


                // Company Email
                $email = new Email();
                $email->profile('default')
                    ->template('contact_company', 'default')
                    ->emailFormat('html')
                    ->from(['brian@emoceanstudios.com.au' => 'Contact Form'])
                    ->to('brian@emoceanstudios.com.au')
                    ->subject('[IN A BIT] Contact Form!')
                    ->viewVars($viewVars)
                    ->send();

                // Thank You Email
                $email = new Email();
                $email->profile('default')
                    ->template('contact', 'default')
                    ->emailFormat('html')
                    ->from(['brian@emoceanstudios.com.au' => 'Contact Form'])
                    ->to($this->request->data['email'])
                    ->subject('[IN A BIT] Thank you!')
                    ->viewVars($viewVars)
                    ->send();

                return $this->redirect(['controller' => 'contact', 'action' => 'thank_you']);

            }
        }

        $this->set(compact('contact'));
    }

    public function thank_you() {

    }
}
