<!DOCTYPE html>
<html>

<head>
    <title>ปฏิทินวันหยุด</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300;400;500&family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100&display=swap" rel="stylesheet">
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        overflow: hidden;
    }

    .holiday-container {
        padding: 15px;
        margin-left: 5vw;
    }

    .tab {
        display: none;
        text-align: left;
    }

    .tab-content {
        height: 500px;
        overflow-y: auto;
    }

    .tab.active {
        display: block;
    }

    .tab-container {
        display: flex;
        justify-content: space-between;
    }

    .tab-button {
        padding: 15px 30px;
        cursor: pointer;
        margin: 10px;
    }


    .tab-button p {
        font-size: 16px;
        font-weight: 500;
    }

    .tab-button:hover {
        border-bottom: 4px solid #009688;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    table td {
        padding: 12px;
    }

    table thead td {
        background-color: #009688;
        color: #ffffff;
        font-weight: bold;
        font-size: 13px;
        border: 1px solid #009688;
    }

    table tbody tr {
        background-color: #f9fafb;
    }

    table tbody tr:nth-child(odd) {
        background-color: #ffffff;
    }

    .count-holiday {
        display: flex;
        align-items: center;
        width: 221px;
        border: 1px solid #009688;
        border-radius: 10px;
        margin: 10px;
        padding: 8px;
    }

    .bold-text {
        font-size: 35px;
        font-weight: 700;
    }

    .add-holiday {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 15vw;
        border-radius: 10px;
        position: absolute;
        right: 2vw;
        top: 36vh;
        background: #009688;
        color: #fff;
    }

    .toggle-switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
        border-radius: 17px;
        background-color: #fff;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        transition: .4s;
        background-color: #009688;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        border-radius: 50%;
        transition: .4s;
        background-color: #fff;
        box-shadow: 0 0 2px rgba(0, 0, 0, 0.6);
    }

    .toggle-switch input[type="checkbox"]:checked+.slider {
        background-color: #009688;
    }

    .toggle-switch input[type="checkbox"]:checked+.slider:before {
        background-color: #fff;
    }

    .toggle-switch input[type="checkbox"]:not(:checked)+.slider {
        background-color: #009688;
    }

    .toggle-switch input[type="checkbox"]:not(:checked)+.slider:before {
        background-color: #fff;
    }

    .toggle-switch input[type="checkbox"]:not(:checked)+.slider {
        background-color: #fff;
    }


    .bold-text {
        font-size: 35px;
        font-weight: 700;
    }

    .overlay-holiday {
        position: fixed;
        top: 0;
        right: 0;
        width: 0;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        overflow-x: hidden;
        transition: 0.5s;
    }

    .overlay-content-holiday {
        width: 35%;
        height: 100%;
        background-color: #fff;
        position: absolute;
        right: 0;
        transform: translateX(100%);
        transition: transform 0.5s ease-in-out;
    }

    /* Styling for close button */
    .close-btn {
        position: absolute;
        top: 13px;
        right: 10px;
        font-size: 35px;
        cursor: pointer;
    }

    .head-text-overlay {
        display: flex;
        align-items: center;
        padding: 20px;
    }

    .input-overlay {
        width: 100%;
        height: 30px;
        padding: 5px;
        border-radius: 10px;
        border: 1px solid grey;
    }

    .status-holiday-btn {
        height: 40px;
        width: 100px;
        background: none
    }

    .staff-td {
        display: flex;
    }

    .staff-td img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
    }

    .add-staff {
        display: flex;
        align-items: center;
        width: 200px;
        height: 40px;
        border: 1px solid grey;
        border-radius: 10px;
        margin: 10px;
        padding: 20px;
        position: absolute;
        top: 24vh;
        right: 0;
    }

    .overlay-staff {
        position: fixed;
        top: 0;
        right: 0;
        width: 0;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        overflow-x: hidden;
        transition: 0.5s;
    }

    .overlay-content-staff {
        width: 35%;
        height: 100%;
        background-color: #fff;
        position: absolute;
        right: 0;
        transform: translateX(100%);
        transition: transform 0.5s ease-in-out;
    }

    .update-holiday {
        display: flex;
        align-items: center;
        width: 200px;
        height: 40px;
        border: 1px solid grey;
        border-radius: 10px;
        margin: 10px;
        padding: 20px;
        position: absolute;
        top: 24vh;
        right: 0;
    }

    .overlay-holiday-update {
        position: fixed;
        top: 0;
        right: 0;
        width: 0;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        overflow-x: hidden;
        transition: 0.5s;
    }

    .overlay-content-holiday-update {
        width: 35%;
        height: 100%;
        background-color: #fff;
        position: absolute;
        right: 0;
        transform: translateX(100%);
        transition: transform 0.5s ease-in-out;
    }

    .holiday-type {
        display: flex;
        gap: 20px;
    }

    .btn-add-category {
        width: 120px;
        height: 40px;
        background-color: #009688;
        border: none;
        border-radius: 10px;
        color: #fff;
        cursor: pointer;
    }

    .btn-cancel-category {
        width: 120px;
        height: 40px;
        background: none;
        border: 1px solid #009688;
        border-radius: 10px;
        color: #009688;
        cursor: pointer;
    }

    .three-dot {
        width: 20px;
        margin-left: 50px;
        margin-bottom: 45px;
        cursor: pointer;
    }

    .option {
        padding: 5px;
        margin: 5px;
        background: #fff;
        box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
        border-radius: 13px;
    }

    .option-box {
        display: flex;
        gap: 10px;
        cursor: pointer;
    }

    .add-edit-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .add-holiday-box {
        display: flex;
        align-items: center;
        width: 221px;
        border: 1px solid #009688;
        border-radius: 10px;
        margin: 10px;
        padding: 8px;
        height: 10vh;
        justify-content: center;
        gap: 10px;
        margin-right: 18vw;
        cursor: pointer;
    }
