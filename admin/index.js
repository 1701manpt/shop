// 'use strict';

(function aside() {
    const items = [
        {
            href: ".",
            titleUrl: "Home",
            icon: '<i class="bi bi-house-door"></i>',
            title: "Trang chủ",
        },
        {
            href: "customer.php",
            titleUrl: "Customer",
            icon: '<i class="bi bi-people"></i>',
            title: "Khách hàng",
        },
        {
            href: "staff.php",
            titleUrl: "Staff",
            icon: '<i class="bi bi-person-lines-fill"></i>',
            title: "Nhân viên",
        },
        {
            href: "category.php",
            titleUrl: "Category",
            icon: '<i class="bi bi-bookmarks"></i>',
            title: "Danh mục sản phẩm",
        },
        {
            href: "type.php",
            titleUrl: "Type",
            icon: '<i class="bi bi-list-columns"></i>',
            title: "Loại sản phẩm",
        },
        {
            href: "product.php",
            titleUrl: "Product",
            icon: '<i class="bi bi-bucket"></i>',
            title: "Sản phẩm",
        },
        {
            href: "order.php",
            titleUrl: "Order",
            icon: '<i class="bi bi-cart"></i>',
            title: "Đơn hàng",
        },
        {
            href: "sale_off.php",
            titleUrl: "Sale Off",
            icon: '<i class="bi bi-receipt"></i>',
            title: "Giảm giá",
        },
        {
            href: "supplier.php",
            titleUrl: "Supplier",
            icon: '<i class="bi bi-shop"></i>',
            title: "Nhà cung cấp",
        },
        {
            href: "role.php",
            titleUrl: "Role",
            icon: '<i class="bi bi-person-circle"></i>',
            title: "Phân quyền tài khoản",
        },

    ]
    function createItem(href, titleUrl, icon, title) {
        const a = document.createElement("a")
        a.setAttribute("href", href)
        a.classList.add("aside-item")
        const divIcon = document.createElement("div")
        divIcon.classList.add("aside-item-icon")
        divIcon.innerHTML = icon
        const divTitle = document.createElement("div")
        divTitle.classList.add("aside-item-title")
        divTitle.innerText = title
        a.appendChild(divIcon)
        a.appendChild(divTitle)
        if (location.href.slice(0, 8) == "https://") {
            if (location.href == "https://" + location.hostname + "/admin/" + href && href != ".") {
                a.classList.add("aside-item--active")
                document.title = titleUrl + " - Admin"
            }
            if (location.href == "https://" + location.hostname + "/admin/" && href == ".") {
                a.classList.add("aside-item--active")
                document.title = titleUrl + " - Admin"
            }
        }
        if (location.href.slice(0, 7) == "http://") {
            if (location.href == "http://" + location.hostname + "/admin/" + href && href != ".") {
                a.classList.add("aside-item--active")
                document.title = titleUrl + " - Admin"
            }
            if (location.href == "http://" + location.hostname + "/admin/" && href == ".") {
                a.classList.add("aside-item--active")
                document.title = titleUrl + " - Admin"
            }
        }
        const aside = document.querySelector(".aside")
        aside.appendChild(a)
    }
    function loadAside() {
        items.forEach((item, index) => {
            createItem(item.href, item.titleUrl, item.icon, item.title)
        })
    }
    function controlAside() {
        const openMenu = document.querySelector(".js-open-menu")
        const menu = document.querySelector(".aside")
        const closeMenu = document.querySelector(".js-close-menu")
        openMenu.addEventListener("click", () => {
            menu.classList.add("aside--active")
        })
        closeMenu.addEventListener("click", () => {
            menu.classList.remove("aside--active")
        })
    }
    window.addEventListener("load", () => {
        loadAside()
        controlAside()
    })
})();

(function iconUrl() {
    window.addEventListener("load", () => {
        const link = document.createElement("link")
        link.setAttribute("rel", "shortcut icon")
        link.setAttribute("href", "./favicon.ico")
        link.setAttribute("type", "image/x-icon")
        document.head.appendChild(link)
    })
})();

