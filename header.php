<?php
require "connection.php";
require "class/category.php";
require "class/product.php";
?>
<link rel="stylesheet" href="/index.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">


<div class="header">
    <div class="header__main">
        <a class="header__main-logo" href="/">
            <img src="https://upload.wikimedia.org/wikipedia/vi/8/8d/The_gioi_di_dong_logo.svg" alt="logo">
        </a>
        <div class="header__main-search">
            <div class="header__main-search-input">
                <input type="search">
            </div>
            <div class="header__main-search-icon">
                <i class="bi bi-search"></i>
            </div>
        </div>
        <div class="header__main-right">
            <a class="header__main-cart" href="../buyer/cart">
                <div class="header__main-cart-icon">
                    <i class="bi bi-cart3"></i>
                </div>
                <span>Giỏ hàng</span>
            </a>
            <a class="header__main-purchase" href="../buyer/purchase">
                <div class="header__main-purchase-icon">
                    <i class="bi bi-bag"></i>
                </div>
                <span>Đơn hàng</span>
            </a>
            <a class="header__main-account" href="../buyer/account">
                <div class="header__main-account-icon">
                    <i class="bi bi-person-circle"></i>
                </div>
                <div class="header__main-account-name">Thái Phương Nam</div>
            </a>
            <div class="header__main-menu jsToggleMenu active">
                <i class="bi bi-list"></i>
            </div>
        </div>
    </div>
    <div class="header__menu jsMenu">
        <a class="header__menu-item" href="/.">
            <i class="bi bi-house-door"></i>
            <span>Trang chủ</span>
        </a>
        <a class="header__menu-item" href="/categories">
            <i class="bi bi-bookmark-star"></i>
            <span>Danh mục</span>
        </a>
        <a class="header__menu-item" href="/products">
            <i class="bi bi-box"></i>
            <span>
                Sản phẩm
            </span>
        </a>
        <a class="header__menu-item" href="/news">
            <i class="bi bi-newspaper"></i>
            <span>Bài viết</span>
        </a>
        <a class="header__menu-item" href="/contact&policy">
            <i class="bi bi-telephone"></i>
            <span>Chính sách bảo hành & Liên hệ</span>
        </a>
    </div>
</div>

<script>
    window.onload = function() {
        ;
        (function() {
            const u = new URL(location.href)
            const menu = (document.querySelector(".header__menu")).querySelectorAll("a")
            menu.forEach((item) => {
                const path = new URL(item.href).pathname
                if (path == u.pathname) {
                    item.classList.add("active")
                }

            })
        })()

        ;
        (function() {
            const openMenu = document.querySelector(".jsToggleMenu")
            const menu = document.querySelector(".jsMenu")
            openMenu.addEventListener("click", () => {
                openMenu.classList.toggle("active")
                if (openMenu.classList.contains("active")) {
                    menu.classList.remove("active")
                } else {
                    menu.classList.add("active")
                }
            })
        })()

    }
</script>