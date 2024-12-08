<?php
    $page_title = "コメダスルーレット";
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title ?></title>
    <link rel="stylesheet" href="{{ asset('css/roulette.css') }}">
    <style>
	.pin-image {
		width: 50px;
		height: auto;
	}
	.roulette-image {
		width: 300px;
		height: auto;
		margin-top: -5px;
	}
    </style>

</head>
<body>
    <div class="container">
        <h1>コメダスルーレット</h1>
        
	<img src="{{asset('img/roulette_pin.png')}}" alt="ピン" class="pin-image">
        <img src="{{asset('img/roulette.png')}}" 
             alt="ルーレット" class="roulette-image">

        <form action="roulette_action.php" method="get">
            <div class="form-group">
                <label for="distance">検索範囲を選択してください</label>
                <select name="distance" id="distance" onchange="this.classList.add('selected')">
                    <option value="0.5">0.5km以内</option>
                    <option value="1">1km以内</option>
                    <option value="1.5">1.5km以内</option>
                    <option value="2">2km以内</option>
                </select>
            </div>
            <input type="hidden" name="group_id" value="<?= htmlspecialchars($group_id) ?>">
            <input type="hidden" name="user_id" value="<?= htmlspecialchars($user_id) ?>">
            <input type="hidden" name="group_lati" value="<?= htmlspecialchars($group_lati) ?>">
            <input type="hidden" name="group_long" value="<?= htmlspecialchars($group_long) ?>">
            
            <button type="submit" class="roulette-button">ルーレットスタート</button>
        </form>
    </div>

    <script>
        document.querySelector('button').addEventListener('click', function() {
            document.querySelector('.roulette-image').style.animationDuration = '0.5s';
        });
    </script>
</body>
</html>
