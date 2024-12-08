<?php $page_title = "登録ページ"; ?>
@include('header')

<body>
    <div class="container">
        <form action="{{ route('user.register') }}" method="POST">
            @csrf
            <h4>ユーザーネーム</h4>
            <input type="text" name="name" placeholder="ユーザーネーム" required>
            <h4>パスワード</h4>
            <input type="password" name="password" placeholder="パスワード" required>
            <h4>パスワード確認</h4>
            <input type="password" name="password_confirmation" placeholder="パスワード確認" required>
            
            <button type="submit">登録</button>
        </form>
    </div>  
    @if ($errors->any())
        <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
        </ul>
        </div>
    @endif
</body>
@include('footer');
