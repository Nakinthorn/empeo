<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>choose people</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('/css/global.css'); ?>">
    <?php echo "<script src='".base_url('./backoffice_static/config.js')."'></script>"; ?>
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
            height: 60px;
            width: 90px;
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
            width: 80px;
            height: 80px;
            border-radius: 50%;
            border: 0.1px solid black;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body style="background: url(<?= base_url('imgs/Background1.png') ?>);  background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;">
    <div class="mybody font-noto">
        <div style="display: flex; align-items: center;justify-content: space-between;">
            <div class="fw-500 fs-16px" style="display: inline-flex;">
                <select name="" id="fill_noti" onchange="filleter_render(this)" style="width: 150px; padding:12px 16px 12px 16px;border-radius: 8px;background: #F6F7F9;">
                    <option value="all">ALL</option>
                    <option value="approved">Approved</option>
                    <option value="inprogress">Inprogress</option>
                    <option value="cancel">Cancel</option>
                </select>
            </div>
            <div class="fw-500 fs-12px f-color-gray" style="text-decoration-line: underline; display: none;">View all</div>
        </div>

        <div style="overflow-x: scroll;height: 90%;margin-top: 10%;">
            <div id="change_shift_head" class="mt-16 mb-16px fs-16px fw-600 hide">
                Change Shift
            </div>
            <div id="change_shift" class="mt-16 mb-16px fs-16px fw-600 hide">

            </div>
            <script>
                let ENDPOINT = window.API_URL;

                async function render_change_shift() {
                    let headersList = {
                        "Accept": "*/*",
                        "Content-Type": "application/json"
                    }

                    let bodyContent = JSON.stringify({
                        "token": '<?php echo $_SESSION['token']; ?>',
                    });

                    let response = await fetch(ENDPOINT + "mobile/get/all/shift", {
                        method: "POST",
                        body: bodyContent,
                        headers: headersList
                    });
                    
                    let data = await response.json();
                    let msg = data.msg
                    data = data.data
                    const check_status = (value) => {
                        if (value === 'inprogress') {
                            return `<div class="fs-12px fw-400 f-color-gray" style="display: flex; justify-content: end;">
                            <span class="inprogress">Inprogress</span>
                        </div>`
                        } else if (value === 'approved') {
                            return `<div class="fs-12px fw-400 f-color-gray" style="display: flex; justify-content: end;">
                            <span class="approved fs-12px flex-middle-box">Approved</span>
                        </div>`
                        } else {
                            return ` <div class="fs-12px fw-400 mt-10 f-color-gray" style="display: flex; justify-content: end;">
                            <span class="cancel fs-12px flex-middle-box">cancel</span>
                        </div>`
                        }
                    }
                    let html = ''
                    if (msg === 'good') {
                        data.forEach((e) => {
                            // console.log(11111, e)
                            html += `
                                    <div onclick="sendparam_shift_doc(${e.id},${e.userone_id},${e.usertwo_id},'${e.reason}')" class="avatar-container">
                            <div class="avatar-bg-img" style="margin-right: 5px;">
                                <img style="height: 100%;" src="${e.img_profile}" alt="">
                            </div>
                            <div class="avatar-box-cp">
                                <div class="fs-14px fw-500">${e.request_name}</div>
                                <div class="fs-12px fw-400 f-color-gray">${e.reason}</div>
                                <div class="fs-12px fw-400 mt-10 f-color-gray" style="display: flex;">
                                    <img style="width:15px;" src="=" alt="">
                                    <span style="margin-left: 5px;"></span>
                                </div>
                                ${check_status(e.approve_status)}
                            </div>
                        </div>
                            `
                            change_shift_head.classList.remove('hide')
                            change_shift.classList.remove('hide')
                        });
                        change_shift.innerHTML = html;
                    } else {
                        change_shift_head.classList.add('hide')
                        change_shift.classList.add('hide')
                    }

                }

                function sendparam_shift_doc(id, userOneId, userTwoId, reason) {
                    var url = '/change_shift_user2?id=' + id + '&userone_id=' + userOneId + '&usertwo_id=' + userTwoId + '&status=' + status + '&reason=' + reason;
                    window.location.href = url;
                }
            </script>
            <div class="mt-16 mb-16px fs-16px fw-600">
                My Document
            </div>
            <div id="mydoc">
                <div class="avatar-container">
                    <div class="avatar-bg-img" style="margin-right: 5px;">
                        <img style="height: 100%;" src="<?= base_url('imgs/Mask1.svg') ?>" alt="">
                    </div>
                    <div class="avatar-box-cp">
                        <div class="fs-14px fw-500">Lorem ipsum dolor sit </div>
                        <div class="fs-12px fw-400 f-color-gray">Lorem ipsum dolor sit amet.</div>
                        <div class="fs-12px fw-400 mt-10 f-color-gray" style="display: flex;">
                            <img style="width:15px;" src="<?= base_url('imgs/calendar.svg') ?>" alt="">
                            <span style="margin-left: 5px;">12/11/2021 - 12/11/2021</span>
                        </div>
                        <div class="fs-12px fw-400 f-color-gray" style="display: flex; justify-content: end;">
                            <span class="inprogress">Inprogress</span>
                        </div>

                    </div>
                </div>
                <div class="avatar-container">
                    <div class="avatar-bg-img" style="margin-right: 5px;">
                        <img style="height: 100%;" src="<?= base_url('imgs/Mask1.svg') ?>" alt="">
                    </div>
                    <div class="avatar-box-cp">
                        <div class="fs-14px fw-500">Lorem ipsum dolor sit </div>
                        <div class="fs-12px fw-400 mt-10 f-color-gray">Lorem ipsum dolor sit amet.</div>
                        <div class="fs-12px fw-400 mt-10 f-color-gray" style="display: flex;">
                            <img style="width:15px;" src="<?= base_url('imgs/calendar.svg') ?>" alt="">
                            <span style="margin-left: 5px;">12/11/2021 - 12/11/2021</span>
                        </div>
                        <div class="fs-12px fw-400 f-color-gray" style="display: flex; justify-content: end;">
                            <span class="approved fs-12px flex-middle-box">Approved</span>
                        </div>

                    </div>
                </div>
                <div class="avatar-container">
                    <div class="avatar-bg-img" style="margin-right: 5px;">
                        <img style="height: 100%;" src="<?= base_url('imgs/Mask1.svg') ?>" alt="">
                    </div>
                    <div class="avatar-box-cp">
                        <div class="fs-14px fw-500">Lorem ipsum dolor sit </div>
                        <div class="fs-12px fw-400 mt-10 f-color-gray">Lorem ipsum dolor sit amet.</div>
                        <div class="fs-12px fw-400 mt-10 f-color-gray" style="display: flex;">
                            <img style="width:15px;" src="<?= base_url('imgs/calendar.svg') ?>" alt="">
                            <span style="margin-left: 5px;">12/11/2021 - 12/11/2021</span>
                        </div>
                        <div class="fs-12px fw-400 mt-10 f-color-gray" style="display: flex; justify-content: end;">
                            <span class="cancel fs-12px flex-middle-box">cancel</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- fixed -->
    <div id="detail_modal" class="font-noto" style="display: none; position: fixed; background-color: white; height: 100vh;width: 100vw; z-index: 1; top: 0;">
        <div class='header'>
            <div class='headerbox'>
                <div class='headimg' onclick="close_modal()"><img src="<?= base_url('imgs/arrowleft_black.png') ?>" alt="Image"></div>
                <div class='headtxt'>
                    <?= $header ?>
                </div>
            </div>
        </div>
        <div class="mybody">
            <div class="box2">
                <div class="circle box1">
                    <img id="myimg" class="circle" style="object-fit: contain; width: 100px;" src="<?= base_url('/imgs/avatar_wrap.png') ?>" alt="">
                </div>
                <div style="margin-left: 10px; display: flex; flex-direction: column; justify-content: center;">
                    <div id="fname_detail" class="fs-16px fw-500">xxxxxxxxxxxxxxx</div>
                    <div id="job_detail" class="fs-12px f-color-gray">ปปปปป</div>
                </div>
            </div>
            <div class="mt-24px" style="display: flex; justify-content: space-between; align-items: center;">
                <span id="type_request" class="fw-400 fs-14px">Business Leave </span>
                <span class="fw-400 fs-14px f-color-gray"><span id="betw_day"></span> Day</span>
            </div>
            <div class="mt-24px" style="display: flex; justify-content: space-between; align-items: center;">
                <span class="fw-400 fs-14px">Date </span>
                <div class="fw-400 fs-14px f-color-gray flex-middle-box">
                    <img style="width:15px;" src="<?= base_url('imgs/calendar.svg') ?>" alt="">
                    <span id="date_detail" style="margin-left: 10px;"> xxxxx</span>

                </div>
            </div>
            <div class="mt-24px" style="display: flex;flex-direction: column;">
                <span class="fw-400 fs-14px">About </span>
                <div id="reason_detail" class="fw-400 fs-14px f-color-gray mt-24px" style="height: 15vh;">
                    xxxxx
                </div>
                <div id="show_files" class="mt-24px grid-container-dm">
                    <div style="width: 168px;height: 100.94px;" class="mybox-shadow flex-middle-box">
                        document
                    </div>
                    <div style="width: 168px;height: 100.94px;" class="mybox-shadow flex-middle-box">
                        document
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    function filleter_render() {
        console.log(fill_noti.value)
        const value = fill_noti.value
        if (value === 'approved') {
            let data = LIST_MYDOCUMENT_DATA
            let html = ``;
            const check_status = (value) => {
                if (value === 'inprogress') {
                    return `<div class="fs-12px fw-400 f-color-gray" style="display: flex; justify-content: end;">
                            <span class="inprogress">Inprogress</span>
                        </div>`
                } else if (value === 'approved') {
                    return `<div class="fs-12px fw-400 f-color-gray" style="display: flex; justify-content: end;">
                            <span class="approved fs-12px flex-middle-box">Approved</span>
                        </div>`
                } else {
                    return ` <div class="fs-12px fw-400 mt-10 f-color-gray" style="display: flex; justify-content: end;">
                            <span class="cancel fs-12px flex-middle-box">cancel</span>
                        </div>`
                }
            }
 
            data = data.filter(data => data.approve_status === 'approved')
            data.forEach(e => {
                // console.log(e)
                myprofile =  myprofile = e.type_request_name === 'shift' ? e.img_profile : '<?php echo $_SESSION['profile'] ?>'
                if (e.id) {
                    let date_start = format_date(parseInt(e.date_start))
                    let date_end = format_date(parseInt(e.date_end))
                    html += `
                <div onclick="sendparam('${e.fname + " " + e.lname}','${job_title}','${date_start}','${date_end}','${e.reason}','${check_request(e)}','${myprofile}','${e.files_path ? e.files_path : '' }')" class="avatar-container">
                    <div class="avatar-bg-img" style="margin-right: 5px;">
                        <img style="height: 100%;" src="${myprofile}" alt="">
                    </div>
                    <div class="avatar-box-cp">
                        <div class="fs-14px fw-500">${check_request(e)}</div>
                        <div class="fs-12px fw-400 f-color-gray">${e.reason}</div>
                        <div class="fs-12px fw-400 mt-10 f-color-gray" style="display: flex;">
                            <img style="width:15px;" src="<?= base_url('imgs/calendar.svg') ?>" alt="">
                            <span style="margin-left: 5px;">${date_start} - ${date_end}</span>
                        </div>
                        ${check_status(e.approve_status)}
                    </div>
                </div>
                `
                }

            });
            mydoc.innerHTML = html
        } else if (value === 'inprogress') {
            data = LIST_MYDOCUMENT_DATA;
            let html = ``;
            const check_status = (value) => {
                if (value === 'inprogress') {
                    return `<div class="fs-12px fw-400 f-color-gray" style="display: flex; justify-content: end;">
                            <span class="inprogress">Inprogress</span>
                        </div>`
                } else if (value === 'approved') {
                    return `<div class="fs-12px fw-400 f-color-gray" style="display: flex; justify-content: end;">
                            <span class="approved fs-12px flex-middle-box">Approved</span>
                        </div>`
                } else {
                    return ` <div class="fs-12px fw-400 mt-10 f-color-gray" style="display: flex; justify-content: end;">
                            <span class="cancel fs-12px flex-middle-box">cancel</span>
                        </div>`
                }
            }
          
            data = data.filter(data => data.approve_status === 'inprogress')
            data.forEach(e => {
                console.log(e)
                myprofile =  myprofile = e.type_request_name === 'shift' ? e.img_profile : '<?php echo $_SESSION['profile'] ?>'
                if (e.id) {
                    let date_start = format_date(parseInt(e.date_start))
                    let date_end = format_date(parseInt(e.date_end))
                    html += `
                <div onclick="sendparam('${e.fname + " " + e.lname}','${job_title}','${date_start}','${date_end}','${e.reason}','${check_request(e)}','${myprofile}','${e.files_path ? e.files_path : '' }')" class="avatar-container">
                    <div class="avatar-bg-img" style="margin-right: 5px;">
                        <img style="height: 100%;" src="${myprofile}" alt="">
                    </div>
                    <div class="avatar-box-cp">
                        <div class="fs-14px fw-500">${check_request(e)}</div>
                        <div class="fs-12px fw-400 f-color-gray">${e.reason}</div>
                        <div class="fs-12px fw-400 mt-10 f-color-gray" style="display: flex;">
                            <img style="width:15px;" src="<?= base_url('imgs/calendar.svg') ?>" alt="">
                            <span style="margin-left: 5px;">${date_start} - ${date_end}</span>
                        </div>
                        ${check_status(e.approve_status)}
                    </div>
                </div>
                `
                }

            });
            mydoc.innerHTML = html
        } else if (value === 'cancel') {
            data = LIST_MYDOCUMENT_DATA;
            let html = ``;
            const check_status = (value) => {
                if (value === 'inprogress') {
                    return `<div class="fs-12px fw-400 f-color-gray" style="display: flex; justify-content: end;">
                            <span class="inprogress">Inprogress</span>
                        </div>`
                } else if (value === 'approved') {
                    return `<div class="fs-12px fw-400 f-color-gray" style="display: flex; justify-content: end;">
                            <span class="approved fs-12px flex-middle-box">Approved</span>
                        </div>`
                } else {
                    return ` <div class="fs-12px fw-400 mt-10 f-color-gray" style="display: flex; justify-content: end;">
                            <span class="cancel fs-12px flex-middle-box">cancel</span>
                        </div>`
                }
            }
    
            data = data.filter(data => data.approve_status === 'cancel')
            data.forEach(e => {
                console.log(e)
                myprofile =  myprofile = e.type_request_name === 'shift' ? e.img_profile : '<?php echo $_SESSION['profile'] ?>'
                if (e.id) {
                    let date_start = format_date(parseInt(e.date_start))
                    let date_end = format_date(parseInt(e.date_end))
                    html += `
                <div onclick="sendparam('${e.fname + " " + e.lname}','${job_title}','${date_start}','${date_end}','${e.reason}','${check_request(e)}','${myprofile}','${e.files_path ? e.files_path : '' }')" class="avatar-container">
                    <div class="avatar-bg-img" style="margin-right: 5px;">
                        <img style="height: 100%;" src="${myprofile}" alt="">
                    </div>
                    <div class="avatar-box-cp">
                        <div class="fs-14px fw-500">${check_request(e)}</div>
                        <div class="fs-12px fw-400 f-color-gray">${e.reason}</div>
                        <div class="fs-12px fw-400 mt-10 f-color-gray" style="display: flex;">
                            <img style="width:15px;" src="<?= base_url('imgs/calendar.svg') ?>" alt="">
                            <span style="margin-left: 5px;">${date_start} - ${date_end}</span>
                        </div>
                        ${check_status(e.approve_status)}
                    </div>
                </div>
                `
                }

            });
            mydoc.innerHTML = html
        } else {
            let data = LIST_MYDOCUMENT_DATA;
            let html = ``;
            const check_status = (value) => {
                if (value === 'inprogress') {
                    return `<div class="fs-12px fw-400 f-color-gray" style="display: flex; justify-content: end;">
                            <span class="inprogress">Inprogress</span>
                        </div>`
                } else if (value === 'approved') {
                    return `<div class="fs-12px fw-400 f-color-gray" style="display: flex; justify-content: end;">
                            <span class="approved fs-12px flex-middle-box">Approved</span>
                        </div>`
                } else {
                    return ` <div class="fs-12px fw-400 mt-10 f-color-gray" style="display: flex; justify-content: end;">
                            <span class="cancel fs-12px flex-middle-box">cancel</span>
                        </div>`
                }
            }
            
            data.forEach(e => {
                console.log(e)
                myprofile =  myprofile = e.type_request_name === 'shift' ? e.img_profile : '<?php echo $_SESSION['profile'] ?>'
                if (e.id) {
                    let date_start = format_date(parseInt(e.date_start))
                    let date_end = format_date(parseInt(e.date_end))
                    html += `
                <div onclick="sendparam('${e.fname + " " + e.lname}','${job_title}','${date_start}','${date_end}','${e.reason}','${check_request(e)}','${myprofile}','${e.files_path ? e.files_path : '' }')" class="avatar-container">
                    <div class="avatar-bg-img" style="margin-right: 5px;">
                        <img style="height: 100%;" src="${myprofile}" alt="">
                    </div>
                    <div class="avatar-box-cp">
                        <div class="fs-14px fw-500">${check_request(e)}</div>
                        <div class="fs-12px fw-400 f-color-gray">${e.reason}</div>
                        <div class="fs-12px fw-400 mt-10 f-color-gray" style="display: flex;">
                            <img style="width:15px;" src="<?= base_url('imgs/calendar.svg') ?>" alt="">
                            <span style="margin-left: 5px;">${date_start} - ${date_end}</span>
                        </div>
                        ${check_status(e.approve_status)}
                    </div>
                </div>
                `
                }

            });
            mydoc.innerHTML = html
        }
    }
    let LIST_MYDOCUMENT_DATA = ''
    var job_title = ''
    redner_mydoc()
    const check_request = (obj) => {
                        if (obj.type_request_name === 'leave') {
                            return obj.leave_type
                        } else if (obj.type_request_name === 'overtime') {
                            return obj.type_request_name
                        } else if (obj.type_request_name === 'document') {
                            return obj.type
                        } else if (obj.type_request_name === 'offsite_work') {
                            return 'offsite work'
                        } else if (obj.type_request_name === 'shift') {
                            return 'shift'
                        } else {
                            return '???'
                        }
                    }
    async function redner_mydoc() {
        document.querySelector(".loader-wrapper").classList.add("active");
        let headersList = {
            "Accept": "*/*",
            "Content-Type": "application/json"
        }

        let bodyContent = JSON.stringify({
            "token": "<?php echo  $token ?>"
        });

        let response = await fetch(ENDPOINT + "mobile/list_mydocument", {
            method: "POST",
            body: bodyContent,
            headers: headersList
        });

        let data = await response.json();
        console.log(data)
        job_title = data.job_title
        data = data.data;
        LIST_MYDOCUMENT_DATA = data;
        let html = ``;
        const check_status = (value) => {
            if (value === 'inprogress') {
                return `<div class="fs-12px fw-400 f-color-gray" style="display: flex; justify-content: end;">
                            <span class="inprogress">Inprogress</span>
                        </div>`
            } else if (value === 'approved') {
                return `<div class="fs-12px fw-400 f-color-gray" style="display: flex; justify-content: end;">
                            <span class="approved fs-12px flex-middle-box">Approved</span>
                        </div>`
            } else {
                return ` <div class="fs-12px fw-400 mt-10 f-color-gray" style="display: flex; justify-content: end;">
                            <span class="cancel fs-12px flex-middle-box">cancel</span>
                        </div>`
            }
        }
       
        data.forEach(e => {
            myprofile = e.type_request_name === 'shift' ? e.img_profile : '<?php echo $_SESSION['profile'] ?>'
            if (e.id) {
                let date_start = format_date(parseInt(e.date_start))
                let date_end = format_date(parseInt(e.date_end))
                html += `
                <div onclick="sendparam('${e.fname + " " + e.lname}','${job_title}','${date_start}','${date_end}','${e.reason}','${check_request(e)}','${myprofile}','${e.files_path ? e.files_path : '' }')" class="avatar-container">
                    <div class="avatar-bg-img" style="margin-right: 5px;">
                        <img style="height: 100%;" src="${myprofile}" alt="">
                    </div>
                    <div class="avatar-box-cp">
                        <div class="fs-14px fw-500">${check_request(e)}</div>
                        <div class="fs-12px fw-400 f-color-gray">${e.reason}</div>
                        <div class="fs-12px fw-400 mt-10 f-color-gray" style="display: flex;">
                            <img style="width:15px;" src="<?= base_url('imgs/calendar.svg') ?>" alt="">
                            <span style="margin-left: 5px;">${date_start} - ${date_end}</span>
                        </div>
                        ${check_status(e.approve_status)}
                    </div>
                </div>
                `
            }

        });
        mydoc.innerHTML = html
        document.querySelector(".loader-wrapper").classList.remove("active");
    }

    function format_date(timestamp) {
        const date = new Date(timestamp);
        const formattedDate = date.toLocaleDateString('en-US');
        // console.log(formattedDate); // Output: "4/9/2023"
        return formattedDate
    }

    function sendparam(fullname, job_title, date_start, date_end, about, type, img, file_path) {
        //หาจำนวนวัน
        const date1 = new Date(date_start);
        const date2 = new Date(date_end);
        const diffInTime = date2.getTime() - date1.getTime();
        const diffInDays = diffInTime / (1000 * 3600 * 24);
        betw_day.innerText = diffInDays + 1
        console.log(date_start, date_end)
        document.getElementById('detail_modal').style.display = 'block'
        fname_detail.innerText = fullname
        job_detail.innerText = job_title
        type_request.innerText = type
        date_detail.innerText = date_start + ' - ' + date_end
        reason_detail.innerText = about
        myimg.src = img
        console.log(file_path.split(','))
        let img_document = file_path.split(',')
        let file_preview_HTML = ''

        const checkfile_img = (e) => {
            const base_url = ENDPOINT
            let src = base_url + e
            if (e.includes('pdf')) {
                src = '<?= base_url('imgs/pdf-file.svg') ?>'
                return src
            } else {
                return src
            }
        }

        const base_url = ENDPOINT
        if (img_document[0]) {
            img_document.forEach(e => {
                console.log('img_doc arr', checkfile_img(e))
                file_preview_HTML += `
            <div onclick="open_link('${base_url + e}')">
                <div style="width: 160px;height: 100.94px;" class="mybox-shadow flex-middle-box">
                    <img style = "width: 70px;" src="${checkfile_img(e)}" alt="doc_file">
                </div>
            </div>
            `
            })
        }

        show_files.innerHTML = file_preview_HTML;

    }
    const open_link = (url) => {
        window.open(url, '_blank');
    }

    function close_modal() {
        detail_modal.style.display = 'none'
    }
    
</script>

</html>