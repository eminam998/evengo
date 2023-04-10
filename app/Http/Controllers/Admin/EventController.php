<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Event;
use App\Models\Company;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = (new Event())->newQuery();
        $user_id = Auth::id();
        $company_id = Company::where('user_id', $user_id)->first()->id;
        $events->where('company_id', $company_id);
        $events->latest();
        $events = $events->paginate(10)->onEachSide(2)->appends(request()->query());

        return Inertia::render('Admin/Event/Index', [
            'events' => $events,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::all();
        $categories = Category::all();
        return Inertia::render('Admin/Event/Create',[
            'locations' => $locations,
            'categories' => $categories
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => ['required'],
            'description' => ['required'],
            'image' => ['required'],
            'address' => ['required'],
            'category_id' => ['required'],
            'location_id' => ['required'],
            'date' => ['required'],
            'time' => ['required'],            
        ])->validate();
  
        $fileName = time().'.'.$request->file('image')->extension();  
        $request->file('image')->move(public_path('uploads'), $fileName);
        $imagesname = '';

        $user_id = Auth::id();
        $company_id = Company::where('user_id', $user_id)->first()->id;
    
        Event::create([
            'name' => $request->name,
            'description' => $request->description,
            'company_id' => $company_id,
            'image' => $fileName,
            'address' => $request->address,
            'location_id' => $request->location_id,
            'category_id' => $request->category_id,
            'date' => $request->date,
            'time' => $request->time,
        ]);
    
        return redirect()->route('event.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Inertia::render('Admin/Event/Show', [
            'event' => Event::with((['location', 'category']))->where('id',$id)->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $locations = Location::all();
        $categories = Category::all();
        return Inertia::render('Admin/Event/Edit', [
            'event' => $event,
            'locations' => $locations,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'name' => ['required'],
            'description' => ['required'],
            'image' => ['required'],
            'address' => ['required'],
            'category_id' => ['required'],
            'location_id' => ['required'],
            'date' => ['required'],
            'time' => ['required'],            
        ])->validate();

        $event = Event::find($id);

  
        if ($request->file('image')) {
            $validated_data['image'] = $request->validate([
                'image' => ['required', 'image', 'max:1500'],

            ]);

            // Grab the old image and delete it
            // dd($validated_data, $photo->path);
            $oldImage = $event->image;
            Storage::delete($oldImage);

            $fileName = time().'.'.$request->file('image')->extension();  
            $request->file('image')->move(public_path('uploads'), $fileName);
            $validated_data['image'] = $fileName;
        }

            $event->name =  $request->name;
            $event->description =  $request->description;
            $event->image =  $fileName;
            $event->address =  $request->address;
            $event->location_id =  $request->location_id;
            $event->category_id = $request->category_id;
            $event->date =  $request->date;
            $event->time =  $request->time;

            $event->save();
    
        return redirect()->route('event.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::find($id)->delete();
        return redirect()->route('event.index');
    }
}
