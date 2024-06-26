<?php

namespace App\Http\Controllers\Admin\Ajax;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function subcategoryByCategoryId($id){
        $subcategory = SubCategory::where('category_id', $id)->get();
        return response()->json($subcategory);
    }
}
