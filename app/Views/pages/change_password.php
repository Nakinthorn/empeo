<?php 
    $session = session();
    $token = $session->get('token');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Change Password</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url('/css/global.css'); ?>">
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
        <?php echo "<script src='".base_url('./backoffice_static/config.js')."'></script>"; ?>
    </head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:wght@200;400;500;800&display=swap');
        body {
            margin: 0;
            padding: 0;
            font-family: "Inter", sans-serif;
        }
        .head-container {
            display: flex;
            align-items: center;
            height: 12vh;
            margin-right: 20px;
        }
        .p-head {
            margin: 0 auto;
            text-align: center;
            font-weight: 500;
            font-size: 16px;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .password-wrapper {
            position: relative;
        }

        .password-toggle-icon {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }
        .button-confirm {
            background: #FFFFFF;
            border: 1px solid #C7C9D9;
            border-radius: 16px;
            position: absolute;
            width: 343px;
            height: 56px;
            margin-top: 55vh;
        }
        .button-confirm:hover {
            background: #0063F7;
            color: #FFFFFF;
        }
        input {
            padding: 12px 8px;
            width: 343px;
            height: 28px;
            background: #F6F7F9;
            border-radius: 8px;
            border: none;
        }
        .input-content p {
            font-weight: 500;
            font-size: 16px;
        }
        .modal_content_check {
            background-color: #fff;
            width: 80%;
            max-width: 600px;
            padding: 20px;
            border-radius: 16px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            position: relative;
            animation-name: slide_top;
            animation-duration: 0.5s;
            animation-delay: 1s;
            animation-fill-mode: forwards;
        }
        .modal_footer_check {
            display: flex;
        }
        .modal_btn_check {
            background: #FFFFFF;
            border: 1px solid #C7C9D9;
            border-radius: 8px;
            padding: 8px 12px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .modal_btn_check_cancel {
            border: 1px solid #C7C9D9;
            border-radius: 8px;
            padding: 8px 12px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .modal_btn_check {
            background: #0063F7;
            color: #FFFFFF;
        }
        .modal_msg{
            color: #2D3643;
            font-weight: 700;
            font-size: 20px;
            line-height: 32px;
        }
        .cancel_btn_changePassword {
            margin-right: 10px;
            width: 100%;
            background: none;
        }
    </style>
    <body>
        <div class="head-container">
            <img src="<?= base_url('imgs/arrowleft_black.png') ?>" alt="Image" onclick="backSetting();" style="margin-left: 16px;">
            <p class="p-head">Reset Password</p>
        </div>

         <div class="container">
            <div class="input-content">
                <p>Your Password</p>
                <div class="password-wrapper">
                    <input type="password" id="current-password" name="current-password">
                    <span class="password-toggle-icon"><i class="fas fa-eye-slash"></i></span>
                </div>
            </div>
            <div class="input-content">
                <p>New Password</p>
                <div class="password-wrapper">
                    <input type="password" id="new-password" name="new-password">
                    <span class="password-toggle-icon"><i class="fas fa-eye-slash"></i></span>
                </div>
            </div>
        
            <div class="input-content">
                <p>Confirm new Password</p>
                <div class="password-wrapper">
                    <input type="password" id="confirm-password" name="confirm-password">
                    <span class="password-toggle-icon"><i class="fas fa-eye-slash"></i></span>
                </div>
            </div>
            <button class="button-confirm">Confirm</button>
        </div>
        

         <!-- Modal -->
        <div class="modal hide" id='modal_fail' style='display:flex;'>
            <div class="modal_content_check">
                <div class="modal_header">
                    <img src="<?= base_url("imgs/fail_icon.svg") ?>" alt="Modal Header Image">
                </div>
                <div class="modal_body">
                    <div class="modal_msg">Please check again.</div>
                    <div class="gray fs-14px modal_text" id="fail_txt" >Password must be at least 8 characters long</div>
                </div>
                <div class="modal_footer_check">
                    <button class="modal_btn_check_cancel cancel_btn_changePassword"onclick='closeModal();refresh();'>try again</button>
                </div>
            </div>
        </div>

        <div class="modal hide" id='modal_success' style='display:flex;'>
                <div class="modal_content_check">
                <div class="modal_header">
                    <img src="<?= base_url("imgs/success_icon.svg") ?>" alt="Modal Header Image">
                </div>
                <div class="modal_body">
                    <div class="modal_msg">Password updated successfully</div>
                    <div class="gray fs-14px modal_text2" style="color: #6B6F80">Your password have been change submitted</div>
                </div>
                <div class="modal_footer_check">
                    <button class="modal_btn_check_cancel cancel_btn_changePassword"onclick='closeModal();refresh();'>Cancel</button>
                    <button class="modal_btn_check success_btn"onclick='closeModal();backhome();'>Closed</button>
                </div>
            </div>
        </div>
    <!-- end modal -->
    </body>
    
</html>
<script>
    let ENDPOINT = window.API_URL;

    function redirectToPage() {
        window.location.href = "<?= base_url("home") ?>";
    }
    const passwordFields = document.querySelectorAll('input[type="password"]');
    const toggleIcons = document.querySelectorAll('.password-toggle-icon');

    toggleIcons.forEach((icon, index) => {
        icon.addEventListener('click', () => {
            const type = passwordFields[index].getAttribute('type') === 'password' ? 'text' : 'password';
            passwordFields[index].setAttribute('type', type);
            const iconClass = type === 'password' ? 'fa-eye-slash' : 'fa-eye';
            icon.querySelector('i').classList.remove(type === 'password' ? 'fa-eye' : 'fa-eye-slash');
            icon.querySelector('i').classList.add(iconClass);
        });
    });

    var myHeaders = new Headers();
    myHeaders.append("Content-Type", "application/json");

    function changePassword() {
        const currentPassword = document.getElementById("current-password").value;
        const newPassword = document.getElementById("new-password").value;
        const confirmNewPassword = document.getElementById("confirm-password").value;

        if (currentPassword.length < 8 || newPassword.length < 8 || confirmNewPassword.length < 8) {
            const messageError = `Password must be at least 8 characters long.`;
            model_try_again(messageError);
            return false;
        }

        const raw = JSON.stringify({
            "token": '<?php echo $token; ?>',
            "oldPassword": currentPassword,
            "newPassword": newPassword,
            "confirmNewPassword": confirmNewPassword
        });

        const requestOptions = {
            method: 'POST',
            headers: myHeaders,
            body: raw,
            redirect: 'follow'
        };

        fetch(ENDPOINT + "api/changePassword", requestOptions)
        .then(response => response.json())
        .then(result => {
            if (result.code == 400 || result.code == 404) {
                const messageError = result.error
                model_try_again(messageError)
            }
            if (result.code == 200) {
                const messageSuccess = result.message
                model_success(messageSuccess)
            }
        })
        .catch(error => console.log('error', error));

    }

    const confirmButton = document.querySelector('button');
    confirmButton.addEventListener('click', changePassword);

    function model_try_again(alert= 'some thing went wrong 222') {
        setTimeout(function () {
            $('#modal_fail').removeClass('hide')
            $('.modal_content_check').addClass('slide_top');
            $('#fail_txt').html(alert);
        }, 100);
    }
    function closeModal() {
        $('.modal_content_check').removeClass('slide_top');
        setTimeout(function () {
            $('.modal').addClass('hide');
        }, 100);
    }
    function model_success(alert = 'Success') {
        setTimeout(function () {
            $('#modal_success').removeClass('hide');
            $('.modal_content_check').addClass('slide_top');
        }, 100);
    }

    function backhome() {
        window.location.href =  "<?= base_url("home")?>";		
    }
    function backlogin() {
        window.location.href =  "<?= base_url("login")?>";		
    }

    function backSetting() {
        window.location.href =  "<?= base_url("settings")?>";		
    }

    function refresh() {
        location.reload();	
    }
</script>
