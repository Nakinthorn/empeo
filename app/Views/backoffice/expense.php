<!DOCTYPE html>
<html>

<head>
    <title>ค่าใช้จ่าย</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300;400;500&family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100&display=swap" rel="stylesheet">
</head>
<style>
    * {
        margin: 0;
        padding: 0;
    }

    .expense-container {
        padding: 15px;
        margin-left: 5vw;
    }

    .tab {
        display: none;
        text-align: left;
    }

    .tab.active {
        display: block;
        margin-left: 2vw;
    }

    .tab-container {
        display: flex;
    }

    .tab-button {
        padding: 10px 20px;
        cursor: pointer;
    }

    .tab-button p {
        font-size: 18px;
        font-weight: 500;
    }

    .tab-button:hover {
        border-bottom: 4px solid #007268;
    }

    .name-category {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .styled-table {
        border-collapse: collapse;
        width: 98%;
        font-size: 0.8em;
    }

    .styled-table thead tr {
        background-color: #007268;
        color: #ffffff;
        text-align: left;
    }

    .styled-table th,
    .styled-table td {
        padding: 15px 15px;
    }

    .styled-table tbody tr {
        border-bottom: 1px solid #dddddd;
    }

    .styled-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }

    .styled-table tbody tr.active-row {
        font-weight: bold;
        color: #007268;
    }

    .btn-add-category {
        width: 120px;
        height: 40px;
        background-color: #007268;
        border: none;
        border-radius: 10px;
        color: #fff;
        cursor: pointer;
    }

    .btn-cancel-category {
        width: 120px;
        height: 40px;
        background: none;
        border: 1px solid #007268;
        border-radius: 10px;
        color: #007268;
        cursor: pointer;
    }

    #overlayAddCategory {
        position: fixed;
        top: 0;
        left: 100%;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.6);
        transition: left 0.3s ease-in;
    }

    .category-content {
        background-color: #fff;
        position: absolute;
        right: 0;
        width: 35%;
        height: 100%;
    }

    #closeButtonCategory {
        top: 10px;
        padding: 5px 10px;
        color: #000;
        border: none;
        cursor: pointer;
    }

    .add-category-text {
        display: flex;
        justify-content: space-between;
        width: 88%;
        padding: 20px;
    }

    .btn-x-closed {
        font-size: 19px;
        border: none;
        background: none;
        cursor: pointer;
    }

    .inputCategory {
        width: 100%;
        height: 50px;
        border: none;
        border-bottom: solid 1px #007268;
    }

    .btn-container {
        display: flex;
        padding: 40px;
        justify-content: center;
        gap: 30px;
    }

    .select-image {
        display: flex;
    }

    .select-image img {
        width: 60px;
    }

    #selectedImage img {
        width: 60px;
    }

    #overlayLimit {
        position: fixed;
        top: 0;
        left: 100%;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.6);
        transition: left 0.3s ease-in;
    }

    #closeButtonLimit {
        top: 10px;
        padding: 5px 10px;
        color: #000;
        border: none;
        cursor: pointer;
    }

    .limit-content {
        background-color: #fff;
        position: absolute;
        right: 0;
        width: 35%;
        height: 100%;
    }

    .input-limit {
        padding: 20px;
    }

    .input-limit input {
        width: 93%;
        padding: 7px;
        border-radius: 10px;
        border: 1px solid grey;
        padding-left: 20px;
    }

    .option-limit {
        position: absolute;
        right: 57px;
        top: 197px;
        background: none;
        height: 31px;
        border: none;
        border-left: 1px solid gray;
        border-right: 1px solid grey;
        width: 50px;
        text-align: center;
        cursor: pointer;
    }

    /* select {
        display: none;
    } */

    .dropdown-container {
        position: relative;
        display: inline-block;
    }

    .dropdown-container input {
        padding: 7px;
        width: 30vw;
    }

    .dropdown-container .dropdown {
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 1;
        background-color: #fff;
        border: 1px solid #ccc;
        border-top: none;
        display: none;
    }

    .dropdown-container .dropdown.show {
        display: block;
        width: 31vw;
    }

    .dropdown-container .dropdown-option {
        padding: 10px;
        cursor: pointer;
        display: flex;
        align-items: center;
    }

    .dropdown-container .dropdown-option img {
        margin-right: 10px;
        width: 20px;
        height: 20px;
    }
