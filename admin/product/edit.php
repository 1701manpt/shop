<form class="modal js-update-form">
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
            <select name="type">
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
            require_once "../connection.php";
            require_once "../class/category.php";
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
        <button class="modal-footer-btn modal-footer-btn--primary js-create">Cập nhật sản phẩm</button>
        <button class="modal-footer-btn js-close-btn">Đóng</button>
        <button class="modal-footer-btn">Tải lại</button>
    </div>
</form>