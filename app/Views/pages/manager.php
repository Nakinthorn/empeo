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
        background-image: url('/public/imgs/Background1.png');
        background-repeat: no-repeat;
    }

    .manager-container {
        display: flex;
        justify-content: center;
        padding: 20px;
    }

    .head-text {
        font-size: 18px;
        font-weight: 500;
    }

    .filter-container {
        padding: 20px;
        display: flex;
        justify-content: space-between;
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
        width: 100px;
        height: 30px;
        background: #0063F7;
        border-radius: 16px;
    }

    .list-block {
        align-items: center;
    }

    .detail-block {
        padding: 20px;
        background: #FFFFFF;
        box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1);
        border-radius: 16px;
        margin: 16px;
        width: 80vw;
    }

    .list-block img {
        width: 80px;
        border-radius: 20px;
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
    }

    .status-approved {
        display: flex;
        align-items: center;
        color: #06C270;
        background: #E3FFF1;
        padding: 4px 8px;
        width: 57px;
        border-radius: 27px;
        justify-content: center;
        font-size: 12px;
    }

    .status-inprogress {
        display: flex;
        align-items: center;
        color: #FFCC00;
        background: #FFFEE6;
        padding: 4px 8px;
        width: 57px;
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
        width: 57px;
        border-radius: 27px;
        justify-content: center;
        font-size: 12px;
    }

    .detail-block {
        display: flex;
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
    }

    .view-document img {
        width: 100px;
        border-radius: 50%;
    }

    .view-calendar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 20px;
    }
</style>

