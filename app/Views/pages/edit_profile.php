<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>document_detail</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('/css/global.css'); ?>">
    <?php echo "<script src='".base_url('./backoffice_static/config.js')."'></script>"; ?>
</head>
<style>
    .my-body {
        height: 85vh;
        padding: 20px;
    }

    .box2 {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 20px;
    }

    .menu-content {
        margin-top: 20px;
        height: max-content;
        background-color: white;
        padding: 16px;
        gap: 16px;
        border-radius: 24px;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
    }

    img {
        object-fit: none
    }

    body {
        background: #E6EDFF;
    }

    .img-profile {
        object-fit: cover;
        width: 150px;
        height: 150px;
        border-radius: 50%
    }

    .name-profile {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center
    }

    .menu-box {
        display: flex;
        justify-content: space-between
    }

    .menu-detail {
        display: flex;
        justify-items: center;
        padding: 10px
    }
</style>

<body>
    <div class="my-body">
        <div class="box2">
            <div class="circle box1">
                <img class="img-profile" src="<?php echo !empty($_SESSION['profile']) ? $_SESSION['profile'] : base_url('imgs/Mask1.svg'); ?>" alt="">
            </div>
            <div class="name-profile">
                <div class="fs-16px fw-500"><?= esc($name); ?> <?= esc($lname); ?> </div>
                <div id="position_name" class="fs-12px f-color-gray"></div>
            </div>
        </div>

        <div class="menu-content">
            <div class="menu-box" onclick='<?= esc($gotoprofile); ?>'>
                <div class="menu-detail">
                    <img src="<?= base_url('imgs/logo_person.svg') ?>" style="margin-right: 10px;" alt="">
                    <span class="fw-400 fs-16">My Profile</span>
                </div>
                <div class="flex-middle-box">
                    <img src="<?= base_url('/imgs/arrow_left.svg') ?>" alt="">
                </div>
            </div>
            <?php
            if ($_SESSION["role"] == "admin") {
                $manager_logo = base_url('imgs/profile-manager.svg');
                $arrow = base_url('/imgs/arrow_left.svg');
                $goto_admin_menu = "window.open('" . base_url("menu/admin") . "', '_blank');";
                $goto_calendar1 = "window.location.href = " . "'" . base_url("calendar") . "'";

                echo <<< HTML
                        <div class="menu-box" onclick="{$goto_admin_menu}">
                        <div class="menu-detail">
                            <img src="{$manager_logo}" style="margin-right: 10px;" alt="">
                            <span class="fw-400 fs-16">For Admin</span>
                        </div>
                        <div class="flex-middle-box">
                            <img src="{$arrow}" alt="">
                        </div>
                    </div>
                HTML;
            }
            ?>
            <?php
            if ($_SESSION["role"] == "manager" || $_SESSION["role"] == "admin") {
                $manager_logo = base_url('imgs/profile-manager.svg');
                $arrow = base_url('/imgs/arrow_left.svg');
                $goto_manager_doc = "window.location.href = " . "'" . base_url("manager_document") . "'";
                $goto_calendar1 = "window.location.href = " . "'" . base_url("calendar") . "'";

                echo <<< HTML
                        <div class="menu-box" onclick="{$goto_manager_doc}">
                        <div class="menu-detail">
                            <img src="{$manager_logo}" style="margin-right: 10px;" alt="">
                            <span class="fw-400 fs-16">For Manager</span>
                        </div>
                        <div class="flex-middle-box">
                            <img src="{$arrow}" alt="">
                        </div>
                    </div>
                HTML;
            }
            ?>
            <div class="menu-box" onclick="window.location.href = '<?= base_url('my_document') ?>'">
                <div class="menu-detail">
                    <img src="<?= base_url('imgs/folder-open-edit.svg') ?>" style="margin-right: 10px;" alt="">
                    <span class="fw-400 fs-16">My Document</span>
                </div>
                <div class="flex-middle-box">
                    <img src="<?= base_url('/imgs/arrow_left.svg') ?>" alt="">
                </div>
            </div>

            <div class="menu-box" onclick='<?= esc($gotoleave_remain); ?>'>
                <div class="menu-detail">
                    <img src="<?= base_url('imgs/calendar-add-black.svg') ?>" style="margin-right: 10px;" alt="">
                    <span class="fw-400 fs-16">Remaining leave</span>
                </div>
                <div class="flex-middle-box">
                    <img src="<?= base_url('/imgs/arrow_left.svg') ?>" alt="">
                </div>
            </div>
            <div class="menu-box" onclick="window.location.href = '<?= base_url('calendar') ?>'">
                <div class="menu-detail">
                    <img src="<?= base_url('imgs/calendar_black.svg') ?>" style="margin-right: 10px;margin-left: 5px;" alt="">
                    <span class="fw-400 fs-16">Workin</span>
                </div>
                <div class="flex-middle-box">
                    <img src="<?= base_url('/imgs/arrow_left.svg') ?>" alt="">
                </div>
            </div>
            <!-- <div style="display: flex; justify-content:space-between;">
                <div style="display: flex; justify-items: center; padding: 10px;">
                    <img src="<?= base_url('imgs/menu_last.svg') ?>" style="margin-right: 10px;" alt="">
                    <span class="fw-400 fs-16">Summary</span>
                </div>
                <div class="flex-middle-box">
                    <img src="<?= base_url('/imgs/arrow_left.svg') ?>" alt="">
                </div>
            </div> -->
        </div>
    </div>

    <footer style="background-color:  rgba(255, 255, 255, 0);">
        <div class='btn' style="" onclick="<?= $logout ?>">logout</div>
    </footer>

</body>

</html>
<script>
    let ENDPOINT = window.API_URL;

    get_emp() 
    async function get_emp() {
        let headersList = {
            "Accept": "*/*",
            "User-Agent": "Thunder Client (https://www.thunderclient.com)",
            "Content-Type": "application/json"
        }

        let bodyContent = JSON.stringify({
            "token": "<?php echo $_SESSION['token']?>"
        });

        let response = await fetch(ENDPOINT + "mobile/GET-EMPLOYEE", {
            method: "POST",
            body: bodyContent,
            headers: headersList
        });

        let data = await response.json();
        console.log(data);
        let position_name = data.data.position.name_th
        document.getElementById('position_name').innerText = position_name
    }
</script>