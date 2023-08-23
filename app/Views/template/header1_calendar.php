<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="./css/doc_header_footer.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:wght@200;400;500;800&display=swap');
    </style>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Noto Sans', sans-serif;
        }

        .my-body {
            height: 70vh;
            /* border:  1px solid black; */
            margin: 0px 15px;
        }

        .doc_option {
            background: #F6F7F9;
            width: 100%;
            height: 48px;
            border-radius: 8px;
            margin-top: 5px;
            padding: 10px;
            color: #838799;
        }

        .doc_date {
            background: #FAFAFC;
            padding: 12px 16px;
            color: #8F90A6;
            margin-top: 17px;
            border-radius: 8px;
        }

        .doc-text {
            margin-top: 17px;
            font-size: 14px;
            line-height: 24px;
            font-weight: 400;
            color: #838799;
        }

        .btn_select_blue {
            margin-top: 17px;
            border: 1px solid #3E7BFA;
            border-radius: 17px;
            width: 30%;
        }

        .space_margin {
            margin-top: 17px;
        }

        .color-blue {
            margin: 8px 11px;
            text-align: center;
        }

        .set-space-btn {
            display: flex;
            width: 100%;
            justify-content: space-around;
            color: #3E7BFA;
        }

        .header {
            width: 100%;
            height: 10vh;
            display: flex;
            padding: 20px;
            position: sticky;
            top: 0;
            z-index: 1;
            background-color:white;



        }
        

        .headerbox {
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
            /* top: 50%;
            left: 50%;
            transform: translate(-50%, -50%); */
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
</head>

<body>
    <div class="loader-wrapper">
        <div class="loader"></div>
    </div>
    <div class='header'>
        <div class='headerbox'>
            <div class='headimg' onclick="<?= $url1 ?>"><img src="<?= base_url('imgs/icon.svg') ?>" alt="Image"></div>
            <div class='headtxt'>
            </div>
        </div>
    </div>