<body>
    <div class="manager-container">
        <p class="head-text">Manager</p>
    </div>
    <div class="filter-container">
        <select id="select-filter" class="select-filter">
            <option value="all">ALL</option>
            <option value="approved">Approved</option>
            <option value="inprogress">Inprogress</option>
            <option value="cancel">Cancel</option>
        </select>
        <div class="btn-approve-all" id="approve-all-btn">
            <p>Approve All</p>
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
            "token": localStorage.token
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
                let idsToUpdate = [];

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
                                    <img src="${data[i].img_profile}">
                                    <div style="margin-left: 13px;">
                                        <p class="font-document">${data[i].type}</p>
                                        <p class="f-color-gray">${data[i].reason}</p>
                                        <div class="date-block">
                                            <img src="/public/imgs/calendar.svg" style="width: 13px;">
                                            <p class="f-color-gray">${formattedDate}</p>
                                        </div>
                                        <p class="${approveStatusClass}">${data[i].approve_status}</p>
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
                                    <img src="${data[i].img_profile}">
                                    <div style="margin-left: 13px;">
                                        <p class="font-document">${data[i].type}</p>
                                        <p class="f-color-gray">${data[i].reason}</p>
                                        <div class="date-block">
                                            <img src="/public/imgs/calendar.svg" style="width: 13px;">
                                            <p class="f-color-gray">${formattedDateStart} - ${formattedDateEnd}</p>
                                        </div>
                                        <p class="${approveStatusClass}">${data[i].approve_status}</p>
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

                document.querySelector('#select-filter').addEventListener('change', function () {

                    const selectedValue = this.value;

                    let filteredData = originalData;
                    if (selectedValue !== 'all') {
                        filteredData = originalData.filter(function (item) {
                            return item.approve_status === selectedValue;
                        });
                    }

                    const filteredHTML = generateHTML(filteredData);

                    updateListBlock(filteredHTML);
                });

                const originalHTML = generateHTML(originalData);
                updateListBlock(originalHTML);

                document.querySelector('#approve-all-btn').addEventListener('click', function () {
                    for (let i in originalData) {
                        if (originalData[i].approve_status === 'inprogress') {
                            idsToUpdate.push(originalData[i].id);
                        }
                    }
                    const updateRequestOptions = {
                        method: 'POST',
                        headers: myHeaders,
                        body: JSON.stringify({ ids: idsToUpdate }),
                        redirect: 'follow'
                    };

                    fetch(ENDPOINT + "mobile/approveAll", updateRequestOptions)
                        .then(response => {
                            return response.json()
                        })
                        .then(result => {
                            console.log(result); // Handle the response from the backend
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
                                    <img src="${result.data[i].img_profile}">
                                    <div>
                                        <p>${result.data[i].fname} ${result.data[i].lname}</p>
                                        <p>${result.data[i].job_title}
                                    </div>
                                </div>
                                <div class="view-document">
                                    <p>${result.data[i].type}</p>
                                </div>
                                <div class="view-calendar">
                                    <p>Date</p>
                                    <div style="display:flex;">
                                        <img src="/public/imgs/calendar.svg" style="width: 23px;">
                                        <p>${formattedDate}</p>
                                    </div>
                                </div>
                                <div style="padding:20px;">
                                    <p>About</p>
                                    <p>${result.data[i].reason == null ? "-" : result.data[i].reason}</p>
                                </div>                                                    
                            `;
                        }

                        if (result.data[i].type === 'document' && result.data[i].approve_status === 'inprogress') {
                            detailDoc.innerHTML += `
                                <div class="view-document">
                                    <img src="${result.data[i].img_profile}">
                                    <div>
                                        <p>${result.data[i].fname} ${result.data[i].lname}</p>
                                        <p>${result.data[i].job_title}
                                    </div>
                                </div>
                                <div class="view-document">
                                    <p>${result.data[i].type}</p>
                                </div>
                                <div class="view-calendar">
                                    <p>Date</p>
                                    <div style="display:flex;">
                                        <img src="/public/imgs/calendar.svg" style="width: 23px;">
                                        <p>${formattedDate}</p>
                                    </div>
                                </div>
                                <div style="padding:20px;">
                                    <p>About</p>
                                    <p>${result.data[i].reason == null ? "-" : result.data[i].reason}</p>
                                </div>
                                <button onclick="closeOverlay();">Cancel</button>
                                <button onclick="sendApprove(${result.data[i].id})">Confirm</button>                                                                                                                                        
                            `;
                        }

                        const dateStart = parseInt(result.data[i].time_start);
                        const dateEnd = parseInt(result.data[i].time_end);
                        const formattedDateStart = formatDate(dateStart);
                        const formattedDateEnd = formatDate(dateEnd);

                        if (result.data[i].type === 'leave' && result.data[i].approve_status === 'approved') {
                            detailDoc.innerHTML += `
                                <div class="view-document">
                                    <img src="${result.data[i].img_profile}">
                                    <div>
                                        <p>${result.data[i].fname} ${result.data[i].lname}</p>
                                        <p>${result.data[i].job_title}
                                    </div>
                                </div>
                                <div class="view-document">
                                    <p>${result.data[i].type}</p>
                                </div>
                                <div class="view-calendar">
                                    <p>Date</p>
                                    <div style="display:flex;">
                                        <img src="/public/imgs/calendar.svg" style="width: 23px;">
                                        <p>${formattedDateStart} - ${formattedDateEnd}</p>
                                    </div>
                                </div>
                                <div style="padding:20px;">
                                    <p>About</p>
                                    <p>${result.data[i].reason == null ? "-" : result.data[i].reason}</p>
                                </div>                                                   
                            `;
                        }

                        if (result.data[i].type === 'leave' && result.data[i].approve_status === 'inprogress') {
                            detailDoc.innerHTML += `
                                <div class="view-document">
                                    <img src="${result.data[i].img_profile}">
                                    <div>
                                        <p>${result.data[i].fname} ${result.data[i].lname}</p>
                                        <p>${result.data[i].job_title}
                                    </div>
                                </div>
                                <div class="view-document">
                                    <p>${result.data[i].type}</p>
                                </div>
                                <div class="view-calendar">
                                    <p>Date</p>
                                    <div style="display:flex;">
                                        <img src="/public/imgs/calendar.svg" style="width: 23px;">
                                        <p>${formattedDateStart} - ${formattedDateEnd}</p>
                                    </div>
                                </div>
                                <div style="padding:20px;">
                                    <p>About</p>
                                    <p>${result.data[i].reason == null ? "-" : result.data[i].reason}</p>
                                </div>
                                <button onclick="closeOverlay();">Cancel</button>
                                <button onclick="sendApprove(${result.data[i].id})">Confirm</button>                                                    
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

        function sendApprove(id) {
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

            fetch(ENDPOINT + "mobile/sendApprove", requestOptions)
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
                    console.log('error', error)
                });
        }
    </script>
</body>

</html>