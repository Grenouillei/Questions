@extends('admin.main')

@section('content')
    <div class="content-1">
        <h1>{{$title}}</h1>
        <a href="{{route('admin.categories.index')}}">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Back
            </button>
        </a>
    </div>
    <div class="content-2">
        <form class="w-full max-w-lg"  method="post"
              action="{{(isset($category->id)) ? route('admin.categories.update',['category'=>$category->id])  : route('admin.categories.store') }}">
            @csrf
            @if (isset($category))
                @method('PUT')
            @endif
            @csrf
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full  px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                        Title
                    </label>
                    <input name="title" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                           id="grid-last-name" type="text" placeholder="title" value="{{$category->title ?? ''}}">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                        Alias
                    </label>
                    <input name="alias" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                           id="grid-last-name" type="text" placeholder="alias" value="{{$category->alias ?? ''}}">
{{--                    <p class="text-gray-600 text-xs italic">Make it as long and as crazy as you'd like</p>--}}
                </div>
            </div>
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded float-right">
                Save
            </button>
        </form>
    </div>
@endsection
