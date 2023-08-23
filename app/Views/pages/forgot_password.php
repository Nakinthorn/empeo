<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <title>Forgot Password</title>
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
        z-index: 99999999;
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
    <div class="container">
        <p class="text1">Forgot Password</p>
        <p class="text2">Lorem ipsum dolor sit amet consect.</p>
        <br>
        <form method="post" action="" class="form" id="form">
            <div class="input-group">
                <input id="email" type="email" name="email" class="input" placeholder="Email">
                <p id="email-error" class="error-message"></p>
            </div>

            <input type="submit" class="button" value="Send">
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
                <button class="modal_btn_check_cancel cancel_btn" onclick='closeModal();refresh();'>try again</button>
            </div>
        </div>
    </div>

    <div class="modal hide" id='modal_success' style='display:flex;'>
        <div class="modal_content_check">
            <div class="modal_header">
                <img src="<?= base_url("imgs/success_icon.svg") ?>" alt="Modal Header Image">
            </div>
            <div class="modal_body">
                <div class="modal_msg">Temporary Password has been sent.</div>
                <div class="gray fs-14px modal_text2" style="color: #6B6F80">Please check your email.</div>
            </div>
            <div class="modal_footer_check">
                <button class="modal_btn_check success_btn" onclick='closeModal();backlogin();'>Confirm</button>
            </div>
        </div>
    </div>
    <!-- end modal -->
    <div class="loader-wrapper">
        <div class="loader"></div>
    </div>
    <script>
        let ENDPOINT = window.API_URL;

        const emailSend = document.querySelector('input[type="submit"].button');
        emailSend.addEventListener('click', function(event) {
            event.preventDefault();
            document.querySelector(".loader-wrapper").classList.add("active");
            const emailInput = document.querySelector('#email');
            const emailValue = emailInput.value;

            const data = {
                email: emailValue
            };

            const requestOptions = {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            };

            fetch(ENDPOINT + 'api/forgotPassword', requestOptions)
                .then(response => response.json())
                .then(result => {
                    if (result.code === 404) {
                        const errorMessage = `Email not found`
                        document.querySelector(".loader-wrapper").classList.remove("active");
                        model_try_again(errorMessage);
                    }
                    if (result.code === 200) {
                        document.querySelector(".loader-wrapper").classList.remove("active");
                        model_success();
                    }
                })
                .catch(error => console.log('error', error));
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
</body>

</html>