<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index(){
        return view('admin.levels.index')->with(['title'=>'Levels','levels'=>Level::paginate(10)]);
    }

    public function create(){
        return view('admin.levels.form')->with(['title'=>'Level']);
    }

    public function store(Request $request,Level $level){
        $level->fill($request->only($level->getFillable()));
        $level->save();
        return redirect()->route('admin.levels.index');
    }

    public function edit(Level $level){
        return view('admin.levels.form')->with(['title'=>'Level','level'=>$level]);
    }

    public function update(Request $request,Level $level){
        $level->fill($request->only($level->getFillable()));
        $level->save();
        return redirect()->route('admin.levels.index');
    }

    public function destroy(Level $level){
        $level->delete();
        return redirect()->route('admin.levels.index');
    }
}
