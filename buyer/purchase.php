<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn hàng | Nghị Quân Shop</title>
</head>

<?php require_once "check_account.php"; ?>

<body>
    <div class="app">
        <?php
        require "../header.php";
        ?>
        <div class="body">
            <div class="body-title">Đơn hàng</div>
            <div class="body-content">
                <div class="purchase">
                    <div class="purchase-menu jsPurchaseMenu">
                        <a href="?type=1">Chờ xác nhận</a>
                        <a href="?type=2">Đã xác nhận</a>
                        <a href="?type=3">Đang giao</a>
                        <a href="?type=4">Đã giao</a>
                        <a href="?type=5">Đã hủy</a>
                    </div>
                    <div class="purchase-list">
                        <div class="order">
                            <div class="order-id order-margin">Đơn hàng 1</div>
                            <div class="order-image order-margin">
                                <img src="https://cf.shopee.vn/file/ee411c2bb49cae053fd3a0c054943386_tn" alt="">
                            </div>
                            <div class="order-amount order-margin">Tổng 16 sản phẩm khác nhau</div>
                            <div class="order-price order-margin">Tổng giá tiền 99999 đ</div>
                            <a class="order-control order-margin" href="/buyer/order_detail.php?id=1">
                                <button>Xem chi tiết</button>
                            </a>
                            <div class="order-control order-margin">
                                <button>Hủy</button>
                            </div>
                        </div>
                        <div class="order">
                            <div class="order-id order-margin">Đơn hàng 1</div>
                            <div class="order-image order-margin">
                                <img src="https://cf.shopee.vn/file/ee411c2bb49cae053fd3a0c054943386_tn" alt="">
                            </div>
                            <div class="order-amount order-margin">Tổng 16 sản phẩm khác nhau</div>
                            <div class="order-price order-margin">Tổng giá tiền 99999 đ</div>
                            <a class="order-control order-margin" href="/buyer/order_detail.php?id=1">
                                <button>Xem chi tiết</button>
                            </a>
                            <div class="order-control order-margin">
                                <button>Hủy</button>
                            </div>
                        </div>
                        <div class="order">
                            <div class="order-id order-margin">Đơn hàng 1</div>
                            <div class="order-image order-margin">
                                <img src="https://cf.shopee.vn/file/ee411c2bb49cae053fd3a0c054943386_tn" alt="">
                            </div>
                            <div class="order-amount order-margin">Tổng 16 sản phẩm khác nhau</div>
                            <div class="order-price order-margin">Tổng giá tiền 99999 đ</div>
                            <a class="order-control order-margin" href="/buyer/order_detail.php?id=1">
                                <button>Xem chi tiết</button>
                            </a>
                            <div class="order-control order-margin">
                                <button>Hủy</button>
                            </div>
                        </div>
                        <div class="order">
                            <div class="order-id order-margin">Đơn hàng 1</div>
                            <div class="order-image order-margin">
                                <img src="https://cf.shopee.vn/file/ee411c2bb49cae053fd3a0c054943386_tn" alt="">
                            </div>
                            <div class="order-amount order-margin">Tổng 16 sản phẩm khác nhau</div>
                            <div class="order-price order-margin">Tổng giá tiền 99999 đ</div>
                            <a class="order-control order-margin" href="/buyer/order_detail.php?id=1">
                                <button>Xem chi tiết</button>
                            </a>
                            <div class="order-control order-margin">
                                <button>Hủy</button>
                            </div>
                        </div>
                        <div class="order">
                            <div class="order-id order-margin">Đơn hàng 1</div>
                            <div class="order-image order-margin">
                                <img src="https://cf.shopee.vn/file/ee411c2bb49cae053fd3a0c054943386_tn" alt="">
                            </div>
                            <div class="order-amount order-margin">Tổng 16 sản phẩm khác nhau</div>
                            <div class="order-price order-margin">Tổng giá tiền 99999 đ</div>
                            <a class="order-control order-margin" href="/buyer/order_detail.php?id=1">
                                <button>Xem chi tiết</button>
                            </a>
                            <div class="order-control order-margin">
                                <button>Hủy</button>
                            </div>
                        </div>
                        <div class="order">
                            <div class="order-id order-margin">Đơn hàng 1</div>
                            <div class="order-image order-margin">
                                <img src="https://cf.shopee.vn/file/ee411c2bb49cae053fd3a0c054943386_tn" alt="">
                            </div>
                            <div class="order-amount order-margin">Tổng 16 sản phẩm khác nhau</div>
                            <div class="order-price order-margin">Tổng giá tiền 99999 đ</div>
                            <a class="order-control order-margin" href="/buyer/order_detail.php?id=1">
                                <button>Xem chi tiết</button>
                            </a>
                            <div class="order-control order-margin">
                                <button>Hủy</button>
                            </div>
                        </div>
                        <div class="order">
                            <div class="order-id order-margin">Đơn hàng 1</div>
                            <div class="order-image order-margin">
                                <img src="https://cf.shopee.vn/file/ee411c2bb49cae053fd3a0c054943386_tn" alt="">
                            </div>
                            <div class="order-amount order-margin">Tổng 16 sản phẩm khác nhau</div>
                            <div class="order-price order-margin">Tổng giá tiền 99999 đ</div>
                            <a class="order-control order-margin" href="/buyer/order_detail.php?id=1">
                                <button>Xem chi tiết</button>
                            </a>
                            <div class="order-control order-margin">
                                <button>Hủy</button>
                            </div>
                        </div>
                        <div class="order">
                            <div class="order-id order-margin">Đơn hàng 1</div>
                            <div class="order-image order-margin">
                                <img src="https://cf.shopee.vn/file/ee411c2bb49cae053fd3a0c054943386_tn" alt="">
                            </div>
                            <div class="order-amount order-margin">Tổng 16 sản phẩm khác nhau</div>
                            <div class="order-price order-margin">Tổng giá tiền 99999 đ</div>
                            <a class="order-control order-margin" href="/buyer/order_detail.php?id=1">
                                <button>Xem chi tiết</button>
                            </a>
                            <div class="order-control order-margin">
                                <button>Hủy</button>
                            </div>
                        </div>
                        <div class="order">
                            <div class="order-id order-margin">Đơn hàng 1</div>
                            <div class="order-image order-margin">
                                <img src="https://cf.shopee.vn/file/ee411c2bb49cae053fd3a0c054943386_tn" alt="">
                            </div>
                            <div class="order-amount order-margin">Tổng 16 sản phẩm khác nhau</div>
                            <div class="order-price order-margin">Tổng giá tiền 99999 đ</div>
                            <a class="order-control order-margin" href="/buyer/order_detail.php?id=1">
                                <button>Xem chi tiết</button>
                            </a>
                            <div class="order-control order-margin">
                                <button>Hủy</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>