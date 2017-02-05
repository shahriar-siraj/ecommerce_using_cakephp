<?php
namespace App\Controller;
use App\Event\Badges;
use App\Event\Forum\Notifications;
use App\Event\Forum\Statistics;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\Network\Email\Email;
class UsersController extends AppController
{
    /**
     * Initialize handle.
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $action = $this->request->action;
    }
    /**
     * BeforeFilter handle.
     *
     * @param Event $event The beforeFilter event that was fired.
     *
     * @return void
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['index', 'logout', 'profile', 'forgotPassword', 'resetPassword', 'type_account', 'register', 'login', 'register_done']);
    }
    /**
     * Display all Users.
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'maxLimit' => Configure::read('User.user_per_page')
        ];
        $users = $this->Users
            ->find()
            ->contain([
                'Groups'
            ])
            ->order([
                'Users.created' => 'desc'
            ]);
        $users = $this->paginate($users);
        $this->set(compact('users'));
    }

    public function register() {

        $userRegister = $this->Users->newEntity($this->request->data, ['validate' => 'create']);

        // Define the layout
        if (isset($this->request->type) && $this->request->type == 'merchant') {
            $layout = 'merchant';
        } else {
            $layout = 'customer';
        }

        if ($this->request->is('post')) {

            $userRegister->register_ip = $this->request->clientIp();
            $userRegister->last_login_ip = $this->request->clientIp();
            $userRegister->last_login = new Time();
            
            // Define the group of the user
            if (isset($this->request->type) && $this->request->type == 'merchant') {
                $userRegister->group_id = 3;
            } else {
                $userRegister->group_id = 2;
            }

            if ($this->Users->save($userRegister)) {

                $viewVars = [
                    'user' => $userRegister,
                    'name' => $userRegister->full_name
                ];

                // Send email to the user
                $email = new Email();
                $email->profile('default')
                    ->template('register', 'default')
                    ->emailFormat('html')
                    ->from(['brian@emoceanstudios.com.au' => 'INABIT' ])
                    ->to($userRegister->email)
                    ->subject('[INABIT] Welcome')
                    ->viewVars($viewVars)
                    ->send();


                $userLogin = $this->Auth->identify();
                $this->Auth->setUser($userLogin);

                $user = $this->Users->newEntity($userLogin);
                $user->isNew(false);

                $user->last_login = new Time();
                $user->last_login_ip = $this->request->clientIp();
                
                // Save the new logged user
                $this->Users->save($user);

                // Set the session to the user
                $this->Cookie->configKey('CookieAuth', [
                    'expires' => '+1 year',
                    'httpOnly' => true
                ]);
                $this->Cookie->write('CookieAuth', [
                    'email' => $this->request->data('email'),
                    'password' => $this->request->data('password')
                ]);

                return $this->redirect(['controller' => 'users', 'action' => 'register_done']);

                $this->Flash->success("Your account has been created successfully !");
                $url = $this->Auth->redirectUrl();
                if (substr($this->Auth->redirectUrl(), -5) == 'login') {
                    $url = ['controller' => 'pages', 'action' => 'home'];
                }
                return $this->redirect($url);
            }
            $this->Flash->error("Please, correct your mistake.");    
        }

        $options_states = array('New South Wales', 'Victoria', 'Queensland', 'Western Australia', 'South Australia', 'Australian Capital Territory', 'Tasmania');
        $options_gender = array('Male', 'Female');

        $this->set(compact('userRegister', 'layout', 'options_states', 'options_gender'));
        
    }

    /**
     * Login and register page.
     *
     * @return \Cake\Network\Response|void
     */
    public function login()
    {

        if ($this->request->is('post')) {

            $userLogin = $this->Auth->identify();

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

                $url = ['controller' => 'pages', 'action' => 'home'];

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
    /**
     * Page to configure our account.
     *
     * @return void
     */
    public function account()
    {
        $user = $this->Users->get($this->Auth->user('id'));
        if ($this->request->is('put')) {
            $user->accessible('avatar_file', true);
            $this->Users->patchEntity($user, $this->request->data(), ['validate' => 'account']);
            if ($this->Users->save($user)) {
                $this->request->session()->write('Auth.User.avatar', $user->avatar);
                $this->Flash->success("Your information has been updated !");
            }
        }

        $options_states = array('New South Wales', 'Victoria', 'Queensland', 'Western Australia', 'South Australia', 'Australian Capital Territory', 'Tasmania');

        $this->set(compact('user', 'options_states'));
    }
    /**
     * Page to configure our settings.
     *
     * @return \Cake\Network\Response|void
     */
    public function settings()
    {
        $user = $this->Users->get($this->Auth->user('id'));
        $oldEmail = $user->email;
        if ($this->request->is('put')) {
            $method = ($this->request->data['method']) ? $this->request->data['method'] : false;
            switch ($method) {
                case "email":
                    if (!isset($this->request->data['email'])) {
                        $this->set(compact('user', 'oldEmail'));
                        return $this->redirect(['action' => 'settings']);
                    }
                    $this->Users->patchEntity($user, $this->request->data(), ['validate' => 'settings']);
                    if ($this->Users->save($user)) {
                        $oldEmail = $this->request->data['email'];
                        $this->Flash->success("Your E-mail has been changed !");
                    }
                    break;
                case "password":
                    $data = $this->request->data;
                    if (!isset($data['old_password']) || !isset($data['password']) || !isset($data['password_confirm'])) {
                        $this->set(compact('user', 'oldEmail'));
                        return $this->Flash->error("Please, complete all fields !");
                    }
                    if (!(new DefaultPasswordHasher)->check($data['old_password'], $user->password)) {
                        $this->set(compact('user', 'oldEmail'));
                        return $this->Flash->error("Your old password don't match !");
                    }
                    $this->Users->patchEntity($user, $this->request->data(), ['validate' => 'settings']);
                    if ($this->Users->save($user)) {
                        $this->Flash->success("Your password has been changed !");
                    }
                    break;
            }
        }
        $this->set(compact('user', 'oldEmail'));
    }
    /**
     * View a profile page of an user.
     *
     * @return \Cake\Network\Response|void
     */
    public function profile()
    {
        $user = $this->Users
            ->find()
            ->where([
                'Users.id' => $this->request->id
            ])
            ->contain([
                'BlogArticles' => function ($q) {
                    return $q
                        ->limit(Configure::read('User.Profile.max_blog_articles'))
                        ->order(['BlogArticles.created' => 'DESC']);
                },
                'BlogArticlesComments' => function ($q) {
                    return $q
                        ->limit(Configure::read('User.Profile.max_blog_comments'))
                        ->contain([
                            'BlogArticles' => function ($q) {
                                return $q->select(['id', 'title', 'slug']);
                            }
                        ])
                        ->order(['BlogArticlesComments.created' => 'DESC']);
                },
                'ForumThreads' => function ($q) {
                    return $q
                        ->limit(Configure::read('User.Profile.max_forum_threads'))
                        ->contain([
                            'FirstPosts' => function ($q) {
                                return $q->select(['id', 'message', 'thread_id']);
                            }
                        ])
                        ->order(['ForumThreads.created' => 'DESC']);
                },
                'ForumPosts' => function ($q) {
                    return $q
                        ->limit(Configure::read('User.Profile.max_forum_posts'))
                        ->contain([
                            'ForumThreads' => function ($q) {
                                return $q->select(['id', 'title']);
                            }
                        ])
                        ->order(['ForumPosts.created' => 'DESC']);
                },
                'BadgesUsers' => function ($q) {
                    return $q
                        ->contain([
                            'Badges' => function ($q) {
                                return $q
                                    ->select([
                                        'name',
                                        'picture'
                                    ]);
                            }
                        ])
                        ->order([
                            'BadgesUsers.id' => 'DESC'
                        ]);
                }
            ])
            ->map(function ($user) {
                $user->online = $this->SessionsActivity->getOnlineStatus($user);
                return $user;
            })
            ->first();
        if (is_null($user) || $user->is_deleted == true) {
            $this->Flash->error(__('This user doesn\'t exist or has been deleted.'));
            return $this->redirect(['controller' => 'pages', 'action' => 'home']);
        }
        $this->set(compact('user'));
    }
    /**
     * Display all premium transactions related to the user.
     *
     * @return void
     */
    public function premium()
    {
        $this->loadModel('PremiumTransactions');
        $this->paginate = [
            'maxLimit' => Configure::read('User.transaction_per_page')
        ];
        $transactions = $this->PremiumTransactions
            ->find()
            ->contain([
                'PremiumOffers',
                'PremiumDiscounts'
            ])
            ->where([
                'PremiumTransactions.user_id' => $this->Auth->user('id')
            ])
            ->order([
                'PremiumTransactions.created' => 'desc'
            ]);
        $transactions = $this->paginate($transactions);
        $this->set(compact('transactions'));
    }
    /**
     * Display the form to reset the password.
     *
     * @return \Cake\Network\Response|void
     */
    public function forgotPassword()
    {

        if ($this->Auth->user()) {
            return $this->redirect(['controller' => 'pages', 'action' => 'home']);
        }

        $user = $this->Users->newEntity($this->request->data);
        if ($this->request->is('post')) {
            $user = $this->Users
                ->find()
                ->where([
                    'Users.email' => $this->request->data['email']
                ])
                ->first();
            if (is_null($user)) {
                $this->Flash->error("This E-mail doesn't exist or the account has been deleted.");
                $this->set(compact('user'));
                return;
            }
            //Generate the unique code
            $code = md5(rand() . uniqid() . time());
            //Update the user's information
            $user->password_code = $code;
            $user->password_code_expire = new Time();
            $this->Users->save($user);
            $viewVars = [
                'userId' => $user->id,
                'name' => $user->full_name,
                'email' => $user->email,
                'code' => $code
            ];
            $email = new Email();
            $email->profile('default')
                ->template('forgotPassword', 'default')
                ->emailFormat('html')
                ->from(['brian@emoceanstudios.com.au' => '[INABIT] Forgot your Password'])
                ->to($user->email)
                ->subject('[INABIT] Forgot your Password')
                ->viewVars($viewVars)
                ->send();
            $this->Flash->success("An E-mail has been send to <strong>" . $user->email . "</strong>. Please follow the instructions in the E-mail.");
        }
        $this->set(compact('user'));
    }
    /**
     * Display the form to reset his password.
     *
     * @return \Cake\Network\Response|void
     */
    public function resetPassword()
    {
        if ($this->Auth->user()) {
            return $this->redirect(['controller' => 'pages', 'action' => 'home']);
        }
        //Prevent for empty code.
        if (empty(trim($this->request->code))) {
            $this->Flash->error("This code is not associated with this users or is incorrect.");
            return $this->redirect(['controller' => 'pages', 'action' => 'home']);
        }
        $user = $this->Users
            ->find()
            ->where([
                'Users.password_code' => $this->request->code,
                'Users.id' => $this->request->id
            ])
            ->first();
        if (is_null($user)) {
            $this->Flash->error("This code is not associated with this users or is incorrect.");
            return $this->redirect(['controller' => 'pages', 'action' => 'home']);
        }
        $expire = $user->password_code_expire->timestamp + (Configure::read('User.ResetPassword.expire_code') * 60);
        if ($expire < time()) {
            $this->Flash->error("This code is expired, please ask another E-mail code.");
            return $this->redirect(['action' => 'forgotPassword']);
        }
        if ($this->request->is(['post', 'put'])) {
            $this->Users->patchEntity($user, $this->request->data, ['validate' => 'resetpassword']);
            if ($this->Users->save($user)) {
                $this->Flash->success("Your password has been changed !");
                //Reset the code and the time.
                $user->password_code = '';
                $user->password_code_expire = new Time();
                $user->password_reset_count = $user->password_reset_count + 1;
                $this->Users->save($user);
                return $this->redirect(['controller' => 'users', 'action' => 'login']);
            }
        }
        $this->set(compact('user'));
    }

    public function type_account() { }

    public function register_done() { 

        $group_id = $this->Auth->user('group_id');

        if ($group_id == '') {
            $group_id = 2;
        }

        $this->set(compact('group_id'));

    }

}