<?php
    $session = session();
    $token = $session->get('token');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
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

    .icon {
        display: flex;
        align-items: center;
    }

    .income-status-use {
        background-color: green;
        border: none;
        color: #fff;
        width: 70px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 10px;
        height: 29px;
    }

    .income-status-not-use {
        background-color: red;
        border: none;
        color: #fff;
        width: 70px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 10px;
        height: 29px;
    }

    #overlayIncome {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.3s ease, visibility 0s linear 0.3s;
    }

    #overlayIncome.open {
        opacity: 1;
        visibility: visible;
        transition-delay: 0s;
    }

    #overlayIncome-content {
        position: fixed;
        top: 0;
        left: 0;
        width: 400px;
        height: 100%;
        background-color: white;
        transform: translateX(100%);
        transition: transform 0.3s ease;
    }

    #overlayIncome.open #overlayIncome-content {
        transform: translateX(0);
        transition-delay: 0.3s;
    }

    #overlayIncome.closed #overlayIncome-content {
        transform: translateX(-100%);
        transition-delay: 0s;
    }

    .confirm {
        display: none;
        /* Hide the modal by default */
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        animation: modalFadeIn 0.3s ease forwards;
    }

    .confirm-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 300px;
        text-align: center;
        animation: modalPopUp 0.3s ease forwards;
    }

    .modal-confirm {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .modal-confirm button {
        padding: 10px 20px;
    }

    .modal-confirm button:hover {
        animation: buttonPulse 0.5s ease infinite;
    }

    .modal-confirm button.cancel-button-animation {
        animation: buttonPulse 0.5s ease;
    }

    @keyframes modalFadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes modalPopUp {
        from {
            transform: scale(0);
        }

        to {
            transform: scale(1);
        }
    }

    @keyframes buttonPulse {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.1);
        }

        100% {
            transform: scale(1);
        }
    }

    #overlayDeduction {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.3s ease, visibility 0s linear 0.3s;
    }

    #overlayDeduction.open {
        opacity: 1;
        visibility: visible;
        transition-delay: 0s;
    }

    #overlayDeduction-content {
        position: fixed;
        top: 0;
        left: 0;
        width: 400px;
        height: 100%;
        background-color: white;
        transform: translateX(100%);
        transition: transform 0.3s ease;
    }

    #overlayDeduction.open #overlayDeduction-content {
        transform: translateX(0);
        transition-delay: 0.3s;
    }

    #overlayDeduction.closed #overlayDeduction-content {
        transform: translateX(-100%);
        transition-delay: 0s;
    }

    .confirmDeduction {
        display: none;
        /* Hide the modal by default */
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        animation: modalFadeIn 0.3s ease forwards;
    }

    .confirm-deduction-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 300px;
        text-align: center;
        animation: modalPopUp 0.3s ease forwards;
    }

    .modal-deduction-confirm {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .modal-deduction-confirm button {
        padding: 10px 20px;
    }

    .modal-deduction-confirm button:hover {
        animation: buttonPulse 0.5s ease infinite;
    }

    .modal-deduction-confirm button.cancel-button-deduction-animation {
        animation: buttonPulse 0.5s ease;
    }
</style>

<body>

    <div class="tab-container">
        <div class="tab-button" onclick="showData('income')">
            <p>Income</p>
        </div>
        <div class="tab-button" onclick="showData('deduction')">
            <p>Deduction</p>
        </div>

    </div>

    <div class="tab-content">
        <div class="tab" id="income">
            <table style="width: 100%;" id="incomeTable">

            </table>
        </div>

        <div class="tab" id="deduction">
            <table style="width: 100%;" id="deductionTable">

            </table>
        </div>
    </div>

    <div id="overlayIncome">
        <div id="overlayIncome-content">
            <button id="closeOverlayIncome">Close</button>
            <button onclick="showConfirmationIncome();">SEND</button>
            <div id="incomeOverlayContent">
                <p>Code</p>
                <input type="text" id="code" disabled>

                <p>Income</p>
                <input type="text" id="incomeValue" disabled>

                <p>Type</p>
                <input type="text" id="type" disabled>

                <p>Cal Tax</p>
                <input type="text" id="calTaxValue">

                <p>Out Of Period</p>
                <input type="text" id="outOfPeriod">

                <p>Next Period</p>
                <input type="text" id="nextPeriod">

                <p>Pay</p>
                <input type="text" id="pay">

                <p>Security Social Fund</p>
                <input type="checkbox" id="securitySocialFund">

                <p>Provident Fund</p>
                <input type="checkbox" id="providentFund">

                <p>Overtime</p>
                <input type="checkbox" id="overtime">

                <p>Late Missing</p>
                <input type="checkbox" id="lateMissing">

                <p>Welfare Benefit</p>
                <input type="checkbox" id="welfareBenefit">

                <p>Status</p>
                <input type="checkbox" id="status">

                <!-- Add more input fields as needed -->
            </div>
        </div>
    </div>

    <div id="confirmationIncome" class="confirm">
        <div class="confirm-content">
            <p>Are you sure you want to send the update?</p>
            <div class="modal-confirm">
                <button id="cancelButton" onclick="cancelUpdate();">Cancel</button>
                <button onclick="confirmUpdate();">Confirm</button>
            </div>
        </div>
    </div>

    <div id="overlayDeduction">
        <div id="overlayDeduction-content">
            <button id="closeOverlayDeduction">Close</button>
            <button onclick="showConfirmationDeduction();">SEND</button>
            <div id="overlayDeductionContent">
                <p>Code</p>
                <input type="text" id="du-code" disabled>

                <p>Deduction</p>
                <input type="text" id="deduction-value">

                <p>Cal Tax</p>
                <input type="text" id="cal-tax-deduction">

                <p>Out Of Period</p>
                <input type="text" id="out-of-period-deduction">

                <p>Next Period</p>
                <input type="text" id="next-period-deduction">

                <p>Pay</p>
                <input type="text" id="pay-deduction">

                <p>Security Social Fund</p>
                <input type="text" id="security-social-fund-deduction">

                <p>Provident Fund</p>
                <input type="text" id="provident-fund-deduction">

                <p>Welfare Benefit</p>
                <input type="text" id="welfare-benefit-deduction">

                <p>Status</p>
                <input type="text" id="status-deduction">
            </div>
        </div>
    </div>

    <div id="confirmationDeduction" class="confirmDeduction">
        <div class="confirm-deduction-content">
            <p>Are you sure you want to send the update?</p>
            <div class="modal-deduction-confirm">
                <button id="cancelButtonDeduction" onclick="cancelUpdateDeduction();">Cancel</button>
                <button onclick="confirmUpdateDeduction();">Confirm</button>
            </div>
        </div>
    </div>

    <script>
        let ENDPOINT = window.API_URL;

        function showConfirmationIncome() {
            var modal = document.getElementById('confirmationIncome');
            modal.style.display = 'block';
        }

        function cancelUpdate() {
            var cancelButton = document.getElementById('cancelButton');
            cancelButton.classList.add('cancel-button-animation');

            setTimeout(function() {
                var modal = document.getElementById('confirmationIncome');
                modal.style.display = 'none';
            }, 500);
        }


        function confirmUpdate() {
            var modal = document.getElementById('confirmationIncome');
            modal.style.display = 'none';
            sendUpdateIncome();
            window.location.reload();
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
        showData('income')

        var comID = '';
        var myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/json");

        var raw = JSON.stringify({
            "token": '<?php echo $token; ?>'
        });

        var requestOptions = {
            method: 'POST',
            headers: myHeaders,
            body: raw,
            redirect: 'follow'
        };

        fetch(ENDPOINT + "api/getData", requestOptions)
            .then(response => {
                return response.json()
            })
            .then(result => {
                console.log(result)
                comID = result.income[0].com_id;
                const incomeTable = document.getElementById("incomeTable");
                let incomeHTML = '';
                for (let i in result.income) {
                    incomeHTML += `
                        <tr>
                            <th>Code</th>
                            <td>${result.income[i].code}</td>
                        </tr>
                        <tr>
                            <th>Income</th>
                            <td>${result.income[i].income}</td>
                        </tr>
                        <tr>
                            <th>Type</th>   
                            <td>${result.income[i].type}</td>
                        </tr>
                        <tr>
                            <th>Cal Tax</th>
                            <td>${result.income[i].cal_tax}</td>
                        </tr>
                        <tr>
                            <th>Out of Period</th>
                            <td>${result.income[i].out_of_period}</td>
                        </tr>
                        <tr>
                            <th>Next Period</th>
                            <td>${result.income[i].next_period}</td>
                        </tr>
                        <tr>
                            <th>Pay</th>
                            <td>${result.income[i].pay}</td>
                        </tr>
                        <tr>
                            <th>Calculation</th>
                            <td>
                                <div class="icon">
                                    <p>${result.income[i].security_social_fund ? '<img src="<?= base_url('/imgs/icons-security-social.png') ?>"  style="height: 20px; width: 20px;">' : ''}</p>
                                    <p>${result.income[i].provident_fund ? '<img src="<?= base_url('/imgs/icons-provident.png') ?>"  style="height: 20px; width: 20px;">' : ''} </p>
                                    <p>${result.income[i].overtime ? '<img src="<?= base_url('/imgs/icons-overtime.png') ?>"  style="height: 20px; width: 20px;">' : ''} </p>
                                    <p>${result.income[i].late_missing ? '<img src="<?= base_url('/imgs/icons-late-missing.png') ?>"  style="height: 20px; width: 20px;">' : ''}</p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Welfare Benefit</th>
                            <td>
                                <p>${result.income[i].welfare_benefit ? '<img src="<?= base_url('/imgs/icons-welfare.png') ?>"  style="height: 20px; width: 20px;">' : ' '}</p> 
                            </td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                ${result.income[i].status ? '<p class="income-status-use">ใช้งาน</p>' : '<p class="income-status-not-use">ไม่ใช้งาน</p>'}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div id="openModalEdit" onclick="openEditIncome('${result.income[i].code}')">
                                    <img src="<?= base_url('/imgs/icons-edit.png') ?>"  style="height: 30px; width: 30px;">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2" style="height: 30px"></th>
                        </tr>
                    `;
                }
                incomeTable.innerHTML += incomeHTML;

                const deductionTable = document.getElementById("deductionTable");
                let deductionHTML = '';
                for (let i in result.deduction) {
                    deductionHTML += `
                        <tr>
                            <th>Code</th>
                            <td>${result.deduction[i].du_code}</td>
                        </tr>
                        <tr>
                            <th>Income</th>
                            <td>${result.deduction[i].deduction}</td>
                        </tr>
                        
                        <tr>
                            <th>Cal Tax</th>
                            <td>${result.deduction[i].du_cal_tax}</td>
                        </tr>
                        <tr>
                            <th>Out of Period</th>
                            <td>${result.deduction[i].du_out_of_period}</td>
                        </tr>
                        <tr>
                            <th>Next Period</th>
                            <td>${result.deduction[i].du_next_period}</td>
                        </tr>
                        <tr>
                            <th>Pay</th>
                            <td>${result.deduction[i].du_pay}</td>
                        </tr>
                        <tr>
                            <th>Calculation</th>
                            <td>
                                <div class="icon">
                                    <p>${result.deduction[i].du_security_social_fund ? '<i class="fas fa-check"></i>' : '<i class="fas fa-times"></i>'}</p>
                                    <p>${result.deduction[i].du_provident_fund ? '<i class="fas fa-check"></i>' : '<i class="fas fa-times"></i>'} </p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Welfare Benefit</th>
                            <td>
                                <p>${result.deduction[i].du_welfare_benefit ? '<i class="fas fa-check"></i>' : '<i class="fas fa-times"></i>'}</p> 
                            </td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>${result.deduction[i].du_status ? '<i class="fas fa-check"></i>' : '<i class="fas fa-times"></i>'}</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button id="openModalEdit" onclick="openEditDeduction('${result.deduction[i].du_code}')">
                                    EDIT
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2" style="height: 30px"></th>
                        </tr>
                    `;
                }
                deductionTable.innerHTML += deductionHTML;
            })
            .catch(error => {
                console.log('error', error)
            });

        function openEditIncome(code) {
            const overlayIncome = document.getElementById('overlayIncome');
            overlayIncome.classList.add('open');

            var myHeaders = new Headers();
            myHeaders.append("Content-Type", "application/json");

            var raw = JSON.stringify({
                "token": '<?php echo $token; ?>',
                "code": code
            });

            var requestOptions = {
                method: 'POST',
                headers: myHeaders,
                body: raw,
                redirect: 'follow'
            };

            fetch(ENDPOINT + "api/getIncomeByCode", requestOptions)
                .then(response => response.json())
                .then(result => {

                    let code = result.data[0].code;
                    document.getElementById('code').value = code;

                    let income = result.data[0].income;
                    document.getElementById('incomeValue').value = income;

                    let type = result.data[0].type;
                    document.getElementById('type').value = type;

                    let calTax = result.data[0].cal_tax;
                    document.getElementById('calTaxValue').value = calTax;

                    let outOfPeriod = result.data[0].out_of_period;
                    document.getElementById('outOfPeriod').value = outOfPeriod;

                    let nextPeriod = result.data[0].next_period;
                    document.getElementById('nextPeriod').value = nextPeriod;

                    let pay = result.data[0].pay;
                    document.getElementById('pay').value = pay;

                    let securitySocialFund = result.data[0].security_social_fund;
                    document.getElementById('securitySocialFund').value = securitySocialFund;
                    if (securitySocialFund === true) {
                        document.getElementById('securitySocialFund').checked = true;
                    } else {
                        document.getElementById('securitySocialFund').checked = false;
                    }

                    let providentFund = result.data[0].provident_fund;
                    document.getElementById('providentFund').value = providentFund;
                    if (providentFund === true) {
                        document.getElementById('providentFund').checked = true;
                    } else {
                        document.getElementById('providentFund').checked = false;
                    }

                    let overtime = result.data[0].overtime;
                    document.getElementById('overtime').value = overtime;
                    if (overtime === true) {
                        document.getElementById('overtime').checked = true;
                    } else {
                        document.getElementById('overtime').checked = false;
                    }

                    let lateMissing = result.data[0].late_missing;
                    document.getElementById('lateMissing').value = lateMissing;
                    if (lateMissing === true) {
                        document.getElementById('lateMissing').checked = true;
                    } else {
                        document.getElementById('lateMissing').checked = false;
                    }

                    let welfareBenefit = result.data[0].welfare_benefit;
                    document.getElementById('welfareBenefit').value = welfareBenefit;
                    if (welfareBenefit === true) {
                        document.getElementById('welfareBenefit').checked = true;
                    } else {
                        document.getElementById('welfareBenefit').checked = false;
                    }

                    let status = result.data[0].status;
                    document.getElementById('status').value = status;
                    if (status === true) {
                        document.getElementById('status').checked = true;
                    } else {
                        document.getElementById('status').checked = false;
                    }

                })
                .catch(error => {
                    console.log('error', error);
                });
        }

        function sendUpdateIncome() {
            var code = document.getElementById('code').value;
            var income = document.getElementById('incomeValue').value;
            var type = document.getElementById('type').value;
            var calTax = document.getElementById('calTaxValue').value;
            var outOfPeriod = document.getElementById('outOfPeriod').value;
            var nextPeriod = document.getElementById('nextPeriod').value;
            var pay = document.getElementById('pay').value;
            var securitySocialFund = document.getElementById('securitySocialFund').checked;
            var providentFund = document.getElementById('providentFund').checked;
            var overtime = document.getElementById('overtime').checked;
            var lateMissing = document.getElementById('lateMissing').checked;
            var welfareBenefit = document.getElementById('welfareBenefit').checked;
            var status = document.getElementById('status').checked;

            var payload = {
                "com_id": comID,
                "code": code,
                "income": income,
                "type": type,
                "cal_tax": calTax,
                "out_of_period": outOfPeriod,
                "next_period": nextPeriod,
                "pay": pay,
                "security_social_fund": securitySocialFund,
                "provident_fund": providentFund,
                "overtime": overtime,
                "late_missing": lateMissing,
                "welfare_benefit": welfareBenefit,
                "status": status
            };

            fetch(ENDPOINT + "api/editIncome", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(payload)
                })
                .then(response => response.json())
                .then(result => console.log(result))
                .catch(error => console.log('error', error));
        }

        function closeOverlayIncome() {
            const overlayIncome = document.getElementById('overlayIncome');
            overlayIncome.classList.remove('open');
        }

        const editButtons = document.getElementsByClassName('openModalEdit');
        for (let i = 0; i < editButtons.length; i++) {
            editButtons[i].addEventListener('click', function() {
                openEditIncome(i);
            });
        }

        document.getElementById('closeOverlayIncome').addEventListener('click', closeOverlayIncome);

        function openEditDeduction(code) {
            const overlayDeduction = document.getElementById('overlayDeduction');
            overlayDeduction.classList.add('open');

            var myHeaders = new Headers();
            myHeaders.append("Content-Type", "application/json");

            var raw = JSON.stringify({
                "token": '<?php echo $token; ?>',
                "code": code
            });

            var requestOptions = {
                method: 'POST',
                headers: myHeaders,
                body: raw,
                redirect: 'follow'
            };

            fetch(ENDPOINT + "api/getDeductionByCode", requestOptions)
                .then(response => {
                    return response.json()
                })
                .then(result => {
                    let duCode = result.data[0].du_code;
                    document.getElementById('du-code').value = duCode;

                    let deduction = result.data[0].deduction;
                    document.getElementById('deduction-value').value = deduction;

                    let calTaxDeduction = result.data[0].du_cal_tax;
                    document.getElementById('cal-tax-deduction').value = calTaxDeduction;

                    let outOfPeriodDeduction = result.data[0].du_out_of_period;
                    document.getElementById('out-of-period-deduction').value = outOfPeriodDeduction;

                    let nextPeriodDeduction = result.data[0].du_next_period;
                    document.getElementById('next-period-deduction').value = nextPeriodDeduction;

                    let payDeduction = result.data[0].du_pay;
                    document.getElementById('pay-deduction').value = payDeduction;

                    let securitySocialFundDeduction = result.data[0].du_security_social_fund;
                    document.getElementById('security-social-fund-deduction').value = securitySocialFundDeduction;

                    let providentFundDeduction = result.data[0].du_provident_fund;
                    document.getElementById('provident-fund-deduction').value = providentFundDeduction;

                    let welfareBenefitDeduction = result.data[0].du_welfare_benefit;
                    document.getElementById('welfare-benefit-deduction').value = welfareBenefitDeduction;

                    let statusDeduction = result.data[0].du_status;
                    document.getElementById('status-deduction').value = statusDeduction;
                })
                .catch(error => {
                    console.log('error', error)
                });
        }

        function sendUpdateDeduction() {
            var duCode = document.getElementById('du-code').value;
            var deduction = document.getElementById('deduction-value').value;
            var calTaxDeduction = document.getElementById('cal-tax-deduction').value;
            var outOfPeriodDeduction = document.getElementById('out-of-period-deduction').value;
            var nextPeriodDeduction = document.getElementById('next-period-deduction').value;
            var payDeduction = document.getElementById('pay-deduction').value;
            var securitySocialFundDeduction = document.getElementById('security-social-fund-deduction').value;
            var providentFundDeduction = document.getElementById('provident-fund-deduction').value;
            var welfareBenefitDeduction = document.getElementById('welfare-benefit-deduction').value;
            var statusDeduction = document.getElementById('status-deduction').value;

            var payload = {
                "com_id": comID,
                "du_code": duCode,
                "deduction": deduction,
                "du_cal_tax": calTaxDeduction,
                "du_out_of_period": outOfPeriodDeduction,
                "du_next_period": nextPeriodDeduction,
                "du_pay": payDeduction,
                "du_security_social_fund": securitySocialFundDeduction,
                "du_provident_fund": providentFundDeduction,
                "du_welfare_benefit": welfareBenefitDeduction,
                "du_status": statusDeduction
            };

            fetch(ENDPOINT + "api/editDeduction", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(payload)
                })
                .then(response => response.json())
                .then(result => console.log(result))
                .catch(error => console.log('error', error));
        }

        function closeOverlayDeduction() {
            const overlayDeduction = document.getElementById('overlayDeduction');
            overlayDeduction.classList.remove('open');
        }

        document.getElementById('closeOverlayDeduction').addEventListener('click', closeOverlayDeduction);

        function showConfirmationDeduction() {
            var modal = document.getElementById('confirmationDeduction');
            modal.style.display = 'block';
        }

        function cancelUpdateDeduction() {
            var cancelButtonDeduction = document.getElementById('cancelButtonDeduction');
            cancelButtonDeduction.classList.add('cancel-button-deduction-animation');

            setTimeout(function() {
                var modal = document.getElementById('confirmationDeduction');
                modal.style.display = 'none';
            }, 500);
        }

        function confirmUpdateDeduction() {
            var modal = document.getElementById('confirmationIncome');
            modal.style.display = 'none';
            sendUpdateDeduction();
            window.location.reload();
        }
    </script>
</body>

</html>