<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Home</title>
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/circleprogress.css">
    <link rel="stylesheet" href="./css/doc_header_footer.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<script src="https://cdn.tailwindcss.com"></script>
<?php echo "<script src='".base_url('./backoffice_static/config.js')."'></script>"; ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:wght@200;400;500;800&display=swap');

    .circle-profile-home {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        object-fit: contain;
        padding: 3px;
        border: 2px solid #FFFFFF;
        background-color: white;
    }

    .head-text-home {
        font-weight: 800;
        color: #064BF9;
        font-size: 20px;
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
        z-index: 999;
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

    .admin-button {
        display: flex;
        height: 50px;
        border-radius: 10px;
        align-items: center;
        background: linear-gradient(151.45deg, #608DFF 8.41%, #043C9A 73.27%)
    }

    .header {
        width: 100%;
        height: 20vh;
        display: flex;
        padding: 0;
    }

    .head-text {
        color: #064BF9;
    }

    .header-box {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    body {
        background-image: url(http://localhost:8080/imgs/background1.png);
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
    }

    .home-content {
        padding: 0 20px;
        height: 100vh;
        width: 100vw;
    }

    .content_template {
        padding-top: 0;
    }

    .blue-box-1 {
        width: 100%;
        height: 220px;
        margin: 20px 0;
        padding: 16px;
        color: #E6EDFF;
        position: relative;
        background: linear-gradient(297.83deg, #03398A 12.54%, #064BF9 100%);
        border-radius: 32px;
    }

    .blue-box-line {
        border-bottom: 1px solid #608DFF;
        margin-top: 5px;
    }

    .blue-box-content {
        height: 85%;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .blue-box-2 {
        height: 80%;
        width: 95%;
        position: absolute;
        background: linear-gradient(297.83deg, #03398A 12.54%, #064BF9 100%);
        opacity: 0.7;
        border-radius: 32px;
        bottom: -5%;
        z-index: -1;
        left: 2.5%;
    }

    .vector1 {
        height: 100%;
        position: absolute;
        right: 0;
    }

    .vector2 {
        height: 100%;
        position: absolute;
        right: 0%;
    }

    .menu-icon {
        height: 44px;
        width: 44px;
        background: linear-gradient(151.45deg, #608DFF 8.41%, #043C9A 73.27%);
        border-radius: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .menu-icon img {
        width: 24px;
        height: 24px;
        color: white;
    }

    .menu-container {
        width: 100%;
        display: flex;
        justify-content: space-between;
        margin: 16px 0;
    }

    .menu-box {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-right: 5%;
        height: fit-content;
    }

    .blue-p2-box-1 {
        height: 100%;
        width: 50%;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
    }

    .blue-p2-container {
        width: 100%;
        height: 100%;
        display: flex;
    }

    .txt1 {
        color: #C7C9D9;
    }

    #render {
        width: 100%;
        height: 100%;
    }


    /* circle progress */
    @keyframes growProgressBar {

        0%,
        33% {
            --pgPercentage: 0;
        }

        100% {
            --pgPercentage: var(--value);
        }
    }

    div[role="progressbar"] {
        --size: 8rem;
        --fg: #1CB5E0;
        --bg: #def;
        --remain: #C7C9D9;
        --base: #1CB5E0;
        --pgPercentage: var(--value);
        width: var(--size);
        height: var(--size);
        border-radius: 50%;
        display: grid;
        place-items: center;
        background: conic-gradient(var(--base) calc(var(--pgPercentage) * 1%), var(--remain) 0);
        font-size: calc(var(--size) / 5);
        color: white;
    }

    .progress-bar-txt {
        background: radial-gradient(closest-side, #03398A 80%, transparent 0 100%, #C7C9D9 0);
        width: 100%;
        height: 100%;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .count-down-hour {
        font-size: 16px;
    }

    .count-down-minute {
        font-size: 12px;
    }

    .leave-box {
        width: 50px;
        height: 100%;
        display: flex;
        flex-direction: column;
        color: white;
        align-items: center;
    }

    .progressbar_st {
        width: 20px;
        height: 80%;
        display: flex;
        align-items: flex-end;
    }

    .all-leave-box {
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        padding: 0 10px;
    }

    .progress-state {
        --prgpercen: var(--prgvalue);
        width: 100%;
        background-color: #1CB5E0;
        height: 1%;
        border-radius: 50px;
    }

    .progress-text {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .head-img {
        filter: drop-shadow(0px 5px 20px rgba(0, 0, 0, 0.1))
    }
</style>
<div class="loader-wrapper">
    <div class="loader"></div>
</div>
<div class="home-content">
    <div class='header'>
        <div class='header-box'>
            <div class='headtxt head-text-home font-inter'>
                LOGO
            </div>
            <div class='head-img' onclick=" <?= esc($gotoedit_profile); ?>">
                <img class="circle-profile-home" src="<?php echo !empty($_SESSION['profile']) ? $_SESSION['profile'] : base_url('imgs/Mask1.svg'); ?>" alt="Image">
            </div>
        </div>
    </div>
    <div class="content_templatehome">
        <span>Hi,<?php echo $name ?> 😄 </span>
        <div class="blue-box-1" onclick="changeblue()">
            <img class="vector1" src="<?= base_url('imgs/vector1.png') ?>">
            <img class="vector2" src="<?= base_url('imgs/vector2.png') ?>">
            <div id='render'>
                <span class='date'></span>
                <div class="blue-box-line"></div>
                <div class="blue-box-content">
                    welcome to my hrm application
                </div>
            </div>
            <div class="blue-box-2"></div>
        </div>
        <?php
        if ($_SESSION["role"] == "admin") {
            $manager_logo = base_url('imgs/profile-manager.svg');
            $arrow = base_url('/imgs/arrow_left.svg');
            $goto_admin_menu = "window.open('" . base_url("backoffice/login") . "', '_blank');";
            $goto_calendar1 = "window.location.href = " . "'" . base_url("calendar") . "'";

            echo <<< HTML
                            <div class="admin-button" onclick="{$goto_admin_menu}">
                                <div style="display: flex; justify-items: center; padding: 10px;">
                                    <img src="{$manager_logo}" style="margin-right: 10px;">
                                    <span style="color: #ffffff;">Admin</span>
                                </div>
                            </div>
                        HTML;
        }
        ?>

        <br>

        <div id="mng" style="display: none;" class="admin-button" onclick="window.location.href = '<?php echo base_url("manager_document") ?>'">
            <div style="display: flex; justify-items: center; padding: 10px;">
                <img src="<?php echo base_url('imgs/profile-manager.svg'); ?>" style="margin-right: 10px;">
                <span style="color: #ffffff;">Manager</span>
            </div>
        </div>

        <?php
        if ($_SESSION["role"] == "manager" || $_SESSION["role"] == "admin") {
            $manager_logo = base_url('imgs/profile-manager.svg');
            $arrow = base_url('/imgs/arrow_left.svg');
            $goto_manager_doc = "window.location.href = " . "'" . base_url("manager_document") . "'";
            $goto_calendar1 = "window.location.href = " . "'" . base_url("calendar") . "'";

            echo <<< HTML
                            <div class="admin-button" onclick="{$goto_manager_doc}">
                                <div style="display: flex; justify-items: center; padding: 10px;">
                                    <img src="{$manager_logo}" style="margin-right: 10px;">
                                    <span style="color: #ffffff;">Manager</span>
                                </div>
                            </div>
                        HTML;
        }
        ?>

        <span>Menu</span>
        <div class="menu-container">
            <div class="menu-box" onclick="<?= esc($gotoleave); ?>">
                <div class="menu-icon">
                    <img src="<?= base_url('imgs/calendar-add.svg') ?>">
                </div>
                <span class="menutext">Leave</span>
                <span class="menutext"> </span>
            </div>

            <div class="menu-box" onclick="<?= esc($gotooffsite); ?>">
                <div class="menu-icon">
                    <img src="<?= base_url('imgs/building-4.svg') ?>">
                </div>
                <span class="menutext">Offsite</span>
                <span class="menutext"> </span>
            </div>

            <div class="menu-box" onclick="<?= esc($gotoot); ?>">
                <div class="menu-icon">
                    <img src="<?= base_url('imgs/timer-start.svg') ?>">
                </div>
                <span class="menutext">Overtime</span>
                <span class="menutext"> </span>
            </div>

            <div class="menu-box">
                <div class="menu-icon" onclick="<?= esc($gotodoc); ?>">
                    <img src="<?= base_url('imgs/folder-2.svg') ?>">
                </div>
                <span class="menutext">Document</span>
                <span class="menutext"> </span>
            </div>
            <div class="menu-box">
                <div class="menu-icon" onclick="openSalary();">
                    <img src="<?= base_url('imgs/folder-2.svg') ?>">
                </div>
                <span class="menutext">Salary</span>
                <!-- <span class="menutext">shifts</span> -->
            </div>

            <!-- <div class="menu-box">
                <div class="menu-icon" onclick="<?= esc($gotochangeshift); ?>">
                    <img src="<?= base_url('imgs/changeshift.svg') ?>">
                </div>
                <span class="menutext">Change</span>
                <span class="menutext">shifts</span>
            </div> -->
        </div>

        <!-- <div style="margin-top: -20px;">
            <div class="menu-icon" onclick="openSalary();">
                <img src="<?= base_url('imgs/folder-2.svg') ?>">
            </div>
            <span class="menutext">Salary</span>
        </div> -->

        <span>News</span>
        <img src="<?= base_url('imgs/News.png') ?>">
        <div style="margin-top: 20px;">
            <div></div>
            <div></div>
        </div>
    </div>
</div>

<script lang="javascript">
    let ENDPOINT = window.API_URL;

    let page = 2;
    let html = '';
    var date = new Date();
    var options = {
        day: 'numeric',
        month: 'short',
        year: 'numeric'
    };
    var dateString = date.toLocaleDateString('en-GB', options);
    let page2count;
    let page3count;
    let x;

    $(document).ready(function() {
        $('.date').html(dateString);
    });

    function openSalary() {
        window.location.href = "<?= base_url("salary_slip") ?>";
    }

    function caltime(params) {
        let timein = <?php echo $timein ?>;
        let timeout = <?php echo $timeout ?>;
        let worktime = 0;
        let totaltime = (timeout - timein) * 60;
        let d = new Date();
        let hour = d.getHours();
        let min = d.getMinutes();
        let t = hour + ':' + min;

        // const today = new Date(); // get current date and time
        // today.setHours(timeout); // set hours to 19:00
        // today.setMinutes(0); // set minutes to 00
        // let target = today.getTime();
        const targetTime = new Date();
        targetTime.setHours(timeout);
        targetTime.setMinutes(0);
        targetTime.setSeconds(0);

        if (min == 0) {
            worktime = (hour - timein) * 60;
            console.log('(hour - timein)', (timeout - hour));

        } else {
            worktime = ((hour - timein) * 60) + min;

        }
        timeprogress = Math.floor(worktime / totaltime * 100);
        if (timeprogress < 0 || timeprogress > 100) {
            timeprogress = 0
        }

        const now = new Date();

        // Calculate the time remaining
        var timeDiff = targetTime.getTime() - now.getTime();

        // Calculate the days, hours, minutes, and seconds remaining
        var seconds = Math.floor(timeDiff / 1000);
        var hours = Math.floor(seconds / 3600);
        var minutes = Math.floor((seconds % 3600) / 60);
        var remainingSeconds = seconds % 60;


        if (timeDiff <= 0) {
            hours = 0;
            minutes = 0;
            remainingSeconds = 0;
        }
        // Display the countdown
        let timeii = hours + "h " +
            minutes + "m " + remainingSeconds + "s ";

        html = `<span>${dateString}</span>
                <div class="blue-box-line"></div>
                <div class="blue-box-content" >     
                    <div class='blue-p2-container'>
                        <div class="blue-p2-box-1">
                            <span class='txt1'>Time In </span>
                            <span class='timein'> <?= esc($timein); ?>:00</span>
                            <span class='txt1'>Time out </span>
                            <span class='timein'><?= esc($timeout); ?>:00</span>
                        </div>
                        <div class="blue-p2-box-1">
                            <div id="progressbar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="--value:${timeprogress}">
                                <div class='progress-bar-txt' id='countdown'> 
                                    <span class='count-down-hour'>${hours}h</span>
                                    <span class='count-down-minute'>${minutes}m ${remainingSeconds}s  </span>
                                </div>
                            </div>   
                        </div>
                    </div>
                </div>
                `;

        $("#render").html(html);

        if (timeDiff < 0) {
            clearInterval(x);
        }
    }

    console.log(dateString);

    async function changeblue() {
        html = '';
        if (page > 3 || page < 1) {
            page = 1
        }
        console.log('change blue -> page' + page);

        if (page == 1) {
            html = `<span>${dateString}</span>
                    <div class="blue-box-line"></div>
                    <div class="blue-box-content" >
                        Lorem ipsum dolor sit amet.
                    </div>
                `;

            clearInterval(page3count);
            page = 2;

        } else if (page == 2) {
            html = `<span>${dateString}</span>
                    <div class="blue-box-line"></div>
                    <div class="blue-box-content">    
                        <div class='blue-p2-container'>
                            <div class="blue-p2-box-1">
                                <span class='txt1'>Time In </span>
                                <span class='timein'> <?= esc($timein); ?>.00 AM</span>
                                <span class='txt1'>Time out </span>
                                <span class='timein'><?= esc($timeout); ?>.00 AM</span>
                            </div>
                        <div class="blue-p2-box-1">
                            <div id="progressbar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="--value:0">
                                <div class='progress-bar-txt' id='countdown'></div>
                            </div>
                        </div>
                    </div>
            `;

            caltime();
            x = setInterval(caltime, 1000);
            page = 3;

        } else if (page == 3) {
            html = `<span>Remaining leave Benefit</span>
                    <div class="blue-box-content" >
                    <div class="all-leave-box">
                        <div class= "leave-box">
                            <div class="progressbar_st">
                                <div class="progress-state" id='leave_vacation'  '>

                                </div>
                            </div>
                            <span class= 'progress-text' > Vacational<span>Leave</span></span>
                        </div>

                        <div class= "leave-box">
                            <div class="progressbar_st">
                                <div class="progress-state" id='leave_sick' '>

                                </div>
                            </div>
                            <span class= 'progress-text' > Sick <span>Leave</span></span>
                        </div>
                        <div class= "leave-box">
                            <div class="progressbar_st">
                                <div class="progress-state" id='leave_business''>

                                </div>

                            </div>
                            <span class= 'progress-text' > Business <span>Leave</span></span>
                        </div>

                        <div class= "leave-box">
                            <div class="progressbar_st">
                                <div class="progress-state" id='leave_maternity' '>

                                </div>

                            </div>
                            <span class= 'progress-text' > Maternity <span>Leave</span></span>
                        </div>
                    </div>
                </div>         
            `;

            page = 1;
            clearInterval(page2count);
            clearInterval(x);
            $('#render').html(html)
            calleave();
            page3count = setInterval(calleave, 1000 * 10);
        }
        $('#render').html(html)
    }

    function swalcheckagain() {
        Swal.fire({
            html: '<div class="my-alert">' +
                '<img src="<?= base_url("imgs/alertimg.png") ?>" class="my-image">' +
                '<p class="my-message">Your message goes here</p>' +
                '</div>',
            title: '<span style="color:red">Please check again.<span>',
            text: 'Please select leave type.',
            confirmButtonColor: '#d33',
            confirmButtonText: 'Try again'
        })

    }
    var timeprogress;

    async function calleave() {
        let headersList = {
            "Accept": "*/*",
            "Content-Type": "application/json"
        }

        let bodyContent = JSON.stringify({
            "token": "<?php echo $_SESSION['token'] ?>"
        });

        let response = await fetch(ENDPOINT + "mobile/Get-Leave-Home", {
            method: "POST",
            body: bodyContent,
            headers: headersList
        });

        let data = await response.json();
        // console.log(data);
        let result = data.data
        let leave_vacation = result.filter(e => e.code === 'a14')[0].p_count;
        console.log('leave_vacation', leave_vacation)
        let leave_vacation_max = result.filter(e => e.code === 'a14')[0].max
        console.log('leave_vacation_max', leave_vacation_max)
        let leave_sick = result.filter(e => e.code === 'a8')[0].p_count
        let leave_sick_max = result.filter(e => e.code === 'a8')[0].max
        console.log('leave_sick', leave_sick)
        console.log('leave_sick_max', leave_sick_max)
        let leave_business = result.filter(e => e.code === 'a13')[0].p_count
        let leave_business_max = result.filter(e => e.code === 'a13')[0].max
        console.log('leave_business', leave_business)
        console.log('leave_business_max', leave_business_max)
        let leave_maternity = result.filter(e => e.code === 'a12')[0].p_count
        let leave_maternity_max = result.filter(e => e.code === 'a12')[0].max
        console.log('leave_maternity', leave_maternity)
        console.log('leave_maternity_max', leave_maternity_max)
        let vaca_percent = ((leave_vacation / leave_vacation_max)) * 100;
        let sick_percent = ((leave_sick / leave_sick_max)) * 100;
        let bus_percent = ((leave_business / leave_business_max)) * 100;
        let mat_percent = ((leave_maternity / leave_maternity_max)) * 100;

        $('#leave_vacation').css('height', vaca_percent + '%')
        $('#leave_sick').css('height', sick_percent + '%')
        $('#leave_business').css('height', bus_percent + '%')
        $('#leave_maternity').css('height', mat_percent + '%')
    }
</script>

<style>

</style>
<script>
    setTimeout(() => {
        if ('<?php echo $_SESSION['status'] ?>' !== "first") {
            document.querySelector('.vector2').click()
        }
    }, 300)
    check_m()
    async function check_m() {
        try {
            let headersList = {
                "Accept": "*/*",
                "Content-Type": "application/json"
            }

            let bodyContent = JSON.stringify({
                "token": "<?php echo $_SESSION['token'] ?>"
            });

            let response = await fetch(ENDPOINT + "mobile/list_approve", {
                method: "POST",
                body: bodyContent,
                headers: headersList
            });

            let data = await response.json();
            console.log(data);
            result = data.data
            console.log(result)
            if(result[0] && result){
                document.getElementById('mng').style = 'flex'
            }else{
                document.getElementById('mng').style = 'none'
            }
        } catch (error) {
            console.log(error)
        }
    }
</script>