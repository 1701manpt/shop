<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
</head>

<body>
    <div class="app">
        <?php
        require "../header.php";
        ?>
        <div class="body">
            <div class="body-title">Giỏ hàng</div>
            <div class="body-content">
                <div class="cart">
                    <div class="cart-header">
                        
                    </div>
                    <div class="cart-list">
                        <div class="cart-item">
                            <div class="cart-item-image">
                                <img src="https://cf.shopee.vn/file/4ca46298d35a2354c81e4c939d9498bc_tn" alt="">
                            </div>
                            <div class="cart-item-name">Bàn phím máy tính</div>
                            <div class="cart-item-price">99999 đ</div>
                            <div class="cart-item-amount">
                                <input type="number" min="1" step="1">
                            </div>
                            <div class="cart-item-select">
                                <input type="checkbox">
                            </div>
                            <div class="cart-item-delete">
                                <button>Xóa</button>
                            </div>
                        </div>
                        <div class="cart-item">
                            <div class="cart-item-image">
                                <img src="https://cf.shopee.vn/file/4ca46298d35a2354c81e4c939d9498bc_tn" alt="">
                            </div>
                            <div class="cart-item-name">Bàn phím máy tính</div>
                            <div class="cart-item-price">99999 đ</div>
                            <div class="cart-item-amount">
                                <input type="number" min="1" step="1">
                            </div>
                            <div class="cart-item-select">
                                <input type="checkbox">
                            </div>
                            <div class="cart-item-delete">
                                <button>Xóa</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>