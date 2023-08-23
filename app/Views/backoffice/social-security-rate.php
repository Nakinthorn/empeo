<!DOCTYPE html>
<html>

<head>
    <title>อัตราสมทบประกันสังคม</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300;400;500&family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100&display=swap" rel="stylesheet">

</head>
<style>
    * {
        margin: 0;
        padding: 0;
    }

    .social-container {
        padding: 15px;
        margin-left: 5vw;
    }

    .ssr-field {
        display: flex;
        gap: 20px;
        padding: 10px;
    }

    .ssr-field input {
        width: 25vw;
        padding: 8px;
        border-radius: 10px;
        border: 1px solid grey;
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
</style>

<body>
    <?php include 'sidebar.php'; ?>
    <?php include 'navbar.php'; ?>

    <!-- Page content goes here -->
    <div class="social-container">
        <h2>อัตราสมทบประกันสังคม</h2>
        <hr>
        <div style="width: 625px;">
            <div class="ssr-field">
                <div>
                    <p>ฐานเงินเดือนต่ำสุด *</p>
                    <input type="number" value="1650" id="lowest-base-salary">
                </div>
                <div>
                    <p>ฐานเงินเดือนสูงสุด *</p>
                    <input type="number" value="15000" id="highest-base-salary">
                </div>
            </div>
            <div class="ssr-field">
                <div>
                    <p>สมทบต่ำสุด *</p>
                    <input type="number" value="83" id="lowest-subvention">
                </div>
                <div>
                    <p>สมทบสูงสุด *</p>
                    <input type="number" value="750" id="highest-subvention">
                </div>
            </div>
            <div class="ssr-field">
                <div>
                    <p>อัตราสมทบผู้ประกันตน (%) *</p>
                    <input type="number" value="5" id="ipc-rate">
                </div>
                <div>
                    <p>อัตราสมทบนายจ้าง (%) *</p>
                    <input type="number" value="5" id="ccr-rate">
                </div>

            </div>
            <br>
            <div style="text-align: end;">
                <button onclick="updateSSR();" class="btn-add-category">บันทึก</button>
            </div>
        </div>
    </div>

    <!-- Other scripts or footer goes here -->
    <script>
        function updateSSR() {
            const lowestBaseSalary = document.getElementById('lowest-base-salary').value;
            const highestBaseSalary = document.getElementById('highest-base-salary').value;
            const lowestSubvention = document.getElementById('lowest-subvention').value;
            const highestSubvention = document.getElementById('highest-subvention').value;
            const ipcRate = document.getElementById('ipc-rate').value;
            const ccrRate = document.getElementById('ccr-rate').value;

            // console.log(ccrRate);
            var myHeaders = new Headers();
            myHeaders.append("Content-Type", "application/json");

            var raw = JSON.stringify({
                "token": localStorage.token,
                "lowestBaseSalary": lowestBaseSalary,
                "highestBaseSalary": highestBaseSalary,
                "lowestSubvention": lowestSubvention,
                "highestSubvention": highestSubvention,
                "ipcRate": ipcRate,
                "ccrRate": ccrRate
            });

            var requestOptions = {
                method: 'POST',
                headers: myHeaders,
                body: raw,
                redirect: 'follow'
            };

            fetch("http://localhost:3333/api/updateSocialSecurityRate", requestOptions)
                .then(response => {
                    return response.json()
                })
                .then(result => {
                    console.log(result)
                    if (result.code === 200) {
                        alert('SSR OK!')
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