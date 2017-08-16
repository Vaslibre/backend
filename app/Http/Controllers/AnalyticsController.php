<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Analytics;
use Spatie\Analytics\Period;
use Carbon\Carbon;
use App\Services\GoogleAnalytics;


class AnalyticsController extends Controller
{
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {

        // $data = GoogleAnalytics::visitors_and_pageviews();
        // dd($data);exit;
        $analyticsData_one          = Analytics::fetchTotalVisitorsAndPageViews(Period::days(14));
        $this->data['dates']        = $analyticsData_one->pluck('date');
        $this->data['visitors']     = $analyticsData_one->pluck('visitors');
        $this->data['pageViews']    = $analyticsData_one->pluck('pageViews');
        
        // $analyticsData_two              = Analytics::fetchVisitorsAndPageViews(Period::days(14));
        // $this->data['two_dates']        = $analyticsData_two->pluck('date');
        // $this->data['two_visitors']     = $analyticsData_two->pluck('visitors')->count();
        // $this->data['two_pageTitle']    = $analyticsData_two->pluck('pageTitle')->count();
        
        // $analyticsData_three            = Analytics::fetchMostVisitedPages(Period::days(14));
        // $this->data['three_url']        = $analyticsData_three->pluck('url');
        // $this->data['three_pageTitle']  = $analyticsData_three->pluck('pageTitle');
        // $this->data['three_pageViews']  = $analyticsData_three->pluck('pageViews');


        $this->data['browserjson'] = GoogleAnalytics::topbrowsers();
        $this->data['toppages']    = GoogleAnalytics::mostVisitedPages();

        // $this->data['analyticsData_three'] = Analytics::fetchMostVisitedPages(Period::days(14));

        $result = GoogleAnalytics::country();
        $this->data['country']          = $result->pluck('country');
        $this->data['country_sessions'] = $result->pluck('sessions');

        $mobile = GoogleAnalytics::mobileDeviceInfo();
        $this->data['mobileInfo']      = $mobile->pluck('mobileDeviceInfo');
        $this->data['mobile_sessions'] = $mobile->pluck('sessions');


        $this->data['ceci_ver'] = config('mycms.ceci_ver'); // set the page title


        return view('admin.analytics.index', $this->data);
    }
}
