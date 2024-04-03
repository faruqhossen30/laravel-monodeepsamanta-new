<?php

namespace App\Http\Controllers\Admin\Portfolio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PortfolioImageController extends Controller
{
    public function index(){
        return view('admin.portfolio.addimage');
    }
}
