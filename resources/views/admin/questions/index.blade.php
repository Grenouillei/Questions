@extends('admin.main')

@section('content')
    <div class="content-1">
        <h1>{{$title}}</h1>
        <a href="{{route('admin.questions.create')}}">
            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                Create
            </button>
        </a>
    </div>
    <div class="content-2" >
        <table class="table-fixed" style="color: black;width: 100%;">
            <thead>
            <tr>
                <th class="w-1 px-6 py-2">#</th>
                <th class="w-1/2 px-4 py-2">Title</th>
                <th class="w-1/4 px-4 py-2">Category</th>
                <th class="w-1/4 px-4 py-2">Level</th>
                <th class="w-1/4 px-4 py-2">Action</th>
            </tr>
            </thead>
            <tbody>
            <p style="display: none">{{$i=0}}</p>
            @foreach($questions as $question)
                <p style="display: none">{{$i++}}</p>
                <tr @if($i%2==0) class="bg-gray-200" @endif>
                    <td class="border px-4 py-2">{{$question->id}}</td>
                    <td class="border px-4 py-2">{{$question->title}}</td>
                    <td class="border px-4 py-2">{{$question->category->title ?? '-'}}</td>
                    <td class="border px-4 py-2">{{$question->level->title ?? '-'}}</td>
                    <td class="border px-4 py-2">
                        <a href="{{route('admin.questions.edit',$question->id)}}">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                View
                            </button>
                        </a>
                        <form method="post" action="{{route('admin.questions.destroy',$question->id)}}" style="display: inline-block;margin-bottom: 0;">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>

        </table>
        <br>
        {{ $questions->links() }}
    </div>
    <script>
        localStorage.clear()
    </script>
@endsection
