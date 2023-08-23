<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permission</title>
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
        </div>
    </div>

    <div id="overlay_role" class="hidden fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-75">
        <div class="bg-white p-6 rounded shadow-lg">
            <h2 class="text-lg font-semibold mb-4">Update Role</h2>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Select Role:</label>
                <select id="so_role" class="form-select mt-1 block w-full" name="role">
                    <option value="0">select role</option>
                    <option value="admin">Admin</option>
                    <option value="manager">Manager</option>
                    <option value="user">user</option>
                </select>
            </div>
            <div class="flex justify-end">
                <button onclick="update_role()" type="button" class="px-4 py-2 bg-green-500 text-white rounded mr-2">Confirm</button>
                <button onclick="close_overlay_role()" type="button" class="px-4 py-2 bg-red-500 text-white rounded">Cancel</button>
            </div>
        </div>
    </div>

</body>

</html>

<script>
    let ENDPOINT = window.API_URL;

    let DATA_EMPLOYEE = ''
    render_em()
    async function render_em() {
        document.querySelector(".loader-wrapper").classList.add("active");
        let headersList = {
            "Accept": "*/*",
            "Content-Type": "application/json"
        }

        let bodyContent = JSON.stringify({
            "token": '<?php echo $_SESSION['token']; ?>'
        });

        let response = await fetch(ENDPOINT + "mobile/getEmployeeAllBusiness/admin", {
            method: "POST",
            body: bodyContent,
            headers: headersList
        });

        let data = await response.json();
        DATA_EMPLOYEE = data
        let msg = data.msg
        let emp = data.data
        html_own = '';
        if (msg == "good") {
            //render my own
            emp.forEach(e => {
                let src_image = e.img_profile
                if (e.img_profile == null || e.img_profile == "") {
                    src_image = "<?= base_url('imgs/Mask1.svg') ?> ";
                }

                html_own += `
            <div onclick="sendUserId(${e.eid})" class="avatar-container">
                    <div class="avatar-bg-img" style="margin-right: 5px;">
                        <img style="height: 50px;width: 50px;" src="${src_image}" alt="">
                    </div>
                    <div class="avatar-box-cp">
                        <div class="fs-14px fw-500">${e.fname}</div>
                        <div class="fs-12px fw-400 f-color-gray">role : ${e.role}</div>
                    </div>
                </div>
            `
            });
            own_team.innerHTML = html_own
            document.querySelector(".loader-wrapper").classList.remove("active");
        } else {
            document.querySelector(".loader-wrapper").classList.remove("active");
            own_team.innerHTML = html_own
            //  window.location.href = "<?php echo base_url('/menu/admin') ?>";
        }
    }
    let eid_global = ''

    function close_overlay_role() {
        document.getElementById('overlay_role').classList.add('hidden')
        document.getElementById('so_role').value = "0"
        eid_global = ''
    }
    async function update_role() {
        try {
            let headersList = {
                "Accept": "*/*",
                "Content-Type": "application/json"
            }
            let role = document.getElementById('so_role').value
            if (role == '0') {
                return alert('please select role')
            }
            let bodyContent = JSON.stringify({
                "token": '<?php echo $_SESSION['token']; ?>',
                "role": role,
                "eid": eid_global
            });

            let response = await fetch(ENDPOINT + "mobile/edit-role", {
                method: "POST",
                body: bodyContent,
                headers: headersList
            });

            let data = await response.json();
            let msg = data.msg
            if (msg == 'good') {
                window.location.reload()
            } else {
                window.location.reload()
            }
        } catch (err) {
            console.log(err)
            alert('err')
        }
    }

    function search_render() {
        let val = event.target.value
        console.log('val', val)
        data = DATA_EMPLOYEE
        let msg = data.msg
        let emp = data.data
        let emp_filter = emp.filter(d => d.fname.includes(val) || d.role.includes(val))
        console.log('emp_filter', emp_filter)
        html_own = '';
        if (msg == "good") {
            //render my own
            emp_filter.forEach(e => {
                let src_image = e.img_profile
                if (e.img_profile == null || e.img_profile == "") {
                    src_image = "<?= base_url('imgs/Mask1.svg') ?> ";
                }

                html_own += `
            <div onclick="sendUserId(${e.eid})" class="avatar-container">
                    <div class="avatar-bg-img" style="margin-right: 5px;">
                        <img style="height: 50px;width: 50px;" src="${src_image}" alt="">
                    </div>
                    <div class="avatar-box-cp">
                        <div class="fs-14px fw-500">${e.fname}</div>
                        <div class="fs-12px fw-400 f-color-gray">role : ${e.role}</div>
                    </div>
                </div>
            `
            });
            own_team.innerHTML = html_own
            document.querySelector(".loader-wrapper").classList.remove("active");
        } else {
            document.querySelector(".loader-wrapper").classList.remove("active");
            own_team.innerHTML = html_own
            //  window.location.href = "<?php echo base_url('/menu/admin') ?>";
        }
    }

    function sendUserId(userId) {
        var currentUrl = "<?php echo base_url('/profile/id') ?>"
        var newUrl = currentUrl + '?id=' + userId;
        window.location.href = newUrl;
    }
</script>