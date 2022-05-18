<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng | Nghị Quân Shop</title>
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
                        <div class="cart-selects">
                            <label for="cart-selects">Chọn tất cả</label>
                            <input class="js-cart-selects" type="checkbox" id="cart-selects" style="display: none;">
                        </div>
                        <div class="cart-orders">
                            <button>Đặt hàng</button>
                        </div>
                    </div>
                    <div class="cart-list">
                        <div class="product">
                            <div class="product-select product-margin">
                                <input type="checkbox" name="remove" id="">
                            </div>
                            <div class="product-image product-margin">
                                <img src="https://cf.shopee.vn/file/01336807163f0170f99bf8ccdeb64811_tn" alt="">
                            </div>
                            <div class="product-name product-margin">Áo quần oversize</div>
                            <div class="product-price product-margin">Giá: 999999 đ</div>
                            <div class="product-quantily product-margin">
                                <span>Số lượng</span>
                                <input type="number" name="quantily" id="quantily" step="1" min="1" value="1">
                            </div>
                            <a class="product-control product-margin" href="/buyer/order.php">
                                <button>Đặt hàng</button>
                            </a>
                            <div class="product-control product-margin">
                                <button>Xóa</button>
                            </div>
                        </div>
                        <div class="product">
                            <div class="product-select product-margin">
                                <input type="checkbox" name="remove" id="">
                            </div>
                            <div class="product-image product-margin">
                                <img src="https://cf.shopee.vn/file/01336807163f0170f99bf8ccdeb64811_tn" alt="">
                            </div>
                            <div class="product-name product-margin">Áo quần oversize</div>
                            <div class="product-price product-margin">Giá: 999999 đ</div>
                            <div class="product-quantily product-margin">
                                <span>Số lượng</span>
                                <input type="number" name="quantily" id="quantily" step="1" min="1" value="1">
                            </div>
                            <a class="product-control product-margin" href="/buyer/order.php">
                                <button>Đặt hàng</button>
                            </a>
                            <div class="product-control product-margin">
                                <button>Xóa</button>
                            </div>
                        </div>
                        <div class="product">
                            <div class="product-select product-margin">
                                <input type="checkbox" name="remove" id="">
                            </div>
                            <div class="product-image product-margin">
                                <img src="https://cf.shopee.vn/file/01336807163f0170f99bf8ccdeb64811_tn" alt="">
                            </div>
                            <div class="product-name product-margin">Áo quần oversize</div>
                            <div class="product-price product-margin">Giá: 999999 đ</div>
                            <div class="product-quantily product-margin">
                                <span>Số lượng</span>
                                <input type="number" name="quantily" id="quantily" step="1" min="1" value="1">
                            </div>
                            <a class="product-control product-margin" href="/buyer/order.php">
                                <button>Đặt hàng</button>
                            </a>
                            <div class="product-control product-margin">
                                <button>Xóa</button>
                            </div>
                        </div>
                        <div class="product">
                            <div class="product-select product-margin">
                                <input type="checkbox" name="remove" id="">
                            </div>
                            <div class="product-image product-margin">
                                <img src="https://cf.shopee.vn/file/01336807163f0170f99bf8ccdeb64811_tn" alt="">
                            </div>
                            <div class="product-name product-margin">Áo quần oversize</div>
                            <div class="product-price product-margin">Giá: 999999 đ</div>
                            <div class="product-quantily product-margin">
                                <span>Số lượng</span>
                                <input type="number" name="quantily" id="quantily" step="1" min="1" value="1">
                            </div>
                            <a class="product-control product-margin" href="/buyer/order.php">
                                <button>Đặt hàng</button>
                            </a>
                            <div class="product-control product-margin">
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