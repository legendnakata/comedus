<?php $page_title = "ログインページ"?>
@include('header')
<body>
    <div class="container">
        <form action="{{route('user.store')}}" method = "post" >
            @csrf
            <h4>ユーザーネーム</h4>
            <input type="text" name="name" placeholder="ユーザーネーム" required>
            <h4>パスワード</h4>
            <input type="password" name="password" placeholder="パスワード" required>
        
            <button type="submit">ログイン</button>
        </form>
    </div>   
    <a href="{{ route('user.registerpage') }}">登録はこちら</a> <!-- ルート名を修正 -->

</body>
@include('footer');