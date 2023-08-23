<!DOCTYPE html>
<html>

<head>
    <title>Pay Period</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300;400;500&family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<style>
    * {
        margin: 0;
        padding: 0;
    }

    .pay-period-container {
        padding: 15px;
        margin-left: 5vw;
    }

    .salary-period {
        margin-left: 7vw;
    }

    .tab {
        display: none;
    }

    .active {
        display: block;
    }

    .tab-block {
        display: flex;
        gap: 20px;
        padding-top: 20px;
    }

    .tab-block p {
        font-size: 18px;
        color: grey;
    }

    .tab-link:hover,
    .tab-link:hover p {
        color: #009688;
        cursor: pointer;
    }

    .tab-link:active,
    .tab-link:active p {
        color: #009688;
    }

    .eye-create {
        display: flex;
        align-items: center;
        justify-content: right;
        padding-right: 25px;
        gap: 15px;
        padding-bottom: 20px;
    }

    .btn-creaet-period {
        display: flex;
        justify-content: center;
        align-items: center;
        background: #009688;
        width: 120px;
        height: 40px;
        border-radius: 10px;
        gap: 8px;
        cursor: pointer;
    }

    .btn-font {
        color: #fff;
        font-size: 18px;
        font-weight: 600;
    }

    table {
        width: 97%;
        border-collapse: collapse;
        border-radius: 8px;
        overflow: hidden;
    }

    th,
    td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #f5f5f5;
    }
</style>

<body>
    <?php include 'sidebar.php'; ?>
    <?php include 'navbar.php'; ?>

    <!-- Page content goes here -->
    <div class="pay-period-container">
        <h2>เงินเดือน</h2>
        <div class="tab-block">
            <div id="default-tab" class="tab-link" onclick="openTab(event, 'tab1')">
                <p>งวดทั้งหมด</p>
            </div>
            <div class="tab-link" onclick="openTab(event, 'tab2')">
                <p>งวดที่รอทำเงินเดือน</p>
            </div>

        </div>
        <div class="eye-create">
            <p id="eye-icon" onclick="toggleEye()"><i id="eye-icon-inner" class="fas fa-eye"></i></p>
            <div class="btn-creaet-period" onclick="location.href='pay-period-add.html'">
                <p class="btn-font">+</p>
                <p class="btn-font">สร้างงวด</p>
            </div>
        </div>
        <!-- Tab content -->
        <div id="tab1" class="tab">
            <table>
                <thead>
                    <tr>
                        <th>งวดที่</th>
                        <th>วันที่</th>
                        <th>ประเภทการจ้าง</th>
                        <th>วันที่จ่าย</th>
                        <th>ยอดจ่ายสุทธิ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>1 มกราคม 2566 - 10 มกราคม 2566</td>
                        <td>รายเดือน</td>
                        <td>31 มกราคม 2566</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

        </div>

        <div id="tab2" class="tab">
            <h3>Tab 2 Content</h3>
            <p>This is the content of Tab 2.</p>
        </div>
    </div>

    <!-- Other scripts goes here -->

    <script>
        function openTab(event, tabId) {
            var i, tabs, tabLinks;

            tabs = document.getElementsByClassName("tab");
            for (i = 0; i < tabs.length; i++) {
                tabs[i].style.display = "none";
            }

            tabLinks = document.getElementsByClassName("tab-link");
            for (i = 0; i < tabLinks.length; i++) {
                tabLinks[i].className = tabLinks[i].className.replace(" active", "");
            }

            document.getElementById(tabId).style.display = "block";
            event.currentTarget.className += " active";
        }
        document.getElementById("default-tab").click();

        function toggleEye() {
            var eyeIconInner = document.getElementById("eye-icon-inner");
            var amountElements = document.getElementsByClassName("amount");
            var originalAmount = "12000.00";

            if (eyeIconInner.classList.contains("fa-eye")) {
                eyeIconInner.classList.remove("fa-eye");
                eyeIconInner.classList.add("fa-eye-slash");
                // Hide all amount values when the eye icon is clicked
                for (var i = 0; i < amountElements.length; i++) {
                    amountElements[i].textContent = "xxxx.xx";
                }
            } else {
                eyeIconInner.classList.remove("fa-eye-slash");
                eyeIconInner.classList.add("fa-eye");
                // Show all original amount values when the eye icon is clicked
                for (var i = 0; i < amountElements.length; i++) {
                    amountElements[i].textContent = originalAmount;
                }
            }
        }

        function formatDate(timestamp) {
            var seconds = Math.floor(timestamp / 1000);
            var milliseconds = timestamp % 1000;
            var date = new Date(seconds * 1000);
            date.setMilliseconds(milliseconds);
            date.setTime(date.getTime() + 7 * 60 * 60 * 1000);
            var options = {
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            };
            var dateString = date.toLocaleDateString('th-TH', options);
            return dateString;
        }

        var myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/json");

        var raw = JSON.stringify({
            "token": localStorage.token
        });

        var requestOptions = {
            method: 'POST',
            headers: myHeaders,
            body: raw,
            redirect: 'follow'
        };

        fetch("http://localhost:3333/api/getPayPeriod", requestOptions)
            .then(response => {
                return response.json()
            })
            .then(result => {
                const tableBody = document.querySelector('table tbody');
                let tableHTML = '';
                for (let i = 0; i < result.data.length; i++) {
                    const payPeriod = result.data[i];
                    // console.log(payPeriod);

                    const payDate = formatDate(payPeriod.pay_date);

                    const dateStart = formatDate(payPeriod.date_start);
                    const dateEnd = formatDate(payPeriod.date_end);

                    let payType = payPeriod.pay_type;

                    if (payType == 'month') {
                        payType = `<p>รายเดือน</p>`;
                    } else {
                        payType = `<p>รายวัน</p>`;
                    }

                    tableHTML += `
                        <tr>
                            <td>${i + 1}</td>
                            <td>${payDate}</td>
                            <td>${payType}</td>
                            <td>${dateStart} - ${dateEnd}</td>
                            <td class="amount">12000.00</td>
                        </tr>
                    `;

                }
                tableBody.innerHTML = tableHTML;
            })
            .catch(error => {
                console.log('error', error)
            });
    </script>
</body>

</html>