<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../icon/shop.ico" type="image/x-icon">
    <title>Tài khoản | Nghị Quân Shop</title>
</head>

<?php
require_once "check_account.php";
?>

<body>
    <div class="app">
        <?php
        require "../header.php";
        ?>
        <div class="body">
            <div class="body-title">Tài khoản</div>
            <div class="body-content">
                <a href="sign_out.php"><button>Đăng xuất</button></a>
            </div>
        </div>
    </div>

</body>

</html>