<aside>

    <div class="sidebar-info">
        <p class="text-center">Username: {{auth()->user()->name}}</p>
        <p class="text-center">Level: 1</p>
        <p class="text-center">Tasks: 0</p>
        <p class="text-center">Events: 0</p>
    </div>

    <div class="sidebar-menu">
        <div class="menu">
            <ul>
                <li><a href="{{route('admin.questions.index')}}">Questions</a></li>
                <li><a href="{{route('admin.levels.index')}}">Levels</a></li>
                <li><a href="{{route('admin.categories.index')}}">Categories</a></li>
                <li><a href="{{route('admin.options.index')}}">Options</a></li>
            </ul>
        </div>
    </div>

    <div class="sidebar-network">
        <p class="text-center" style="font-size: 10px;padding-top:10%;">©question2021</p>
    </div>

</aside>

