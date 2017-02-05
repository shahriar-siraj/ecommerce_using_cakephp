<?php
namespace App\Controller;
use App\Event\Badges;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Routing\Router;
use Cake\Network\Email\Email;
class BlogController extends AppController
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
     * BeforeFilter handle.
     *
     * @param Event $event The beforeFilter event that was fired.
     *
     * @return void
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['index', 'article', 'validation_comment']);
    }
    /**
     * Display all Articles.
     *
     * @return void
     */
    public function index()
    {
        $this->loadModel('BlogArticles');
        $articles = $this->BlogArticles
            ->find()
            ->contain([
                'BlogCategories',
                'Users' => function ($q) {
                    return $q->find('short');
                }
            ])
            ->order([
                'BlogArticles.created' => 'asc'
            ])
            ->where([
                'BlogArticles.is_display' => 1
            ]);

        $articles = $this->paginate($articles);
        $this->set(compact('articles'));
    }
    /**
     * Display a specific article.
     *
     * @return \Cake\Network\Response|void
     */
    public function article()
    {
        $this->loadModel('BlogArticles');
        $this->loadModel('BlogArticlesComments');

        $article = $this->BlogArticles
            ->find('slug', [
                'slug' => $this->request->slug,
                'slugField' => 'BlogArticles.slug'
            ])
            ->contain([
                'BlogCategories',
                'BlogAttachments',
                'Users' => function ($q) {
                    return $q->find('full');
                }
            ])
            ->where([
                'BlogArticles.is_display' => 1
            ])
            ->first();

        //Check if the article is found.
        if (empty($article)) {
            return $this->redirect(['action' => 'index']);
        }

        $this->loadModel('BlogArticlesComments');
        //A comment has been posted.
        if ($this->request->is('post')) {

            if (empty($this->request->data['content']) || empty($this->request->data['full_name']) || empty($this->request->data['email'])) {
                $this->Flash->error('Sorry! All fields are required!');
                $this->redirect([
                    'controller' => 'blog', 
                    'action' => 'article', 
                    'prefix' => false, 
                    'id' => $article->id, 
                    'slug' => $article->slug
                ]);
            } else {
                // ID and Name of the article
                $this->request->data['article_id'] = $article->id;
                $this->request->data['article_title'] = $article->title;
                //Generate the unique code
                $this->request->data['validation_key'] = md5(rand() . uniqid() . time());
                $newComment = $this->BlogArticlesComments->newEntity($this->request->data);
                if ($insertComment = $this->BlogArticlesComments->save($newComment)) {

                    // Need to send an email to Allen for the validation of the comment.
                    $viewVars = [
                        'ip' => $this->request->clientIp()
                    ];
                    $viewVars = array_merge($this->request->data(), $viewVars);

                    // Thank You Email
                    $email = new Email();
                    $email->profile('default')
                        ->template('contact', 'default')
                        ->emailFormat('html')
                        ->from(['brian@emoceanstudios.com.au' => 'EveryTrade'])
                        ->to('brian@emoceanstudios.com.au')
                        ->subject('[Every Trade] Thank you!')
                        ->viewVars($viewVars)
                        ->send();

                    // Company Email
                    $email = new Email();
                    $email->profile('default')
                        ->template('validation_comment', 'default')
                        ->emailFormat('html')
                        ->from(['brian@emoceanstudios.com.au' => 'EveryTrade'])
                        ->to('brian@emoceanstudios.com.au')
                        ->subject('[Every Trade] New Comment!')
                        ->viewVars($viewVars)
                        ->send();

                    $this->Flash->success('Thank you! Your comment has been posted successfully but it has to be approved! ');
                    //Redirect the user to the last page of the article.
                    $this->redirect([
                        'controller' => 'blog', 
                        'action' => 'article', 
                        'prefix' => false, 
                        'id' => $article->id, 
                        'slug' => $article->slug
                    ]);
                }
            }
        }

         //Build the newEntity for the comment form.
        $formComments = $this->BlogArticlesComments->newEntity();

        // Get All comments related to the article.
        $comments_list = $this->BlogArticlesComments
            ->find()
            ->where([
                'article_id' => $article->id,
                'approved' => 1
            ])
            ->order([
                'BlogArticlesComments.created' => 'asc'
            ]);

        $comments = $comments_list->toArray();
        $commentsCount = $comments_list->count();

        $this->set(compact('article', 'formComments', 'comments', 'commentsCount'));
    }

    public function validation_comment() {

            if (empty($_GET['validation_key']) || !isset($_GET['validation_key'])) {
                echo 'The validation key cannot be found!';
                die();
            }

            $validation_key = $_GET['validation_key'];
            $this->loadModel('BlogArticlesComments');
            $this->loadModel('BlogArticles');

            $comment = $this->BlogArticlesComments
            ->find()
            ->where([
                'BlogArticlesComments.validation_key' => $validation_key
            ])
            ->first();

            if ($comment) {
                $article = $this->BlogArticles
                ->find('all')
                ->where([
                    'BlogArticles.id' => $comment->article_id
                ])
                ->first();
                if ($article) { 
                    if ($comment->approved == 1) {
                        $this->Flash->success('The comment has already been approved! ');
                        //Redirect the user to the article.
                        $this->redirect([
                            'controller' => 'blog', 
                            'action' => 'article', 
                            'prefix' => false, 
                            'id' => $article->id, 
                            'slug' => $article->slug
                        ]);
                    } else { 
                        $this->request->data['approved'] = 1;
                        $this->BlogArticlesComments->patchEntity($comment, $this->request->data());
                        if ($this->BlogArticlesComments->save($comment)) {
                            $this->Flash->success('The comment has been approved successfully! ');
                            //Redirect the user to the article.
                            $this->redirect([
                                'controller' => 'blog', 
                                'action' => 'article', 
                                'prefix' => false, 
                                'id' => $article->id, 
                                'slug' => $article->slug
                            ]);
                        }
                    }
                } else {
                    echo 'This article doesn\t exist anymore!';
                    die();
                }
            } else {
                echo 'The comment cannot be found!';
                die();
            }
    }
}