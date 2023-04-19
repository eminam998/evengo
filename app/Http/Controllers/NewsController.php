<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Inertia\Inertia;

class NewsController extends Controller
{
    public function index(){
        $byCompany = FacadesRequest::input('byCompany') ?: 'all';
        $companies = Company::all();
        if($byCompany === 'all'){
            return Inertia::render('Main/News', [
                'news' => News::query()
                               ->when(FacadesRequest::input('search'), function($query, $search) {
                                   $query->where('title', 'like', "%{$search}%");
                               })->with('company')->latest()->paginate(10)
                               ->withQueryString(),
                'filters' => FacadesRequest::only(['search', 'byCompany']),
                'companies' => $companies               
            ]);
        }
        else{
            return Inertia::render('Main/News', [
                'news' => News::query()
                               ->when(FacadesRequest::input('search'), function($query, $search) {
                                   $query->where('title', 'like', "%{$search}%");
                               })
                               ->where('company_id', $byCompany)
                               ->with('company')
                               ->latest()
                               ->paginate(10)
                               ->withQueryString(),
                'filters' => FacadesRequest::only(['search', 'byCompany']),
                'companies' => $companies               
            ]);
        }
    }

    public function show($id){
        $news = News::with('company')->find($id);
        $allNews = News::where('company_id', $news->company_id)->limit(5)->get();
        return Inertia::render('Main/ShowNews', [
            'news' => $news,
            'allNews' => $allNews
            //'images' => $images
        ]);
    }
}
