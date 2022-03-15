<?php
require "connection.php";
require "class/category.php";
require "class/product.php";
?>
<link rel="stylesheet" href="/index.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">


<div class="header">
    <div class="header__main">
        <div class="header__main-logo">
            <img src="https://upload.wikimedia.org/wikipedia/vi/8/8d/The_gioi_di_dong_logo.svg" alt="logo">
        </div>
        <div class="header__main-search">
            <div class="header__main-search-input">
                <input type="search" >
            </div>
            <div class="header__main-search-icon">
                <i class="bi bi-search"></i>
            </div>
        </div>
        <div class="header__main-right">
            <a class="header__main-cart" href="<?php print "../buyer/cart" ?>">
                <div class="header__main-cart-icon">
                    <i class="bi bi-cart3"></i>
                </div>
                Giỏ hàng
            </a>
            <a class="header__main-purchase" href="../buyer/purchase">Đơn hàng</a>
            <a class="header__main-account" href="../buyer/account">
                <div class="header__main-account-image">
                    <!-- <img src="..." alt=""> -->
                </div>
                Thái Phương Nam
            </a>
        </div>
    </div>
    <div class="header__menu">
        <a class="header__menu-item" href="/.">
            <i class="bi bi-house-door"></i>
            Trang chủ
        </a>
        <a class="header__menu-item" href="/categories">
            <i class="bi bi-bookmark-star"></i>
            Danh mục
        </a>
        <a class="header__menu-item" href="/products">
            <i class="bi bi-box"></i>
            Sản phẩm
        </a>
        <a class="header__menu-item" href="/news">
            <i class="bi bi-newspaper"></i>
            Bài viết
        </a>
        <a class="header__menu-item" href="/contact&policy">
            <i class="bi bi-telephone"></i>
            Chính sách bảo hành & Liên hệ
        </a>
    </div>
</div>

<script>
    window.onload = () => {
        const u = new URL(location.href)
        const menu = (document.querySelector(".header__menu")).querySelectorAll("a")
        menu.forEach((item) => {
            const path = new URL(item.href).pathname
            if (path == u.pathname) {
                item.classList.add("active")
            }

        })
    }
</script>