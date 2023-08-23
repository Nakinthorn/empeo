<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <?php echo "<script src='".base_url('./backoffice_static/config.js')."'></script>"; ?>
    <title>profile</title>
</head>
<style>
    body {
        padding: 0;
        margin: 0;
        background: #608DFF;

    }

    .mybody {
        /* width: 100%; */
        height: 90vh;

    }

    .myadjust {
        background: white;
        border-radius: 40px 40px 0 0;
        padding: 16px;
        height: 90vh;
    }

    .profile-box1 {
        /* border: 1px solid black; */
        height: 83px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .circle {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        border: 2px solid white;
        display: flex;
        align-items: center;
        justify-content: center;
        max-width: none;
    }

    .circle-team {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        border: 2px solid white;
        display: flex;
        align-items: center;
        justify-content: center;
        max-width: none;
    }

    .box1 {
        /* width: 20%; */
    }

    .box2 {
        width: 60%;
        padding: 15px;
    }

    .box3 {
        display: flex;
        justify-content: center;
        width: 15%;
    }

    .content-profile {
        /* height: 70px; */
        margin-top: 5px;
    }

    .grid-container {
        display: grid;
        grid-template-columns: 50% 50%;
        grid-template-rows: 33.33% 33.33% 33.33%;
        row-gap: 3px;
    }

    .avatar-card {
        height: 85%;
        width: 100px;
        box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        margin-right: 16px;
        padding: 8px;
    }

    .avatar-bg-img {
        width: 100%;
        aspect-ratio: 1 / 1;
        background: #E6EDFd;
        border-radius: 8px;
        position: relative;
        display: inline-flex;
        justify-content: center;
        align-items: center;
    }
</style>
<link rel="stylesheet" type="text/css" href="<?= base_url('/css/global.css'); ?>">

<body>
    <div class="mybody myadjust font-noto" style="background: #FFFFFF;">
        <div class="profile-box1">
            <div class="box1 circle">
                <img id="my_profile" class="circle" style="object-fit: contain; width: 100px;" src="" alt="">
            </div>
            <div class="box2">
                <div id="fname_lname" class="fs-16px fw-500">xxxx</div>
                <div id="position_name" class="fs-12px f-color-gray">22222</div>
            </div>
            <div class="box3">

                <a id="tel-icon" href="tel: ">
                    <img src="<?= base_url('/imgs/call-calling.svg') ?>" alt="">
                </a>

            </div>
        </div>
        <div class="content-profile">
            <div class="fs-14px fw-400 mt-10">
                <img style="margin-right: 10px;display: inline;" src="<?= base_url('/imgs/sms.svg') ?>" alt="">
                <span id="sms"></span>
            </div>
            <div class="fs-12px fw-400 mt-10">
                <img style="margin-right: 10px;display: inline;" src="<?= base_url('/imgs/call2.svg') ?>" alt="">
                <span id="tel01"></span>
            </div>
            <div style="margin: 10px 0;border: 1px solid #C2C2C2;"></div>
        </div>
        <div class="fs-16px fw-500">Information</div>
        <div class="mt-10 grid-container">
            <div>
                <div class="fs-14px f-color-gray">Accounting</div>
                <div id="com_name"></div>
            </div>
            <div>
                <div class="fs-14px f-color-gray">Employee Code</div>
                <div id="emp_code">#</div>
            </div>
            <div>
                <div class="fs-14px f-color-gray">Direct Report</div>
                <div id="supervisor">

                </div>
            </div>
            <div>
                <div class="fs-14px f-color-gray">Shift</div>
                <div>10.00 AM-19.00 PM</div>
            </div>
            <div>
                <div class="fs-14px f-color-gray">Birth Date</div>
                <div id="birth_date01"></div>
            </div>
            <div>
                <div class="fs-14px f-color-gray">Work Doration</div>
                <!-- <div>19/10/2521 (1y4m 19d)</div> -->
                <div id="hire_date"></div>
            </div>
        </div>
        <div style="margin-top: 50px;">
            <div style="display: flex; align-items: center;justify-content: space-between;">
                <div class="fw-600 fs-16px">Colleagues</div>
                <div class="fw-500 fs-12px f-color-gray" style="text-decoration-line: underline;" onclick="window.location.href = '<?= base_url("choose_people") ?>' ">View all</div>
            </div>
        </div>
        <div style="display: flex;height: 200px; overflow: scroll; margin: 10px 0; padding: 15px 0;">
            <div style="width: 10px;">

            </div>
            <div id="team" style="display: flex">

            </div>
            <!-- <div class="avatar-card">
                <div class="avatar-bg-img">
                    <img style="height: 70%;" src="<?= base_url('imgs/Mask1.svg') ?>" alt="">
                    <img style="    
                    position: absolute;
                    right: -20px;
                    top: -22px;
                    height: 30px;" src="<?= base_url('/imgs/crown.svg') ?>" alt="">
                </div>
                <div class="fs-16px fw-500">
                    Pimchanok
                </div>
                <div class="fs-16px fw-400 f-color-gray">
                    SA
                </div>
            </div>
            <div class="avatar-card">
                <div class="avatar-bg-img">
                    <img style="height: 70%;" src="<?= base_url('imgs/Mask1.svg') ?>" alt="">
                </div>
                <div class="fs-16px fw-500">
                    Pimchanok
                </div>
                <div class="fs-16px fw-400 f-color-gray">
                    SA
                </div>
            </div>
            <div class="avatar-card">
                <div class="avatar-bg-img">
                    <img style="height: 70%;" src="<?= base_url('imgs/Mask1.svg') ?>" alt="">
                </div>
                <div class="fs-16px fw-500">
                    Pimchanok
                </div>
                <div class="fs-16px fw-400 f-color-gray">
                    SA
                </div>
            </div> -->
        </div>
    </div>
</body>
<script>
    function sendparam(id) {
        // var id = 3; // Value of the parameter
        var url = '/profile?id=' + id; // Append the parameter to the URL
        window.location.href = url;
    }
    let obj_detail = <?php echo isset($employee_data['obj_detail']) ? $employee_data['obj_detail'] : "{}"; ?>;
    let emp_no = obj_detail.employee_no ? '#' + obj_detail.employee_no : '-'
    document.getElementById('emp_code').innerText = emp_no
    // console.log(obj_detail)

    function hasIdParam() {
        // Get the current URL search parameters
        const params = new URLSearchParams(window.location.search);

        // Check if the "id" parameter exists in the search parameters
        return params.has('id');
    }
    function getParamId() {
    // Get the current URL search parameters
    const params = new URLSearchParams(window.location.search);
    
    // Get the value of the "id" parameter if it exists, otherwise return null
    return params.get('id');
}

</script>

<script>
    let ENDPOINT = window.API_URL;

    render_info_emp()
    async function render_info_emp() {
        try {
            let ie_type = hasIdParam() ? 'byid' : ''
            let param_id = hasIdParam() ? parseInt(getParamId()) : 0
            let headersList = {
                "Accept": "*/*",
                "Content-Type": "application/json"
            }

            let bodyContent = JSON.stringify({
                "token": "<?php echo $_SESSION['token'] ?>",
                "type" : ie_type,
                where_id : param_id

            });
            document.querySelector(".loader-wrapper").classList.add("active");

            let response = await fetch(ENDPOINT + "mobile/GET-EMPLOYEE", {
                method: "POST",
                body: bodyContent,
                headers: headersList
            });

            let data = await response.json();
            let result = data
            console.log('result :', result)

            let team = data.team
            let info = data.data.emp
            let position = data.data.position
            let company = data.company
            let supervisor = data.data.supervisor
            console.log('company : ', company)
            document.getElementById('my_profile').src = !info.img_profile || '-' ? '<?= base_url('/imgs/Mask1.svg') ?>' : info.img_profile
            console.log('name', info.fname + ' ' + info.lname + info.nickname ? '' : `(${info.nickname})`)
            document.getElementById('fname_lname').innerText = `${info.fname} ${info.lname}${info.nickname ? "(" +info.nickname + ")" :'' }`
            document.getElementById('position_name').innerText = position.name_th ? position.name_th : '-'
            document.getElementById('emp_code').innerText = '#' + (info.emp_code ? info.emp_code : '-')
            document.getElementById('tel-icon').href = 'tel:' + (info.contact_info ? info.contact_info : '#')
            document.getElementById('tel01').innerText = (info.contact_info ? info.contact_info : '-')
            document.getElementById('sms').innerText = position.email ? position.email : '-'
            document.getElementById('com_name').innerText = company.com_name
            let s_v = supervisor.fname ? supervisor.fname  + ' ' + supervisor.lname : '-'
            document.getElementById('supervisor').innerText = s_v
            document.getElementById('birth_date01').innerText = info.date_of_birth ? formatDateAndAge(info.date_of_birth) : '-'
            document.getElementById('hire_date').innerText = info.hire_date ? formatDateDuration(info.hire_date) : '-'
            let html = ''

            team.forEach(e => {
                let crownimage = '<?= base_url('/imgs/crown.svg') ?>'
                let mask = '<?= base_url('/imgs/Mask1.svg') ?>'
                let avatar = team.img_profile ? team.img_profile : mask
                html += `
                <div class="avatar-card" onclick="sendparam(${e.eid})">
                    <div class="avatar-bg-img">
                        <img class="circle-team" style="" src="${avatar}" alt="">
                    </div>
                    <div class="fs-16px fw-500">
                    ${e.fname}
                    </div>
                    <div class="fs-10px fw-400 f-color-gray">
                  ${e.dpname}
                    </div>
                </div>
                `
            });
            document.getElementById('team').innerHTML = html
            document.querySelector(".loader-wrapper").classList.remove("active");
        } catch (error) {
            console.log(error)
        }

    }

    function formatDateAndAge(dateString) {
        const inputDate = new Date(dateString);
        const today = new Date();

        const day = inputDate.getDate().toString().padStart(2, '0');
        const month = (inputDate.getMonth() + 1).toString().padStart(2, '0');
        const year = inputDate.getFullYear();

        const formattedDate = `${day}/${month}/${year}`;

        const ageInMilliseconds = today - inputDate;
        const ageInYears = Math.floor(ageInMilliseconds / (365.25 * 24 * 60 * 60 * 1000));

        return `${formattedDate} (${ageInYears}y)`;
    }

    function formatDateDuration(dateString) {
        const inputDate = new Date(dateString);
        const today = new Date();

        const day = inputDate.getDate().toString().padStart(2, '0');
        const month = (inputDate.getMonth() + 1).toString().padStart(2, '0');
        const year = inputDate.getFullYear();

        const formattedDate = `${day}/${month}/${year}`;

        let years = today.getFullYear() - inputDate.getFullYear();
        let months = today.getMonth() - inputDate.getMonth();
        let days = today.getDate() - inputDate.getDate();

        if (months < 0 || (months === 0 && days < 0)) {
            years--;
            months += 12;
        }

        if (days < 0) {
            const daysInLastMonth = new Date(today.getFullYear(), today.getMonth(), 0).getDate();
            days += daysInLastMonth;
            months--;
        }

        return `${formattedDate} (${years}y ${months}m ${days}d)`;
    }

    const inputDate = "1999-09-15";
    const formattedDateDuration = formatDateDuration(inputDate);
    console.log(formattedDateDuration); // Output: "15/09/1999 (23y 10m 20d)" (depending on the current date)
</script>

</html>