<?php

namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use App\Models\Service\Service;
use App\Models\Service\ServiceSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Image;

class ServicesliderController extends Controller
{
    public function create($id)
    {

        if (!Auth::user()->can('service create')) {
            abort(403);
        }
        $service = Service::with('sliders')->firstWhere('id', $id);
        $photos = ServiceSlider::where('service_id', $id)->get();
        // return $photos;
        return view('admin.services.slider.create', compact('service', 'photos'));
    }

    public function store(Request $request, $id)
    {
        // return $request->all();
        // $request->validate(
        //     [
        //         'ordernumber' => 'required|array'
        //     ]
        // );


        $old = ServiceSlider::where('service_id', $id)->delete();
        if (!empty($request->ordernumber)) {
            foreach ($request->ordernumber as $key => $item) {
                // Store Image
                if ($request->thumbnails && array_key_exists($key, $request->thumbnails)) {
                    $file_name = null;
                    if ($request->file('thumbnails')[$key]) {
                        $file_name = $request->file('thumbnails')[$key]->store('service/slider');


                    }

                    ServiceSlider::create([
                        'service_id'   => $id,
                        'video'        => null,
                        'thumbnail'    => $file_name,
                        'order_number' => $key,
                    ]);
                }

                $checkdata = ($request->thumbnails && array_key_exists($key, $request->thumbnails)) ? false : true;

                if ($request->images && array_key_exists($key, $request->images) && $checkdata) {
                        ServiceSlider::create([
                            'service_id'   => $id,
                            'video'        => null,
                            'thumbnail'    => $request->images[$key],
                            'order_number' => $key,
                        ]);
                }


                // Store IFrame
                if ($request->iframes && array_key_exists($key, $request->iframes)) {
                    ServiceSlider::create([
                        'service_id'   => $id,
                        'video'        => $request->iframes[$key],
                        'thumbnail'    => null,
                        'order_number' => $key,
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
