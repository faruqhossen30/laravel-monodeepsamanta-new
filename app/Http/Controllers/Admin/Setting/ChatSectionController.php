<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatSectionController extends Controller
{
    public function chatsection(){
        if(!Auth::user()->can('chatsatting')){
            abort(403);
        }

        return view('admin.setting.chat-section');
    }
}
