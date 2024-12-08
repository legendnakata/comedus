<?php $page_title = "マイページ"; ?>

@include('headers')

<body>
    <div class="container">
        <form action="{{ route('group.search') }}" method="GET">
            <div class="input-group">
                <input type="hidden" name="user_id" value="{{ $user_id }}">
                <input type="text" name="group_name" placeholder="グループを検索">
                <button type="submit">検索</button>
            </div>
        </form>
    </div>

    @if(isset($groups) && $groups->isNotEmpty())
        <div class="container">
            <ul class="list-group list-group-flush" style="list-style-type: none; width: 70%;">
                @foreach($groups as $group)
                    <li>
                        <a href="{{ route('group.grouppage', ['user_id' => $user_id, 'group_id' => $group->id]) }}" class="list-group-item list-group-item-action">{{ $group->name }}</a>
                    </li> 
                @endforeach
            </ul>
        </div>
    @endif
</body>

@include('footer')
