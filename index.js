window.onload = function () {
    (function activeMenu() {
        try {
            const u = new URL(location.href)
            const menu = (document.querySelector(".header-menu")).querySelectorAll("a")
            menu.forEach((item) => {
                const path = new URL(item.href).pathname
                if (path == u.pathname) {
                    item.classList.add("active")

                }
            })
        } catch (e) { }
    })();
    (function toggleMenu() {
        try {
            const openMenus = document.querySelectorAll(".jsToggleMenu")
            const menu = document.querySelector(".jsMenu")
            const body = document.querySelector("body")
            const backDrop = document.querySelector(".backdrop")
            openMenus.forEach(function (openMenu) {
                openMenu.addEventListener("click", () => {
                    menu.classList.toggle("active")
                    body.classList.toggle("disabled-scrollbar")
                    backDrop.classList.toggle("active")
                })
            })
        } catch (e) { }
    })();
    (function activeFilterMenu() {
        try {
            const u = new URL(location.href)
            const menu = (document.querySelector(".filter")).querySelectorAll("a")
            menu.forEach((item) => {
                if (u == item.href) {
                    item.classList.add("active")
                }
            })
        } catch (e) { }
    })();
    (function activePurchaseMenu() {
        try {
            const u = new URL(location.href)
            const menu = (document.querySelector(".purchase-menu")).querySelectorAll("a")
            menu.forEach((item) => {
                if (u == item.href) {
                    item.classList.add("active")
                }
            })
        } catch (e) { }
    })();
    (function animationNotification() {
        try {
            const u = new URL(location.href)
            const notification = document.querySelector(".notification")
            setTimeout(function () {
                notification.classList.add("fade")
                setTimeout(function () {
                    notification.classList.add("none")
                }, 1000)
            }, 5000)

        } catch (e) { }
    })();
    (function autoSetIconUrl() {
        try {
            const link = document.createElement("link")
            const domain = new URL(location.href)
            link.setAttribute("rel", "shortcut icon")
            link.setAttribute("href", "/icon/shop.ico")
            link.setAttribute("type", "image/x-icon")
            document.head.appendChild(link)
        } catch (e) {

        }
    })();
}