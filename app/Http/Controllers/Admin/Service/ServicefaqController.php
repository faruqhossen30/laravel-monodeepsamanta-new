<?php

namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use App\Models\Service\Service;
use App\Models\Service\ServiceFaq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServicefaqController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create($id){


        if(!Auth::user()->can('service create')){
            abort(403);
        }
        $service = Service::firstWhere('id', $id);
        $faqs    = ServiceFaq::where('service_id', $id)->get();
        return view('admin.services.faq.create',compact('service','faqs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id){

        if(!Auth::user()->can('service update')){
            abort(403);
        }
        $request->validate([
            'question' => 'required',
            'answer'   => 'required',
        ]);
        if(!empty($request->question)){
            $answer = $request->answer;
            ServiceFaq::where('service_id', $id)->delete();

            foreach($request->question as  $index => $question){
                ServiceFaq::create([
                    'service_id' => $id,
                    'question'   => $question,
                    'answer'     => $answer[$index]
                ]);
            }
        }
        return redirect()->route('service.index');

    }
}
