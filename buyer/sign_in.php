<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập | Nghị Quân Shop</title>
</head>

<body>
    <div class="app">
        <?php require "../header.php"; ?>
        <div class="body">
            <div class="body-title">Đăng nhập</div>
            <div class="body-content">
                <div class="sign">
                    <form class="sign-in">
                        <div class="sign-list sign-margin">
                            <div class="sign-item">
                                <label for="number_phone">Số điện thoại</label>
                                <input type="text" id="number_phone" name="number_phone" placeholder="Nhập số điện thoại" required>
                            </div>
                            <div class="sign-item">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" placeholder="Nhập email" required>
                            </div>
                            <div class="sign-item">
                                <label for="password">Mật khẩu</label>
                                <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
                            </div>
                        </div>
                        <div class="sign-control sign-margin">
                            <button>Đăng nhập</button>
                        </div>
                        <div class="sign-control sign-margin">
                            <a href="sign_up.php">Bạn chưa có tài khoản?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php

        if (empty($_SESSION['number_phone']) || empty($_SESSION["email"])) {

            // if (isset($cookie_name)) {

            //     if (isset($_COOKIE[$cookie_name])) {

            //         parse_str($_COOKIE[$cookie_name]);

            //         $sql2 = "select * from user where username='$usr' and password='$hash'";

            //         $result2 = mysql_query($sql2, $dbconect);

            //         if ($result2) {

            //             header('location:infomation.php');

            //             exit;
            //         }
            //     }
            // }
        }
        if (!empty($_SESSION["email"]) && !empty($_SESSION["number_phone"]) && !empty($_SESSION["password"])) {
            echo '
            <div class="notification success">
                Đã có tài khoản hiện đang đăng nhập
            </div>';
            exit;
        }

        if (isset($_GET['number_phone']) && isset($_GET['email']) && isset($_GET['password'])) {
            $number_phone = $_GET['number_phone'];
            $email = $_GET['email'];
            // $password = md5($_GET['password']);
            $password = $_GET['password'];

            // $a_check = ((isset($_GET['remember']) != 0) ? 1 : "");
            $a_check = 0;

            if ($number_phone == "" || $email == "" || $password == "") {
                echo '
                <div class="notification fail">
                    Vui lòng nhập đầy đủ thông tin
                </div>';
                exit;
            } else {
                if (!(new Customer([]))->is_signin($number_phone, $email, $password)) {
                    echo '
                    <div class="notification fail">
                        Đăng nhập thất bại
                    </div>';
                    exit;
                }
                if ((new Customer([]))->is_signin($number_phone, $email, $password)) {
                    $_SESSION['number_phone'] = $number_phone;
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
                    if ($a_check == 1) {
                        setcookie("siteAuth", 'usr=' . $email . '&hash=' . $password, time() + (3600 * 24 * 30));
                    }
                    echo '
                        <div class="notification success">
                            Đăng nhập thành công
                        </div>';
                    exit;
                }
            }
        } else {
            if (!isset($_SESSION["number_phone"]) || !isset($_SESSION["email"]) || !isset($_SESSION["password"])) {
                echo '
                <div class="notification success">
                    Vui lòng đăng nhập để tiếp tục
                </div>';
                exit;
            }
        }
        ?>
    </div>
</body>

</html>