(function () {
    class Table {
        constructor(init, keys, values) {
            this.page = document.querySelector(init.page)
            this.table = this.page.querySelector(init.table)
            this.createRowKey(keys)
            this.createRows(values, keys)
            this.handleRemove()
            this.handleCreate(values.length, keys)
            this.mappingRow()
            this.handleUpdate()
            // console.log(this.page, this.table)
        }

        createCol(obj) {
            const col = document.createElement("th")
            col.classList.add("table-col", "--key")
            col.innerHTML = obj.html
            col.setAttribute("name", obj.name)
            const row = this.table.querySelector(".table-row.--key")
            row.appendChild(col)
        }

        createCols(arr) {
            arr.forEach(obj => {
                this.createCol(obj)
            })
        }

        createRowKey(arr) {
            const row = document.createElement("tr")
            row.classList.add("table-row", "--key")
            this.table.appendChild(row)
            this.createCols(arr)

        }

        row(obj, index, keys) {
            var newObj
            keys.forEach((key) => {
                if (key.const != null) {
                    newObj = Object.defineProperty(obj, key.name, {
                        enumerable: true,
                        configurable: true,
                        writable: true,
                        value: key.const
                    })
                }
            })
            newObj = Object.defineProperty(newObj, "stt", {
                enumerable: true,
                configurable: true,
                writable: true,
                value: index
            })
            // console.log(obj)
            return newObj
        }

        createRow(o, index, keys) {
            // console.log(o)
            const obj = this.row(o, index, keys)
            // console.log(obj)
            const row = document.createElement("tr")
            row.classList.add("table-row")
            row.id = "--" + obj.id
            keys.forEach((key) => {
                Object.entries(obj).forEach((arr) => {
                    if (key.name == arr[0]) {
                        const cell = document.createElement("td")
                        cell.classList.add("table-col")
                        cell.setAttribute("name", key.name)
                        cell.innerHTML = arr[1]
                        row.appendChild(cell)
                        // console.log(arr)
                    }
                })
            })
            this.table.appendChild(row)
        }

        createRows(arr, keys) {
            arr.forEach((row, index) => {
                this.createRow(row, index, keys)
            })
        }

        removeRow(id) {
            const row = this.page.querySelector('#' + id)
            this.table.removeChild(row)
        }

        removeRows(arr) {
            arr.forEach((id, index) => {
                this.removeRow(id)
            })
        }

        handleRemove() {
            const remove = this.page.querySelector(".js-remove-btn")
            remove.addEventListener("click", () => {
                const removeArr = this.table.querySelectorAll("input[name=remove]")
                let data = []
                removeArr.forEach((checkbox) => {
                    if (checkbox.checked == true) {
                        // console.log((checkbox.parentNode).parentNode.id)
                        data.push((checkbox.parentNode).parentNode.id)
                    }
                })
                if (data.length <= 0) {
                    alert("Không có mục nào được chọn!")
                }
                if (data.length >= 1 && confirm("Bạn chắc chắn muốn xóa " + data.length + " khách hàng ?")) {
                    this.removeRows(data)
                    data = []
                    const checkAll = this.table.querySelector(".js-remove-check-all")
                    checkAll.checked = false
                    alert("Thành công!!!")
                } else {

                }
            })
        }

        handleCreate(index, keys) {
            const form = this.page.querySelector(".js-create-form")
            const finish = form.querySelector(".js-finish-btn")
            form.addEventListener("submit", (e) => {
                e.preventDefault()
            })
            finish.addEventListener("click", () => {
                const data = new FormData(form)
                const object = Object.fromEntries(data)
                this.createRow(object, index, keys)
                alert("Thành công!!!")
                this.mappingRow()
            })
        }

        updateRow(obj) {
            const row = this.table.querySelector("#--" + obj.id)
            const cells = row.childNodes
            cells.forEach((cell, index) => {
                Object.entries(obj).forEach((arr, index) => {
                    if (cell.getAttribute("name") == arr[0]) {
                        cell.innerHTML = arr[1]
                    }
                })
            })
        }

        mappingRow() {
            const opens = this.table.querySelectorAll(".js-update-btn")
            opens.forEach((open) => {
                open.addEventListener("click", () => {
                    const row = open.parentNode.parentNode
                    const cells = row.childNodes
                    const form = this.page.querySelector(".js-update-form")
                    cells.forEach((cell, index) => {
                        try {
                            const name = cell.getAttribute("name")
                            form.querySelector("[name=" + name + "]").value = cell.textContent
                        }
                        catch (e) { }
                    })
                })
            })
        }

        handleUpdate() {
            const form = this.page.querySelector(".js-update-form")
            const finish = form.querySelector(".js-finish-btn")
            form.addEventListener("submit", (e) => {
                e.preventDefault()
            })
            finish.addEventListener("click", () => {
                const data = new FormData(form)
                this.updateRow(Object.fromEntries(data))
                alert("Thành công!!!")
            })
        }

    }
    function categoryTable() {
        const init = {
            page: ".app-body.category",
            table: ".table.--category",
            type: "normal"
        }
        const keys = [
            {
                name: "check-all",
                html: '<input type="checkbox" class="js-remove-check-all">',
                const: '<input type="checkbox" name="remove">',
            },
            {
                name: "stt",
                html: "#",
                const: null,
            },
            {
                name: "id",
                html: "Id",
                const: null,
            },
            {
                name: "name",
                html: "Tên danh mục",
                const: null,
            },
            {
                name: "description",
                html: "Mô tả",
                const: null,
            },
            {
                name: "detail",
                html: "Chi tiết",
                const: '<i class="bi bi-ticket-detailed">',
            },
            {
                name: "update",
                html: "",
                const: '<i class="bi bi-pencil-square js-update-btn"></i>',
            },
        ]
        const rows = [
            {
                id: 242,
                name: "Mùa hè sôi nổi",
                description: "nóng nực thì mua hàng",
            },
            {
                id: 22,
                name: "Mùa xuân",
                description: "nóng dsddsdnực thì mua hàng",
            },
            {
                id: 11,
                name: "Mùa đông",
                description: "đé",
            },
        ]
        new Table(init, keys, rows)
    }
    function customerTable() {
        const init = {
            page: ".app-body.customer",
            table: ".table.--customer",
            type: "normal"
        }
        const keys = [
            {
                name: "check-all",
                html: '<input type="checkbox" class="js-remove-check-all">',
                const: '<input type="checkbox" name="remove">',
            },
            {
                name: "stt",
                html: "#",
                const: null,
            },
            {
                name: "id",
                html: "Id",
                const: null,
            },
            {
                name: "name",
                html: "Họ và tên",
                const: null,
            },
            {
                name: "gender",
                html: "Giới tính",
                const: null,
            },
            {
                name: "date_birth",
                html: "Ngày sinh",
                const: null,
            },
            {
                name: "address",
                html: "Địa chỉ",
                const: null,
            },
            {
                name: "email",
                html: "Email",
                const: null,
            },
            {
                name: "password",
                html: "Mật khẩu",
                const: "********",
            },
            {
                name: "date_create",
                html: "Ngày tạo",
                const: null,
            },
            {
                name: "state",
                html: "Trạng thái",
                const: null,
            },
            {
                name: "detail",
                html: "Chi tiết",
                const: '<i class="bi bi-ticket-detailed"></i>',
            },
            {
                name: "update",
                html: "",
                const: '<i class="bi bi-pencil-square js-update-btn"></i>',
            },
        ]
        const customers = [
            {
                id: 32,
                name: "Thái Phương Nam",
                gender: "Nam",
                date_birth: "2001-07-10",
                address: "Bình Định",
                email: "thaiphuongnam1071@gmail.com",
                password: null,
                date_create: "2022-01-24",
                state: "normal",
            },
            {
                id: 42,
                name: "Nguyễn Văn A",
                gender: "Nam",
                date_birth: "2001-07-20",
                address: "Thành Phố Hồ Chí Minh",
                email: "vana@gmail.com",
                password: null,
                date_create: "2021-02-20",
                state: "normal",
            },
            {
                id: 521,
                name: "Người dùng 1",
                gender: "Nữ",
                date_birth: "2004-02-01",
                address: "Vũng Tàu",
                email: "ttpn1@gmail.com",
                password: null,
                date_create: "2022-05-10",
                state: "locked",
            },
            {
                id: 522,
                name: "Người dùng 1",
                gender: "Nữ",
                date_birth: "2004-02-01",
                address: "Vũng Tàu",
                email: "ttpn1@gmail.com",
                password: null,
                date_create: "2022-05-10",
                state: "locked",
            },
            {
                id: 523,
                name: "Người dùng 1",
                gender: "Nữ",
                date_birth: "2004-02-01",
                address: "Vũng Tàu",
                email: "ttpn1@gmail.com",
                password: null,
                date_create: "2022-05-10",
                state: "locked",
            },
            {
                id: 524,
                name: "Người dùng 1",
                gender: "Nữ",
                date_birth: "2004-02-01",
                address: "Vũng Tàu",
                email: "ttpn1@gmail.com",
                password: null,
                date_create: "2022-05-10",
                state: "locked",
            },
            {
                id: 525,
                name: "Người dùng 1",
                gender: "Nữ",
                date_birth: "2004-02-01",
                address: "Vũng Tàu",
                email: "ttpn1@gmail.com",
                password: null,
                date_create: "2022-05-10",
                state: "locked",
            },
            {
                id: 526,
                name: "Người dùng 1",
                gender: "Nữ",
                date_birth: "2004-02-01",
                address: "Vũng Tàu",
                email: "ttpn1@gmail.com",
                password: null,
                date_create: "2022-05-10",
                state: "locked",
            },
            {
                id: 527,
                name: "Người dùng 1",
                gender: "Nữ",
                date_birth: "2004-02-01",
                address: "Vũng Tàu",
                email: "ttpn1@gmail.com",
                password: null,
                date_create: "2022-05-10",
                state: "locked",
            },
            {
                id: 528,
                name: "Người dùng 1",
                gender: "Nữ",
                date_birth: "2004-02-01",
                address: "Vũng Tàu",
                email: "ttpn1@gmail.com",
                password: null,
                date_create: "2022-05-10",
                state: "locked",
            },
            {
                id: 529,
                name: "Người dùng 1",
                gender: "Nữ",
                date_birth: "2004-02-01",
                address: "Vũng Tàu",
                email: "ttpn1@gmail.com",
                password: null,
                date_create: "2022-05-10",
                state: "locked",
            },
            {
                id: 5210,
                name: "Người dùng 1",
                gender: "Nữ",
                date_birth: "2004-02-01",
                address: "Vũng Tàu",
                email: "ttpn1@gmail.com",
                password: null,
                date_create: "2022-05-10",
                state: "locked",
            },
            {
                id: 5211,
                name: "Người dùng 1",
                gender: "Nữ",
                date_birth: "2004-02-01",
                address: "Vũng Tàu",
                email: "ttpn1@gmail.com",
                password: null,
                date_create: "2022-05-10",
                state: "locked",
            },
            {
                id: 5212,
                name: "Người dùng 1",
                gender: "Nữ",
                date_birth: "2004-02-01",
                address: "Vũng Tàu",
                email: "ttpn1@gmail.com",
                password: null,
                date_create: "2022-05-10",
                state: "locked",
            },
            {
                id: 5213,
                name: "Người dùng 1",
                gender: "Nữ",
                date_birth: "2004-02-01",
                address: "Vũng Tàu",
                email: "ttpn1@gmail.com",
                password: null,
                date_create: "2022-05-10",
                state: "locked",
            },
            {
                id: 5214,
                name: "Người dùng 1",
                gender: "Nữ",
                date_birth: "2004-02-01",
                address: "Vũng Tàu",
                email: "ttpn1@gmail.com",
                password: null,
                date_create: "2022-05-10",
                state: "locked",
            },
        ]
        new Table(init, keys, customers)
    }
    function staffTable() {
        const init = {
            page: ".app-body.staff",
            table: ".table.--staff",
            type: "normal"
        }
        const keys = [
            {
                name: "check-all",
                html: '<input type="checkbox" class="js-remove-check-all">',
                const: '<input type="checkbox" name="remove">',
            },
            {
                name: "stt",
                html: "#",
                const: null,
            },
            {
                name: "id",
                html: "Id",
                const: null,
            },
            {
                name: "name",
                html: "Họ và tên",
                const: null,
            },
            {
                name: "gender",
                html: "Giới tính",
                const: null,
            },
            {
                name: "gender",
                html: "Giới tính",
                const: null,
            },
            {
                name: "address",
                html: "Địa chỉ",
                const: null,
            },
            {
                name: "email",
                html: "Email",
                const: null,
            },
            {
                name: "password",
                html: "Mật khẩu",
                const: null,
            },
            {
                name: "date_create",
                html: "Ngày tạo",
                const: null,
            },
            {
                name: "state",
                html: "Trạng thái",
                const: null,
            },
            {
                name: "role_id",
                html: "Chức vụ (ID)",
                const: null,
            },
            {
                name: "update",
                html: "",
                const: '<i class="bi bi-pencil-square js-update-btn"></i>',
            },
        ]
        const staffs = [
            {
                id: 32,
                name: "Thái Phương Nam",
                gender: "Nam",
                date_birth: "2001-07-10",
                address: "Bình Định",
                email: "thaiphuongnam1071@gmail.com",
                password: null,
                date_create: "2022-01-24",
                state: "normal",
                role_id: 32,
            },
            {
                id: 42,
                name: "Nguyễn Văn A",
                gender: "Nam",
                date_birth: "2001-07-20",
                address: "Thành Phố Hồ Chí Minh",
                email: "vana@gmail.com",
                password: null,
                date_create: "2021-02-20",
                state: "normal",
                role_id: 32,
            },
            {
                id: 521,
                name: "Người dùng 1",
                gender: "Nữ",
                date_birth: "2004-02-01",
                address: "Vũng Tàu",
                email: "ttpn1@gmail.com",
                password: null,
                date_create: "2022-05-10",
                state: "locked",
                role_id: 32,
            },
            {
                id: 522,
                name: "Người dùng 1",
                gender: "Nữ",
                date_birth: "2004-02-01",
                address: "Vũng Tàu",
                email: "ttpn1@gmail.com",
                password: null,
                date_create: "2022-05-10",
                state: "locked",
                role_id: 32,
            },
            {
                id: 523,
                name: "Người dùng 1",
                gender: "Nữ",
                date_birth: "2004-02-01",
                address: "Vũng Tàu",
                email: "ttpn1@gmail.com",
                password: null,
                date_create: "2022-05-10",
                state: "locked",
                role_id: 32,
            },
            {
                id: 524,
                name: "Người dùng 1",
                gender: "Nữ",
                date_birth: "2004-02-01",
                address: "Vũng Tàu",
                email: "ttpn1@gmail.com",
                password: null,
                date_create: "2022-05-10",
                state: "locked",
                role_id: 32,
            },
            {
                id: 525,
                name: "Người dùng 1",
                gender: "Nữ",
                date_birth: "2004-02-01",
                address: "Vũng Tàu",
                email: "ttpn1@gmail.com",
                password: null,
                date_create: "2022-05-10",
                state: "locked",
                role_id: 32,
            },
            {
                id: 526,
                name: "Người dùng 1",
                gender: "Nữ",
                date_birth: "2004-02-01",
                address: "Vũng Tàu",
                email: "ttpn1@gmail.com",
                password: null,
                date_create: "2022-05-10",
                state: "locked",
                role_id: 32,
            },
            {
                id: 527,
                name: "Người dùng 1",
                gender: "Nữ",
                date_birth: "2004-02-01",
                address: "Vũng Tàu",
                email: "ttpn1@gmail.com",
                password: null,
                date_create: "2022-05-10",
                state: "locked",
                role_id: 32,
            },
            {
                id: 528,
                name: "Người dùng 1",
                gender: "Nữ",
                date_birth: "2004-02-01",
                address: "Vũng Tàu",
                email: "ttpn1@gmail.com",
                password: null,
                date_create: "2022-05-10",
                state: "locked",
                role_id: 32,
            },
            {
                id: 529,
                name: "Người dùng 1",
                gender: "Nữ",
                date_birth: "2004-02-01",
                address: "Vũng Tàu",
                email: "ttpn1@gmail.com",
                password: null,
                date_create: "2022-05-10",
                state: "locked",
                role_id: 32,
            },
            {
                id: 5210,
                name: "Người dùng 1",
                gender: "Nữ",
                date_birth: "2004-02-01",
                address: "Vũng Tàu",
                email: "ttpn1@gmail.com",
                password: null,
                date_create: "2022-05-10",
                state: "locked",
                role_id: 32,
            },
            {
                id: 5211,
                name: "Người dùng 1",
                gender: "Nữ",
                date_birth: "2004-02-01",
                address: "Vũng Tàu",
                email: "ttpn1@gmail.com",
                password: null,
                date_create: "2022-05-10",
                state: "locked",
                role_id: 32,
            },
            {
                id: 5212,
                name: "Người dùng 1",
                gender: "Nữ",
                date_birth: "2004-02-01",
                address: "Vũng Tàu",
                email: "ttpn1@gmail.com",
                password: null,
                date_create: "2022-05-10",
                state: "locked",
                role_id: 32,
            },
            {
                id: 5213,
                name: "Người dùng 1",
                gender: "Nữ",
                date_birth: "2004-02-01",
                address: "Vũng Tàu",
                email: "ttpn1@gmail.com",
                password: null,
                date_create: "2022-05-10",
                state: "locked",
                role_id: 32,
            },
            {
                id: 5214,
                name: "Người dùng 1",
                gender: "Nữ",
                date_birth: "2004-02-01",
                address: "Vũng Tàu",
                email: "ttpn1@gmail.com",
                password: null,
                date_create: "2022-05-10",
                state: "locked",
                role_id: 32,
            },
        ]
        new Table(init, keys, staffs)
    }
    function typeTable() {
        const init = {
            page: ".app-body.type",
            table: ".table.--type",
            type: "normal"
        }
        const keys = [
            {
                name: "check-all",
                html: '<input type="checkbox" class="js-remove-check-all">',
                const: '<input type="checkbox" name="remove">',
            },
            {
                name: "stt",
                html: "#",
                const: null,
            },
            {
                name: "id",
                html: "Id",
                const: null,
            },
            {
                name: "name",
                html: "Tên loại sản phẩm",
                const: null,
            },
            {
                name: "description",
                html: "Mô tả",
                const: null,
            },
            {
                name: "detail",
                html: "Chi tiết",
                const: '<i class="bi bi-ticket-detailed">',
            },
            {
                name: "update",
                html: "",
                const: '<i class="bi bi-pencil-square js-update-btn"></i>',
            },
        ]
        const types = [
            {
                id: 1,
                name: "dép",
                description: "dép để mang",
            },
            {
                id: 1,
                name: "dép",
                description: "dép để mang",
            },
            {
                id: 1,
                name: "dép",
                description: "dép để mang",
            },
            {
                id: 1,
                name: "dép",
                description: "dép để mang",
            },
            {
                id: 1,
                name: "dép",
                description: "dép để mang",
            },
            {
                id: 1,
                name: "dép",
                description: "dép để mang",
            },
            {
                id: 1,
                name: "dép",
                description: "dép để mang",
            },
        ]
        new Table(init, keys, types)
    }
    function productTable() {
        const init = {
            page: ".app-body.product",
            table: ".table.--product",
            type: "normal"
        }
        const keys = [
            {
                name: "check-all",
                html: '<input type="checkbox" class="js-remove-check-all">',
                const: '<input type="checkbox" name="remove">',
            },
            {
                name: "stt",
                html: "#",
                const: null,
            },
            {
                name: "id",
                html: "Id",
                const: null,
            },
            {
                name: "name",
                html: "Tên loại sản phẩm",
                const: null,
            },
            {
                name: "description",
                html: "Mô tả",
                const: null,
            },
            {
                name: "detail",
                html: "Chi tiết",
                const: '<i class="bi bi-ticket-detailed">',
            },
            {
                name: "update",
                html: "",
                const: '<i class="bi bi-pencil-square js-update-btn"></i>',
            },
        ]
        const types = [
            {
                id: 1,
                name: "dép",
                description: "dép để mang",
            },
            {
                id: 1,
                name: "dép",
                description: "dép để mang",
            },
            {
                id: 1,
                name: "dép",
                description: "dép để mang",
            },
            {
                id: 1,
                name: "dép",
                description: "dép để mang",
            },
            {
                id: 1,
                name: "dép",
                description: "dép để mang",
            },
            {
                id: 1,
                name: "dép",
                description: "dép để mang",
            },
            {
                id: 1,
                name: "dép",
                description: "dép để mang",
            },
        ]
        new Table(init, keys, types)
    }
    function orderTable() {
        const init = {
            page: ".app-body.order",
            table: ".table.--order",
            type: "normal"
        }
        const keys = [
            {
                name: "check-all",
                html: '<input type="checkbox" class="js-remove-check-all">',
                const: '<input type="checkbox" name="remove">',
            },
            {
                name: "stt",
                html: "#",
                const: null,
            },
            {
                name: "id",
                html: "Id",
                const: null,
            },
            {
                name: "name",
                html: "Tên loại sản phẩm",
                const: null,
            },
            {
                name: "description",
                html: "Mô tả",
                const: null,
            },
            {
                name: "detail",
                html: "Chi tiết",
                const: '<i class="bi bi-ticket-detailed">',
            },
            {
                name: "update",
                html: "",
                const: '<i class="bi bi-pencil-square js-update-btn"></i>',
            },
        ]
        const types = [
            {
                id: 1,
                name: "dép",
                description: "dép để mang",
            },
            {
                id: 1,
                name: "dép",
                description: "dép để mang",
            },
            {
                id: 1,
                name: "dép",
                description: "dép để mang",
            },
            {
                id: 1,
                name: "dép",
                description: "dép để mang",
            },
            {
                id: 1,
                name: "dép",
                description: "dép để mang",
            },
            {
                id: 1,
                name: "dép",
                description: "dép để mang",
            },
            {
                id: 1,
                name: "dép",
                description: "dép để mang",
            },
        ]
        new Table(init, keys, types)
    }
    function saleOffTable() {
        const init = {
            page: ".app-body.sale_off",
            table: ".table.--sale_off",
            type: "normal"
        }
        const keys = [
            {
                name: "check-all",
                html: '<input type="checkbox" class="js-remove-check-all">',
                const: '<input type="checkbox" name="remove">',
            },
            {
                name: "stt",
                html: "#",
                const: null,
            },
            {
                name: "id",
                html: "Id",
                const: null,
            },
            {
                name: "name",
                html: "Tên loại sản phẩm",
                const: null,
            },
            {
                name: "description",
                html: "Mô tả",
                const: null,
            },
            {
                name: "detail",
                html: "Chi tiết",
                const: '<i class="bi bi-ticket-detailed">',
            },
            {
                name: "update",
                html: "",
                const: '<i class="bi bi-pencil-square js-update-btn"></i>',
            },
        ]
        const types = [
            {
                id: 1,
                name: "dép",
                description: "dép để mang",
            },
            {
                id: 1,
                name: "dép",
                description: "dép để mang",
            },
            {
                id: 1,
                name: "dép",
                description: "dép để mang",
            },
            {
                id: 1,
                name: "dép",
                description: "dép để mang",
            },
            {
                id: 1,
                name: "dép",
                description: "dép để mang",
            },
            {
                id: 1,
                name: "dép",
                description: "dép để mang",
            },
            {
                id: 1,
                name: "dép",
                description: "dép để mang",
            },
        ]
        new Table(init, keys, types)
    }
    function supplierTable() {
        const init = {
            page: ".app-body.supplier",
            table: ".table.--supplier",
            type: "normal"
        }
        const keys = [
            {
                name: "check-all",
                html: '<input type="checkbox" class="js-remove-check-all">',
                const: '<input type="checkbox" name="remove">',
            },
            {
                name: "stt",
                html: "#",
                const: null,
            },
            {
                name: "id",
                html: "Id",
                const: null,
            },
            {
                name: "name",
                html: "Tên loại sản phẩm",
                const: null,
            },
            {
                name: "description",
                html: "Mô tả",
                const: null,
            },
            {
                name: "detail",
                html: "Chi tiết",
                const: '<i class="bi bi-ticket-detailed">',
            },
            {
                name: "update",
                html: "",
                const: '<i class="bi bi-pencil-square js-update-btn"></i>',
            },
        ]
        const types = [
            {
                id: 1,
                name: "dép",
                description: "dép để mang",
            },
            {
                id: 1,
                name: "dép",
                description: "dép để mang",
            },
            {
                id: 1,
                name: "dép",
                description: "dép để mang",
            },
            {
                id: 1,
                name: "dép",
                description: "dép để mang",
            },
            {
                id: 1,
                name: "dép",
                description: "dép để mang",
            },
            {
                id: 1,
                name: "dép",
                description: "dép để mang",
            },
            {
                id: 1,
                name: "dép",
                description: "dép để mang",
            },
        ]
        new Table(init, keys, types)
    }
    function roleTable() {
        const init = {
            page: ".app-body.role",
            table: ".table.--role",
            type: "normal"
        }
        const keys = [
            {
                name: "check-all",
                html: '<input type="checkbox" class="js-remove-check-all">',
                const: '<input type="checkbox" name="remove">',
            },
            {
                name: "stt",
                html: "#",
                const: null,
            },
            {
                name: "id",
                html: "Id",
                const: null,
            },
            {
                name: "name",
                html: "Tên loại sản phẩm",
                const: null,
            },
            {
                name: "description",
                html: "Mô tả",
                const: null,
            },
            {
                name: "detail",
                html: "Chi tiết",
                const: '<i class="bi bi-ticket-detailed">',
            },
            {
                name: "update",
                html: "",
                const: '<i class="bi bi-pencil-square js-update-btn"></i>',
            },
        ]
        const types = [
            {
                id: 1,
                name: "dép",
                description: "dép để mang",
            },
            {
                id: 1,
                name: "dép",
                description: "dép để mang",
            },
            {
                id: 1,
                name: "dép",
                description: "dép để mang",
            },
            {
                id: 1,
                name: "dép",
                description: "dép để mang",
            },
            {
                id: 1,
                name: "dép",
                description: "dép để mang",
            },
            {
                id: 1,
                name: "dép",
                description: "dép để mang",
            },
            {
                id: 1,
                name: "dép",
                description: "dép để mang",
            },
        ]
        new Table(init, keys, types)
    }

    window.addEventListener("load", () => {
        try {
            customerTable()
        }
        catch (err) { }
        try {
            categoryTable()
        }
        catch (err) { }
        try {
            staffTable()
        }
        catch (err) { }
        try {
            typeTable()
        }
        catch (err) { }
        try {
            productTable()
        }
        catch (err) { }
        try {
            saleOffTable()
        }
        catch (err) { }
        try {
            orderTable()
        }
        catch (err) { }
        try {
            supplierTable()
        }
        catch (err) { }
        try {
            roleTable()
        }
        catch (err) { }
    })
})();

