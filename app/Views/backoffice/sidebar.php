<link rel="stylesheet" type="text/css" href='<?= base_url('css/global_hrm.css') ?>'>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.0.7/css/boxicons.min.css">

<div id="divmenu" class="div_menu">
    <div class="font_size_icon div_menu_left" style="font-size: 1.9vw;">
        <!-- <div class="flex_center div_icon_menu_logo"><img id="noom" src="https://media.discordapp.net/attachments/1065176955445587988/1123534910381117491/350885243_2871046769695349_6895795451906942072_n.jpg?width=372&height=580" alt="" style="width: 70%; transition: 1s;"></div> -->
        <!-- <div class="flex_center div_icon_menu" onclick="open_tap_info()"><i class='bx bx-first-page'style="cursor: pointer;"></i></div> -->
        <div onclick="location.href='dashboard'" class="flex_center div_icon_menu"><i class='bx bx-home'></i></div>
        <div class="flex_center div_icon_menu"><i class='bx bx-food-menu'></i></div>
        <div class="flex_center div_icon_menu"><i class='bx bx-group'></i></div>
        <div class="flex_center div_icon_menu"><i class='bx bx-library'></i></div>
        <!-- <div onclick="location.href='add-period.html'" class="flex_center div_icon_menu"><i class='bx bx-dollar-circle'></i></div> -->
        <div onclick="location.href='pay-period'" class="flex_center div_icon_menu"><i class='bx bx-dollar-circle'></i></div>

        <div class="flex_center div_icon_menu"><i class='bx bx-bar-chart-alt'></i></div>
        <div onclick="location.href='setup'" class="flex_center div_icon_menu"><i class='bx bx-cog'></i></div>
        <div class="flex_center div_icon_menu"><i class='bx bx-question-mark'></i></div>
        <div onclick="logout();" class="flex_center div_icon_menu"><img src="<?php echo base_url('imgs/logout.png'); ?>" style="width: 35%;"></div>

    </div>

    <script>
        function logout() {
            localStorage.removeItem('token');
            location.href = "login";
        }
    </script>

</div>