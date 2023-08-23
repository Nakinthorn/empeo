<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="icon" href="https://media.discordapp.net/attachments/1065176955445587988/1123534910381117491/350885243_2871046769695349_6895795451906942072_n.jpg?width=372&height=580"> -->

    <title>Master Home</title>

    <!-- CSS -->
    <link rel="stylesheet" href="./global.css">
    <script src="./global.js"></script>

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Swal2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.11/sweetalert2.all.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js" integrity="sha512-E8QSvWZ0eCLGk4km3hxSsNmGWbLtSCSUcewDQPQWZF6pEU8GlT8a5fF32wOl1i8ftdMhssTrF/OhyGWwonTcXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!-- CSS -->
    <link rel="stylesheet" href="./global_hrm.css" />

    <!-- Global JS -->
    <script src='./global_js.js'></script>
    <!-- This css font  -->
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300;400;500&family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="master_home.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<style>
    * {
        margin: 0;
        padding: 0;
    }

    .master-home-container {
        padding: 15px;
        margin-left: 27vw;
    }

    .container_master_data {
        display: flex;
        flex-direction: column;
        justify-content: start;
        position: relative;
    }

    .master_home-header {
        width: 100%;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: start;
        padding: 0px 25px;
    }

    .master_home-header-name {
        font-size: 24px;
    }

    .master_home-content {
        /* background-color: #2196F3; */

        height: calc(100% - 60px);
    }

    .master_data_des {
        width: 20%;
    }

    .master_data_status_td {
        width: 100px;
    }

    .state_active_content {
        width: auto;
        height: auto;
        text-align: center;
        font-size: 0.7rem !important;
        border-radius: 17px;
        padding: 2px 10px;

    }

    #state_active {
        color: #00c291;
        background-color: #ccf3e9;
    }

    #state_Inactive {
        color: #ffffff;
        background-color: lightgray;
    }

    #state_unactive {
        color: crimson;
        background-color: #ffe0e0;
    }

    /* td{
    text-align: start;
    vertical-align: top;
  } */
    #master_home-content {
        overflow-y: scroll;
        display: flex;
        gap: 40px;
        flex-wrap: wrap;
        width: 100%;
        height: calc(100% - 120px);
        position: relative;
        /* margin-bottom: 50px; */
        /* padding:15px; */
        /* background-color: red; */
    }

    #content_position-wrapper-position {
        position: relative;
        width: 100%;
        height: calc(100%);
    }

    .master_home-content-item:hover {

        border: 2px solid var(--bg_Thridnary_2);
    }

    .master_home-content-item {
        border: 2px solid #fff;
        cursor: pointer;
        box-sizing: border-box;
        display: flex;
        width: calc(50% - 30px);
        /* width: 25vw; */
        /* height: 20vh; */
        background-color: #fff;
        height: 150px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        position: relative;
        padding: 20px 25px;
    }

    .master_home-content-item-icon {
        /* background-color: #00c291; */
        padding: 0 5px;
        width: 30%;
        display: flex;
        align-items: start;
        justify-content: center;
    }

    .master_home-content-item-icon span {
        /* background-color: var(--bg_Thridnary_2); */
        background-repeat: no-repeat;


        background-image: url("data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath fill-rule='evenodd' clip-rule='evenodd' d='M38.125 20C38.125 30.0102 30.0102 38.125 20 38.125C9.98984 38.125 1.875 30.0102 1.875 20C1.875 9.98984 9.98984 1.875 20 1.875C30.0102 1.875 38.125 9.98984 38.125 20Z' fill='%23F05B2F'/%3E%3Cpath d='M28.303 15.6034L22.9249 10.2253C22.9172 10.2176 22.9089 10.2109 22.9009 10.2036C22.8905 10.194 22.8804 10.1842 22.8695 10.1752C22.8623 10.1693 22.8546 10.1641 22.8471 10.1584C22.8346 10.1488 22.8221 10.139 22.809 10.1302C22.803 10.1262 22.7967 10.1229 22.7907 10.119C22.7754 10.1094 22.7601 10.0998 22.7442 10.0913C22.7399 10.089 22.7354 10.0872 22.731 10.085C22.713 10.0757 22.6948 10.0667 22.676 10.0589C22.6731 10.0577 22.67 10.0568 22.667 10.0556C22.6468 10.0475 22.6262 10.0399 22.6052 10.0335C22.6022 10.0326 22.599 10.032 22.596 10.0311C22.5751 10.025 22.554 10.0195 22.5324 10.0151C22.5256 10.0138 22.5185 10.0132 22.5116 10.012C22.4938 10.0089 22.476 10.0058 22.4578 10.004C22.4323 10.0014 22.4066 10.0001 22.381 10.0001H13.1495C12.7416 10.0005 12.3506 10.1628 12.0621 10.4512C11.7737 10.7396 11.6115 11.1307 11.611 11.5385V28.4616C11.6115 28.8695 11.7737 29.2605 12.0621 29.5489C12.3506 29.8373 12.7416 29.9996 13.1495 30H26.9964C27.4042 29.9996 27.7953 29.8373 28.0837 29.5489C28.3721 29.2605 28.5343 28.8695 28.5348 28.4616V16.1688C28.5349 16.1638 28.5356 16.1589 28.5356 16.1539C28.5356 16.0513 28.5151 15.9496 28.4752 15.8551C28.4352 15.7605 28.3767 15.6749 28.303 15.6034ZM23.1502 24.6154H16.9964C16.7924 24.6154 16.5967 24.5344 16.4525 24.3901C16.3082 24.2459 16.2271 24.0502 16.2271 23.8462C16.2271 23.6422 16.3082 23.4465 16.4525 23.3023C16.5967 23.158 16.7924 23.077 16.9964 23.077H23.1502C23.3542 23.077 23.5499 23.158 23.6941 23.3023C23.8384 23.4465 23.9194 23.6422 23.9194 23.8462C23.9194 24.0502 23.8384 24.2459 23.6941 24.3901C23.5499 24.5344 23.3542 24.6154 23.1502 24.6154ZM23.1502 21.5385H16.9964C16.7924 21.5385 16.5967 21.4575 16.4525 21.3132C16.3082 21.169 16.2271 20.9733 16.2271 20.7693C16.2271 20.5653 16.3082 20.3696 16.4525 20.2254C16.5967 20.0811 16.7924 20.0001 16.9964 20.0001H23.1502C23.3542 20.0001 23.5499 20.0811 23.6941 20.2254C23.8384 20.3696 23.9194 20.5653 23.9194 20.7693C23.9194 20.9733 23.8384 21.169 23.6941 21.3132C23.5499 21.4575 23.3542 21.5385 23.1502 21.5385ZM22.381 16.1539V11.8571L26.6777 16.1539H22.381Z' fill='white'/%3E%3C/svg%3E%0A");
        filter: hue-rotate(150deg) brightness(1);
        background-size: cover;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        color: #fff;
        font-size: 1.75rem;
    }

    .master_home-content-item-detail {
        width: 70%;
        height: 100%;
        display: flex;
        padding: 0 5px;
        flex-direction: column;
        /* background-color: lightgray; */
    }

    .master_home-content-item-detail-name {
        width: auto;
        padding: 5px 0;
        font-size: 1.25rem;
    }

    .master_home-content-item-detail-des {
        /* height: 100%; */
        /* width:auto; */
        color: #838395;
        /* background-color: lightgreen; */
        width: calc(100% - 10px);
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-box-orient: vertical;
    }


    /* AfterClick */
    .content_position-wrapper-position {
        width: 100%;
        display: flex;
        flex-direction: column;
        height: 100%;
        /* background-color: #525260; */
    }

    .content_position-wrapper-position-filter {
        background-color: #fff;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 20px 0;
        font-size: 14px;
    }

    .content_position-wrapper-position-filter div {
        display: flex;
        align-items: center;
    }

    .position-filter-left-menu_input {
        width: 280px;
        border: 1px solid lightgray;
        border-radius: 5px;
        padding: 0 20px;
        height: 40px;
    }

    .position-filter-left-menu_input-textbox input {
        margin-left: 10px;
        border: none;
    }

    .position-filter-left-menu_input-textbox input:focus {
        outline: none;
    }

    .position-filter-left {
        width: 100%;
    }

    .position-filter-right {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: flex-end;
    }

    .position-filter-right div {
        cursor: pointer;
        margin-left: 5px;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid lightgray;
    }

    .table_position-icon,
    .position-filter-right-menu_t {
        display: flex;
        align-items: center;
        justify-content: start;
    }

    .position-filter-right-menu_addposition {
        background-color: var(--bg_Thridnary_2);
        color: #fff;
        box-sizing: border-box;
    }

    .content_position-wrapper-position-table {

        height: calc(100% - 170px);
        position: relative;
    }

    .content_position-wrapper-position-table table {
        width: 100%;
        text-align: left;
        font-size: 14px;
        height: 100%;
    }

    .content_position-wrapper-position-table table thead tr th {
        background-color: #ECECF1;
        box-shadow: 0px 1px 0px rgba(199, 201, 217, 0.45);
        padding: 12px 15px;
        font-weight: 500;
    }

    .content_position-wrapper-position-table table tbody tr td {
        padding: 10px 15px;
        color: #525260;
        font-weight: 300;
    }

    .content_position-wrapper-position-table table tbody tr {
        box-shadow: 0px 1px 0px rgba(199, 201, 217, 0.45);
        background-color: transparent;
    }

    .table-wrapper {
        height: 100%;
        overflow: auto;
    }

    .table-wrapper table {
        border-collapse: collapse;
        width: 100%;
    }

    /* .table-wrapper table td,
  .table-wrapper table th {
    padding: 8px;
  } */

    .table-wrapper thead th {
        position: sticky;
        top: 0;
        background-color: #ffffff;
        z-index: 1;
    }

    .content_overlay {
        display: flex;
        flex-direction: column;
        align-items: start;
        justify-content: space-between;
        width: 100%;
        height: 100%;
    }

    .overlay_items {
        position: relative;
        width: 100%;
        height: auto;
        display: flex;
        flex-direction: column;
        align-items: center;
        /* justify-content: start; */
    }

    .overlay_items>div {
        padding-top: 25px;

        display: flex;
        flex-direction: column;
        width: 100%;

    }

    .overlay_items>div>span {
        font-size: 14px;
        font-weight: 200;
        color: var(--color_Dark_0);
    }

    .overlay_items input,
    .overlay_items textarea,
    .master_group_list-menu {
        font-family: 'kanit', sans-serif;
        font-size: 14px;
        font-weight: 200;
        margin-top: 5px;
        padding: 6px 11px;
        border-radius: 5px;
        border: 1px solid lightgrey;
    }

    .master_data_icon_more {
        /* background-color: red; */
        position: relative;
    }

    .master_data_icon_more span {
        /* opacity: 0%; */
        color: lightgray;
    }

    .master_data_icon_more span:hover {
        opacity: 100%;
        color: var(--bg_Thridnary_2);
    }

    #tr_master_data {
        cursor: pointer;
    }

    .master_group_list-menu {
        cursor:pointer;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .master_data_icon_more-popup {
        position: absolute;
        z-index: 4;
        display: flex;
        flex-direction: column;
        background-color: #fff;
        width: 130px;
        height: auto;

        right: -10px;
        margin: 12px 0;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        padding: 10px;
    }

    .list_inside_master {
        opacity: 100%;
        color: var(--bg_Thridnary_2);
        display: flex;
        align-items: center;
        justify-content: start;
        position: relative;
        z-index: 999;
        padding: 5;
        border-radius: 5px;
    }

    .list_inside_master span {
        color: var(--bg_Thridnary_2);
        opacity: 100%;
        margin-right: 10px;
    }


    .arrow_pop_inside {
        position: absolute;
        z-index: 1;
        transform: rotate(45deg);
        width: 16px;
        height: 16px;
        top: -5px;
        right: 25px;
        background-color: rgb(255, 255, 255);
    }

    #master_group_list-icon span {
        color: lightgray;
        transform: rotate(180deg);
    }

    .position_popup_list {
        position: absolute;
        z-index: 99;
        margin-top: 10px;
        width: 100%;
        height: 350px;
    }

    .arrow_pop {
        position: absolute;
        z-index: 1;
        transform: rotate(45deg);
        width: 16px;
        height: 16px;
        top: -5px;
        left: 50%;
        background-color: rgb(255, 255, 255);
    }

    .container_popup_rank {
        box-sizing: border-box;
        top: 10px;
        width: 100%;
        background-color: #fff;
        padding: 25px 5px;
        font-size: 0.9rem;
        flex-direction: column;
        border-radius: 10px;
        height: 100%;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .content_popup_rank {
        overflow-y: scroll;
    }

    .content_popup_rank ul {
        position: relative;
        top: 0;
        display: flex;
        flex-direction: column;
        align-items: start;
        justify-content: center;
    }

    .content_popup_rank ul li {
        list-style: none;

        box-sizing: border-box;
        font-size: 14px;
        font-weight: 400;
        color: var(--color_Dark_0);
        z-index: 10;
        position: relative;
        padding: 5px 16px;
        width: 100%;
        border-radius: 5px;
        cursor: pointer;
    }

    .content_popup_rank ul li:hover {
        background-color: var(--bg_Thridnary_2);
        color: #fff;
    }
    #btn_cancel_data {
        cursor: pointer;
    }
    #btn_submit_data {
        cursor: pointer;
    }
