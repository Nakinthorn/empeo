<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>choose people</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('/css/global.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('/css/modal_alert.css'); ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php echo "<script src='" . base_url('./backoffice_static/config.js') . "'></script>"; ?>

    </script>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .mybody {
            height: 85vh;
            padding: 16px;
        }

        input {
            background: none;
            border: none;
            font-size: 16px;
        }

        .avatar-container {
            display: flex;
            flex-direction: row;
            align-items: center;
            padding: 16px;
            background: #FFFFFF;
            box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1);
            border-radius: 16px;
            margin-top: 16px;
        }

        .avatar-bg-img {
            height: 60px;
            width: 70px;
            background: #E6EDFd;
            border-radius: 8px;
            position: relative;
            display: inline-flex;
            justify-content: center;
            align-items: center;
        }

        .box-search {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #FAFAFC;
            padding: 12px;
            border-radius: 100px;
        }

        .avatar-box-cp {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .inprogress {
            display: flex;
            align-items: center;
            text-align: center;
            color: #FFCC00;
            background: #FFFEE6;
            padding: 4px 8px;
            width: 77px;
            border-radius: 27px;
        }

        .approved {
            display: flex;
            align-items: center;
            text-align: center;
            color: #06C270;
            background: #E3FFF1;
            padding: 4px 8px;
            width: 77px;
            border-radius: 27px;
        }

        .cancel {
            display: flex;
            align-items: center;
            text-align: center;
            color: #FF3B3B;
            background: #FFE5E5;
            padding: 4px 8px;
            width: 77px;
            border-radius: 27px;
        }
        .box2 {
            display: flex;
        }

        .mybox-shadow {
            box-shadow: 5px 5px 20px 0px rgba(0, 0, 0, 0.1);
            -webkit-box-shadow: 5px 5px 20px 0px rgba(0, 0, 0, 0.1);
            -moz-box-shadow: 5px 5px 20px 0px rgba(0, 0, 0, 0.1);
        }

        .circle {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 2px solid white;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container-input {
            display: flex;
            width: 100%;
            justify-content: space-between;
        }

        .container-select {
            display: flex;
            width: 100%;
            justify-content: space-between;
        }

        .container-select>.c-inside {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 0px;
            gap: 8px;
            width: 150px;
            height: 120px;
            background: #F6F7F9;
            border-radius: 16px;
            flex: none;
            position: relative;
        }

        .c1 {
            background: #F6F7F9;
            border-radius: 8px;
            width: 167px;
            height: 48px;
            padding: 12px 16px;
            gap: 8px;
            border-radius: 8px;
            display: flex;
        }

        .c1>.date {
            flex: 2;
        }

        .c1>.imgs {
            flex: 1;
            display: flex;
            justify-content: flex-end;
        }

        .img-select {
            width: 10px;
            background-repeat: no-repeat;
            object-fit: contain;
        }

        .subcol1 {
            width: 100%;
            display: flex;
            flex-direction: column;
        }

        .doc-text {
            margin-top: 17px;
            font-size: 14px;
            line-height: 24px;
            font-weight: 400;
            color: #838799;
        }

        .box-content-select {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .hide-select {
            position: absolute;
            background-color: rgba(91, 141, 239, 0.8);
            z-index: 1;
            width: 100%;
            height: 100%;
            border-radius: 16px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 0px;
            gap: 8px;
            color: white;
        }

        .hide-select>.btn {
            box-sizing: border-box;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            padding: 8px 12px;
            width: 102px;
            height: 34px;
            background: rgba(255, 255, 255, 0.4);
            border: 1px solid #FFFFFF;
            border-radius: 17px;
        }

        .container-shift-btn {
            position: fixed;
            bottom: 10px;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            padding: 16px;
            gap: 8px;
            background: #FFFFFF;
            border: 1px solid #C7C9D9;
            border-radius: 16px;
            width: 90%;
            margin-left: 5%;
        }

        .container-shift-btn:active {
            background: #0063F7 !important;
            border: 1px solid #0063F7 !important;
            color: white;
        }

        .circle-team {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 2px solid white;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .avatar-card {
            justify-self: center;
            width: max-content;
            box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 8px;
            border: 1px solid white
        }

        .avatar-card.border_blue {
            border: 2px solid #5B8DEF;
        }

        .btn-shift-blue {
            background-color: #0063F7 !important;
            color: #fff !important;
            border: none;
        }
    </style>
</head>

<body>
    <div class="mybody font-noto">
        <div class="fw-400 fs-14px f-color-gray">You want to change shifts</div>
        <div class="container-input mt-16" style="display: none;">
            <div class="c1">
                <div class="date">Date</div>
                <div class="imgs">a</div>
            </div>
            <div class="c1">
                <div class="date">Date</div>
                <div class="imgs">a</div>
            </div>
        </div>
        <div class="container-select mt-16">
            <div class="c-inside">
                <div class="box-content-select">
                    <img class="circle" src="<?php echo !empty($_SESSION['profile']) ? $_SESSION['profile'] : base_url('imgs/Mask1.svg'); ?>" alt="">
                    <div class="fs-12px f-color-gray">
                        <?php echo $employee_data['fname']; ?> <?php echo $employee_data['lname']; ?>
                    </div>
                    <div class="fs-12px f-color-gray">
                        <?php echo $employee_data['job']; ?>
                    </div>
                </div>

            </div>
            <img class="img-select" src="<?= base_url('/imgs/arrow-grey-right.svg') ?>" alt="">
            <div class="c-inside">
                <div class="box-content-select" onclick="modal_select()">
                    <img class="circle" id="img_get" src="<?php echo base_url('imgs/avatar_wrap.png') ?>" alt="">
                    <div id="fname" class="fs-12px f-color-gray">
                        name n.
                    </div>
                    <div id="job_title_text" class="fs-12px f-color-gray">
                        position
                    </div>
                </div>
                <div class="hide-select" onclick="modal_select()">
                    <div class="fs-12px fw-400">
                        Choose a colleague
                    </div>
                    <div class="btn fw-500">Select</div>
                </div>
            </div>
        </div>
        <div class='col1 mt-16'>
            <div class="subcol1">
                <div class="doc-text">
                    About
                </div>
                <textarea style="width: 100%;height: 100PX; border: 1px solid #C7C9D9; border-radius: 8px;padding: 5px;" name="" id="text_area_about" cols="30" rows="10"></textarea>
            </div>
        </div>
        <div class='col1 mt-16'>
            <div class="subcol1">
                <div class="doc-text">
                    Approver
                </div>
            </div>
        </div>
        <div id="admin_approve" style="overflow: scroll;height: 33vh;">

        </div>


        <!-- <div>
            <div class="avatar-container">
                <div class="avatar-bg-img" style="margin-right: 5px;">
                    <img style="height: 100%;" src="<?= base_url('imgs/Mask1.svg') ?>" alt="">
                </div>
                <div class="avatar-box-cp">
                    <div class="fs-14px fw-500">Lorem ipsum dolor sit </div>
                    <div class="fs-12px fw-400 f-color-gray">Lorem ipsum dolor sit amet.</div>
                </div>
            </div>
        </div> -->

    </div>
    <div class="container-shift-btn" onclick="open_modal_success()">
        <div class="fw-700 font-noto">
            confirm
        </div>
    </div>
    <div class="modal-select">
        <div class="modal-content-select slide-top">
            <div style="position: relative;">
                <img onclick="closeModal()" style="position: absolute;
                        right: -10px;
                        top: -7px;" src="<?= base_url('imgs/quite.svg') ?>" alt="">
            </div>
            <div class="modal-header fs-14px fw-400">
                You want to change shifts
            </div>
            <div class="modal-body-select">
                <!-- <div class="modal-msg">Please check again.</div> -->
                <div class="gray fs-14px" style="height: 30vh;
                display: grid; gap: 20px 30px;
                justify-content: center;
                align-items: center;
                grid-template-columns: 25% 25% 25%;
                margin: 10px 0; 
                padding: 15px 0;">
                    <?php
                    // echo $head['job_title'];
                    $crownimage = base_url('/imgs/crown.svg');
                    $mask1 = base_url('imgs/Mask1.svg');
                    foreach ($head as $value) {
                        $avatar = isset($value['img_profile']) ? $value['img_profile'] : $mask1;
                        echo <<<HTML
                    <div class="avatar-card remove-border" onclick="select_em_for_change_shift(this,{$value['eid']})">
                        <div class="avatar-bg-img">
                            <img class="circle-team" style="" src="{$avatar}" alt="">
                            <img style="position: absolute; right: -20px; top: -22px; height: 30px;" src="{$crownimage}" alt="">
                        </div>
                        <div class="fs-12px fw-500">
                            {$value['fname']}
                        </div>
                        <div class="fs-10px fw-400 f-color-gray">
                            {$value['job_title']}
                        </div>
                    </div>
                HTML;
                    } ?>


                    <?php
                    $crownimage = base_url('/imgs/crown.svg');
                    $mask1 = base_url('imgs/Mask1.svg');
                    foreach ($team as $value) {
                        $avatar = isset($value['img_profile']) ? $value['img_profile'] : $mask1;
                        echo <<<HTML
                <div class="avatar-card remove-border" onclick="select_em_for_change_shift(this,{$value['eid']})">
                    <div class="avatar-bg-img">
                        <img class="circle-team" style="" src="{$avatar}" alt="">
                    </div>
                    <div class="fs-12px fw-500">
                    {$value['fname']}
                    </div>
                    <div class="fs-10px fw-400 f-color-gray">
                        {$value['job_title']}
                    </div>
                </div>
            HTML;
                    } ?>
                </div>
            </div>
            <div class="modal-footer">
                <button onclick="get_user()" class="modal-btn-select confirm-btn ">confirm</button>
            </div>
        </div>
    </div>
    <div class="modal hide" id='modal_success' style='display:flex;'>
        <div class="modal_content">
            <div class="modal_header">
                <img src="<?= base_url("imgs/success_icon.svg") ?>" alt="Modal Header Image">
                <!-- <h2>Modal Title</h2> -->
            </div>
            <div class="modal_body">
                <div class="modal_msg2 fs-20px fw-700">The document is being sent.</div>
                <div class="fs-14px fw-400 f-color-gray ">Are you sure to submit shift change documents?</div>
            </div>
            <div class="modal_footer">
                <button class="modal_btn_shift_white success_btn_white" onclick='closeModal_shift();'>Cancel</button>
                <button class="modal_btn_shift success_btn" onclick='confirm_shift(); refresh();'>Confirm</button>
            </div>
        </div>
    </div>
</body>
<script>
    function backhome() {
        window.location.href = "<?= base_url("home") ?>";
    }

    function open_modal_success() {
        modal_success.classList.remove('hide')
    }

    function closeModal_shift() {
        $('.modal_content').removeClass('slide_top');
        setTimeout(function() {
            $('.modal').addClass('hide');
        }, 100);
    }
</script>
<script>
    let ENDPOINT = window.API_URL;

    user_can_approve()
    async function user_can_approve() {
        try {
            let headersList = {
                "Accept": "*/*",
                "Content-Type": "application/json"
            }

            let bodyContent = JSON.stringify({
                "token": '<?php echo $_SESSION['token']; ?>'
            });

            let response = await fetch(ENDPOINT + "mobile/can_approve", {
                method: "POST",
                body: bodyContent,
                headers: headersList
            });

            let data = await response.json();
            data = data.data
            let html = '';
            data.forEach(data => {
                let avatar = data['img_profile'] ? data['img_profile'] : '<?php echo base_url('imgs/Mask1.svg') ?>';
                html += `<div>
                        <div class="avatar-container">
                            <div class="avatar-bg-img" style="margin-right: 5px;">
                                <img class="circle" src="${avatar}" alt="">
                            </div>
                            <div class="avatar-box-cp">
                                <div class="fs-14px fw-500">  ${data['fname']}  ${data['lname']} </div>
                                <div class="fs-12px fw-400 f-color-gray"> ${data['job_title']}</div>
                            </div>
                        </div>
                    </div>`
            })
            admin_approve.innerHTML = html
        } catch (err) {
            console.log(err)
        }
    }

    const modal = document.querySelector('.modal-select');
    const modalContent = document.querySelector('.modal-content-select');
    const cancelBtn = document.querySelector('.cancel-btn');
    const confirmBtn = document.querySelector('.confirm-btn');

    function modal_select() {
        setTimeout(function() {
            modalContent.classList.add('slide-top');
            modal.style.display = 'flex';
        }, 300);
    }

    function closeModal() {
        modalContent.classList.remove('slide-top');
        setTimeout(function() {
            modal.style.display = 'none';
        }, 300);
        clearvalur()
    }

    function clearvalur() {
        let remove = document.querySelectorAll('.remove-border')
        remove.forEach(data => data.classList.remove('border_blue'))
        document.querySelector('.confirm-btn').classList.remove('btn-shift-blue')
    }
    let em_id = ''

    function select_em_for_change_shift(e, id) {
        em_id = id
        let remove = document.querySelectorAll('.remove-border')
        remove.forEach(data => data.classList.remove('border_blue'))
        e.classList.add('border_blue')
        document.querySelector('.confirm-btn').classList.add('btn-shift-blue')

    }
    async function get_user() {
        try {
            if (em_id) {
                document.querySelector(".loader-wrapper").classList.add("active");
                let headersList = {
                    "Accept": "*/*",
                    "Content-Type": "application/json"
                }

                let bodyContent = JSON.stringify({
                    "token": '<?php echo $_SESSION['token'] ?>'
                });

                let response = await fetch(ENDPOINT + "mobile/get/users/" + em_id, {
                    method: "POST",
                    body: bodyContent,
                    headers: headersList
                });

                let result = await response.json();
                console.log(result)
                result = result.data
                document.querySelector('.hide-select').style.display = 'none'
                document.querySelector(".loader-wrapper").classList.remove("active");
                img_get.src = result.img_profile
                fname.innerText = result.fname
                job_title_text.innerText = result.job_title
                console.log('xxxxx', result.fname)
                closeModal()
                clearvalur()
            }
        } catch (err) {
            document.querySelector(".loader-wrapper").classList.remove("active");
            console.log(err)
        }

    }
    async function confirm_shift() {
        try {
            let my_emid = <?php echo $employee_data['eid'] ?>;
            let headersList = {
                "Accept": "*/*",
                "Content-Type": "application/json"
            }

            let bodyContent = JSON.stringify({
                "token": '<?php echo $_SESSION['token']; ?>',
                "request_type": "shift",
                "userone_id": my_emid,
                "usertwo_id": em_id,
                "reason": text_area_about.value
            });

            let response = await fetch(ENDPOINT + "mobile/request/shift", {
                method: "POST",
                body: bodyContent,
                headers: headersList
            });

            let data = await response.json();
            let msg = data.msg
            if (msg === 'success') {
                window.location.href = '/home'
            } else {

            }
        } catch (err) {
            console.log(err)
        }
    }

    function refresh() {
        location.reload();
    }
</script>

</html>