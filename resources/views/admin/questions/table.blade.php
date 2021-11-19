
@if($options->isNotEmpty())
    <table class="table-fixed" style="color: black;width: 100%;float: left">
        <thead>
        <tr>
            <th class="w-1/12 px-2 py-2">#</th>
            <th class="w-1/2 px-2 py-2">Title</th>
            <th class="w-1/10 px-2 py-2">Action</th>
        </tr>
        </thead>
        <tbody>
        <p style="display: none">{{$i=0}}</p>
        @foreach($options as $option)
            <p style="display: none">{{$i++}}</p>
            <tr @if($i%2!=0) class="bg-gray-200" @endif>
                <td class="border px-4 py-2">{{$option->id}}</td>
                <td class="border px-4 py-2">{{$option->title}}</td>
                <td class="border px-6 py-2">
                    <a href="{{route('admin.options.edit',$option->id)}}">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            View
                        </button>
                    </a>
                    <form method="post" action="{{route('admin.options.destroy',$option->id)}}" style="display: inline-block;margin-bottom: 0;">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded js-delete-option" data-action="{{$option->id}}">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <script>
        $('.js-delete-option').on('click',function (){
            let id = $(this).data('action');
            localStorage.removeItem('option'+id);
        });
    </script>
@endif
