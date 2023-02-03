<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function addCategory(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $category = new Category;
            $category->name = $data['category_name'];
            $category->description = $data['description'];
            $category->url = $data['url'];
            $category->save();
            // redirect to view categories page with success message
            return redirect('/admin/view-categories')->with('flash_message_success', 'Category Successfully Added!');
        }
        return view('admin.categories.add_category');
    }

    public function viewCategory(){
        $categories = Category::get();
        return view('admin.categories.view_categories')->with(compact('categories'));
    }

    public function editCategory(Request $request, $id = null){
        if($request->ismethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            Category::where(['id'=>$id])->update(['name'=>$data['category_name'], 'description'=>$data['description'], 'url'=>$data['url']]);
            return redirect('/admin/view-categories')->with('flash_message_success', 'Category Updated Successfully!');
        }
        $categoryDetails = Category::where(['id' =>$id])->first();
        return view('admin.categories.edit_category')->with(compact('categoryDetails'));
    }

}
