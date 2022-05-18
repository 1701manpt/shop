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
        <?php require_once '../header.php'; ?>

        <div class="app-body product">
            <?php require_once '../aside.php'; ?>
            <div class="main">
                <div class="main-item">
                    <div class="item-title">Quản lý sản phẩm</div>
                    <div class="item-control">
                        <button class="item-control-btn item-control-btn--primary js-open-form-create-btn">Thêm</button>
                        <button class="item-control-btn item-control-btn--danger js-remove-btn">Xóa</button>
                    </div>
                    <div class="item-content">
                        <table class="js-table table --product">
                            <tr class="table-row --key">
                                <th class="table-col --key"><input type="checkbox" name="" id=""></th>
                                <th class="table-col --key">STT</th>
                                <th class="table-col --key">ID</th>
                                <th class="table-col --key">Tên sản phẩm</th>
                                <th class="table-col --key">Giá mua về</th>
                                <th class="table-col --key">Giá bán ra</th>
                                <th class="table-col --key">Giá khuyến mãi</th>
                                <th class="table-col --key">Mô tả</th>
                                <th class="table-col --key">Loại sản phẩm (ID)</th>
                                <th class="table-col --key">Các thuộc tính sản phẩm</th>
                                <th class="table-col --key">Các danh mục mà sản phẩm thuộc</th>
                                <th class="table-col --key">Hiển thị</th>
                            </tr>
                            <?php
                            require_once "../connection.php";
                            require_once "../class/product.php";
                            $products = (new Product([]))->get_all();
                            foreach ($products as $key => $product) {
                                $tr = '
                                        <tr class="table-row">
                                            <td class="table-col"><input type="checkbox" name="" id=""></td>
                                            <td class="table-col">' . $key . '</td>
                                            <td class="table-col">' . $product->__get("id") . '</td>
                                            <td class="table-col">' . $product->__get("name") . '</td>
                                            <td class="table-col">' . $product->__get("price") . '</td>
                                            <td class="table-col">//</td>
                                            <td class="table-col">' . $product->__get("price_sale") . '</td>
                                            <td class="table-col">' . $product->__get("description") . '</td>
                                            <td class="table-col">' . $product->__get("type_id") . '</td>
                                            <td class="table-col">//</td>
                                            <td class="table-col">//</td>
                                            <td class="table-col">' . $product->__get("display") . '</td>
                                            <td class="table-col"><i class="bi bi-pencil-square js-update-btn"></i></td>
                                        </tr>
                                    ';
                                echo $tr;
                            }
                            ?>
                        </table>
                    </div>
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