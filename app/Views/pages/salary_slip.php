<?php 
$session = session();
$token = $session->get('token');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Salary Slip</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('/css/global.css'); ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <?php echo "<script src='".base_url('./backoffice_static/config.js')."'></script>"; ?>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:wght@200;400;500;800&display=swap');

    body {
        margin: 0;
        padding: 0;
        font-family: "Inter", sans-serif;
    }

    .head-container {
        display: flex;
        align-items: center;
        height: 12vh;
        margin-right: 20px;
    }

    .p-head {
        margin: 0 auto;
        text-align: center;
        font-weight: 500;
        font-size: 16px;
    }

    .p-head-salary {
        margin: 0 auto;
        text-align: center;
        font-weight: 500;
        font-size: 16px;
        color: #FFFFFF
    }

    .modal_content_check {
        background-color: #fff;
        width: 80%;
        max-width: 600px;
        padding: 20px;
        border-radius: 16px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        position: relative;
        animation-name: slide_top;
        animation-duration: 0.5s;
        animation-delay: 1s;
        animation-fill-mode: forwards;
    }

    .modal_footer_check {
        display: flex;
    }

    .modal_btn_check {
        background: #FFFFFF;
        border: 1px solid #C7C9D9;
        border-radius: 8px;
        padding: 8px 12px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .modal_btn_check_cancel {
        border: 1px solid #C7C9D9;
        border-radius: 8px;
        padding: 8px 12px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .modal_btn_check {
        background: #0063F7;
        color: #FFFFFF;
    }

    .modal_msg {
        color: #2D3643;
        font-weight: 700;
        font-size: 20px;
        line-height: 32px;
    }

    .cancel_btn_changePassword {
        margin-right: 10px;
        width: 100%;
        background: none;
    }

    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    input {
        padding: 12px 8px;
        width: 343px;
        height: 28px;
        background: #F6F7F9;
        border-radius: 8px;
        border: none;
    }

    .password-wrapper {
        position: relative;
    }

    .password-toggle-icon {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        cursor: pointer;
    }

    .input-content p {
        font-weight: 600;
        font-size: 16px;
    }

    .input-content {
        margin-top: -28px;
    }

    .overlay {
        position: fixed;
        z-index: 9;
        top: 50%;
        left: 50%;
        width: 100%;
        height: 0;
        overflow: hidden;
        background-color: #FFFFFF;
        transition: height 0.3s ease-in-out;
        transform: translate(-50%, -50%);
    }

    .overlay.open {
        height: 100%;
    }

    .close-btn {
        position: absolute;
        font-size: 20px;
        font-weight: bold;
        background-color: transparent;
        border: none;
        cursor: pointer;
    }

    .open-btn {
        padding: 10px 20px;
        font-size: 16px;
        font-weight: bold;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .open-btn:hover {
        background-color: #3e8e41;
    }

    .overlay.slide-up {
        animation: slide-up 0.3s ease-in-out;
    }

    .overlay.slide-down {
        animation: slide-down 0.3s ease-in-out;
    }

    .overlay-salary-detail {
        position: fixed;
        z-index: 10;
        top: 50%;
        left: 50%;
        width: 100%;
        height: 0;
        overflow: hidden;
        background-color: #608DFF;
        transition: height 0.3s ease-in-out;
        transform: translate(-50%, -50%);
    }

    .overlay-salary-detail.open {
        height: 100%;
    }

    .overlay-salary-detail.slide-up {
        animation: slide-up 0.3s ease-in-out;
    }

    .overlay-salary-detail.slide-down {
        animation: slide-down 0.3s ease-in-out;
    }

    .close-btn {
        position: absolute;
        font-size: 20px;
        font-weight: bold;
        background-color: transparent;
        border: none;
        cursor: pointer;
    }

    @keyframes slide-up {
        0% {
            height: 0;
        }

        100% {
            height: 100%;
        }
    }

    @keyframes slide-down {
        0% {
            height: 100%;
        }

        100% {
            height: 0;
        }
    }

    .month-card {
        display: flex;
        flex-direction: column;
        justify-content: center;
        width: 150px;
        height: 120px;
        margin-right: 10px;
        background: #608DFF;
        border-radius: 16px;
        margin-left: 10px;

    }

    .card-title {
        font-weight: 400;
        font-size: 56px;
        color: #B9CDFF;
        margin-left: 29vw;
        margin-top: -3vh;
    }

    .card-date {
        font-weight: 500;
        font-size: 14px;
        margin-top: 5px;
        color: #ffffff;
        margin-left: 10px;
    }

    .card-info {
        margin-top: 10px;
    }

    .card-info-item {
        font-size: 12px;
        font-weight: 400;
        color: #ffffff;
        margin-left: 10px;
    }

    .body-slip-container {
        background-color: #ffffff;
        height: 100%;
        border-radius: 35px;
    }

    .salaryContainer {
        width: 90%;
        height: 85vh;
        margin-left: 5vw;
    }

    .iconName {
        display: flex;
        align-items: center;
        margin-left: 20px;
    }

    .fieldDownload {
        display: flex;
        justify-content: space-between;
        margin-top: 15px;
    }

    .buttonDownload {
        display: flex;
        width: 84px;
        height: 34px;
        justify-content: center;
        align-items: center;
        border: 1px solid #3E7BFA;
        border-radius: 8px;
        gap: 10px;
    }

    .boxA {
        height: 116px;
        width: 343px;
        background: #F2F2F5;
        border-radius: 16px;
        display: inline-block;
        margin-bottom: 20px;
    }

    .boxB {
        height: 88px;
        width: 343px;
        background: #F2F2F5;
        border-radius: 16px;
        display: inline-block;
        margin-bottom: 20px;
    }

    .boxC {
        height: 40px;
        width: 343px;
        background: #608DFF;
        border-radius: 16px;
        display: inline-block;
        margin-bottom: 20px;
    }

    .fieldIncome {
        display: flex;
        justify-content: space-between;
        line-height: 0px;
        margin-left: 10px;
        margin-right: 10px;
    }

    .fieldIncome p {
        font-weight: 400;
        font-size: 12px;
        color: #8F90A6;
    }

    /* loader */
    .loader-wrapper {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: none;
        justify-content: center;
        align-items: center;
        background-color: rgba(0, 0, 0, 0.8);
        z-index: 99999999;
        opacity: 0;
        transition: opacity 0.2s ease-in-out;
    }

    .loader-wrapper.active {
        opacity: 1;
        display: flex;
    }

    .loader {
        border: 16px solid #f3f3f3;
        border-top: 16px solid #3498db;
        border-radius: 50%;
        width: 100px;
        height: 100px;
        animation: spin 2s linear infinite;
        position: absolute;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
    .taxSelect {
        margin-left: 10px;
        width: 150px;
        height: 120px;
        background: #F2F2F5;
        border-radius: 16px;
    }
</style>

<body>
    <div class="loader-wrapper">
        <div class="loader"></div>
    </div>
    <div class="head-container">
        <img src="<?= base_url('imgs/arrowleft_black.png') ?>" alt="Image" onclick="redirectToPage()" style="margin-left: 16px;">
        <p class="p-head">Salary Slip</p>
    </div>
    <!-- Content -->

    <div class="container">
        <div style="text-align: center;">
            <img src="<?= base_url('imgs/Privacy-policy-1.svg') ?>" style="width: 73vw;">
        </div>
        <div class="input-content">
            <p>Your Password</p>
            <div class="password-wrapper">
                <input type="password" id="current-password" name="current-password">
                <span class="password-toggle-icon"><i class="fas fa-eye-slash"></i></span>
            </div>
        </div>
    </div>

    <!-- End Content -->

    <!--overlay-->
    <div class="overlay">
        <div class="head-container">
            <img src="<?= base_url('imgs/arrowleft_black.png') ?>" class="close-btn" style="margin-left: 16px;">
            <p class="p-head">Salary Slip</p>
        </div>
        <p style="margin-left:18px;font-weight: 400;font-size: 14px;color: #8F90A6;">Salary slip</p>
        <div id="buttons-container" style="display: flex; flex-wrap: nowrap; overflow-x: auto; width: auto;">

        </div>
        <p style="margin-left:18px;font-weight: 400;font-size: 14px;color: #8F90A6;">Tax (50 Thwi)</p>
        <div style="display: flex; flex-wrap: nowrap; overflow-x: auto; width: auto;">
            <div class="taxSelect">
            <img src="<?= base_url('imgs/folder-minus.svg') ?>" style="margin-left: 16px; margin-top: 8px;">
                <div>
                    <p style="font-weight: 500;font-size: 14px;color: #8F90A6; margin-left:8px;">03/2023</p>
                    <p style="font-weight: 500;font-size: 14px;color: #8F90A6;margin-left:8px;">31 March 2023</p>
                </div>
            </div>
            <div class="taxSelect">
                <img src="<?= base_url('imgs/folder-minus.svg') ?>" style="margin-left: 16px; margin-top: 8px;">
                <div>
                    <p style="font-weight: 500;font-size: 14px;color: #8F90A6;margin-left:8px;">03/2023</p>
                    <p style="font-weight: 500;font-size: 14px;color: #8F90A6;margin-left:8px;">31 March 2023</p>
                </div>
            </div>
        </div>
        <!-- <button class="open-salary">Open Salary</button> -->
    </div>

    <!--salary detail overlay-->
    <div class="overlay-salary-detail">
        <div class="head-container">
            <img src="<?= base_url('imgs/Icon-back-white.svg') ?>" class="close-salary" style="margin-left: 16px;">
            <p class="p-head-salary">Salary Slip</p>
        </div>
        <div class="body-slip-container">
            <div class="salaryContainer">
                <div class="iconName">
                    <img src="<?= base_url('imgs/mock-profile.jpeg') ?>" id="imgProfile" class="close-salary" width="100px" height="100px" style="border-radius: 50%; margin-top: 10px;">
                    <div style="margin-left: 20px; line-height: 10px;">
                        <p id="nameEmployee" style="font-weight: 500; font-size: 16px; color: #28293D; margin-top: 10px;">Piyathida Kirdrpom(Fhay)</p>
                        <p id="jobPosition" style="font-weight: 400; font-size: 12px; color: #838799;">UXUI Designer</p>
                    </div>
                </div>
                <br>
                <hr>
                <div class="fieldDownload">
                    <p id="payDate" style="font-weight: 400; font-size: 14px;color: #8F90A6;">Salary slip (31 March 2023)</p>
                    <div class="buttonDownload" onclick="downloadSalary();">
                        <img src="<?= base_url('imgs/Icon-download.svg') ?>">
                        <p style="color:#0063F7">PDF</p>
                    </div>
                </div>

                <div class="boxA">
                    <p style="font-weight: 500;font-size: 12px;color: #28293D;line-height: 0px;margin-left: 10px;margin-right: 10px;">Income</p>
                    <div class="fieldIncome">
                        <p>Salary/daily wages</p>
                        <p id="salary">18,000</p>
                    </div>
                    <div class="fieldIncome">
                        <p>Bonus</p>
                        <p id="bonus">-</p>
                    </div>
                    <div class="fieldIncome">
                        <p>Total</p>
                        <p id="totalIncome">18,000</p>
                    </div>

                </div>

                <div class="boxB">
                    <p style="font-weight: 500;font-size: 12px;color: #28293D;line-height: 0px;margin-left: 10px;margin-right: 10px;">Deduction</p>
                    <div class="fieldIncome">
                        <p>Social security</p>
                        <p id="socialSecure">750</p>
                    </div>
                    <div class="fieldIncome">
                        <p>Total</p>
                        <p id="totalDeduction">10,000</p>
                    </div>
                </div>

                <div class="boxC">
                    <div class="fieldIncome">
                        <p style="color: #ffffff">Ney Pay</p>
                        <p id="netPay" style="color: #ffffff">10,000</p>
                    </div>
                </div>
                <div class="boxA">
                    <p style="font-weight: 500;font-size: 12px;color: #28293D;line-height: 0px;margin-left: 10px;margin-right: 10px;">Savings</p>
                    <div class="fieldIncome">
                        <p>Income tax calculate</p>
                        <p>19,000</p>
                    </div>
                    <div class="fieldIncome">
                        <p>Social security</p>
                        <p>2000</p>
                    </div>
                    <div class="fieldIncome">
                        <p>Total</p>
                        <p>19,000</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- end overlay -->

    <!-- Modal -->
    <div class="modal hide" id='modal_fail' style='display:flex;'>
        <div class="modal_content_check">
            <div class="modal_header">
                <img src="<?= base_url("imgs/fail_icon.svg") ?>" alt="Modal Header Image">
            </div>
            <div class="modal_body">
                <div class="modal_msg">Please check again.</div>
                <div class="gray fs-14px modal_text" id="fail_txt">Password must be at least 8 characters long</div>
            </div>
            <div class="modal_footer_check">
                <button class="modal_btn_check_cancel cancel_btn_changePassword" onclick='closeModal();refresh();'>try again</button>
            </div>
        </div>
    </div>

    <div class="modal hide" id='modal_success' style='display:flex;'>
        <div class="modal_content_check">
            <div class="modal_header">
                <img src="<?= base_url("imgs/success_icon.svg") ?>" alt="Modal Header Image">
            </div>
            <div class="modal_body">
                <div class="modal_msg">Email send successfully</div>
                <div class="gray fs-14px modal_text2" style="color: #6B6F80">Your salary have been send to email</div>
            </div>
            <div class="modal_footer_check">
                <button class="modal_btn_check_cancel cancel_btn_changePassword" onclick='closeModal();refresh();'>Cancel</button>
                <button class="modal_btn_check success_btn" onclick='closeModal();backhome();'>Closed</button>
            </div>
        </div>
    </div>
    <!-- end modal -->
</body>

</html>
<script>
    let ENDPOINT = window.API_URL;

    var monthSelect;
    const overlay = document.querySelector('.overlay');
    const closeBtn = document.querySelector('.close-btn');

    const overlaySalary = document.querySelector('.overlay-salary-detail');
    const closeSalary = document.querySelector('.close-salary');

    const passwordInput = document.getElementById("current-password");

    passwordInput.addEventListener("keyup", function() {

        const passwordIn = passwordInput.value;

        var myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/json");

        var raw = JSON.stringify({
            "token": '<?php echo $token; ?>',
            "password": passwordIn
        });

        var requestOptions = {
            method: 'POST',
            headers: myHeaders,
            body: raw,
            redirect: 'follow'
        };

        fetch(ENDPOINT + "api/checkPasswordSalary", requestOptions)
            .then(response => response.json())
            .then(result => {
                if (result.code === 200) {
                    overlay.classList.add('open', 'slide-up');
                }
            })
            .catch(error => {
                console.log('error', error)
            });

    });

    function openOverlay() {
        overlay.classList.add('open', 'slide-up');
    }

    function openOverlaySalary() {
        overlaySalary.classList.add('open', 'slide-up')
    }

    function closeOverlay() {
        overlay.classList.remove('slide-up');
        overlay.classList.add('slide-down');
        setTimeout(() => {
            overlay.classList.remove('open', 'slide-down');
        }, 300);
    }

    function closeOverlaySalary() {
        overlaySalary.classList.remove('slide-up');
        overlaySalary.classList.add('slide-down');
        setTimeout(() => {
            overlaySalary.classList.remove('open', 'slide-down');
        }, 300);
    }

    closeBtn.addEventListener('click', closeOverlay);

    closeSalary.addEventListener('click', closeOverlaySalary);

    function redirectToPage() {
        window.location.href = "<?= base_url("home") ?>";
    }

    const passwordFields = document.querySelectorAll('input[type="password"]');
    const toggleIcons = document.querySelectorAll('.password-toggle-icon');

    toggleIcons.forEach((icon, index) => {
        icon.addEventListener('click', () => {
            const type = passwordFields[index].getAttribute('type') === 'password' ? 'text' : 'password';
            passwordFields[index].setAttribute('type', type);
            const iconClass = type === 'password' ? 'fa-eye-slash' : 'fa-eye';
            icon.querySelector('i').classList.remove(type === 'password' ? 'fa-eye' : 'fa-eye-slash');
            icon.querySelector('i').classList.add(iconClass);
        });
    });

    function model_try_again(alert = 'some thing went wrong 222') {
        setTimeout(function() {
            $('#modal_fail').removeClass('hide')
            $('.modal_content_check').addClass('slide_top');
            $('#fail_txt').html(alert);
        }, 100);
    }

    function closeModal() {
        $('.modal_content_check').removeClass('slide_top');
        setTimeout(function() {
            $('.modal').addClass('hide');
        }, 100);
    }

    function model_success(alert = 'Success') {
        setTimeout(function() {
            $('#modal_success').removeClass('hide');
            $('.modal_content_check').addClass('slide_top');
        }, 100);
    }

    function backhome() {
        window.location.href = "<?= base_url("home") ?>";
    }

    function backlogin() {
        window.location.href = "<?= base_url("login") ?>";
    }

    function refresh() {
        location.reload();
    }

    function selectToSalaryByMonth(month) {
        var d = new Date();
        var year = d.getFullYear();
        var startDate = new Date(year, month, 1).getTime();
        monthSelect = startDate;
        console.log(startDate);

        var myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/json");

        var raw = JSON.stringify({
            "token": '<?php echo $token; ?>',
            "monthMill": startDate
        });

        var requestOptions = {
            method: 'POST',
            headers: myHeaders,
            body: raw,
            redirect: 'follow'
        };

        fetch(ENDPOINT + "api/viewSalarySlip", requestOptions)
            .then(response => response.json())
            .then(result => {
                if (result.code === 200) {
                    console.log(result)
                    const salarySlipElement = document.getElementById("nameEmployee");
                    nameEmployee.innerHTML = result.fullName;

                    const imgProfile = result.imgPic

                    document.getElementById('imgProfile').src = imgProfile

                    const jobPosition = document.getElementById("jobPosition");
                    jobPosition.innerHTML = result.jobPosition;

                    const payDate = document.getElementById("payDate");
                    payDate.innerHTML = result.payDate;

                    const salary = document.getElementById("salary");
                    salary.innerHTML = result.salary;

                    const bonus = document.getElementById("bonus");
                    bonus.innerHTML = result.bonus;

                    const totalIncome = document.getElementById("totalIncome");
                    totalIncome.innerHTML = result.totalIncome;

                    const socialSecure = document.getElementById("socialSecure");
                    socialSecure.innerHTML = result.socialSecure;

                    const totalDeduction = document.getElementById("totalDeduction");
                    totalDeduction.innerHTML = result.totalDeduction;

                    const netPay = document.getElementById("netPay");
                    netPay.innerHTML = result.netPay;

                }
            })
            .catch(error => {
                console.log('error', error)
            });
    }

    function getMonthNumber(month) {
        var monthNumber = ['1', '2', '3', '4', '5', '6',
            '7', '8', '9', '10', '11', '12'
        ];
        return monthNumber[month];
    }

    var buttonsContainer = document.getElementById("buttons-container");
    var currentMonth = new Date().getMonth();
    var monthContainers = {};

    for (var i = 0; i < currentMonth; i++) {
        var monthName = getMonthNumber(i);
        if (!monthContainers[monthName]) {
            monthContainers[monthName] = document.createElement("div");
            var monthNameElement = document.createElement("div");
            monthContainers[monthName].appendChild(monthNameElement);
            buttonsContainer.appendChild(monthContainers[monthName]);
        }
        var monthContainer = monthContainers[monthName];
        var monthButton = document.createElement("div");
        var monthEnd = new Date(new Date().getFullYear(), i + 1, 0);
        monthButton.innerHTML = `
        <div class="month-card" onclick="openOverlaySalary();">
            <div style="display: flex;">
                <div class="card-title">${monthName}</div>
            </div>
            <div class="card-date">${('0' + (i + 1)).slice(-2)}/${new Date().getFullYear()}</div>
            <div class="card-info">
                <div class="card-info-item">${monthEnd.toLocaleDateString()}</div>
            </div>
        </div>
        `;
        monthButton.addEventListener("click", (function(month) {
            return function() {
                selectToSalaryByMonth(month);
            }
        })(i));
        monthContainer.appendChild(monthButton);
    }

    function downloadSalary() {
        document.querySelector(".loader-wrapper").classList.add("active");
        var myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/json");

        var raw = JSON.stringify({
            "token": '<?php echo $token; ?>',
            "monthMill": monthSelect
        });

        var requestOptions = {
            method: 'POST',
            headers: myHeaders,
            body: raw,
            redirect: 'follow'
        };

        fetch(ENDPOINT + "api/downloadSlip", requestOptions)
            .then(response => response.json())
            .then(result => {
                console.log(result)
                if (result.code === 200) {
                    document.querySelector(".loader-wrapper").classList.remove("active");
                    model_success();
                }
            })
            .catch(error => {
                console.log('error', error);
                document.querySelector(".loader-wrapper").classList.remove("active");
            });
    }
</script>