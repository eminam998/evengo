<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Inertia\Inertia;

class ContactController extends Controller
{
    public function index() {
        return Inertia::render('Main/Contact');

    }

    public function sendMessage(Request $request){
        FacadesValidator::make($request->all(), [
            'name' => ['required'],
            'email' => ['required'],
            'message' => ['required']
        ])->validate();
   
        Contact::create($request->all());
    
        return redirect()->route('contact');
    }
}
