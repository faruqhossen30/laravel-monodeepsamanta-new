<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatSectionController extends Controller
{
    public function chatsection(){
        if(!Auth::user()->can('chat setting')){
            abort(403);
        }
        $testmonialvideo = option('chat_section_thumbnail');
        return view('admin.setting.chat-section',compact('testmonialvideo'));
    }

    public function chatsectionStore(Request $request){

        // return $request->all();

        if($request->file('thumbnail')){
            $file_name = $request->file('thumbnail')->store('chatsection');
            option(['chat_section_thumbnail' => $file_name]);
        }
        return redirect()->back();
    }




}
