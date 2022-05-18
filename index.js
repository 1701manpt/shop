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
    (function input() {
        function checkAll() {
            const checkAll = document.querySelector(".js-cart-selects")
            const checks = document.querySelectorAll("input[type='checkbox'][name='remove']")
            // console.log(checkAll, checks)
            checkAll.addEventListener("change", () => {
                checks.forEach((check) => {
                    check.checked = checkAll.checked
                })
                const checkss = document.querySelectorAll(".product-select")
                if (checkAll.checked) {
                    checkss.forEach((check) => {
                        check.parentElement.classList.add("selected")
                    })
                } else {
                    const checkss = document.querySelectorAll(".product-select")
                    checkss.forEach((check) => {
                        check.parentElement.classList.remove("selected")
                    })
                }
            })
            checks.forEach((check) => {
                check.addEventListener("change", () => {
                    var count = 0
                    for (var i = 0; i < checks.length; i++) {
                        const check = checks[i]
                        if (check.checked) {
                            count++
                        }
                    }
                    if (count != checks.length) {
                        checkAll.checked = false
                    }
                    if (count == checks.length) {
                        checkAll.checked = true
                    }
                })
            })
        }
        function hightlightProduct() {
            const checks = document.querySelectorAll(".product-select")
            checks.forEach((check) => {
                check.addEventListener("click", () => {
                    if ((check.querySelector("input")).checked) {
                        check.parentElement.classList.add("selected")
                    } else {
                        check.parentElement.classList.remove("selected")
                    }
                })
            })
        }
        try {
            checkAll()
            hightlightProduct()
        }
        catch (e) {

        }
    })();

    ////////////////////////////////

    var formData = new FormData()
    const id = '406356404'
    var shopId = localStorage.getItem('shopId') || id
    formData.append('shopId', shopId)
    // Lấy nhiều danh mục
    const getApiCategories = (callback, formData) => {
        const options = {
            method: 'POST',
            // headers: { 'Content-Type': 'application/x-www-form-urlencoding' },
            body: formData
        }
        fetch("../API/shopee/get_categories.php", options)
            .then((res) => res.json())
            .then(callback)
    }
    function renderCategories(data) {
        var html = data.data.shop_categories.map((item, index) => {
            //     return `
            // <input
            //     style="display: none;"
            //     id="checkedCategory${item.shop_category_id}"
            //     name="categoryId"
            //     type="radio"
            //     class="sidebar__content--input"
            //     value="${item.shop_category_id}"
            // >
            // <label
            //     for="checkedCategory${item.shop_category_id}"
            //     class="sidebar__content--item"
            //     onclick="handleGetCategoryId(${item.shop_category_id})"
            // >
            //     <img class="sidebar__content--item--image" src="https://cf.shopee.vn/file/${item.image}" alt="">
            //     <div class="sidebar__content--item--name">${item.display_name}</div>
            // </label>
            // `
            if (index <= 9) {
                return `
            <a class="category" href="category.php?categoryId=${item.shop_category_id}&name=${item.display_name}">
            <div class="category-image category-margin">
                <img src="https://cf.shopee.vn/file/${item.image}" alt="">
            </div>
            <div class="category-name category-margin">
            ${item.display_name}
            </div>
            </a>
        `
            }
        });

        var html1 = data.data.shop_categories.map((item, index) => {
            return `
            <a class="category" href="category.php?categoryId=${item.shop_category_id}&name=${item.display_name}">
            <div class="category-image category-margin">
                <img src="https://cf.shopee.vn/file/${item.image}" alt="">
            </div>
            <div class="category-name category-margin">
            ${item.display_name}
            </div>
            </a>
        `
        });

        try {
            document.querySelector('#categories-list').innerHTML = html.join('')
        } catch (e) { }

        try {
            document.querySelector('#categories-list-all').innerHTML = html1.join('')
        } catch (e) { }
    }

    getApiCategories(renderCategories, formData)

    // // Lấy nhiều sản phẩm từ một danh mục
    const getApiCategoryProducts = (callback, formData) => {
        const options = {
            method: 'POST',
            // headers: { 'Content-Type': 'application/x-www-form-urlencoding' },
            body: formData
        }
        fetch('../API/shopee/get_category_products.php', options)
            .then(response => response.json())
            .then(callback)
    }

    function renderProducts(data) {
        var top = `
        <div class="area-title">các sản phẩm</div>
        <div class="area-list">
        `
        var html = data.items.map((item) => {
            var price_min = Number(item.item_basic.price_min) / 100000
            var price_max = Number(item.item_basic.price_max) / 100000
            var price_min_before_discount = Number(item.item_basic.price_min_before_discount) / 100000
            var price_max_before_discount = Number(item.item_basic.price_max_before_discount) / 100000
            var currency = item.item_basic.currency
            var price_before =
                price_min_before_discount == price_max_before_discount
                    ? `${price_min_before_discount}`
                    : `${price_max_before_discount} - ${price_max_before_discount}`
            var price = price_min == price_max ? `${price_min}` : `${price_min} - ${price_max}`
            //     return `
            // <div class="main__product">
            //     <div
            //         class="main__product--tag-sale"
            //         style="display: ${item.item_basic.discount == null ? 'none' : 'block'}"
            //     >   
            //         <sup style="font-size: 0.75em; color: red;">SALE OFF</sup>
            //         ${item.item_basic.discount}
            //     </div>
            //     <div class="main__product--cover-image">
            //         <img class="main__product--image" src="https://cf.shopee.vn/file/${item.item_basic.image}" alt="">
            //     </div>
            //     <div class="main__product--name">
            //         ${item.item_basic.name}
            //     </div>
            //     <div class="main__product--price main__product--price-before" style="display: ${item.item_basic.discount == null ? 'none' : 'flex'}">
            //         <del>${price_before}</del>
            //         <sup style="font-size: 0.5em;">${currency}</sup>
            //     </div>
            //     <div class="main__product--price">
            //         ${price}
            //         <sup style="font-size: 0.5em;">${currency}</sup>
            //     </div>
            //     <div class="main__product--controller">
            //         <a class="main__product--controller--view" onclick="handleRedirectToShopee('${item.item_basic.name}', '${item.item_basic.shopid}', '${item.item_basic.itemid}')">
            //             View
            //         </a>
            //     </div>
            // </div>
            // `
            var href = handleRedirectToShopee(item.item_basic.name, item.item_basic.shopid, item.item_basic.itemid)
            return `
        <a class="product" href="${href}">
        <div class="product-image product-margin">
            <img src="https://cf.shopee.vn/file/${item.item_basic.image}" alt="">
        </div>
        <div class="product-name product-margin">
        ${item.item_basic.name}
        </div>
        <div
        class="product-margin"
        style="color: red;">
        ${item.item_basic.discount == null ? "" : "SALE OFF " + item.item_basic.discount}
    </div>
        <div class="product-price product-margin" style="display: inline-block;">
            <del>${price_before < 1 ? "" : "" + price_before}</del>
            <sup style="font-size: 0.5em;">${price_before < 1 ? "" : "" + currency}</sup>
        </div>
        <div class="product-price product-margin">
            ${price}
            <sup style="font-size: 0.5em;">${currency}</sup>
        </div>
        </a>
        `
        })

        var html2 = data.items.map((item, index) => {
            var price_min = Number(item.item_basic.price_min) / 100000
            var price_max = Number(item.item_basic.price_max) / 100000
            var price_min_before_discount = Number(item.item_basic.price_min_before_discount) / 100000
            var price_max_before_discount = Number(item.item_basic.price_max_before_discount) / 100000
            var currency = item.item_basic.currency
            var price_before =
                price_min_before_discount == price_max_before_discount
                    ? `${price_min_before_discount}`
                    : `${price_max_before_discount} - ${price_max_before_discount}`
            var price = price_min == price_max ? `${price_min}` : `${price_min} - ${price_max}`
            //     return `
            // <div class="main__product">
            //     <div
            //         class="main__product--tag-sale"
            //         style="display: ${item.item_basic.discount == null ? 'none' : 'block'}"
            //     >   
            //         <sup style="font-size: 0.75em; color: red;">SALE OFF</sup>
            //         ${item.item_basic.discount}
            //     </div>
            //     <div class="main__product--cover-image">
            //         <img class="main__product--image" src="https://cf.shopee.vn/file/${item.item_basic.image}" alt="">
            //     </div>
            //     <div class="main__product--name">
            //         ${item.item_basic.name}
            //     </div>
            //     <div class="main__product--price main__product--price-before" style="display: ${item.item_basic.discount == null ? 'none' : 'flex'}">
            //         <del>${price_before}</del>
            //         <sup style="font-size: 0.5em;">${currency}</sup>
            //     </div>
            //     <div class="main__product--price">
            //         ${price}
            //         <sup style="font-size: 0.5em;">${currency}</sup>
            //     </div>
            //     <div class="main__product--controller">
            //         <a class="main__product--controller--view" onclick="handleRedirectToShopee('${item.item_basic.name}', '${item.item_basic.shopid}', '${item.item_basic.itemid}')">
            //             View
            //         </a>
            //     </div>
            // </div>
            // `
            var href = handleRedirectToShopee(item.item_basic.name, item.item_basic.shopid, item.item_basic.itemid)
            if (index <= 9) {
                return `
                <a class="product" href="${href}">
                <div class="product-image product-margin">
                    <img src="https://cf.shopee.vn/file/${item.item_basic.image}" alt="">
                </div>
                <div class="product-name product-margin">
                ${item.item_basic.name}
                </div>
                <div
                class="product-margin"
                style="color: red;">
                ${item.item_basic.discount == null ? "" : "SALE OFF " + item.item_basic.discount}
            </div>
                <div class="product-price product-margin" style="display: inline-block;">
                    <del>${price_before < 1 ? "" : "" + price_before}</del>
                    <sup style="font-size: 0.5em;">${price_before < 1 ? "" : "" + currency}</sup>
                </div>
                <div class="product-price product-margin">
                    ${price}
                    <sup style="font-size: 0.5em;">${currency}</sup>
                </div>
                </a>
                `
            }
        })
        var bottom = `
        </div>
        `

        try {
            document.querySelector('#products-list').innerHTML = top + html.join('') + bottom
        } catch (e) {

        }

        try {
            document.querySelector('#products-list-all').innerHTML = html.join('')
        } catch (e) {

        }

        try {
            document.querySelector('#products-newest-list').innerHTML = html2.join('')
        } catch (e) {

        }
    }
    function getUrlVars() {
        let params = new URLSearchParams(document.location.search);
        let categoryId = params.get("categoryId")
        // let age = parseInt(params.get("age"), 10)
        return categoryId
    }

    formData.append('categoryId', getUrlVars())
    getApiCategoryProducts(renderProducts, formData)

    // function handleGetSortby(sortby) {
    //     localStorage.setItem('sortby', sortby)
    //     const sortbyLS = localStorage.getItem('sortby') || 'pop'
    //     const categoryIdLS = localStorage.getItem('categoryId') || ''
    //     const shopIdLS = localStorage.getItem('shopId') || id
    //     handleGetCategoryProducts(shopIdLS, categoryIdLS, sortbyLS)
    // }

    // function handleGetCategoryId(categoryId) {
    //     localStorage.setItem('categoryId', categoryId)
    //     const sortbyLS = localStorage.getItem('sortby') || 'pop'
    //     const categoryIdLS = localStorage.getItem('categoryId') || ''
    //     const shopIdLS = localStorage.getItem('shopId') || id
    //     handleGetCategoryProducts(shopIdLS, categoryIdLS, sortbyLS)
    // }

    // function handleGetCategoryProducts(shopId, categoryId, sortby) {
    //     var formData = new FormData()
    //     formData.append('shopId', shopId)
    //     formData.append('categoryId', categoryId)
    //     formData.append('sortby', sortby)
    //     for (var value of formData.values()) {
    //         console.log(value);
    //     }
    //     getApiCategoryProducts(renderProducts, formData)
    // }

    // // Lấy thông tin shop
    // const getApiShop = (callback, formData) => {
    //     var options = {
    //         method: 'POST',
    //         // headers: { 'Content-Type': 'application/x-www-form-urlencoding' },
    //         body: formData
    //     }
    //     fetch('../API/shopee/get_shop.php', options)
    //         .then((res) => res.json())
    //         .then(callback)
    // }
    // function renderShop(data) {
    //     var footer = data.data.description
    //     document.querySelector('.footer__item').innerText = footer
    //     var header__shop = `
    //     <div class="header__shop--icon-shopee">
    //         <a href="https://shopee.vn/${data.data.account.username}">
    //             Shopee
    //         </a>
    //     </div>
    //     <a class="header__shop--name" href="https://shopee.vn/${data.data.account.username}" title="Ghé thăm cửa hàng shopee">
    //         ${data.data.name}
    //     </a>
    //     <div class="header__shop--account">
    //         <img class="header__shop--account--image" src="https://cf.shopee.vn/file/${data.data.account.portrait}">
    //         <div class="header__shop--account--name">
    //             ${data.data.account.username}
    //         </div>
    //     </div>
    // `
    //     document.querySelector('.header__shop').innerHTML = header__shop

    // }
    // getApiShop(renderShop, formData)

    // // Lấy ảnh slider
    // const getApiSlider = (callback, formData) => {
    //     var options = {
    //         method: 'POST',
    //         // headers: { 'Content-Type': 'application/x-www-form-urlencoding' },
    //         body: formData
    //     }
    //     fetch('../API/shopee/get_slider.php', options)
    //         .then((res) => res.json())
    //         .then(callback)
    // }
    // function renderSlider(data) {
    //     var index = 10
    //     for (var i = 0; i < data.data.template.decoration.length; i++) {
    //         if (data.data.template.decoration[i].type == 1) {
    //             index = i
    //         }
    //     }
    //     var html1 = `
    // <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
    //     <div class="carousel-indicators">
    // `
    //     var html2 = data.data.template.decoration[index].data.banners.map((item, index) => {
    //         return `
    //         <button
    //             type="button"
    //             data-bs-target="#carouselExampleFade"
    //             data-bs-slide-to="${index}"
    //             class="${index == 0 ? 'active' : ''}"
    //             aria-current="${index == 0 ? 'true' : 'false'}"
    //             aria-label="Slide ${index + 1}"
    //         >
    //         </button>
    // `
    //     })
    //     var html3 = `
    //     </div>
    //     <div class="carousel-inner">
    // `
    //     var html4 = data.data.template.decoration[index].data.banners.map((item, index) => {
    //         return `
    //         <div class="carousel-item ${index == 0 ? 'active' : ''}" data-bs-interval="3000">
    //           <img src="https://cf.shopee.vn/file/${item.banner_image}" class="d-block w-100" alt="...">
    //         </div>
    //     `
    //     })
    //     var html5 = `
    //     </div>
    //     <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
    //         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    //         <span class="visually-hidden">Previous</span>
    //     </button>
    //     <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
    //         <span class="carousel-control-next-icon" aria-hidden="true"></span>
    //         <span class="visually-hidden">Next</span>
    //     </button>
    // </div>
    // `
    //     document.querySelector('.slider').innerHTML = html1 + html2.join('') + html3 + html4.join('') + html5
    // }
    // getApiSlider(renderSlider, formData)

    // // Hiển thị một shopee store từ shopid

    // function getShopId() {
    //     var formElement = document.querySelector('form[name="shopidget"]')
    //     var formData = new FormData(formElement)
    //     console.log(formData.get('shopId'))
    //     localStorage.setItem('shopId', formData.get('shopId'))
    //     alert('Set the Shop ID for the site: ' + formData.get('shopId'))
    //     alert('To go back to Default Settings, please click Reset.')
    //     // window.location = "/meili/"
    //     // getApiSlider(renderSlider, formData)
    //     // getApiCategories(renderCategories, formData)
    //     // getApiShop(renderShop, formData)
    //     // getApiCategoryProducts(renderProducts, formData)
    // }
    // function resetShopId() {
    //     localStorage.removeItem('shopId')
    //     alert('Reset Successfully!!!')
    // }

    function handleRedirectToShopee(itemname, shopid, itemid) {
        var url = 'https://shopee.vn/' + itemname + '-i.' + shopid + '.' + itemid
        return url
        // window.open(url, '_blank')
    }

    // function setWidthSlider() {
    //     var width = window.innerWidth
    //     const getWidth = function () {
    //         switch (true) {
    //             case (width <= 576): return (width - 16) / 2
    //                 break
    //             case (width > 576 && width <= 991): return (width - 32) / 2
    //                 break
    //             // case (width > 991): return (width - (320 + 48)) / 2
    //             // break
    //             default: return console.log('Error!!!')
    //         }
    //     }
    //     // console.log(getWidth())
    //     document.getElementsByClassName('carousel-inner')[0].style.height = getWidth() + 'px';
    //     // console.log(width, document.querySelector('.carousel-inner').style.height, document.querySelector('.carousel-inner'))
    // }

    // window.addEventListener('load', setWidthSlider)
    // window.addEventListener('resize', setWidthSlider)
}