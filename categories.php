<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

                <?php
                if (!isset($_GET["id"])) {
                    $categories = new Category;
                    echo '<div class="area-list">';
                    foreach ($categories->get_all("block") as $category) {
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
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>