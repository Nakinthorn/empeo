<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <?php echo "<script src='".base_url('./backoffice_static/config.js')."'></script>"; ?>
    <title>Profile</title>
</head>
<style>
    body {
        padding: 0;
        margin: 0;
        background: #608DFF;
    }

    .mybody {
        height: 90vh;
    }

    .myadjust {
        background: white;
        border-radius: 40px 40px 0 0;
        padding: 16px;
        height: 90vh;
    }

    .profile-box1 {
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
                <img class="circle" style="object-fit: contain; width: 100px;" src="<?php echo $employee_data['img_profile']; ?>" alt="">
            </div>
            <div class="box2">
                <div class="fs-16px fw-500"><?php echo $employee_data['fname']; ?> <?php echo $employee_data['lname']; ?></div>
                <div class="fs-12px f-color-gray"><?php echo $employee_data['job']; ?></div>
            </div>
            <div class="box3">

                <a href="tel: <?php echo $employee_data['contact_info']; ?>">
                    <img src="<?= base_url('/imgs/call-calling.svg') ?>" alt="">
                </a>

            </div>
        </div>
        <div class="content-profile">
            <div class="fs-14px fw-400 mt-10">
                <img style="margin-right: 10px;display: inline;" src="<?= base_url('/imgs/sms.svg') ?>" alt="">
                <span><?php echo $my_email ?></span>
            </div>
            <div class="fs-12px fw-400 mt-10">
                <img style="margin-right: 10px;display: inline;" src="<?= base_url('/imgs/call2.svg') ?>" alt="">
                <span><?php echo $employee_data['contact_info']; ?></span>
            </div>
            <div style="margin: 10px 0;border: 1px solid #C2C2C2;"></div>
        </div>
        <div class="fs-16px fw-500">Information</div>
        <div class="mt-10 grid-container">
            <div>
                <div class="fs-14px f-color-gray">Accounting</div>
                <div>Unit.Co.,Ltd</div>
            </div>
            <div>
                <div class="fs-14px f-color-gray">Employee Code</div>
                <div>#<?php echo $employee_data['eid']; ?></div>
            </div>
            <div>
                <div class="fs-14px f-color-gray">Direct Report</div>
                <div>
                    <?php
                    // echo $direct_report;
                    if ($direct_report == ' ' || $direct_report == '') {
                        echo  '-';
                    } else {
                        echo $direct_report;
                    }
                    ?>
                </div>
            </div>
            <div>
                <div class="fs-14px f-color-gray">Shift</div>
                <div>10.00 AM-19.00 PM</div>
            </div>
            <div>
                <div class="fs-14px f-color-gray">Birth Date</div>
                <div><?php echo $birth_day ?> (<?php echo $age ?> Y)</div>
            </div>
            <div>
                <div class="fs-14px f-color-gray">Work Doration</div>
                <!-- <div>19/10/2521 (1y4m 19d)</div> -->
                <div> <?php echo $hire_date; ?></div>
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

            <?php
            // echo $head['job_title'];
            $crownimage = base_url('/imgs/crown.svg');
            $mask1 = base_url('imgs/Mask1.svg');
            foreach ($head as $value) {
                $avatar = isset($value['img_profile']) ? $value['img_profile'] : $mask1;
                echo <<<HTML
                    <div class="avatar-card" onclick="sendparam({$value['eid']})">
                        <div class="avatar-bg-img">
                            <img class="circle-team" style="" src="{$avatar}" alt="">
                            <img style="position: absolute; right: -20px; top: -22px; height: 30px;" src="{$crownimage}" alt="">
                        </div>
                        <div class="fs-16px fw-500">
                            {$value['fname']}
                        </div>
                        <div class="fs-16px fw-400 f-color-gray">
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
                <div class="avatar-card" onclick="sendparam({$value['eid']})">
                    <div class="avatar-bg-img">
                        <img class="circle-team" style="" src="{$avatar}" alt="">
                    </div>
                    <div class="fs-16px fw-500">
                    {$value['fname']}
                    </div>
                    <div class="fs-16px fw-400 f-color-gray">
                        {$value['job_title']}
                    </div>
                </div>
            HTML;
            } ?>
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
            </div>      -->
        </div>
    </div>
</body>
<script>
    function sendparam(id) {
        // var id = 3; // Value of the parameter
        var url = '/profile/template?id=' + id; // Append the parameter to the URL
        window.location.href = url;
    }
</script>

</html>