<?php
namespace App\Controller;

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\I18n\Number;
use Mexitek\PHPColors\Color;
use Widop\GoogleAnalytics\Client;
use Widop\GoogleAnalytics\Query;
use Widop\GoogleAnalytics\Service;
use Widop\HttpAdapter\CurlHttpAdapter;

class ShellController extends AppController
{

    // In your controller:
    public $components = [
        'RequestHandler' => [
            'viewClassMap' => ['csv' => 'CsvView.Csv']
        ]
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
        $this->Auth->allow(['dailyEmailAttachedCSV', 'dailyEmail']);
    }

    /**
     * Auto daily email report sent to BuilderTrend email address with .csv attached as per BT .csv supplied.
     *
     * @return string|void
     */
    public function dailyEmailAttachedCSV()
    {


    }

    /**
     * Auto daily email report sent to ETBS email with # New Web Visitors + # New Contractor Submissions and CMS link.
     * It has to be at 9:00 AM every day.
     *
     * @return ConsoleOptionParser
     */
    public function dailyEmail()
    {

        $this->loadModel('Induction');

        // Total of inductions
        $count_inductions = $this->Induction
            ->find('all')
            ->count();

        // New Inductions from Yesterday
        $count_inductions_since_yesterday = 
            $this->Induction
            ->find('all')
            ->count();

        // Visitors Count
        if (Configure::read('Analytics.enabled') === true) {
            $httpAdapter = new CurlHttpAdapter();
            $client = new Client(Configure::read('Analytics.client_id'), Configure::read('Analytics.private_key'), $httpAdapter);
            $service = new Service($client);
            $statistics = Cache::remember('statistics', function () use ($service) {
                $statistics = new Query(Configure::read('Analytics.profile_id'));
                $statistics
                    ->setStartDate(new \DateTime(Configure::read('Analytics.start_date')))
                    ->setEndDate(new \DateTime())
                    ->setMetrics([
                        'ga:visits', 'ga:visitors', 'ga:pageviews', 'ga:pageviewsPerVisit',
                        'ga:avgtimeOnSite', 'ga:visitBounceRate', 'ga:percentNewVisits'
                    ]);
                return $service->query($statistics);
            }, 'analytics');
            $graphVisitors = Cache::remember('graphVisitors', function () use ($service) {
                $graphVisitors = new Query(Configure::read('Analytics.profile_id'));
                $graphVisitors
                    ->setStartDate(new \DateTime('-7 days'))
                    ->setEndDate(new \DateTime())
                    ->setDimensions(['ga:date'])
                    ->setMetrics(['ga:visits', 'ga:pageviews'])
                    ->setSorts(['ga:date']);
                return $service->query($graphVisitors);
            }, 'analytics');
        } else {
            $statistics = '',
            $graphVisitors = ''
        }

        $viewVars = [
            'count_inductions' => $count_inductions,
            'count_inductions_since_yesterday' => $count_inductions_since_yesterday,
            'statistics' => $statistics,
            'graphVisitors' => $graphVisitors
        ];

        // Company Email
        $email = new Email();
        $email->profile('default')
            ->template('daily_email', 'default')
            ->emailFormat('html')
            ->from(['brian@emoceanstudios.com.au' => '[Auto Daily] Contractors Submission'])
            ->to('brian@emoceanstudios.com.au')
            ->subject('[Auto Daily] Contractors Submission]')
            ->viewVars($viewVars)
            ->send();

            die();
        
    }

}
