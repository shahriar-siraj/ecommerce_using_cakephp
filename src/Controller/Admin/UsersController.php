<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\Network\Email\Email;

class UsersController extends AppController
{

    /**
     * Display all users.
     *
     * @return void
     */
    public function index()
    {

        $this->loadModel('Users');

        $users = $this->Users
            ->find()
            ->contain([
                'Groups'
            ])
            ->order([
                'Users.created' => 'desc'
            ])->toArray();

        $this->set(compact('users'));

    }

    /**
     * Display all admins.
     *
     * @return void
     */
    public function admins()
    {

        $this->loadModel('Users');

        $users = $this->Users
            ->find()
            ->contain([
                'Groups'
            ])
            ->where(['Users.group_id' => 5])
            ->order([
                'Users.created' => 'desc'
            ])->toArray();

        $this->set(compact('users'));

    }

    /**
     * Display all custoemrs.
     *
     * @return void
     */
    public function customers()
    {

        $this->loadModel('Users');

        $users = $this->Users
            ->find()
            ->contain([
                'Groups'
            ])
            ->where(['Users.group_id' => 2])
            ->order([
                'Users.created' => 'desc'
            ])->toArray();

        $this->set(compact('users'));

    }

    /**
     * Display all merchants.
     *
     * @return void
     */
    public function merchants()
    {

        $this->loadModel('Users');

        $users = $this->Users
            ->find()
            ->contain([
                'Groups'
            ])
            ->where(['Users.group_id' => 3])
            ->order([
                'Users.created' => 'desc'
            ])->toArray();

        $this->set(compact('users'));

    }

    /**
     * Edit a User.
     *
     * @return \Cake\Network\Response|void
     */
    public function edit()
    {
        $this->loadModel('Users');

        $user = $this->Users
            ->find('all')
            ->where([
                'Users.id' => $this->request->id
            ])
            ->first();

        //Check if the user is found.
        if (empty($user)) {
            $this->Flash->error('This user doesn\'t exist or has been deleted.');
            return $this->redirect(['action' => 'index']);
        }

        if ($this->request->is('put')) {
            $this->Users->patchEntity($user, $this->request->data());
            if ($this->Users->save($user)) {
                $this->Flash->success('This user has been updated successfully !');
                return $this->redirect(['action' => 'index']);
            }
        }

        $this->loadModel('Groups');
        $options_states = array('New South Wales', 'Victoria', 'Queensland', 'Western Australia', 'South Australia', 'Australian Capital Territory', 'Tasmania');
        $groups = $this->Groups->find('list');

        $this->set(compact('user', 'groups', 'options_states'));
    }


    /**
     * Add a user.
     *
     * @return \Cake\Network\Response|void
     */
    public function add()
    {
        $this->loadModel('Users');

        $user = $this->Users->newEntity($this->request->data);

        if ($this->request->is('post')) {

            if ($this->Users->save($user)) {
                $this->Flash->success('This user has been created successfully !');
                return $this->redirect(['action' => 'index']);
            }
        }
        $this->loadModel('Groups');
        $options_states = array('New South Wales', 'Victoria', 'Queensland', 'Western Australia', 'South Australia', 'Australian Capital Territory', 'Tasmania');
        $groups = $this->Groups->find('list');

        $this->set(compact('user', 'groups', 'options_states'));
    }

    /**
     * Delete the user.
     *
     * @return \Cake\Network\Response
     */
    public function delete()
    {

        $this->loadModel('Users');

        $user = $this->Users
            ->find('all')
            ->where([
                'Users.id' => $this->request->id
            ])
            ->first();

        //Check if the article is found.
        if (empty($user)) {
            $this->Flash->error('This user doesn\'t exist or has been deleted.');
            return $this->redirect(['action' => 'index']);
        }

        if ($this->Users->delete($user)) {
            $this->Flash->success('This user has been deleted successfully !');
            return $this->redirect(['action' => 'index']);
        }

        $this->Flash->error('Unable to delete this user.');

        return $this->redirect(['action' => 'index']);

    }


    /**
     * Login and register page.
     *
     * @return \Cake\Network\Response|void
     */
    public function login()
    {
        $this->viewBuilder()->layout('login');

        if ($this->request->is('post')) {

            $userLogin = $this->Auth->identify();

             $user = $this->Users
                ->find()
                ->where([
                    'Users.email' => $this->request->data['email'],
                    'Users.group_id' => 5
                ])
                ->first();

            //if (is_null($user)) {
                //$this->Flash->error("This user is not an admin user.");
            //}

            if ($userLogin) {

                $this->Auth->setUser($userLogin);

                $user = $this->Users->newEntity($userLogin);
                $user->isNew(false);

                $user->last_login = new Time();
                $user->last_login_ip = $this->request->clientIp();

                $this->Users->save($user);

                //Cookies.
                $this->Cookie->configKey('CookieAuth', [
                    'expires' => '+1 year',
                    'httpOnly' => true
                ]);
                $this->Cookie->write('CookieAuth', [
                    'email' => $this->request->data('email'),
                    'password' => $this->request->data('password')
                ]);

                $url = $this->Auth->redirectUrl();
                if (substr($this->Auth->redirectUrl(), -5) == 'login') {
                    $url = ['controller' => 'pages', 'action' => 'home'];
                }

                return $this->redirect($url);
            }

            $this->Flash->error("Your email or password doesn't match.");

            if ($this->Auth->user()) {
                return $this->redirect($this->Auth->redirectUrl());
            }
        
        }
    }

    /**
     * Logout an user.
     *
     * @return \Cake\Network\Response
     */
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

}
