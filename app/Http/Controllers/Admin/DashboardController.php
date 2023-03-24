<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    
    public function index(){
        $user = Auth::user();
        $company = Company::with('location', 'category')->where('user_id', $user->id)->first();
        return Inertia::render('Admin/Dashboard',['admin' => $user, 'company' => $company]);
    }
}
