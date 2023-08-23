<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense and Limit</title>
    <?php echo "<script src='".base_url('./backoffice_static/config.js')."'></script>"; ?>
</head>
<style>
    * {
        padding: 0;
        margin: 0;
    }

    body {
        font-family: 'Open Sans', sans-serif;
    }

    .tab {
        display: none;
        text-align: left;
    }

    .tab.active {
        display: block;
    }

    .tab-container {
        display: flex;
        justify-content: center;
    }

    .tab-button {
        padding: 10px 20px;
        background-color: #eee;
        cursor: pointer;
    }

    .tab-button p {
        font-size: 12px;
        font-weight: 500;
    }

    .tab-button:hover {
        border-bottom: 4px solid orange;
    }

    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 5px;
        text-align: left;
    }

    #overlayAddCategory {
        position: fixed;
        top: 0;
        left: 100%;
        width: 100%;
        height: 100%;
        background-color: #fff;
        transition: left 0.3s ease-in;
    }

    #closeButtonCategory {
        top: 10px;
        padding: 5px 10px;
        background-color: #ccc;
        color: #000;
        border: none;
        cursor: pointer;
    }

    #overlayLimit {
        position: fixed;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background-color: #fff;
        transition: left 0.3s ease-in;
    }

    #closeButtonLimit {
        top: 10px;
        padding: 5px 10px;
        background-color: #ccc;
        color: #000;
        border: none;
        cursor: pointer;
    }

    .inputCategory {
        width: 95%;
        height: 50px;
        border: none;
        border-bottom: solid;
    }

    .dropdownCategory {
        position: relative;
        display: inline-block;
    }

    .dropdownButtonCategory {
        background-color: #4CAF50;
        color: white;
        padding: 10px;
        font-size: 16px;
        border: none;
        cursor: pointer;
    }

    .dropdownCategory-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        width: 95vw;
        overflow-x: auto;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdownCategory-content a {
        display: inline-block;
        width: calc(100% / 6.5);
        white-space: normal;
        box-sizing: border-box;
    }

    .dropdownCategory-content a:nth-child(4n+1) {
        clear: left;
    }

    .dropdownCategory-content a:hover {
        background-color: #f1f1f1;
    }

    .showCategory {
        display: block;
    }

    .dropdownLimit {
        position: relative;
        display: inline-block;
    }

    .dropdownButtonLimit {
        background-color: #4CAF50;
        color: white;
        padding: 10px;
        font-size: 16px;
        border: none;
        cursor: pointer;
    }

    .dropdownLimit-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        width: 95vw;
        overflow-x: auto;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdownLimit-content div {
        display: inline-block;
        width: calc(100% / 4.5);
        white-space: normal;
        box-sizing: border-box;
        font-size: 12px;
        text-align: center;
        margin: 3px;

    }

    .dropdownLimit-content a:nth-child(4n+1) {
        clear: left;
    }

    .dropdownLimit-content a:hover {
        background-color: #f1f1f1;
    }

    .showLimit {
        display: block;
    }
</style>

