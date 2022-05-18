<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng | Nghị Quân Shop</title>
</head>

<?php
require_once "check_account.php";
?>

<body>
    <div class="app">
        <?php require "../header.php"; ?>
        <div class="body">
            <div class="body-title">Chi tiết đơn hàng</div>
            <div class="body-content">
                <div class="area">
                    <div class="area-list">
                        <?php
                        if (isset($_GET["id"])) {
                            $order_details = (new OrderDetail([]))->selects($_GET["id"]);
                            if (empty($order_details)) {
                                echo '<div class="product"></div>';
                            }
                            foreach ($order_details as $key => $order_detail) {
                                echo '
                                    <a class="product" href="../product.php?id=' . $order_detail->__get("product_id") . '">
                                    <div class="product-image product-margin">
                                        <img src="https://cf.shopee.vn/file/d260c6a682f800b56838f6e21f8d2e40" alt="">
                                    </div>
                                    <div class="product-name product-margin">
                                        ' . (new Product([]))->select($order_detail->__get("product_id"))->__get("name") . '
                                    </div>
                                    <div class="product-price product-margin">
                                        ' . (new Product([]))->select($order_detail->__get("product_id"))->__get("price") . ' ₫
                                    </div>
                                    </a>
                                    ';
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