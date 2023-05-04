<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\PendingUser;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index(){
        $contacts = (new Contact)->newQuery();
        $contacts->where('read', false);
        $contacts->latest();
        $pendingCount = PendingUser::where('approved', 'pending')->count();
        $contacts = $contacts->paginate(10)->onEachSide(2)->appends(request()->query());


        return Inertia::render('Superadmin/Dashboard', [
            'contacts' => $contacts,
            'pendingCount' => $pendingCount
        ]);
    }
}
