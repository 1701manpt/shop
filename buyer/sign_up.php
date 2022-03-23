<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../icon/shop.ico" type="image/x-icon">
    <title>Đăng ký | Nghị Quân Shop</title>
</head>

<body>
    <div class="app">
        <?php require "../header.php"; ?>
        <div class="body">
            <div class="body-title">Đăng ký</div>
            <div class="body-content">
                <div class="sign">
                    <form class="sign-up">
                        <div class="sign-list sign-margin">
                            <div class="sign-item">
                                <label for="name">Họ và tên</label>
                                <input type="text" id="name" name="name" placeholder="Nhập tên của bạn" required>
                            </div>
                            <div class="sign-item">
                                <label for="address">Địa chỉ</label>
                                <input type="text" id="address" name="address" placeholder="Nhập địa chỉ để nhận hàng" required>
                            </div>
                            <div class="sign-item">
                                <label for="number_phone">Số điện thoại</label>
                                <input type="text" id="number_phone" name="number_phone" placeholder="0123456789" required>
                            </div>
                            <div class="sign-item">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" placeholder="abc@gmail.com" required>
                            </div>
                            <div class="sign-item">
                                <label for="password">Mật khẩu</label>
                                <input type="password" id="password" name="password" placeholder="Nên nhập mật khẩu có độ dài lớn hơn 8 ký tự (chữ, số, ký tự đặc biệt)" required>
                            </div>
                            <div class="sign-item">
                                <label for="repassword">Nhập lại</label>
                                <input type="password" id="repassword" placeholder="Nhập lại mật khẩu" required>
                            </div>
                        </div>
                        <div class="sign-control sign-margin">
                            <button>Đăng ký</button>
                        </div>
                        <div class="sign-control sign-margin">
                            <a href="sign_in.php">Bạn đã có tài khoản?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php

        if (
            isset($_GET["name"]) &&
            isset($_GET["address"]) &&
            isset($_GET["number_phone"]) &&
            isset($_GET["email"]) &&
            isset($_GET["password"])
        ) {
            $account = new Customer(array(
                "id" => null,
                "name" => $_GET["name"],
                "gender" => null,
                "address" => $_GET["address"],
                "number_phone" => $_GET["number_phone"],
                "email" => $_GET["email"],
                "password" => $_GET["password"],
                "date_create" => date("Y-m-d"),
                "state" => "normal"
            ));
            if ($account->insert()) {
                $str = "Đăng ký thành công!";
                echo '
                <div class="notification success">
                ' . $str . '
                </div>
                ';
            } else {
                $str = "Đăng ký thất bại!";
                echo '
                <div class="notification fail">
                ' . $str . '
                </div>
                ';
            }
        }
        ?>
    </div>
</body>

</html>