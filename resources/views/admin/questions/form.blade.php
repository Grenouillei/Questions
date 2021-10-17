@extends('admin.main')

@section('content')
    <div class="content-1">
        <h1>{{$title}}</h1>
        <a href="{{route('admin.questions.index')}}">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Back
            </button>
        </a>
    </div>
    <div class="content-2">
        <form class="w-full max-w-lg"  method="post"
              action="{{(isset($question->id)) ? route('admin.questions.update',['question'=>$question->id])  : route('admin.questions.store') }}">
            @csrf
            @if (isset($question))
                @method('PUT')
            @endif
            @csrf
            <div class="flex flex-wrap -mx-3 mb-4">
                <div class="w-full  px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                        Title
                    </label>
                    <input name="title" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                           id="grid-last-name" type="text" placeholder="title" value="{{$question->title ?? ''}}">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-2">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                        Alias
                    </label>
                    <input name="alias" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                           id="grid-last-name" type="text" placeholder="alias" value="{{$question->alias ?? ''}}">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-4">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                        Correct Answer
                    </label>
                    <input name="correct" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                           id="grid-last-name" type="text" placeholder="correct" value="{{$question->correct ?? ''}}">
                    <p class="text-gray-600 text-xs italic">Make it as long and as crazy as you'd like</p>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                        Category
                    </label>
                    <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            name="category_id">
                        <option value="">Not Selected</option>
                        @foreach($categories as $category)
                            <option @if(isset($question) && $question->category_id == $category->id) selected @endif value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                        Level
                    </label>
                    <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            name="level_id">
                        <option value="">Not Selected</option>
                        @foreach($levels as $level)
                            <option @if(isset($question) && $question->level_id == $level->id) selected @endif value="{{$level->id}}">{{$level->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                        Options
                    </label>
                    <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            name="options[]">
                        <option value="">Not Selected</option>
                        @foreach($options as $option)
                            <option value="{{$option->id}}">{{$option->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded float-right">
                Save
            </button>
        </form>
    </div>
@endsection

<script>

</script>
