@extends('main')

@section('content')
    <div class="home-blocks">
        <div class="inner-block">
            <div class="blue-block">
                <h2>Hard</h2>
                @foreach($categories as $category)
                    {{$category->title}}
                @endforeach
            </div>
            <div class="red-block">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Button
                </button>
                <h2>*******</h2>
            </div>
            <div class="green-block">
                <h2>Normal</h2>
            </div>
            <div class="yellow-block">
                <h2>Light</h2>
            </div>
        </div>
    </div>

@endsection
