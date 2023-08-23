<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title>Login First</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.0/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.0/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.0/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.0/dist/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" type="text/css" href="<?= base_url('/css/global.css'); ?>">
    <?php echo "<script src='".base_url('./backoffice_static/config.js')."'></script>"; ?>

</head>
<style>
    * {
        box-sizing: border-box;
    }

    body {
        font-family: "Inter", sans-serif;
    }

    .title {
        margin-bottom: 2rem;
    }

    .hidden {
        display: none;
    }

    .icon {
        width: 24px;
        height: 24px;
        position: absolute;
        top: 7px;
        right: 5px;
        pointer-events: none;
        z-index: 2;
    }

    .icon.icon-success {
        stroke: teal;
    }

    .icon.icon-error {
        stroke: red;
    }

    .container {
        margin: 40px auto;
        padding: 40px;
    }

    .input {
        appearance: none;
        display: block;
        width: 100%;
        color: #2d3748;
        line-height: 1.25;
        padding: 0.65rem 0.75rem;
        border-radius: 0.25rem;
        border: none;
        background: #FAFAFC;
        border-radius: 8px;
    }

    .input::placeholder {
        color: #a0aec0;
    }

    .input.input-error {
        border: 1px solid red;
        background-color: #FFE5E5;
    }

    .input.input-error:focus {
        border: 1px solid red;
    }

    .input:focus {
        outline: none;
        border: 1px solid #0063F7;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
    }

    .input-group {
        margin-bottom: 2rem;
        position: relative;
    }

    .error-message {
        font-size: 0.85rem;
        color: red;
    }

    .button {
        border: 1px solid #C7C9D9;
        padding: 1rem 2rem;
        border-radius: 16px;
        color: #ffffff;
        font-weight: bold;
        display: block;
        width: 100%;
        text-align: center;
        cursor: pointer;
        color: #28293D;
        background-color: white;
        margin-top: 10vh;
    }

    .button:hover {
        background-color: #0063F7;
        color: #fff;
    }

    .text1 {
        font-weight: 500;
        font-size: 20px;
        color: #1C1C28;
        display: flex;
        justify-content: center;
    }

    .text2 {
        font-weight: 400;
        font-size: 14px;
        color: #1C1C28;
        display: flex;
        justify-content: center;
    }

    #toggler {
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
    }

    #confirm-toggler {
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
    }

    .link {
        color: #8F90A6;
        position: absolute;
        right: 0;
        font-size: 11px;
        font-weight: 600;
    }

    .error {
        color: red;
        font-size: 12px;
        margin-top: 5px;
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
        background: red;
        color: #ffffff;
        border: 1px solid #C7C9D9;
        border-radius: 8px;
        padding: 8px 12px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .modal_btn_check:hover {
        background: #0063F7;
        color: #FFFFFF;
    }

    .modal_btn_check_cancel:hover {
        background: red;
        color: #FFFFFF;
    }
</style>
<div class="container">
    <p class="text1">Login First</p>
    <p class="text2">Create a new account</p>
    <form action="/newpassword" class="form" method="post" onsubmit="return validatePasswords()">
        <div class="input-group">
            <input id="password" type="password" name="newPassword" class="input" placeholder="Password">
            <span id="toggler"><i class="far fa-eye-slash"></i></span>
        </div>
        <div class="input-group">
            <input id="password_confirmation" type="password" name="newPasswordConfirm" class="input" placeholder="Confirm Password">
            <span id="confirm-toggler"><i class="far fa-eye-slash"></i></span>
            <div id="error-message"></div>
        </div>
        <input type="submit" class="button" value="Sign In">
    </form>
</div>

<!-- Modal -->
<div class="modal hide" id='modal_fail' style='display:flex;'>
    <div class="modal_content_check">
        <div class="modal_header">
            <img src="<?= base_url("imgs/fail_icon.svg") ?>" alt="Modal Header Image">
        </div>
        <div class="modal_body">
            <div class="modal_msg">Please check again.</div>
            <div class="gray fs-14px modal_text" id="fail_txt">Please enter company email only.</div>
        </div>
        <div class="modal_footer_check">
            <button class="modal_btn_check_cancel cancel_btn" onclick='closeModal();backloginfirst();'>try again</button>
        </div>
    </div>
</div>

<div class="modal hide" id='modal_success' style='display:flex;'>
    <div class="modal_content_check">
        <div class="modal_header">
            <img src="<?= base_url("imgs/success_icon.svg") ?>" alt="Modal Header Image">
        </div>
        <div class="modal_body">
            <div class="modal_msg">Passwords match!</div>
            <div class="gray fs-14px modal_text2" style="color: #6B6F80">Your password have been change successfully submitted.</div>
        </div>
        <div class="modal_footer_check">
            <button class="modal_btn_check success_btn" onclick='closeModal();backhome();'>Closed</button>
        </div>
    </div>
</div>
<!-- end modal -->
<script>
    let ENDPOINT = window.API_URL;

    function toggler() {
        var password = document.getElementById('password');
        var togglerIcon = document.getElementById('toggler');

        if (password.type === 'password') {
            password.type = "text";
            togglerIcon.innerHTML = '<i class="far fa-eye"></i>';
        } else {
            password.type = "password";
            togglerIcon.innerHTML = '<i class="far fa-eye-slash"></i>';
        }
    }

    function confirmToggler() {
        var confirmPassword = document.getElementById('password_confirmation');
        var confirmTogglerIcon = document.getElementById('confirm-toggler');

        if (confirmPassword.type === 'password') {
            confirmPassword.type = "text";
            confirmTogglerIcon.innerHTML = '<i class="far fa-eye"></i>';
        } else {
            confirmPassword.type = "password";
            confirmTogglerIcon.innerHTML = '<i class="far fa-eye-slash"></i>';
        }
    }

    document.getElementById('toggler').addEventListener('click', toggler);
    document.getElementById('confirm-toggler').addEventListener('click', confirmToggler);

    function checkPassword(password) {
        const regex = /^(?=.*[a-zA-Z])(?=.*[0-9])(?=.{8,})/;
        return regex.test(password);
    }

    function validatePasswords() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("password_confirmation").value;


        if (password != confirmPassword) {
            document.getElementById("password").style.borderColor = "red";
            document.getElementById("password_confirmation").style.borderColor = "red";
            document.getElementById("password").style.backgroundColor = "#FFE6E6";
            document.getElementById("password_confirmation").style.backgroundColor = "#FFE6E6";

            document.getElementById("error-message").textContent = "Passwords do not match!";
            document.getElementById("error-message").classList.add("error")

            const errorMessage = `Passwords do not match!`
            model_try_again(errorMessage);
            return false;
        }
        if (!checkPassword(password)) {
            document.getElementById("password").style.borderColor = "red";
            document.getElementById("password_confirmation").style.borderColor = "red";
            document.getElementById("password").style.backgroundColor = "#FFE6E6";
            document.getElementById("password_confirmation").style.backgroundColor = "#FFE6E6";

            document.getElementById("error-message").textContent = "Password must contain at least 8 characters including at least one letter and one number!";
            document.getElementById("error-message").classList.add("error");

            const errorMessage = `Password must contain at least 8 characters including at least one letter and one number!`
            model_try_again(errorMessage);
            return false;
        }
        if (password === confirmPassword) {
            model_success();
            document.getElementById("password").style.borderColor = "#069952";
            document.getElementById("password_confirmation").style.borderColor = "#069952";
            document.getElementById("password").style.backgroundColor = "#E6FFF3";
            document.getElementById("password_confirmation").style.backgroundColor = "#E6FFF3";

            document.getElementById("error-message").textContent = "";
            document.getElementById("error-message").classList.remove("error");
        } else {
            //
        }
    }

    function model_try_again(alert = 'some thing went wrong 222') {
        console.log('model_try_again()01');
        setTimeout(function() {
            console.log('alert', alert);
            $('#modal_fail').removeClass('hide')
            $('.modal_content_check').addClass('slide_top');
            $('#fail_txt').html(alert);
        }, 100);
    }

    function closeModal() {
        $('.modal_content_check').removeClass('slide_top');
        setTimeout(function() {
            $('.modal').addClass('hide');
        }, 100);
    }

    function model_success() {
        setTimeout(function() {
            $('#modal_success').removeClass('hide');
            $('.modal_content_check').addClass('slide_top');
        }, 100);
    }

    function backhome() {
        window.location.href = "<?= base_url("home") ?>";
    }

    function backloginfirst() {
        window.location.href = "<?= base_url("loginFirst2") ?>";
    }

    function refresh() {
        location.reload();
    }
</script>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
<?php if (isset($error)) : ?>
    <script>
        model_try_again("<?= $error ?>")
    </script>
<?php endif; ?>