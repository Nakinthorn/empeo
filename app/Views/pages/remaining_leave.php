<!DOCTYPE html>
<html lang="en">

<head>
    <?php if (session()->has('error')) : ?>
        <div><?= session('error') ?></div>
    <?php endif; ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= base_url('/css/global.css'); ?>">
    <?php echo "<script src='".base_url('./backoffice_static/config.js')."'></script>"; ?>
    <style>
        .mybody {
            height: 85vh;
            padding: 20px;
        }

        .mt-auto-left {
            margin-left: auto;
        }

        .bar {
            width: 80%;
            background-color: #D6E1FF;
            border-radius: 48px;
            position: relative;
        }

        .bar-text {
            background: #0063F7;
            border-radius: 48px;
            width: 0%;
            color: white;
        }
    </style>
</head>

<body>
    <div class="mybody">
        <div class="fw-500 mt-10">VACATION LEAVE</div>
        <div class="mt-16 flex-middle-box" style="width: 100%;">
            <div class="bar">
                <div id="count_leave" class="bar-text flex-middle-box" style="">&nbsp;</div>
            </div>
            <div class="mt-auto-left"> <span id="l_1"></span> Day</div>
        </div>
        <div class="fw-500 mt-10">SICK LEAVE</div>
        <div class="mt-10 flex-middle-box" style="width: 100%;">
            <div class="bar">
                <div id="count_leave2" class="bar-text flex-middle-box" style="">&nbsp;</div>
            </div>
            <div class="mt-auto-left"> <span id="l_2"></span> Day</div>
        </div>
        <div class="fw-500 mt-10">BUSINESS LEAVE</div>
        <div class="mt-10 flex-middle-box" style="width: 100%;">
            <div class="bar">
                <div id="count_leave3" class="bar-text flex-middle-box" style="">&nbsp;</div>
            </div>
            <div class="mt-auto-left"> <span id="l_3"></span> Day</div>
        </div>
        <div class="fw-500 mt-10">MATERNITY LEAVE</div>
        <div class="mt-10 flex-middle-box" style="width: 100%;">
            <div class="bar">
                <div id="count_leave4" class="bar-text flex-middle-box" style="">&nbsp;</div>
            </div>
            <div class="mt-auto-left"> <span id="l_4"></span> Day</div>
        </div>
    </div>
    <footer>
        <div class='btn' onclick="<?= $leave ?>">Leave</div>
    </footer>
</body>

</html>
<script>
    let ENDPOINT = window.API_URL;

    calleave()
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
        let result = data.data

        let leave_vacation = result.filter(e => e.code === 'a14')[0].p_count;
        let leave_vacation_max = result.filter(e => e.code === 'a14')[0].max;

        let leave_sick = result.filter(e => e.code === 'a8')[0].p_count;
        let leave_sick_max = result.filter(e => e.code === 'a8')[0].max;
  
        let leave_business = result.filter(e => e.code === 'a13')[0].p_count;
        let leave_business_max = result.filter(e => e.code === 'a13')[0].max;

        let leave_maternity = result.filter(e => e.code === 'a12')[0].p_count;
        let leave_maternity_max = result.filter(e => e.code === 'a12')[0].max;

        render_raining_leave(leave_vacation, leave_vacation_max)
        render_raining_leave2(leave_sick, leave_sick_max)
        render_raining_leave3(leave_business,leave_business_max)
        render_raining_leave4(leave_maternity,leave_maternity_max)
        document.getElementById('l_1').innerText = leave_vacation_max
        document.getElementById('l_2').innerText = leave_sick_max
        document.getElementById('l_3').innerText = leave_business_max
        document.getElementById('l_4').innerText = leave_maternity_max
    }

    function render_raining_leave(val, max) {
        let remain = parseInt(max) - parseInt(val)
        if (remain <= 0) {
            remain = 0;
        }

        let TO_PERCENT = 100
        let result = Math.abs(parseInt(remain) / max * TO_PERCENT)

        count_leave.innerText = remain
        count_leave.style.width = result + '%'
        if (val === 0 || val === '0') {
            count_leave.innerHTML = '&nbsp;'
        }
    }

    function render_raining_leave2(val, max) {
        console.log(2)
        let remain = parseInt(max) - parseInt(val)
        if (remain <= 0) {
            remain = 0;
        }
        let TO_PERCENT = 100
        let result = Math.abs(parseInt(remain) / max * TO_PERCENT)

        count_leave2.innerText = remain
        count_leave2.style.width = result + '%'
        if (val === 0 || val === '0') {
            console.log('count_leave2')
            count_leave2.innerHTML = '&nbsp;'
        }
    }

    function render_raining_leave3(val, max) {
        console.log(3)
        let remain = parseInt(max) - parseInt(val)
        if (remain <= 0) {
            remain = 0;
        }

        let TO_PERCENT = 100
        let result = Math.abs(parseInt(remain) / max * TO_PERCENT)

        count_leave3.innerText = remain
        count_leave3.style.width = result + '%'
        if (val === 0 || val === '0') {
            count_leave3.innerHTML = '&nbsp;'
        }
    }

    function render_raining_leave4(val, max) {
        console.log(4)
        let remain = parseInt(max) - parseInt(val)
        if (remain <= 0) {
            remain = 0;
        }
        let TO_PERCENT = 100
        let result = Math.abs(parseInt(remain) / max * TO_PERCENT)
        count_leave4.innerText = remain
        count_leave4.style.width = result + '%'
        if (val === 0 || val === '0') {
            count_leave4.innerHTML = '&nbsp;'
        }
    }
</script>