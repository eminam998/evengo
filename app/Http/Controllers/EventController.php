<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Inertia\Inertia;

class EventController extends Controller
{
    public function index(){
        $byCategory = FacadesRequest::input('byCategory') ?: 'all';
        $categories = Category::all();
        if($byCategory === 'all'){
            return Inertia::render('Main/Event', [
                'events' => Event::query()
                               ->when(FacadesRequest::input('search'), function($query, $search) {
                                   $query->where('title', 'like', "%{$search}%");
                               })->with('category')->latest()->paginate(10)
                               ->withQueryString(),
                'filters' => FacadesRequest::only(['search', 'byCategory']),
                'categories' => $categories               
            ]);
        }
        else{
            return Inertia::render('Main/Event', [
                'events' => Event::query()
                               ->when(FacadesRequest::input('search'), function($query, $search) {
                                   $query->where('title', 'like', "%{$search}%");
                               })
                               ->where('category_id', $byCategory)
                               ->with('category')
                               ->latest()
                               ->paginate(10)
                               ->withQueryString(),
                'filters' => FacadesRequest::only(['search', 'byCompany']),
                'categories' => $categories               
            ]);
        }
    }
}
