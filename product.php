<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./icon/shop.ico" type="image/x-icon">
    <title>Sản phẩm | Nghị Quân Shop</title>

</head>

<body>
    <div class="app">
        <?php
        require "header.php";
        ?>
        <div class="body">
            <div class="body-title">Sản phẩm</div>
            <?php
            if (isset($_GET['id'])) {
                $product = (new Product([]))->select($_GET['id']);
            }
            ?>
            <div class="land">
                <div class="land-header">
                    <div class="land-header-top land-header-sub">
                        <div class="land-header-name">
                            <?php
                            echo $product->__get('name');
                            ?>
                        </div>
                        <div class="land-header-control">
                            <div class="land-header-control-add">
                                <button>Thêm vào giỏ</button>
                            </div>
                            <div class="land-header-control-order">
                                <button>Đặt hàng</button>
                            </div>
                        </div>
                    </div>
                    <div class="land-header-image land-header-sub">
                        <img src="<?php
                                    $images = (new ImageProduct([]))->get_by_product($product->__get('id'));
                                    foreach ($images as $image) {
                                        if ($image->__get('index') == 1) {
                                            echo $image->__get('href');
                                        }
                                    }
                                    ?>" alt="">
                    </div>
                    <div class="land-header-info land-header-sub">
                        <div class="land-header-info-title">Thông tin chi tiết</div>
                        <div class="land-header-info-list">
                            <div class="land-header-info-item">Thuộc tính: giá trị thuộc tính</div>
                            <div class="land-header-info-item">Thuộc tính: giá trị thuộc tính</div>
                            <div class="land-header-info-item">Thuộc tính: giá trị thuộc tính</div>
                            <div class="land-header-info-item">Thuộc tính: giá trị thuộc tính</div>
                            <div class="land-header-info-item">Thuộc tính: giá trị thuộc tính</div>
                            <div class="land-header-info-item">Thuộc tính: giá trị thuộc tính</div>
                        </div>
                    </div>
                </div>
                <div class="land-description">
                    <div class="land-description-title">
                        Mô tả sản phẩm
                    </div>
                    <div class="land-description-content">
                        <?php echo $product->__get('description'); ?>
                    </div>
                </div>
                <div class="land-thumbnail">
                    <?php
                    foreach ($images as $image) {
                        if ($image->__get('index') != 1) {
                            echo '
                            <div class="land-thumbnail-item">
                            <img src="' . $image->__get('href') . '" alt="' . $image->__get('alt') . '">
                            </div>
                            ';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>