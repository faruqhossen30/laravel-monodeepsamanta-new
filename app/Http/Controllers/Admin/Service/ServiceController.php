<?php

namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service\Service;
use App\Models\Service\ServiceFeature;
use App\Models\Service\ServiceVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    if(!Auth::user()->can('service list')){
        abort(403);
    }
        $servies = Service::latest()->paginate();
        return view('admin.services.index', compact('servies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!Auth::user()->can('service create')){
            abort(403);
        }
        $categories = Category::get();
        return view('admin.services.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!Auth::user()->can('service create')){
            abort(403);
        }


        // return $request->all();
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required'
        ]);

        $data = [
            'title'            => $request->title,
            'slug'             => Str::slug($request->title, '-'),
            'description'      => $request->description,
            // 'thumbnail'        => $request->thumbnail,
            'category_id'      => $request->category_id,
            'user_id'          => Auth::user()->id,
            'status'           => $request->status,
            'meta_title'       => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keyword'     => $request->meta_keyword
        ];
        if($request->file('thumbnail')){
            $file_name = $request->file('thumbnail')->store('service/thumbnail');
            $data['thumbnail'] = $file_name;
        }

        $service = Service::create($data);


        if ($service && $request->video_id && $request->pull_zone && $request->resolution) {
            ServiceVideo::create([
                'service_id' => $service->id,
                'video_id'      => $request->video_id,
                'pull_zone'     => $request->pull_zone,
                'resolution'    => $request->resolution
            ]);
        }


        if (!empty($request->featuredetails)) {
            $starter  = $request->starter;
            $standard = $request->standard;
            $advanced = $request->advanced;


            foreach ($request->featuredetails as  $index => $feature) {
                ServiceFeature::create([
                    'service_id' => $service->id,
                    'feature'    => $feature,
                    'starter'    => $starter[$index],
                    'standard'   => $standard[$index],
                    'advanced'   => $advanced[$index]
                ]);
            }
        }

        Session::flash('create');
        return redirect()->route('service.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if(!Auth::user()->can('service update')){
            abort(403);
        }
        $service = Service::with('video','features')->firstWhere('id', $id);
        $categories = Category::get();

        // return $service;
        // return $service->video;
        return view('admin.services.edit', compact('service', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        if(!Auth::user()->can('service update')){
            abort(403);
        }
        // return $request->all();
        $request->validate([
            'title'       => 'required',
            'description' => 'required',
            'category_id' => 'required'
        ]);


        $data = [
            'title'            => $request->title,
            'slug'             => Str::slug($request->title, '-'),
            'description'      => $request->description,
            // 'thumbnail'        => $request->thumbnail,
            'category_id'      => $request->category_id,
            'user_id'          => Auth::user()->id,
            'status'           => $request->status,
            'meta_title'       => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keyword'     => $request->meta_keyword
        ];

        if($request->file('thumbnail')){
            $file_name = $request->file('thumbnail')->store('thumbnail/service/');
            $data['thumbnail'] = $file_name;
        }
        $service=  Service::firstWhere('id', $id)->update($data);


        // return  $service;
        if ($request->video_id && $request->pull_zone && $request->resolution) {
            ServiceVideo::updateOrInsert([
                'service_id' => $id
            ], [
                'service_id' => $id,
                'video_id'      => $request->video_id,
                'pull_zone'     => $request->pull_zone,
                'resolution'    => $request->resolution
            ]);
        }


        if($service && !empty($request->featuredetails)){
            ServiceFeature::where('service_id', $id)->delete();
            $starter = $request->starter;
            $standard = $request->standard;
            $advanced = $request->advanced;


            foreach($request->featuredetails as  $index => $feature){
                ServiceFeature::create([
                    'service_id' => $id,
                    'feature'    => $feature,
                    'starter'    => $starter[$index],
                    'standard'   => $standard[$index],
                    'advanced'   => $advanced[$index]
                ]);
            }
        }


        Session::flash('Update');
        return redirect()->route('service.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        if(!Auth::user()->can('service delete')){
            abort(403);
        }
        $service = Service::findOrFail($id);
        Storage::delete($service->thumbnail);
        $service->delete();
        return redirect()->route('service.index');
    }
}
