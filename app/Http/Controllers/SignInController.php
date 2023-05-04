<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Category;
use App\Models\Location;
use App\Models\PendingUser;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use App\Models\PendingCompany;
use Illuminate\Support\Facades\Hash;

class SignInController extends Controller
{

    public function index() {
        $locations = Location::all();
        $categories = Category::all();
        return Inertia::render('SignIn',[
            'locations' => $locations,
            'categories' => $categories
        ]);

    }

    public function signInRequest(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'company_name' => ['required'],
            'address' => ['required'],
            'phone' => ['required'],
            'description' => ['required'],
            'location_id' => ['required']
        ]);

        $user = PendingUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($request->file('file')) {
            $validated_data['file'] = $request->validate([
                'file' => ['required', 'image', 'max:1500'],

            ]);
            $fileName = time().'.'.$request->file('file')->extension();  
            $request->file('file')->move(public_path('uploads'), $fileName);
        }

        $pending_company = PendingCompany::create([
            'name' => $request->company_name,
            'address' => $request->address,
            'phone' => $request->phone,
            'description' => $request->description,
            'location_id' => $request->location_id,
            'logo' => $fileName,
            'user_id' => $user->id,
            'instagram' => $request->instagram,
            'twitter' => $request->twitter,
            'facebook' => $request->facebook,
        ]);

        return redirect()->route('sign-in.success');
    }
    
}