</style>

<body>
    <?php include 'sidebar.php'; ?>
    <?php include 'navbar.php'; ?>

    <!-- Page content goes here -->
    <div class="expense-container">
        <div class="tab-container">
            <div class="tab-button" onclick="showData('expense-category')">
                <p>หมวดหมู่ค่าใช้จ่าย</p>
            </div>

            <div class="tab-button" onclick="showData('expense-limit')">
                <p>วงเงิน</p>
            </div>
        </div>

        <div class="tab-content">

            <div class="tab" id="expense-category">
                <div style="text-align: end; padding: 25px;">
                    <button class="btn-add-category" onclick="addCategory();">+ Add Category</button>
                </div>
                <table id="expenseCategory" class="styled-table">
                    <thead>
                        <tr>
                            <th style="width: 20%;">ชื่อหมวดหมู่ค่าใช้จ่าย</th>
                            <th style="width: 70%;">บันทึก</th>
                            <th style="width: 8%;">สถานะ</th>
                        </tr>
                    </thead>
                </table>
            </div>

            <div class="tab" id="expense-limit">
                <div style="text-align: end; padding: 25px;">
                    <button class="btn-add-category" onclick="addLimit();">+ Add Limit</button>
                </div>
                <table id="limitCategory" class="styled-table">
                    <thead>
                        <tr>
                            <th>ชื่อวงเงิน</th>
                            <th>หมวดหมู่ค่าใช้จ่าย</th>
                            <th>วงเงินค่าใช้จ่าย</th>
                            <th>สังกัด</th>
                            <th>บันทึก</th>
                            <th>สถานะ</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

        <div id="overlayAddCategory">
            <div class="category-content">
                <div class="add-category-text">
                    <p>สร้างหมวดหมู่ค่าใช้จ่าย</p>
                    <button id="closeButtonCategory" class="btn-x-closed" onclick="closeOverlayAddCategory();">X</button>
                </div>
                <hr>
                <div style="padding: 20px;">
                    <p>ข้อมูลหมวดหมู่ค่าใช้จ่าย</p>
                    <br>
                    <div>
                        <p>ชื่อหมวดหมู่ค่าใช้จ่าย*</p>
                        <input type="text" class="inputCategory" id="input-category-value">
                    </div>

                    <div class="select-image">
                        <img src="./symbol_hrm/day.jpeg" onclick="selectImage(this)">
                        <img src="./symbol_hrm/pencil.png" onclick="selectImage(this)">
                        <img src="./symbol_hrm/scanandpay_copy_icon_pin.png" onclick="selectImage(this)">
                        <img src="./symbol_hrm/scb.jpeg" onclick="selectImage(this)">
                        <img src="./symbol_hrm/informationicon.png" onclick="selectImage(this)">
                    </div>

                    <br>

                    <div id="selectedImage">

                    </div>

                    <div>
                        <p>Note</p>
                        <input type="text" class="inputCategory" id="input-note-value">
                    </div>
                </div>

                <div class="btn-container">
                    <button class="btn-cancel-category" onclick="closeOverlayAddCategory();">Cancel</button>
                    <button class="btn-add-category" onclick="insertCategory();">SEND</button>
                </div>

            </div>
        </div>

        <div id="overlayLimit">

            <div class="limit-content">

                <div class="add-category-text">
                    <p>สร้างวงเงินค่าใช้จ่าย</p>
                    <button id="closeButtonLimit" class="btn-x-closed" onclick="closeOverlay();">X</button>
                </div>
                <hr>

                <div class="input-limit">
                    <div>
                        <p>ชื่อวงเงิน</p>
                        <input type="text" class="inputLimit" id="input-limit-name-value">
                    </div>

                    <br>

                    <div>
                        <p>Expense Limit</p>
                        <input type="number" class="inputExpenseLimit" id="input-expense-limit-value">
                        <select name="limitPer" id="limitPer" class="option-limit">
                            <option value="month">Month</option>
                            <option value="year">Year</option>
                        </select>
                    </div>

                    <br>

                    <div class="dropdown-container">
                        <p>หมวดหมู่ค่าใช้จ่าย*</p>
                        <input type="text" id="expense-type" readonly onclick="toggleDropdown()" placeholder="กรุณาเลือก">
                        <div class="dropdown" id="dropdown">
                            <div class="dropdown-option option1" onclick="selectOption(this)" data-value="Option122">
                                <img src="./symbol_hrm/edit-orange.png" alt="Image 1">
                                Option 1
                            </div>
                            <div class="dropdown-option option2" onclick="selectOption(this)" data-value="Option 2">
                                <img src="./symbol_hrm/informationicon.png" alt="Image 2">
                                Option 2
                            </div>
                            <div class="dropdown-option option3" onclick="selectOption(this)" data-value="Option 3">
                                <img src="./symbol_hrm/scanandpay_copy_icon_pin.png" alt="Image 3">
                                Option 3
                            </div>
                            <div class="dropdown-option option4" onclick="selectOption(this)" data-value="Option 4">
                                <img src="./symbol_hrm/up-arrow-icon-png-19.jpg" alt="Image 4">
                                Option 4
                            </div>
                        </div>
                    </div>

                    <br>
                    <br>
                    <div>
                        <p>Note</p>
                        <input type="text" class="inputExpenseLimitNote" id="input-expense-limit-note-value">
                    </div>
                </div>
                <div class="btn-container">
                    <button class="btn-cancel-category" onclick="closeOverlay();">CANCEL</button>
                    <button class="btn-add-category" onclick="insertLimit();">SEND</button>
                </div>

            </div>

        </div>
    </div>

    <!-- Other scripts or footer goes here -->
    <script>
        function showData(content) {
            var tabs = document.getElementsByClassName("tab");
            for (var i = 0; i < tabs.length; i++) {
                tabs[i].classList.remove("active");
            }
            var selectedContent = document.getElementById(content);
            if (selectedContent) {
                selectedContent.classList.add("active");
            }
        }
        showData('expense-category');

        var comID = ''
        var myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/json");

        var raw = JSON.stringify({
            "token": localStorage.token,
        });

        var requestOptions = {
            method: 'POST',
            headers: myHeaders,
            body: raw,
            redirect: 'follow'
        };

        fetch("http://localhost:3333/api/getDataExpense", requestOptions)
            .then(response => {
                return response.json()
            })
            .then(result => {
                console.log(result.limit);
                comID = result.expense[0].com_id;
                const expenseCategory = document.getElementById("expenseCategory");
                let expenseHTML = '';
                for (let i in result.expense) {
                    expenseHTML += `
                        <tbody>
                            <tr>
                                <td>
                                    <div class="name-category">
                                        <img src="${result.expense[i].expense_icon}" alt="Expense Icon" style="width: 30px;">
                                        ${result.expense[i].expense_name}
                                    </div>     
                                </td>
                                <td>${result.expense[i].expense_note}</td>
                                <td>${result.expense[i].expense_status}</td>                            
                            </tr>
                        </tbody>
                    `;
                }
                expenseCategory.innerHTML += expenseHTML;

                const limitCategory = document.getElementById("limitCategory");
                let limitHTML = '';
                for (let i in result.limit) {
                    limitHTML += `
                    <tbody>
                            <tr>
                                <td>${result.limit[i].limit_name}</td>
                                <td>${result.limit[i].expense_category}</td>     
                                <td>${result.limit[i].expense_limit}</td>
                                <td>${result.limit[i].limit_department}</td>
                                <td>${result.limit[i].limit_note}</td>
                                <td>${result.limit[i].limit_status}</td>                       
                            </tr>
                        </tbody>
                    `;
                }
                limitCategory.innerHTML += limitHTML;
            })
            .catch(error => {
                console.log('error', error)
            });

        function addCategory() {
            var overlayAddCategory = document.getElementById('overlayAddCategory');
            var closeButtonCategory = document.getElementById('closeButtonCategory');

            overlayAddCategory.style.left = '0'; // Slide the overlayAddCategory in from the left
            closeButtonCategory.addEventListener('click', closeOverlayAddCategory); // Add click event listener to the close button

            document.getElementById('input-category-value').value = '';
            document.getElementById('input-note-value').value = '';
        }

        function closeOverlayAddCategory() {
            var overlayAddCategory = document.getElementById('overlayAddCategory');
            var closeButtonCategory = document.getElementById('closeButtonCategory');

            overlayAddCategory.style.left = '100%'; // Slide the overlayAddCategory back off-screen
            closeButtonCategory.removeEventListener('click', closeOverlayAddCategory); // Remove the click event listener from the close button

            document.getElementById('input-category-value').value = '';
            document.getElementById('input-note-value').value = '';

            var selectedImageDiv = document.getElementById("selectedImage");
            selectedImageDiv.innerHTML = '';
        }

        let selectedImageSrc = '';

        function selectImage(image) {
            var selectedImageDiv = document.getElementById("selectedImage");
            selectedImageDiv.innerHTML = "";

            var selectedImg = document.createElement("img");
            selectedImg.src = image.src;
            selectedImageDiv.appendChild(selectedImg);

            var canvas = document.createElement("canvas");
            var ctx = canvas.getContext("2d");
            ctx.drawImage(image, 0, 0);
            var base64 = canvas.toDataURL();

            selectedImageSrc = image.src;
        }

        function insertCategory() {
            const expenseName = document.getElementById('input-category-value').value;
            const expenseNote = document.getElementById('input-note-value').value;
            const image = document.getElementById('expense-icon');
            const expenseIcon = selectedImageSrc;

            var myHeaders = new Headers();
            myHeaders.append("Content-Type", "application/json");

            var raw = JSON.stringify({
                "token": localStorage.token,
                "expenseName": expenseName,
                "expenseNote": expenseNote,
                "expenseIcon": expenseIcon
            });

            var requestOptions = {
                method: 'POST',
                headers: myHeaders,
                body: raw,
                redirect: 'follow'
            };

            fetch("http://localhost:3333/api/insertDataExpense", requestOptions)
                .then(response => {
                    return response.json()
                })
                .then(result => {
                    if (result.code === 200) {
                        window.location.reload();
                    }
                })
                .catch(error => {
                    console.log('error', error)
                });
        }

        function addLimit() {
            var overlayLimit = document.getElementById('overlayLimit');
            var closeButtonLimit = document.getElementById('closeButtonLimit');

            overlayLimit.style.left = '0';

            closeButtonLimit.addEventListener('click', closeOverlay);
        }

        function closeOverlay() {
            var overlayLimit = document.getElementById('overlayLimit');
            var closeButtonLimit = document.getElementById('closeButtonLimit');

            overlayLimit.style.left = '100%'; // Slide the overlayLimit back off-screen

            closeButtonLimit.removeEventListener('click', closeOverlay); // Remove the click event listener from the close button
        }

        function toggleDropdown() {
            var dropdown = document.getElementById('dropdown');
            dropdown.classList.toggle('show');
        }

        function selectOption(option) {
            var dropdownInput = document.getElementById('expense-type');
            var selectedOption = option.getAttribute('data-value');
            dropdownInput.value = selectedOption;
            toggleDropdown();
        }

        function insertLimit() {
            const limitName = document.getElementById('input-limit-name-value').value;
            const expenseCategory = document.getElementById('expense-type').value;
            const expenseLimit = document.getElementById('input-expense-limit-value').value;
            const limitPer = document.getElementById('limitPer').value;
            const limitNote = document.getElementById('input-expense-limit-note-value').value;

            var myHeaders = new Headers();
            myHeaders.append("Content-Type", "application/json");

            var raw = JSON.stringify({
                "token": localStorage.token,
                "limitName": limitName,
                "expenseCategory": expenseCategory,
                "expenseLimit": expenseLimit,
                "limitPer": limitPer,
                "limitNote": limitNote
            });

            var requestOptions = {
                method: 'POST',
                headers: myHeaders,
                body: raw,
                redirect: 'follow'
            };

            fetch("http://localhost:3333/api/insertDataLimit", requestOptions)
                .then(response => {
                    return response.json()
                })
                .then(result => {
                    console.log(result)
                    if (result.code === 200) {
                        alert('OK')
                        window.location.reload();
                    }
                })
                .catch(error => {
                    console.log('error', error)
                });
        }
    </script>
</body>

</html>