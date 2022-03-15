<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh mục | Nghị Quân Shop</title>
</head>

<body>
    <div class="app">
        <?php require "header.php"; ?>
        <div class="body">
            <div class="area">
                    <?php
                    if (isset($_GET["id"])) {
                        $products = new Product();
                        echo '<div class="area-title">' . (new Category)->get($_GET["id"])->get_name() . '</div>';
                        echo '<div class="area-list">';
                        foreach ($products->get_by_category($_GET["id"]) as $product) {
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
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>