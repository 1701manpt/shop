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
        <div class="app-body staff">
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
                    <div class="item-title">Quản lý nhân viên</div>
                    <div class="item-control">
                        <button class="item-control-btn item-control-btn--primary js-open-form-create-btn">Thêm</button>
                        <button class="item-control-btn item-control-btn--danger js-remove-btn">Xóa</button>
                    </div>
                    <div class="item-content">
                        <table class="js-table table --staff">

                        </table>
                    </div>
                </div>
            </div>
            <form class="modal js-create-form">
                <div class="modal-icon-close js-close-btn">
                    <i class="bi bi-x"></i>
                </div>
                <div class="modal-header">Thêm nhân viên</div>
                <div class="modal-body">
                    <div class="modal-body-item">
                        <label for="">ID</label>
                        <input type="text" name="id" readonly>
                    </div>
                    <div class="modal-body-item">
                        <label for="">Họ và tên</label>
                        <input type="text" name="name" placeholder="Nhập họ và tên">
                    </div>
                    <div class="modal-body-item">
                        <label for="">Giới tính</label>
                        <select name="gender">
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                        </select>
                    </div>
                    <div class="modal-body-item">
                        <label for="">Ngày sinh</label>
                        <input type="date" name="birth_date">
                    </div>
                    <div class="modal-body-item">
                        <label for="">Địa chỉ</label>
                        <textarea name="address" cols="" rows="2"
                            placeholder="Nhập địa chỉ nhà ở, nơi thường trú"></textarea>
                    </div>
                    <div class="modal-body-item">
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Nhập email">
                    </div>
                    <div class="modal-body-item">
                        <label for="">Mật khẩu</label>
                        <input type="password" name="password" placeholder="Nhập mật khẩu">
                    </div>
                    <div class="modal-body-item">
                        <label for="reassword">Nhập lại mật khẩu</label>
                        <input type="password" name="repassword" placeholder="Nhập mật khẩu" disabled>
                    </div>
                    <div class="modal-body-item">
                        <label for="">Ngày lập</label>
                        <input type="date" name="date_create" value="2022-01-20" readonly>
                    </div>
                    <div class="modal-body-item">
                        <label for="">Trạng thái</label>
                        <select name="state">
                            <option value="normal">Normal</option>
                            <option value="locked">Locked</option>
                        </select>
                    </div>
                    <div class="modal-body-item">
                        <label for="">Chức vụ</label>
                        <select name="role_id">
                            <option value="">Role 1</option>
                            <option value="">Role 2</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="modal-footer-btn modal-footer-btn--primary js-finish-btn">Tạo</button>
                    <button class="modal-footer-btn modal-footer-btn--secondary js-close-btn">Đóng</button>
                    <button class="modal-footer-btn modal-footer-btn--secondary">Tải lại</button>
                </div>
            </form>
            <form class="modal js-update-form">
                <div class="modal-icon-close js-close-btn">
                    <i class="bi bi-x"></i>
                </div>
                <div class="modal-header">Cập nhật thông tin nhân viên</div>
                <div class="modal-body">
                    <div class="modal-body-item">
                        <label for="">ID</label>
                        <input type="text" name="id" readonly>
                    </div>
                    <div class="modal-body-item">
                        <label for="">Họ và tên</label>
                        <input type="text" name="name" placeholder="Nhập họ và tên">
                    </div>
                    <div class="modal-body-item">
                        <label for="">Giới tính</label>
                        <select name="gender">
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                        </select>
                    </div>
                    <div class="modal-body-item">
                        <label for="">Ngày sinh</label>
                        <input type="date" name="birth_date">
                    </div>
                    <div class="modal-body-item">
                        <label for="">Địa chỉ</label>
                        <textarea name="address" cols="" rows="2"
                            placeholder="Nhập địa chỉ nhà ở, nơi thường trú"></textarea>
                    </div>
                    <div class="modal-body-item">
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Nhập email">
                    </div>
                    <div class="modal-body-item">
                        <label for="">Mật khẩu</label>
                        <input type="password" name="password" placeholder="Nhập mật khẩu">
                    </div>
                    <div class="modal-body-item">
                        <label for="reassword">Nhập lại mật khẩu</label>
                        <input type="password" name="repassword" placeholder="Nhập mật khẩu" disabled>
                    </div>
                    <div class="modal-body-item">
                        <label for="">Ngày lập</label>
                        <input type="date" name="date_create" value="2022-01-20" readonly>
                    </div>
                    <div class="modal-body-item">
                        <label for="">Trạng thái</label>
                        <select name="state">
                            <option value="normal">Normal</option>
                            <option value="locked">Locked</option>
                        </select>
                    </div>
                    <div class="modal-body-item">
                        <label for="">Chức vụ</label>
                        <select name="role_id">
                            <option value="32">Role 1</option>
                            <option value="24">Role 2</option>
                        </select>
                    </div>
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