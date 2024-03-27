<?php

namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use App\Models\Admin\Service\Service;
use App\Models\Admin\Service\ServiceSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image ;
class ServicesliderController extends Controller
{
    public function create($id){

        $service = Service::firstWhere('id', $id);
        $photos = ServiceSlider::where('service_id', $id)->get();
        // return $photos;
        return view('admin.services.slider.create', compact('service', 'photos'));

    }

    public function store(Request $request, $id)
    {
        // return $request->all();


        foreach($request->slider as $slider){
            ServiceSlider::create([
                'service_id'=> $id,
                'thumbnail'=> $slider,
            ]);
        }






        return redirect()->route('service.index');
    }



    public function removeImage(string $id)
    {
        $slider = ServiceSlider::firstWhere('id', $id);

        // return $slider;
        if ($slider->thumbnail) {
            $path = 'uploads/service/slider/' . $slider->thumbnail;

            if (file_exists($path)) {
                unlink($path);
                // echo 'File ' . $image->image . ' has been deleted';
            }
        }

        if ($slider->video) {
            $path = 'uploads/service/video/' . $slider->video;

            if (file_exists($path)) {
                unlink($path);
                // echo 'File ' . $image->image . ' has been deleted';
            }
        }



        $slider->delete();

        // return $image;
        return redirect()->back();
    }
}
