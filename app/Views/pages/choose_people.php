<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>choose people</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('/css/global.css'); ?>">
    <?php echo "<script src='" . base_url('./backoffice_static/config.js') . "'></script>"; ?>
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
            align-items: flex-start;
            padding: 16px;
            background: #FFFFFF;
            box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1);
            border-radius: 16px;
            margin-top: 16px;
        }

        .avatar-bg-img {
            height: 100%;
            aspect-ratio: 1 / 1;
            background: #E6EDFd;
            border-radius: 8px;
            position: relative;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            overflow: hidden;
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
    </style>
</head>

<body style="background: url(<?= base_url('imgs/Background1.png') ?>);  background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;">
    <div class="mybody font-noto">
        <div class="box-search">
            <div style="display: flex;align-items: center;width: 100%;">
                <img style="margin-right: 10px;" src="<?= base_url('/imgs/Icon-search.svg') ?>" alt="">
                <input id="search" style="width: 100%;" type="text" value="" placeholder="Search" onkeyup="search_render()">
            </div>
            <div style="display: none;">
                <img src="<?= base_url('/imgs/microphone-2.svg') ?>" alt="">
            </div>
        </div>
        <div style="overflow-x: scroll; height: 100%;">
            <div class="mt-16 mb-16px fs-16px fw-600">
                Own Team
            </div>
            <div id="own_team">
                <div class="avatar-container">
                    <div class="avatar-bg-img" style="margin-right: 5px;">
                        <img style="height: 100%;" src="<?= base_url('imgs/Mask1.svg') ?>" alt="">
                    </div>
                    <div class="avatar-box-cp">
                        <div class="fs-14px fw-500">Lorem ipsum dolor sit </div>
                        <div class="fs-12px fw-400 f-color-gray">Lorem ipsum dolor sit amet.</div>
                    </div>
                </div>
                <div class="avatar-container">
                    <div class="avatar-bg-img" style="margin-right: 5px;">
                        <img style="height: 100%;" src="<?= base_url('imgs/Mask1.svg') ?>" alt="">
                    </div>
                    <div class="avatar-box-cp">
                        <div class="fs-14px fw-500">Lorem ipsum dolor sit </div>
                        <div class="fs-12px fw-400 f-color-gray">Lorem ipsum dolor sit amet.</div>
                    </div>
                </div>
                <div class="avatar-container">
                    <div class="avatar-bg-img" style="margin-right: 5px;">
                        <img style="height: 100%;" src="<?= base_url('imgs/Mask1.svg') ?>" alt="">
                    </div>
                    <div class="avatar-box-cp">
                        <div class="fs-14px fw-500">Lorem ipsum dolor sit </div>
                        <div class="fs-12px fw-400 f-color-gray">Lorem ipsum dolor sit amet.</div>
                    </div>
                </div>
            </div>
            <div class="mt-16 fs-16px fw-600">
                In Company
            </div>
            <div id="in_company">
                <div class="avatar-container">
                    <div class="avatar-bg-img" style="margin-right: 5px;">
                        <img style="height: 100%;" src="<?= base_url('imgs/Mask1.svg') ?>" alt="">
                    </div>
                    <div class="avatar-box-cp">
                        <div class="fs-14px fw-500">Lorem ipsum dolor sit </div>
                        <div class="fs-12px fw-400 f-color-gray">Lorem ipsum dolor sit amet.</div>
                    </div>
                </div>
                <div class="avatar-container">
                    <div class="avatar-bg-img" style="margin-right: 5px;">
                        <img style="height: 100%;" src="<?= base_url('imgs/Mask1.svg') ?>" alt="">
                    </div>
                    <div class="avatar-box-cp">
                        <div class="fs-14px fw-500">Lorem ipsum dolor sit </div>
                        <div class="fs-12px fw-400 f-color-gray">Lorem ipsum dolor sit amet.</div>
                    </div>
                </div>
                <div class="avatar-container">
                    <div class="avatar-bg-img" style="margin-right: 5px;">
                        <img style="height: 100%;" src="<?= base_url('imgs/Mask1.svg') ?>" alt="">
                    </div>
                    <div class="avatar-box-cp">
                        <div class="fs-14px fw-500">Lorem ipsum dolor sit </div>
                        <div class="fs-12px fw-400 f-color-gray">Lorem ipsum dolor sit amet.</div>
                    </div>
                </div>
                <div class="avatar-container">
                    <div class="avatar-bg-img" style="margin-right: 5px;">
                        <img style="height: 100%;" src="<?= base_url('imgs/Mask1.svg') ?>" alt="">
                    </div>
                    <div class="avatar-box-cp">
                        <div class="fs-14px fw-500">Lorem ipsum dolor sit </div>
                        <div class="fs-12px fw-400 f-color-gray">Lorem ipsum dolor sit amet.</div>
                    </div>
                </div>
                <div class="avatar-container">
                    <div class="avatar-bg-img" style="margin-right: 5px;">
                        <img style="height: 100%;" src="<?= base_url('imgs/Mask1.svg') ?>" alt="">
                    </div>
                    <div class="avatar-box-cp">
                        <div class="fs-14px fw-500">Lorem ipsum dolor sit </div>
                        <div class="fs-12px fw-400 f-color-gray">Lorem ipsum dolor sit amet.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script>
    let ENDPOINT = window.API_URL;

    let DATA_EMPLOYEE = ''
    render_em()

    function search_render() {
        let data = DATA_EMPLOYEE
        let head = data.data.head;
        let team = data.data.own_team;
        let in_company = data.data.In_company
        let search = '';
        search = document.getElementById('search').value
        in_company = in_company.filter(function(obj) {
            return String(obj.fname).includes(search) || String(obj.job_title).includes(search);
        });
        team = team.filter(function(obj) {
            return String(obj.fname).includes(search) || String(obj.job_title).includes(search);
        });
        html_own = '';
        team.forEach(e => {
            let src_image = e.img_profile
            if (e.img_profile == null || e.img_profile == "") {
                src_image = "<?= base_url('imgs/Mask1.svg') ?> ";
            }

            html_own += `
                <div onclick="sendparam(${e.eid})" class="avatar-container">
                    <div class="avatar-bg-img" style="margin-right: 5px;">
                        <img style="height: 50px; width:50px" src="${src_image}" alt="">
                    </div>
                    <div class="avatar-box-cp">
                        <div class="fs-14px fw-500">${e.fname}</div>
                        <div class="fs-12px fw-400 f-color-gray">${e.job_name_en}</div>
                    </div>
                </div>
            `;
        });
        document.getElementById('own_team').innerHTML = html_own
        html_com = '';
        in_company.forEach(e => {
            let src_image = e.img_profile
            if (e.img_profile == null || e.img_profile == "") {
                src_image = "<?= base_url('imgs/Mask1.svg') ?> ";
            }

            html_com += `
                <div onclick="sendparam(${e.eid})" class="avatar-container">
                    <div class="avatar-bg-img" style="margin-right: 5px;">
                        <img style="height: 50px; width:50px" src="${src_image}" alt="">
                    </div>
                    <div class="avatar-box-cp">
                        <div class="fs-14px fw-500">${e.fname}</div>
                        <div class="fs-12px fw-400 f-color-gray">${e.job_name_en}</div>
                    </div>
                </div>
            `;
        });
        document.getElementById('in_company').innerHTML = html_com
    }

    async function render_em() {
        document.querySelector(".loader-wrapper").classList.add("active");
        let headersList = {
            "Accept": "*/*",
            "Content-Type": "application/json"
        }

        let bodyContent = JSON.stringify({
            "token": "<?php echo  $_SESSION['token'] ?>"
        });

        let response = await fetch(ENDPOINT + "mobile/GET-CHOOSE-PEOPLE-PAGE", {
            method: "POST",
            body: bodyContent,
            headers: headersList
        });

        let data = await response.json();
        DATA_EMPLOYEE = data
        let head = data.data.head;
        let team = data.data.own_team;
        let in_company = data.data.In_company

        // render my own
        html_own = '';
        team.forEach(e => {
            let src_image = e.img_profile
            if (e.img_profile == null || e.img_profile == "") {
                src_image = "<?= base_url('imgs/Mask1.svg') ?> ";
            }

            html_own += `
                <div onclick="sendparam(${e.eid})" class="avatar-container">
                    <div class="avatar-bg-img" style="margin-right: 5px;">
                        <img style="height: 50px; width:50px" src="${src_image}" alt="">
                    </div>
                    <div class="avatar-box-cp">
                        <div class="fs-14px fw-500">${e.fname}</div>
                        <div class="fs-12px fw-400 f-color-gray">${e.job_title}</div>
                    </div>
                </div>
            `;
        });
        document.getElementById('own_team').innerHTML = html_own
        html_com = '';
        in_company.forEach(e => {
            let src_image = e.img_profile
            if (e.img_profile == null || e.img_profile == "") {
                src_image = "<?= base_url('imgs/Mask1.svg') ?> ";
            }

            html_com += `
                <div onclick="sendparam(${e.eid})" class="avatar-container">
                    <div class="avatar-bg-img" style="margin-right: 5px;">
                        <img style="height: 50px; width:50px" src="${src_image}" alt="">
                    </div>
                    <div class="avatar-box-cp">
                        <div class="fs-14px fw-500">${e.fname}</div>
                        <div class="fs-12px fw-400 f-color-gray">${e.job_title}</div>
                    </div>
                </div>
            `;
        });
        document.getElementById('in_company').innerHTML = html_com

        document.querySelector(".loader-wrapper").classList.remove("active");
    }

    function sendparam(id) {
        var url = '/profile?id=' + id; // Append the parameter to the URL
        window.location.href = url;
    }
</script>