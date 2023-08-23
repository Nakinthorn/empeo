<!DOCTYPE html>
<html>

<head>
    <title>Master Data</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300;400;500&family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100&display=swap" rel="stylesheet">
</head>
<style>
    * {
        margin: 0;
        padding: 0;
    }

    .master-container {
        padding: 15px;
        margin-left: 27vw;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-template-rows: repeat(auto-fill, minmax(100px, 1fr));
        grid-gap: 10px;
        width: 71%;
        height: 40%;
        grid-auto-flow: dense;
    }

    .master-box {
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
        border-radius: 10px;
        padding: 20px;
        display: flex;
        cursor: pointer;
    }

    .master-box:hover {
        border: 1px solid #45c9aa;
    }

    .font-bold {
        font-size: 16px;
        font-weight: 500;
    }

    .font-grey {
        font-size: 13px;
        font-weight: 400;
        color: grey;
    }
</style>

<body>
    <?php include 'sidebar.php'; ?>
    <?php include 'navbar.php'; ?>
    <?php include 'setup-menu.php'; ?>


    <!-- Page content goes here -->
    <div class="master-container">
        <div class="master-box" onclick="location.href='master-home'">
            <img src="<?php echo base_url('imgs/calendar-backoffice.png'); ?>" width="30px" height="30px">
            <div style="margin-left: 10px;">
                <p class="font-bold">มาสเตอร์ทั่วไป</p>
                <p class="font-grey">ตั้งค่าทั่วไป</p>
            </div>
        </div>
        <div class="master-box" onclick="location.href='social-security-rate'">
            <img src="<?php echo base_url('imgs/calendar-backoffice.png'); ?>" width="30px" height="30px">
            <div style="margin-left: 10px;">
                <p class="font-bold">อัตราสมทบประกันสังคม</p>
                <p class="font-grey">กำหนดอัตราเงินสมทบกองทุนประกันสังคม</p>
            </div>
        </div>
        <div class="master-box" onclick="location.href='accumulate'">
            <img src="<?php echo base_url('imgs/calendar-backoffice.png'); ?>" width="30px" height="30px">
            <div style="margin-left: 10px;">
                <p class="font-bold">เงินสะสมประจำปี</p>
                <p class="font-grey">กำหนดหรือแก้ไขรายการเงินสะสมประจำปี ที่มีผลกับสลิปเงินเดือน</p>
            </div>
        </div>
        <!-- <div class="master-box">
                            <img src="<?php echo base_url('imgs/calendar-backoffice.png'); ?>" width="30px" height="30px">
                            <div style="margin-left: 10px;">
                                <p class="font-bold">ตั้งค่าเนื้อหาการแจ้งเตือน</p>
                                <p class="font-grey">กำหนดเนื้อหาการแจ้งเตือนทางอีเมลหรือโมบายแอป</p>
                            </div>
                        </div> -->
        <!-- <div class="master-box">
                            <img src="<?php echo base_url('imgs/calendar-backoffice.png'); ?>" width="30px" height="30px">
                            <div style="margin-left: 10px;">
                                <p class="font-bold">ฟิลด์ข้อมูลพนักงาน</p>
                                <p class="font-grey">เพิ่มฟิลด์สำหรับกรอกข้อมูลภายในโปรไฟล์ พนักงานได้ตามต้องการ</p>
                            </div>
                        </div> -->
        <!-- <div class="master-box">
                            <img src="<?php echo base_url('imgs/calendar-backoffice.png'); ?>" width="30px" height="30px">
                            <div style="margin-left: 10px;">
                                <p class="font-bold">ตั้งค่าการแจ้งเตือนทางอีเมล</p>
                                <p class="font-grey">ตั้งค่าเปิดปิดการแจ้งเตือนทางอีเมล</p>
                            </div>
                        </div> -->
        <div class="master-box" onclick="location.href='expense'">
            <img src="<?php echo base_url('imgs/calendar-backoffice.png'); ?>" width="30px" height="30px">
            <div style="margin-left: 10px;">
                <p class="font-bold">ค่าใช้จ่าย</p>
                <p class="font-grey">กำหนดประเภทของค่าใช้จ่ายและวงเงินในการเบิกของแต่ละสังกัด</p>
            </div>
        </div>
    </div>

    <!-- Other scripts or footer goes here -->
</body>

</html>