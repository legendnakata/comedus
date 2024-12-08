<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title><?php echo isset($page_title) ? htmlspecialchars($page_title) : 'comedus'; ?></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
        header img {
            width: 100px;
            height: auto;
            margin-right: 20px;
            cursor: pointer;
        }
        h1 {
            margin: 0;
            color: black;
        }
        footer {
            background-color: #DAA520;
            padding: 10px;
            text-align: center;
            color: white;
            margin-top: auto;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.2);
        }
        .container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        form {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            text-align: center;
        }
        input {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
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
            width: 100%;
            transition: background-color 0.3s;
        }
        button:hover {
            border-color: #ffcc00;
        }
        .button-roulette {
            background-color: #ff5733;
            color: white;
            padding: 15px 30px;
            font-size: 18px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s transform 0.2s; 
        }
        .gorest{
            background-color: #ff5733;
            color: white;
            padding: 15px 30px;
            font-size: 18px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 200%;
            transition: background-color 0.3s transform 0.2s; 
        }
        button:hover {
            border-color: #c70039;
            transform: scale(1.05);
        }
        .input-group {
            display: flex;
            align-items: center; 
        }
        input {
            flex: 1; 
            margin-left: 10px;
        }
        .image-container {
            position: relative;
            display: inline-block;
        }
        .image-container img {
            display: block;
            max-width: 100%;
            height: auto;
        }
        .img-container img:nth-of-type(2){
            position: absolute;
            right: 0%;
            bottom: 0%;
            width: 50%;
            height: auto;
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
</head>
<body>
<header>
    <img id="icon" src="{{ asset('img/icon.png') }}" alt="アイコン">
    <h1><?php echo isset($page_title) ? htmlspecialchars($page_title) : 'comedus'; ?></h1>
</header>


<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>
