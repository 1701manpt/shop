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
        <div class="app-backdrop"></div>
        <div class="app-header">
            <div class="aside-icon js-open-menu">
                <i class="bi bi-list"></i>
            </div>
            <p>Nghị Quân Shop Admin Center</p>
        </div>
        <div class="app-body sale_off">
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
                    <div class="item-title">Quản lý chương trình giảm giá</div>
                    <div class="item-control">
                        <button class="item-control-btn item-control-btn--primary js-open-form-create-btn">Thêm</button>
                        <button class="item-control-btn item-control-btn--danger js-remove-btn">Xóa</button>
                    </div>
                    <div class="item-content">
                        <table class="js-table table --sale_off">
                            <!-- <tr>
                                <th><input type="checkbox" name="" id=""></th>
                                <th>STT</th>
                                <th>ID</th>
                                <th>Tên chương trình giảm giá</th>
                                <th>Mô tả</th>
                                <th></th>
                            </tr> -->
                        </table>
                    </div>
                </div>
            </div>
            <form class="modal js-create-form">
                <div class="modal-icon-close js-close-btn">
                    <i class="bi bi-x"></i>
                </div>
                <div class="modal-header">Thêm chương trình giảm giá</div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button class="modal-footer-btn modal-footer-btn--primary js-finish-btn">Tạo</button>
                    <button class="modal-footer-btn modal-footer-btn--secondary js-close-btn">Đóng</button>
                    <button class="modal-footer-btn modal-footer-btn--secondary">Tải lại</button>
                </div>
            </form>

            <!--  -->

            <form class="modal js-update-form">
                <div class="modal-icon-close js-close-btn">
                    <i class="bi bi-x"></i>
                </div>
                <div class="modal-header">Cập nhật thông tin chương trình giảm giá</div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button class="modal-footer-btn modal-footer-btn--primary js-finish-btn">Cập nhật</button>
                    <button class="modal-footer-btn modal-footer-btn--secondary js-close-btn">Đóng</button>
                    <button class="modal-footer-btn modal-footer-btn--secondary">Tải lại</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>