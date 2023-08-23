<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://media.discordapp.net/attachments/1065176955445587988/1123534910381117491/350885243_2871046769695349_6895795451906942072_n.jpg?width=372&height=580">

    <title>HRM</title>

    <!-- CSS -->
    <!-- <link rel="stylesheet" href="./global.css"> -->
    <script src="./global_js.js"></script>

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
    <link rel="stylesheet" type="text/css" href='<?= base_url('css/global_hrm.css') ?>'>

    <!-- Global JS -->
    <script src='./global_js.js'></script>
    <!-- This css font  -->
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300;400;500&family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100&display=swap" rel="stylesheet">


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

    .fadeIn {
        opacity: 0;
        animation: fadeIn 0.4s ease-in both;
        width: 100%;
        position: absolute;
        top: 20%;
        left: 0;
        z-index: 0;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translate3d(0, -20%, 0);
        }

        to {
            opacity: 1;
            transform: translate3d(0, 0, 0);
        }
    }

    .fadeIn:nth-child(2) {
        animation-delay: 0.2s;
    }

    .fadeIn:nth-child(3) {
        animation-delay: 0.5s;
    }

    .fadeIn:nth-child(4) {
        animation-delay: 0.8s;
    }

    .fadeIn:nth-child(5) {
        animation-delay: 1.1s;
    }

    .fadeIn:hover {
        transform: scale(105%) !important;
        cursor: pointer;
    }

    .tapmenu-user {

        height: 5vh;
        border: unset;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        margin-right: 25px;
    }

    .tapuseractive {
        border-bottom: 3px solid #009688;
    }


    .step_cycle {
        width: 10%;
        display: flex;
        justify-content: center;
    }

    .cycle {
        width: 46px;
        height: 46px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #ffffff;
        color: #bcbcc8;
        border: 2px solid #ececf1;
    }

    .active_cycle {
        background-color: #009688 !important;
        border: none !important;
        color: #fff !important;
    }

    /* checkbox */
    /* Create a custom checkbox */
    .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 20px;
        width: 20px;
        background-color: #fff;
        border: 1px solid #d2d2da;
        border-radius: 3px;
    }

    /* On mouse-over, add a grey background color */
    .container:hover input~.checkmark {
        background-color: #ccc;
    }

    /* When the checkbox is checked, add a blue background */
    .container input:checked~.checkmark {
        background-color: orangered;
        border: 1px solid orangered;
    }

    /* Create the checkmark/indicator (hidden when not checked) */
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the checkmark when checked */
    .container input:checked~.checkmark:after {
        display: block;
    }

    /* Style the checkmark/indicator */
    .container .checkmark:after {
        left: 6px;
        top: 2px;
        width: 5px;
        height: 10px;
        border: solid white;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    /* checkbox END */
</style>

<style>
    .fadeIn {
        opacity: 0;
        animation: fadeIn 0.4s ease-in both;
    }

    @keyframes fadeIn {
        from {
            opacity: 1;
            /* transform: translate3d(0, -20%, 0); */
            left: -270px;
        }

        to {
            opacity: 1;
            /* transform: translate3d(0, 0, 0); */
            left: 0px;
        }
    }

    .fadeIn:nth-child(2) {
        animation-delay: 0.7s;
    }

    .fadeIn_h {
        opacity: 0;
        animation: fadeIn_h 0.5s ease-in both;
        position: absolute;
        top: 13%;
        left: -31px;
        z-index: 1;
    }

    @keyframes fadeIn_h {
        from {
            opacity: 0;
            /* transform: translate3d(0, -20%, 0); */
            left: 0px;
        }

        to {
            opacity: 1;
            /* transform: translate3d(0, 0, 0); */

            left: -31px;
        }
    }

    .fadeIn_h:nth-child(2) {
        animation-delay: 0.2s;
    }

    .main-body {
        width: calc(100% - 60px);
        height: 100%;
        display: flex;
        margin-left: 60px;
        background-color: white;
    }

    .animation-container {
        width: 40%;
        height: 100%;
        position: relative;
    }

    .login-container {
        width: 60%;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .field-login {
        width: 99%;
        height: 50px;
        display: flex;
        align-items: center;
        border-radius: 100px;
        margin-bottom: 20px;
        background-color: #f2f2f2;
        box-shadow: 0px 0px 10px #d0d0d0;
    }

    .for-input {
        width: 100%;
        height: 100%;
        background: unset;
        border: unset;
        outline: unset;
        padding: 0 20px;
    }

    .btn-login {
        width: 100%;
        height: 60px;
        border-radius: 100px;
        font-size: 1.2vw;
        align-items: center;
        justify-content: center;
        display: flex;
        margin-top: 40px;
        background-color: #007268;
        color: var(--color_white_Light_4);
        border: none;
        cursor: pointer;
    }
</style>

<body style="overflow: hidden;">

    <div class="div_menu_left"></div>

    <div class="main-body">

        <div class="animation-container">
            <div class="fadeIn_h">
                <img src="<?php echo base_url('imgs/bg_login_hand.png'); ?>" style="width: 11%;">
            </div>

            <div class="fadeIn">
                <img src="<?php echo base_url('imgs/bg_login_body.png'); ?>" style="width: 100%;">
            </div>
        </div>

        <div class="login-container">
            <img src="<?php echo base_url('imgs/logo_HRM1.png'); ?>" style="width: 25%; margin-bottom: 50px;">
            <div style="width: 50%;">
                <div class="field-login">
                    <input id="username" type="text" name="username" class="kanit weight_regular font_normal for-input" placeholder="ชื่อผู้ใช้งาน">
                </div>

                <div class="field-login">
                    <input id="password" type="password" name="password" class="kanit weight_regular font_normal for-input" placeholder="รหัสผ่าน">
                </div>

                <div>
                    <button class="btn-login" onclick="Login();">เข้าสู่ระบบ</button>
                </div>
            </div>
        </div>

        <script>
            localStorage.removeItem('token');

            document.addEventListener("keyup", function(event) {
                if (event.key === "Enter") {
                    Login();
                }
            });

            function Login() {
                const email = document.getElementById('username').value;
                const password = document.getElementById('password').value;

                var myHeaders = new Headers();
                myHeaders.append("Content-Type", "application/json");

                var raw = JSON.stringify({
                    "email": email,
                    "password": password
                });

                var requestOptions = {
                    method: 'POST',
                    headers: myHeaders,
                    body: raw,
                    redirect: 'follow'
                };

                fetch("http://localhost:3333/mobile/login", requestOptions)
                    .then(response => {
                        return response.json()
                    })
                    .then(result => {
                        console.log(result)
                        if (result.code === 200) {
                            localStorage.setItem('token', result.token);

                            location.href = "http://localhost:8080/backoffice/dashboard";
                        } else {
                            alert('something wrong')
                        }
                    })
                    .catch(error => {
                        console.log('error', error)
                    });
            }
        </script>
</body>


</html>