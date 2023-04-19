<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Event;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Inertia\Inertia;

class CompanyController extends Controller
{
    
    public function index(){
        return Inertia::render('Main/AllCompanies', [
            'companies' => Company::query()
                    ->when(FacadesRequest::input('search'), function ($query, $search) {
                        $query->where('name', 'like', '%' . $search . '%');
                    })->paginate(8)
                    ->withQueryString(),
        ]);

    }

    public function show($id){
        $company = Company::with('location')->find($id);
        $newsCount = News::where('company_id', $id)->count();
        $eventsCount = Event::where('company_id', $id)->count();
        $news = News::where('company_id', $id)->latest()->limit(3)->get();
        $events = Event::where('company_id', $id)->latest()->limit(5)->get();


        return Inertia::render('Main/AboutCompany', [
            'company' => $company,
            'newsCount' => $newsCount,
            'eventsCount' => $eventsCount,
            'news' => $news,
            'events' => $events,

        ]);

    }
}
