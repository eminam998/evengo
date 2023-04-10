<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Event;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    
    public function index(){
        $user = Auth::user();
        $company = Company::with('location', 'category')->where('user_id', $user->id)->first();
        $events = Event::where('company_id', $company->id)->orderBy('created_at', 'desc')->limit(2)->get();       
        $news = News::where('company_id', $company->id)->orderBy('created_at', 'desc')->limit(2)->get();
        return Inertia::render('Admin/Dashboard',['admin' => $user, 'company' => $company, 'events' => $events, 'news' => $news]);
    }
}
