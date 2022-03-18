<script>
    window.onload = function() {
        ;
        (function() {
            try {
                document.title = "hehe";
            } catch (e) {}
        });
        (function() {
            try {
                const u = new URL(location.href)
                const menu = (document.querySelector(".header__menu")).querySelectorAll("a")
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
    <div class="header__main">
        <a class="header__main-logo" href="/">
            <img src="https://cf.shopee.vn/file/678c973a8141846a6840f1d582898ad1_tn" alt="logo">
        </a>
        <div class="header__main-search">
            <div class="header__main-search-input">
                <input type="text" placeholder="Tìm kiếm...">
            </div>
            <div class="header__main-search-icon">
                <i class="bi bi-search"></i>
            </div>
        </div>
        <div class="header__main-right">
            <a class="header__main-cart" href="../buyer/cart.php">
                <div class="header__main-cart-icon">
                    <i class="bi bi-cart3"></i>
                </div>
                <span>Giỏ hàng</span>
            </a>
            <a class="header__main-purchase" href="../buyer/purchase.php?type=1">
                <div class="header__main-purchase-icon">
                    <i class="bi bi-bag"></i>
                </div>
                <span>Đơn hàng</span>
            </a>
            <a class="header__main-account" href="../buyer/account.php">
                <div class="header__main-account-icon">
                    <i class="bi bi-person-circle"></i>
                </div>
                <div class="header__main-account-name">Thái Phương Nam</div>
            </a>
            <div class="header__main-menu jsToggleMenu">
                <i class="bi bi-list"></i>
            </div>
        </div>
    </div>
    <div class="header__menu jsMenu">
        <div class="header__menu-close jsToggleMenu">
            <i class="bi bi-x-lg"></i>
        </div>
        <a class="header__menu-item" href="/.">
            <i class="bi bi-house-door"></i>
            <span>Trang chủ</span>
        </a>
        <a class="header__menu-item" href="/categories.php">
            <i class="bi bi-bookmark-star"></i>
            <span>Danh mục</span>
        </a>
        <a class="header__menu-item" href="/products.php?sort_by=popular">
            <i class="bi bi-box"></i>
            <span>
                Sản phẩm
            </span>
        </a>
        <a class="header__menu-item" href="/news.php">
            <i class="bi bi-newspaper"></i>
            <span>Bài viết</span>
        </a>
        <a class="header__menu-item" href="/contact&policy.php">
            <i class="bi bi-telephone"></i>
            <span>Chính sách bảo hành & Liên hệ</span>
        </a>
    </div>
</div>