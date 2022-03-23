<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="http://nghiquan.shop/favicon.ico" type="image/x-icon">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <script src="./index.js"></script>
    <link rel="stylesheet" href="./index.css">
</head>

<body>
    <div class="app">
        <div class="app-backdrop"></div>
        <div class="app-header">
            <div class="aside-icon js-open-menu">
                <i class="bi bi-list"></i>
            </div>
            <p>Nghị Quân Shop Admin Center</p>
        </div>
        <div class="app-body product">
            <div class="aside">
                <div class="aside-item aside-item--control">
                    <div class="aside-item-icon aside-item-icon--open">
                        <i class="bi bi-list"></i>
                    </div>
                    <div class="aside-item-icon aside-item-icon--close js-close-menu">
                        <i class="bi bi-x"></i>
                    </div>
                </div>
            </div>
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
                                        </tr>
                                    ';
                                echo $tr;
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
            <form class="modal js-create-form">
                <div class="modal-icon-close js-close-btn">
                    <i class="bi bi-x"></i>
                </div>
                <div class="modal-header">Thêm sản phẩm</div>
                <div class="modal-body">
                    <div class="modal-body-item">
                        <label for="">ID</label>
                        <input type="text" name="id" readonly>
                    </div>
                    <div class="modal-body-item">
                        <label for="">Tên sản phẩm</label>
                        <input type="text" placeholder="Nhập tên sản phẩm" name="name">
                    </div>
                    <div class="modal-body-item">
                        <label for="">Giá niêm yết</label>
                        <input type="number" placeholder="Nhập giá (VND)" name="price">
                    </div>
                    <div class="modal-body-item">
                        <label for="">Mô tả</label>
                        <textarea type="number" placeholder="Nhập mô tả" name="description"></textarea>
                    </div>
                    <div class="modal-body-item">
                        <label for="">Loại sản phẩm</label>
                        <select name="type">
                            <option value="">Loại 1</option>
                            <option value="">Loại 4</option>
                            <option value="">Loại 3</option>
                            <option value="">Loại 2</option>
                        </select>
                    </div>
                    <div class="modal-body-item">
                        <label for="">Các thuộc tính</label>
                        <input type="text" placeholder="Nhập ID" name="id">
                    </div>
                    <div class="modal-body-item">
                        <label for="">Các danh mục</label>
                        <input type="text" placeholder="Nhập ID" name="id">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="modal-footer-btn modal-footer-btn--primary js-create">Tạo</button>
                    <button class="modal-footer-btn js-close-btn">Đóng</button>
                    <button class="modal-footer-btn">Tải lại</button>
                </div>
            </form>

            <!--  -->

            <form class="modal js-update-form">
                <div class="modal-icon-close js-close-btn">
                    <i class="bi bi-x"></i>
                </div>
                <div class="modal-header">Thêm sản phẩm</div>
                <div class="modal-body">
                    <div class="modal-body-item">
                        <label for="">ID</label>
                        <input type="text" placeholder="Nhập ID" name="id">
                    </div>
                    <div class="modal-body-item">
                        <label for="">ID</label>
                        <input type="text" placeholder="Nhập ID" name="id">
                    </div>
                    <div class="modal-body-item">
                        <label for="">ID</label>
                        <input type="text" placeholder="Nhập ID" name="id">
                    </div>
                    <div class="modal-body-item">
                        <label for="">ID</label>
                        <input type="text" placeholder="Nhập ID" name="id">
                    </div>
                    <div class="modal-body-item">
                        <label for="">ID</label>
                        <input type="text" placeholder="Nhập ID" name="id">
                    </div>
                    <div class="modal-body-item">
                        <label for="">ID</label>
                        <input type="text" placeholder="Nhập ID" name="id">
                    </div>
                    <div class="modal-body-item">
                        <label for="">ID</label>
                        <input type="text" placeholder="Nhập ID" name="id">
                    </div>
                    <div class="modal-body-item">
                        <label for="">ID</label>
                        <input type="text" placeholder="Nhập ID" name="id">
                    </div>
                    <div class="modal-body-item">
                        <label for="">ID</label>
                        <input type="text" placeholder="Nhập ID" name="id">
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
</body>

</html>