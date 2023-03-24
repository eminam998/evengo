<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $locations = Location::all();
        $categories = Category::all();
        $company = Company::with(['location', 'category'])->find($id);
        return Inertia::render('Admin/Company/Edit', [
            'company' => $company,
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
            'address' => ['required'],
            'phone' => ['required'],
            'description' => ['required'],
            'category_id' => ['required'],
            'location_id' => ['required']
        ])->validate();

        $company = Company::find($id);

        if ($request->file('file')) {
            $validated_data['file'] = $request->validate([
                'file' => ['required', 'image', 'max:1500'],

            ]);

            // Grab the old image and delete it
            // dd($validated_data, $photo->path);
            $oldImage = $company->logo;
            Storage::delete($oldImage);

            $fileName = time().'.'.$request->file('file')->extension();  
            $request->file('file')->move(public_path('uploads'), $fileName);
        }
  
       
        $company->name = $request['name'];
        $company->address = $request['address'];
        $company->logo = $fileName;
        $company->phone = $request['phone'];
        $company->description = $request['description'];
        $company->category_id = $request['category_id'];
        $company->location_id = $request['location_id'];

        $company->save();

        return redirect()->route('admin');

        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
