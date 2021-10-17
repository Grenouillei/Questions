<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Level;
use App\Models\Option;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index(){
        return view('admin.questions.index')->with([
            'title'=>'Questions',
            'questions'=>Question::paginate(10),
        ]);
    }

    public function create(){
        return view('admin.questions.form')->with([
            'title'=>'Question',
            'categories'=>Category::all(),
            'levels'=>Level::all(),
            'options'=>Option::all(),
        ]);
    }

    public function store(Request $request,Question $question){
        $question->fill($request->only($question->getFillable()));
        $question->save();
        $question->options()->attach($request->options);
        return redirect()->route('admin.questions.index');
    }

    public function edit(Question $question){
        return view('admin.questions.form')->with([
            'title'=>'Question',
            'question'=>$question,
            'categories'=>Category::all(),
            'levels'=>Level::all(),
            'options'=>Option::all(),
            ]);
    }

    public function update(Request $request,Question $question){
        $question->fill($request->only($question->getFillable()));
        $question->save();
        $question->options()->attach($request->options);
        return redirect()->route('admin.questions.index');
    }

    public function destroy(Question $question){
        $question->delete();
        return redirect()->route('admin.questions.index');
    }
}