(function input() {
    function checkAll() {
        const checkAll = document.querySelector(".js-remove-check-all")
        const checks = document.querySelectorAll("input[type='checkbox'][name='remove']")
        // console.log(checkAll, checks)
        checkAll.addEventListener("change", () => {
            checks.forEach((check) => {
                check.checked = checkAll.checked
            })
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
    window.addEventListener("load", () => {
        checkAll()
    })
})();

(function modal() {

    function create(obj) {
        const modal = document.querySelector(obj.modal)

        if (obj.open != null) {
            let open = document.querySelector(obj.open)
            open.addEventListener("click", () => {
                modal.classList.add(obj.active)
            })
        }

        if (obj.opens != null) {
            let opens = document.querySelectorAll(obj.opens)
            opens.forEach((item) => {
                item.addEventListener("click", () => {
                    modal.classList.add(obj.active)
                    // console.log("update")
                })
            })
        }
        const close = modal.querySelectorAll(obj.close)
        close.forEach((item) => {
            item.addEventListener("click", () => {
                modal.classList.remove(obj.active)
            })
        })
    }
    window.addEventListener("load", () => {
        create({
            modal: ".modal.js-create-form",
            open: ".js-open-form-create-btn",
            opens: null,
            close: ".js-close-btn",
            active: "modal--active",
        })
        create({
            modal: ".modal.js-update-form",
            open: null,
            opens: ".js-update-btn",
            close: ".js-close-btn",
            active: "modal--active",
        })
    })
})();