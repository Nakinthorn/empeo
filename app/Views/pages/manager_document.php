<?php
$session = session();
$token = $session->get('token');
// echo $token;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager</title>
    <?php echo "<script src='".base_url('./backoffice_static/config.js')."'></script>"; ?>
</head>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600&display=swap");

    * {
        margin: 0;
        padding: 0;
    }

    body {
        font-family: "Manrope", sans-serif;
        background-repeat: no-repeat;
    }

    .manager-container {
        display: flex;
        justify-content: center;
        padding: 20px;
    }

    .head-text {
        color: var(--dark-dark-1, #28293D);
        font-size: 16px;
        font-style: normal;
        font-weight: 500;
        line-height: 24px;
    }

    .filter-container {
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .select-filter {
        width: 150px;
        padding: 12px 16px 12px 16px;
        border-radius: 8px;
        background: #F6F7F9;
        border: none;
    }

    .btn-approve-all {
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        padding: 16px;
        gap: 8px;
        width: 120px;
        height: 48px;
        background: #0063F7;
        border-radius: 16px;
    }

    .detail-block {
        padding: 10px;
        background: #FFFFFF;
        box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1);
        border-radius: 16px;
        margin: 16px;
        width: 90vw;
        cursor: pointer;
    }

    .list-block img {
        width: 50px;
        border-radius: 20px;
        height: 50px;
    }

    .font-document {
        font-size: 14px;
        font-weight: 700;
    }

    .f-color-gray {
        font-size: 12px;
        color: #838799;
    }

    .date-block {
        display: flex;
        align-items: center;
        margin-top: -15px;
    }

    .status-approved {
        display: flex;
        align-items: center;
        color: #06C270;
        width: 77px;
        border-radius: 27px;
        background: var(--green-green-4, #E3FFF1);
        padding: 4px 8px;
        width: 77px;
        justify-content: center;
        font-size: 12px;
    }

    .status-inprogress {
        display: flex;
        align-items: center;
        color: #FFCC00;
        background: #FFFEE6;
        padding: 4px 8px;
        width: 77px;
        border-radius: 27px;
        justify-content: center;
        font-size: 12px;
    }

    .status-cancel {
        display: flex;
        align-items: center;
        color: #FF3B3B;
        background: #FFE5E5;
        padding: 4px 8px;
        width: 77px;
        border-radius: 27px;
        justify-content: center;
        font-size: 12px;
    }

    .detail-block {
        display: flex;
    }

    .date-block img {
        width: 13px;
    }

    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: none;
        align-items: center;
        justify-content: center;
    }

    .overlay-content {
        background-color: #fff;
        width: 100%;
        height: 100%;
    }

    .view-document {
        display: flex;
        align-items: center;
        padding: 20px;
        gap: 20px;
    }

    .view-document img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
    }

    .view-calendar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 20px;
    }

    .btn-confirm {
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        padding: 16px;
        gap: 8px;
        width: 120px;
        height: 48px;
        background: #0063F7;
        border-radius: 16px;
    }

    .btn-cancel {
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        padding: 16px;
        gap: 8px;
        width: 120px;
        height: 48px;
        border-radius: 16px;
        border: 1px solid #C7C9D9;
        background: #FFF;
    }

    .font-cancel {
        color: #28293D;
        text-align: center;
        font-family: Noto Sans;
        font-size: 14px;
        font-style: normal;
        font-weight: 700;
        line-height: 24px;
        letter-spacing: 0.07px;
    }

    .font-confirm {
        color: var(--primary-colors-white, #FFF);
        text-align: center;
        font-size: 14px;
        font-style: normal;
        font-weight: 700;
        line-height: 24px;
        letter-spacing: 0.07px;
    }

    .btn-con-can {
        display: flex;
        justify-content: center;
        gap: 20px;
        padding: 25px;
    }

    .box-calendar {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .full-name {
        color: #838799;
        font-size: 16px;
        font-style: normal;
        font-weight: 500;
        line-height: 24px;
    }
    .sub-position {
        color: #C2C2C2;
        font-size: 12px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }

    .reason {
        color: var(--dark-dark-4, #C7C9D9);
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: 24px;
        letter-spacing: 0.035px;
    }

    .app-status {
        padding-left: 47vw;
    }

    .title-leave {
        color: var(--dark-dark-3, #8F90A6);
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        line-height: 16px;
        letter-spacing: 0.14px;
    }
    .file-board {
        padding: 20px;
        display: grid;
        grid-template-rows: 100px 100px 100px;
        grid-template-columns: 100px 100px 100px;
    }
    .btn-approve {
        display: flex;
        justify-content: center;
        gap: 10vw;
    }
</style>

<body style="background-image: url(<?= base_url('imgs/Background1.png') ?>);">
    <div class="filter-container">
        <select id="select-filter" class="select-filter">
            <option style="color: red;" value="all">ALL</option>
            <option value="approved">Approved</option>
            <option value="inprogress">Inprogress</option>
            <option value="cancel">Cancel</option>
        </select>
        <div class="btn-approve-all" id="approve-all-btn">
            <p class="font-confirm">Approve All</p>
        </div>
    </div>

    <div class="list-block">

    </div>

    <div id="overlay" class="overlay">
        <div class="overlay-content">
            <div class="manager-container">
                <button onclick="closeOverlay();">BACK</button>
                <p class="head-text">Manager</p>
            </div>
            <div class="detail-document">

            </div>
        </div>
    </div>

    <script>
        let ENDPOINT = window.API_URL;

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

        fetch(ENDPOINT + "mobile/list_approve", requestOptions)
            .then(response => {
                return response.json()
            })
            .then(result => {
                const listBlock = document.querySelector('.list-block');
                let html = '';
                let originalData = result.data;
                function generateHTML(data) {
                    let html = '';
                    for (let i in data) {
                        const date = parseInt(data[i].date);
                        const formattedDate = formatDate(date);

                        let approveStatusClass = '';
                        switch (data[i].approve_status) {
                            case 'approved':
                                approveStatusClass = 'status-approved';
                                break;
                            case 'cancel':
                                approveStatusClass = 'status-cancel';
                                break;
                            default:
                                approveStatusClass = 'status-inprogress';
                                break;
                        }

                        if (data[i].type === 'document') {
                            html += `
                                <div class="detail-block" onclick="openForApprove(${data[i].id})">
                                    <img src="${data[i].img_profile ? data[i].img_profile : "<?= base_url('imgs/avatar.jpg') ?>"}">
                                    <div style="margin-left: 13px;">
                                        <p class="font-document">${data[i].type}</p>
                                        <p class="f-color-gray">${data[i].reason}</p>
                                        <div class="date-block">
                                            <img src="<?= base_url('imgs/calendar.svg') ?>">
                                            <p class="f-color-gray">${formattedDate}</p>
                                        </div>
                                        <div class="app-status">
                                            <p class="${approveStatusClass}">${data[i].approve_status}</p>
                                        </div>
                                    </div>          
                                </div>
                            `;
                        }

                        const dateStart = parseInt(data[i].date_start);
                        const dateEnd = parseInt(data[i].date_end);
                        const formattedDateStart = formatDate(dateStart);
                        const formattedDateEnd = formatDate(dateEnd);

                        if (data[i].type === 'leave') {
                            html += `
                                <div class="detail-block" onclick="openForApprove(${data[i].id})">
                                <img src="${data[i].img_profile ? data[i].img_profile : "<?= base_url('imgs/avatar.jpg') ?>"}">
                                    <div style="margin-left: 13px;">
                                        <p class="font-document">${data[i].type}</p>
                                        <p class="f-color-gray">${data[i].reason}</p>
                                        <div class="date-block">
                                            <img src="<?= base_url('imgs/calendar.svg') ?>">
                                            <p class="f-color-gray">${formattedDateStart} - ${formattedDateEnd}</p>
                                        </div>
                                        <div class="app-status">
                                            <p class="${approveStatusClass}">${data[i].approve_status}</p>
                                        </div>                                   
                                    </div>
                                </div>
                            `;
                        }

                        if (data[i].type === 'overtime') {                            
                            html += `
                                <div class="detail-block" onclick="openForApprove(${data[i].id})">
                                <img src="${data[i].img_profile ? data[i].img_profile : "<?= base_url('imgs/avatar.jpg') ?>"}">
                                    <div style="margin-left: 13px;">
                                        <p class="font-document">${data[i].type}</p>
                                        <p class="f-color-gray">${data[i].reason}</p>
                                        <div class="date-block">
                                            <img src="<?= base_url('imgs/calendar.svg') ?>">
                                            <p class="f-color-gray">${formattedDateStart} - ${formattedDateEnd}</p>
                                        </div>
                                        <div class="app-status">
                                            <p class="${approveStatusClass}">${data[i].approve_status}</p>
                                        </div>                                   
                                    </div>
                                </div>
                            `;
                        }
                    }
                    return html;
                }

                function updateListBlock(html) {
                    listBlock.innerHTML = html;
                }

                document.querySelector('#select-filter').addEventListener('change', function() {

                    const selectedValue = this.value;

                    let filteredData = originalData;
                    if (selectedValue !== 'all') {
                        filteredData = originalData.filter(function(item) {
                            return item.approve_status === selectedValue;
                        });
                    }

                    const filteredHTML = generateHTML(filteredData);

                    updateListBlock(filteredHTML);
                });

                const originalHTML = generateHTML(originalData);
                updateListBlock(originalHTML);

                document.querySelector('#approve-all-btn').addEventListener('click', function() {
                    let idsToUpdate = [];
                    for (let i in originalData) {
                        if (originalData[i].approve_status === 'inprogress') {
                            idsToUpdate.push({
                                type: "confirm",
                                id: originalData[i].id,
                                request_name: originalData[i].type_request_name,
                                document_type: originalData[i].document_type,
                                delivery_method:originalData[i].delivery_method,
                                date: originalData[i].date,
                                country: originalData[i].country,
                                employee_eid: originalData[i].employee_eid,
                                dateStart: originalData[i].date_start,
                                dateEnd: originalData[i].date_end,
                                leave_type: originalData[i].leave_type,
                                l_id: originalData[i].l_id,
                                country: originalData[i].where_country
                            });
                        }
                    }
                    console.log(idsToUpdate);
                    const updateRequestOptions = {
                        method: 'POST',
                        headers: myHeaders,
                        body: JSON.stringify({
                            token: '<?php echo $token; ?>',
                            ids: idsToUpdate
                        }),
                        redirect: 'follow'
                    };

                    fetch(ENDPOINT + "mobile/approveAll", updateRequestOptions)
                        .then(response => {
                            return response.json()
                        })
                        .then(result => {
                            if (result.code === 200) {
                                alert('Approve all success')
                                location.reload();
                            }
                        })
                        .catch(error => {
                            console.log('error', error);
                        });
                });
            })
            .catch(error => {
                console.log('error', error);
            });

        function formatDate(date) {
            const dateObj = new Date(date);
            const month = dateObj.getMonth() + 1;
            const day = dateObj.getDate();
            const year = dateObj.getFullYear();
            const formattedDate = `${month}/${day}/${year}`;
            return formattedDate;
        }

        function openForApprove(id) {
            
            const overlay = document.getElementById('overlay');
            overlay.style.display = 'flex';

            var myHeaders = new Headers();
            myHeaders.append("Content-Type", "application/json");

            var raw = JSON.stringify({
                "id": id
            });

            var requestOptions = {
                method: 'POST',
                headers: myHeaders,
                body: raw,
                redirect: 'follow'
            };

            fetch(ENDPOINT + "mobile/getApproveById", requestOptions)
                .then(response => {
                    return response.json()
                })
                .then(result => {
                    for (let i in result.data) {
                        console.log(result.data[i]);
                        const detailDoc = document.querySelector('.detail-document');
                        const date = parseInt(result.data[i].date_mill);
                        const formattedDate = formatDate(date);

                        if (result.data[i].type === 'document' && result.data[i].approve_status === 'approved') {
                            detailDoc.innerHTML += `
                                <div class="view-document">
                                    <img src="${result.data[i].img_profile ? result.data[i].img_profile : "<?= base_url('imgs/avatar.jpg') ?>"}">
                                    <div>
                                        <p class="full-name">${result.data[i].fname} ${result.data[i].lname}</p>
                                        <p class="sub-position">${result.data[i].job_title}
                                    </div>
                                </div>
                                <div class="view-document">
                                    <p class="title-leave">${result.data[i].type}</p>
                                </div>
                                <div class="view-calendar">
                                    <p>Date</p>
                                    <div class="box-calendar">
                                        <img src="<?= base_url('imgs/calendar.svg') ?>">
                                        <p class="f-color-gray">${formattedDate}</p>
                                    </div>
                                </div>
                                <div style="padding:20px;">
                                    <p>About</p>
                                    <p class="reason">${result.data[i].reason == null ? "-" : result.data[i].reason}</p>
                                </div>
                                <div style="padding:20px;">
                                    <img src="${result.data.files_path}" onerror="this.style.display='none'">
                                </div>                                                    
                            `;
                        }

                        if (result.data[i].type === 'document' && result.data[i].approve_status === 'inprogress') {
                            detailDoc.innerHTML += `
                                <div class="view-document">
                                    <img src="${result.data[i].img_profile ? result.data[i].img_profile : "<?= base_url('imgs/avatar.jpg') ?>"}">
                                    <div>
                                        <p class="full-name">${result.data[i].fname} ${result.data[i].lname}</p>
                                        <p class="sub-position">${result.data[i].job_title}
                                    </div>
                                </div>

                                <div class="view-document">
                                    <p class="title-leave">${result.data[i].type}</p>
                                </div>

                                <div class="view-calendar">
                                    <p class="title-leave">Date</p>
                                    <div class="box-calendar">
                                        <img src="<?= base_url('imgs/calendar.svg') ?>">
                                        <p class="f-color-gray">${formattedDate}</p>
                                    </div>
                                </div>

                                <div style="padding:20px;">
                                    <p class="title-leave">About</p>
                                    <p class="reason">${result.data[i].reason}</p>
                                </div>

                                <div style="padding:20px;">
                                    <img src="${ENDPOINT} + '${result.data[i].files_path}'" onerror="this.style.display='none'">
                                </div>

                                <div class="btn-approve">
                                    <button class="btn-cancel" onclick="closeOverlay();">
                                        <p class="font-cancel">Cancel</p>
                                    </button>
                                    <button class="btn-confirm" onclick="sendApprove(
                                        ${result.data[i].id},
                                        '${result.data[i].type_request_name}',
                                        '${result.data[i].document_type}',
                                        '${result.data[i].delivery_method}',
                                        ${result.data[i].date},
                                        '${result.data[i].where_country}',
                                        ${result.data[i].eid},
                                        ${result.data[i].date_start},
                                        ${result.data[i].date_end}
                                        )">
                                        <p class="font-confirm">Confirm</p>
                                    </button>
                                </div>
                                                                                                                                                                       
                            `;
                        }

                        const dateStart = parseInt(result.data[i].time_start);
                        const dateEnd = parseInt(result.data[i].time_end);
                        const formattedDateStart = formatDate(dateStart);
                        const formattedDateEnd = formatDate(dateEnd);

                        if (result.data[i].type === 'leave' && result.data[i].approve_status === 'approved') {
                            detailDoc.innerHTML += `
                                <div class="view-document">
                                <img src="${result.data[i].img_profile ? result.data[i].img_profile : "<?= base_url('imgs/avatar.jpg') ?>"}">

                                    <div>
                                        <p class="full-name">${result.data[i].fname} ${result.data[i].lname}</p>
                                        <p class="sub-position">${result.data[i].job_title}
                                    </div>
                                </div>
                                <div class="view-document">
                                    <p class="title-leave">${result.data[i].type}</p>
                                </div>
                                <div class="view-calendar">
                                    <p class="title-leave">Date</p>
                                    <div class="box-calendar">
                                        <img src="<?= base_url('imgs/calendar.svg') ?>" style="width: 23px;">
                                        <p class="f-color-gray">${formattedDateStart} - ${formattedDateEnd}</p>
                                    </div>
                                </div>
                                <div style="padding:20px;">
                                    <p class="title-leave">About</p>
                                    <p class="reason">${result.data[i].reason == null ? "-" : result.data[i].reason}</p>
                                </div>
                                <div style="padding:20px;">
                                    <img src="${result.data.files_path}" onerror="this.style.display='none'">
                                </div>                                                   
                            `;
                        }

                        if (result.data[i].type === 'leave' && result.data[i].approve_status === 'inprogress') {
                            detailDoc.innerHTML += `
                                <div class="view-document">
                                <img src="${result.data[i].img_profile ? result.data[i].img_profile : "<?= base_url('imgs/avatar.jpg') ?>"}">

                                    <div>
                                        <p class="full-name">${result.data[i].fname} ${result.data[i].lname}</p>
                                        <p class="sub-position">${result.data[i].job_title}
                                    </div>
                                </div>
                                <div class="view-document">
                                    <p class="title-leave">${result.data[i].type}</p>
                                </div>
                                <div class="view-calendar">
                                    <p class="title-leave">Date</p>
                                    <div class="box-calendar">
                                        <img src="<?= base_url('imgs/calendar.svg') ?>" style="width: 23px;">
                                        <p class="f-color-gray">${formattedDateStart} - ${formattedDateEnd}</p>
                                    </div>
                                </div>
                                <div style="padding:20px;">
                                    <p class="title-leave">About</p>
                                    <p class="reason">${result.data[i].reason == null ? "-" : result.data[i].reason}</p>
                                </div>
                                <div class="file-board">
                                <img src="${result.data.files_path}" onerror="this.style.display='none'">
                                </div>
                                <div class="btn-con-can">
                                    <button class="btn-cancel" onclick="closeOverlay();">
                                        <p class="font-cancel">Cancel</p>
                                    </button>                                    
                                    <button class="btn-confirm" onclick="sendApprove(
                                        ${result.data[i].id},
                                        '${result.data[i].type_request_name}',
                                        '${result.data[i].document_type}',
                                        '${result.data[i].delivery_method}',
                                        ${result.data[i].date},
                                        '${result.data[i].where_country}',
                                        ${result.data[i].eid},
                                        ${result.data[i].date_start},
                                        ${result.data[i].date_end}
                                        
                                        )">
                                        <p class="font-confirm">Confirm</p>
                                    </button>                                                    
                                </div>
                            `;
                        }

                        if (result.data[i].type === 'overtime' && result.data[i].approve_status === 'approved') {
                            detailDoc.innerHTML += `
                                <div class="view-document">
                                    <img src="${result.data[i].img_profile ? result.data[i].img_profile : "<?= base_url('imgs/avatar.jpg') ?>"}">
                                    <div>
                                        <p class="full-name">${result.data[i].fname} ${result.data[i].lname}</p>
                                        <p class="sub-position">${result.data[i].job_title}
                                    </div>
                                </div>
                                <div class="view-document">
                                    <p class="title-leave">${result.data[i].type}</p>
                                </div>
                                <div class="view-calendar">
                                    <p>Date</p>
                                    <div class="box-calendar">
                                        <img src="<?= base_url('imgs/calendar.svg') ?>">
                                        <p class="f-color-gray">${formattedDate}</p>
                                    </div>
                                </div>
                                <div style="padding:20px;">
                                    <p>About</p>
                                    <p class="reason">${result.data[i].reason == null ? "-" : result.data[i].reason}</p>
                                </div>
                                <div style="padding:20px;">
                                    <img src="${result.data.files_path}" onerror="this.style.display='none'">
                                </div>                                                    
                            `;
                        }

                        if (result.data[i].type === 'overtime' && result.data[i].approve_status === 'inprogress') {
                            detailDoc.innerHTML += `
                                <div class="view-document">
                                    <img src="${result.data[i].img_profile ? result.data[i].img_profile : "<?= base_url('imgs/avatar.jpg') ?>"}">
                                    <div>
                                        <p class="full-name">${result.data[i].fname} ${result.data[i].lname}</p>
                                        <p class="sub-position">${result.data[i].job_title}
                                    </div>
                                </div>

                                <div class="view-document">
                                    <p class="title-leave">${result.data[i].type}</p>
                                </div>

                                <div class="view-calendar">
                                    <p class="title-leave">Date</p>
                                    <div class="box-calendar">
                                        <img src="<?= base_url('imgs/calendar.svg') ?>">
                                        <p class="f-color-gray">${formattedDate}</p>
                                    </div>
                                </div>

                                <div style="padding:20px;">
                                    <p class="title-leave">About</p>
                                    <p class="reason">${result.data[i].reason}</p>
                                </div>

                                <div style="padding:20px;">
                                    <img src="${ENDPOINT} + '${result.data[i].files_path}'" onerror="this.style.display='none'">
                                </div>

                                <div class="btn-approve">
                                    <button class="btn-cancel" onclick="closeOverlay();">
                                        <p class="font-cancel">Cancel</p>
                                    </button>
                                    <button class="btn-confirm" onclick="sendApprove(
                                        ${result.data[i].id},
                                        '${result.data[i].type_request_name}',
                                        '${result.data[i].document_type}',
                                        '${result.data[i].delivery_method}',
                                        ${result.data[i].date_mill},
                                        '${result.data[i].where_country}',
                                        ${result.data[i].eid},
                                        ${result.data[i].date_start},
                                        ${result.data[i].date_end}
                                        )">
                                        <p class="font-confirm">Confirm</p>
                                    </button>
                                </div>
                                                                                                                                                                       
                            `;
                        }
                    }
                })
                .catch(error => {
                    console.log('error', error)
                });
        }

        function closeOverlay() {
            const overlay = document.getElementById('overlay');
            overlay.style.display = 'none';

            const detailDoc = document.querySelector('.detail-document');
            detailDoc.innerHTML = '';
        }

        function sendApprove(id, request_name, document_type, delivery_method, date, where_country, employee_eid, dateStart, dateEnd) {

            var myHeaders = new Headers();
            myHeaders.append("Content-Type", "application/json");

            var raw = JSON.stringify({
                "token": '<?php echo $token; ?>',
                "type": "confirm",
                "id_list_approve": id,
                "request_name": request_name,
                "document_type": document_type,
                "delivery_method": delivery_method,
                "date": date,
                "country": where_country,
                "employee_eid": employee_eid,
                "dateStart": dateStart,
                "dateEnd": dateEnd
            });

            var requestOptions = {
                method: 'POST',
                headers: myHeaders,
                body: raw,
                redirect: 'follow'
            };

            fetch(ENDPOINT + "mobile/approve/request", requestOptions)
                .then(response => {
                    return response.json()
                })
                .then(result => {
                    console.log(result)
                    if (result.code === 200) {
                        alert('Approve success')
                        location.reload();
                    }
                })
                .catch(error => {
                    console.log('error', error)
                });
        }
    </script>
</body>

</html>