<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addCategory(Request $request){
        // if($request->isMethod('post')){
        //     $data = $request->all();
            
        // }
        return view('admin.categories.add_category');
    }
}