</style>

<body>
    <?php include 'sidebar.php'; ?>
    <?php include 'navbar.php'; ?>

    <!-- Page content goes here -->
    <div class="holiday-container">
        <h2>ปฏิทินวันหยุด</h2>
        <br>
        <hr>

        <div class="add-edit-container">
            <div class="count-holiday">
                <img src="<?php echo base_url('imgs/calendar-backoffice.png'); ?>" style="width: 11%;">
                <div style="margin-left: 2vw; width: 120px;">
                    <p id="title-holiday">วันหยุด jaaaa</p>
                    <p id="count-holiday"></p>
                </div>
                <div onclick="openOption();">
                    <img src="<?php echo base_url('imgs/three-dot.png'); ?>" class="three-dot">
                </div>
            </div>

            <div class="rendered-content"></div>

            <input type="text" id="input-text">
            <button onclick="copyAndRenderContent();">copy</button>

            <div class="add-holiday-box">
                <p style="font-size: 44px;">+</p>
                <p>เพิ่มปฏิทิน</p>
            </div>
        </div>

        <div id="optionContainer" style="display: none;">
            <div class="option">
                <div class="option-box">
                    <img src="<?php echo base_url('imgs/edit-one.png'); ?>">
                    <p>Edit</p>
                </div>
                <br>
                <div class="option-box">
                    <img src="<?php echo base_url('imgs/delete.png'); ?>">
                    <p>Delete</p>
                </div>
            </div>
        </div>

        <div class="tab-container">
            <div style="display: flex; align-items: center;">
                <div class="tab-button" onclick="showData('holiday')">
                    <p>Holiday</p>
                </div>
                <div class="tab-button" onclick="showData('staff')">
                    <p>Calendar Staff</p>
                </div>
            </div>
        </div>

        <div class="tab-content">
            <div class="tab" id="holiday">
                <div class="add-holiday" onclick="openOverlayHoliday();">
                    <p style="font-size: 30px; margin-right: 10px;">+</p>
                    <p>Add Holiday</p>
                </div>
                <table>
                    <thead>
                        <tr>
                            <td style="width: 15%;">Day</td>
                            <td>Holiday Name TH</td>
                            <td>Holiday Name EN</td>
                            <td>Holiday Type</td>
                            <td>Active</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>

            <div class="tab" id="staff">
                <div class="add-holiday" onclick="openOverlayStaff();">
                    <p style="font-size: 30px; margin-right: 10px;">+</p>
                    <p>Add Staff</p>
                </div>
                <table>
                    <thead>
                        <tr>
                            <td style="width: 20%;">Employee ID</td>
                            <td style="width: 80%;">Name</td>
                        </tr>
                    </thead>
                    <tbody id="staff-table">

                    </tbody>
                </table>
            </div>
        </div>

        <div id="holiday-overlay" class="overlay-holiday">
            <div class="overlay-content-holiday">
                <div class="head-text-overlay">
                    <span class="close-btn" onclick="closeOverlayHoliday()">&times;</span>
                    <h2>Create Holiday</h2>
                </div>
                <hr>
                <div style="padding: 20px;">
                    <p>Day</p>
                    <input type="date" class="input-overlay" id="date-input">
                </div>
                <div style="padding: 20px;">
                    <p>Holiday Name TH</p>
                    <input type="text" class="input-overlay" id="holiday-th" onkeypress="return isThaiCharacter(event)">
                </div>
                <div style="padding: 20px;">
                    <p>Holiday Name EN</p>
                    <input type="text" class="input-overlay" id="holiday-en" onkeypress="return isEnglishCharacter(event)">
                </div>

                <div style="padding: 20px;">
                    <p style="color: grey;">ประเภทวันหยุด</p>
                    <form id="holiday-type-form">
                        <div style="display: flex; gap: 10px;">
                            <input type="radio" name="holidayType" value="traditional_holiday">
                            <p>Traditional Holiday</p>
                        </div>
                        <div style="display: flex; gap: 10px;">
                            <input type="radio" name="holidayType" value="company_holiday">
                            <p>Company Holiday</p>
                        </div>
                    </form>
                </div>

                <div style="padding: 20px;">
                    <p style="color: grey;">เปิดใช้งานในปฏิทิน*</p>
                    <form id="holiday-status-form">

                        <div style="display: flex; gap: 10px;">
                            <input type="radio" name="holidayStatus" value="true">
                            <p>ใช้</p>
                        </div>
                        <div style="display: flex; gap: 10px;">
                            <input type="radio" name="holidayStatus" value="false">
                            <p>ไม่ใช้</p>
                        </div>
                    </form>
                </div>

                <div style="text-align: center;">
                    <button class="btn-cancel-category" onclick="closeOverlayHoliday();">Cancel</button>
                    <button class="btn-add-category" onclick="addHoliday();">Create</button>
                </div>
            </div>
        </div>

        <div id="holiday-update" class="overlay-holiday-update">
            <div class="overlay-content-holiday-update">
                <div class="head-text-overlay">
                    <span class="close-btn" onclick="closeOverlayHolidayUpdate()">&times;</span>
                    <h2>Edit holiday</h2>
                </div>
                <hr>
                <div style="padding: 20px;">
                    <p>Day</p>
                    <input type="date" class="input-overlay" id="date-input-update">
                </div>
                <div style="padding: 20px;">
                    <p>Holiday Name TH</p>
                    <input type="text" class="input-overlay" id="holiday-th-update" onkeypress="return isThaiCharacter(event)">
                </div>
                <div style="padding: 20px;">
                    <p>Holiday Name EN</p>
                    <input type="text" class="input-overlay" id="holiday-en-update" onkeypress="return isEnglishCharacter(event)">
                </div>

                <div style="padding: 20px;">
                    <p>Holiday Type</p>
                    <form id="holiday-type-form-update">
                        <div style="display: flex; gap: 10px;">
                            <input type="radio" name="holidayType" value="traditional_holiday">
                            <p>Traditional Holiday</p>
                        </div>
                        <div style="display: flex; gap: 10px;">
                            <input type="radio" name="holidayType" value="company_holiday">
                            <p>Company Holiday</p>
                        </div>
                    </form>
                </div>

                <div style="padding: 20px;">
                    <p>Holiday Status</p>
                    <form id="holiday-status-form-update">
                        <div style="display: flex; gap: 10px;">
                            <input type="radio" name="holidayStatus" value="true">
                            <p>ใช้</p>
                        </div>
                        <div style="display: flex; gap: 10px;">
                            <input type="radio" name="holidayStatus" value="false">
                            <p>ไม่ใช้</p>
                        </div>
                    </form>
                </div>

                <div style="text-align: center;">
                    <button class="btn-cancel-category" onclick="closeOverlayHolidayUpdate();">Cancel</button>
                    <button id="update-button" class="btn-add-category">EDIT</button>
                </div>
            </div>
        </div>

        <div id="staff-overlay" class="overlay-staff">
            <div class="overlay-content-staff">
                <span class="close-btn" onclick="closeOverlayStaff()">&times;</span>
            </div>
        </div>
    </div>

    <script>
        const clonedContentArray = [];

        function copyAndRenderContent() {
            const inputText = document.getElementById('input-text').value;
            addNewTab(inputText); // Call the function to create a new tab

            const countHolidayDiv = document.querySelector('.count-holiday');
            const renderedContentDiv = document.querySelector('.rendered-content');

            const clonedContent = countHolidayDiv.cloneNode(true);
            const titleHoliday = clonedContent.querySelector('#title-holiday');
            titleHoliday.textContent = inputText;

            clonedContentArray.push(clonedContent);

            renderedContentDiv.innerHTML = '';
            clonedContentArray.forEach((element) => {
                renderedContentDiv.appendChild(element);
            });
        }

        document.getElementById('input-text').addEventListener('keyup', function(event) {
            if (event.key === 'Enter') {
                copyAndRenderContent();
            }
        });

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
        showData('holiday')

        function addNewTab(tabName) {
            const tabContainer = document.querySelector('.tab-container');
            const newTabButton = document.createElement('div');
            newTabButton.classList.add('tab-button');
            newTabButton.innerHTML = `<p>${tabName}</p>`;
            tabContainer.appendChild(newTabButton);

            // Remove "active" class from old active tab button, if any
            const activeTabButton = document.querySelector('.tab-button.active');
            if (activeTabButton) {
                activeTabButton.classList.remove('active');
            }

            // Attach event listener to the new tab button
            newTabButton.addEventListener('click', function() {
                // Remove "active" class from old active tab content, if any
                const activeTabContent = document.querySelector('.tab.active');
                if (activeTabContent) {
                    activeTabContent.classList.remove('active');
                }

                // Add "active" class to the new tab button and tab content
                newTabButton.classList.add('active');
                const selectedContent = document.getElementById(tabName.toLowerCase());
                if (selectedContent) {
                    selectedContent.classList.add('active');
                }
            });

            const tabContent = document.createElement('div');
            tabContent.classList.add('tab');
            tabContent.setAttribute('id', tabName.toLowerCase());
            tabContent.innerHTML = `
        <div class="add-holiday" onclick="openOverlay${tabName}();">
            <p style="font-size: 30px; margin-right: 10px;">+</p>
            <p>Add ${tabName}</p>
        </div>
        <table>
            <thead>
                <tr>
                    <td style="width: 15%;">Day</td>
                    <td>${tabName} Name TH</td>
                    <td>${tabName} Name EN</td>
                    <td>${tabName} Type</td>
                    <td>Active</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <!-- Your new tab content goes here -->
            </tbody>
        </table>
    `;

            const tabContentContainer = document.querySelector('.tab-content');
            tabContentContainer.appendChild(tabContent);
        }

        function openOption() {
            var optionContainer = document.getElementById('optionContainer');
            optionContainer.style.display = 'block';
            optionContainer.style.position = 'absolute';
            optionContainer.style.left = '22vw';
            optionContainer.style.top = '28vh';
        }

        document.addEventListener('click', function(event) {
            var optionContainer = document.getElementById('optionContainer');
            var threeDotIcon = document.querySelector('.three-dot');

            if (event.target !== optionContainer && event.target !== threeDotIcon) {
                optionContainer.style.display = 'none';
            }
        });


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

        fetch("http://localhost:3333/api/getStaff", requestOptions)
            .then(response => {
                return response.json();
            })
            .then(result => {
                const tableBody = document.getElementById("staff-table");

                for (let i in result.staff) {
                    const staffHTML = `
                        <tr>
                            <td>${result.staff[i].eid}</td>
                            <td>
                                <div class="staff-td">
                                    <img src="${result.staff[i].img_profile}">
                                    <div style="margin-left: 15px;">
                                        <p>${result.staff[i].fname} ${result.staff[i].lname}</p>
                                        <p>${result.staff[i].job_title}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    `;
                    tableBody.innerHTML += staffHTML;
                }
            })
            .catch(error => {
                console.log('error', error);
            });

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

        fetch("http://localhost:3333/api/readHoliday", requestOptions)
            .then(response => {
                return response.json()
            })
            .then(result => {
                for (let i in result.holiday) {
                    const titleHoliday = document.getElementById('title-holiday');
                    titleHoliday.textContent = result.holiday[i].title_holiday;

                    const index = parseInt(i) + 1;
                    const countHoliday = document.getElementById('count-holiday');
                    const sumHoliday = `Holiday ${index} day`
                    countHoliday.textContent = sumHoliday;

                    const timestamp = parseInt(result.holiday[i].date)
                    const date = new Date(timestamp);
                    const options = {
                        weekday: 'short',
                        year: 'numeric',
                        month: '2-digit',
                        day: '2-digit'
                    };
                    const formattedDate = date.toLocaleDateString('en-US', options);

                    const tbodyContent = `
                        <tr>
                            <td>${formattedDate}</td>
                            <td>${result.holiday[i].holiday_name_th}</td>
                            <td>${result.holiday[i].holiday_name_en}</td>
                            <td>${result.holiday[i].holiday_type}</td>
                            <td>
                                <label class="toggle-switch">
                                    <input type="checkbox" ${result.holiday[i].holiday_status ? 'checked' : ''} 
                                        onclick="updateStatus(${result.holiday[i].id}, this.checked)" />
                                    <span class="slider"></span>
                                </label>
                            </td>
                            <td>
                                <div onclick="openOverlayHolidayUpdate(
                                    ${result.holiday[i].id},
                                    ${result.holiday[i].date},
                                    '${result.holiday[i].holiday_name_th}',
                                    '${result.holiday[i].holiday_name_en}',
                                    '${result.holiday[i].holiday_type}',
                                    '${result.holiday[i].holiday_status}'
                                );">
                                    <img src="<?php echo base_url('imgs/edit.png'); ?>" style="width: 60%;">
                                </div>                                
                            </td>
                        </tr>
                    `;
                    document.querySelector("tbody").innerHTML += tbodyContent;
                }
            })
            .catch(error => {
                console.log('error', error)
            });

            ////
        function openOverlayHolidayUpdate(id, date, holidayTH, holidayEN, holidayType, holidayStatus) {
            var overlay = document.getElementById("holiday-update");
            overlay.style.width = "100%";
            overlay.querySelector(".overlay-content-holiday-update").style.transform = "translateX(0)";

            var dateInput = document.getElementById("date-input-update");
            dateInput.value = formatDateFromTimestamp(date);

            var holidayTHInput = document.getElementById("holiday-th-update");
            holidayTHInput.value = holidayTH;

            var holidayENInput = document.getElementById("holiday-en-update");
            holidayENInput.value = holidayEN;

            var holidayTypeForm = document.getElementById("holiday-type-form-update");
            var holidayTypeRadios = holidayTypeForm.elements["holidayType"];
            for (var i = 0; i < holidayTypeRadios.length; i++) {
                if (holidayTypeRadios[i].value === holidayType) {
                    holidayTypeRadios[i].checked = true;
                    break;
                }
            }
            var holidayStatusForm = document.getElementById("holiday-status-form-update");
            var holidayStatusRadios = holidayStatusForm.elements["holidayStatus"];
            for (var i = 0; i < holidayStatusRadios.length; i++) {
                if (holidayStatusRadios[i].value === holidayStatus) {
                    holidayStatusRadios[i].checked = true;
                    break;
                }
            }

            document.getElementById("update-button").addEventListener("click", function() {
                var updatedDate = formatTimestampFromDate(dateInput.value);
                var updatedHolidayTH = holidayTHInput.value;
                var updatedHolidayEN = holidayENInput.value;
                var updateHolidayType = holidayTypeForm.elements["holidayType"].value;
                var updateHolidayStatus = holidayStatusForm.elements["holidayStatus"].value;

                var myHeaders = new Headers();
                myHeaders.append("Content-Type", "application/json");

                var raw = JSON.stringify({
                    "token": localStorage.token,
                    "id": id,
                    "date": updatedDate,
                    "holidayTH": updatedHolidayTH,
                    "holidayEN": updatedHolidayEN,
                    "holidayType": updateHolidayType,
                    "holidayStatus": updateHolidayStatus
                });

                var requestOptions = {
                    method: 'POST',
                    headers: myHeaders,
                    body: raw,
                    redirect: 'follow'
                };

                fetch("http://localhost:3333/api/updateHoliday", requestOptions)
                    .then(response => {
                        return response.json()
                    })
                    .then(result => {
                        console.log(result)
                        if (result.code === 200) {
                            alert('OK')
                            location.reload();
                        }
                    })
                    .catch(error => {
                        console.log(error);
                    });
            });
        }


        function updateStatus(id, holidayStatus) {
            var myHeaders = new Headers();
            myHeaders.append("Content-Type", "application/json");

            var raw = JSON.stringify({
                "token": localStorage.token,
                "id": id,
                "status": holidayStatus
            });

            var requestOptions = {
                method: 'POST',
                headers: myHeaders,
                body: raw,
                redirect: 'follow'
            };

            fetch("http://localhost:3333/api/activeOrInActive", requestOptions)
                .then(response => {
                    return response.json()
                })
                .then(result => {
                    if (result.code === 200) {
                        location.reload();
                    }
                })
                .catch(error => {
                    console.log('error', error)
                });
        }

        function openOverlayHoliday() {
            var overlay = document.getElementById("holiday-overlay");
            overlay.style.width = "100%";
            overlay.querySelector(".overlay-content-holiday").style.transform = "translateX(0)";
        }

        function closeOverlayHoliday() {
            var overlay = document.getElementById("holiday-overlay");
            overlay.style.width = "0";
            overlay.querySelector(".overlay-content-holiday").style.transform = "translateX(-100%)";
        }

        function addHoliday() {

            let dateInput = document.getElementById('date-input').value;
            let date = Date.parse(dateInput); // 1

            let holidayTH = document.getElementById('holiday-th').value; // 2
            let holidayEN = document.getElementById('holiday-en').value; // 3

            var holidayTypeForm = document.getElementById('holiday-type-form');
            var holidayStatusForm = document.getElementById('holiday-status-form');

            var selectedHolidayType = holidayTypeForm.elements['holidayType'].value; // 4
            var selectedHolidayStatus = holidayStatusForm.elements['holidayStatus'].value; // 5

            var myHeaders = new Headers();
            myHeaders.append("Content-Type", "application/json");

            var raw = JSON.stringify({
                "token": localStorage.token,
                "day": date,
                "holidayTH": holidayTH,
                "holidayEN": holidayEN,
                "holidayType": selectedHolidayType,
                "holidayStatus": selectedHolidayStatus
            });

            var requestOptions = {
                method: 'POST',
                headers: myHeaders,
                body: raw,
                redirect: 'follow'
            };

            fetch("http://localhost:3333/api/addHoliday", requestOptions)
                .then(response => {
                    return response.json()
                })
                .then(result => {
                    console.log(result)
                    if (result.code === 200) {
                        alert('Success')
                        location.reload();
                    }
                })
                .catch(error => {
                    console.log('error', error)
                });
        }

        function isThaiCharacter(event) {
            var charCode = event.charCode || event.keyCode;
            var charTyped = String.fromCharCode(charCode);
            var thaiPattern = /[\u0E00-\u0E7F]/;

            if (!thaiPattern.test(charTyped)) {
                event.preventDefault();
                return false;
            }
        }

        function isEnglishCharacter(event) {
            var charCode = event.charCode || event.keyCode;
            var charTyped = String.fromCharCode(charCode);
            var englishPattern = /^[a-zA-Z\s]*$/;

            if (!englishPattern.test(charTyped)) {
                event.preventDefault();
                return false;
            }
        }

        function openOverlayStaff() {
            var overlay = document.getElementById("staff-overlay");
            overlay.style.width = "100%";
            overlay.querySelector(".overlay-content-staff").style.transform = "translateX(0)";
        }

        function closeOverlayStaff() {
            var overlay = document.getElementById("staff-overlay");
            overlay.style.width = "0";
            overlay.querySelector(".overlay-content-staff").style.transform = "translateX(-100%)";
        }

        function closeOverlayHolidayUpdate() {
            var overlay = document.getElementById("holiday-update");
            overlay.style.width = "0";
            overlay.querySelector(".overlay-content-holiday-update").style.transform = "translateX(-100%)";
        }

        function formatDateFromTimestamp(timestamp) {
            var date = new Date(timestamp);
            var year = date.getFullYear();
            var month = ("0" + (date.getMonth() + 1)).slice(-2);
            var day = ("0" + date.getDate()).slice(-2);
            return year + "-" + month + "-" + day;
        }

        function formatTimestampFromDate(dateString) {
            var dateParts = dateString.split("-");
            var year = parseInt(dateParts[0]);
            var month = parseInt(dateParts[1]) - 1;
            var day = parseInt(dateParts[2]);
            var date = new Date(year, month, day);
            return date.getTime();
        }
    </script>
</body>

</html>