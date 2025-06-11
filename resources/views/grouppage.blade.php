<?php $page_title = $groupdata->name; ?>

<link rel="stylesheet" href="css/grouppage.css">

@include('headers')
<br>
<br>
<br>
<br>
<div class="container">
    @if(count($cafe_data) > 0) 
        <div class="col-8">
            <div class="list-group" id="list-tab" role="tablist">
                @foreach($cafe_data as $cafe)
                    <a class="list-group-item list-group-item-action {{ $loop->first ? 'active' : '' }}" 
                       id="list-{{ $cafe->id }}-list" 
                       data-bs-toggle="list" 
                       href="#list-{{ $cafe->id }}" 
                       role="tab" 
                       aria-controls="list-{{ $cafe->id }}">
                        {{ $cafe->name }}
                    </a>
                @endforeach
            </div>
        </div>
        <div class="col-10">
            <div class="tab-content" id="nav-tabContent">
                @foreach($cafe_data as $cafe)
                    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" 
                         id="list-{{ $cafe->id }}" 
                         role="tabpanel" 
                         aria-labelledby="list-{{ $cafe->id }}-list">
                        @if($cafe->image)
                        <img src="data:image/jpeg;base64,{{ base64_encode($cafe->image) }}" 
                                 alt="{{ $cafe->name }}" 
                                 style="width: 660px; height: 438px;" />
                        @else
                            <img src="{{ asset('img/no_image.jpg') }}" alt="">
                        @endif
                        <div class="container">
                            <a href="{{ route('restaurant.restaurantpage', ['cafe_id' => $cafe->id, 'user_id' => $user_id]) }}">
                                <button class="button-restaurant">{{ $cafe->name }}に行く</button>
                            </a>
                        </div>
                        <form action="{{route('restaurant.roulettepage')}}" method="get">
                            <input type="hidden" name="group_id" value="<?= htmlspecialchars($groupdata->group_id) ?>">
                            <input type="hidden" name="user_id" value="<?= htmlspecialchars($user_id) ?>">
                            <input type="hidden" name="group_lati" value="<?= htmlspecialchars($groupdata->latitude) ?>">
                            <input type="hidden" name="group_long" value="<?= htmlspecialchars($groupdata->longitude) ?>">
                            <button type="submit" class="button-roulette">ルーレットで店を決める</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p>このグループにはレストランが登録されていません。</p>
    @endif
</div>

<script>
    // JavaScriptによるタブの有効化
    const triggerTabList = document.querySelectorAll('#list-tab a');
    triggerTabList.forEach(triggerEl => {
        const tabTrigger = new bootstrap.Tab(triggerEl);
        triggerEl.addEventListener('click', event => {
            event.preventDefault();
            tabTrigger.show();
        });
    });
</script>

@include('footer')
