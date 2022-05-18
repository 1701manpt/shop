<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./icon/shop.ico" type="image/x-icon">
    <title>Danh sách sản phẩm | Nghị Quân Shop</title>
</head>

<body>
    <div class="app">
        <?php require "header.php"; ?>
        <div class="body">
            <div class="body-title">Danh sách sản phẩm</div>
            <div class="filter">
                <a class="filter-item" href="?sort_by=pop">Phổ biến</a>
                <a class="filter-item" href="?sort_by=ctime">Mới nhất</a>
                <a class="filter-item" href="?sort_by=sales">Bán chạy</a>
                <a class="filter-item" value="asc" href="?order=asc">Giá tăng</a>
                <a class="filter-item" value="desc" href="?order=desc">Giá giảm</a>
            </div>
            <div class="area">
                <div class="area-list" id="products-list-all">
                    <?php
                    // switch (true) {
                    //     case $_GET["sort_by"] == "popular":
                    //         $products = (new Product([]))->get_all("block");
                    //         if (empty($products)) {
                    //             echo "Không có sản phẩm";
                    //         } else {
                    //             foreach ($products as $product) {
                    //                 echo '
                    //                 <a class="product" href="product.php?id=' . $product->__get("id") . '">
                    //                 <div class="product-image product-margin">
                    //                     <img src="https://cf.shopee.vn/file/d260c6a682f800b56838f6e21f8d2e40" alt="">
                    //                 </div>
                    //                 <div class="product-name product-margin">
                    //                     ' . $product->__get("name") . '
                    //                 </div>
                    //                 <div class="product-price product-margin">
                    //                     ' . $product->__get("price") . ' ₫
                    //                 </div>
                    //                 </a>
                    //                 ';
                    //             }
                    //         }
                    //         break;
                    //     case $_GET["sort_by"] == "newest":
                    //         $products = (new Product([]))->get_newest("block");
                    //         if (empty($products)) {
                    //             echo "Không có sản phẩm";
                    //         } else {
                    //             foreach ($products as $product) {
                    //                 echo '
                    //                 <a class="product" href="product.php?id=' . $product->__get("id") . '">
                    //                 <div class="product-image product-margin">
                    //                     <img src="https://cf.shopee.vn/file/d260c6a682f800b56838f6e21f8d2e40" alt="">
                    //                 </div>
                    //                 <div class="product-name product-margin">
                    //                     ' . $product->__get("name") . '
                    //                 </div>
                    //                 <div class="product-price product-margin">
                    //                     ' . $product->__get("price") . ' ₫
                    //                 </div>
                    //                 </a>
                    //                 ';
                    //             }
                    //         }
                    //         break;
                    //     case $_GET["sort_by"] == "sales":
                    //         $products = (new Product([]))->get_all("block");
                    //         if (empty($products)) {
                    //             echo "Không có sản phẩm";
                    //         } else {
                    //             foreach ($products as $product) {
                    //                 echo '
                    //                 <a class="product" href="product.php?id=' . $product->__get("id") . '">
                    //                 <div class="product-image product-margin">
                    //                     <img src="https://cf.shopee.vn/file/d260c6a682f800b56838f6e21f8d2e40" alt="">
                    //                 </div>
                    //                 <div class="product-name product-margin">
                    //                     ' . $product->__get("name") . '
                    //                 </div>
                    //                 <div class="product-price product-margin">
                    //                     ' . $product->__get("price") . ' ₫
                    //                 </div>
                    //                 </a>
                    //                 ';
                    //             }
                    //         }
                    //         break;
                    //     case $_GET["sort_by"] == "price":
                    //         $products = (new Product([]))->get_sortby_price("block", $_GET["order"]);
                    //         if (empty($products)) {
                    //             echo "Không có sản phẩm";
                    //         } else {
                    //             foreach ($products as $product) {
                    //                 echo '
                    //                 <a class="product" href="product.php?id=' . $product->__get("id") . '">
                    //                 <div class="product-image product-margin">
                    //                     <img src="https://cf.shopee.vn/file/d260c6a682f800b56838f6e21f8d2e40" alt="">
                    //                 </div>
                    //                 <div class="product-name product-margin">
                    //                     ' . $product->__get("name") . '
                    //                 </div>
                    //                 <div class="product-price product-margin">
                    //                     ' . $product->__get("price") . ' ₫
                    //                 </div>
                    //                 </a>
                    //                 ';
                    //             }
                    //         }
                    //         break;
                    //     default:
                    // }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>