</style>

<body style="overflow: hidden;">
    <?php include 'sidebar.php'; ?>
    <?php include 'navbar.php'; ?>
    <?php include 'setup-menu.php'; ?>


    <!-- Page content goes here -->
    <div class="master-home-container">
        <div style="display: flex; height: 100vh;">
            <div style="width: calc(100% - 60px);">
                <!--  -->
                <div>
                    <div style="width: 100%; height: calc(100vh - 60px); display: flex;">

                        <div id="blur_bg" class="" style="width: 100%; height: 100%; position: absolute; top: 0; z-index: 2; background-color: rgb(151 151 151 / 20%); backdrop-filter: blur(3px); display: none;"></div>
                        <!-- slide_right master_menu  add master -->
                        <div class="overlay_branch_info overlay-slide_branch_info" id="master_right_menu" style="width: 450px;">
                            <div style="height: 10%; display: flex; align-items: center; justify-content: space-between; padding: 0 24px; border-bottom: 1px solid #d9d9d9; background-color: white;">
                                <p style="font-size: 20px;">สร้างตัวเลือก</p>
                                <img src="./symbol_hrm/close_black.png" alt="" style="height: 30%; cursor: pointer;" onclick="$('.overlay_branch_info').removeClass('open'); $('#blur_bg').css('display','none'); ">
                            </div>

                            <div style="height: 80%; padding: 0 25px; overflow: scroll; background-color: #fff;">

                                <div class="content_overlay">
                                    <div class="overlay_items">

                                        <div class="master_group_list">
                                            <div style="position: relative;" id="master_list_muenu_click" class="master_list_muenu_click">
                                                <span>กลุ่มมาสเตอร์</span>
                                                <span class="master_group_list-menu" id="master_group_list">
                                                    <span id="content_list_master_menu">test</span>
                                                    <span id="master_group_list-icon"><span class="material-symbols-outlined">
                                                            expand_less
                                                        </span></span>
                                                </span>
                                                <div class="position_popup_list" id="position_popup_list">
                                                    <div class="container_popup_rank" id="container_popup_rank_1_edit">
                                                        <div class="arrow_pop"></div>
                                                        <label class="content_popup_rank" id="content_popup_rank_1_edit">
                                                            <ul>
                                                            </ul>
                                                        </label>
                                                    </div>


                                                </div>

                                            </div>
                                        </div>


                                        <div class="master_group-name_th">
                                            <span>ชื่อตัวเลือก*</span>
                                            <input type="text" name="master_group-name_th" id="master_group-name_th" placeholder="กรอกชื่อตำแหน่ง">
                                        </div>
                                        <div class="master_group-name_en">
                                            <span>ชื่อตัวเลือก (EN)*</span>
                                            <input type="text" name="master_group-name_en" id="master_group-name_en" placeholder="กรอกชื่อตำแหน่ง(EN)">
                                        </div>
                                        <div class="master_group-des_th">
                                            <span>คำอธิบาย</span>
                                            <textarea rows="5" name="master_group-des_th" id="master_group-des_th" placeholder="กรอกคำอธิบาย"></textarea>

                                            </textarea>
                                            <!-- <input type="text" name="master_group-des_th" id="master_group-des_th" placeholder="กรอกคำอธิบาย"> -->
                                        </div>
                                        <div class="master_group-des_en">
                                            <span>คำอธิบาย (EN)</span>
                                            <textarea rows="5" name="master_group-des_en" id="master_group-des_en" placeholder="กรอกคำอธิบาย"></textarea>

                                            </textarea>
                                            <!-- <input type="text" name="master_group-des_en" id="master_group-des_en" placeholder="กรอกคำอธิบาย (EN)"> -->
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div style="height: 10%; display: flex; align-items: center; justify-content: space-between; padding: 0 15px; border-bottom: 1px solid #d9d9d9; box-shadow: 0 0 8px #00000014; background-color: white;z-index: 999;
                    position: relative;">
                                <div style="align-items: center; display: flex;">
                                    <span style="margin-right: 10px;">สถานะใช้งาน</span>
                                    <label class="switch_hrm" id="switch-master_data">
                                        <input type="checkbox" id="switch-master_data-status" checked="true">
                                        <span class="slider round"></span>
                                    </label>
                                </div>

                                <div style="width: 45%; height: 100%; display: flex; justify-content: space-between; align-items: center;">
                                    <div id="btn_cancel_data" onclick="$('.overlay_branch_info').removeClass('open'); $('#blur_bg').css('display','none'); " style="width: 45%; height: 50%; border-radius: 6px; align-items: center; justify-content: center; display: flex; border: var(--border_dotDark_4);">
                                        ยกเลิก
                                    </div>
                                    <div id="btn_submit_data" style="width: 45%; height: 50%; border-radius: 6px; align-items: center; justify-content: center; display: flex;  background-color: #009688;color: var(--color_white_Light_4);">
                                        สร้าง
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- slide_right master_menu edit master -->
                        <div class="overlay_branch_info overlay-slide_branch_info" id="master_right_menu_edit" style="width: 450px;">
                            <div style="height: 10%; display: flex; align-items: center; justify-content: space-between; padding: 0 24px; border-bottom: 1px solid #d9d9d9; background-color: white;">
                                <p style="font-size: 20px;" id="name_menu_edit"> </p>
                                <img src="./symbol_hrm/close_black.png" alt="" style="height: 30%; cursor: pointer;" id="btn_cancel_data_edit_icon" onclick="$('.overlay_branch_info').removeClass('open'); $('#blur_bg').css('display','none'); ">
                            </div>

                            <div style="height: 80%; padding: 0 25px; overflow: scroll; background-color: #fff;">

                                <div class="content_overlay">
                                    <div class="overlay_items">

                                        <div class="master_group_list">
                                            <div style="position: relative;" id="master_list_muenu_click_edit" class="master_list_muenu_click">
                                                <span>กลุ่มมาสเตอร์</span>
                                                <span class="master_group_list-menu" id="master_group_list" style="cursor: not-allowed; background-color: #F6F6F8;color: lightgray;">
                                                    <span id="content_list_master_menu_edit">test</span>
                                                    <span id="master_group_list-icon"><span class="material-symbols-outlined">
                                                            expand_less
                                                        </span></span>
                                                </span>


                                            </div>


                                            <!-- <input type="text" name="master_group_list" id="master_group_list" placeholder="กรอกชื่อตำแหน่ง"> -->
                                        </div>


                                        <div class="master_group-name_th">
                                            <span>ชื่อตัวเลือก*</span>
                                            <input type="text" name="master_group-name_th-edit" id="master_group-name_th-edit" placeholder="กรอกชื่อตำแหน่ง">
                                        </div>
                                        <div class="master_group-name_en">
                                            <span>ชื่อตัวเลือก (EN)*</span>
                                            <input type="text" name="master_group-name_en" id="master_group-name_en-edit" placeholder="กรอกชื่อตำแหน่ง(EN)">
                                        </div>
                                        <div class="master_group-des_th">
                                            <span>คำอธิบาย</span>
                                            <textarea rows="5" name="master_group-des_th" id="master_group-des_th_edit" placeholder="กรอกคำอธิบาย"></textarea>

                                            </textarea>
                                            <!-- <input type="text" name="master_group-des_th" id="master_group-des_th" placeholder="กรอกคำอธิบาย"> -->
                                        </div>
                                        <div class="master_group-des_en">
                                            <span>คำอธิบาย (EN)</span>
                                            <textarea rows="5" name="master_group-des_en" id="master_group-des_en_edit" placeholder="กรอกคำอธิบาย"></textarea>

                                            </textarea>
                                            <!-- <input type="text" name="master_group-des_en" id="master_group-des_en" placeholder="กรอกคำอธิบาย (EN)"> -->
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div style="height: 10%; display: flex; align-items: center; justify-content: space-between; padding: 0 15px; border-bottom: 1px solid #d9d9d9; box-shadow: 0 0 8px #00000014; background-color: white;z-index: 999;
                    position: relative;">
                                <div style="align-items: center; display: flex;">
                                    <span style="margin-right: 10px;">สถานะใช้งาน</span>
                                    <label class="switch_hrm" id="switch-master_data">
                                        <input type="checkbox" id="switch-master_data-status_edit">
                                        <span class="slider round"></span>
                                    </label>
                                </div>

                                <div style="width: 45%; height: 100%; display: flex; justify-content: space-between; align-items: center;">
                                    <div id="btn_cancel_data_edit" onclick="$('.overlay_branch_info').removeClass('open'); $('#blur_bg').css('display','none'); " style="width: 45%; height: 50%; border-radius: 6px; align-items: center; justify-content: center; display: flex; border: var(--border_dotDark_4);">
                                        ยกเลิก
                                    </div>
                                    <div id="btn_submit_data_edit" style="width: 45%; height: 50%; border-radius: 6px; align-items: center; justify-content: center; display: flex;  background-color: #009688;color: var(--color_white_Light_4);">
                                        บันทึก
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--  -->
                        <div style="width: 100%;" class="container_master_data">
                            <!-- header_menu -->
                            <div class="master_home-header">
                                <div class="master_home-header-icon" id="master_home-header-icon" onclick="location.href='master'" style="cursor: pointer;">
                                    <span class="material-symbols-outlined">
                                        arrow_back_ios
                                    </span>
                                </div>
                                <div class="master_home-header-name">
                                    มาสเตอร์ทั่วไป
                                </div>
                            </div>
                            <!-- menu_master_list -->
                            <div class="master_home-content" id="master_home-content" style="padding: 15px 25px;  ">


                            </div>
                            <!-- content master -->
                            <div class="master_home-content" id="master_home-content-table" style="display: none; padding: 0px 25px;  ">
                                <!--  -->
                                <!--  -->
                                <div class="content_position-wrapper-position" id="content_position-wrapper-position">
                                    <div class="content_position-wrapper-position-filter">
                                        <div class="position-filter-left">
                                            <div class="position-filter-left-menu_input">
                                                <div class="position-filter-left-menu_input-icon"> <span class="material-symbols-outlined" style="color: lightgray;">search</span></div>
                                                <div class="position-filter-left-menu_input-textbox"><input type="text" placeholder="ค้นหาตำแหน่ง"></div>
                                            </div>
                                        </div>
                                        <div class="position-filter-right">
                                            <div class="position-filter-right-menu_t" style="position: relative;"><span style="margin-right: 15px;">ธนาคาร</span><span class="material-symbols-outlined" style="font-size: 200%;position: absolute;right: 0; ">arrow_drop_down </span></div>
                                            <div class="position-filter-right-menu_active"><span>ใช้งาน</span><span class="material-symbols-outlined" style="font-size: 15px;padding-top: 2px;"> close </span></div>
                                            <div class="position-filter-right-menu_addposition" id="position-filter-right-menu_addmaster"><span class="material-symbols-outlined" style="font-size: 20px ;" id="material_new_hover_add"> add</span><span>เพิ่มตัวเลือก</span></div>
                                        </div>
                                    </div>


                                    <div class="content_position-wrapper-position-table">
                                        <div class="table-wrapper">
                                            <table>
                                                <thead>
                                                    <tr id="table_menu">
                                                        <th>ลำดับ</th>
                                                        <th>กลุ่มมาสเตอร์</th>
                                                        <th>ชื่อตัวเลือก</th>
                                                        <th>คำอธิบาย</th>
                                                        <th>ข้อมูลเงินเดือน</th>
                                                        <th>แก้ไขล่าสุด</th>
                                                        <th>สถานะ</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="data_table_master">

                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>

    <!-- Other scripts or footer goes here -->

    <script>
        //
        let response_list;
        async function getAPI_listmenu() {

            try {
                let headersList = {
                    Accept: "*/*",
                    "Content-Type": "application/json",
                };

                let bodyContent = JSON.stringify({
                    token: localStorage.token,
                });

                let response = await fetch(
                    "http://localhost:3333/mobile/Get-Master-List", {
                        method: "POST",
                        body: bodyContent,
                        headers: headersList,
                    }
                );

                let data = await response.json();
                response_list = data.data
                data = data.data;
                console.log(data);

                //list master_data
                data.forEach((item, index) => {
                    const i = index + 1
                    let text_des;
                    const check_name_th = ["ธนาคาร", "อาชีพ", "เหตุผลการลาออก", "ประเภทเอกสารแนบ", "ประเภทพนักงาน", "กฎระเบียบบริษัท", "หมวดหมู่หลักสูตร", "ประเภททักษะ", "ชุดทักษะ", "เหตุผลการพ้นสภาพ"]
                    const check_name_en = [' ตัวเลือกธนาคารในการทำจ่ายรายการต่างๆ เช่น การทำจ่ายเงินเดือนให้พนักงาน ', 'ตัวเลือกในการเพิ่มข้อมูลอาชีพของสมาชิกครอบครัวพนักงาน',
                        ' ตัวเลือกเหตุผลเบื้องต้น กรณีพนักงานสร้างเอกสารขอลาออก ',
                        ' สำหรับจำแนกประเภทเอกสารการทำงาน และเอกสารทางราชการของพนักงาน ',
                        ' สำหรับจำแนกพนักงานบนระบบ เช่น พนักงานประจำ พาร์ตไทม์ ชั่วคราว รายวัน หรือฝึกงาน เป็นต้น ',
                        ' สำหรับจำแนกลักษณะการกระทำที่พนักงานได้ฝ่าฝืน ในการสร้างหนังสือเตือน ',
                        ' สำหรับจำแนกทักษะในระบบ ตามคุณสมบัติของทักษะ ',
                        '  สำหรับจำแนกทักษะในระบบ ตามคุณสมบัติของทักษะ ',
                        ' สำหรับจำแนกทักษะในระบบ ตามความเหมาะสมในแต่ละตำแหน่งหรือลักษณะงาน ',
                        ' เหตุผลการพ้นสภาพ '
                    ]
                    if (check_name_th[index] == item.mastergroup) {
                        text_des = check_name_en[index].trim()
                    }
                    document.querySelector('#master_home-content').innerHTML += `
                <div class="master_home-content-item" id="master_home-content-item">
                                <div class="master_home-content-item-icon">
                                   <span></span>
                                </div>
                                <div class="master_home-content-item-detail">
                                    <div class="master_home-content-item-detail-name">
                                            ${item.mastergroup}
                                    </div>
                                    <div class="master_home-content-item-detail-des">
                                        ${text_des}
                                    </div>
                                </div>
                 </div>
                
                `

                })
                //  <span class="material-symbols-outlined">
                //                                         quick_reference_all
                //                                     </span>
                click_master_list()

            } catch (err) {
                console.log(err)
            }


        }
        getAPI_listmenu()
        //
        //
        //
        let checkpage;

        function click_master_list() {
            const list_menu = []
            document.querySelectorAll('#master_home-content-item').forEach((e, index) => {
                const i = index + 1
                e.addEventListener('click', () => {
                    document.querySelector(".container_master_data").style.cssText += `overflow : hidden;`
                    document.querySelector('#master_home-content').style.display = 'none';
                    document.querySelector('#master_home-content-table').style.display = 'flex'
                    checkpage = i
                    fetch_table(i)
                })
            })
            document.querySelector('#master_home-header-icon').addEventListener('click', () => {
                document.querySelector('#data_table_master').innerHTML = ``
                document.querySelector(".container_master_data").style.cssText += `overflow : scroll;`
                document.querySelector('#master_home-content').style.display = 'flex';
                document.querySelector('#master_home-content-table').style.display = 'none'
            })
        }

        //
        //
        //
        let number_menu;
        async function fetch_table(num) {
            console.log('income', num - 1)
            number_menu = num - 1
            const callfuc = [
                getAPI_master_bank,
                getAPI_master_creer,
                getAPI_master_reasonforleaving,
                getAPI_master_attachment,
                getAPI_master_employee_type,
                getAPI_master_companyreg,
                getAPI_master_coursecategory,
                getAPI_master_skilltype,
                getAPI_master_skillset,
                getAPI_master_reasonforseparation

            ];

            if (num >= 1 && num <= callfuc.length) {
                try {
                    const data = await callfuc[num - 1]();
                    hovermosuer()

                    // console.log(data);
                } catch (error) {
                    console.log(error);
                }
            } else {
                console.log('data null')
            }
        }

        /////////////////////////////
        /////////
        /////////////////////////////


        /////////////////////////////
        /////////
        /////////////////////////////
        let data_page


        async function getAPI_master_bank() {
            try {
                let headersList = {
                    Accept: "*/*",
                    "Content-Type": "application/json",
                };

                let bodyContent = JSON.stringify({
                    token: localStorage.token,
                });

                let response = await fetch(
                    "http://localhost:3333/mobile/Get-Master-Bank", {
                        method: "POST",
                        body: bodyContent,
                        headers: headersList,
                    }
                );

                let data = await response.json();
                data = data.data;
                document.querySelector('#data_table_master').innerHTML = ``
                data.forEach((e, index) => {

                    let statenew;
                    const loop = index + 1
                    let creatID;
                    if (e.status == 'active') {
                        statenew = 'ใช้งาน'
                        creatID = 'active';
                        displaytr = 'table-row'
                    } else if (e.status == 'Inactive') {
                        statenew = 'ไม่ใช้งาน'
                        creatID = 'Inactive';
                        displaytr = 'none'
                    } else {
                        statenew = 'ถูกลบ'
                        creatID = 'unactive';
                        displaytr = 'none'
                    }

                    // console.log(e)
                    document.querySelector('#data_table_master').innerHTML += `

            <tr id="tr_master_data" style="display : ` + displaytr + `;">
                <td style="text-align: center;">${loop}</td>
                <td>${e.mastergroup}</td>
                <td>${e.optionname}</td>
                <td class="master_data_des">${e.description}</td>
                <td>${e.payrolldata}</td>
                <td><p>${e.name_modified}</p>${e.date_modified}</td>
                <td class="master_data_status_td"><span class='state_active_content' id="state_${creatID}">${statenew}</span></td>
                <td  id="tr_icon">
                <div class="master_data_icon_more" >
                     <span class="material-symbols-outlined" id="master_data_icon_more">more_vert</span>
                    <div class="master_data_icon_more-popup" style="display:none">
                        <div class="arrow_pop_inside"></div>
                        <div class="list_inside_master" style="margin-bottom: 5px;" id="open_edit_master_data"><span class="material-symbols-outlined" id="icon_master_eidit">edit</span>แก้ไข</div>
                        <div class="list_inside_master" id="open_delete_master_data"><span class="material-symbols-outlined" id="icon_master_eidit">delete</span>ลบ</div></div>
                     </div>
                </td>
            </tr>
            `

                })



                intable(data)

            } catch (err) {
                console.log(err)
            }
        }
        async function getAPI_master_creer() {
            try {
                let headersList = {
                    Accept: "*/*",
                    "Content-Type": "application/json",
                };

                let bodyContent = JSON.stringify({
                    token: localStorage.token,
                });

                let response = await fetch(
                    "http://localhost:3333/mobile/Get-Master-Career", {
                        method: "POST",
                        body: bodyContent,
                        headers: headersList,
                    }
                );

                let data = await response.json();
                data = data.data;
                document.querySelector('#data_table_master').innerHTML = ``
                data.forEach((e, index) => {
                    let statenew;
                    const loop = index + 1
                    let creatID;
                    if (e.status == 'active') {
                        statenew = 'ใช้งาน'
                        creatID = 'active';
                        displaytr = 'table-row'
                    } else if (e.status == 'Inactive') {
                        statenew = 'ไม่ใช้งาน'
                        creatID = 'Inactive';
                        displaytr = 'none'
                    } else {
                        statenew = 'ถูกลบ'
                        creatID = 'unactive';
                        displaytr = 'none'
                    }

                    // console.log(e)
                    document.querySelector('#data_table_master').innerHTML += `

            <tr id="tr_master_data" style="display : ` + displaytr + `;">
                <td style="text-align: center;">${loop}</td>
                <td>${e.mastergroup}</td>
                <td>${e.optionname}</td>
                <td class="master_data_des">${e.description}</td>
                <td>${e.payrolldata}</td>
                <td><p>${e.name_modified}</p>${e.date_modified}</td>
                <td class="master_data_status_td"><span class='state_active_content' id="state_${creatID}">${statenew}</span></td>
                <td  id="tr_icon">
                <div class="master_data_icon_more" >
                     <span class="material-symbols-outlined" id="master_data_icon_more">more_vert</span>
                    <div class="master_data_icon_more-popup" style="display:none">
                        <div class="arrow_pop_inside"></div>
                        <div class="list_inside_master" style="margin-bottom: 5px;" id="open_edit_master_data"><span class="material-symbols-outlined" id="icon_master_eidit">edit</span>แก้ไข</div>
                        <div class="list_inside_master" id="open_delete_master_data"><span class="material-symbols-outlined" id="icon_master_eidit">delete</span>ลบ</div></div>
                     </div>
                </td>
            </tr>
            `

                })

                intable(data)
            } catch (err) {
                console.log(err)
            }
        }
        async function getAPI_master_reasonforleaving() {
            try {
                let headersList = {
                    Accept: "*/*",
                    "Content-Type": "application/json",
                };

                let bodyContent = JSON.stringify({
                    token: localStorage.token,
                });

                let response = await fetch(
                    "http://localhost:3333/mobile/Get-Master-Reasonforleaving", {
                        method: "POST",
                        body: bodyContent,
                        headers: headersList,
                    }
                );

                let data = await response.json();
                data = data.data;
                document.querySelector('#data_table_master').innerHTML = ``
                data.forEach((e, index) => {
                    let statenew;
                    const loop = index + 1
                    let creatID;
                    if (e.status == 'active') {
                        statenew = 'ใช้งาน'
                        creatID = 'active';
                        displaytr = 'table-row'
                    } else if (e.status == 'Inactive') {
                        statenew = 'ไม่ใช้งาน'
                        creatID = 'Inactive';
                        displaytr = 'none'
                    } else {
                        statenew = 'ถูกลบ'
                        creatID = 'unactive';
                        displaytr = 'none'
                    }

                    // console.log(e)
                    document.querySelector('#data_table_master').innerHTML += `

            <tr id="tr_master_data" style="display : ` + displaytr + `;">
                <td style="text-align: center;">${loop}</td>
                <td>${e.mastergroup}</td>
                <td>${e.optionname}</td>
                <td class="master_data_des">${e.description}</td>
                <td>${e.payrolldata}</td>
                <td><p>${e.name_modified}</p>${e.date_modified}</td>
                <td class="master_data_status_td"><span class='state_active_content' id="state_${creatID}">${statenew}</span></td>
                <td  id="tr_icon">
                <div class="master_data_icon_more" >
                     <span class="material-symbols-outlined" id="master_data_icon_more">more_vert</span>
                    <div class="master_data_icon_more-popup" style="display:none">
                        <div class="arrow_pop_inside"></div>
                        <div class="list_inside_master" style="margin-bottom: 5px;" id="open_edit_master_data"><span class="material-symbols-outlined" id="icon_master_eidit">edit</span>แก้ไข</div>
                        <div class="list_inside_master" id="open_delete_master_data"><span class="material-symbols-outlined" id="icon_master_eidit">delete</span>ลบ</div></div>
                     </div>
                </td>
            </tr>
            `

                })


                intable(data)

            } catch (err) {
                console.log(err)
            }
        }
        async function getAPI_master_attachment() {
            try {
                let headersList = {
                    Accept: "*/*",
                    "Content-Type": "application/json",
                };

                let bodyContent = JSON.stringify({
                    token: localStorage.token,
                });

                let response = await fetch(
                    "http://localhost:3333/mobile/Get-Master-Attachment", {
                        method: "POST",
                        body: bodyContent,
                        headers: headersList,
                    }
                );

                let data = await response.json();
                data = data.data;
                document.querySelector('#data_table_master').innerHTML = ``
                data.forEach((e, index) => {
                    let statenew;
                    const loop = index + 1
                    let creatID;
                    if (e.status == 'active') {
                        statenew = 'ใช้งาน'
                        creatID = 'active';
                        displaytr = 'table-row'
                    } else if (e.status == 'Inactive') {
                        statenew = 'ไม่ใช้งาน'
                        creatID = 'Inactive';
                        displaytr = 'none'
                    } else {
                        statenew = 'ถูกลบ'
                        creatID = 'unactive';
                        displaytr = 'none'
                    }

                    // console.log(e)
                    document.querySelector('#data_table_master').innerHTML += `

            <tr id="tr_master_data" style="display : ` + displaytr + `;">
                <td style="text-align: center;">${loop}</td>
                <td>${e.mastergroup}</td>
                <td>${e.optionname}</td>
                <td class="master_data_des">${e.description}</td>
                <td>${e.payrolldata}</td>
                <td><p>${e.name_modified}</p>${e.date_modified}</td>
                <td class="master_data_status_td"><span class='state_active_content' id="state_${creatID}">${statenew}</span></td>
                <td  id="tr_icon">
                <div class="master_data_icon_more" >
                     <span class="material-symbols-outlined" id="master_data_icon_more">more_vert</span>
                    <div class="master_data_icon_more-popup" style="display:none">
                        <div class="arrow_pop_inside"></div>
                        <div class="list_inside_master" style="margin-bottom: 5px;" id="open_edit_master_data"><span class="material-symbols-outlined" id="icon_master_eidit">edit</span>แก้ไข</div>
                        <div class="list_inside_master" id="open_delete_master_data"><span class="material-symbols-outlined" id="icon_master_eidit">delete</span>ลบ</div></div>
                     </div>
                </td>
            </tr>
            `

                })


                intable(data)

            } catch (err) {
                console.log(err)
            }
        }
        async function getAPI_master_employee_type() {
            try {
                let headersList = {
                    Accept: "*/*",
                    "Content-Type": "application/json",
                };

                let bodyContent = JSON.stringify({
                    token: localStorage.token,
                });

                let response = await fetch(
                    "http://localhost:3333/mobile/Get-Master-Employee_type", {
                        method: "POST",
                        body: bodyContent,
                        headers: headersList,
                    }
                );

                let data = await response.json();
                data = data.data;
                document.querySelector('#data_table_master').innerHTML = ``
                data.forEach((e, index) => {
                    let statenew;
                    const loop = index + 1
                    let creatID;
                    if (e.status == 'active') {
                        statenew = 'ใช้งาน'
                        creatID = 'active';
                        displaytr = 'table-row'
                    } else if (e.status == 'Inactive') {
                        statenew = 'ไม่ใช้งาน'
                        creatID = 'Inactive';
                        displaytr = 'none'
                    } else {
                        statenew = 'ถูกลบ'
                        creatID = 'unactive';
                        displaytr = 'none'
                    }

                    // console.log(e)
                    document.querySelector('#data_table_master').innerHTML += `

            <tr id="tr_master_data" style="display : ` + displaytr + `;">
                <td style="text-align: center;">${loop}</td>
                <td>${e.mastergroup}</td>
                <td>${e.optionname}</td>
                <td class="master_data_des">${e.description}</td>
                <td>${e.payrolldata}</td>
                <td><p>${e.name_modified}</p>${e.date_modified}</td>
                <td class="master_data_status_td"><span class='state_active_content' id="state_${creatID}">${statenew}</span></td>
                <td  id="tr_icon">
                <div class="master_data_icon_more" >
                     <span class="material-symbols-outlined" id="master_data_icon_more">more_vert</span>
                    <div class="master_data_icon_more-popup" style="display:none">
                        <div class="arrow_pop_inside"></div>
                        <div class="list_inside_master" style="margin-bottom: 5px;" id="open_edit_master_data"><span class="material-symbols-outlined" id="icon_master_eidit">edit</span>แก้ไข</div>
                        <div class="list_inside_master" id="open_delete_master_data"><span class="material-symbols-outlined" id="icon_master_eidit">delete</span>ลบ</div></div>
                     </div>
                </td>
            </tr>
            `

                })


                intable(data)

            } catch (err) {
                console.log(err)
            }
        }
        async function getAPI_master_companyreg() {
            try {
                let headersList = {
                    Accept: "*/*",
                    "Content-Type": "application/json",
                };

                let bodyContent = JSON.stringify({
                    token: localStorage.token,
                });

                let response = await fetch(
                    "http://localhost:3333/mobile/Get-Master-Companyreg", {
                        method: "POST",
                        body: bodyContent,
                        headers: headersList,
                    }
                );

                let data = await response.json();
                data = data.data;
                document.querySelector('#data_table_master').innerHTML = ``
                data.forEach((e, index) => {
                    let statenew;
                    const loop = index + 1
                    let creatID;
                    if (e.status == 'active') {
                        statenew = 'ใช้งาน'
                        creatID = 'active';
                        displaytr = 'table-row'
                    } else if (e.status == 'Inactive') {
                        statenew = 'ไม่ใช้งาน'
                        creatID = 'Inactive';
                        displaytr = 'none'
                    } else {
                        statenew = 'ถูกลบ'
                        creatID = 'unactive';
                        displaytr = 'none'
                    }

                    // console.log(e)
                    document.querySelector('#data_table_master').innerHTML += `

            <tr id="tr_master_data" style="display : ` + displaytr + `;">
                <td style="text-align: center;">${loop}</td>
                <td>${e.mastergroup}</td>
                <td>${e.optionname}</td>
                <td class="master_data_des">${e.description}</td>
                <td>${e.payrolldata}</td>
                <td><p>${e.name_modified}</p>${e.date_modified}</td>
                <td class="master_data_status_td"><span class='state_active_content' id="state_${creatID}">${statenew}</span></td>
                <td  id="tr_icon">
                <div class="master_data_icon_more" >
                     <span class="material-symbols-outlined" id="master_data_icon_more">more_vert</span>
                    <div class="master_data_icon_more-popup" style="display:none">
                        <div class="arrow_pop_inside"></div>
                        <div class="list_inside_master" style="margin-bottom: 5px;" id="open_edit_master_data"><span class="material-symbols-outlined" id="icon_master_eidit">edit</span>แก้ไข</div>
                        <div class="list_inside_master" id="open_delete_master_data"><span class="material-symbols-outlined" id="icon_master_eidit">delete</span>ลบ</div></div>
                     </div>
                </td>
            </tr>
            `

                })


                intable(data)

            } catch (err) {
                console.log(err)
            }
        }

        async function getAPI_master_coursecategory() {
            try {
                let headersList = {
                    Accept: "*/*",
                    "Content-Type": "application/json",
                };

                let bodyContent = JSON.stringify({
                    token: localStorage.token,
                });

                let response = await fetch(
                    "http://localhost:3333/mobile/Get-Master-Coursecategory", {
                        method: "POST",
                        body: bodyContent,
                        headers: headersList,
                    }
                );

                let data = await response.json();
                data = data.data;
                document.querySelector('#data_table_master').innerHTML = ``
                data.forEach((e, index) => {
                    let statenew;
                    const loop = index + 1
                    let creatID;
                    if (e.status == 'active') {
                        statenew = 'ใช้งาน'
                        creatID = 'active';
                        displaytr = 'table-row'
                    } else if (e.status == 'Inactive') {
                        statenew = 'ไม่ใช้งาน'
                        creatID = 'Inactive';
                        displaytr = 'none'
                    } else {
                        statenew = 'ถูกลบ'
                        creatID = 'unactive';
                        displaytr = 'none'
                    }

                    // console.log(e)
                    document.querySelector('#data_table_master').innerHTML += `

            <tr id="tr_master_data" style="display : ` + displaytr + `;">
                <td style="text-align: center;">${loop}</td>
                <td>${e.mastergroup}</td>
                <td>${e.optionname}</td>
                <td class="master_data_des">${e.description}</td>
                <td>${e.payrolldata}</td>
                <td><p>${e.name_modified}</p>${e.date_modified}</td>
                <td class="master_data_status_td"><span class='state_active_content' id="state_${creatID}">${statenew}</span></td>
                <td  id="tr_icon">
                <div class="master_data_icon_more" >
                     <span class="material-symbols-outlined" id="master_data_icon_more">more_vert</span>
                    <div class="master_data_icon_more-popup" style="display:none">
                        <div class="arrow_pop_inside"></div>
                        <div class="list_inside_master" style="margin-bottom: 5px;" id="open_edit_master_data"><span class="material-symbols-outlined" id="icon_master_eidit">edit</span>แก้ไข</div>
                        <div class="list_inside_master" id="open_delete_master_data"><span class="material-symbols-outlined" id="icon_master_eidit">delete</span>ลบ</div></div>
                     </div>
                </td>
            </tr>
            `

                })


                intable(data)

            } catch (err) {
                console.log(err)
            }
        }
        async function getAPI_master_skilltype() {
            try {
                let headersList = {
                    Accept: "*/*",
                    "Content-Type": "application/json",
                };

                let bodyContent = JSON.stringify({
                    token: localStorage.token,
                });

                let response = await fetch(
                    "http://localhost:3333/mobile/Get-Master-Skilltype", {
                        method: "POST",
                        body: bodyContent,
                        headers: headersList,
                    }
                );

                let data = await response.json();
                data = data.data;
                document.querySelector('#data_table_master').innerHTML = ``
                data.forEach((e, index) => {
                    let statenew;
                    const loop = index + 1
                    let creatID;
                    if (e.status == 'active') {
                        statenew = 'ใช้งาน'
                        creatID = 'active';
                        displaytr = 'table-row'
                    } else if (e.status == 'Inactive') {
                        statenew = 'ไม่ใช้งาน'
                        creatID = 'Inactive';
                        displaytr = 'none'
                    } else {
                        statenew = 'ถูกลบ'
                        creatID = 'unactive';
                        displaytr = 'none'
                    }

                    // console.log(e)
                    document.querySelector('#data_table_master').innerHTML += `

            <tr id="tr_master_data" style="display : ` + displaytr + `;">
                <td style="text-align: center;">${loop}</td>
                <td>${e.mastergroup}</td>
                <td>${e.optionname}</td>
                <td class="master_data_des">${e.description}</td>
                <td>${e.payrolldata}</td>
                <td><p>${e.name_modified}</p>${e.date_modified}</td>
                <td class="master_data_status_td"><span class='state_active_content' id="state_${creatID}">${statenew}</span></td>
                <td  id="tr_icon">
                <div class="master_data_icon_more" >
                     <span class="material-symbols-outlined" id="master_data_icon_more">more_vert</span>
                    <div class="master_data_icon_more-popup" style="display:none">
                        <div class="arrow_pop_inside"></div>
                        <div class="list_inside_master" style="margin-bottom: 5px;" id="open_edit_master_data"><span class="material-symbols-outlined" id="icon_master_eidit">edit</span>แก้ไข</div>
                        <div class="list_inside_master" id="open_delete_master_data"><span class="material-symbols-outlined" id="icon_master_eidit">delete</span>ลบ</div></div>
                     </div>
                </td>
            </tr>
            `

                })


                intable(data)

            } catch (err) {
                console.log(err)
            }
        }
        async function getAPI_master_skillset() {
            try {
                let headersList = {
                    Accept: "*/*",
                    "Content-Type": "application/json",
                };

                let bodyContent = JSON.stringify({
                    token: localStorage.token,
                });

                let response = await fetch(
                    "http://localhost:3333/mobile/Get-Master-Skillset", {
                        method: "POST",
                        body: bodyContent,
                        headers: headersList,
                    }
                );

                let data = await response.json();
                data = data.data;
                document.querySelector('#data_table_master').innerHTML = ``
                data.forEach((e, index) => {
                    let statenew;
                    const loop = index + 1
                    let creatID;
                    if (e.status == 'active') {
                        statenew = 'ใช้งาน'
                        creatID = 'active';
                        displaytr = 'table-row'
                    } else if (e.status == 'Inactive') {
                        statenew = 'ไม่ใช้งาน'
                        creatID = 'Inactive';
                        displaytr = 'none'
                    } else {
                        statenew = 'ถูกลบ'
                        creatID = 'unactive';
                        displaytr = 'none'
                    }

                    // console.log(e)
                    document.querySelector('#data_table_master').innerHTML += `

            <tr id="tr_master_data" style="display : ` + displaytr + `;">
                <td style="text-align: center;">${loop}</td>
                <td>${e.mastergroup}</td>
                <td>${e.optionname}</td>
                <td class="master_data_des">${e.description}</td>
                <td>${e.payrolldata}</td>
                <td><p>${e.name_modified}</p>${e.date_modified}</td>
                <td class="master_data_status_td"><span class='state_active_content' id="state_${creatID}">${statenew}</span></td>
                <td  id="tr_icon">
                <div class="master_data_icon_more" >
                     <span class="material-symbols-outlined" id="master_data_icon_more">more_vert</span>
                    <div class="master_data_icon_more-popup" style="display:none">
                        <div class="arrow_pop_inside"></div>
                        <div class="list_inside_master" style="margin-bottom: 5px;" id="open_edit_master_data"><span class="material-symbols-outlined" id="icon_master_eidit">edit</span>แก้ไข</div>
                        <div class="list_inside_master" id="open_delete_master_data"><span class="material-symbols-outlined" id="icon_master_eidit">delete</span>ลบ</div></div>
                     </div>
                </td>
            </tr>
            `

                })


                intable(data)
            } catch (err) {
                console.log(err)
            }
        }
        async function getAPI_master_reasonforseparation() {
            try {
                let headersList = {
                    Accept: "*/*",
                    "Content-Type": "application/json",
                };

                let bodyContent = JSON.stringify({
                    token: localStorage.token,
                });

                let response = await fetch(
                    "http://localhost:3333/mobile/Get-Master-Reasonforseparation", {
                        method: "POST",
                        body: bodyContent,
                        headers: headersList,
                    }
                );

                let data = await response.json();
                data = data.data;
                document.querySelector('#data_table_master').innerHTML = ``
                data.forEach((e, index) => {
                    let statenew;
                    const loop = index + 1
                    let creatID;
                    let displaytr;
                    if (e.status == 'active') {
                        statenew = 'ใช้งาน'
                        creatID = 'active';
                        displaytr = 'table-row'

                    } else if (e.status == 'Inactive') {
                        statenew = 'ไม่ใช้งาน'
                        creatID = 'Inactive';
                        displaytr = 'none'
                    } else {
                        statenew = 'ถูกลบ'
                        creatID = 'unactive';
                        displaytr = 'none'
                    }

                    // console.log(e)
                    document.querySelector('#data_table_master').innerHTML += `

            <tr id="tr_master_data" style="display : ` + displaytr + `;">
                <td style="text-align: center;">${loop}</td>
                <td>${e.mastergroup}</td>
                <td>${e.optionname}</td>
                <td class="master_data_des">${e.description}</td>
                <td>${e.payrolldata}</td>
                <td><p>${e.name_modified}</p>${e.date_modified}</td>
                <td class="master_data_status_td"><span class='state_active_content' id="state_${creatID}">${statenew}</span></td>
                <td  id="tr_icon">
                <div class="master_data_icon_more" >
                     <span class="material-symbols-outlined" id="master_data_icon_more">more_vert</span>
                    <div class="master_data_icon_more-popup" style="display:none">
                        <div class="arrow_pop_inside"></div>
                        <div class="list_inside_master" style="margin-bottom: 5px;" id="open_edit_master_data"><span class="material-symbols-outlined" id="icon_master_eidit">edit</span>แก้ไข</div>
                        <div class="list_inside_master" id="open_delete_master_data"><span class="material-symbols-outlined" id="icon_master_eidit">delete</span>ลบ</div></div>
                     </div>
                </td>
            </tr>
            `

                })


                intable(data)

            } catch (err) {
                console.log(err)
            }
        }



        //////////////////////////////
        const obj_add = {
            mastergroup: null,
            optionname: null,
            optionnameen: null,
            description: null,
            descriptionen: null,
            status: true,
        }
        const obj_edit = {
            id: null,
            mastergroup: null,
            payrolldata: null,
            optionname: null,
            optionnameen: null,
            description: null,
            descriptionen: null,
            status: true,
        }
        const obj_delete = {
            mastergroup: null,
            id: null
        }
        //////
        //insert into master
        //////

        document.querySelector("#btn_submit_data").addEventListener('click', () => {
            document.querySelector('#master_right_menu').classList.remove('open');
            document.querySelector('#blur_bg').style.display = 'none';
            console.log(obj_add)
            postAPI_master_data(obj_add)
        })
        async function postAPI_master_data(itemobj) {
            const new_data = itemobj
            try {
                let headersList = {
                    Accept: "*/*",
                    "Content-Type": "application/json",
                };

                let bodyContent = JSON.stringify({
                    token: localStorage.token,
                    obj: new_data
                });

                let response = await fetch(
                    "http://localhost:3333/mobile/Add-Master_Data", {
                        method: "POST",
                        body: bodyContent,
                        headers: headersList,
                    }
                );

                let data = await response.json();
                if (data.checkstate == true) {
                    document.querySelector('#data_table_master').innerHTML = ''
                    fetch_table(checkpage)

                } else {
                    console.log("wrong!!")
                }
                for (let key in obj_add) {
                    obj_add[key] = null;
                }

            } catch (err) {
                console.log(err)
            }
        }

        /////////////////////////////
        /////////
        autoInputData()
        openAddRightTab()

        /////////;
        /////////////////////////////

        function autoInputData() {
            const switch_status = document.querySelector("#switch-master_data-status")
            switch_status.addEventListener('click', () => {

                obj_add.status = switch_status.checked
                console.log(obj_add)
            })
            const nameth = document.getElementById("master_group-name_th");
            let getnameth = nameth.value;
            nameth.addEventListener("input", function() {
                if (nameth.value !== getnameth) {
                    getnameth = nameth.value;
                    obj_add.optionname = nameth.value;
                    console.log(obj_add)
                }
            });
            const nameen = document.getElementById("master_group-name_en");
            let getnamen = nameen.value;
            nameen.addEventListener("input", function() {
                if (nameen.value !== getnamen) {
                    getnamen = nameen.value;
                    obj_add.optionnameen = nameen.value;
                    console.log(obj_add)
                }
            });
            const des = document.getElementById("master_group-des_th");
            let getdes = des.value;
            des.addEventListener("input", function() {
                if (des.value !== getdes) {
                    getdes = des.value;
                    obj_add.description = des.value;
                    console.log(obj_add)
                }
            });
            const desen = document.getElementById("master_group-des_en");
            let getdesen = desen.value;
            desen.addEventListener("input", function() {
                if (desen.value !== getdesen) {
                    getdesen = desen.value;
                    obj_add.descriptionen = getdesen;
                    console.log(obj_add)
                }
            });
        }


        function openAddRightTab() {

            document.querySelector('#position-filter-right-menu_addmaster').addEventListener('click', () => {
                document.querySelector("#content_popup_rank_1_edit  ul").innerHTML = ``
                response_list.forEach((item, index) => {
                    // el_content_rank_edit.innerHTML += `` 
                    document.querySelector("#content_popup_rank_1_edit  ul").innerHTML += `<li class="list_rank_1_edit" id="li_master_data">${item.mastergroup}</li>`
                    if (number_menu == index) {
                        // console.log(item)
                        document.querySelector("#content_list_master_menu").innerHTML = item.mastergroup
                        obj_add.mastergroup = item.mastergroup

                    }
                })
                document.getElementById("master_group-name_th").value = ''
                document.getElementById("master_group-name_en").value = ''
                document.getElementById("master_group-des_th").value = ''
                document.getElementById("master_group-des_en").value = ''
                document.querySelector('#master_right_menu').classList.add('open');
                document.querySelector('#blur_bg').style.display = 'flex';
                obj_add.status = true
                // 

                document.querySelectorAll("#li_master_data").forEach((e, i) => {
                    e.addEventListener('click', () => {
                        document.querySelector("#content_list_master_menu").innerHTML = response_list[i].mastergroup
                        document.querySelector("#position_popup_list").style.display = 'none'
                        obj_add.mastergroup = response_list[i].mastergroup
                        console.log(obj_add)
                    })
                })


                // console.log()

                // document.querySelector("#content_popup_rank_1_edit  ul").innerHTML = ``
                // document.querySelector("#content_list_master_menu").innerHTML = ''

            })


        }

        function hovermosuer() {

            const elements = document.querySelectorAll('#tr_master_data');
            elements.forEach((element) => {
                element.addEventListener('mouseenter', () => {
                    element.style.backgroundColor = '#FAFAFC';

                    element.querySelector(".master_data_icon_more span").style.cssText += `opacity : 100%`
                });

                element.addEventListener('mouseleave', () => {

                    element.style.backgroundColor = ''


                    // element.querySelector(".master_data_icon_more span").style.cssText += `opacity : 0%`
                });
            });



        }

        ////////
        document.querySelector("#master_group_list").addEventListener('click', () => {
            document.querySelector("#position_popup_list").style.display == 'flex' ?
                document.querySelector("#position_popup_list").style.display = 'none' :
                document.querySelector("#position_popup_list").style.display = 'flex';

        })
        document.body.addEventListener("click", function(event) {
            if (!document.querySelector("#position_popup_list").contains(event.target) && !document.querySelector("#master_group_list").contains(event.target)) {
                document.querySelector("#position_popup_list").style.display = "none";
            }
        });





        function intable(data) {
            document.querySelector("#name_menu_edit").innerHTML = `แก้ไขตัวเลือก (${data[0].mastergroup})`;

            function printMousePos(event) {
                //     console.log("clientX: " + event.clientX)

                //   console.log(" - clientY: " + event.clientY)
            }


            document.querySelectorAll('#tr_master_data').forEach((e) => {
                e.querySelector('#master_data_icon_more').addEventListener("click", printMousePos);

                e.querySelector('#master_data_icon_more').addEventListener('click', () => {

                    const popup = e.querySelector('.master_data_icon_more-popup')
                    if (popup != null) {
                        e.querySelector(".master_data_icon_more-popup").style.display = 'flex'
                        e.querySelector("#master_data_icon_more").style.cssText += `color: var(--bg_Thridnary_2);`
                    }
                })
                document.body.addEventListener("click", function(event) {
                    if (!e.querySelector(".master_data_icon_more").contains(event.target) && !e.querySelector(".master_data_icon_more-popup").contains(event.target)) {
                        e.querySelector(".master_data_icon_more-popup").style.display = "none";
                        e.querySelector("#master_data_icon_more").style.cssText += `color: lightgray;`

                    }
                });
                e.querySelectorAll('.list_inside_master').forEach((item) => {
                    item.addEventListener('mouseenter', () => {
                        item.style.cssText += `background-color: var(--bg_Thridnary_2); color: #fff;`
                        item.querySelector('#icon_master_eidit').style.cssText += `color: #fff;`
                    })
                    item.addEventListener('mouseleave', () => {
                        item.style.cssText += `background-color: #fff; color: var(--bg_Thridnary_2);`
                        item.querySelector('#icon_master_eidit').style.cssText += `color: var(--bg_Thridnary_2);`
                    })
                })
            })

            const name_th = document.getElementById("master_group-name_th-edit");
            console.log()
            let get_name_th = name_th.value;
            name_th.addEventListener("input", function() {
                if (name_th.value !== get_name_th) {
                    get_name_th = name_th.value;
                    obj_edit.optionname = get_name_th;
                    console.log(obj_edit)
                }
            });
            const name_en = document.getElementById("master_group-name_en-edit");
            let get_name_en = name_en.value;
            name_en.addEventListener("input", function() {
                if (name_en.value !== get_name_en) {
                    get_name_en = name_en.value;
                    obj_edit.optionnameen = get_name_en;
                    console.log(obj_edit)
                }
            });
            const des_th = document.getElementById("master_group-des_th_edit");
            let descriptionth = des_th.value;
            des_th.addEventListener("input", function() {
                if (des_th.value !== descriptionth) {
                    descriptionth = des_th.value;
                    obj_edit.description = descriptionth;
                    console.log(obj_edit)
                }
            });
            const des_en = document.getElementById("master_group-des_en_edit");
            let description = des_en.value;
            des_en.addEventListener("input", function() {
                if (des_en.value !== description) {
                    description = des_en.value;
                    obj_edit.descriptionen = description;
                    console.log(obj_edit)
                }
            });
            const switch_edit_master = document.querySelector('#switch-master_data-status_edit')

            switch_edit_master.addEventListener('click', () => {

                obj_edit.status = switch_edit_master.checked
                console.log(obj_edit)
            })

            document.querySelectorAll('#tr_master_data').forEach((e, index) => {
                e.querySelector("#open_edit_master_data").addEventListener('click', () => {
                    e.querySelector('.master_data_icon_more-popup').style.display = 'none'
                    document.querySelector('#master_right_menu_edit').classList.add('open');
                    document.querySelector('#blur_bg').style.display = 'flex';
                    document.querySelector('#content_list_master_menu_edit').innerHTML = data[index].mastergroup

                    obj_edit.id = data[index].id
                    obj_edit.mastergroup = data[index].mastergroup
                    obj_edit.optionname = data[index].optionname
                    obj_edit.optionnameen = ""
                    obj_edit.description = data[index].description
                    obj_edit.descriptionen = ""
                    if (data[index].status == 'active') {
                        document.querySelector('#switch-master_data-status_edit').checked = true

                        obj_edit.status = true
                    } else {
                        document.querySelector('#switch-master_data-status_edit').checked = false

                        obj_edit.status = false
                    }
                    console.log(obj_edit)
                    if (data[index].optionname != null) {
                        name_th.value = data[index].optionname
                    } else {
                        name_th.value = ''
                    }
                    if (data[index].optionnameen != null) {
                        name_en.value = data[index].optionnameen
                    } else {
                        name_en.value = ''
                    }
                    if (data[index].description != null) {
                        des_th.value = data[index].description
                    } else {
                        des_th.value = ''
                    }
                    if (data[index].descriptionen != null) {
                        des_en.value = data[index].descriptionen
                    } else {
                        des_en.value = ''
                    }
                    if (data[index].status != null) {
                        des_en.checked = data[index].status
                    } else {
                        des_en.checked = false
                    }


                })
                e.querySelector("#open_delete_master_data").addEventListener('click', () => {
                    obj_delete.mastergroup = data[index].mastergroup
                    obj_delete.id = data[index].id
                    document.querySelector('#master_right_menu').classList.remove('open');
                    document.querySelector('#blur_bg').style.display = 'none';
                    // const confirmation = confirm("Are you sure you want to submit the form?");
                    const confirmation = confirm("Are you sure you want to submit the form?");

                    if (confirmation) {

                        alert("Form submitted successfully!");
                        postAPI_master_Delete_data(obj_delete)

                    } else {

                        alert("Form submission canceled!");
                    }



                })
            })
            document.querySelector("#btn_cancel_data_edit").addEventListener('click', () => {
                for (let key in obj_edit) {
                    obj_edit[key] = null;
                }
            })
            document.querySelector("#btn_cancel_data_edit_icon").addEventListener('click', () => {
                for (let key in obj_edit) {
                    obj_edit[key] = null;
                }
            })

        }
        document.querySelector('#btn_submit_data_edit').addEventListener('click', () => {
            document.querySelector('#master_right_menu_edit').classList.remove('open');
            document.querySelector('#blur_bg').style.display = 'none';
            postAPI_master_Edit_data(obj_edit)


        })
        async function postAPI_master_Edit_data(itemobj) {
            const new_data = {
                id: itemobj.id,
                mastergroup: itemobj.mastergroup?.trim(),
                payrolldata: itemobj.payrolldata?.trim(),
                optionname: itemobj.optionname?.trim(),
                optionnameen: itemobj.optionnameen?.trim(),
                description: itemobj.description?.trim(),
                descriptionen: itemobj.descriptionen?.trim(),
                status: itemobj.status
            };
            try {
                let headersList = {
                    Accept: "*/*",
                    "Content-Type": "application/json",
                };

                let bodyContent = JSON.stringify({
                    token: localStorage.token,
                    obj: new_data
                });

                let response = await fetch(
                    "http://localhost:3333/mobile/Update-Master_Data", {
                        method: "POST",
                        body: bodyContent,
                        headers: headersList,
                    }
                );
                // location.reload()
                let data = await response.json();

                if (data.checkstate == true) {
                    document.querySelector('#data_table_master').innerHTML = ''
                    fetch_table(checkpage)
                } else {
                    console.log("wrong!!")
                }
                for (let key in obj_edit) {
                    obj_edit[key] = null;
                }
            } catch (err) {
                console.log(err)
            }
        }

        async function postAPI_master_Delete_data(itemobj) {
            const new_data = itemobj
            try {
                let headersList = {
                    Accept: "*/*",
                    "Content-Type": "application/json",
                };

                let bodyContent = JSON.stringify({
                    token: localStorage.token,
                    obj: new_data
                });

                let response = await fetch(
                    "http://localhost:3333/mobile/Delete-Master_Data", {
                        method: "POST",
                        body: bodyContent,
                        headers: headersList,
                    }
                );
                // location.reload()

                let data = await response.json();
                if (data.checkstate == true) {
                    document.querySelector('#data_table_master').innerHTML = ''
                    fetch_table(checkpage)
                } else {
                    console.log("wrong!!")
                }
                for (let key in obj_delete) {
                    obj_delete[key] = null;
                }
            } catch (err) {
                console.log(err)
            }
        }
    </script>
</body>

</html>