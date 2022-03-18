<script>
    window.onload = function() {
        ;
        (function() {
            try {
                const u = new URL(location.href)
                const menu = (document.querySelector(".header-menu")).querySelectorAll("a")
                menu.forEach((item) => {
                    const path = new URL(item.href).pathname
                    if (path == u.pathname) {
                        item.classList.add("active")

                    }
                })
            } catch (e) {}
        })();
        (function() {
            try {
                const openMenus = document.querySelectorAll(".jsToggleMenu")
                const menu = document.querySelector(".jsMenu")
                const body = document.querySelector("body")
                openMenus.forEach(function(openMenu) {
                    openMenu.addEventListener("click", () => {
                        menu.classList.toggle("active")
                        body.classList.toggle("disabled-scrollbar")
                    })
                })
            } catch (e) {}
        })();
        (function() {
            try {
                const u = new URL(location.href)
                const menu = (document.querySelector(".filter")).querySelectorAll("a")
                menu.forEach((item) => {
                    if (u == item.href) {
                        item.classList.add("active")
                    }
                })
            } catch (e) {}
        })();
        (function() {
            try {
                const u = new URL(location.href)
                const menu = (document.querySelector(".purchase-menu")).querySelectorAll("a")
                menu.forEach((item) => {
                    if (u == item.href) {
                        item.classList.add("active")
                    }
                })
            } catch (e) {}
        })();
    }
</script>
<?php
require "connection.php";
require "class/category.php";
require "class/product.php";
?>
<link rel="stylesheet" href="/index.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">


<div class="header">
    <div class="header-main">
        <a class="header-main-trademark" href="/">
            <div class="header-main-trademark-image">
                <img src="https://cf.shopee.vn/file/678c973a8141846a6840f1d582898ad1_tn" alt="logo">
            </div>
            <span>Nghị Quân Shop</span>
        </a>
        <div class="header-main-search">
            <div class="header-main-search-input">
                <input type="text" placeholder="Tìm kiếm...">
            </div>
            <div class="header-main-search-icon">
                <i class="bi bi-search"></i>
            </div>
        </div>
        <div class="header-main-right">
            <a class="header-main-cart" href="../buyer/cart.php">
                <div class="header-main-cart-icon">
                    <i class="bi bi-cart3"></i>
                </div>
                <span>Giỏ hàng</span>
            </a>
            <a class="header-main-purchase" href="../buyer/purchase.php?type=1">
                <div class="header-main-purchase-icon">
                    <i class="bi bi-bag"></i>
                </div>
                <span>Đơn hàng</span>
            </a>
            <a class="header-main-account" href="../buyer/account.php">
                <div class="header-main-account-icon">
                    <i class="bi bi-person-circle"></i>
                </div>
                <span class="header-main-account-name">Thái Phương Nam</span>
            </a>
            <div class="header-main-menu jsToggleMenu">
                <div class="header-main-menu-icon">
                    <i class="bi bi-list"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="header-menu jsMenu">
        <div class="header-menu-close jsToggleMenu">
            <div class="header-menu-close-icon">
                <i class="bi bi-x-lg"></i>
            </div>
        </div>
        <a class="header-menu-item" href="/.">
            <div class="header-menu-item-icon">
                <i class="bi bi-house-door"></i>
            </div>
            <span>Trang chủ</span>
        </a>
        <a class="header-menu-item" href="/categories.php">
            <div class="header-menu-item-icon">
                <i class="bi bi-bookmark-star"></i>
            </div>
            <span>Danh mục</span>
        </a>
        <a class="header-menu-item" href="/products.php?sort_by=popular">
            <div class="header-menu-item-icon">
                <i class="bi bi-box"></i>
            </div>
            <span>Sản phẩm</span>
        </a>
        <a class="header-menu-item" href="/news.php">
            <div class="header-menu-item-icon">
                <i class="bi bi-newspaper"></i>
            </div>
            <span>Bài viết</span>
        </a>
        <a class="header-menu-item" href="/contact&policy.php">
            <div class="header-menu-item-icon">
                <i class="bi bi-telephone"></i>
            </div>
            <span>Bảo hành & Liên hệ</span>
        </a>
    </div>
</div>