<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog\Software;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SoftwareController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if(!Auth::user()->can('software list')){
            abort(403);
        }
        $softwares = Software::paginate();
        return view('admin.blog.software.index',compact('softwares'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


        if(!Auth::user()->can('software create')){
            abort(403);
        }
        return view('admin.blog.software.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {
            $request->validate([
                'name' => 'required'
            ]);

            Software::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name, '-'),
            ]);

            return redirect()->route('software.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(!Auth::user()->can('software show')){
            abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if(!Auth::user()->can('software update')){
            abort(403);
        }
        $software= Software::where('id', $id)->first();
        // return $software;
        return view('admin.blog.software.edit',compact('software'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(!Auth::user()->can('software update')){
            abort(403);
        }
        $request->validate([
            'name' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'slug' => $request->name
        ];
        Software::firstwhere('id', $id)->update($data);
        Session::flash('update');
        return redirect()->route('software.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(!Auth::user()->can('software delete')){
            abort(403);
        }
        Software::firstwhere('id', $id)->delete();
        Session::flash('delete');
        return redirect()->route('software.index');
    }
}