<body>
    <div>
        <a href="<?php echo base_url('/master_data') ?>">Back</a>
    </div>
    <div class="tab-container">
        <div class="tab-button" onclick="showData('expense-category')">
            <p>Expense category</p>
        </div>

        <div class="tab-button" onclick="showData('expense-limit')">
            <p>Limit</p>
        </div>
    </div>


    <div class="tab-content">

        <div class="tab" id="expense-category">
            <button onclick="addCategory();">+ Add Category</button>
            <table id="expenseCategory" style="width: 100%;">

            </table>
        </div>

        <div class="tab" id="expense-limit">
            <button onclick="addLimit();">+ Add Limit</button>
            <table id="limitCategory" style="width: 100%;">

            </table>
        </div>

    </div>

    <div id="overlayAddCategory">

        <div style="text-align: center;">
            <h3>Create Expense Category</h3>
        </div>

        <div>
            <p>Expense Category Name</p>
            <input type="text" class="inputCategory" id="input-category-value">
        </div>

        <div class="dropdownCategory">
            <button onclick="toggleDropdownCategory()" class="dropdownButtonCategory">Category</button>
            <div id="myDropdown" class="dropdownCategory-content">
                <a href="#" onclick="selectImage(event)"><img src="/public/imgs/icons-announcement.png" alt="announcement"></a>
                <a href="#" onclick="selectImage(event)"><img src="/public/imgs/icons-degree.png" alt="degree"></a>
                <a href="#" onclick="selectImage(event)"><img src="/public/imgs/icons-doctors.png" alt="doctors"></a>
                <a href="#" onclick="selectImage(event)"><img src="/public/imgs/icons-fuel.png" alt="fuel"></a>
                <a href="#" onclick="selectImage(event)"><img src="/public/imgs/icons-accommodation.png" alt="accommodation"></a>
                <a href="#" onclick="selectImage(event)"><img src="/public/imgs/icons-meeting.png" alt="meeting"></a>
                <a href="#" onclick="selectImage(event)"><img src="/public/imgs/icons-travel.png" alt="doctors"></a>
                <a href="#" onclick="selectImage(event)"><img src="/public/imgs/icons-party.png" alt="doctors"></a>
                <a href="#" onclick="selectImage(event)"><img src="/public/imgs/icons-training.png" alt="doctors"></a>
                <a href="#" onclick="selectImage(event)"><img src="/public/imgs/icons-food.png" alt="food"></a>
                <a href="#" onclick="selectImage(event)"><img src="/public/imgs/icons-gift.png" alt="gift"></a>
                <a href="#" onclick="selectImage(event)"><img src="/public/imgs/icons-holiday.png" alt="holiday"></a>
                <a href="#" onclick="selectImage(event)"><img src="/public/imgs/icons-house.png" alt="house"></a>
                <a href="#" onclick="selectImage(event)"><img src="/public/imgs/icons-medicals.png" alt="medicals"></a>
                <a href="#" onclick="selectImage(event)"><img src="/public/imgs/icons-money.png" alt="money"></a>
                <a href="#" onclick="selectImage(event)"><img src="/public/imgs/icons-settings.png" alt="settings"></a>
                <a href="#" onclick="selectImage(event)"><img src="/public/imgs/icons-shopping.png" alt="shopping"></a>
                <a href="#" onclick="selectImage(event)"><img src="/public/imgs/icons-truck.png" alt="truck"></a>
            </div>
        </div>

        <div id="selectedImage">

        </div>

        <div>
            <p>Note</p>
            <input type="text" class="inputCategory" id="input-note-value">
        </div>

        <button id="closeButtonCategory">Cancel</button>
        <button onclick="insertCategory();">SEND</button>
    </div>

    <div id="overlayLimit">
        <button id="closeButtonLimit">Close</button>

        <div style="text-align: center;">
            <h3>Limit</h3>
        </div>

        <div>
            <p>Limit Name</p>
            <input type="text" class="inputLimit" id="input-limit-name-value">
        </div>

        <div class="dropdownLimit">
            <button onclick="toggleDropdownLimit()" class="dropdownButtonLimit">Category</button>
            <div id="myDropdownLimit" class="dropdownLimit-content">
                <div onclick="selectImageLimit(event)">
                    <p>Announcement</p>
                    <img src="/public/imgs/icons-announcement.png">
                </div>
                <div onclick="selectImageLimit(event)">
                    <p>Fuel</p>
                    <img src="/public/imgs/icons-fuel.png">
                </div>
                <div onclick="selectImageLimit(event)">
                    <p>Meeting</p>
                    <img src="/public/imgs/icons-meeting.png">
                </div>
                <div onclick="selectImageLimit(event)">
                    <p>Travel</p>
                    <img src="/public/imgs/icons-travel.png">
                </div>
                <div onclick="selectImageLimit(event)">
                    <p>Party</p>
                    <img src="/public/imgs/icons-party.png">
                </div>
                <div onclick="selectImageLimit(event)">
                    <p>Training</p>
                    <img src="/public/imgs/icons-training.png">
                </div>
                <div onclick="selectImageLimit(event)">
                    <p>Money</p>
                    <img src="/public/imgs/icons-money.png">
                </div>
                <div onclick="selectImageLimit(event)">
                    <p>Settings</p>
                    <img src="/public/imgs/icons-settings.png">
                </div>
            </div>
        </div>

        <div id="selectedImageLimit">

        </div>

        <div>
            <p>Expense Limit</p>
            <input type="number" class="inputExpenseLimit" id="input-expense-limit-value">
            <select name="limitPer" id="limitPer">
                <option value="month">Month</option>
                <option value="year">Year</option>
            </select>
        </div>

        <div>
            <p>Note</p>
            <input type="text" class="inputExpenseLimitNote" id="input-expense-limit-note-value">
        </div>
        <button onclick="insertLimit();">SEND</button>
    </div>


    <script>
        let ENDPOINT = window.API_URL;

        function toggleDropdownCategory() {
            var dropdownCategory = document.getElementById("myDropdown");
            dropdownCategory.classList.toggle("showCategory");
        }

        function selectImage(event) {
            var selectedImage = event.target;
            var canvas = document.createElement('canvas');
            var context = canvas.getContext('2d');
            var img = new Image();

            img.onload = function() {
                canvas.width = img.width;
                canvas.height = img.height;
                context.drawImage(img, 0, 0);
                var base64Image = canvas.toDataURL();
                var imageContainer = document.getElementById("selectedImage");
                imageContainer.innerHTML = '<img src="' + base64Image + '" alt="Selected Image" id="expense-icon">';
            };

            img.src = selectedImage.src;
        }

        window.onclick = function(event) {
            if (!event.target.matches('.dropdownButtonCategory')) {
                var dropdowns = document.getElementsByClassName("dropdownCategory-content");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('showCategory')) {
                        openDropdown.classList.remove('showCategory');
                    }
                }
            }
        };

        function addLimit() {
            var overlayLimit = document.getElementById('overlayLimit');
            var closeButtonLimit = document.getElementById('closeButtonLimit');

            overlayLimit.style.left = '0';

            closeButtonLimit.addEventListener('click', closeOverlay);
        }

        function closeOverlay() {
            var overlayLimit = document.getElementById('overlayLimit');
            var closeButtonLimit = document.getElementById('closeButtonLimit');

            overlayLimit.style.left = '-100%'; // Slide the overlayLimit back off-screen

            closeButtonLimit.removeEventListener('click', closeOverlay); // Remove the click event listener from the close button
        }


        function addCategory() {
            var overlayAddCategory = document.getElementById('overlayAddCategory');
            var closeButtonCategory = document.getElementById('closeButtonCategory');

            overlayAddCategory.style.left = '0'; // Slide the overlayAddCategory in from the left

            closeButtonCategory.addEventListener('click', closeOverlayAddCategory); // Add click event listener to the close button
        }

        function closeOverlayAddCategory() {
            var overlayAddCategory = document.getElementById('overlayAddCategory');
            var closeButtonCategory = document.getElementById('closeButtonCategory');

            overlayAddCategory.style.left = '-100%'; // Slide the overlayAddCategory back off-screen

            closeButtonCategory.removeEventListener('click', closeOverlayAddCategory); // Remove the click event listener from the close button
        }


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
        showData('expense-category')

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

        fetch(ENDPOINT + "api/getDataExpense", requestOptions)
            .then(response => {
                return response.json()
            })
            .then(result => {

                comID = result.expense[0].com_id;
                const expenseCategory = document.getElementById("expenseCategory");
                let expenseHTML = '';
                for (let i in result.expense) {
                    console.log(result.expense[i]);
                    expenseHTML += `
                        <tr>
                            <th>Expense</th>
                            <td>
                                <img src="${result.expense[i].expense_icon}" alt="Expense Icon" style="width: 30px;">
                                ${result.expense[i].expense_name}
                            </td>
                        </tr>
                        <tr>
                            <th>Note</th>
                            <td>${result.expense[i].expense_note}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>${result.expense[i].expense_status}</td>
                        </tr>
                        <tr>
                            <th colspan="2" style="height: 30px"></th>
                        </tr>
                    `;
                }
                expenseCategory.innerHTML += expenseHTML;

                const limitCategory = document.getElementById("limitCategory");
                let limitHTML = '';
                for (let i in result.limit) {
                    console.log(result.limit[i]);
                    limitHTML += `
                        <tr>
                            <th>Limit Name</th>
                            <td>${result.limit[i].limit_name}</td>
                        </tr>
                        <tr>
                            <th>Expense Category</th>
                            <td>${result.limit[i].expense_category}</td>
                        </tr>
                        <tr>
                            <th>Expense Limit</th>
                            <td>
                                ${result.limit[i].expense_limit}
                                <p>per ${result.limit[i].limit_per}</p
                            </td>
                        </tr>
                        <tr>
                            <th>Excess Limit</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Department</th>
                            <td>${result.limit[i].limit_department}</td>
                        </tr>
                        <tr>
                            <th>Note</th>
                            <td>${result.limit[i].limit_note}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>${result.limit[i].limit_status}</td>
                        </tr>
                        <tr>
                            <th colspan="2" style="height: 30px"></th>
                        </tr>
                    `;
                }
                limitCategory.innerHTML += limitHTML;
            })
            .catch(error => {
                console.log('error', error)
            });

        function insertCategory() {
            const expenseName = document.getElementById('input-category-value').value;
            const expenseNote = document.getElementById('input-note-value').value;
            const image = document.getElementById('expense-icon');
            const expenseIcon = image.getAttribute('src');

            var myHeaders = new Headers();
            myHeaders.append("Content-Type", "application/json");

            var raw = JSON.stringify({
                "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJlbXBsb3llZV9pZCI6NDQsImJfaWQiOjIsImJ1c2luZXNzX2lkIjoiMmViNDdmOTAtOTc3Ny00NWQyLTgxNjMtMjI2N2YwYTA3NGFiIiwiaWF0IjoxNjg3ODY2MTQ5fQ.fxYlEly1UgETCVMvusaYjDbW7MNhwOBDYRYR1j5KlD0",
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

            fetch(ENDPOINT + "api/insertDataExpense", requestOptions)
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

        function toggleDropdownLimit() {
            var dropdownLimit = document.getElementById("myDropdownLimit");
            dropdownLimit.classList.toggle("showLimit");
        }

        function selectImageLimit(event) {
            var selectedImageLimit = event.currentTarget;
            var canvas = document.createElement('canvas');
            var context = canvas.getContext('2d');
            var img = new Image();

            img.onload = function() {
                canvas.width = img.width;
                canvas.height = img.height;
                context.drawImage(img, 0, 0);
                var LimitImage = canvas.toDataURL();
                var imageContainer = document.getElementById("selectedImageLimit");
                var selectedText = selectedImageLimit.querySelector("p").innerText;
                imageContainer.innerHTML = `
                    <p id="expense-type">${selectedText}</p>
                    <img src="${LimitImage}" alt="Selected Image" id="expense-icon">
                `;
            };

            img.src = selectedImageLimit.querySelector("img").getAttribute("src");
        }

        window.onclick = function(event) {
            if (!event.target.matches('.dropdownButtonLimit')) {
                var dropdowns = document.getElementsByClassName("dropdownLimit-content");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('showLimit')) {
                        openDropdown.classList.remove('showLimit');
                    }
                }
            }
        };

        function insertLimit() {
            const limitName = document.getElementById('input-limit-name-value').value;
            const expenseCategory = document.getElementById('expense-type').innerText;
            const expenseLimit = document.getElementById('input-expense-limit-value').value;
            const limitPer = document.getElementById('limitPer').value;
            const limitNote = document.getElementById('input-expense-limit-note-value').value;

            var myHeaders = new Headers();
            myHeaders.append("Content-Type", "application/json");

            var raw = JSON.stringify({
                "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJlbXBsb3llZV9pZCI6NDQsImJfaWQiOjIsImJ1c2luZXNzX2lkIjoiMmViNDdmOTAtOTc3Ny00NWQyLTgxNjMtMjI2N2YwYTA3NGFiIiwiaWF0IjoxNjg3ODY2MTQ5fQ.fxYlEly1UgETCVMvusaYjDbW7MNhwOBDYRYR1j5KlD0",
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

            fetch(ENDPOINT + "api/insertDataLimit", requestOptions)
                .then(response => {
                    return response.json()
                })
                .then(result => {
                    console.log(result)
                    if (result.code === 200) {
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