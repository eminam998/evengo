<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = (new News())->newQuery();
        $user_id = Auth::id();
        $company_id = Company::where('user_id', $user_id)->first()->id;
        $news->where('company_id', $company_id);
        $news->latest();
        $news = $news->paginate(10)->onEachSide(2)->appends(request()->query());

        return Inertia::render('Admin/News/Index', [
            'news' => $news,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Admin/News/Create');
        
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
            'title' => ['required'],
            'description' => ['required'],
            'image' => ['required'],
        ])->validate();
  
        $fileName = time().'.'.$request->file('image')->extension();  
        $request->file('image')->move(public_path('uploads'), $fileName);
        $imagesname = '';

        if($request->file('images')){
            $files = $request->file('images');            
            foreach($files as $image){
                $imgName = time().$image->getClientOriginalName().'.'.$image->extension();
                $image->move(public_path('uploads'),$imgName);
                $imagesname = $imagesname.','.$imgName;
                
            }
        }


        $user_id = Auth::id();
        $company_id = Company::where('user_id', $user_id)->first()->id;
    
        News::create([
            'title' => $request->title,
            'description' => $request->description,
            'company_id' => $company_id,
            'image' => $fileName,
            'images' => $imagesname
        ]);
    
        return redirect()->route('news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //$images = explode( ',', $news->images );
        return Inertia::render('Admin/News/Show', [
            'news' => $news,
            //'images' => $images
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return Inertia::render('Admin/News/Edit', [
            'news' => $news
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
        $news = News::find($id);

        $validated_data = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'image' => ['required'],
        ]);

        if ($request->file('image')) {
            $validated_data['image'] = $request->validate([
                'image' => ['required', 'image', 'max:1500'],

            ]);

            // Grab the old image and delete it
            // dd($validated_data, $photo->path);
            $oldImage = $news->image;
            Storage::delete($oldImage);

            $fileName = time().'.'.$request->file('image')->extension();  
            $request->file('image')->move(public_path('uploads'), $fileName);
            $validated_data['image'] = $fileName;
        }

        //dd($validated_data);
        
        $news->title= $validated_data['title'];
        $news->description= $validated_data['description'];
        $news->image= $validated_data['image'];
        $news->save();



        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::find($id)->delete();
        return redirect()->route('news.index');
    }
}
