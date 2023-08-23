<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <?php echo "<script src='".base_url('./backoffice_static/config.js')."'></script>"; ?>
</head>
<style>
    .mobile-blocked {
        overflow: hidden;
        position: fixed;
    }

    .block {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #000;
        color: #fff;
        text-align: center;
        padding-top: 20%;
        z-index: 9999;
    }
    .header {
        width: 100%;
        height: 10vh;
        display: flex;
        padding: 20px;
        position: sticky;
        top: 0;
        z-index: 1;
        background-color: white;
    }
    
    .header-box {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .headimg {
        position: absolute;
        left: 20px;
    }

    /* loader */
    .loader-wrapper {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: none;
        justify-content: center;
        align-items: center;
        background-color: rgba(0, 0, 0, 0.8);
        z-index: 999;
        opacity: 0;
        transition: opacity 0.2s ease-in-out;
    }

    .loader-wrapper.active {
        opacity: 1;
        display: flex;
    }

    .loader {
        border: 16px solid #f3f3f3;
        border-top: 16px solid #3498db;
        border-radius: 50%;
        width: 100px;
        height: 100px;
        animation: spin 2s linear infinite;
        position: absolute;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>

<body>
    <div class="loader-wrapper">
        <div class="loader"></div>
    </div>
    <div class='header'>
        <div class='header-box'>
            <!-- <div class='headimg' onclick="history.back()"><img src="<?= base_url('imgs/arrowleft_black.png') ?>" alt="Image"></div> -->
            <div class='headtxt'>
                Admin Menu
            </div>
        </div>
    </div>
    <a href="<?php echo base_url('add_employee') ?>">
        <div class="px-4 py-5 border-b border-gray-300 active:bg-[#0063F7]">
            <h3 class="text-lg font-medium text-gray-900 active:text-white ">Add Employee</h3>
        </div>
    </a>
    <a href="<?php echo base_url('edit_employee') ?>">
        <div class="px-4 py-5 border-b border-gray-300 active:bg-[#0063F7]">
            <h3 class="text-lg font-medium text-gray-900 active:text-white ">Edit Employee</h3>
        </div>
    </a>
    <a href="<?php echo base_url('/menu/permission') ?>">
        <div class="px-4 py-5 border-b border-gray-300 active:bg-[#0063F7]">
            <h3 class="text-lg font-medium text-gray-900 active:text-white ">Permission</h3>
        </div>
    </a>
    <a href="<?php echo base_url('edit_company') ?>">
        <div class="px-4 py-5 border-b border-gray-300 active:bg-[#0063F7]">
            <h3 class="text-lg font-medium text-gray-900 active:text-white ">Edit Company</h3>
        </div>
    </a>
    <a href="<?php echo base_url('menu/my_department') ?>">
        <div class="px-4 py-5 border-b border-gray-300 active:bg-[#0063F7]">
            <h3 class="text-lg font-medium text-gray-900 active:text-white ">My Department</h3>
        </div>
    </a>
    <a href="<?php echo base_url('salary') ?>">
        <div class="px-4 py-5 border-b border-gray-300 active:bg-[#0063F7]">
            <h3 class="text-lg font-medium text-gray-900 active:text-white ">Salary</h3>
        </div>
    </a>
    <a href="<?php echo base_url('master_data') ?>">
        <div class="px-4 py-5 border-b border-gray-300 active:bg-[#0063F7]">
            <h3 class="text-lg font-medium text-gray-900 active:text-white ">Master Data</h3>
        </div>
    </a>


    <!--block mobile view-->
    <!-- <div id="block-mobile-view" class="block">
        <h1>This site supports only web view.</h1>
    </div> -->

    <script>
        // function detectMobileView() {
        //     var messageElement = document.getElementById("block-mobile-view");
        //     var bodyElement = document.getElementsByTagName("body")[0];

        //     if (/Mobi|Android/i.test(navigator.userAgent)) {
        //         messageElement.style.display = "block";
        //         bodyElement.classList.add("mobile-blocked");
        //     } else {
        //         messageElement.style.display = "none";
        //         bodyElement.classList.remove("mobile-blocked");
        //     }
        // }

        // window.addEventListener("DOMContentLoaded", detectMobileView);
        // window.addEventListener("resize", detectMobileView);
    </script>
</body>

</html>