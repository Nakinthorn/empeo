<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>template</title>
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <!-- global.js -->
    <script src='./global_js.js'></script>
    <!-- This css font  -->
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300;400;500&family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100&display=swap" rel="stylesheet">
    <!-- global.css -->
    <link rel="stylesheet" type="text/css" href='<?= base_url('css/global_hrm.css') ?>'>

    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">

</head>
<style>
    html,
    body {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    * {
        margin: 0;
        padding: 0;
    }

    .tapmenu-faq {

        height: 5vh;
        border: unset;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        margin-right: 25px;
    }

    .tapactive {
        border-bottom: 3px solid #009688;
    }
</style>

<body>
    <div id="divmenu" class="div_menu_top">
        <div class="font_size_icon div_menu_sup_top">
            <div style="width: 30%; padding-right: 10px; display: flex; align-items: center; justify-content: flex-end;">
                <div style="width: 55%; margin-right: 15px;">
                    <div class="search_long" style="width: unset; border-radius: 10px;">
                        <div class="seachdiv">
                            <img src="./symbol_hrm/search_gray_icon.png" style="height: 50%;">
                        </div>

                        <input id="" type="text" class="kanit font_normal seachinputinside_css" placeholder="search">
                    </div>
                </div>
                <div style="text-align: end; margin-right: 20px;">
                    <div style="font-size: 18px;">Sven zenn</div>
                    <div style="font-size: 12px;">Dota</div>
                </div>
                <div style="width: 50px; height: 50px; border-radius: 100px; background-size: cover; background-position: center; background-image: url(https://media.discordapp.net/attachments/1065176955445587988/1123534910381117491/350885243_2871046769695349_6895795451906942072_n.jpg?width=372&height=580);">
                </div>
            </div>
        </div>
    </div>
</body>

</html>