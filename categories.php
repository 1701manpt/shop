<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./icon/shop.ico" type="image/x-icon">
    <title>Danh sách danh mục | Nghị Quân Shop</title>
</head>

<body>
    <div class="app">
        <?php
        require "header.php";
        ?>

        <div class="body">
            <div class="body-title">Danh sách danh mục</div>
            <div class="area area-category">
            <div class="area-list" id="categories-list-all">

                <?php
                // if (!isset($_GET["id"])) {
                //     $categories = new Category([]);
                //     foreach ($categories->get_all("block") as $category) {
                //         $str = '
                //             <a class="category" href="category.php?id=' . $category->__get("id") . '">
                //             <div class="category-image category-margin">
                //                 <img src="' . $category->__get("image_avatar") . '" alt="">
                //             </div>
                //             <div class="category-name category-margin">
                //             ' . $category->__get("name") . '
                //             </div>
                //             </a>
                //             ';
                //         echo $str;
                //     }
                // }
                ?>
            </div>
            </div>
        </div>
    </div>
</body>

</html>