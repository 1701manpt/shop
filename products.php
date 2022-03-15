<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm | Nghị Quân Shop</title>
</head>

<body>
    <div class="app">
        <?php require "header.php"; ?>
        <div class="body">
            <div class="body-title">Danh sách sản phẩm</div>
            <div class="area">
                <div class="area-list">
                    <!-- tất cả sản phẩm -->
                    <?php
                    if (!isset($_GET["id"])) {
                        $products = new Product;
                        foreach ($products->get_all() as $product) {
                            $str = '
                    <a class="area-item" href="product?id=' . $product->get_id() . '">
                    <div class="area-item-picture">
                        <img src="https://cdn.tgdd.vn/Products/Images/42/261888/realme-c35-GREEN-thumb-600x600.jpg" alt="">
                    </div>
                    <div class="area-item-name">
                        ' . $product->get_name() . '
                    </div>
                    <div class="area-item-price">
                        ' . $product->get_price() . '
                    </div>
                    </a>
                    ';
                            echo $str;
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>