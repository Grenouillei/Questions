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
        <div style="float: left;width: 50%">
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
                <input type="text" name="options[]" id="options" value="">
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded float-right">
                    Save
                </button>
            </form>
        </div>
        <div style="float: left;width: 50%">
            <h1 style="font-size: 20px;font-weight: bold">Options</h1>
            <div id="js-table">

            </div>
                @include('admin.questions.table')
            <a href="{{route('admin.options.create')}}">
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded float-right">
                    Create Option
                </button>
            </a>

        </div>

    </div>

    <script>
        let option_id = '{{session('option')}}';
        let array = [];
        localStorage.setItem('option'+option_id , option_id);

            for (let i = 1; i < localStorage.length; i++){
                let key = localStorage.key(i);
                array.push(localStorage.getItem(key));
            }

        $('#options').val(array);

            $.ajax({
                url: "{{route('admin.question_options')}}",
                method: 'get',
                dataType: 'json',
                contentType: 'application/json; charset=utf-8',
                data: { options : array },
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            }).done(function(response) {
                $('#js-table').html(response);
            });
    </script>

@endsection


