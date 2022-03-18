<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./icon/shop.ico" type="image/x-icon">
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
            <!-- danh mục -->
            <div class="area area-category">
                <div class="area-title">
                    DANH MỤC
                </div>
                <div class="area-list">
                    <?php
                    $categories = new Category;
                    foreach ($categories->get_limit("block", 10) as $category) {
                        $str = '
                        <a class="area-item" href="category?id=' . $category->get_id() . '">
                        <div class="area-item-picture">
                            <img src="' . $category->get_image_avatar() . '" alt="">
                        </div>
                        <div class="area-item-name">
                        ' . $category->get_name() . '
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

            <div class="area area-newest">
                <div class="area-title">
                    SẢN PHẨM MỚI
                </div>
                <div class="area-list">
                    <?php
                    $products = new Product;
                    foreach ($products->get_newest(10) as $product) {
                        $str = '
                        <a class="area-item" href="product?id=' . $product->get_id() . '">
                        <div class="area-item-picture">
                            <img src="https://cf.shopee.vn/file/d260c6a682f800b56838f6e21f8d2e40" alt="">
                        </div>
                        <div class="area-item-name">
                            ' . $product->get_name() . '
                        </div>
                        <div class="area-item-price">
                            ' . $product->get_price() . ' ₫
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
                $products = new Product;
                foreach ($products->get_by_category($category->get_id(), "block") as $product) {
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
                }
                $str1 = '
                <div class="area" id="category_' . $category->get_id() . '">
                <div class="area-title">
                    ' . $category->get_name() . '
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