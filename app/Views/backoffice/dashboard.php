<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.js'></script>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300;400;500&family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100&display=swap" rel="stylesheet">
</head>
<style>
    * {
        margin: 0;
        padding: 0;
    }

    .dashboard-container {
        margin-left: 6vw;
        width: 900px;
        box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
        border-radius: 13px;
    }

    .rights-container {
        width: 320px;
    }

    .detail-admin {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px;
    }

    #admin-image {
        border-radius: 50%;
    }

    .box {
        border: solid 1px grey;
        border-radius: 13px;
        width: 80px;
        height: 80px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .rights {
        padding: 10px;
        box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
        border-radius: 13px;
        height: 150px;
        line-height: 28px;
    }

    .leave-box {
        display: flex;
        justify-content: space-between;
    }

    .leave-box p {
        font-size: 13px;
    }

    #calendar-container {
        padding: 10px;
    }

    .block-name {
        margin-left: 20px;
    }

    .p14-grey {
        font-size: 14px;
        color: grey;
    }

    .main-body {
        display: flex;
        gap: 30px;
        padding: 10px;
    }

    .contact {
        display: flex;
        gap: 5px;
        align-items: center;
    }
</style>

<body style="overflow: hidden;">
    <?php include 'sidebar.php'; ?>
    <?php include 'navbar.php'; ?>

    <!-- Page content goes here -->
    <div class="main-body">
        <div class="dashboard-container">
            <div class="detail-admin">
                <div style="display: flex; align-items: center;">
                    <div>
                        <img id="admin-image" src="<?= base_url('imgs/avatar.jpg') ?>" width="100">
                        <p id="admin-id">-</p>
                    </div>
                    <div class="block-name">
                        <p id="admin-name">-</p>
                        <p id="admin-position" class="p14-grey">-</p>
                        <div style="display: flex; gap: 10px;">
                            <div class="contact">
                                <img id="admin-image" src="<?= base_url('imgs/icons-phone.svg') ?>" width="20">
                                <p class="p14-grey" id="admin-tel">-</p>
                            </div>
                            <div class="contact">
                                <img id="admin-image" src="<?= base_url('imgs/icons-email.png') ?>" width="20">
                                <p class="p14-grey" id="admin-email">-</p>
                            </div>


                        </div>
                    </div>
                </div>

                <div style="display: flex; align-items: center; gap: 20px;">
                    <div class="box">
                        <div style="text-align: center;">
                            <p>0</p>
                            <p>ขาดงาน</p>
                        </div>
                    </div>
                    <div class="box">
                        <div style="text-align: center;">
                            <p>0</p>
                            <p>กลับก่อน</p>
                        </div>
                    </div>
                    <div class="box">
                        <div style="text-align: center;">
                            <p>0</p>
                            <p>สาย</p>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div id='calendar-container'>
                    <div id='calendar'></div>
                </div>

            </div>
        </div>
        <br>
        <div class="rights-container">
            <div class="rights">
                <p style="font-size: 18px;">ข้อมูลการทำงาน</p>
                <p style="font-size: 12px;">พนักงานที่หยุดงานในวันนี้</p>
                <div style="text-align: center;">
                    <p style="font-size: 12px; color: grey;">วันนี้ไม่มีพนักงานลาหยุด</p>
                    <hr>
                </div>
                <p style="font-size: 12px;">พนักงานที่ปฏิบัติงานนอกสถานที่ในวันนี้</p>
                <div style="text-align: center;">
                    <p style="font-size: 12px; color: grey;">วันนี้ไม่มีพนักงานที่ปฏิบัติงานนอกสถานที่</p>
                </div>
            </div>
            <br>
            <div class="rights">
                <p style="font-size: 18px;">สิทธิ์การลาคงเหลือ</p>
                <div class="leave-box">
                    <p>ลาหยุดพักร้อนประจำปี</p>
                    <p>6 วัน</p>
                </div>
                <div class="leave-box">
                    <p>ลากิจ</p>
                    <p>6 วัน</p>
                </div>
                <div class="leave-box">
                    <p>ลาคลอด</p>
                    <p>6 วัน</p>
                </div>
                <div class="leave-box">
                    <p>ลาคลอดไม่รับค่าจ้าง</p>
                    <p>6 วัน</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Other scripts goes here -->
    <script>
        function checkToken() {
            const token = localStorage.getItem('token');
            if (!token) {
                window.location.href = 'http://localhost:8080/backoffice/404';
            }
        }
        checkToken();

        var myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/json");

        const token = localStorage.getItem('token');

        var raw = JSON.stringify({
            "token": token
        });

        var requestOptions = {
            method: 'POST',
            headers: myHeaders,
            body: raw,
            redirect: 'follow'
        };
        //
        fetch("http://localhost:3333/api/getDataAdmin", requestOptions)
            .then(response => {
                return response.json()
            })
            .then(result => {
                const data = result.data[0]
                console.log(data);

                const adminId = document.getElementById("admin-id");
                adminId.innerHTML = `<p style="font-size: 20px; text-align: center;">#${data.employee_id}</p>`;

                const adminName = document.getElementById("admin-name");
                adminName.innerHTML = `<p style="font-size: 24px;">${data.fname} ${data.lname}</p>`;

                const adminImage = document.getElementById("admin-image");
                adminImage.innerHTML = `<img src="${data.img_profile}" alt="Admin Image">`;

                const adminPosition = document.getElementById("admin-position");
                adminPosition.innerHTML = `<p style="font-size: 14px; color: grey;">${data.job_title}</p>`;

                const adminTel = document.getElementById("admin-tel");
                adminTel.innerHTML = `<p style="color: grey;">${data.contact_info}</p>`;

                const adminEmail = document.getElementById("admin-email");
                adminEmail.innerHTML = `<p style="color: grey;">${data.email}</p>`;

            })
            .catch(error => {
                console.log('error', error)
            });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                timeZone: 'UTC',
                height: '500px'
                // events: 'https://fullcalendar.io/demo-events.json' // import event
            });
            calendar.render();
        });
    </script>
</body>

</html>