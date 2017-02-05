<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\I18n\Number;
use Mexitek\PHPColors\Color;
use Widop\GoogleAnalytics\Client;
use Widop\GoogleAnalytics\Query;
use Widop\GoogleAnalytics\Service;
use Widop\HttpAdapter\CurlHttpAdapter;

class AdminController extends AppController
{

    /**
     * Index page.
     *
     * @return void
     */
    public function home()
    {

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

            $browsers = Cache::remember('browsers', function () use ($service) {
                $browsers = new Query(Configure::read('Analytics.profile_id'));
                $browsers
                    ->setStartDate(new \DateTime(Configure::read('Analytics.start_date')))
                    ->setEndDate(new \DateTime())
                    ->setDimensions(['ga:browser'])
                    ->setMetrics(['ga:pageviews'])
                    ->setSorts(['ga:pageviews'])
                    ->setFilters(['ga:browser==Chrome,ga:browser==Firefox,ga:browser==Internet Explorer,ga:browser==Safari,ga:browser==Opera']);
                return $service->query($browsers);
            }, 'analytics');
            $continents = Cache::remember('continents', function () use ($service) {
                $continentsRows = new Query(Configure::read('Analytics.profile_id'));
                $continentsRows
                    ->setStartDate(new \DateTime(Configure::read('Analytics.start_date')))
                    ->setEndDate(new \DateTime())
                    ->setDimensions(['ga:continent'])
                    ->setMetrics(['ga:visitors'])
                    ->setSorts(['ga:visitors'])
                    ->setFilters(['ga:continent==Africa,ga:continent==Americas,ga:continent==Asia,ga:continent==Europe,ga:continent==Oceania']);
                $continentsRows = $service->query($continentsRows);
                $color = new Color("1abc9c");
                $light = 1;
                $continents = [];
                foreach (array_reverse($continentsRows->getRows()) as $continentRow) {
                    $continent = [];
                    $continent['label'] = $continentRow[0];
                    $continent['data'] = $continentRow[1];
                    $continent['color'] = '#' . $color->lighten($light);
                    array_push($continents, $continent);
                    $light += 10;
                }
                return $continents;
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
            $this->set(compact('statistics', 'browsers', 'continents', 'graphVisitors'));
        }
        
        // Products Count
        $this->loadModel('Products');
        $productsCount = Number::format($this->Products->find()->count());
        $this->set(compact('productsCount'));

        // Users Count
        $this->loadModel('Users');
        $usersCount = Number::format($this->Users->find()->count());
        $this->set(compact('usersCount'));

        // Transactions Count
        $this->loadModel('Transactions');
        $transactionsCount = Number::format($this->Transactions->find()->count());
        $this->set(compact('transactionsCount'));

        // Orders Count
        $this->loadModel('Orders');
        $ordersCount = Number::format($this->Orders->find()->count());
        $this->set(compact('ordersCount'));


    }
}
