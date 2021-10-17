<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.categories.index')->with(['title'=>'Categories','categories'=>Category::paginate(10)]);
    }

    public function create(){
        return view('admin.categories.form')->with(['title'=>'Category']);
    }

    public function store(Request $request,Category $category){
        $category->fill($request->only($category->getFillable()));
        $category->save();
        return redirect()->route('admin.categories.index');
    }

    public function edit(Category $category){
        return view('admin.categories.form')->with(['title'=>'Category','category'=>$category]);
    }

    public function update(Request $request,Category $category){
        $category->fill($request->only($category->getFillable()));
        $category->save();
        return redirect()->route('admin.categories.index');
    }

    public function destroy(Category $category){
        $category->delete();
        return redirect()->route('admin.categories.index');
    }
}
