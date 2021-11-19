<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function index(){
        return view('admin.options.index')->with(['title'=>'Options','options'=>Option::paginate(10)]);
    }

    public function create(){
        return view('admin.options.form')->with(['title'=>'Option']);
    }

    public function store(Request $request,Option $option){
        $option->fill($request->only($option->getFillable()));
        $option->save();
        return redirect()->route('admin.questions.create')->with('option',$option->id);
    }

    public function edit(Option $option){
        return view('admin.options.form')->with(['title'=>'Option','option'=>$option]);
    }

    public function update(Request $request,Option $option){
        $option->fill($request->only($option->getFillable()));
        $option->save();
        return redirect()->route('admin.options.index');
    }

    public function destroy(Option $option){
        $option->delete();
        return redirect()->back();
    }
}
