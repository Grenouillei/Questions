@extends('main')

@section('content')
    <div class="home-blocks">
        <div class="inner-block">
            <div class="blue-block">
                <h2>Hard</h2>
                @foreach($categories as $category)
                    {{$category->title}}<br>
                @endforeach
            </div>
            <div class="red-block">
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
