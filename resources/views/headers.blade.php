<!-- header.php -->

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title><?php echo isset($page_title) ? htmlspecialchars($page_title) : 'comedus'; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f0f0f0;
        }
        header {
            background: linear-gradient(45deg, #FAFAD2, #DAA520); 
            padding: 20px;
            display: flex;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* ヘッダーのシャドウ */
        }
        header img {
            width: 100px; /* アイコンのサイズ */
            height: auto;
            margin-right: 20px; /* アイコンとテキストの間隔 */
            cursor: pointer;
        }
        h1 {
            margin: 0;
            color: black; /* ヘッダーのテキスト色 */
        }
        footer {
            background-color: #DAA520;
            padding: 10px;
            text-align: center;
            color: white; /* フッターのテキスト色 */
            margin-top: auto;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.2);
        }
        .container {
            display: flex;
            justify-content: center;
            width: 50%; 
        }
        form {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 70%; /* フォームの幅を70%に変更 */
            text-align: center;
            margin: 0 auto; /* フォームを中央に配置 */
        }
        .input-group {
            display: flex;
            align-items: center; 
        }
        input {
            flex: 1; 
            margin-left: 10px;
            width: calc(100% - 20px); /* 入力フィールドの幅を調整 */
            padding: 10px;
            border: 1px solid;
            border-radius: 4px;
            transition: border-color 0.3s;
            box-sizing: border-box;
        }
        input:focus {
            border-color: #DAA520;
            outline: none;
        }
        button {
            background-color: #DAA520;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            width: auto; /* ボタンの幅を自動に設定 */
            min-width: 100px; /* ボタンの最小幅を設定 */
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #c70039; /* ホバー時の背景色 */
            transform: scale(1.05); /* ホバー時に少し拡大 */
        }
    </style>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const icon = document.getElementById('icon');
        const currentPage = window.location.pathname.split('/').pop();
        const userId = <?php echo json_encode($_GET['user_id'] ?? 'null'); ?>;

        icon.addEventListener('click', function() {
            if (currentPage === 'login_page.php' || currentPage === 'form.php') {
                return;
            } else {
                window.location.href = `show_mypage.php?user_id=${userId}`;
            }
        });
    });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> <!-- Bootstrap JQuery -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script> <!-- Bootstrap Popper -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> <!-- Bootstrap JavaScript -->
</head>
<header>
    <img id="icon" src="{{ asset('img/icon.png') }}" alt="アイコン">
    <!-- アイコン画像 -->
    <h1><?php echo isset($page_title) ? htmlspecialchars($page_title) : 'comedus'; ?></h1>
</header>
