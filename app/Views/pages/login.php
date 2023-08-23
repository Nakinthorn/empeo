<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.0/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.0/dist/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="./css/global.css">
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

    .password-container {
        position: relative;
    }

    .password-toggle {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        cursor: pointer;
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

    .input:focus {
        outline: none;
        border: 1px solid #0063F7;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
    }

    .input-group {
        margin-bottom: 2rem;
        position: relative;
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

    .link {
        color: #8F90A6;
        position: absolute;
        right: 0;
        font-size: 11px;
        font-weight: 600;
    }

    .error {
        border: 1px solid #FF3B3B;
        background-color: #FFE5E5;
    }

    .success {
        border: 1px solid #069952;
        background-color: #E6FFF3;
    }

    .error-message {
        color: #FF3B3B;
        font-size: 12px;
    }

    input.invalid {
        border-color: #FF3B3B;
        background-color: #FFE5E5;
    }

    input.valid {
        border-color: #069952;
        background-color: #E6FFF3;
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

    .modal_msg {
        color: #2D3643;
        font-weight: 700;
        font-size: 20px;
        line-height: 32px;
    }
</style>

<body>
    <div class="container">
        <p class="text1">Sign In</p>
        <p class="text2">Lorem ipsum dolor sit amet consect.</p>

        <form method="post" action="/loginFirst" class="form" id="form">

            <div class="input-group">
                <input id="email" type="email" name="email" class="input" placeholder="Email" required>
                <p id="email-error" class="error-message"></p>
            </div>

            <div class="input-group">
                <input type="password" name="password" id="password" class="input" placeholder="Password" required>
                <p id="password-error" class="error-message"></p>
                <span class="password-toggle" onclick="togglePassword()"><i class="far fa-eye-slash"></i></span>
                <p onclick="forgotPassword();"><a class="link" href="#">Forgot password?</a></p>
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
                <button class="modal_btn_check_cancel cancel_btn" onclick='closeModal();backlogin();'>try again</button>
            </div>
        </div>
    </div>

    <div class="modal hide" id='modal_success' style='display:flex;'>
        <div class="modal_content_check">
            <div class="modal_header">
                <img src="<?= base_url("imgs/success_icon.svg") ?>" alt="Modal Header Image">
            </div>
            <div class="modal_body">
                <div class="modal_msg">The check-in system is complete</div>
                <div class="gray fs-14px modal_text2" style="color: #6B6F80">Check in and take pictures.</div>
            </div>
            <div class="modal_footer_check">
                <button class="modal_btn_check_cancel cancel_btn" onclick='closeModal();refresh();'>Cancel</button>
                <button class="modal_btn_check success_btn" onclick='closeModal();backhome();'>Closed</button>
            </div>
        </div>
    </div>
    <!-- end modal -->

    <script>
        let ENDPOINT = window.API_URL;

        function togglePassword() {
            var passwordInput = document.getElementById("password");
            var passwordToggle = document.querySelector(".password-toggle");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                passwordToggle.innerHTML = '<i class="far fa-eye"></i>';
            } else {
                passwordInput.type = "password";
                passwordToggle.innerHTML = '<i class="far fa-eye-slash"></i>';
            }
        }

        function isEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

        function validatePassword(password) {
            const regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
            return regex.test(password);
        }
        
        const form = document.querySelector('#form');
        const emailInput = document.querySelector('#email');
        const passwordInput = document.querySelector('#password');

        form.addEventListener('submit', (event) => {
            event.preventDefault();

            const email = emailInput.value.trim();
            const password = passwordInput.value.trim();

            if (!isEmail(email)) {
                const errorMessage = `Invalid Email or Password`
                model_try_again(errorMessage);
                emailInput.classList.add('invalid');
                document.getElementById('email-error').textContent = 'Invalid Email or Password';
                return;
            } else {
                emailInput.classList.remove('invalid');
                document.getElementById('email-error').textContent = '';
            }

            if (!validatePassword(password)) {
                const errorMessage = `Invalid Email or Password`
                model_try_again(errorMessage);
                passwordInput.classList.add('invalid')
                document.getElementById('password-error').textContent = 'Invalid Email or Password';
                return;
            } else {
                passwordInput.classList.remove('invalid');
                document.getElementById('password-error').textContent = '';
            }

            form.submit();
        });

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
                console.log('tony');
                $('#modal_success').removeClass('hide');
                $('.modal_content_check').addClass('slide_top');
            }, 100);
        }

        function backhome() {
            window.location.href = "<?= base_url("home") ?>";
        }

        function backlogin() {
            window.location.href = "<?= base_url("login") ?>";
        }

        function forgotPassword() {
            window.location.href = "<?= base_url("forgot_password") ?>";
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
</body>

</html>