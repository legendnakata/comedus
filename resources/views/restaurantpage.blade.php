<?php $page_title = is_object($cafedata) ? $cafedata->name : 'デフォルトタイトル'; ?>

@include('headers')

    <script>
        function changeValue(id, delta) {
            const input = document.getElementById(id);
            let newValue = parseInt(input.value) + delta;
            if (newValue >= 0 && newValue <= 5) {
                input.value = newValue;
            }
        }
    </script>
    <style>
        textarea {
            width: 60%;
            height: 150px;
            resize: vertical;
        }

        input[type="number"] {
            width: 3%;
            padding: 15px;
            margin: 5px 0;
            font-size: 16px;
            text-align: center;
        }

        .button {
            padding: 10px 15px;
            font-size: 16px;
            margin: 0 5px;
            cursor: pointer;
        }
    </style>

    <div style="display: flex; gap: 10px; margin-top: 3%; margin-left: 3%">
        <h5>評価</h5>
        <div style="position: relative; width: 200px; height: 200px;">
            <img src="{{ asset('img/cup.png') }}" alt="Cup" style="position: absolute; top: 30px; left: 0; width: 100%; height: auto;">
            <img src="{{ asset('img/coffee_in_cup.png') }}" alt="Coffee" style="position: absolute; top: 30px; left: 0; width: 100%; height: auto; 
                clip-path: polygon(0% {{100 - $average_taste * 100 / 5}}%, 100% {{100 - $average_taste * 100 / 5}}%, 100% 100%, 0% 100%);">
            <h5 style="text-align: center; position: absolute; bottom: 5px; left: 0; width: 100%;">味の評価</h5>
        </div>
        <div style="position: relative; width: 200px; height: 200px;">
            <img src="{{ asset('img/cup.png') }}" alt="Cup" style="position: absolute; top: 30px; left: 0; width: 100%; height: auto;">
            <img src="{{ asset('img/coffee_in_cup.png') }}" alt="Coffee" style="position: absolute; top: 30px; left: 0; width: 100%; height: auto; 
                clip-path: polygon(0% {{100 - $average_price * 100 / 5}}%, 100% {{100 - $average_price * 100 / 5}}%, 100% 100%, 0% 100%);">
            <h5 style="text-align: center; position: absolute; bottom: 5px; left: 0; width: 100%;">値段の評価</h5>
        </div>
        <img src="data:image/jpeg;base64,{{ base64_encode($cafedata->image) }}" alt="" style="height: 400px; width: 300px; margin-left: 300px">
    </div>

    <h3>地図情報</h3>
    <iframe
        src="https://maps.google.com/maps?output=embed&q={{ urlencode($cafedata->latitude) }},{{ urlencode($cafedata->longitude) }}&ll={{ urlencode($cafedata->latitude) }},{{ urlencode($cafedata->longitude) }}&t=m&hl=ja&z=18"
        width="100%"
        height="450"
        style="border:0;"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
    ></iframe>
    <form action="{{route('restaurant.reputation')}}" method="GET"> <!-- methodをGETに設定 -->
        <!-- 隠しフィールド -->
        <input type="hidden" name="user_id" value="<?= htmlspecialchars($user_id) ?>">
        <input type="hidden" name="restaurant_id" value="<?= htmlspecialchars($cafedata->id) ?>">
        <input type="hidden" name="restaurant_name" value="<?= htmlspecialchars($cafedata->name) ?>">

        <h4>味の評価</h4>
        <button type="button" class="button" onclick="changeValue('taste', -1)">-</button>
        <input type="number" id="taste" name="taste" min="0" max="5" value="0" required>
        <button type="button" class="button" onclick="changeValue('taste', 1)">+</button>
        
        <h4>値段の評価</h4>
        <button type="button" class="button" onclick="changeValue('price', -1)">-</button>
        <input type="number" id="price" name="price" min="0" max="5" value="0" required>
        <button type="button" class="button" onclick="changeValue('price', 1)">+</button>
        
        <h4>コメント</h4>
        <textarea name="comment" placeholder="コメントを書き込んでください"></textarea> 
        
        <button type="submit">送信</button>
    </form>
    <h3>コメント欄</h3>
    <ul class = "list-group list-group-flush">
        @foreach($comments as $comment)
            <li class = "list-group-item">{{$comment}}</li>
        @endforeach
    </ul>
@include('footer')
