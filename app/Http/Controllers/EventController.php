<?php

namespace App\Http\Controllers;

use App\Mail\EventTicket;
use App\Models\Category;
use App\Models\Event;
use App\Models\EventRegistration;
use App\Models\Location;
use Carbon\Carbon;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;

use Inertia\Inertia;

class EventController extends Controller
{
    public function index()
{
    $byCategory = Request::input('byCategory', 'all');
    $byLocation = Request::input('byLocation', '');

    $categories = Category::all();
    $locations = Location::all();
    
    $events = Event::query()
                ->when(Request::input('search'), function($query, $search) {
                    $query->where('title', 'like', "%{$search}%");
                })
                ->when($byCategory !== 'all', function($query) use ($byCategory) {
                    $query->where('category_id', $byCategory);
                })
                ->when(!empty($byLocation), function($query) use ($byLocation) {
                    $query->where('location_id', $byLocation);
                })
                ->with('location')
                ->with('category')
                ->where('date', '>=', Carbon::now())
                ->orderBy('date', 'desc')
                ->paginate(3)
                ->withQueryString();

    return Inertia::render('Main/Event', [
        'events' => $events,
        'filters' => Request::only(['search', 'byCategory', 'byLocation']),
        'categories' => $categories,
        'locations' => $locations
    ]);
}


    public function show($id)
    {
        return Inertia::render('Main/ShowEvent', [
            'event' => Event::with((['location', 'category']))->where('id',$id)->first()
        ]);
    }

    public function subscribe(HttpRequest $request, $id){
        $event = Event::find($id);
        $eventcount = EventRegistration::where('event_id', $id)->count();
        if($eventcount < $event->guest_number || $event->guest_number == 1000){
            if($event->guest_number != 1000){
                $event->guest_number = $event->guest_number -1;
                $event->save();
            }
            $eventRegistration = new EventRegistration();
            $eventRegistration->event_id = $id;
            $eventRegistration->email = $request->email;
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
