<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="http://nghiquan.shop/favicon.ico" type="image/x-icon">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <script src="../index.js"></script>
    <link rel="stylesheet" href="../index.css">
</head>

<body>
    <div class="app">
        <?php require_once 'header.php'; ?>

        <div class="app-body product">
            <?php require_once 'aside.php'; ?>
            <div class="main">
                <div class="main-item">
                    <form class="modal js-create-form">
                        <div class="modal-icon-close js-close-btn">
                            <i class="bi bi-x"></i>
                        </div>
                        <div class="modal-header">Thêm sản phẩm</div>
                        <div class="modal-body">
                            <!-- <div class="modal-body-item">
                        <label for="">ID</label>
                        <input type="text" name="id" readonly value="">
                    </div> -->
                            <div class="modal-body-item">
                                <label for="">Tên sản phẩm</label>
                                <input type="text" placeholder="Nhập tên sản phẩm" name="name">
                            </div>
                            <div class="modal-body-item">
                                <label for="">Giá bán ra</label>
                                <input type="number" placeholder="Nhập giá bán ra (VND)" name="price">
                            </div>
                            <div class="modal-body-item">
                                <label for="">Giá khuyến mãi</label>
                                <input type="number" placeholder="Nhập giá bán sau khi khuyến mãi (VND)" name="price_sale" />
                            </div>
                            <div class="modal-body-item">
                                <label for="">Loại sản phẩm</label>
                                <select name="type_id">
                                    <option value="1">Loại 1</option>
                                </select>
                            </div>
                            <!-- <div class="modal-body-item">
                        <label for="">Các thuộc tính</label>
                        <input type="text" placeholder="Nhập ID" name="id">
                    </div> -->
                            <div class="modal-body-item">
                                <label for="">Sản phẩm sẽ thuộc các danh</label>
                                <?php
                                $categories = ((new Category([]))->get_all());
                                foreach ($categories as $key => $category) {
                                    echo '
                            <div>
                                <input type="checkbox" name="categories" id="category-' . $category->__get("id") . '">
                                <label for="category-' . $category->__get("id") . '">' . $category->__get("name") . '</label>
                            </div>
                            ';
                                }
                                ?>
                            </div>
                            <div class="modal-body-item">
                                <label for="display">Hiển thị trên trang shop</label>
                                <select name="display" id="display">
                                    <option value="block">Bật</option>
                                    <option value="none">Tắt</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="modal-footer-btn modal-footer-btn--primary js-create">Tạo</button>
                            <button class="modal-footer-btn js-close-btn">Đóng</button>
                            <button class="modal-footer-btn">Tải lại</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- xử lí thêm sản phẩm -->
            <?php
            if (isset($_GET["name"]) && isset($_GET["price"]) && isset($_GET["type_id"]) && isset($_GET["display"])) {
                if (empty($_GET["name"]) || empty($_GET["price"]) || empty($_GET["type_id"]) || empty($_GET["display"])) {
                    echo '<script>
                        alert("Vui lòng nhập đầy đủ thông tin")
                    </script>';
                } else {
                    $product = new Product([
                        "id" => null,
                        "name" => $_GET["name"],
                        "price_sale" => null,
                        "price" => $_GET["price"],
                        "type_id" => $_GET["type_id"],
                        "display" => $_GET["display"],
                        "description" => null
                    ]);
                    if ($product->insert()) {
                        echo '<script>
                            alert("Sản phẩm được tạo thành công")
                        </script>';
                    } else {
                        echo '<script>
                            alert("Thất bại")
                        </script>';
                    }
                }
            }
            ?>

            <!--  -->

        </div>
    </div>
</body>

</html>