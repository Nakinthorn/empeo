<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="stylesheet" href="./css/global.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" type="text/css" href="<?= base_url('/css/global.css'); ?>">
    <?php echo "<script src='".base_url('./backoffice_static/config.js')."'></script>"; ?>

</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:wght@200;400;500;800&display=swap');
    body {
        background-color: #E6EDFF;
        margin: 0;
        padding: 0;
        font-family: "Inter", sans-serif;
    }

    .box2 {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 20px;
    }

    .mybox-shadow {
        box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1);
        -webkit-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1);
        -moz-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1);
    }

    .menu-content {
        margin-top: 20px;
        background-color: white;
        gap: 16px;
        border-radius: 24px;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        margin: 20px;
        padding: 20px;
    }
    .switch-container {
        display: flex;
        position: relative;
        justify-content: center;
        align-items: center;
        width: 55px;
        height: 34px;
        margin-top: 14px;
    }
    .switch-container input {
        display: none;
    }
    .switch-container label {
        display: block;
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        border-radius: 34px;
        transition: background-color 0.3s;
        width: 45px;
        height: 20px;
    }
    .switch-container label:before {
        content: '';
        position: absolute;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        top: 2px;
        left: 1px;
        background-color: white;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        transition: all 0.3s;
    }
    .switch-container input:checked + label {
        background-color: #1B4DFF;
    }

    .switch-container input:checked + label:before {
        transform: translateX(26px);
    }
    .switch-lang {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .logout-button {
        display: flex;
        align-items: center;
        justify-items: center;
        background-color: #0063F7;
        color: #ffffff;
        width: 335px;
        height: 56px;
        border-radius: 16px;    
    }
</style>
<body>
    <div class="menu-content">
        <div style="display:flex;">
            <div style="display: flex; justify-items: center; padding: 10px; margin-right: 30vw;">
                <img src="<?= base_url('imgs/translate_settings.svg') ?>" style="margin-right: 10px;" alt="">
                <span class="fw-400 fs-16">Languages</span>
            </div>
            <div class="switch-container">
                <input type="checkbox" id="switch">
                <label for="switch"></label>
            </div>
            <p class="switch-lang">TH</p>
        </div>

        <!-- <div style="display: flex; justify-content:space-between;margin-right: 5px;" onclick="window.location.href = '<?= base_url('pin')?>'" >
            <div style="display: flex; justify-items: center; padding: 10px;">
                <img src="<?= base_url('imgs/lock_settings.svg') ?>" style="margin-right: 10px;" alt="">
                <span class="fw-400 fs-16">Pin</span>
            </div>
            <div class="flex-middle-box">
                <img src="<?= base_url('/imgs/arrow_left.svg') ?>" alt="">
            </div>
        </div> -->

        <div style="display: flex; justify-content:space-between;margin-right: 5px;" onclick="window.location.href = '<?= base_url('change_password')?>'" >
            <div style="display: flex; justify-items: center; padding: 10px;">
                <img src="<?= base_url('imgs/key-settings.svg') ?>" style="margin-right: 10px;" alt="">
                <span class="fw-400 fs-16">Password</span>
            </div>
            <div class="flex-middle-box">
                <img src="<?= base_url('/imgs/arrow_left.svg') ?>" alt="">
            </div>
        </div>
        <div style="display: flex; justify-content:space-between;margin-right: 5px;" onclick="window.location.href = '<?= base_url('edit_myprofile')?>'" >
            <div style="display: flex; justify-items: center; padding: 10px;" >
                <img src="<?= base_url('imgs/profile-manager.svg'); ?>" style="margin-right: 10px;" alt="">
                <span class="fw-400 fs-16">Edit Profile</span>
            </div>
            <div class="flex-middle-box">
                <img src="<?= base_url('/imgs/arrow_left.svg') ?>" alt="">
            </div>
        </div>

    </div>
    
    
    <div style="display: flex; align-items: center; justify-content: center; margin-top: 53vh;" onclick="window.location.href='<?php echo base_url('login'); ?>'">
        <div class="logout-button" style="display: flex; align-items: center; justify-content: center;">
            <img src="<?= base_url('imgs/logout_settings.svg') ?>" style="margin-right: 10px;" alt="">
            <span class="fw-400 fs-16">Logout</span>
        </div>
    </div>

    <script>
        const checkbox = document.getElementById('switch');
        const langText = document.querySelector('.switch-lang');

        checkbox.addEventListener('click', function() {
            if (checkbox.checked) {
                langText.innerText = 'EN';
            } else {
                langText.innerText = 'TH';
            }
        });

    </script>
</body>
</html>