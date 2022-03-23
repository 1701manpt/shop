<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ | Nghị Quân Shop</title>

</head>

<body>
    <div class="app">
        <?php
        require "header.php";
        ?>
        <div class="body">
            <div class="slider">
                <img src="https://cf.shopee.vn/file/91f955d5a46d4e1210b8fa1374194583_xxhdpi" alt="">
            </div>
            <div class="area">
                <div class="area-title">
                    DANH MỤC
                </div>
                <div class="area-list">
                    <?php
                    $categories = new Category;
                    foreach ($categories->get_limit("block", 10) as $category) {
                        $str = '
                        <a class="category" href="category.php?id=' . $category->__get("id") . '">
                        <div class="category-image category-margin">
                            <img src="' . $category->get_image_avatar() . '" alt="">
                        </div>
                        <div class="category-name category-margin">
                        ' . $category->__get("name") . '
                        </div>
                        </a>
                        ';
                        echo $str;
                    }
                    ?>

                </div>
                <div class="area-view-full">
                    <a href="/categories.php">Xem tất cả</a>
                </div>
            </div>

            <div class="area">
                <div class="area-title">
                    SẢN PHẨM MỚI
                </div>
                <div class="area-list">
                    <?php
                    $products = new Product([]);
                    foreach ($products->get_newest('block', 10) as $product) {
                        $str = '
                        <a class="product" href="product.php?id=' . $product->__get("id") . '">
                        <div class="product-image product-margin">
                            <img src="https://cf.shopee.vn/file/d260c6a682f800b56838f6e21f8d2e40" alt="">
                        </div>
                        <div class="product-name product-margin">
                            ' . $product->__get("name") . '
                        </div>
                        <div class="product-price product-margin">
                            ' . $product->__get("price") . ' ₫
                        </div>
                        </a>
                        ';
                        echo $str;
                    }
                    ?>
                </div>
                <div class="area-view-full">
                    <a href="/products.php?sort_by=newest">Xem tất cả</a>
                </div>
            </div>

            <?php
            $categories = new Category;
            foreach ($categories->get_all("block") as $category) {
                $str = null;
                $products = new Product([]);
                foreach ($products->get_by_category("block", $category->__get("id")) as $product) {
                    $str = '
                    <a class="product" href="/product.php?id=' . $product->__get("id") . '">
                    <div class="product-image product-margin">
                        <img src="https://cdn.tgdd.vn/Products/Images/42/261888/realme-c35-GREEN-thumb-600x600.jpg" alt="">
                    </div>
                    <div class="product-name product-margin">
                        ' . $product->__get("name") . '
                    </div>
                    <div class="product-price product-margin">
                        ' . $product->__get("price") . '
                    </div>
                    </a>
                    ';
                }
                $str1 = '
                <div class="area" id="category_' . $category->__get("id") . '">
                <div class="area-title">
                    ' . $category->__get("name") . '
                </div>
                <div class="area-list">
                    ' . $str . '
                </div>
                </div>
                ';
                echo $str1;
            }
            ?>
        </div>
    </div>
</body>

</html>