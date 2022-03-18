(function customer() {

    // đây là dữ liệu ảo, như dữ liệu từ server trả về


    // tải tất cả row vào table
    function loadTable() {
        customers.forEach((item, index) => {
            createRow(item, index + 1)
        })
    }

    // tạo row
    function createRow(obj, index = null) {
        const row = document.createElement("tr")
        row.setAttribute("id", "customer" + obj.id)
        const checkbox = document.createElement("td")
        checkbox.innerHTML = "<input type='checkbox' id=remove" + obj.id + " name='remove'/>"
        row.appendChild(checkbox)
        stt = document.createElement("td")
        stt.innerText = index
        row.appendChild(stt)
        Object.keys(obj).forEach((key) => {
            const cell = document.createElement("td")
            cell.innerText = obj[key]
            row.appendChild(cell)
        })
        const detail = document.createElement("td")
        detail.innerHTML = '<i class="bi bi-ticket-detailed" id=detail' + obj.id + '></i>'
        row.appendChild(detail)
        const edit = document.createElement("td")
        edit.innerHTML = '<i class="bi bi-pencil-square js-edit-btn" id=edit' + obj.id + '></i>'
        row.appendChild(edit)
        const init = document.querySelector(".app-body.customer")
        const table = init.querySelector(".js-table")
        table.appendChild(row)
    }

    // lắng nghe sự kiện tạo đối tượng customer
    function handleCreate() {
        const init = document.querySelector(".app-body.customer")
        const create = init.querySelector(".js-finish-btn")
        const form = init.querySelector(".js-create-form")
        form.addEventListener("submit", (e) => {
            e.preventDefault()
        })
        create.addEventListener("click", () => {
            const data = new FormData(form)
            const obj = Object.fromEntries(data)
            createRow(obj)
            alert("Thành công!!!")
        })
    }

    // xóa row
    function removeRow(id) {
        const init = document.querySelector(".app-body.customer")
        const table = init.querySelector(".js-table")
        const row = init.querySelector("#customer" + id)
        table.removeChild(row)
    }

    // xóa nhiều row
    function removeRows(arr) {
        arr.forEach((id) => {
            removeRow(id)
        })
    }

    // lắng nghe sự kiện xóa đối tượng customer
    function handleRemove() {
        const init = document.querySelector(".app-body.customer")
        const removeBtn = init.querySelector(".js-remove-btn")
        removeBtn.addEventListener("click", () => {
            const removeArr = init.querySelectorAll("input[name=remove]")
            let data = []
            removeArr.forEach((checkbox) => {
                if (checkbox.checked == true) {
                    data.push(checkbox.id.slice(6))
                }
            })
            if (data.length <= 0) {
                alert("Không có mục nào được chọn!")
            }
            if (data.length >= 1 && confirm("Bạn chắc chắn muốn xóa " + data.length + " khách hàng ?")) {
                removeRows(data)
                // 
                console.group(Date())
                console.log("\nĐã xóa các ID: ", data)
                //
                data = []
                const checkAll = init.querySelector(".js-remove-check-all")
                checkAll.checked = false
                alert("Thành công!!!")
            } else {

            }
        })
    }

    // cập nhật row
    function updateRow(obj) {
        const init = document.querySelector(".app-body.customer")
        const row = init.querySelector("#customer" + obj.id)
        const cells = row.childNodes;
        const arr = [...Object.values(obj)]
        cells.forEach((cell, index) => {
            if (index >= 2 && index < cells.length - 2) {
                cell.innerText = arr[index - 2]
            }
        })
    }

    // tải dữ liệu row vào form để cập nhật dữ liệu
    function loadRowToForm() {
        const init = document.querySelector(".app-body.customer")
        const form = init.querySelector(".js-update-form")
        const data = new FormData(form)
        const obj = Object.fromEntries(data)
        const load = init.querySelectorAll(".js-edit-btn")
        load.forEach((item, index) => {
            item.addEventListener("click", () => {
                customers.forEach((customer, index) => {
                    if ("edit" + customer.id == item.id) {
                        // form.querySelector("[name='id']").value = customer.id
                        // form.querySelector("[name='name']").value = customer.name
                        // form.querySelector("[name='gender']").value = customer.gender
                        // form.querySelector("[name='birth_date']").value = customer.birth_date
                        // form.querySelector("[name='address']").value = customer.address
                        // form.querySelector("[name='email']").value = customer.email
                        // form.querySelector("[name='password']").value = customer.password
                        // form.querySelector("[name='date_create']").value = customer.date_create
                        // form.querySelector("[name='state']").value = customer.state
                        Object.keys(customer).forEach((key, index) => {
                            form.querySelector("[name=" + key + "]").value = Object.values(customer)[index]
                        })
                    }
                })
            })
        })
    }

    // lắng nghe sự kiện cập nhật đối tượng customer
    function handleUpdate() {
        const init = document.querySelector(".app-body.customer")
        const form = init.querySelector(".js-update-form")
        const update = form.querySelector(".js-finish-btn")
        form.addEventListener("submit", (e) => {
            e.preventDefault()
        })
        update.addEventListener("click", () => {
            const data = new FormData(form)
            const obj = Object.fromEntries(data)
            updateRow(obj)
            alert("Thành công!!!")
        })
    }

    // chờ tải DOM xong thì làm
    window.addEventListener("load", () => {
        const arr = ["https://" + location.hostname + "/admin/customer", "http://" + location.hostname + "/admin/customer"]
        if ((arr.some(e => e == location.href))) {
            loadTable()
            handleRemove()
            handleCreate()
            loadRowToForm()
            handleUpdate()
        }
    })

})();