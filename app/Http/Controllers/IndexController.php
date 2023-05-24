<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Event;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class IndexController extends Controller
{
    public function index(){
        $companyCount = Company::count();
        $newsCount = News::count();
        $eventCount = Event::count();
        $companies = Company::limit(4)->inRandomOrder()->get();
        $events = Event::limit(3)->where('date', '>=', Carbon::now())->orderBy('date', 'desc')->get();
        $news = News::with('company')->limit(3)->latest()->get();


        return Inertia::render('Main/Index',[
            'companyCount' => $companyCount,
            'newsCount' => $newsCount,
            'eventCount' => $eventCount,
            'companies' => $companies,
            'events' => $events,
            'news' => $news
        ]);
    }
}
