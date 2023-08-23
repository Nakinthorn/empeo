<!DOCTYPE html>
<html>

<head>
    <title>เงินสะสมประจำปี</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300;400;500&family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100&display=swap" rel="stylesheet">

</head>
<style>
    * {
        margin: 0;
        padding: 0;
    }

    .accumulate-container {
        margin-left: 5vw;
        padding: 15px;
        height: 100%;
        overflow-y: scroll;
    }

    .head-edit-container {
        display: flex;
        gap: 20px;
    }

    table {
        width: 100%;
    }

    .edit-input {
        padding-left: 10px;
        width: 160px;
        height: 30px;
        border: 1px grey solid;
        border-radius: 10px;
    }

    .content-table {
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 0.9em;
        min-width: 400px;
        border-radius: 5px 5px 0 0;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }

    .content-table thead tr {
        background-color: #009879;
        color: #ffffff;
        text-align: left;
        font-weight: bold;
    }

    td,
    th {
        text-align: center;
    }

    .content-table th,
    .content-table td {
        padding: 12px 15px;
    }

    .content-table tbody tr {
        border-bottom: 1px solid #dddddd;
    }

    .content-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }

    .content-table tbody tr:last-of-type {
        border-bottom: 2px solid #009879;
    }

    input[type="radio"] {
        display: none;
    }

    label {
        background-color: #fff;
        border: 1px solid #009879;
        border-radius: 10px;
        cursor: pointer;
        width: 70px;
        height: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    input[type="radio"]:checked+label {
        background-color: #009879;
        color: #fff;
    }

    .status {
        display: flex;
        gap: 10px;
    }

    .btn-box {
        display: flex;
        justify-content: end;
        align-items: center;
        gap: 10px;
    }

    .btn-save {
        width: 70px;
        height: 30px;
        background-color: #009879;
        color: #fff;
        border: none;
        border-radius: 13px;
    }

    .btn-cancel {
        width: 70px;
        height: 30px;
        background-color: #fff;
        color: #009879;
        border: 1px solid #009879;
        border-radius: 13px;
    }
</style>

<body>
    <?php include 'sidebar.php'; ?>
    <?php include 'navbar.php'; ?>

    <!-- Page content goes here -->
    <div class="accumulate-container">
        <h2>เงินสะสมประจำปี</h2>

        <div class="head-edit-container">
            <div>
                <p>ชื่อภาษาไทย</p>
                <input type="text" class="edit-input" id="accumulateThInput">
            </div>
            <div>
                <p>ชื่อภาษาอังกฤษ</p>
                <input type="text" class="edit-input" id="accumulateEnInput">
            </div>
            <div>
                <p>บริษัท *</p>
                <input type="text" class="edit-input" id="company-name" readonly>
            </div>

            <div class="toggle">
                <p>สถานะ</p>
                <div class="status">
                    <input type="radio" id="active" name="toggle-btn" value="true">
                    <label for="active">ใช้งาน</label>

                    <input type="radio" id="inactive" name="toggle-btn" value="false">
                    <label for="inactive">ไม่ใช้งาน</label>
                </div>
            </div>
        </div>
        <div class="btn-box">
            <button class="btn-save" id="updateButton">บันทึก</button>
            <button onclick="cancelAndClear();" class="btn-cancel">ยกเลิก</button>
        </div>
        <br>
        <table class="content-table">
            <thead>
                <tr>
                    <th>ชื่อเงินสะสม ภาษาไทย</th>
                    <th>ชื่อเงินสะสม ภาษาอังกฤษ</th>
                    <th>บริษัท</th>
                    <th>สถานะ</th>
                    <th>การทำงาน</th>
                </tr>
            </thead>
            <tbody id="accumulate-tbody">

            </tbody>
        </table>
    </div>

    <!-- Other scripts or footer goes here -->
    <script>
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

        fetch("http://localhost:3333/api/dataAccumulate", requestOptions)
            .then(response => {
                return response.json()
            })
            .then(result => {
                console.log(result)
                const accumulateBody = document.getElementById("accumulate-tbody");
                for (let i in result.accumulate) {

                    let checkStatus = result.accumulate[i].status;
                    if (checkStatus == true) {
                        checkStatus = `<p>ใช้งาน</p>`;
                    } else {
                        checkStatus = `<p>ไม่ใช้งาน</p>`;
                    }

                    const html = `
                        <tr class="active-row">
                            <td>${result.accumulate[i].accumulate_th}</td>
                            <td>${result.accumulate[i].accumulate_name}</td>
                            <td>${result.accumulate[i].com_name}</td>
                            <td>${checkStatus}</td>
                            <td onclick="getAccumulateByID(${result.accumulate[i].accumulate_id});">
                                <img src="<?php echo base_url('imgs/edit.png'); ?>" width="30px">
                            </td>
                        </tr>
                    `;
                    accumulateBody.innerHTML += html;
                }
            })
            .catch(error => {
                console.log('error', error)
            });

        function getAccumulateByID(id) {
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

            fetch("http://localhost:3333/api/getAccumulateByID", requestOptions)
                .then(response => {
                    return response.json()
                })
                .then(result => {

                    const nameTH = result.data[0].accumulate_th;
                    const thName = document.getElementById('accumulateThInput');
                    thName.value = nameTH;

                    const nameEN = result.data[0].accumulate_name;
                    const enName = document.getElementById('accumulateEnInput');
                    enName.value = nameEN;

                    const comName = result.data[0].com_name;
                    const nameCom = document.getElementById('company-name');
                    nameCom.value = comName;

                    const status = result.data[0].status;
                    if (status) {
                        document.getElementById("active").checked = true;
                    } else {
                        document.getElementById("inactive").checked = true;
                    }

                    document.getElementById("updateButton").addEventListener("click", function() {
                        updateAccumulate(result.data[0].accumulate_id);
                    });

                })
                .catch(error => {
                    console.log('error', error)
                });
        }

        function updateAccumulate(accumulateId) {
            const thName = document.getElementById('accumulateThInput').value;
            const enName = document.getElementById('accumulateEnInput').value;
            const status = document.querySelector('input[name="toggle-btn"]:checked').value;

            var myHeaders = new Headers();
            myHeaders.append("Content-Type", "application/json");

            var raw = JSON.stringify({
                "id": accumulateId,
                "accumulateTH": thName,
                "accumulateEN": enName,
                "status": status,
                "business_id": "BUID"
            });

            var requestOptions = {
                method: 'POST',
                headers: myHeaders,
                body: raw,
                redirect: 'follow'
            };

            fetch("http://localhost:3333/api/updateAccumulateByID", requestOptions)
                .then(response => {
                    return response.json()
                })
                .then(result => {
                    console.log(result)
                    if (result.code === 200) {
                        alert('success')
                        window.location.reload();
                    }
                })
                .catch(error => {
                    console.log('error', error)
                });

        }

        function cancelAndClear() {
            // Clear the input values
            document.getElementById('accumulateThInput').value = '';
            document.getElementById('accumulateEnInput').value = '';
            document.getElementById('company-name').value = '';

            // Clear the radio button selection
            document.getElementById('active').checked = false;
            document.getElementById('inactive').checked = false;
        }
    </script>
</body>

</html>