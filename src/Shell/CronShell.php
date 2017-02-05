<?php

namespace App\Shell;

use Cake\Console\Shell;
use Cake\Network\Email\Email;
use Cake\Core\Configure;
use Cake\I18n\Number;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Widop\GoogleAnalytics\Client;
use Widop\GoogleAnalytics\Query;
use Widop\GoogleAnalytics\Service;
use Widop\HttpAdapter\CurlHttpAdapter;
use Cake\Cache\Cache;
use Cake\Validation\Validator;
use Cake\I18n\Time;
use \DateTime;
use \DateInterval;

class CronShell extends Shell
{
    public function report()
    {

        $this->loadModel('Induction');
        $this->loadModel('Leads');

        // Today Date
        $today_datetime = new Time();
        $today_string_date = $today_datetime->format('Y-m-d');

        // Yesterday Date
        $yesterday_datetime = new \DateTime('-1 days');
        $yesterday_string_date = $yesterday_datetime->format('Y-m-d');

        // Past 7 days Date
        $past_seven_datetime = new \DateTime('-7 days');
        $past_seven_string_date = $past_seven_datetime->format('Y-m-d');

        // Total of inductions
        $count_inductions = $this->Induction
            ->find('all')
            ->count();

        // New Inductions from Yesterday
        $count_inductions_since_yesterday = Number::format($this->Induction
        ->find()
        ->where([
            'created BETWEEN :start AND :end'
        ])
        ->bind(':start', new \DateTime($yesterday_string_date), 'date')
        ->bind(':end',   new \DateTime($today_string_date), 'date')
        ->count());

        // New Inductions Past 7 days
        $count_inductions_past_7_days = Number::format($this->Induction
        ->find()
        ->where([
            'created BETWEEN :start AND :end'
        ])
        ->bind(':start', new \DateTime($past_seven_string_date), 'date')
        ->bind(':end',   new \DateTime($today_string_date), 'date')
        ->count());

        // Total Leads
        $count_leads = $this->Leads
            ->find('all')
            ->count();

        // Total Leads Past 7 days
        $count_leads_past_7_days = Number::format($this->Leads
        ->find()
        ->where([
            'created BETWEEN :start AND :end'
        ])
        ->bind(':start', new \DateTime($past_seven_string_date), 'date')
        ->bind(':end',   new \DateTime($today_string_date), 'date')
        ->count());

        // Total Leads Past 30 days
        $month_datetime = new \DateTime('-30 days');
        $month_string_date = $month_datetime->format('Y-m-d');

        $count_leads_past_yesterday = Number::format($this->Leads
        ->find()
        ->where([
            'created BETWEEN :start AND :end'
        ])
        ->bind(':start', new \DateTime($yesterday_string_date), 'date')
        ->bind(':end',   new \DateTime($today_string_date), 'date')
        ->count());

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
            $statistics_yesterday = Cache::remember('statistics_yesterday', function () use ($service) {
                // Yesterday Date
                $yesterday_datetime = new \DateTime('-1 days');
                $yesterday_string_date = $yesterday_datetime->format('Y-m-d');
                $statistics_yesterday = new Query(Configure::read('Analytics.profile_id'));
                $statistics_yesterday
                    // 2014-08-01
                    ->setStartDate(new \DateTime($yesterday_string_date))
                    ->setEndDate(new \DateTime())
                    ->setMetrics([
                        'ga:visits', 'ga:visitors', 'ga:pageviews', 'ga:pageviewsPerVisit',
                        'ga:avgtimeOnSite', 'ga:visitBounceRate', 'ga:percentNewVisits'
                    ]);
                return $service->query($statistics_yesterday);
            }, 'analytics');
            $statistics_month_ago = Cache::remember('statistics_month', function () use ($service) {
                // Month ago Date
                $month_datetime = new \DateTime('-30 days');
                $month_string_date = $month_datetime->format('Y-m-d');
                $statistics_month_ago = new Query(Configure::read('Analytics.profile_id'));
                $statistics_month_ago
                    ->setStartDate(new \DateTime($month_string_date))
                    ->setEndDate(new \DateTime())
                    ->setMetrics([
                        'ga:visits', 'ga:visitors', 'ga:pageviews', 'ga:pageviewsPerVisit',
                        'ga:avgtimeOnSite', 'ga:visitBounceRate', 'ga:percentNewVisits'
                    ]);
                return $service->query($statistics_month_ago);
            }, 'analytics');
            $statistics_previous_30 = Cache::remember('statistics_previous', function () use ($service) {
                // Month ago Date
                $month_3datetime = new \DateTime('-31 days');
                $month_3string_date = $month_3datetime->format('Y-m-d');

                $month_4datetime = new \DateTime('-61 days');
                $month_4string_date = $month_4datetime->format('Y-m-d');

                $statistics_previous_30 = new Query(Configure::read('Analytics.profile_id'));
                $statistics_previous_30
                    ->setStartDate(new \DateTime($month_4string_date))
                    ->setEndDate(new \DateTime($month_3string_date))
                    ->setMetrics([
                        'ga:visits', 'ga:visitors', 'ga:pageviews', 'ga:pageviewsPerVisit',
                        'ga:avgtimeOnSite', 'ga:visitBounceRate', 'ga:percentNewVisits'
                    ]);
                return $service->query($statistics_previous_30);
            }, 'analytics');
        } else {
            $statistics = '';
            $statistics_yesterday = '';
            $statistics_month_ago = '';
            $statistics_previous_30 = '';

        }

        $viewVars = [
            'count_inductions' => $count_inductions,
            'count_inductions_since_yesterday' => $count_inductions_since_yesterday,
            'count_inductions_past_7_days' => $count_inductions_past_7_days,
            'statistics' => $statistics,
            'statistics_yesterday' => $statistics_yesterday,
            'statistics_month_ago' => $statistics_month_ago,
            'statistics_previous_30' => $statistics_previous_30,
            'count_leads' => $count_leads,
            'count_leads_past_7_days' => $count_leads_past_7_days,
            'count_leads_past_yesterday' => $count_leads_past_yesterday
        ];

        // Company Email
        $email = new Email();
        $email->profile('default')
            ->template('company_report', 'default')
            ->emailFormat('html')
            ->from(['brian@emoceanstudios.com.au' => '[Auto Daily] Contractors Submission'])
            ->to('brian@emoceanstudios.com.au')
            ->subject('[Auto Daily] Contractors Submission]')
            ->viewVars($viewVars)
            ->send();
    }
}