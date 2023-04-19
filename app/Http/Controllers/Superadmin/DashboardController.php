<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index(){
        $contacts = (new Contact)->newQuery();
        $contacts->where('read', false);
        $contacts->latest();
        $contacts = $contacts->paginate(10)->onEachSide(2)->appends(request()->query());


        return Inertia::render('Superadmin/Dashboard', [
            'contacts' => $contacts,
        ]);
    }
}
