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
                        <a href="?id=1">Chờ xác nhận</a>
                        <a href="?id=2">Đã xác nhận</a>
                        <a href="?id=3">Đang giao</a>
                        <a href="?id=4">Đã giao</a>
                        <a href="?id=5">Đã hủy</a>
                    </div>
                    <div class="purchase-list">
                        <?php
                        $order = [];
                        if (isset($_GET["id"])) {
                            $orders = (new Order([]))->get($_SESSION['id'], $_GET['id']);
                        } else {
                            $orders = (new Order([]))->get($_SESSION['id']);
                        }
                        if (empty($orders)) {
                            echo '
                            <div class="order">
                                Không có đơn hàng nào
                            </div>
                            ';
                        } else {
                            foreach ($orders as $key => $order) {
                                $bt = '';
                                if ($order->__get("purchase_id") == 1) {
                                    $bt = '
                                    <div class="order-control order-margin">
                                        <button>Hủy</button>
                                    </div>
                                    ';
                                } else {
                                    $bt = '';
                                }
                                $str = '
                                <div class="order">
                                <div class="order-id order-margin">Mã đơn hàng ' . $order->__get("id") . '</div>
                                <div class="order-purchase order-margin">Trạng thái: ' . (new Purchase([]))->select($order->__get("purchase_id"))->__get("name") . '</div>
                                <div class="order-image order-margin">
                                    <img src="https://cf.shopee.vn/file/ee411c2bb49cae053fd3a0c054943386_tn" alt="">
                                </div>
                                <div class="order-amount order-margin">có ' . $order->auto_quantily($order->__get("id")) . ' sản phẩm (không cùng loại)</div>
                                <div class="order-price order-margin"><span>' . $order->auto_price($order->__get("id")) . '</span> ₫</div>
                                <a class="order-control order-margin" href="/buyer/order_detail.php?id=' . $order->__get("id") . '">
                                    <button>Xem chi tiết</button>
                                </a>
                                ' . $bt . '
                                </div>
                                ';
                                echo $str;
                            }
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>