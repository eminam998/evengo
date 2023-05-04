<?php

namespace App\Http\Controllers;

use App\Mail\EventTicket;
use App\Models\Category;
use App\Models\Event;
use App\Models\EventRegistration;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Inertia\Inertia;

class EventController extends Controller
{
    public function index(){
        $byCategory = FacadesRequest::input('byCategory') ?: 'all';
        $byLocation = FacadesRequest::input('byLocation') ?: '';

        $categories = Category::all();
        $locations = Location::all();
        if($byCategory === 'all' && $byLocation === ''){
            return Inertia::render('Main/Event', [
                'events' => Event::query()
                               ->when(FacadesRequest::input('search'), function($query, $search) {
                                   $query->where('title', 'like', "%{$search}%");
                               })->with('category')->with('location')->latest()->paginate(10)
                               ->withQueryString(),
                'filters' => FacadesRequest::only(['search', 'byCategory']),
                'categories' => $categories,
                'locations' => $locations                
            ]);
        }
        elseif($byCategory != 'all' && $byLocation === ''){
            return Inertia::render('Main/Event', [
                'events' => Event::query()
                               ->when(FacadesRequest::input('search'), function($query, $search) {
                                   $query->where('title', 'like', "%{$search}%");
                               })->where('category_id', $byCategory)->with('category')->with('location')->latest()->paginate(10)
                               ->withQueryString(),
                'filters' => FacadesRequest::only(['search', 'byCategory']),
                'categories' => $categories,
                'locations' => $locations                
            ]);
        }
        elseif($byCategory === 'all' && $byLocation != ''){
            return Inertia::render('Main/Event', [
                'events' => Event::query()
                               ->when(FacadesRequest::input('search'), function($query, $search) {
                                   $query->where('title', 'like', "%{$search}%");
                               })->where('location_id', $byLocation)->with('category')->with('location')->latest()->paginate(10)
                               ->withQueryString(),
                'filters' => FacadesRequest::only(['search', 'byCategory']),
                'categories' => $categories,
                'locations' => $locations                
            ]);
        }
        return Inertia::render('Main/Event', [
            'events' => Event::query()
                            ->when(FacadesRequest::input('search'), function($query, $search) {
                                $query->where('title', 'like', "%{$search}%");
                            })
                            ->where('category_id', $byCategory)
                            ->where('location_id', $byLocation)
                            ->with('location')
                            ->with('category')
                            ->latest()
                            ->paginate(10)
                            ->withQueryString(),
            'filters' => FacadesRequest::only(['search', 'byCategory', 'byLocation']),
            'categories' => $categories ,
            'locations' => $locations              
        ]);
        
    }

    public function show($id)
    {
        return Inertia::render('Main/ShowEvent', [
            'event' => Event::with((['location', 'category']))->where('id',$id)->first()
        ]);
    }

    public function subscribe(Request $request, $id){
        $event = Event::find($id);
        $eventcount = EventRegistration::where('event_id', $id)->count();
        if($eventcount < $event->guest_number){
            $eventRegistration = new EventRegistration();
            $eventRegistration->event_id = $id;
            $eventRegistration->email = $request['email'];
            $eventRegistration->save();
            $mailData = [
                "name" => $event->name,
            ];
        
            Mail::to($request['email'])->send(new EventTicket($mailData));
            return redirect()->route('accepted');
        }
        return redirect()->route('denied');

    }
}
