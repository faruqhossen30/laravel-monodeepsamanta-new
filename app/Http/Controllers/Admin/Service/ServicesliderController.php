<?php

namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use App\Models\Service\Service;
use App\Models\Service\ServiceSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class ServicesliderController extends Controller
{
    public function create($id)
    {

        $service = Service::with('sliders')->firstWhere('id', $id);
        $photos = ServiceSlider::where('service_id', $id)->get();
        // return $service;
        return view('admin.services.slider.create', compact('service', 'photos'));
    }

    public function store(Request $request, $id)
    {
        // return $request->all();
        $request->validate(
            [
                'slider' => 'required|array'
            ],
            [
                'slider.required' => 'Image of Video code not found'
            ]
        );


        if (!empty($request->slider)) {
            $old = ServiceSlider::where('service_id', $id)->delete();
            foreach ($request->slider as $slider) {
                $is_video = str_contains($slider, 'https://iframe.mediadelivery.net');
                if ($is_video) {
                    ServiceSlider::create([
                        'service_id' => $id,
                        'video' => $slider,
                        'thumbnail' => null,
                    ]);
                } else {
                    ServiceSlider::create([
                        'service_id' => $id,
                        'thumbnail' => $slider,
                        'video' => null,
                    ]);
                }
            }
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
