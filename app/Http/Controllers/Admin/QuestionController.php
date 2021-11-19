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

    public function create(Question $question){
        return view('admin.questions.form')->with([
            'title'=>'Question',
            'categories'=>Category::all(),
            'levels'=>Level::all(),
            'options'=>$question->options,
        ]);
    }

    public function store(Request $request,Question $question){
        $question->fill($request->only($question->getFillable()));
        $question->save();
        $question->options()->sync(explode(',',$request->options[0]));
        return redirect()->route('admin.questions.index');
    }

    public function edit(Question $question){
        return view('admin.questions.form')->with([
            'title'=>'Question',
            'question'=>$question,
            'categories'=>Category::all(),
            'levels'=>Level::all(),
            'options'=>$question->options,
        ]);
    }

    public function update(Request $request,Question $question){
        $question->fill($request->only($question->getFillable()));
        $question->save();
        $question->options()->sync($request->options);
        return redirect()->route('admin.questions.index');
    }

    public function destroy(Question $question){
        $question->delete();
        return redirect()->route('admin.questions.index');
    }

    public function getOptions(Request $request){
        $options = Option::whereIn('id',$request->options)->get();
            $view = view('admin.questions.table')->with([
                'options'=>$options,
            ]);
        return response()->json($view->render());
    }
    public function storeOptions(){

    }
}
