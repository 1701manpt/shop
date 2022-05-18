<?php require_once 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="http://nghiquan.shop/favicon.ico" type="image/x-icon">
    <title>Sign In - Administrator</title>
    <link rel="stylesheet" href="./index.css">
</head>
<body>
    <div class="app">
        <div class="app-backdrop"></div>
        <div class="app-header">Nghị Quân Shop Admin Center</div>
        <div class="app-body">
            <div class="sign_in-backdrop"></div>
            <div class="sign_in">
                <div class="sign_in-header">Đăng nhập</div>
                <div class="sign_in-body">
                    <div class="sign_in-body-item">
                        <label for="">Tên đăng nhập</label>
                        <input type="text" placeholder="Nhập email">
                    </div>
                    <div class="sign_in-body-item">
                        <label for="">Mật khẩu</label>
                        <input type="password" placeholder="Nhập mật khẩu">
                    </div>
                </div>
                <div class="sign_in-footer">
                    <a href="./">
                        <button class="sign_in-footer-btn sign_in-footer-btn--primary">Đăng nhập</button>
                    </a>
                    <!-- <button class="sign_in-footer-btn sign_in-footer-btn--secondary">Quên</button> -->
                    <a href="./sign_up">Bạn chưa có tài khoản?</a>
                    <a href="./forget_password">Quên mật khẩu!</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>